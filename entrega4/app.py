from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os
import atexit
import subprocess
from datetime import datetime

USER_KEYS = ['name', 'last_name', 'occupation', 'follows', 'age']
MENSAJE_KEYS = ["message", "sender", "receptant", "lat", "long", "date"]

#Coneccion a base de datos remota
uri = "mongodb://grupo28:grupo28@146.155.13.149/grupo28?authSource=admin"
# El cliente se levanta en localhost:5432
client = MongoClient(uri)
# Utilizamos la base de datos 'entidades'
db = client.get_database()
# Seleccionamos la colección de usuarios
usuarios = db.usuarios
mensajes = db.mensajes
# Iniciamos la aplicación de flask
app = Flask(__name__)


@app.route("/")
def home():
    return render_template('index.html')


# Mapeamos esta función a la ruta '/plot' con el método get.
@app.route("/plot")
def plot():
    # Obtengo todos los usuarios
    users = usuarios.find({}, {"_id": 0})

    # Hago un data frame (tabla poderosa) con la columna 'name' indexada
    df = pd.DataFrame(list(users)).set_index('name')

    # Hago un grafico de pi en base a la edad
    df.plot.pie(y='age')

    # Export la figura para usarla en el html
    pth = os.path.join('static', 'plot.png')
    plt.savefig(pth)

    # Retorna un html "rendereado"
    return render_template('plot.html')


@app.route("/users")
def get_users():
    resultados = [u for u in usuarios.find({}, {"_id": 0})]
    # Omitir el _id porque no es json serializable

    return render_template('usuarios.html', result=resultados)


@app.route("/mensajes")
def get_mensajes():
    resultados = [u for u in mensajes.find({}, {"_id": 0})]
    # Omitir el _id porque no es json serializable

    return render_template('mensajes.html', result=resultados)


@app.route("/ingresar_id_mensajes_entre_usuarios")
def get_mensajes_entre():
    return render_template('search_mensajes_entre_usuarios.html')


@app.route("/users/<int:uid>")
def get_user(uid):
    users = list(usuarios.find({"uid": uid}, {"_id": 0}))
    mens = list(mensajes.find({"sender": uid}, {"_id": 0}))
    return json.jsonify(users + mens)

@app.route("/recibidos/<int:uid>")
def get_inbox(uid):
    mens = list(mensajes.find({"receptant": uid}, {"_id": 0}))
    return json.jsonify(mens)


@app.route("/mensajesentreusuarios", methods=['POST'])
def get_mensajesentre():
    uid1, uid2 = int(request.form["uid1"]), int(request.form["uid2"])
    user1 = list(usuarios.find({"uid": uid1}, {"_id": 0}))
    user2 = list(usuarios.find({"uid": uid2}, {"_id": 0}))
    mens1 = list(mensajes.find({"sender": uid1, "receptant": uid2}, {"_id": 0}))
    mens2 = list(mensajes.find({"sender": uid2, "receptant": uid1}, {"_id": 0}))
    res = mens1 + mens2
    return render_template('mensajes_entre.html', result=res)


@app.route("/crear_mensajes", methods=['POST'])
def create_mensaje():
    cuenta = int(mensajes.count_documents({}))
    numerin = cuenta
    new_mens = {"message": request.form['contenido'],
                "sender": int(request.form['de']),
                "receptant": int(request.form['para']),
                "lat": float(request.form['latitud']),
                "long": float(request.form['longitud']),
                "date": str(datetime.today()).split()[0],
                "mid": numerin}
    result = mensajes.insert_one(new_mens)
    # Creo el mensaje resultado
    if (result):
        message = "Mensaje creado"
        success = True
    else:
        message = "No se pudo crear el mensaje"
        success = False
    # Retorno el texto plano de un json
    return json.jsonify(success)


@app.route("/mensajes/buscar", methods=['POST'])
def search_mensaje():
    musts = request.form["must"].split(";")
    maybes = request.form["maybe"].split(";")
    notbes = request.form["notbe"].split(";")
    pid = request.form["pid"]
    query = []
    # print(pid, musts, maybes, notbes)
    if pid:
        query.append({"sender": int(pid)})
        # result = mensajes.distinct({"sender": pid})
    # else:
    #    result = mensajes.distinct({"message": {'$regex' : '.*.*'}})	
    if len(musts) > 0:
        for each in musts:
            if each != "":
                query.append({"message": {'$regex': '.*{}.*'.format(each.strip())}})
    # result = result.distinct({"message": {'$regex' : '.*{}.*'.format(each)}})
    if len(notbes) > 0:
        for each in notbes:
            if each != "":
                query.append({"message": {'$regex': '^((?!{}).)*$'.format(each.strip())}})
    # result = result.distinct({"message": {'$regex' : '^((?!{}).)*$'.format(each)}})
    # print(query)
    # resultados = [u for u in mensajes.find({"$and": query})]
    if len(query) > 1:
        resultados = [u for u in mensajes.find({"$and": query}, {"_id": 0})]
    elif len(query) == 1:
        resultados = [u for u in mensajes.find(query[0], {"_id": 0})]
    else:
        resultados = [u for u in mensajes.find({}, {"_id": 0})]
    return render_template('buscar_mensajes.html', result=resultados)

@app.route("/mensajes/buscar_json", methods=['POST'])
def search_mensaje_json():
    musts = request.form["must"].split(";")
    maybes = request.form["maybe"].split(";")
    notbes = request.form["notbe"].split(";")
    pid = request.form["pid"]
    query = []
    # print(pid, musts, maybes, notbes)
    if pid:
        query.append({"sender": int(pid)})
        # result = mensajes.distinct({"sender": pid})
    # else:
    #    result = mensajes.distinct({"message": {'$regex' : '.*.*'}})	
    if len(musts) > 0:
        for each in musts:
            if each != "":
                query.append({"message": {'$regex': '.*{}.*'.format(each.strip())}})
    # result = result.distinct({"message": {'$regex' : '.*{}.*'.format(each)}})
    if len(notbes) > 0:
        for each in notbes:
            if each != "":
                query.append({"message": {'$regex': '^((?!{}).)*$'.format(each.strip())}})
    # result = result.distinct({"message": {'$regex' : '^((?!{}).)*$'.format(each)}})
    # print(query)
    # resultados = [u for u in mensajes.find({"$and": query})]
    if len(query) > 1:
        resultados = [u for u in mensajes.find({"$and": query}, {"_id": 0})]
    elif len(query) == 1:
        resultados = [u for u in mensajes.find(query[0], {"_id": 0})]
    else:
        resultados = [u for u in mensajes.find({}, {"_id": 0})]
    return json.jsonify(resultados)


@app.route("/mensajesdelete", methods=['POST'])
def delete_mensaje():
    mid = int(request.form["mid"])
    result = mensajes.delete_one({"mid": mid})

    message = f'Mensaje {mid} ha sido eliminado.' if result.deleted_count > 0 \
        else f'Mensaje {mid} no ha podido ser eliminado'
    # Retorno el texto plano de un json
    return render_template('mensaje_eliminado.html', deleted=result.deleted_count, success=True, message=message)


@app.route("/mensajessearch", methods=['GET'])
def get_search():
    return render_template('search.html')


@app.route("/mensajescreate", methods=['GET'])
def get_create():
    return render_template('create_message.html')


@app.route("/mensajesdelete", methods=['GET'])
def get_delete():
    return render_template('delete_message.html')


@app.route("/users", methods=['POST'])
def create_user():
    '''
    Crea un nuevo usuario en la base de datos
    Se  necesitan todos los atributos de model, a excepcion de _id
    '''

    # Si los parámetros son enviados con una request de tipo application/json:
    data = {key: request.json[key] for key in USER_KEYS}

    # Se genera el uid
    count = usuarios.count_documents({})
    data["uid"] = count + 1

    # Insertar retorna un objeto
    result = usuarios.insert_one(data)

    # Creo el mensaje resultado
    if (result):
        message = "1 usuario creado"
        success = True
    else:
        message = "No se pudo crear el usuario"
        success = False

    # Retorno el texto plano de un json
    return json.jsonify({'success': success, 'message': message})


@app.route('/users/<int:uid>', methods=['DELETE'])
def delete_user(uid):
    '''
    Elimina un usuario de la db.
    Se requiere llave uid
    '''

    # esto borra el primer resultado. si hay mas, no los borra
    usuarios.delete_one({"uid": uid})

    message = f'Usuario con id={uid} ha sido eliminado.'

    # Retorno el texto plano de un json
    return json.jsonify({'result': 'success', 'message': message})


@app.route('/users/many', methods=['DELETE'])
def delete_many_user():
    '''
    Elimina un varios usuarios de la db.
    - Se requiere llave idBulk en el body de la request application/json
    '''

    if not request.json:
        # Solicitud faltan parametros. Codigo 400: Bad request
        abort(400)  # Arrojar error

    all_uids = request.json['uidBulk']

    if not all_uids:
        # Solicitud faltan parametros. Codigo 400: Bad request
        abort(400)  # Arrojar error

    # Esto borra todos los usuarios con el id dentro de la lista
    result = usuarios.delete_many({"uid": {"$in": all_uids}})

    # Creo el mensaje resultado
    message = f'{result.deleted_count} usuarios eliminados.'

    # Retorno el texto plano de un json
    return json.jsonify({'result': 'success', 'message': message})


@app.route("/test")
def test():
    # Obtener un parámero de la URL
    param = request.args.get('name', False)
    print("URL param:", param)

    # Obtener un header
    param2 = request.headers.get('name', False)
    print("Header:", param2)

    # Obtener el body
    body = request.data
    print("Body:", body)

    return "OK"


if __name__ == '__main__':
    app.run()

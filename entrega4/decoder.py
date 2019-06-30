from pymongo import MongoClient
import pandas as pd
import os
import atexit
import subprocess
import json
from bson import ObjectId, json_util 

USER_KEYS = ['name', 'last_name', 'occupation', 'follows', 'age']

# Levantamos el servidor de mongo. Esto no es necesario, puede abrir
# una terminal y correr mongod. El DEVNULL hace que no vemos el output
mongod = subprocess.Popen('mongod', stdout=subprocess.DEVNULL)
# Nos aseguramos que cuando el programa termine, mongod no quede corriendo
atexit.register(mongod.kill)

# El cliente se levanta en localhost:5432
client = MongoClient('localhost')
# Utilizamos la base de datos 'entidades'
db = client["entidades"]
# Seleccionamos la colección de usuarios
usuarios = db.usuarios
df = pd.read_csv("usuario.csv", sep=';')
records_ = df.to_dict(orient = 'records')

dele = usuarios.delete_many({})
result = db.usuarios.insert_many(records_)



cursor = usuarios.find({}, {"_id": 0})
file = open("usuarios.json", "w", encoding = "utf-8")
file.write('[')

qnt_cursor = 0
for document in cursor:
    qnt_cursor += 1
    num_max = cursor.count()
    if (num_max == 1):
        file.write(json.dumps(document, indent=4, default=json_util.default))
    elif (num_max >= 1 and qnt_cursor <= num_max-1):
        file.write(json.dumps(document, indent=4, default=json_util.default))
        file.write(',')
    elif (qnt_cursor == num_max):
        file.write(json.dumps(document, indent=4, default=json_util.default))
file.write(']')
file.close()

    

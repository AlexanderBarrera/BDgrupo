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
mensajes = db.mensajes

dele = mensajes.delete_many({})
with open('messages.json', "r") as m:
    file_data = json.load(m)
    result = db.mensajes.insert_many(file_data)
m.close()

dele = usuarios.delete_many({})
with open('usuarios.json', "r") as u:
    file_data = json.load(u)
    result = db.usuarios.insert_many(file_data)
u.close()

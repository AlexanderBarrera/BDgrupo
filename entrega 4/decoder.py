from pymongo import MongoClient
import pandas as pd
import os
import atexit
import subprocess

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
df = pd.read_csv("usuario.csv")
records_ = df.to_dict(orient = 'records')
result = db.usuarios.insert_many(records_)

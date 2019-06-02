# gunicorn-flask-pipenv-sample

## Para instalar pipenv (necesario):

### Windows con una sola version de python, Ubuntu 18.04+

```bash
pip install pipenv
```

### Otros

```bash
pip3 install pipenv
```

Abrimos nuevamente la consola ejecutada desde la carpeta entrega 4

#### Crear entorno antes de correr

```bash
pipenv install pandas
```
#### Cargar bases de datos:

Ejecutar archivo cargardb.py
Si estas en windows 
```bash
python cargardb.py
```

### Correr la app:
Primero levantar:
```bash
pipenv shell
```
Y luego ejecutar main:
Si estas en windows 
```bash
python main.py
```

Cualquier otro sistema operativo
```bash
gunicorn main:app --workers=3 --reload
```


Rutas encontradas en la Api a partir de:

localhost:5000

/users
Presenta los datos de todos los usuarios presentes en la base de datos

/mensajes
Presenta los datos de todos los usuarios presentes en la base de datos

/users/<Algún id de usuario>
Presenta los datos del usuario junto con los mensajes emitidos por él

/mensajesentre/<Algún id de usuario>/<Algún id de otro usuario>
Presenta los datos de los usuarios junto con los mensajes entre ellos

#Creación de mensajes:
Desde home se tiene un form que emite a /mensajes con el método post que
genera un nuevo mensaje en la base de datos (de ser exitoso es el último
mensaje en la ventana de mensajes)

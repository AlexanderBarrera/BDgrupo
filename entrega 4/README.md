# Entrega 4 Grupo 33

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

# DENTRO DE LA API:

Rutas encontradas en la Api a partir de:

``localhost:5000``

` /users`
Presenta los datos de todos los usuarios presentes en la base de datos, 
y tiene un botón que lleva allí desde home

` /mensajes`
Presenta los datos de todos los usuarios presentes en la base de datos, 
y tiene un botón que lleva allí desde home

`/users/<Algún id de usuario>`
Presenta los datos del usuario junto con los mensajes emitidos por él

`/mensajesentre/<Algún id de usuario>/<Algún id de otro usuario>`
Presenta los datos de los usuarios junto con los mensajes entre ellos

## Búsqueda de mensajes
Desde home se tiene un form que emite a /mensajes/buscar con el método 
post, donde busca en la base de datos según lo que se escriba, de no 
querer incluir un campo, sólo dejarlo vacío.
Para buscar más de una cosa en cada cámpo, separar las frases y palabras
con punto y coma (;), pueden haber múltiples campos con cosas para buscar
pero se recomienda ver en la pestaña de mensajes para buscar algo que si
exista.


## Creación de mensajes:
Desde home se tiene un form que emite a /mensajes con el método post que
genera un nuevo mensaje en la base de datos (de ser exitoso es el último
mensaje en la ventana de mensajes)

## Eliminación de mensajes
Desde home se tiene un form que emite a /mensajesdelete con el método post
que elimina el primer mensaje con la mid detectada
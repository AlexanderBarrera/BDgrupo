# Entrega 5
## Funcionamiento
- Para el login, se necesita el email y la contraseña de un usuario registrado en el sistema. Un ejemplo es:

    | Email |   sgallardo@gmail.com   |
    |:----------:|:-----------------------:|
    | Contraseña | 99 |

- Luego es posible navegar por la página y ver el perfil del usuario actualmente registrado. 
- En este perfil, tenemos los datos del usuario y 3 opciones: visualizar las reservas del usuario, los senderos del usuario y los restaurantes favoritos.
- Para los favoritos, el usuario puede agregar un restaurante a favoritos presionando el boton correspondiente en la lista de restaurantes o en la página individual de cada restaurante, donde se listan también los platos que tiene.

# Funcionamiento con la API

### Un usuario registrado puede:
- Ver su inbox, que hace una llamada a la api con el metodo GET a `recibidos/{id_usuario}`
- Ver los mensajes enviados, que hace una llamad con el método GET a `users/{id_usuario}`
- Crear un mensaje, que hace una llamada con el método POST a `nuevo_mensaje/` entregando un form con los parámetros.
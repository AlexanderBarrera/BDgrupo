# Entrega 5
## Funcionamiento
- Para el login, se necesita el email y la contraseña de un usuario registrado en el sistema. Un ejemplo es:

    |   Email    | sgallardo@gmail.com |
    | :--------: | :-----------------: |
    | Contraseña |         99          |

- Luego es posible navegar por la página y ver el perfil del usuario actualmente registrado. 
- En este perfil, tenemos los datos del usuario y 3 opciones: visualizar las reservas del usuario, los senderos del usuario y los restaurantes favoritos.
- Para los favoritos, el usuario puede agregar un restaurante a favoritos presionando el boton correspondiente en la lista de restaurantes o en la página individual de cada restaurante, donde se listan también los platos que tiene.

# Funcionamiento con la API

### Un usuario registrado puede:
- Ver su inbox, que hace una llamada a la api con el metodo GET a `recibidos/{id_usuario}`
- Ver los mensajes enviados, que hace una llamada con el método GET a `users/{id_usuario}`
- Crear un mensaje, que hace una llamada con el método POST a `nuevo_mensaje/` entregando un form con los parámetros.
- Ver mensajes que el envió en un rango acotado por dos fechas que el usuario ingresa, representados en un mapa que crea marcadores en las coordenadas donde fue enviado el mensaje y así rastrear su comportamiento, esta hace una llamada a la API con metodo GET y así obtener los mensajes que envió.

### Dashboard:  Desde la pagína principal se encuentra un link a la dashboard desde el carrusel, donde se pueden ver los gráficos de barras de:
- Número de habitaciones reservadas por región
- Número de cepas de vino por región
- Número de tours de cada región (para así ver cuál es la con más variadas atracciones)
- Número de platos de cada región (para ver la con más variada gastronomía)
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            /* Fondo gris claro */
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            /* Color del texto del encabezado */
        }

        .form-container {
            background-color: #fff;
            /* Fondo blanco */
            border-radius: 8px;
            /* Bordes redondeados */
            padding: 20px;
            /* Espaciado interno */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Sombra */
            max-width: 400px;
            /* Ancho máximo del contenedor */
            margin: auto;
            /* Centrar el contenedor */
        }

        label {
            display: block;
            /* Mostrar etiquetas en bloque */
            margin-bottom: 8px;
            /* Margen inferior */
            font-weight: bold;
            /* Negrita para las etiquetas */
        }

        input[type="number"],
        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 22px);
            /* Ancho con padding ajustado */
            padding: 5px;
            /* Espaciado interno más pequeño */
            margin-bottom: 15px;
            /* Margen inferior */
            border: 1px solid #ccc;
            /* Borde gris */
            border-radius: 4px;
            /* Bordes redondeados */
        }

        input[type="submit"] {
            background-color: #007bff;
            /* Color de fondo del botón */
            color: white;
            /* Color del texto del botón */
            border: none;
            /* Sin borde */
            cursor: pointer;
            /* Cursor de puntero */
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            /* Color al pasar el mouse */
        }

        .credit-card {
            background-color: #f7f7f7;
            /* Fondo gris claro */
            border: 1px solid #ddd;
            /* Borde gris */
            border-radius: 8px;
            /* Bordes redondeados */
            padding: 15px;
            /* Espaciado interno */
            margin-top: 20px;
            /* Margen superior */
        }

        .credit-card label {
            font-weight: bold;
            /* Negrita para las etiquetas de tarjeta */
        }

        .back-link {
            display: inline-block;
            /* Mostrar como un bloque en línea */
            margin-top: 15px;
            /* Margen superior */
            color: #007bff;
            /* Color del enlace */
            text-decoration: none;
            /* Sin subrayado */
        }

        .back-link:hover {
            text-decoration: underline;
            /* Subrayado al pasar el mouse */
        }
    </style>
    <script>
        // Función para actualizar el total basado en la cantidad seleccionada
        function actualizarTotal() {
            // Obtener la cantidad seleccionada
            let cantidad = document.getElementById('cantidad').value;
            // Obtener el precio del vino desde el atributo data-precio
            let precio = parseFloat(document.getElementById('cantidad').getAttribute('data-precio'));
            let total = cantidad * precio;

            // Actualizar el total en la vista
            document.getElementById('total').innerText = total.toFixed(2);
        }
    </script>
</head>

<body>
    <div class="form-container">
        <h2>Información de la compra</h2>
        <form action="{{ route('confirmacion') }}" method="post">
            @csrf
            <div>
                <input type="hidden" name="idVino" value="{{ $vino->idVino }}">
            </div>
            <div>
                <input type="hidden" name="idVendedor" value="{{ $vino->idVendedor }}">
            </div>
            <label for="articulo">Artículo:</label>
            <span id="articulo">{{ $vino->nombreVino }}</span>

            <label for="precio">Precio por unidad: $</label>
            <span id="precio">{{ $vino->precio }}</span>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="1" min="1"
                max="{{ $vino->cantidadDisp }}" data-precio="{{ $vino->precio }}" onchange="actualizarTotal()">

            <label for="total">Total a pagar: $</label>
            <span id="total">{{ $vino->precio }}</span>

            <h2>Información de Pago</h2>
            <div class="credit-card">
                <label for="nombre-titular">Nombre del titular:</label>
                <input type="text" id="nombre-titular" name="nombre_titular" required>

                <label for="numero-tarjeta">Número de tarjeta:</label>
                <input type="text" id="numero-tarjeta" name="numero_tarjeta" required>

                <label for="fecha-expiracion">Fecha de expiración:</label>
                <input type="text" id="fecha-expiracion" name="fecha_expiracion" placeholder="MM/AA" required>

                <label for="cvv">Código de seguridad (CVV):</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>

            <input type="submit" value="Pagar">
        </form>
        <a href="/welcomeC/{{ $vino->idVino }}" class="back-link">Atrás</a>
    </div>
</body>

</html>

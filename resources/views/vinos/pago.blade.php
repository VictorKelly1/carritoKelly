<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Pago</title>
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
        <span id="articulo">{{ $vino->nombreVino }}</span><br><br>

        <label for="precio">Precio por unidad: $</label>
        <span id="precio">{{ $vino->precio }}</span><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="1" min="1"
            max="{{ $vino->cantidadDisp }}" data-precio="{{ $vino->precio }}" onchange="actualizarTotal()"><br><br>

        <label for="total">Total a pagar: $</label>
        <span id="total">{{ $vino->precio }}</span><br><br>

        <input type="submit" value="Pagar">
    </form>
    <a href="/welcomeC/{{ $vino->idVino }}">Atrás</a>
</body>

</html>

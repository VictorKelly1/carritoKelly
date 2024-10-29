<h1>{{ $vino->nombre }}</h1>
<style>
    /* Estilos generales del formulario */
    form {
        background-color: #f9f9f9;
        /* Fondo gris claro */
        border: 1px solid #ddd;
        /* Bordes grises */
        border-radius: 8px;
        /* Bordes redondeados */
        padding: 20px;
        /* Espaciado interno */
        margin-bottom: 20px;
        /* Margen inferior */
    }

    /* Estilo de las etiquetas y los inputs */
    label {
        font-weight: bold;
        /* Negrita para las etiquetas */
        margin-bottom: 5px;
        /* Margen inferior */
        display: block;
        /* Cada etiqueta en su propia línea */
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: 100%;
        /* Ancho completo */
        padding: 8px;
        /* Espaciado interno */
        margin-bottom: 15px;
        /* Margen inferior */
        border: 1px solid #ccc;
        /* Bordes grises claros */
        border-radius: 4px;
        /* Bordes redondeados */
    }

    /* Estilo del botón */
    button {
        background-color: #007bff;
        /* Color de fondo */
        color: white;
        /* Color del texto */
        border: none;
        /* Sin borde */
        padding: 10px 15px;
        /* Espaciado interno */
        border-radius: 5px;
        /* Bordes redondeados */
        cursor: pointer;
        /* Cambia el cursor al pasar sobre el botón */
    }

    button:hover {
        background-color: #0056b3;
        /* Color de fondo al pasar el mouse */
    }

    /* Estilo del enlace de regreso */
    a {
        text-decoration: none;
        /* Sin subrayado */
        color: #007bff;
        /* Color del texto */
    }

    a:hover {
        text-decoration: underline;
        /* Subrayado al pasar el mouse */
    }
</style>
<h2>Edita aqui</h2>
<form action="{{ route('productos.editar') }}" method="POST">
    @csrf
    <div>
        <input type="hidden" name="id" value="{{ $vino->idVino }}">
    </div>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $vino->nombreVino }}" required>
    </div>
    <div>
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="{{ $vino->tipo }}" required>
    </div>
    <div>
        <label for="anio">Año:</label>
        <input type="number" id="anio" name="anio" min="1900" max="2100"value="{{ $vino->anio }}"
            required>
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" value="{{ $vino->precio }}" required>
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" min="0" value="{{ $vino->cantidadDisp }}" required>
    </div>
    <label for="foto">Selecciona una foto:</label><br />
    <input type="file" id="foto" name="foto" accept="image/*">
    <div>
        <button type="submit">Guardar</button>
    </div>
</form>

<a href="{{ route('productos') }}">Atras</a>

<h1>{{ $vino->nombre }}</h1>
<style>
    /* Estilos para la información del vino */
    .vino-info {
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

    /* Estilos para los párrafos */
    .vino-info p {
        margin: 10px 0;
        /* Margen superior e inferior */
        font-size: 16px;
        /* Tamaño de fuente */
    }

    /* Estilos para las etiquetas */
    .vino-info label {
        font-weight: bold;
        /* Negrita para las etiquetas */
        margin-right: 5px;
        /* Espaciado a la derecha de las etiquetas */
    }

    /* Estilo de los enlaces */
    a {
        text-decoration: none;
        /* Sin subrayado */
        color: #007bff;
        /* Color del texto */
        margin-right: 15px;
        /* Espaciado a la derecha entre enlaces */
    }

    a:hover {
        text-decoration: underline;
        /* Subrayado al pasar el mouse */
    }
</style>
<div class="vino-info">
    <p>
        <label>Nombre:</label>
        {{ $vino->nombreVino }}
    </p>
    <p>
        <label>Tipo:</label>
        {{ $vino->tipo }}
    </p>
    <p>
        <label>Año:</label>
        {{ $vino->anio }}
    </p>
    <p>
        <label>Precio:</label>
        {{ $vino->precio }}
    </p>
    <p>
        <label>Stock:</label>
        {{ $vino->cantidadDisp }}
    </p>
    <p>
        <label>Proveedor:</label>
        {{ $vino->nombreVendedor }} {{ $vino->apellidoVendedor }}
    </p>
    <p>
        <label>Años de antigüedad:</label>
        {{ $vino->aniosAntiguedad }}
    </p>
    <p>
        <label>Transacciones realizadas:</label>
        {{ $vino->TransaccionesRealizo }}
    </p>
</div>

<a href="{{ route('welcomeComprador') }}">Atrás</a>
<a href="/pagos/{{ $vino->idVino }}">Comprar</a>

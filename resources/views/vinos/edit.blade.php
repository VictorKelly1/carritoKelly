<h1>{{ $vino->nombre }}</h1>

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

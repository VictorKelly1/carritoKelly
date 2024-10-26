<x-layout meta-title="Productos" meta-description="productos">
    <h1>Productos</h1>
    <h2>Agrega un producto nuevo:</h2>
    <form action="{{ route('vino.agregar') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required>
        </div>
        <div>
            <label for="anio">Año:</label>
            <input type="number" id="anio" name="anio" min="1900" max="2100" required>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" required>
        </div>
        <label for="foto">Selecciona una foto:</label><br />
        <input type="file" id="foto" name="foto" accept="image/*">
        <div>
            <button type="submit">Agregar</button>
        </div>
    </form>

    @foreach ($vinos as $vino)
        <div style="display: flex; aling-items: baseline">
            <h2>Nombre: {{ $vino->nombre }}&nbsp;
                Tipo: {{ $vino->tipo }}&nbsp;
                Año: {{ $vino->anio }}&nbsp;
                Precio: {{ $vino->precio }}&nbsp;
                Stock: {{ $vino->cantidadDisp }}&nbsp;</h2>

        </div>
        <a href="/productos/{{ $vino->id }}">Editar</a>
    @endforeach
</x-layout>



{{-- @foreach ($vinos as $vino)
        <p>Nombre: {{ $vino->nombreVino }}&nbsp;
            Tipo: {{ $vino->tipo }}&nbsp;
            Año: {{ $vino->anio }}&nbsp;
            Precio: {{ $vino->precio }}&nbsp;
            Stock: {{ $vino->cantidadDisp }}&nbsp;</p>
        <p>Proovedor: {{ $vino->nombreVendedor }}&nbsp;
            {{ $vino->apellidoVendedor }}&nbsp;
            {{ $vino->aniosAntiguedad }} &nbsp; Años de antiguedad.
            {{ $vino->TransaccionesRealizo }} Transacciones Realizadas.</p>
        <br />
        <br />
    @endforeach --}}

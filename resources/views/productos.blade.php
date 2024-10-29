<x-layout meta-title="Productos" meta-description="productos">
    <h1>Mis productos</h1>
    <div class="productos-container">
        @foreach ($vinos as $vino)
            <div class="producto">
                <h2>Nombre: {{ $vino->nombre }}</h2>
                <p>Tipo: {{ $vino->tipo }}</p>
                <p>Año: {{ $vino->anio }}</p>
                <p>Precio: {{ $vino->precio }}</p>
                <p>Stock: {{ $vino->cantidadDisp }}</p>
                <a href="/productos/{{ $vino->id }}">Editar</a>
            </div>
        @endforeach
    </div>
    <h2>Agrega un producto nuevo:</h2>
    <form action="{{ route('vino.agregar') }}" method="POST" enctype="multipart/form-data">
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
        <div>
            <label for="foto">Selecciona una foto:</label><br />
            <input type="file" id="foto" name="foto" accept="image/*">
        </div>
        <div>
            <button type="submit">Agregar</button>
        </div>
    </form>


</x-layout>

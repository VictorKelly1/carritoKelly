<x-layout meta-title="Inicio" meta-description="Inicio">
    <h1>Mostrador</h1>
    <div>
        <label for="tipoFiltroInicio">Filtrar por tipo:</label>
        <select id="tipoFiltroInicio" name="tipoFiltroInicio" onchange="filtrarVinosInicio()">
            <option value="">Todos</option>
            <option value="tinto">Tinto</option>
            <option value="blanco">Blanco</option>
            <option value="rosado">Rosado</option>
            <!-- Agrega más tipos según sea necesario -->
        </select>

        <label for="buscadorInicio">Buscar por nombre:</label>
        <input type="text" id="buscadorInicio" placeholder="Buscar..." onkeyup="filtrarVinosInicio()">
    </div>

    <div class="productos-container">
        @foreach ($vinos as $vino)
            <div class="producto" data-tipo="{{ $vino->tipo }}" data-nombre="{{ $vino->nombreVino }}">
                <p>Nombre: {{ $vino->nombreVino }}</p>
                <p>Tipo: {{ $vino->tipo }}</p>
                <p>Año: {{ $vino->anio }}</p>
                <p>Precio: {{ $vino->precio }}</p>
                <p>Stock: {{ $vino->cantidadDisp }}</p>
                <p>Proveedor: {{ $vino->nombreVendedor }} {{ $vino->apellidoVendedor }}.</p>
                <p>{{ $vino->aniosAntiguedad }} Años de antigüedad.</p>
                <p>{{ $vino->TransaccionesRealizo }} Transacciones Realizadas.</p>
                <a href="/welcome/{{ $vino->idVino }}">Ver más</a>
            </div>
        @endforeach
    </div>
</x-layout>

<script>
    function filtrarVinosInicio() {
        const tipoFiltroInicio = document.getElementById('tipoFiltroInicio').value.toLowerCase();
        const buscadorInicio = document.getElementById('buscadorInicio').value.toLowerCase();
        const productos = document.querySelectorAll('.producto');

        productos.forEach(producto => {
            const tipo = producto.getAttribute('data-tipo').toLowerCase();
            const nombre = producto.getAttribute('data-nombre').toLowerCase();

            if ((tipoFiltroInicio === '' || tipo === tipoFiltroInicio) && (buscadorInicio === '' || nombre
                    .includes(buscadorInicio))) {
                producto.style.display = '';
            } else {
                producto.style.display = 'none';
            }
        });
    }
</script>

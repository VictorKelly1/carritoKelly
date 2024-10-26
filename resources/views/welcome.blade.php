<x-layout meta-title="Inicio" meta-description="Inicio">
    <h1>Inicio</h1>
    @foreach ($vinos as $vino)
        <p>Nombre: {{ $vino->nombreVino }}&nbsp;
            Tipo: {{ $vino->tipo }}&nbsp;
            Año: {{ $vino->anio }}&nbsp;
            Precio: {{ $vino->precio }}&nbsp;
            Stock: {{ $vino->cantidadDisp }}&nbsp;</p>
        <p>Proovedor: {{ $vino->nombreVendedor }}&nbsp;
            {{ $vino->apellidoVendedor }}.&nbsp;
            {{ $vino->aniosAntiguedad }} &nbsp; Años de antiguedad.
            {{ $vino->TransaccionesRealizo }} Transacciones Realizadas.</p>
        <a href="/welcome/{{ $vino->idVino }}">Ver mas</a>
        <br />
        <br />
    @endforeach
</x-layout>

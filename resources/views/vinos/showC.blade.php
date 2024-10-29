<h1>{{ $vino->nombre }}</h1>
<p>Nombre: {{ $vino->nombreVino }}&nbsp;</p>
</p>Tipo: {{ $vino->tipo }}&nbsp;</p>
</p>Año: {{ $vino->anio }}&nbsp;</p>
</p>Precio: {{ $vino->precio }}&nbsp;</p>
</p>Stock: {{ $vino->cantidadDisp }}&nbsp;</p>
<p>Proovedor: {{ $vino->nombreVendedor }}&nbsp;
<p>
<p>{{ $vino->apellidoVendedor }}&nbsp;
<p>
<p>{{ $vino->aniosAntiguedad }} &nbsp; Años de antiguedad
<p>
<p>{{ $vino->TransaccionesRealizo }} Transacciones Realizadas
<p>
    <a href="{{ route('welcomeComprador') }}">Atras</a>
    <a href="/pagos/{{ $vino->idVino }}"">Comprar</a>

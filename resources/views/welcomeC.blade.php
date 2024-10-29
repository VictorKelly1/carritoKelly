<x-layoutC meta-title="Inicio" meta-description="Inicio">
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
        <a href="/welcomeC/{{ $vino->idVino }}">Ver mas</a>
        <a href="/carrito/{{ $vino->idVino }}">Agregar al carrito</a>
        <br />
        <br />
    @endforeach

    {{-- <div class="carrito-sidebar" [class.active]="carritoVisible">
        <h3>Carrito de compras</h3>
        <ul>
            <li *ngFor="let producto of productosCarrito">
                {{-- {{ producto . nombre }} - {{ (producto . precio) | currency }}   
            </li>
        </ul>
        <button (click)="irAPagar()">Ir a Pagar</button>
    </div>
    <button class="toggle-carrito" (click)="toggleCarrito()">🛒</button> --}}

</x-layoutC>

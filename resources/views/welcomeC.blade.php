<x-layoutC meta-title="Inicio" meta-description="Inicio">
    <h1>Inicio</h1>
    <div class="productos-container"> <!-- Contenedor para los productos -->
        @foreach ($vinos as $vino)
            <div class="producto"> <!-- Clase producto para cada vino -->
                <p>Nombre: {{ $vino->nombreVino }}&nbsp;
                    Tipo: {{ $vino->tipo }}&nbsp;
                    Año: {{ $vino->anio }}&nbsp;
                    Precio: {{ $vino->precio }}&nbsp;
                    Stock: {{ $vino->cantidadDisp }}&nbsp;</p>
                <p>Proveedor: {{ $vino->nombreVendedor }}&nbsp;
                    {{ $vino->apellidoVendedor }}.&nbsp;
                    {{ $vino->aniosAntiguedad }} &nbsp; Años de antigüedad.
                    {{ $vino->TransaccionesRealizo }} Transacciones Realizadas.</p>
                <a href="/welcomeC/{{ $vino->idVino }}">Ver más</a>
                <a href="/carrito/{{ $vino->idVino }}">Agregar al carrito</a>
            </div>
        @endforeach
    </div> <!-- Cierre del contenedor productos-container -->

    <div class="carrito-sidebar" [class.active]="carritoVisible">
        <h3>Carrito de compras</h3>
        <ul>
            <li *ngFor="let producto of productosCarrito">
                {{-- {{ producto . nombre }} - {{ (producto . precio) | currency }} Descomenta esta línea cuando quieras mostrar los productos --}}
            </li>
        </ul>
        <button (click)="irAPagar()">Ir a Pagar</button>
    </div>
    <button class="toggle-carrito" (click)="toggleCarrito()">🛒</button>
</x-layoutC>

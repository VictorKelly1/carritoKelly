<x-layout meta-title="historial" meta-description="historial">
    <h1>Historial de transacciones</h1>
    {{-- pedidos.blade.php --}}
    {{-- pedidos.blade.php --}}
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">Nombre Comprador</th>
                <th style="border: 1px solid black;">Apellido Comprador</th>
                <th style="border: 1px solid black;">Nombre Vino</th>
                <th style="border: 1px solid black;">Cantidad</th>
                <th style="border: 1px solid black;">Fecha</th>
                <th style="border: 1px solid black;">Nombre Vendedor</th>
                <th style="border: 1px solid black;">Apellido Vendedor</th>
                <th style="border: 1px solid black;">Aprobar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaccions as $transaccion)
                <tr>
                    <td style="border: 1px solid black;">{{ $transaccion->nombreComprador }}</td>
                    <td style="border: 1px solid black;">{{ $transaccion->apellidoComprador }}</td>
                    <td style="border: 1px solid black;">{{ $transaccion->nombreVino }}</td>
                    <td style="border: 1px solid black;">{{ $transaccion->Cantidad }}</td>
                    <td style="border: 1px solid black;">{{ $transaccion->fecha }}</td>
                    <td style="border: 1px solid black;">{{ $transaccion->nombreVendedor }}</td>
                    <td style="border: 1px solid black;">{{ $transaccion->apellidoVendedor }}</td>
                    <td style="border: 1px solid black;">{{ $transaccion->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>



</x-layout>

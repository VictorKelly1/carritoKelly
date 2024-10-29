<x-layout meta-title="Pedidos" meta-description="Pedidos">
    <h1>Pedidos de clientes</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre Comprador</th>
                <th>Apellido Comprador</th>
                <th>Nombre Vino</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Nombre Vendedor</th>
                <th>Apellido Vendedor</th>
                <th>Aprobar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaccions as $transaccion)
                <tr>
                    <td>{{ $transaccion->nombreComprador }}</td>
                    <td>{{ $transaccion->apellidoComprador }}</td>
                    <td>{{ $transaccion->nombreVino }}</td>
                    <td>{{ $transaccion->Cantidad }}</td>
                    <td>{{ $transaccion->fecha }}</td>
                    <td>{{ $transaccion->nombreVendedor }}</td>
                    <td>{{ $transaccion->apellidoVendedor }}</td>
                    <td>
                        <form action="/aprobado/{{ $transaccion->idTransaccion }}" method="POST">
                            @csrf
                            <button type="submit">Aprobar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

{{-- {{ $transaccion->nombreComprador }} . ' ' . $transaccion->apellidoComprador --}}

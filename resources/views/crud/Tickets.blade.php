<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <h3 class="text-lg font-semibold mb-4">Lista de Tickets</h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Cliente</th>
                                <th>Descuento</th>
                                <th>Total</th>
                                <th>Fecha de Venta</th>
                                <!-- Agrega más columnas según tus necesidades -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->usuario->name }}</td> <!-- Asumiendo que hay una relación con el modelo User para obtener el nombre del usuario -->
                                    <td>{{ $ticket->cliente->nombre }}</td> <!-- Asumiendo que hay una relación con el modelo Cliente para obtener el nombre del cliente -->
                                    <td>{{ $ticket->porcentaje_descuento }}</td>
                                    <td>{{ $ticket->total }}</td>
                                    <td>{{ $ticket->fecha_venta }}</td>
                                    <!-- Agrega más celdas según tus necesidades -->
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-plantilla>

<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Inventario') }}
        </h2>
    </x-slot>
    <div>
        @extends('layouts.app') 
        @section('content')
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" method="GET" action="{{ route('producto.index') }}">
                    <input class="form-control me-4" type="search" name="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <br>
                <td>
                    @csrf
                    <button type="submit button" class="btn btn-primary btn-lg" onclick="enviarProductos()">Agregar al carrito</button>
                    <form id="carritoForm" method="POST" action="./Venta">
                        @csrf
                        <input type="hidden" name="productos" id="productosInput">
                    </form>
                </td>
            </div>
        </nav>
        
        <div style="overflow-x:auto;">
            <table class="table table-bordered border-primary" id="productos">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio menudeo</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lista_producto as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>{{ $item->precio_menudeo }}</td>
                        <td>
                            <input type="number" name="productos_seleccionados[]" id="productos_seleccionados_{{ $item->id }}" value="0" data-id="{{ $item->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
        @endsection
    </div>
</x-plantilla>

<script>
    function enviarProductos() {
        const productosConDatos = [];
        const inputsCantidad = document.querySelectorAll('input[name="productos_seleccionados[]"]');
        
        inputsCantidad.forEach((input) => {
            const cantidad = parseInt(input.value);
            if (cantidad > 0) {
                const id = input.getAttribute('data-id');
                const nombre = input.getAttribute('data-nombre');
                const precioMenudeo = parseFloat(input.getAttribute('data-precio-menudeo'));
                
                const producto = {
                    id: id,
                    nombre: nombre,
                    cantidad: cantidad,
                    precio_menudeo: precioMenudeo
                };
                
                productosConDatos.push(producto);
            }
        });

        document.getElementById('productosInput').value = JSON.stringify(productosConDatos);
        document.getElementById('carritoForm').submit();
    }

    new DataTable('productos');
</script>

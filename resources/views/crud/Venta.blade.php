<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venta') }}
        </h2>
    </x-slot>
    <div>
        @extends('layouts.app') 
        @section('content')
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <td>
                </td>
            </div>
        </nav>
        <form id="carritoForm" method="POST" action="{{ route('Venta') }}">
            @csrf
            <button type="button" class="btn btn-primary btn-lg" onclick="ActualizarProductos()">Actualizar Carrito</button>
            <input type="hidden" name="productos" id="productosInput" />
        </form>
        <form id="ventaForm" method="POST" action="{{ route('tickets.create') }}">
            @csrf
            <button type="button" class="btn btn-primary btn-lg" onclick="ventaProductos()">Realizar Venta</button>
            <input type="hidden" name="productos" id="productosVentaInput" />
        </form>

        <table class="table" id="carritoProductos">
            <thead class="table-dark">
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio Menudeo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productosCompletos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio_menudeo }}</td>
                        <td>
                            <input type="number" name="productos_seleccionados[]" id="productos_seleccionados_{{ $producto->id }}" value="{{ $producto->cantidad }}" data-id="{{ $producto->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endsection

        <script>
            function ActualizarProductos() {
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
                // Cambia la acción del formulario a la página actual
                document.getElementById('carritoForm').action = '{{ route("Venta") }}';
                document.getElementById('carritoForm').submit();
            }
            function ventaProductos() {
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

                document.getElementById('productosVentaInput').value = JSON.stringify(productosConDatos);
                // Cambia la acción del formulario a la página actual
                document.getElementById('ventaForm').submit();
            }
            /*function ventaProductos() {
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

                console.log(JSON.stringify(productosConDatos));
                document.getElementById('productosInput').value = JSON.stringify(productosConDatos);
                document.getElementById('ventaForm').submit();
            }//*/

            function obtenerProductosConDatos() {
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

                return productosConDatos;
            }
        </script>
    </div>
</x-plantilla>

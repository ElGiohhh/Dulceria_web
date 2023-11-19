<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venta') }}
        </h2>
    </x-slot>
   <div>
    @extends('layouts.app') 
    @section('content')
    
    <table class="table" id="carritoProductos">
    <thead class="table-dark">
        <tr>
        <th>ID Producto</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio Menudeo</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se llenarán dinámicamente los productos seleccionados -->
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Suponiendo que tienes los datos de los productos en la variable productosSeleccionados
        const productos_seleccionados = [
            // ... datos de los productos
        ];

        const tablaProductos = document.getElementById('carritoProductos');

        function mostrarProductosSeleccionados() {
            const tbody = tablaProductos.querySelector('tbody');
            tbody.innerHTML = ''; // Limpiar el contenido previo

            productos_seleccionados.forEach(producto => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${producto.id}</td>
                <td>${producto.nombre}</td>
                <td>${producto.descripcion}</td>
                <td>${producto.cantidad}</td>
                <td>${producto.precio_menudeo}</td>
                <!-- Agrega más campos si es necesario -->
            `;
            tbody.appendChild(row);
            });
        }

        mostrarProductosSeleccionados(); // Llama a esta función para mostrar los productos al cargar la página
        });

    </script>
    </tbody>
    </table>


     @endsection
    </div>

</x-plantilla>

<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venta') }}
        </h2>
    </x-slot>
   <div>
    @extends('layouts.app') 
    @section('content')
    
    
        <div id="productosEnCarrito"></div>
        const productosSeleccionados = [1, 3, 5]; 
        function obtenerDetallesProducto(id) {
            
            return {
                nombre: `Producto ${id}`,
                precio: 19.99 
                // Otros detalles del producto...
            };
        }

    
        function mostrarProductosSeleccionados() {
            const productosEnCarrito = document.getElementById('productosEnCarrito');
            
            
            productosEnCarrito.innerHTML = '';
            
            
            productosSeleccionados.forEach((id) => {
                const producto = obtenerDetallesProducto(id);
                
            
                const productoHTML = document.createElement('div');
                productoHTML.innerHTML = `
                    <table id="productosEnCarrito">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                `;
                
                
                productosEnCarrito.appendChild(productoHTML);
            });
        }


     mostrarProductosSeleccionados();


     @endsection
    </div>

</x-plantilla>

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
    <script>
    function enviarProductos() {
        // Obtener todos los checkboxes con el nombre 'productos_seleccionados[]'
        const checkboxes = document.querySelectorAll('input[name="productos_seleccionados[]"]:checked');
        
        // Crear un array para almacenar los valores seleccionados
        const productosSeleccionados = [];
        
        // Recorrer los checkboxes seleccionados y obtener sus valores
        checkboxes.forEach((checkbox) => {
            productosSeleccionados.push(checkbox.value);
        });
        
        // Crear un objeto con los datos que se enviarán en la solicitud POST
        const data = {
            productos_seleccionados: productosSeleccionados
        };
        
        // Realizar la solicitud POST utilizando Fetch API
        fetch('./Carrito', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            // Manejar la respuesta si es necesario
            console.log('Solicitud POST completada', response);
            // Puedes realizar acciones adicionales después de la solicitud POST
        })
        .catch(error => {
            // Manejar errores en la solicitud
            console.error('Error en la solicitud POST', error);
        });
    }

    </script>
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
                    <th>Precio mayoreo</th>
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
                        <td>{{ $item->precio_mayoreo }}</td>
                        <td>
                        <input type="checkbox" name="productos_seleccionados[]"  id="productos_seleccionados[]" value="{{ $item->id }}">
                        
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
new DataTable('productos')
</script>
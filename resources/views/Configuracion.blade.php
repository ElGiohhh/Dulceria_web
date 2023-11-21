<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuracion') }}
        </h2>
    </x-slot>
            <button type="button" class="btn btn-success btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#registrartra">
                <x-logo></x-logo>  Registrar producto
            </button>
            <button type="button" class="btn btn-success btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#ModalCL">
               <x-logo></x-logo>     Registrar Cliente
            </button>
            <br>
            <button type="button" class="btn btn-danger  btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#Eliminar">
            <x-logoa></x-logoa>  Eliminar producto
            </button>
            <button type="button" class="btn btn-danger  btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#EliminarCl">
            <x-logoa></x-logoa>  Eliminar Cliente
            </button>
            <br>
            <button type="button" class="btn btn-primary btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#modalId">
            <x-ticket></x-ticket> Mostrar Tickets
            </button>
            
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="registrartra" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{ route('producto.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                        <x-input-label for="nombre" :value="__('nombre')" />
                        <br>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        
                        <div class="mt-4">
                        <x-input-label for="correo" :value="__('descripcion')" />
                        <br>
                        <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required autocomplete="descripcion" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                        <x-input-label for="cantidad" :value="__('cantidad')" />
                        <br>
                        <x-text-input id="cantidad" class="block mt-1 w-full" type="int" name="cantidad" :value="old('cantidad')" required autocomplete="cantidad" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                        <x-input-label for="precio_menudeo" :value="__('precio_menudeo')" />
                        <br>
                        <x-text-input id="precio_menudeo" class="block mt-1 w-full" type="double" name="precio_menudeo" :value="old('precio_menudeo')" required autocomplete="precio_menudeo" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                        <x-input-label for="precio_mayoreo" :value="__('precio_mayoreo')" />
                        <br>
                        <x-text-input id="precio_mayoreo" class="block mt-1 w-full" type="double" name="precio_mayoreo" :value="old('precio_mayoreo')" required autocomplete="precio_mayoreo" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary ms-4" style="background-color: #6610f2; border-color: #6610f2">
                        {{ __('Registro') }}
                        </button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="ModalCL" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="GET" action="#">
                        <div>
                        <x-input-label for="Nombre" :value="__('Nombre')" />
                        <br>
                        <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                        <x-input-label for="descuento" :value="__('Descuento')" />
                        <br>
                        <x-text-input id="descuento" class="block mt-2 w-full" type="number" name="descuento" :value="old('descuento')" required autofocus autocomplete="descuento" />
                        <x-input-error :messages="$errors->get('descuento')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary ms-4" style="background-color: #6610f2; border-color: #6610f2">
                        {{ __('Registro') }}
                        </button>
                        </div>
                        </form>
                        </div>
                        <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="Eliminar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="GET" action="{{ route('producto.store') }}">
                    <div>
                    <x-input-label for="nombre" :value="__('nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                    <button class="btn btn-primary ms-4" style="background-color: #fd7e14; border-color: #fd7e14">
                        {{ __('Registro') }}
                    </button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="EliminarCl" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="GET" action="/Registro">
                    <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                    <button class="btn btn-primary ms-4" style="background-color: #fd7e14; border-color: #fd7e14">
                        {{ __('Registro') }}
                    </button>
                    </div>
                    </form>
                    </div>
                        
                    </div>
                </div>
            </div>

            
            
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id Producto</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Precio Menudeo</th>
                                            <th>Precio Mayoreo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($item as $producto)
                                            <tr>
                                                <td>{{ $producto->getIdProducto() }}</td>
                                                <td>{{ $producto->getNombre() }}</td>
                                                <td>{{ $producto->getDescripcion() }}</td>
                                                <td>{{ $producto->getCantidad() }}</td>
                                                <td>{{ $producto->getPrecioMenudeo() }}</td>
                                                <td>{{ $producto->getPrecioMayoreo() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($auto_cerrar)
                                    <a href="{{ route('Configuracion', ['User' => $usuario]) }}" class="btn btn-primary">
                                        Ir al menú
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">
                            <x-ticket-detallado></x-ticket-detallado> Mostrar
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Optional: Place to the bottom of scripts -->
            <script>
                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
            
            </script>
                
</x-plantilla>  
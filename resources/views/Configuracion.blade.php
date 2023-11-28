<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuracion') }}
        </h2>
    </x-slot>
            <button type="button" class="btn btn-success btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#registrartra">
                <x-alta></x-alta>  Registrar producto
            </button>
            <button type="button" class="btn btn-success btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#ModalCL">
               <x-logo></x-logo>     Registrar Cliente
            </button>
            <br>
            <button type="button" class="btn btn-danger  btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#Eliminar">
            <x-baja></x-baja>  Eliminar producto
            </button>
            <button type="button" class="btn btn-danger  btn-lg m-3 p-3" data-bs-toggle="modal" data-bs-target="#EliminarCl">
            <x-logoa></x-logoa>  Eliminar Cliente
            </button>
            <br>
           <!-- Button trigger modal 
           <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#Ticket">
             Launch
           </button>-->
            
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="registrartra" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Registro de Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{ route('producto.store') }}">
                            @csrf

                            <!-- Nombre -->
                            <div>
                                <x-input-label for="nombre" :value="__('Nombre')" />
                                <br>
                                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                            </div>

                            <!-- Descripción -->
                            <div class="mt-4">
                                <x-input-label for="descripcion" :value="__('Descripción')" />
                                <br>
                                <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required autocomplete="descripcion" />
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>

                            <!-- Cantidad -->
                            <div class="mt-4">
                                <x-input-label for="cantidad" :value="__('Cantidad')" />
                                <br>
                                <x-text-input id="cantidad" class="block mt-1 w-full" type="int" name="cantidad" :value="old('cantidad')" required autocomplete="cantidad" />
                                <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                            </div>

                            <!-- Precio Menudeo -->
                            <div class="mt-4">
                                <x-input-label for="precio_menudeo" :value="__('Precio Menudeo')" />
                                <br>
                                <x-text-input id="precio_menudeo" class="block mt-1 w-full" type="double" name="precio_menudeo" :value="old('precio_menudeo')" required autocomplete="precio_menudeo" />
                                <x-input-error :messages="$errors->get('precio_menudeo')" class="mt-2" />
                            </div>

                            <!-- Precio Mayoreo -->
                            <div class="mt-4">
                                <x-input-label for="precio_mayoreo" :value="__('Precio Mayoreo')" />
                                <br>
                                <x-text-input id="precio_mayoreo" class="block mt-1 w-full" type="double" name="precio_mayoreo" :value="old('precio_mayoreo')" required autocomplete="precio_mayoreo" />
                                <x-input-error :messages="$errors->get('precio_mayoreo')" class="mt-2" />
                            </div>

                            <!-- Precio Compra -->
                            <div class="mt-4">
                                <x-input-label for="precio_compra" :value="__('Precio Compra')" />
                                <br>
                                <x-text-input id="precio_compra" class="block mt-1 w-full" type="double" name="precio_compra" :value="old('precio_compra')" required autocomplete="precio_compra" />
                                <x-input-error :messages="$errors->get('precio_compra')" class="mt-2" />
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
                            <h5 class="modal-title" id="modalTitleId">Registro de cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form method="POST" action="{{ route('cliente.store') }}">
                                @csrf

                                <!-- Nombre -->
                                <div>
                                    <x-input-label for="nombre" :value="__('Nombre')" />
                                    <br>
                                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                                </div>

                                <!-- Teléfono -->
                                <div class="mt-4">
                                    <x-input-label for="telefono" :value="__('Teléfono')" />
                                    <br>
                                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autocomplete="telefono" />
                                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                                </div>

                                <!-- Descuento -->
                                <div class="mt-4">
                                    <x-input-label for="descuento" :value="__('Descuento')" />
                                    <br>
                                    <x-text-input id="descuento" class="block mt-1 w-full" type="text" name="descuento" :value="old('descuento')" required autocomplete="descuento" />
                                    <x-input-error :messages="$errors->get('descuento')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="btn btn-primary ms-4" style="background-color: #6610f2; border-color: #6610f2">
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
            <div class="modal fade" id="Eliminar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Eliminar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('producto.destroy') }}">
                                @csrf
                                @method('DELETE')

                                <!-- Nombre del Producto a Eliminar -->
                                <div>
                                    <x-input-label for="nombre" :value="__('Nombre del Producto a Eliminar')" />
                                    <br>
                                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="btn btn-danger ms-4" style="background-color: #dc3545; border-color: #dc3545">
                                        {{ __('Eliminar Producto') }}
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
                            <h5 class="modal-title" id="modalTitleId">Eliminar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{ route('cliente.destroy') }}">
                        @csrf
                        @method('DELETE')

                        <!-- Name -->
                        <div>
                        <x-input-label for="nombre" :value="__('nombre')" />
                        <br>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
            <div class="modal fade" id="Ticket" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Registro de Producto</h5>
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
           
          
            
                
</x-plantilla>  


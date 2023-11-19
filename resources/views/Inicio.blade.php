<x-plantilla>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <!-- Modal trigger button -->
    <button type="button" class="btn btn-primary btn-lg m-5 p-5" data-bs-toggle="modal" data-bs-target="#modalId">
      Whatsapp <x-Informacion></x-Informacion>
    </button>
    
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
                <p>Codigo QR para Whatsapp</p>
                <img src="{{ asset('imagenes/qrcode.png') }}" class="img-thumbnail border rounded" alt="..."  />
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Mostrar la ventana emergente al hacer clic en el botón
            $("#open-popup").click(function () {
                $("#popup-container").show();
            });

            // Ocultar la ventana emergente al hacer clic fuera de ella
            $(document).mouseup(function (e) {
                var container = $("#popup-container");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.hide();
                }
                
            });
        });
    </script>
</x-plantilla>



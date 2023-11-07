<x-app-layout>
    <x-slot name="header">
        <h2> <!--class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">-->
            {{ __('Configuracion') }}
        </h2>
        
    </x-slot>
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <form action="register.blade.php">
        <fieldset disabled="">
          <legend>Boton de registro</legend>
          <button type="submit" class="btn btn-primary">registrar</button>
        </fieldset>
      </form>
      
      <!-- End Example Code -->
    </body>
  </html>
    
    

    
</x-app-layout>
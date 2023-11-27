<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dulceria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">



</head>
<header>
    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
      <div class="bg-dark p-4">
        <h5 class="text-body-emphasis h4">Collapsed content</h5>
        <span class="text-body-secondary">Toggleable via the navbar brand.</span>
      </div>
    </div>
    <nav class="navbar sticky-top bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" aria-current="page" href="dashboard">Inicio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/producto"> <x-inve></x-inve> Inventario</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="/Venta"> <x-vent></x-vent> Venta</a>
              </li>
             <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/Configuracion"> <x-confi></x-confi> Configuracion</a>
              </li>
            </ul>
            
          </div>
        </div>
     
      

        <!-- Responsive Settings Options -->
        <div class="pt-2 pb-1 bordert border-gray-200 dark:border-gray-600">
            <div class="px-3">
                <div class="text-white ">{{(auth()!= null && auth()->user() != null)?auth()->user()->name:"No login"}}</div>
                <!--<div class="font-medium text-sm text-gray-500">{{(auth()!= null && auth()->user() != null)?auth()->user()->email:"No login"}}</div>-->
            </div>
                <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                <button class="btn btn-outline-danger" >
                {{ __('Log Out') }}
                </button>
                </x-responsive-nav-link>
                </form>
                </div>
            </div>
        </div>
    </div>

          
  </nav>
</header>
<body>
     
    <div class="container-fluid">{{ $slot }}</div>
       

    
</body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>src="https://code.jquery.com/jquery-3.7.0.js"</script>

<script>src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"</script>

<script>src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"</script>





</html>
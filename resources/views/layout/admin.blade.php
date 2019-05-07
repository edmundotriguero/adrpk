<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RPK. Srl</title>
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('dist/css/styles_rpk.css')}}">
    <!--link rel="stylesheet" href="{{asset('dist/css/font-awesome_v5.7.0.css')}}"-->
</head>
<body>
    <!--Menu Izquierdo-->
    
        <div class="contenedor-menu invisible">
                <spam class=" boton_spam text-center"><i class="fas fa-bars "></i> </spam>
                <!--<spam class="fas fa-bars btn" id="boton_spam"></spam>
               
                -->
                <nav>
                    <ul id="menu_principal">
                        <li><a  href="{{url('contract')}}"><span class="fas fa-file-signature  principales"></span>Orden de Pauta</a></li>
                        <li>
                            <label for="drop-1">
                                <span class="fas fa-tv principales"></span>
                                Productos
                                <span class="derecha-mif derecha"></span>
                                <span class="rpk-expand derecha"></span>
                            </label>
                            <input type="checkbox" id="drop-1">
        
                            <ul>
                                <li><a href="{{url('client')}}"><i class="fas fa-ghost"></i> Clientes</a></li>
                                <li><a href="{{url('category')}}"><i class="fas fa-ghost"></i> Categorias</a></li>
                                <li><a href="{{url('location')}}"><i class="fas fa-ghost"></i> Locaciones</a></li>
                                <li><a href="{{url('product')}}"><i class="fas fa-ghost"></i> Productos</a></li>
                               
                                
                            </ul>
                        </li>
                        <li>
                            <label for="drop-2">
                                <span class="fas fa-list-ul principales"></span>
                                Listas
                                <span class="derecha-mif derecha"></span>
                                <span class="rpk-expand derecha"></span>
                            </label>
                            <input type="checkbox" id="drop-2">
        
                            <ul>
                                <li><a href="{{url('video')}}"><i class="fab fa-youtube"></i> Videos</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
    <!--/Menu Izquierdo-->

    <!--Navbar de la img y logout -->


    <!-- Just an image -->

    <header class="container">
        <nav class="navbar navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="#">
                <img class="" src="{{asset('dist/svg/logo-rpk.svg')}}" width="150" height="50" alt="">
            </a>
            <a class="navbar-brand rounded-pill btn" href="#">
                
                    <i class="fas fa-sign-out-alt"></i>
                Salir
            </a>

        </nav>

    </header>
    
    <!--/Navbar de la img y logout -->
    <!--Conetenedor Principal-->
    <section class="container ">
            <div class="card mt-2 shadow-sm" >
                    <div class="card-body">
                      @yield("contenido")
                      
                    </div>
                  </div>
    </section>
     <!--/Conetenedor Principal-->


            <script src="{{asset('dist/js/jquery-3.3.1.slim.min.js')}}" ></script>
            <script src="{{asset('dist/js/popper.min.js')}}" ></script>
            <script src="{{asset('dist/js/bootstrap.js')}}" ></script>
            <script src="{{asset('dist/js/font-awesome_v5.7.0.js')}}" ></script>
            <script src="{{asset('dist/js/rpk.js')}}"></script>
            @stack('scripts')
</body>
</html>
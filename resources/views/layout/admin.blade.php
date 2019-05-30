<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.12
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="es">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="RPK Srl. Sistema de administracion publicitaria">
  <meta name="author" content="Edmundo Triguero">

  <title>RPK Admin</title>
  <!-- Icons-->
  <link href="{{asset('dist/node_modules/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
  <link href="{{asset('dist/node_modules/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
  <link href="{{asset('dist/node_modules/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('dist/node_modules/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('dist/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img class="navbar-brand-full" src="{{asset('dist/img/brand/logo.svg')}}" width="89" height="25" alt="RPK">
      <img class="navbar-brand-minimized" src="{{asset('dist/img/brand/logo.svg')}}" width="30" height="30" alt="RPK">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- menu horizontal -->
    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Dashboard</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Clientes</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Locaciones</a>
      </li>
    </ul>
    <!-- menu horizontal fin -->

    <!-- avatar cuenta de usuario -->
    <ul class="nav navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar" src="{{asset('dist/img/avatars/6.jpg')}}" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account: {{ Auth::user()->name }}</strong>
          </div>

          {{-- <a class="dropdown-item" href="#">
              <i class="fa fa-comments"></i> Comments
              <span class="badge badge-warning">42</span>
            </a> --}}

          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="{{url('/logout')}}" 
          onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            

            <i class="fa fa-lock"></i> {{ __('Logout') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
    <!-- avatar cuenta de usuario  fin -->



  </header>
  <div class="app-body">
    <!-- menu vertical -->
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="nav-icon icon-speedometer"></i> Dashboard
              <!-- <span class="badge badge-primary">NEW</span> -->
            </a>
          </li>
          <li class="nav-title">Theme</li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('contract')}}"">
                <i class=" nav-icon icon-pencil"></i> Ordenes de Pauta</a>
          </li>


          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-cursor"></i> Productos</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="{{url('category')}}">
                  <i class="nav-icon icon-cursor"></i> Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('location')}}">
                  <i class="nav-icon icon-cursor"></i> Locaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('client')}}">
                  <i class="nav-icon icon-cursor"></i> Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('product')}}">
                  <i class="nav-icon icon-cursor"></i> Productos</a>
              </li>

            </ul>
          </li>

          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-cursor"></i> Videos</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="{{url('video')}}">
                  <i class="nav-icon icon-cursor"></i> Videos</a>
              </li>


            </ul>
          </li>

        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <!-- menu vertical fin -->


    <main class="main">

      <!-- Breadcrumb-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
          <a href="#">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">

        </li>
      </ol>

      <!-- principal main -->
      <div class="container-fluid">
        @yield("contenido")

      </div>
      <!-- principal fin -->
    </main>
    <aside class="aside-menu">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
            <i class="icon-list"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
            <i class="icon-speech"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
            <i class="icon-settings"></i>
          </a>
        </li>
      </ul>


    </aside>
  </div>

  <!-- CoreUI and necessary plugins-->
  <script src="{{asset('dist/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('dist/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('dist/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('dist/node_modules/pace-progress/pace.min.js')}}"></script>
  <script src="{{asset('dist/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('dist/node_modules/@coreui/coreui/dist/js/coreui.min.js')}}"></script>
  <!-- Plugins and scripts required by this view-->
  <!-- <script src="node_modules/chart.js/dist/Chart.js"></script> -->
  <script
    src="{{asset('dist/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js')}}">
  </script>
  <!-- <script src="js/main.js"></script> -->
</body>

</html>
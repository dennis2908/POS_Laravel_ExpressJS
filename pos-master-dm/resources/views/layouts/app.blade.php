<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('/adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/adminLTE/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('/adminLTE/plugins/datepicker/datepicker3.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <!-- Header -->
  <header class="main-header">

    <a href="#" class="logo">
      <span class="logo-mini"><b>DM</b></span>
     <span class="logo-lg"><b>Dennis</b>Manullang</span>
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('/images/'.Auth::user()->foto) }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <img src="{{ asset('/images/'.Auth::user()->foto) }}" class="img-circle" alt="User Image">

                    <p>
                      {{ Auth::user()->name }}
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-flat pull-center" style="width:100px" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>

            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- End Header -->


  <!-- Sidebar -->
  <aside class="main-sidebar">

    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGASI</li>

      @if( Auth::user()->level == 1 )
        <li><a href="{{ route('produk.index') }}"><i class="fa fa-cubes"></i> <span>Produk</span></a></li>
        <li><a href="{{ route('penjualan.index') }}"><i class="fa fa-upload"></i> <span>Penjualan</span></a></li>
      @endif
      </ul>
    </section>
  </aside>
  <!-- End Sidebar -->

  <!-- Content  -->
  <div class="content-wrapper">
   <section class="content-header">
      <h1>
        @yield('title')
      </h1>
      <ol class="breadcrumb">
        @section('breadcrumb')
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        @show
      </ol>
    </section>

    <section class="content">
        @yield('content')
    </section>
  </div>
  <!-- End Content -->
  
@yield('script')

</body>
</html>
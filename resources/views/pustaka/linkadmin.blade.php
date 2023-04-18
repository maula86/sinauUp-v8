<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('admin/assets/img/apple-icon.png')}} ">
  <link rel="icon" type="image/png" href="{{url('admin/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ADMIN
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{url('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{url('admin/assets/css/now-ui-dashboard3.css?v=1.3.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{url('admin/assets/demo/demo.css')}}" rel="stylesheet" />
  <link href="{{asset('fontawesome-5/css/all.cs')}}">
  <style>
    .muncul
    {
      margin-top:70px;
      margin-left:10px;
      /* margin-right:70px;
      margin-bottom:70px; */
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" style="background-color:#163652;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          ST
        </a>
        <a href="#" class="simple-text logo-normal">
          Safa Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="@yield('home') ">
            <a href="{{url('/home')}}">
              <i class="now-ui-icons education_hat"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="@yield('datapinjam')">
            <a href="{{url('datapinjam')}}">
              <i class="now-ui-icons location_bookmark"></i>
              <p>Data Peminjam</p>
            </a>
          </li>

           <li class="@yield('databuku') ">
              <a href="{{url('databuku')}}">
                <i class="now-ui-icons education_agenda-bookmark"></i>
                <p>Data BUKU</p>
              </a>
            </li>

            <li class="@yield('dataanggota') ">
              <a href="{{url('dataanggota')}}">
                <i class="now-ui-icons business_badge"></i>
                <p>Profil Anggota</p>
              </a>
            </li>


        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-warning navbar-absolute" style="background-color:#163652;">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">
              @yield('titlenav')
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="now-ui-icons users_single-02"></i>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      {{-- <div class="panel-header panel-header-lg"> --}}
        <div class="muncul">
          @yield('konten')
        </div>
        {{-- <canvas id="bigDashboardChart"></canvas> --}}
      {{-- </div> --}}
      <footer class="footer text-light">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="#">
                  Safa Tim
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="#">Maula_Arif</a>. Coded by
            <a href="#">Safa Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  {{-- <script src="{{url('admin/assets/js/core/jquery-3.3.1.slim.min.js')}}"></script> --}}
  <script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
  <script src="{{url('admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chart JS -->
  <script src="{{url('admin/assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{url('admin/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{url('admin/assets/js/now-ui-dashboard.min.js?v=1.3.0')}}" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  {{-- <script src="{{url('admin/assets/demo/demo.js')}}"></script> --}}

  {{-- Data Table --}}
  <script src="{{ url('tabel/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('tabel/js/dataTables.bootstrap4.min.js') }}"></script>
  {{-- Sweetalert --}}
  <script src="{{ url('sweetalert/dist/sweetalert2.all.js') }}"></script>
  <script src="{{asset('fontawesome-5/js/all.js')}}"></script>
  {{-- counterJS --}}
  <script src="{{url('counter/jquery.counterup.js')}}"></script>
  <script src="{{url('counter/jquery.waypoints.js')}}"></script>
  <script>
      $('#myCollapsible').collapse({
      toggle: false
    })
  </script>
  @yield('addjs')
</body>

</html>

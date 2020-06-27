<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="{{URL::asset('admin-asset/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet">
<link href="{{URL::asset('admin-asset/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin-asset/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


</head>
<body>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
    	<!-- Brand -->
      <a class="navbar-brand pt-0" href="">
        <img src="{{URL::asset('assets/img/Footer-logo.svg')}}" alt="logo" class="navbar-brand-img" width="100px" style="max-height: inherit;">
      </a>
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- User -->
      <ul class="nav align-items-center d-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./admin-asset/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>

            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">
                <img src="{{URL::asset('assets/img/Footer-logo.svg')}}" alt="logo" class="navbar-brand-img" width="100px" style="max-height: inherit; height: inherit;">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <!-- <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form> -->
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{route('home')}}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('users')}}">
              <i class="ni ni-books text-yellow"></i>Users
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="">
              
              <i class="ni ni-archive-2 text-info"></i>Home Page
            </a>
          </li>
          

          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="ni ni-folder-17 text-orange"></i>About Page
            </a>
          </li>





          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="ni ni-building text-pink"></i>Partners
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link " href="">
              <i class="ni ni-single-02 text-yellow"></i>Exhibitors
            </a>
          </li> -->
           <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
          
          </ul>
      </div>
    </div>
  </nav>
    @yield('content')
     <script src="{{URL::asset('admin-asset/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{URL::asset('admin-asset/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('admin-asset/js/argon-dashboard.min.js?v=1.1.1')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <script>


     $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});






    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      
      tinymce.init({selector:'textarea.description-body',forced_root_block : ""});
        tinymce.init({selector:'input.title-body',forced_root_block : ""});
  </script>

  </body>

 </html>
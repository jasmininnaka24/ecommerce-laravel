@if(Auth::check())

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/general_styles.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/tables.css')}}" />
    <link rel="shortcut icon" href="{{asset('assets/images/coffee.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/icons/fontawesome/css/all.css') }}" />
    <title>La Casa de Convivencia | E-commerce</title>
</head>
<body class="bgc-light">
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .container {
      display: flex;
      flex-direction: row;
      height: 100vh;
    }
    .sidebar {
      width: 250px;
      color: #ebe8e8;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: left;
      padding-top: 50px;
      position: fixed; 
      left: 0; 
      top: 0; 
      bottom: 0; 
    }
      .sidebar a {
    color:#ebe8e8;
    text-decoration: none;
    display: flex;
    align-items: center;
    margin-top: 20px;
    margin-left: 20px;
    position: relative;
    transition: all 0.3s ease;
  }

    .sidebar a:before {
      content: "";
    position: absolute;
    height: 2px;
    width: 0;
    background: #ebe8e8;
    top: 2rem;
    transition: width .3s cubic-bezier(1,0,0,1);
    display: inline-block;
    } 

    .sidebar a:hover:before {
      width: 50%;
    }

    .sidebar a i {
      margin-right: 10px;
    }

    .content {
      flex: 1;
      padding: 20px;
      margin-left: 250px; 
    }
    
    .icon {
      font-size: 24px;
    }
    /* Customize the scroll bar */
        ::-webkit-scrollbar {
      height: 5px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #804916;
      border-radius: 5px;
    }

    ::-webkit-scrollbar-track {
      background-color: #F2E9D6;
      }
  </style>
  
     
        <div class="container">
          <div class="sidebar bgc-primary">
            <a href="{{route('admin_dashboard')}}" class="font-reg mb-4" style="margin-left: 2rem; font-size: 20px;">
              <i class="icon fas fa-home" style="color:#FAEBD7;"></i>
              Dashboard
            </a>
            
            <a href="{{route('products')}}" class="font-reg mb-4" style="margin-left: 2rem; font-size: 20px; position: relative;">
              <i class="icon fas fa-shopping-cart" style="color:#FAEBD7;"></i>
              Products
            </a>

            <a href="{{route('orders')}}"  class="font-reg mb-4" style="margin-left: 2rem; font-size: 20px;" >
              <i class="icon fas fa-file-alt" style="margin-left: .7rem; color: #FAEBD7;"></i>
              Orders
            </a>

            <a href="{{route('customers')}}" class="font-reg mb-4" style="margin-left: 2rem; font-size: 20px;">
              <i class="icon fas fa-users" style="color: #FAEBD7;"></i>
              Customers
            </a>
          </div>
          
          <div class="content">
          
            <div class="d-flex align-items-center justify-content-between">
              
              <div>
                <i class="icon fas fa-bars"></i>
                <a href="{{route('admin_dashboard')}}" id="logo" class="txt-dark font-med" style="font-size: 30px">LOGO</a>
              </div>
              <div class="d-flex align-items-center">
                <nav class="navbar navbar-expand-md navbar-light mx-2">
                      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                          <span class="navbar-toggler-icon"></span>
                      </button> --}}
      
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">

      
                          <!-- Right Side Of Navbar -->
                          <ul class="navbar-nav ms-auto">
                              <!-- Authentication Links -->
                              @guest
                                  @if (Route::has('login'))
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                      </li>
                                  @endif
      
                                  @if (Route::has('register'))
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                      </li>
                                  @endif
                              @else
                                  <li class="nav-item dropdown">
                                      <a id="navbarDropdown" class="nav-link dropdown-toggle font-reg txt-primary" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                          {{ Auth::user()->name }}
                                      </a>
      
                                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item font-reg" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                              {{ __('Logout') }}
                                          </a>
      
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                              @csrf
                                          </form>
                                      </div>
                                  </li>
                              @endguest
                          </ul>
                      </div>
                  </nav>
                <i class="fa-solid fa-circle-user" style="font-size: 30px;"></i>
              </div>
            </div>
            
            

            @yield('content')
                                      
                          

            <script src="{{ asset('assets/bootstrap-5.1.3-dist/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/js/product_profile.js') }}"></script>
            <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
            <script src="{{ asset('assets/js/jquery-3.6.0.min.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

            <script>
              jQuery(document).ready(function($){
                $('#example').DataTable({
                  language: {
                    lengthMenu: "T'en veux _MENU_ par page",
                    info: "T'es bigleux ? c'est la page _PAGE_ sur _PAGES_",
                    search: "Cherche bouffon !",
                    paginate: {
                      first:      "Premier",
                      last:       "Précédent",
                      next:       "Suivant",
                      previous:   "Dernier"
                    }
                  }
                });
              });

              $(document).ready(function() {
                $('#myTable').DataTable();
              });
            </script>
        </body>
      </html>
      @endif

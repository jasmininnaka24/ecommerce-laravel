<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/general_styles.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/tables.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/icons/fontawesome/css/all.css')}}" />
    <link rel="shortcut icon" href="{{asset('assets/images/coffee.ico')}}" type="image/x-icon">
    <title>La Casa de Convivencia | E-commerce</title>
    <style>
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
      .btn:hover, .btn:focus, .btn:active, .btn.highlighted {
        background: var(--bgc-accent);
        color: var(--text-primary);
        border: var(--bgc-primary) 1px solid;
      }
    </style>
</head>
<body class="bgc-light">
    <header class="container">
      <nav class="d-flex align-items-center justify-content-between m-4">
          <div class="d-flex align-items-center">
            <a href="{{route('index')}}" id="logo" class="txt-dark font-med" style="font-size: 30px">LOGO</a>
          </div>
    
          <ul id="nav-list" class="d-flex align-items-center pt-4 justify-content-center" style="margin-left: 3rem; margin-right: -3rem">
            <li class="nav-item">
              <a class="a txt-dark nav-link font-reg" style="font-size: 18px;" href="{{route('index')}}">Home</a></li>
              <li class="nav-item dropdown">
                <a class="a txt-dark nav-link dropdown-toggle font-reg" style="font-size: 18px;"
                    href="#"
                    id="navbarScrollingDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">Menu</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="a txt-dark dropdown-item font-reg" style="font-size: 18px;" href="{{ route('menuProducts', ['category' => 'Coffee']) }}">Coffee</a></li>
                  <li><a class="a txt-dark dropdown-item font-reg" style="font-size: 18px;" href="{{ route('menuProducts', ['category' => 'Pizza']) }}">Pizza</a></li>
                  <li><a class="a txt-dark dropdown-item font-reg" style="font-size: 18px;" href="{{ route('menuProducts', ['category' => 'Pastry']) }}">Pastry</a></li>
                  <li><a class="a txt-dark dropdown-item font-reg" style="font-size: 18px;" href="{{ route('menuProducts', ['category' => 'Drinks']) }}">Drinks</a></li>
                </ul>
              
            <script>
              document.querySelector('.dropdown-toggle').addEventListener('click', function() {
              document.querySelector('.dropdown-menu').classList.toggle('show');
              });
            </script>
            
            @if(Auth::check())
            <li class="nav-item">
              <a class="a txt-dark nav-link font-reg" style="font-size: 18px;" href="{{ route('see_order', ['id' => auth()->user()->id]) }}">See Orders</a>
            </li>
              <li class="nav-item">
                <a class="a txt-dark nav-link font-reg" style="font-size: 18px;" href="{{route('order_transactions')}}">Order Transaction</a>
              </li>
            @endif
          </ul>
          <div class="d-flex align-items-center">

            <nav class="navbar navbar-expand-md navbar-light mx-2">

              <div class="collapse navbar-collapse" id="navbarSupportedContent">


                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ms-auto">
                      <!-- Authentication Links -->
                      @guest
                          @if (Route::has('login'))
                              <li class="nav-item">
                                  <a class="btn rounded-pill px-4 font-reg mx-3" style="font-size: 18px; border: 1px solid #804916; color: #804916" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                          @endif

                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="btn rounded-pill px-4 bgc-primary font-reg" style="font-size: 18px;" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="font-reg txt-primary nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
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
          @if(Auth::check())

          <a href="{{route('user_profile')}}" class="mx-1">
            <i class="fa-solid fa-circle-user" style="font-size: 25px"></i>
          </a>
          <a href="{{ route('see_order', ['id' => auth()->user()->id]) }}" class="mx-1">
            <i class="fa-solid fa-cart-shopping" style="font-size: 25px"></i>
          </a>
          @endif

        </div>
      </nav>
    </header>

    @yield('content')

    
    <script src="{{asset('assets/bootstrap-5.1.3-dist/js/bootstrap.min.js')}}"></script>
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
    </script>
</body>
</html>
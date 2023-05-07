<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/general_styles.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/products_profile.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/icons/fontawesome/css/all.css')}}" />
    <link rel="shortcut icon" href="{{asset('assets/images/coffee.ico')}}" type="image/x-icon">

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
    display: inline-block;
  }

    .sidebar a:before {
      content: "";
    position: absolute;
    height: 2px;
    width: 0;
    background: #ebe8e8;
    top: 2rem;
    transition: width .3s cubic-bezier(1,0,0,1);
    
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

                  <div class="col-12 bgc-white mt-3 mx-auto p-5 rounded-3" style="min-height: 20vh;">

                    <form method="POST" action="{{ route('addProduct') }}" enctype="multipart/form-data" class="row rounded-3 col-12 bgc-primary mx-auto" enctype="" style="min-height: 20vh;">
                      @csrf

                      <div class="col-lg-5 col-12 py-5">
                        <div class="drop-zone">
                          <span class="drop-zone__prompt txt-light font-reg" style="font-size: 18px;">Drop file here or click to upload</span>
                          <input required type="file" name="product_img" class="drop-zone__input">
                        </div>
                        <p class="lead text-light font-reg text-center mt-3">Add a photo</p>
                      </div>
                      <div class="col-lg-7 col-12 mb-5 mb-lg-0 position-relative mx-auto d-flex align-items-center">

                        <a href="{{route('products')}}">
                          <div class="txt-light font-reg position-absolute" style="top: 5%; right: 10%; font-size: 40px;">&times;</div>
                        </a>

                        <div class="mx-auto w-75 ">

                          <label for="" class="txt-light font-reg mt-2 mb-1" style="font-size: 19px;">Categories</label>
                          <div class="d-flex align-items-center">


                            <select required name="product_category" id="" class="py-2 px-2 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;">
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Coffee">Coffee</option>
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Pastry">Pastry</option>
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Drink">Drink</option>
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Pizza">Pizza</option>
                            </select>


                            <select required name="product_subcategory" id="" class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;">
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="">Select Category</option>
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Expresso">Expresso</option>
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Latte">Latte</option>
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Americano">Americano</option>
                              <option class="py-2 px-2 mx-1 rounded-3 bgc-light font-reg" style="font-size: 18px; width: 50%; outline: none;" value="Pizza">Pizza</option>
                            </select>
                          </div>

                          <div class="form-gorup">
                            <label for="" class="txt-light font-reg mt-2" style="font-size: 18px;">Product Name</label>
                            <input required type="text" name="product_name" class="bgc-light txt-primary font-reg form-control" style="font-size: 18px;">
                          </div>

                          <div class="form-group">
                            <label for="" class="txt-light font-reg mt-2" style="font-size: 18px;">Product Size</label>
                            <select required name="product_size" id="" class="rounded-3 bgc-light w-100 py-2 px-2 font-reg" style="font-size: 18px; outline: none;">
                              <option value="Small" class="rounded-3 bgc-light w-100 py-2 px-2 font-reg" style="font-size: 18px; outline: none;">Small</option>
                              <option value="Medium" class="rounded-3 bgc-light w-100 py-2 px-2 font-reg" style="font-size: 18px; outline: none;">Medium</option>
                              <option value="Large" class="rounded-3 bgc-light w-100 py-2 px-2 font-reg" style="font-size: 18px; outline: none;">Large</option>
                            </select>
                          </div>

                          <div class="form-gorup">
                            <label for="" class="txt-light font-reg mt-2" style="font-size: 18px;">Product Prize</label>
                            <input required type="text" name="product_prize" class="bgc-light txt-primary font-reg form-control" style="font-size: 18px;">
                          </div>

                          <div class="mt-3">
                              <button type="submit" name="add_product" class="btn bgc-light rounded-pill font-med px-4 txt-primary" style="font-size: 16px;">Add Product</button>
                          </div>


                        </div>
                      </div>
                    </form>
                        
                  </div>
                </div>
              </div>
                  

                <script src="{{asset('assets/bootstrap-5.1.3-dist/js/bootstrap.min.js')}}"></script>
                <script src="{{asset('assets/js/product_profile.js')}}"></script>
    
            </body>
            </html>
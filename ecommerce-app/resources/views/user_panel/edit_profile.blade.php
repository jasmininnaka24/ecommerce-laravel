@if(Auth::check())

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/general_styles.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/products_profile.css')}}" />
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
      .drop-zone {
        max-width: 45%;
        margin: auto;
        height: 200px;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
        font-size: 20px;
        cursor: pointer;
        color: #804916;
        border: 4px solid #804916;
        border-radius: 200px;
      }
    </style>
</head>
<body class="bgc-light d-flex align-items-center justify-content-center w-100" style="min-height: 100vh">


    <form method="POST" enctype="multipart/form-data" action="{{ route('updateUserProfile', ['id' => auth()->user()->id]) }}" class="container px-md-5">
      @csrf
      @method('PUT')

      <div class="row">
        <div
          class="col-12 mx-auto d-flex align-items-center justify-content-center flex-column">
          <div class="col-lg-5 col-12 pt-5 mb-3">
            <div class="drop-zone">
              <span class="drop-zone__prompt txt-primary font-reg" style="font-size: 18px;">Drop file here or click to upload</span>
              <input type="file" name="image" class="drop-zone__input">
            </div>            
            <div class="d-flex align-items-center justify-content-center">

              @if (auth()->user()->image != '')
              <div class="d-flex justify-content-center pt-4 align-items-center">
                <p class="lead txt-primary font-med text-center mt-3">Current Photo: </p>
                <img class="mx-3 rounded-circle" src="{{asset("storage/" . auth()->user()->image)}}" width="50px" height="50px" style="object-fit: cover;" alt="">
              </div>
              @else
                <p class="lead txt-primary font-reg text-center mt-3">Add a photo</p>
              @endif
            </div>
            
          </div>
          <input type="text" name="name" class="col-lg-4 col-md-6 col-12 bg-transparent text-center pb-1 display-6 font-pop-bold mt-2 text-uppercase font-med" style="border:none; outline: none; border-bottom: 2px solid #804916" value="{{ auth()->user()->name }}">

          <input type="text" name="email" class="col-lg-4 col-md-6 col-12 mt-3 mb-4 bg-transparent text-center pb-1 font-pop-italic font-med" style="border:none; outline: none; border-bottom: 2px solid #804916; font-size: 17px;" value="{{ auth()->user()->email }}">
        </div>
      </div>

      <div class="row mt-4 mx-auto">
        <div class="col-md-4 col-12">
          <div>
            <h6 class="font-reg" style="font-size: 18px;">Phone number</h6>
            <input
              type="number"
              class="font-reg txt-primary fw-bold text-center bgc-light w-100 rounded-3"
              style="height: 2.5rem; outline: none; border: #804916 solid 2px; font-size: 16px;"
              name="phone_num"
              required
              editonly value="{{ auth()->user()->phone_num }}"/>
          </div>
        </div>
        <div class="col-md-8 col-12">
          <div>
            <h6 class="font-reg" style="font-size: 18px;">Address</h6>
            <input
              type="text"
              class="txt-primary fw-bold bgc-light w-100 rounded-3 px-3 font-reg"
              style="height: 2.5rem; outline: none; border: #804916 solid 2px"
              name="address"
              required
              edit value="{{ auth()->user()->address }}"/>
          </div>
          <div class="row my-5">
            <div class="d-flex align-items-center justify-content-end">
              @if(!empty(auth()->user()->address) && !empty(auth()->user()->phone_num))
              <a href="{{route('edit_profile')}}"> <button class="font-reg bgc-light btn txt-primary mx-3 font-pop-med rounded-pill px-4"
                style="border: #804916 2px solid; font-size: 20px">
                Discard</button>
              </a>
              @endif 
              <a href="{{route('user_profile')}}"> <button class="font-reg bgc-primary btn txt-light font-pop-med rounded-pill px-4"
                style="border: #804916 2px solid; font-size: 20px">
                Save Changes</button></a> 
            </div>
          </div>
        </div>
      </div>
    </form>

  <script src="{{asset('assets/bootstrap-5.1.3-dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/product_profile.js')}}"></script>

</body>
</html>

@endif
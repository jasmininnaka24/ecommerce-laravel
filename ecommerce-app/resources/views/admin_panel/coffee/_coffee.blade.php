@extends('layouts.admin_header')


@section('content')

  <div class="bgc-white rounded-3 mt-4" style="min-height: 70vh;">
    <br>
    <h2 class="font-reg mb-3" style="margin-left: 2rem;">Products</h2>
    <div class="col-11 rounded-3 bgc-primary mx-auto" style="min-height: 60vh;">
      <!-- buttons -->
      <div class="pt-3 row mx-auto">
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('coffee')}}">
          <div class="btn bgc-light font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">COFFEE</div>
        </a>
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('drinks')}}">
          <div class="btn bgc-primary font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">DRINKS</div>
        </a>
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('pastry')}}">
          <div class="btn bgc-primary font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">PASTRY</div>
        </a>
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('pizza')}}">
          <div class="btn bgc-primary font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">PIZZA</div>
        </a>
      </div>

      <div class="mt-3 mx-5">

        <div class="d-lg-flex d-block justify-content-between">
          <div class="d-flex align-items-center justify-content-center w-100 mt-4">
            <p class="font-med txt-light" style="font-size: 25px;">ADD A NEW PRODUCT</p>
            <a href="{{route('coffee_profile')}}">
              <p class="font-reg px-2 rounded-circle bgc-light txt-primary mx-2" style="font-size: 18px; cursor: pointer;">+</p>
            </a>
          </div>
        </div>
      </div>


      <div class="col-11 mx-auto row mb-4 d-flex align-items-center justify-content-center">
        @if (!$expressos->isEmpty())
        <div class="font-reg txt-light text-center" style="margin-top: 3.7rem; font-size: 2rem">Expresso</div>
        @foreach ($expressos as $expresso)            
        <div class="rounded-3 col-md-6 col-xl-3 col-12 mt-1 rounded-3 mb-5" style="height: 14rem;">
          <div class="d-flex align-items-center justify-content-center mt-3 mb-2">
            {{-- EDIT --}}
            <a href="{{ route('update_coffee', ['id' => $expresso->id]) }}">
              <i class="icon fas fa-edit mx-2" style="color:#FAEBD7;"></i>
            </a>
            {{-- DELETE --}}
            <form action="{{ route('delete_coffee', ['id' => $expresso->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-transparent" onclick="return confirm('Are you sure you want to delete this item?')" style="border: none;">
                <i class="icon fas fa-trash" style="color:#FAEBD7;"></i>
              </button>
            </form>

          </div>
          <div class="bgc-light d-flex align-items-center flex-column justify-content-center rounded-3 px-2" style='height: 13rem'>
            <div style="width: 70px; height: 70px; object-fit: cover;">
              <img src="{{asset("storage/" . "$expresso->product_img")}}" width="100%" height="100%" style="width: 70px; height: 70px; object-fit: cover;" class='rounded-3' alt="">
            </div>
            <p class="font-med txt-primary mt-3 mb-0 px-2 text-center" style="font-size: 18px;">{{ $expresso->product_name }}</p>
            <p class="font-med text-center txt-primary m-0" style="font-size: 18px;">₱{{ $expresso->product_small }}.00 - ₱{{ $expresso->product_large }}.00</p>

          </div>
        </div>
        @endforeach
        @endif

        @if (!$lattes->isEmpty())     
        <div class="font-reg txt-light text-center" style="margin-top: 3.7rem; margin-bottom: 0rem; font-size: 2rem">Latte</div>
        @foreach ($lattes as $latte)            
        <div class="rounded-3 col-md-6 col-xl-3 col-12 mt-1 rounded-3 mb-5" style="height: 14rem;">
          <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
            {{-- EDIT --}}
            <a href="{{ route('update_coffee', ['id' => $latte->id]) }}">
              <i class="icon fas fa-edit mx-2" style="color:#FAEBD7;"></i>
            </a>
            {{-- DELETE --}}
            <form action="{{ route('delete_coffee', ['id' => $latte->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-transparent" onclick="return confirm('Are you sure you want to delete this item?')" style="border: none;">
                <i class="icon fas fa-trash" style="color:#FAEBD7;"></i>
              </button>
            </form>

          </div>
          <div class="bgc-light d-flex align-items-center flex-column justify-content-center rounded-3 px-2" style='height: 13rem'>
            <div style="width: 70px; height: 70px; object-fit: cover;">
              <img src="{{asset("storage/" . "$latte->product_img")}}" width="100%" height="100%" class='rounded-3' style="width: 70px; height: 70px; object-fit: cover;" alt="">
            </div>
           <p class="font-med txt-primary mt-3 mb-0 px-2 text-center" style="font-size: 18px;">{{ $latte->product_name }}</p>
            <p class="font-med text-center txt-primary m-0" style="font-size: 18px;">₱{{ $latte->product_small }}.00 - ₱{{ $latte->product_large }}.00</p>
          </div>
        </div>
        @endforeach
        @endif

        @if (!$cappuccinos->isEmpty())    
        <div class="font-reg txt-light text-center" style="margin-top: 3.7rem; margin-bottom: 0rem; font-size: 2rem">Cappuccinos</div>
        @foreach ($cappuccinos as $cappuccino)            
        <div class="rounded-3 col-md-6 col-xl-3 col-12 mt-1 rounded-3 mb-5" style="height: 14rem;">
          <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
            {{-- EDIT --}}
            <a href="{{ route('update_coffee', ['id' => $cappuccino->id]) }}">
              <i class="icon fas fa-edit mx-2" style="color:#FAEBD7;"></i>
            </a>
            {{-- DELETE --}}
            <form action="{{ route('delete_coffee', ['id' => $cappuccino->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-transparent" onclick="return confirm('Are you sure you want to delete this item?')" style="border: none;">
                <i class="icon fas fa-trash" style="color:#FAEBD7;"></i>
              </button>
            </form>

          </div>
          <div class="bgc-light d-flex align-items-center flex-column justify-content-center rounded-3 px-2" style='height: 13rem'>
            <div style="width: 70px; height: 70px; object-fit: cover;">
              <img src="{{asset("storage/" . "$cappuccino->product_img")}}" width="100%" height="100%" class='rounded-3' style="width: 70px; height: 70px; object-fit: cover;" alt="">
            </div>
             <p class="font-med txt-primary m-0 mb-2 px-2 text-center" style="font-size: 18px;">{{ $cappuccino->product_name }}</p>
             <p class="font-med text-center txt-primary m-0" style="font-size: 18px;">₱{{ $capuccino->product_small }}.00 - ₱{{ $capuccino->product_large }}.00</p>

          </div>
        </div>
        @endforeach
        @endif

        @if (!$americanos->isEmpty())    
        <div class="font-reg txt-light text-center" style="margin-top: 3.7rem; margin-bottom: 0rem; font-size: 2rem">Americano</div>
        @foreach ($americanos as $americano)            
        <div class="rounded-3 col-md-6 col-xl-3 col-12 mt-1 rounded-3 mb-5" style="height: 14rem;">
          <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
            {{-- EDIT --}}
            <a href="{{ route('update_coffee', ['id' => $americano->id]) }}">
              <i class="icon fas fa-edit mx-2" style="color:#FAEBD7;"></i>
            </a>
            {{-- DELETE --}}
            <form action="{{ route('delete_coffee', ['id' => $americano->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-transparent" onclick="return confirm('Are you sure you want to delete this item?')" style="border: none;">
                <i class="icon fas fa-trash" style="color:#FAEBD7;"></i>
              </button>
            </form>

          </div>
          <div class="bgc-light d-flex align-items-center flex-column justify-content-center rounded-3 px-2" style='height: 13rem'>
            <div style="width: 70px; height: 70px; object-fit: cover;">
              <img src="{{asset("storage/" . "$americano->product_img")}}" width="100%" height="100%" class='rounded-3' style="width: 70px; height: 70px; object-fit: cover;" alt="">
            </div>
            <p class="font-med txt-primary mt-3 mb-0 px-2 text-center" style="font-size: 18px;">{{ $americano->product_name }}</p>
            <p class="font-med text-center txt-primary m-0" style="font-size: 18px;">₱{{ $americano->product_small }}.00 - ₱{{ $americano->product_large }}.00</p>

          </div>
        </div>
        @endforeach
        @endif

        @if (!$breweds->isEmpty())
     
        <div class="font-reg txt-light text-center" style="margin-top: 3.7rem; margin-bottom: 0rem; font-size: 2rem">Brewed</div>
        @foreach ($breweds as $brewed)            
        <div class="rounded-3 col-md-6 col-xl-3 col-12 mt-1 rounded-3 mb-5" style="height: 14rem;">
          <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
            {{-- EDIT --}}
            <a href="{{ route('update_coffee', ['id' => $brewed->id]) }}">
              <i class="icon fas fa-edit mx-2" style="color:#FAEBD7;"></i>
            </a>
            {{-- DELETE --}}
            <form action="{{ route('delete_coffee', ['id' => $brewed->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-transparent" onclick="return confirm('Are you sure you want to delete this item?')" style="border: none;">
                <i class="icon fas fa-trash" style="color:#FAEBD7;"></i>
              </button>
            </form>

          </div>
          <div class="bgc-light d-flex align-items-center flex-column justify-content-center rounded-3 px-2" style='height: 13rem'>
            <div style="width: 70px; height: 70px; object-fit: cover;">
              <img src="{{asset("storage/" . "$brewed->product_img")}}" width="100%" height="100%" class='rounded-3' style="width: 70px; height: 70px; object-fit: cover;" alt="">
            </div>
            <p class="font-med txt-primary mt-3 mb-0 px-2 text-center" style="font-size: 18px;">{{ $brewed->product_name }}</p>
            <p class="font-med text-center txt-primary m-0" style="font-size: 18px;">₱{{ $brewed->product_small }}.00 - ₱{{ $brewed->product_large }}.00</p>

          </div>
        </div>
        @endforeach
        @endif



        






  <br>
  </div>
  <br>
  </div>
  <br>
  <br>
  </div>
  <br>

  </div>
</div>

@endsection
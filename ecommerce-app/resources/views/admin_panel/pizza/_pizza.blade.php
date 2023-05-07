@extends('layouts.admin_header')


@section('content')

  <div class="bgc-white rounded-3 mt-4" style="min-height: 70vh;">
    <br>
    <h2 class="font-reg mb-3" style="margin-left: 2rem;">Products</h2>
    <div class="col-11 rounded-3 bgc-primary mx-auto" style="min-height: 60vh;">
      <!-- buttons -->
      <div class="pt-3 row mx-auto">
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('coffee')}}">
          <div class="btn bgc-primary font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">COFFEE</div>
        </a>
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('drinks')}}">
          <div class="btn bgc-primary font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">DRINKS</div>
        </a>
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('pastry')}}">
          <div class="btn bgc-primary font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">PASTRY</div>
        </a>
        <a class="col-md-6 col-lg-3 col-12 d-flex mb-lg-0 mb-3  align-items-center justify-content-center" href="{{route('pizza')}}">
          <div class="btn bgc-light font-reg rounded-pill px-5" style="border: 2px solid #F2E9D6; font-size: 18x;">PIZZA</div>
        </a>
      </div>

      <div class="mt-3 mx-5">

        <div class="d-lg-flex d-block justify-content-between">
          <div class="d-flex align-items-center justify-content-center w-100 mt-4">
            <p class="font-med txt-light" style="font-size: 25px;">ADD A NEW PRODUCT</p>
            <a href="{{route('pizza_profile')}}">
              <p class="font-reg px-2 rounded-circle bgc-light txt-primary mx-2" style="font-size: 18px; cursor: pointer;">+</p>
            </a>
          </div>
        </div>
      </div>




      <div class="col-11 mx-auto row mb-4 d-flex align-items-center justify-content-center">
        @if (!$pizzas->isEmpty())
        <div class="font-reg txt-light text-center" style="margin-bottom: 1rem; margin-top: 3.7rem; font-size: 2rem">Pizza</div>
        @foreach ($pizzas as $pizza)            
        <div class="rounded-3 col-md-6 col-xl-3 col-12 mt-1 rounded-3 mb-5" style="height: 14rem;">
          <div class="d-flex align-items-center justify-content-center mb-2">
            {{-- EDIT --}}
            <a href="{{ route('update_pizza', ['id' => $pizza->id]) }}">
              <i class="icon fas fa-edit mx-2" style="color:#FAEBD7;"></i>
            </a>
            {{-- DELETE --}}
            <form action="{{ route('delete_pizza', ['id' => $pizza->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-transparent" onclick="return confirm('Are you sure you want to delete this item?')" style="border: none;">
                <i class="icon fas fa-trash" style="color:#FAEBD7;"></i>
              </button>
            </form>

          </div>
          <div class="bgc-light d-flex align-items-center flex-column justify-content-center rounded-3" style='height: 13rem'>
            <div style="width: 70px; height: 70px; object-fit: cover;">
              <img src="{{asset("storage/" . "$pizza->product_img")}}" width="100%" height="100%" style="width: 70px; height: 70px; object-fit: cover;" class='rounded-3' alt="">
            </div>
            <p class="font-med txt-primary mt-3 mb-0 px-2 text-center" style="font-size: 18px;">{{ $pizza->product_name }}</p>
            <p class="font-med text-centerd txt-primary m-0" style="font-size: 18px;">₱{{ $pizza->product_small }}.00 - ₱{{ $pizza->product_large }}.00</p>

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
@extends('layouts.user_header')


@section('content')
            
  <main class="container text-center ">
    <div class="display-5 font-reg mb-3">{{$category}}</div>
      <div class="row bgc-white mx-auto rounded-3 mb-5">
        <div class="col-12 mb-4 mt-2">
          @if(!$distinct->isEmpty())
          @foreach ($distinct as $subcategory)
            @if($subcategory->product_subcategory != "")
            <a href="{{ route('subProducts', ['category' => $category, 'subcategory' => $subcategory->product_subcategory]) }}">
              <button class="btn rounded-pill mt-4 mx-2 px-3 py-1 bgc-white font-med" style="border: 1px solid #804916; color: #804916; width: 180px; font-size: 20px;">{{ $subcategory->product_subcategory }}</button>
            </a>
            @endif
          @endforeach
          @endif
          {{-- <div class="mt-3" style="display: wrap; justify-content: space-between;">
            <button class="btn rounded-pill m-2 p-3 bgc-white" style="border: 1px solid #804916; color: #804916; width: 180px; font-size: 20px;">EXPRESSO</button>
            <button class="btn rounded-pill m-2 p-3 bgc-white" style="border: 1px solid #804916; color: #804916; width: 180px; font-size: 20px;">LATTE</button>
            <button class="btn rounded-pill m-2 p-3 bgc-white" style="border: 1px solid #804916; color: #804916; width: 180px; font-size: 20px;">CAPPUCCINO</button>
            <button class="btn rounded-pill m-2 p-3 bgc-white" style="border: 1px solid #804916; color: #804916; width: 180px; font-size: 20px;">AMERICANO</button>
            <button class="btn rounded-pill m-2 p-3 bgc-white" style="border: 1px solid #804916; color: #804916; width: 180px; font-size: 20px;">BREWED</button>
          </div> --}}

        </div>
        
      
      @if(!$subcategories->isEmpty())
      <h3 class='mb-4 font-med' style='font-size: 30px;'>List of all items<h3>
      <div class=" mx-auto row mb-4 d-flex align-items-center justify-content-center">
        @foreach ($subcategories as $subcategory)
        <div class="col-12 col-lg-3 col-md-4 mb-4">
          <div class="bgc-primary rounded-3 d-flex align-items-center justify-content-center flex-column pb-3 pt-2">
            <div class="my-4 d-flex align-items-center justify-content-center" style="width: 120px; height: 120px; object-fit: cover;">
              <img src="{{asset("storage/" . "$subcategory->product_img")}}" width="100%" height="100%" style="width: 100%; height: 100%; object-fit: cover;" class='rounded-3' alt="">
            </div>
            <p class="lead text-light font-med my-1">{{ $subcategory->product_name }}</p>
            <p class="font-med text-center txt-light mb-3" style="font-size: 18px;">₱{{ $subcategory->product_small }}.00 - ₱{{ $subcategory->product_large }}.00</p>
            @if(Auth::check())
            <a href="{{ route('order_product', ['id' => $subcategory->id]) }}">
              <button class="bgc-light btn rounded-pill mb-3">ORDER NOW</button>
            </a>
            @else
            <a href="{{route('login')}}">
              <button class="bgc-light btn rounded-pill mb-3">ORDER NOW</button>
            </a>
            @endif
          </div>
        </div>
        @endforeach
      </div>
      @else
      <h3 class='mb-4 font-med' style='font-size: 30px;'>No Available Item<h3>
      @endif
    </div>
  </main>

                                 
@endsection

@extends('layouts.admin_header')
{{-- @extends('layouts.app') --}}


@section('content')

<div class="row bgc-white  my-3 rounded-3" style="min-height: 70%;">
  <h2 class="font-reg py-3 px-4">Dashboard</h2>

  <div class="col-12 col-lg-3 bgc-primary py-3 px-2 my-2 rounded-3" style="border: solid 10px #f0f8ff; min-height: 20vh;">
    <h5 class="text-center text-light font-reg">Active Customers</h5>
    <div class="text-center font-med text-light display-5">{{$userCount}}</div>
  </div>

  <div class="col-12 col-lg-3 bgc-primary py-3 px-2 my-2 rounded-3" style="border: solid 10px #f0f8ff; min-height: 20vh;">
    <h5 class="text-center text-light font-reg">Active Products</h5>
    <div class="text-center font-med text-light display-5">{{$productCount}}</div>
  </div>

  <div class="col-12 col-lg-6 bgc-primary py-3 px-2 my-2 rounded-3" style="border: solid 10px #f0f8ff; min-height: 20vh;">
    <h5 class="text-center text-light font-reg">Total Income</h5>
    <?php
      $total_amount = 0;
      function formatAmount($amount){
        if ($amount >= 1000000) {
            return number_format($amount / 1000000, 1) . 'm';
        } elseif ($amount >= 10000) {
            return number_format($amount / 10000, 1) . 'k';
        } else {
            return number_format($amount, 2);
        }
      }
      foreach ($orders as $order) {
        $total_amount += $order->total_amount;        
      }
    ?>
    <div class="text-center text-light font-med display-5">₱ {{ formatAmount($total_amount) }}</div>
  </div>



  <div class="row my-3 mx-auto" >
    <div class="bgc-primary mb-4 rounded-3 col-xl-7 col-12" style="border: solid 5px #f0f8ff;">
      <h5 class="my-3 text-light font-med">LATEST ORDER</h5>
      
      @foreach ($orders as $order)          
      <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex flex-column">
          <p class="text-light font-reg" style="font-size: 18px;">{{$order->name}}</p>
        </div>
        <div>
          <p class="text-light font-reg" style="font-size: 18px;">Ordered {{$order->created_at->diffForHumans()}} | {{$order->quantity}} {{$order->quantity == 1 ? 'item' : 'items'}}</p>
        </div>
        <div>
          <p class="text-light font-reg" style="font-size: 18px;">₱{{ formatAmount($order->total_amount) }}
          </p>
        </div>
      </div>
      @endforeach

    </div>
      



    <div class="bgc-primary mb-4 rounded-3 col-xl-5 col-12" style="border: solid 5px #f0f8ff;">
      <h5 class="mt-3 mb-4 text-light font-med">LATEST CUSTOMER</h5>
      
      @foreach ($users as $user) 
      <div class="d-flex align-items-center mx-2">
        <div style="width: 45px; height: 45px; object-fit: cover;">
          <img src="{{asset('storage/' . $user->image)}}" class="rounded-circle" width="100%" height="100%" style="object-fit: cover;" alt="">
        </div>
        <div class="d-flex flex-column mx-3 pt-2">
          <p class="text-light font-reg" style="margin-bottom: 0; font-size: 18px">{{$user->name}}</p>
          <p class="text-light font-reg" style="font-size: 19px;">{{$user->email}}</p>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</div>
<br>

</div>
</div>

@endsection

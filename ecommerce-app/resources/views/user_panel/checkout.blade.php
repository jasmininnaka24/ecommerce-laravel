@extends('layouts.user_header')


@section('content')

  <main class="container">
    <div class="col-11 mx-auto" style="min-height: 50vh;">
      <form method="POST" action="{{ route('save_checkout') }}" class="bgc-white rounded-3" style="min-height: 40vh;">
        @csrf
        <div style="display: flex; justify-content: space-between;">
          <div style="margin-left: 3rem; margin-top: 3rem;">
            <h2 class="font-med">Checkout</h2>
          </div>
          <a href="{{ route('see_order', ['id' => auth()->user()->id]) }}">
          <div class="back-arrow font-pop-bold" style="margin-right: 4rem; margin-top: 4rem; font-size: x-large;">
            <i class="fa fa-long-arrow-left fa-lg"></i>
          </div>
        </a>
        </div>
              <div class="col-11 row mx-auto d-flex justify-content-center align-items-center">
                <div class="checkout-subheading bgc-primary rounded-3 m-0 mx-auto font-reg py-2" style="font-size: 16px;">Delivery Address</div>
                <div class="bgc-light m-2 p-4 d-md-flex d-block align-items-center justify-content-between">
                <div class="checkout-address font-med">
                  <i class="fa fa-map-marker"></i>
                  {{auth()->user()->address}}
                  </div>
                  <div class="checkout-phone font-med mt-md-0 mt-4" style="display: flex;">
                  <i class="fa fa-phone mx-2 mt-1"></i>
                  {{auth()->user()->phone_num}}
                </div> 
              </div>



              <div class="table-responsive mb-5 mt-3">

                <table class="table bgc-primary rounded-3 my-3" style="border: transparent">
                  <thead>
                  <tr>
                    <th class="checkout-subheading bgc-primary m-0 mx-auto font-reg px-2 py-2" style="font-size: 16px; border-top-left-radius: 10px;">Product Ordered</th>
                    <th class="checkout-subheading bgc-primary m-0 mx-auto font-reg py-2" style="font-size: 16px;">Unit Price</th>
                    <th class="checkout-subheading bgc-primary m-0 mx-auto font-reg py-2" style="font-size: 16px;">Quantity</th>
                    <th class="checkout-subheading bgc-primary m-0 mx-auto font-reg py-2" style="font-size: 16px; border-top-right-radius: 10px;">Item Total</th>
                      
                  </tr>
                </thead>
                <tbody class="bgc-light ">

                  @php
                      $totalAmount = 0;
                  @endphp

                  @foreach (session('checked_items', []) as $item)
                  <tr>
                    <td class="d-flex align-items-center">
                      <div>
                        <img src="{{asset('storage/' . $item['image'])}}" style="width: 50px;">
                      </div>
                      <div class="font-med mx-2" style="font-size: 18px;">
                        {{ $item['product_name'] }}
                      </div>
                    </td>
                    <td class="font-med" style="font-size: 18px;">₱{{ $item['unit_price'] }}</td>
                    <td class="font-med" style="font-size: 18px; padding-left: 2rem">{{ $item['quantity'] }}</td>
                    <td class="font-med" style="font-size: 18px;">₱{{ $item['unit_price'] * $item['quantity'] }}</td>
                    <input type="text" hidden value="{{ $item['product_id'] }}">
                  </tr>
                  @php
                  $totalAmount += $item['unit_price'] * $item['quantity'];
                  @endphp
                  @endforeach

                </tbody>
              </table>
            </div>


              <input type="text" name="total_amount" value="{{$totalAmount}}" hidden>
              <div class="bg-transparent font-med font-pop-bold mt-2" style="font-size: 18px;">Total amount: ₱{{$totalAmount}}.00</div>

              </div>
    

              <div class="text-end" style="margin-right: 3rem;">
                <a href="{{route('order_transactions')}}">
                <button class="bgc-primary rounded-pill mt-3 font-med" 
                style="width: 10rem; height: 2.5rem; border: none; font-size: 18px;">Pay</button>
              </a>
              </div>
              <br><br>

            </form>
          </div>
        <br><br>
  </main>
                        
@endsection
@extends('layouts.admin_header')


@section('content')


  <main class="container">
      <div class="col-12 mx-auto mt-3">
        <div class="bgc-white rounded-3" style="min-height: 80vh;">

        <div class="col-11 row mx-auto d-flex justify-content-center align-items-center">
          <div class="d-flex align-items-center justify-content-between">
            <div class="rounded-3 mt-4 py-2 font-med" style="font-size: 20px;">ORDERED ITEMS</div>
            <a href="{{route('orders')}}">
              <div class="back-arrow font-pop-bold pt-4" style="font-size: x-large;">
                <i class="fa fa-long-arrow-left fa-lg"></i>
              </div>
            </a>
          </div>
            <div class="bgc-light m-2">
              <div class="table-responsive mb-5 mt-3">



              <div class="bgc-primary rounded-3 mt-3 mx-auto font-pop-bold font-med">CUSTOMER DETAILS</div>
              <div class="bgc-light m-2 p-4 d-flex justify-content-between">
                <table>
                  @foreach ($orders as $order)
                    <tr>
                      <th class="font-reg" style="font-size: 18px">Name</th>
                        <td style="position: absolute; margin-left: 5rem; font-size: 18px" class="font-reg">
                            {{ $order->name }}
                        </td>
                    </tr>
                    <tr>
                      <th class="font-reg" style="font-size: 18px">Email</th>
                      <td style="position: absolute; margin-left: 5rem; font-size: 18px" class="font-reg">{{ $order->email }}</td>
                    </tr>
                    <tr>
                      <th class="font-reg" style="font-size: 18px">Phone</th>
                      <td style="position: absolute; margin-left: 5rem; font-size: 18px" class="font-reg">{{ $order->phone_num }}</td>
                    </tr>
                    <tr>
                      <th class="font-reg" style="font-size: 18px">Address</th>
                      <td style="position: absolute; margin-left: 5rem; font-size: 18px" class="font-reg">{{ $order->address }}</td>
                    </tr>
                    @endforeach
                  </table>
              </div>


            <table class="col-12 mx-auto bgc-light rounded-3 mb-5">
              <thead class="bgc-primary rounded-3">
                <tr class="rounded-3">
                  <th class="txt-light font-med mx-4" style="padding-left: 3rem; font-size: 18px;">Product Ordered</th>
                  <th class="txt-light font-med mx-4 text-center" style="font-size: 18px;">Quantity</th>
                  <th class="txt-light font-med mx-4 text-center" style="font-size: 18px;">Item Total</th>
                  <th class="txt-light font-med mx-4 text-center" style="font-size: 18px;">Reference Number</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)
                  <tr>
    
                    <td class="d-flex align-items-center">
                      <div class="font-pop-italic d-flex align-items-center" style="margin-left: 2rem;">
                        
                        <div style="width: 50px; height: 50px; object-fit: cover">
                          <img src="{{asset('storage/' . $order->image)}}" width="100%" height="100%" style="object-fit: cover" alt="">
                        </div>
                        <div class="font-pop-bold font-med mx-2 pt-2" style="font-size: 20px;">{{$order->product_name}}</div>
                      </div>
    
                    </td>
                    <td cl pb-3ass="d-flex align-items-center text-center p3-5">
                      <div class="bgc-primary pt-1 mt-1 rounded-pill text-center align-items-center font-med mx-4" style="height: 30px; border: none;">{{$order->quantity}}</div>
                    </td>
                    <td class="text-center pb-3">
                      <div class="mt-3 font-med mx-4">
                        ₱{{$order->total_amount}}.00
                      </div>
                    </td>
                    <td class="text-center pb-3">
                      <div class="mt-3 font-med mx-4">
                        {{$order->reference_number}}
                      </div>
                    </td>
    
                  </tr>
                @endforeach
  
  
              </tbody>
            </table>
                        
          </div>
        </div>
      </div>
      <br><br>

        </div>
    </main>
  </div>
</div>

@endsection
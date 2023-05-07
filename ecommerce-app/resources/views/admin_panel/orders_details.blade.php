@extends('layouts.admin_header')


@section('content')


      <main class="container">
          <div class="col-12 mx-auto mt-3">
            <div class="bgc-white rounded-3">
              <div style="display: flex; justify-content: space-between;">
            
            <div class="col-11 row mx-auto d-flex justify-content-center align-items-center">
              <a href="{{route('customers')}}" class="d-flex align-items-center justify-content-end">
                <div class="back-arrow font-pop-bold pt-4" style="font-size: x-large;">
                  <i class="fa fa-long-arrow-left fa-lg"></i>
                </div>
              </a>
                <div class="bgc-primary rounded-3 mt-3 mx-auto font-pop-bold font-med">CUSTOMER DETAILS</div>
                <div class="bgc-light m-2 p-4 d-flex justify-content-between">
                  <table>
                      <tr>
                        <th class="font-reg" style="font-size: 18px">Name</th>
                        <td style="position: absolute; margin-left: 5rem; font-size: 18px" class="font-reg">{{$customer->name}}</td>
                      </tr>
                      <tr>
                        <th class="font-reg" style="font-size: 18px">Email</th>
                        <td style="position: absolute; margin-left: 5rem; font-size: 18px" class="font-reg">{{$customer->email}}</td>
                      </tr>
                      <tr>
                        <th class="font-reg" style="font-size: 18px">Phone</th>
                        <td style="position: absolute; margin-left: 5rem; font-size: 18px" class="font-reg">{{$customer->phone_num}}</td>
                      </tr>
                    </table>
                </div>

                <div class="bgc-primary rounded-3 mt-2 mx-auto font-pop-bold font-med">SHPPING ADDRESS</div>
                <div class="bgc-light m-2 mb-3 p-4 d-flex justify-content-between">
                  <div class="font-reg" style="font-size: 18px">{{$customer->address}}</div>
                </div>

              </div>

              
            </div>

            <div class="col-11 rounded-3  mx-auto" style="min-height: 10vh;">
              <div class="table-responsive mb-5 mt-1">
      
              <table class="table bgc-light rounded-3 mt-3" style="min-height: 2vh; border: transparent">
              <thead class="bgc-primary">
                <tr class="rounded-3">
                  <th class="txt-light font-med text-center" style="font-size: 18px; border-top-left-radius: 10px;">Product Ordered</th>
                  <th class="txt-light font-med text-center" style="font-size: 18px;">Quantity</th>
                  <th class="txt-light font-med text-center" style="font-size: 18px;">Item Total</th>
                  <th class="txt-light font-med text-center" style="font-size: 18px;">Reference Number</th>
                  <th class="txt-light font-med text-center" style="font-size: 18px; border-top-right-radius: 10px;">Date Ordered</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)    
                  <tr>
                    <td class="d-flex align-items-center">
                      <div class="font-pop-italic " style="margin-left: 2rem;">
                        <div class="font-pop-bold font-med font-med pt-2" style="font-size: 20px;">{{$order->product_name}}</div>
                      </div>
    
                    </td>
                    <td cl pb-3ass="d-flex align-items-center text-center p3-5">
                      <div class="bgc-primary pt-1 mt-1 rounded-pill text-center align-items-center font-med" style="height: 30px; border: none;">{{$order->quantity}}</div>
                    </td>
                    <td class="text-center pb-3">
                      <div class="mt-3 font-med">
                        ₱{{$order->total_amount}}.00
                      </div>
                    </td>
                    <td class="text-center pb-3">
                      <div class="mt-3 font-med">
                        {{$order->reference_number}}
                      </div>
                    </td>
                    <td class="text-center pb-3">
                      <div class="mt-3 font-med">
                        {{ $order->created_at->diffForHumans() }}
                      </div>
                    </td>
    
                  </tr>
                  @endforeach
                  
                  
                  
                </tbody>
              </table>
              @if($orders->isEmpty())
                <h4 class="font-reg txt-primary text-center">No item ordered</h4>
                <br>
              @endif
          <br>
        </div>
        </div>
        </div>
      </main>
    </div>
  </div>
                  
                  
@endsection
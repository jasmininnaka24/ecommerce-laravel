@extends('layouts.admin_header')


@section('content')

    <div class="col-12 mx-auto bgc-white rounded-3 mt-4 mx-4" style="min-height: 70vh;">
      <br>
      <div class="d-md-flex d-block align-items-center justify-content-between px-5">
        <h2 class="txt-primary font-reg">Orders</h2>
        {{-- <div id="search" class="input-group d-flex align-items-center justify-content-md-end"
        >
          <input type="text" class="font-reg txt-primary  search-input px-3 bg-transparent txt-primary" placeholder="Search here..." style="height: 2.4rem; width: 12rem; border: #804916 2px solid; font-size: 16px;" />
          <button class="bgc-primary position-md-absolute"
            style="border: none; outline: none; right: 10%; top: 15%; padding: .45rem; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
              <i class="fa-solid fa-magnifying-glass text-light"
            style="font-size: 1rem"></i>
        </button>
        </div> --}}
      </div>

          <div class="col-11 rounded-3  mx-auto" style="min-height: 10vh;">
            <div class="table-responsive mb-5 mt-3">

            <table class="table bgc-primary rounded-3 my-3" style="min-height: 15vh;">
            <thead>
                <tr>
                  <th style="font-size: 18px;" class="txt-light font-med px-4">ID</th>
                  <th style="font-size: 18px;" class="txt-light font-med px-4">Customer</th>
                  <th style="font-size: 18px;" class="txt-light font-med px-4 text-center">Date</th>
                  <th style="font-size: 18px;" class="txt-light font-med px-4 text-center">Status</th>
                  <th style="font-size: 18px;" class="txt-light font-med px-2 text-center">Orders</th>
                </tr>
              </thead>
              <tbody class="col-12 bgc-light rounded-3 mt-3">
                @foreach ($orders as $order)
                
                <tr>
                  <td style="font-size: 18px;" class="font-reg px-4">{{$order->id}}</td>
                  <td style="font-size: 18px;" class="font-reg px-4">{{$order->name}}</td>
                  <td style="font-size: 18px;" class="font-reg px-4 text-center">{{ $order->created_at->diffForHumans() }}
                  </td>
                  <td style="font-size: 18px;" class="font-reg px-4 text-center">

                    @if($order->status === 'PENDING')
                    <form action="{{route('statusUpdate', ['id' => $order->id])}}" method="POST">
                      @csrf
                      <button class="btn bgc-primary font-med txt-light px-5 rounded-pill">
                        Ship
                      </button>  
                    </form>
                    @else
                    <form action="{{route('statusDelivered', ['id' => $order->id])}}" method="POST">
                      @csrf
                      <button class="btn bgc-primary font-med txt-light px-4 rounded-pill">
                        Delivered?
                      </button>  
                    </form>
                    @endif
                  </td>
                  <td style="font-size: 18px; cursor: pointer;" class="font-reg px-2 text-center">
                    <a href="{{route('ordered_items', ['id' => $order->id])}}" class="font-med">
                      <i class="fas fa-eye" style="font-size: 20px"></i>
                    </a>
                  </td>
                </tr>

                @endforeach

              </tbody>
            </table>


      </div>
      </div>
        
    </div>
  </div>
</div>

@endsection
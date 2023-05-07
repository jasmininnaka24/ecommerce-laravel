@if(Auth::check())


@extends('layouts.user_header')


@section('content')

    <main class="container">
      <div class="d-flex align-items-center justify-content-between">
        <div class="display-6 mb-3 font-reg">List of transactions</div>
      </div>
      <div class="col-12 rounded-3 mx-auto" style="height: 350px;">
        <div class="table-responsive mb-5 mt-3">

          <table class="table bgc-light rounded-3 " style="border: transparent">
            <thead class="bgc-primary rounded-3">
              <tr class="rounded-3">
                <th class="txt-light font-med text-center" style="font-size: 18px; border-top-left-radius: 10px;">Product Ordered</th>
                <th class="txt-light font-med text-center" style="font-size: 18px;">Unit Price</th>
                <th class="txt-light font-med text-center" style="font-size: 18px;">Quantity</th>
                <th class="txt-light font-med text-center" style="font-size: 18px;">Item Total</th>
                <th class="txt-light font-med text-center" style="font-size: 18px;">Reference Number</th>
                <th class="txt-light font-med text-center" style="font-size: 18px;">Status</th>
                <th class="txt-light font-med text-center" style="font-size: 18px; border-top-right-radius: 10px;">Date Ordered</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)                  
                <tr>
                  <td class="d-flex align-items-center">
                    <div>
                      <img src="{{asset("storage/" . "$transaction->image")}}" style="width: 100px;">
                    </div>
                    <div class="font-pop-italic" style="margin-left: 1rem;">
                      <div class="font-pop-bold font-med" style="font-size: 20px;">{{$transaction->product_name}}</div>
                    </div>

                  </td>
                  <td class="text-center pt-4">
                    <div class="mt-4 font-med">
                      ₱{{$transaction->unit_price}}.00
                    </div>
                  </td>
                  <td class="d-flex align-items-center justify-content-center text-center pt-4 pb-5">
                    <div class="mt-4 font-med">
                      {{$transaction->quantity}}
                    </div>
                  </td>
                  <td class="text-center pt-4">
                    <div class="mt-4 font-med">
                      ₱{{$transaction->total_amount}}.00
                    </div>
                  </td>
                  <td class="text-center pt-4">
                    <div class="mt-4 font-med">
                      {{$transaction->reference_number}}
                    </div>
                  </td>
                  <td class="text-center pt-4">
                    <div class="mt-4 font-med">
                      {{$transaction->status}}
                    </div>
                  </td>
                  <td class="text-center pt-4">
                    <div class="mt-4 font-med">
                      {{ $transaction->created_at->diffForHumans() }}
                    </div>
                  </td>

                </tr>
              @endforeach



            </tbody>
          </table>
          @if($transactions->isEmpty())
          <h4 class="font-reg text-center">No item added</h4>
          @endif
        </div>
          <br><br>

        


          </div>


    </main>

@endsection
@endif
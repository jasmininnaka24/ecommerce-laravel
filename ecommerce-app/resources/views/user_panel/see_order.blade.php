@if(Auth::check())
@extends('layouts.user_header')


@section('content')

<main class="container">
  <div class="d-sm-flex d-block align-items-center justify-content-between">
    <div class="display-6 mb-3 font-reg">Order List</div>
    <a href="{{route('order_transactions')}}">
      <div class="font-reg bgc-primary mt-md-4 mt-0 px-5 rounded-pill py-1 text-sm-start text-center" style="font-size: 18px;">List of order transactions</div>
    </a>
  </div>
  <form action="{{ route('storeSelections') }}" method="POST" class="col-12 rounded-3 mx-auto" style="height: 350px;">
    @csrf

    <div class="table-responsive mb-5 mt-3">
      <table class="table bgc-light rounded-3" id="example" style="border: transparent">
        <thead class="bgc-primary rounded-3">
          <tr class="rounded-3">
            <th class="text-center" style="border-top-left-radius: 10px;"></th>
            <th class="txt-light font-med" style="font-size: 18px;">Product Name</th>
            <th class="txt-light font-med" style="font-size: 18px;">Unit Price</th>
            <th class="txt-light font-med" style="font-size: 18px;">Quantity</th>
            <th class="txt-light font-med" style="font-size: 18px;">Item Total</th>
            <th class="txt-light font-med" style="font-size: 18px; border-top-right-radius: 10px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(!$added_to_carts->isEmpty())
          @foreach ($added_to_carts as $added_to_cart)
          <tr>
            <td class="pt-5 text-center">
              <input type="checkbox" class="double-size" name="selectedItems[]" value="{{$added_to_cart->id}}">
            </td>
            <td class="d-flex align-items-center pb-4">
              <input type="text" hidden value="{{$added_to_cart->id}}">
              <div>
                <img src="{{asset('storage/' . $added_to_cart->image)}}" style="width: 100px;">
              </div>
              <div class="font-pop-italic" style="margin-left: 1rem;">
                <div class="font-pop-bold font-med" style="font-size: 20px;">{{$added_to_cart->product_name}}</div>
              </div>
            </td>
            <td class="pt-4">
              <div class="mt-4 font-med">
                ₱{{$added_to_cart->unit_price}}.00
              </div>
            </td>
            <td class="d-flex align-items-center pt-4 pb-5">
              <div class="bgc-primary pt-1 mt-3 rounded-pill text-center align-items-center font-med" style="width: 60px; height: 30px; border: none;">{{$added_to_cart->quantity}}</div>
            </td>
            <td class="pt-4">
              <div class="mt-4 font-med">
                ₱{{$item_total = $added_to_cart->unit_price * $added_to_cart->quantity}}.00
              </div>
            </td>
            <td style="font-size: 18px;" class="font-reg px-2 pt-5 text-center">
              <a href="{{route('deleteItem', ['id' => $added_to_cart->id])}}" onclick="return confirm('Are you sure?')">
                <div type="submit" class="bg-transparent" style="border: none;">
                  <i class="fas fa-trash mx-1 pb-2" style="font-size: 20px;"></i>
                </div>
              </a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      @if($added_to_carts->isEmpty())
        <h4 class="font-reg text-center">No item added</h4>
      @endif
    </div>
    <br><br><br>
    <div class="position-fixed bgc-light d-flex align-items-center justify-content-end w-100 py-3" style="bottom: 0%; right: 5%;">
      <button type="submit" class="btn bgc-primary font-reg rounded-pill" style="font-size: 16px;">CHECK OUT</button>
      
    </div>
  </form>  
  


</main> 
@endsection
@endif



@if(Auth::check())

@extends('layouts.user_header')

@section('content')
  <main class="container">
    <div class="display-5 font-reg">Account</div>
    <div class="row">
      <div
        class="col-12 mx-auto d-flex align-items-center justify-content-center flex-column">
        <div style="width: 150px; height: 150px; object-fit: cover">
          <img
            src="{{asset("storage/" . auth()->user()->image)}}"
            class="rounded-circle"
            width="100%"
            height="100%"
            style="object-fit:cover"
            alt=""/>
        </div>
        <div class="display-6 font-pop-bold mt-2 text-uppercase font-med">
          {{ auth()->user()->name }}
        </div>
        <div class="font-pop-italic font-reg" style="font-size: 17px;">{{ auth()->user()->email }}</div>
      </div>
    </div>

    <div class="row mt-4 mx-auto">
      <div class="col-md-4 col-12">
        <div>
          <h6 class="font-reg" style="font-size: 18px;">Phone</h6>
          <input
            readonly
            type="number"
            class="font-reg txt-primary fw-bold text-center bgc-light w-100 rounded-3"
            style="height: 2.5rem; border: #804916 solid 2px;"
            editonly value="{{ auth()->user()->phone_num }}"/>
        </div>
      </div>
      <div class="col-md-8 col-12">
        <div>
          <h6 class="font-reg" style="font-size: 18px;">Address</h6>
          <input
            readonly
            type="text"
            class="txt-primary fw-bold bgc-light w-100 rounded-3 px-3 font-reg"
            style="height: 2.5rem; border: #804916 solid 2px;"
            edit value="{{ auth()->user()->address }}"/>
        </div>
        <div class="row my-5">
          <div class="d-flex align-items-center justify-content-end">
            <a href="{{route('edit_profile')}}"> <button class="font-reg btn txt-primary font-pop-med rounded-pill px-4"
              style="border: #804916 2px solid; font-size: 20px">
              Edit</button></a> 
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@endif
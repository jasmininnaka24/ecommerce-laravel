@extends('layouts.user_header')


@section('content')

  <div class="container my-5">
    <div class="text-center mb-3 font-reg display-5">Menu</div>
    <div class="row rounded-3">


      <div class="col-12 col-lg-6  bgc-light my-2" style="min-height: 20vh;">
        <div class="rounded-3 bgc-primary mx-auto my-3 d-flex align-items-center justify-content-center" style="height: 30vh;">
          <a href="{{ route('menuProducts', ['category' => 'Coffee']) }}">
            <div class="d-flex align-items-center justify-content-evenly">
              <div class="display-4 txt-light">Coffee</div>
              <div style="width: 12rem">
                <img src="../assets/images/eyy.png" width="100%" alt=""/>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-lg-6 bgc-light my-2" style="min-height: 20vh;">
        <div class="rounded-3 bgc-primary mx-auto my-3 d-flex align-items-center justify-content-center" style="height: 30vh;">
          <a href="{{ route('menuProducts', ['category' => 'Pastry']) }}">
            <div class="d-flex align-items-center justify-content-evenly">
              <div class="display-4 txt-light">Pastry</div>
              <div style="width: 12rem">
                <img src="../assets/images/croissant.png" width="100%" alt=""/>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-lg-6 bgc-light my-2">
        <div class="rounded-3 bgc-primary mx-auto my-3 d-flex align-items-center justify-content-center" style="height: 30vh;">
          <a href="{{ route('menuProducts', ['category' => 'Pizza']) }}">
            <div class="d-flex align-items-center justify-content-evenly">
              <div class="display-4 txt-light">Pizza</div>
              <div style="width: 12rem">
                <img
                  src="../assets/images/whole_pizza.png"
                  width="100%"
                  alt=""/>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-lg-6 bgc-light my-2">
        <div class="rounded-3 bgc-primary mx-auto my-3 d-flex align-items-center justify-content-center" style="height: 30vh;">
          <a href="{{ route('menuProducts', ['category' => 'Drinks']) }}">
            <div class="d-flex align-items-center justify-content-evenly">
              <div class="display-4 txt-light">Drinks</div>
              <div style="width: 12rem">
                <img src="../assets/images/juice.png" width="100%" alt=""/>
              </div>
            </div>
          </a>
        </div>
      </div>


    </div>
  </div>

@endsection

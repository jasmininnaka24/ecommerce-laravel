@extends('layouts.user_header')

@section('content')
    

    <main class="container mt-4 anim-to-top-slow">
      <div class="row">
        <div class="col-lg-6 col-12">
          <!-- COMPANY NAME -->
          <div class="mt-2 mb-4">
            <div class="txt-primary display-2 mb-3 font-med text-center text-lg-start">La Casa de Convivencia</div>

            <div class="d-flex d-lg-block align-items-center justify-content-center">
              <div
              style="width: 9rem; height: 0.4rem"
              class="bgc-primary rounded-pill"
              ></div>
            </div>

          </div>

          <!-- DESCRIPTION -->
          <div class="mb-4 font-reg text-center text-lg-start" style="font-size: 18px;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore,
            quaerat illo dolor deleniti ea  ipsum veniam nesciunt voluptas sed
            illum ut eius deserunt culpa animi reiciendis! Eos minus, cupiditate
            ad totam quam sit error perspiciatis modi deserunt voluptatum natus,
            blanditiis debitis earum itaque ipsam dolore ab explicabo,
            asperiores ducimus? Recusandae.
          </div>

          <!-- BUTTOM -->
          <div class="d-flex d-lg-block align-items-center justify-content-center mb-lg-0 mb-5">
            <a href="{{ route('showMenu') }}">
              <div class="btn bgc-primary font-reg" style="font-size: 18px;">Order Now</div>
            </a>
          </div>
          </div>

        <!-- IMAGE -->
        <div class="col-lg-6 col-12">
          <div class="mx-auto" style="width: 85%">
            <img src="./assets/images/coffee.png" width="100%" alt="" />
          </div>
        </div>
      </div>
    </main>





      <div class="container mt-5 anim-to-top-slow">
        <h3 class="text-center mb-3 font-med" style="font-size: 30px;">Services we provide</h3>
        <div class="row bgc-primary rounded-3">
          <div class="col-lg-3 col-sm-6 bgc-light my-2" style="border: #804916 solid 8px; min-height: 20vh;">
            <div style="width: 100px" class="w-75 mx-auto mb-4">
              <img src="./assets/images/eyy.png" width="100%" alt="" />
            </div>
            <div class="d-flex align-items-center justify-content-between">
            <h4 class="m-0 font-med" style="font-size: 25px;">Coffee</h4>
          </div> 
          <div style="text-align: center" class="my-3 font-reg">
            Coffee is a Lorem ipsum dolor sit amet consectetur, adipisicing
            elit. Tenetur sint accusamus veniam iusto veritatis numquam cum
            beatae vitae ratione voluptas.
          </div>
          </div>

          <div class="col-lg-3 col-sm-6 bgc-light my-2" style="border: #804916 solid 8px; min-height: 20vh;">
            <div style="width: 100px" class="w-75 mx-auto mb-4">
              <img src="./assets/images/whole_pizza.png" width="130%" alt="" />
            </div>
            <div class="d-flex align-items-center">
              <h4 class="text-center m-0 font-med" style="font-size: 25px;">Pizza</h4>
            </div>
            <div style="text-align: center" class="my-3 font-reg">
              Coffee is a Lorem ipsum dolor sit amet consectetur, adipisicing
              elit. Tenetur sint accusamus veniam iusto veritatis numquam cum
              beatae vitae ratione voluptas.
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 bgc-light my-2" style="border: #804916 solid 8px; min-height: 20vh;">
            <div style="width: 100px" class="w-75 mx-auto mb-4">
              <img src="./assets/images/breads.png" width="120%" alt="" />
             </div>
            <div class="d-flex align-items-center">
              <h4 class="text-center m-0 font-med" style="font-size: 25px;">Pastry</h4>
            </div>
            <div style="text-align: center" class="my-3 font-reg">
              Coffee is a Lorem ipsum dolor sit amet consectetur, adipisicing
              elit. Tenetur sint accusamus veniam iusto veritatis numquam cum
              beatae vitae ratione voluptas.
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 bgc-light my-2" style="border: #804916 solid 8px; min-height: 20vh;">
            <div style="width: 100px" class="w-75 mx-auto mb-4">
              <img src="./assets/images/juice.png" width="80%" alt="" />
            </div>
            <div class="d-flex align-items-center">
              <h4 class="m-0 text-center font-med" style="font-size: 25px;">Drinks</h4>
            </div>
            <div style="text-align: center" class="my-3 font-reg">
              Coffee is a Lorem ipsum dolor sit amet consectetur, adipisicing
              elit. Tenetur sint accusamus veniam iusto veritatis numquam cum
              beatae vitae ratione voluptas.
            </div>
          </div>
        </div>
      </div>



      <div class="container my-5">
        <div class="container">
          <div class="row justify-content-center">
            <h1 class="text-center font-med" style="font-size: 40px;">About Us</h1>
          </div>
        </div> 

        <div class="d-flex justify-content-center mt-2">
          <div class="bgc-primary px-4 rounded-pill" style="border: none; outline: none;">
            <div class="txt-light text-center my-1 display-5 font-med" >
              La Casa De Convivencia
            </div>
          </div>
        </div>

        <div class="container txt-dark text-center mt-5 " style="margin-left: auto; margin-right: auto; text-align: justify; font-size: 18px;">
        <p class="font-reg">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi magni vitae deserunt, non esse nobis 
        repellat dolores rem tempora sit quisquam, quod odio modi. Officiis fugiat error accusamus consequatur 
        facilis cupiditate ullam praesentium quaerat dolore quidem id, exercitationem temporibus qui earum modi eaque, 
        illo deleniti labore corrupti rem quisquam? Asperiores exercitationem temporibus qui earum modi eaque vitae.
        </p>
        <p class="font-reg">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim optio labore quasi eos soluta numquam 
        doloribus porro non expedita quas commodi pariatur, aut dolor, iste libero dolore facilis voluptas 
        eligendi error accusantium. Nesciunt exercitationem, doloribus optio ratione, reiciendis vitae a velit 
        laudantium molestias incidunt porro voluptates neque tempora? Officia nemo exercitationem temporibus qui 
        exercitationem temporibus!
        </p>
        <p class="font-reg">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim optio labore quasi eos soluta numquam 
        doloribus porro non expedita quas commodi pariatur, aut dolor, iste libero dolore facilis voluptas 
        eligendi error accusantium. Nesciunt exercitationem, doloribus optio ratione, reiciendis vitae a velit
        exercitationem temporibus qui earum modi eaque exercitationem temporibus qui earum modi eaque exercitationem 
        temporibus quit sit.
        </p>

        </div>
      </div>

      <br><br><br>





    <div class="container-fluid bgc-primary text-center py-5">
      <h2 class="txt-light font-med" style="font-size: 25px;">LOGO</h2>
      <div class="txt-light font-reg">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, iure
        voluptate.
      </div>
      <h5 class="txt-light mt-3 font-reg">Stay connected with us</h5>
      <div>
        <i class="txt-light fa-regular fa-envelope"></i>
        <i class="txt-light fa-brands fa-instagram"></i>
        <i class="txt-light fa-brands fa-facebook"></i>
      </div>
      <div class="mt-4 txt-light font-reg">
        @2023 La Casa de Convivencia | All rights reserved
      </div>
    </div>

@endsection

@if(Auth::check())
@extends('layouts.user_header')


@section('content')

  <main class="container text-center">
    <div class="row">
      <div class="col-12 bgc-white align-items-center justify-content-center d-flex mx-auto m-0 rounded-3 mb-5" style="min-height: 450px; position: relative;">
        <a href="./menu_products.blade.php">
          <button type="button" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Close" style="outline: none;"></button>
        </a>
        
        
        
        
        <div class="container mt-5">
          <h3 class="mb-5 font-med" style="font-size: 30px;">Order Product</h3>
        <div class="row rounded-3">


          <div class="col-12 col-lg-4 my-2">
            <div class="w-lg-50 mx-auto rounded-3" style='height: 100%;'>
              <img src="{{asset("storage/" . "$product->product_img")}}" height='74%' width="100%" style='object-fit: cover' class='rounded-3' alt=""/>
            </div>
          </div>

          <form action="{{ route('orderProduct', ['id' => auth()->user()->id]) }}" method="POST" class="col-12 col-lg-8 my-2" style="min-height: 10vh;">
            @csrf
            <div style="display: flex; align-items: center;">
              <h2 class="txt-primary font-reg">{{$product->product_name}}</h2>
              <div class="bgc-primary rounded-pill px-3 mx-3 font-reg" style="font-size: 18px;">{{$product->product_category}}</div>
            </div>
            <div class="mt-2 bgc-primary pt-3 px-3 rounded-3">
              <div style="text-align: left;">
                <div>  
                  <div class="mt-5 d-md-flex align-items-center justify-content-center">
                    
                    <input type="text" name="image" hidden value="{{$product->product_img}}">
                    <input type="text" name="product_name" hidden value="{{$product->product_name}}">
                    <input type="text" name="user_id" hidden value="{{ auth()->user()->id }}">
                    <input type="text" name="product_id" hidden value="{{$product->id}}">
                    

                    @foreach($smalls as $small)
                      <div class="mb-md-0 mb-4">
                        <label for="small" onclick="highlightButton(this)" class="btn active bgc-primary border-light font-reg" style="border-width: 2px; width: 150px; margin-right: 1rem; font-size: 17px;">
                          Small <br>
                          ₱{{$small->product_small}}.00
                          <input required name="unit_price" hidden type="radio"  id="small" value="{{$small->product_small}}">
                          <input required name="size" hidden type="radio"  id="small" value="small">
                        </label>
                      </div>
                    @endforeach

                    @foreach($mediums as $medium)
                      <div class="mb-md-0 mb-4">
                        <label for="medium" onclick="highlightButton(this)" class="btn active bgc-primary border-light font-reg" style="border-width: 2px; width: 150px; margin-right: 1rem; font-size: 17px;">
                          Medium <br>
                          ₱{{$medium->product_medium}}.00
                          <input required name="unit_price" hidden type="radio"  id="medium" value="{{$medium->product_medium}}">
                          <input required name="size" hidden type="radio"  id="medium" value="medium">
                        </label>
                      </div>
                    @endforeach

                    @foreach($larges as $large)
                      <div class="mb-md-0 mb-4">
                        <label for="large" onclick="highlightButton(this)" class="btn active bgc-primary border-light font-reg" style="border-width: 2px; width: 150px; margin-right: 1rem; font-size: 17px;" >
                          Large <br>
                          ₱{{$large->product_large}}.00
                          <input required name="unit_price" hidden type="radio"  id="large" value="{{$large->product_large}}">
                          <input required name="size" hidden type="radio"  id="large" value="large">
                        </label>
                      </div>
                    @endforeach


                  </div>
                  
                  
                  <div class="d-flex align-items-center w-100 justify-content-end my-4">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center w-100 justify-content-end my-4">
                          <div class="d-flex align-items-center">
                            <div class="bg-transparent text-light mx-3 minus-btn" style="cursor: pointer; font-size: 40px; border: none; outline: none;">-</div>
                            <input type="text" required readonly class="font-reg btn rounded-pill bg-light my-3 font-pop-bold num-display" style="width: 50px; border: 1px solid #804916; color: #804916;" name="quantity" value="1">
                            <div class="bg-transparent text-light mx-3 plus-btn" style="cursor: pointer; font-size: 40px; border: none; outline: none;">+</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3 d-flex align-items-center">
                  <button type="submit" class="font-med btn rounded-pill bg-transparent p-2 my-3 font-pop-bold" style="border: 1px solid #804916; color: #804916; width: 120px;">
                    Add to cart
                  </button>
              </div>
            </form>


        </div>
      </div>















        
        
          </div>
                  
                  <script>
                    // get the plus and minus buttons and the number display element
                    const plusBtn = document.querySelector('.plus-btn');
                    const minusBtn = document.querySelector('.minus-btn');
                    const numberDisplay = document.querySelector('.num-display');
                  
                    // initialize the number to 1
                    let number = 1;
                  
                    // add event listeners for the plus and minus buttons
                    plusBtn.addEventListener('click', () => {
                      number++;
                      numberDisplay.value = number;
                    });
                  
                    minusBtn.addEventListener('click', () => {
                      if (number > 1) {
                        number--;
                        numberDisplay.value = number;
                      }
                    });



                    function highlightButton(label) {
                      var unitPriceRadios = document.querySelectorAll('input[name="unit_price"]');
                      var sizeRadios = document.querySelectorAll('input[name="size"]');
                      
                      // Reset all buttons to default state
                      for (var i = 0; i < unitPriceRadios.length; i++) {
                        unitPriceRadios[i].checked = false;
                        sizeRadios[i].checked = false;
                        var button = unitPriceRadios[i].parentNode;
                        button.style.backgroundColor = ""; // Remove background color
                        button.style.color = ""; // Reset text color
                      }
                      
                      // Activate the clicked button
                      var unitPriceRadio = label.querySelector('input[name="unit_price"]');
                      var sizeRadio = label.querySelector('input[name="size"]');
                      unitPriceRadio.checked = true;
                      sizeRadio.checked = true;
                      label.style.backgroundColor = "#F2E9D6";
                      label.style.color = "#804916";
                    }
                  </script>
                  


        </div>
  </main>
           
  {{-- <script>
    function highlightButton(btn) {
      // remove the 'highlighted' class from all buttons
      const buttons = document.querySelectorAll('.btn');
      buttons.forEach((button) => {
        button.classList.remove('highlighted');
      });
      
      // add the 'highlighted' class to the clicked button
      btn.classList.add('highlighted');
    }
    </script> --}}
@endsection
@endif

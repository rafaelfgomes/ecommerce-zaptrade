@extends('layouts.ecommerce.app')

@section('content')

  @include('partials._header')

  @include('partials._navbar')

  <section class="ftco-section bg-light">

    <div class="container">
      
      <div class="row justify-content-center mb-3 pb-3">
        
        <div class="col-md-12 heading-section text-center ftco-animate">

          <p>Produtos com preços imperdíveis</p>
        
        </div>

      </div>

    </div>
    
    <div class="container">

      <div class="row">
        
        <div class="col-sm col-md-6 col-lg ftco-animate">
          
          <div class="product">

            <a href="#" class="img-prod"><img class="img-fluid" src="images/product-6.jpg" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            
            <div class="text py-3 px-3">
              
              <h3>
                <a href="#">Floral Jackquard Pullover</a>
              </h3>
              
              <div class="d-flex">
                
                <div class="pricing">

                  <p class="price">
                    <span>$120.00</span>
                  </p>

                </div>
                
                <div class="rating">
                  
                  <p class="text-right">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>

                </div>

              </div>

              <p class="bottom-area d-flex px-3">

                <a href="#" class="add-to-cart text-center py-2 mr-1">
                  <span>
                    <i class="ion-ios-add mr-2"></i>Detalhes
                  </span>
                </a>

              </p>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

  @include('partials._newsletter')

  @include('partials._footer')

@endsection

@extends('layouts.ecommerce.app')

@section('content')

  @include('partials.ecommerce._header')

  @include('partials.ecommerce._navbar')

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">

    <div class="container">

      <div class="row no-gutters slider-text align-items-center justify-content-center">
        
        <div class="col-md-9 ftco-animate text-center">
          
          <h1 class="mb-0 bread">{{ $selected->name }}</h1>

        </div>

      </div>

    </div>

  </div>

  <section class="ftco-section bg-light">

    <div class="container">

      <div class="row">

        <div class="col-12 order-md-last">

          <div class="row">

            @foreach ($categoriesFilter[0]->products as $product)

            <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
              
                <div class="product">
                  
                  <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset($product->images[0]->path.$product->images[0]->name) }}" alt="{{ $product->name }}">
                    
                    <div class="overlay"></div>
                  
                  </a>
                  
                  <div class="text py-3 px-3">
                    
                    <h3><a href="#">{{ $product->name }}</a></h3>
                    
                    <div class="d-flex">
                      
                      <div class="pricing">
                        <p class="price"><span>R$&nbsp;{{ number_format(floatval($product->price), 2, ',', '.') }}</span></p>
                      </div>
                    
                    </div>
                    
                    <p class="bottom-area d-flex px-3">
  
                      <a href="#" class="add-to-cart text-center py-2 mr-1"><span><i class="ion-ios-add ml-1"></i>&nbsp;Detalhes</span></a>

                    </p>
                  
                  </div>
                
                </div>
              
              </div>
                
            @endforeach

          </div>

          {{-- Paginação --}}
          <div class="row mt-5">

            <div class="col text-center">
              
              <div class="block-27">
                
                  {{ $categoriesFilter->links() }}
                
              </div>

            </div>

          </div>

        </div>

        {{-- <div class="col-md-4 col-lg-2 sidebar">

          <div class="sidebar-box-2">

            <h2 class="heading mb-4"><a href="#">Clothing</a></h2>
            
            <ul>
              <li><a href="#">Shirts &amp; Tops</a></li>
              <li><a href="#">Dresses</a></li>
              <li><a href="#">Shorts &amp; Skirts</a></li>
              <li><a href="#">Jackets</a></li>
              <li><a href="#">Coats</a></li>
              <li><a href="#">Sleeveless</a></li>
              <li><a href="#">Trousers</a></li>
              <li><a href="#">Winter Coats</a></li>
              <li><a href="#">Jumpsuits</a></li>
            </ul>
          </div>

          <div class="sidebar-box-2">
            <h2 class="heading mb-4"><a href="#">Jeans</a></h2>
            <ul>
              <li><a href="#">Shirts &amp; Tops</a></li>
              <li><a href="#">Dresses</a></li>
              <li><a href="#">Shorts &amp; Skirts</a></li>
              <li><a href="#">Jackets</a></li>
              <li><a href="#">Coats</a></li>
              <li><a href="#">Jeans</a></li>
              <li><a href="#">Sleeveless</a></li>
              <li><a href="#">Trousers</a></li>
              <li><a href="#">Winter Coats</a></li>
              <li><a href="#">Jumpsuits</a></li>
            </ul>
          </div>
          <div class="sidebar-box-2">
            <h2 class="heading mb-2"><a href="#">Bags</a></h2>
            <h2 class="heading mb-2"><a href="#">Accessories</a></h2>
          </div>
          <div class="sidebar-box-2">
            <h2 class="heading mb-4"><a href="#">Shoes</a></h2>
            <ul>
              <li><a href="#">Nike</a></li>
              <li><a href="#">Addidas</a></li>
              <li><a href="#">Skechers</a></li>
              <li><a href="#">Jackets</a></li>
              <li><a href="#">Coats</a></li>
              <li><a href="#">Jeans</a></li>
            </ul>
          </div>
        </div> --}}

      </div>

    </div>

  </section>

  @include('partials.ecommerce._footer')

@endsection
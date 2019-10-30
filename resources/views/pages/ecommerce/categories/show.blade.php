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

            @foreach ($products as $product)

              <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">

                <div class="product">

                  <a href="{{ route('product.details', $product->id) }}" class="img-prod"><img class="img-fluid" src="{{ asset($product->images[0]->path.$product->images[0]->name) }}" alt="{{ $product->name }}">

                    <div class="overlay"></div>

                  </a>

                  <div class="text py-3 px-3">

                    <h3><a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a></h3>

                    <div class="d-flex">

                      <div class="pricing">
                        <p class="price"><span>R$&nbsp;{{ number_format(floatval($product->price), 2, ',', '.') }}</span></p>
                      </div>

                    </div>

                    <p class="bottom-area d-flex px-3">

                      <a href="{{ route('product.details', $product->id) }}" class="add-to-cart text-center py-2 mr-1"><span><i class="ion-ios-add ml-1"></i>&nbsp;Detalhes</span></a>

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

                {{ $products->links() }}

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

  @include('partials.ecommerce._footer')

@endsection
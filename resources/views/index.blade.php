@extends('layouts.ecommerce.app')

@section('content')

  @include('partials.ecommerce._header')

  @include('partials.ecommerce._navbar')

  <section class="ftco-section bg-light">

    <div class="container">

      <div class="row justify-content-center mb-3 pb-3">

        <div class="col-md-12 heading-section text-center ftco-animate">

          <h2>Produtos com preços imperdíveis</h2>

        </div>

      </div>

    </div>

    <div class="container">

      <div class="row">

        @foreach ($products as $product)

          <div class="col-sm col-md-6 col-lg ftco-animate">

            <div class="product">

              <a href="{{ route('product.details', $product->id) }}" class="img-prod"><img class="img-fluid mx-auto d-block" src="{{ asset($product->images[0]->path.$product->images[0]->name) }}" alt="{{ $product->name }}">
                <div class="overlay"></div>
              </a>

              <div class="text py-3 px-3">

                <h3 class="text-center">
                  <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                </h3>

                <div class="text-center">

                  <p class="price h2">
                    <span>R$&nbsp;{{ number_format(floatval($product->price), 2, ',', '.') }}</span>
                  </p>

                </div>

                <p class="bottom-area d-flex px-3">

                  <a href="{{ route('product.details', $product->id) }}" class="add-to-cart text-center py-2 mr-1">
                    <span>
                      <i class="ion-ios-add mr-2"></i>Detalhes
                    </span>
                  </a>

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

  </section>

  @include('partials.ecommerce._newsletter')

  @include('partials.ecommerce._footer')

@endsection

@extends('layouts.ecommerce.app')

@section('content')

    @include('partials.ecommerce._header')

    @include('partials.ecommerce._navbar')

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">

        <div class="container">

            <div class="row no-gutters slider-text align-items-center justify-content-center">

                <div class="col-md-9 ftco-animate text-center">

                    <h1 class="mb-0 bread">Detalhes do produto</h1>

                </div>

            </div>

        </div>

    </div>

    <section class="ftco-section">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 mb-5 ftco-animate">

                    <a href="{{ asset($product->images[0]->path.$product->images[0]->name) }}" class="image-popup"><img src="{{ asset($product->images[0]->path.$product->images[0]->name) }}" class="img-fluid" alt="{{ $product->name }}"></a>

                </div>

                <div class="col-lg-6 product-details pl-md-5 ftco-animate">

                    <h3>{{ $product->name }}</h3>

                    <p class="price"><span>R$&nbsp;{{ number_format(floatval($product->price), 2, ',', '.') }}</span></p>

                    <p>{{ $product->description }}</p>

                </div>

            </div>

        </div>

    </section>

    @include('partials.ecommerce._footer')

@endsection
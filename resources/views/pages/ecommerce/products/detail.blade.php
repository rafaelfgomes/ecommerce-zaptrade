@extends('layouts.ecommerce.app')

@section('content')

    @include('partials.ecommerce._header')

    @include('partials.ecommerce._navbar')

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('images/ecommerce/generic.jpg') }});">

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

                <div class="col-lg-6 mb-5">

                    <div id="carouselProductImages" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">

                            @foreach (range(0, ($imagesNumber - 1)) as $num)

                                @if ($num == 0)

                                    <li data-target="#carouselProductImages" data-slide-to="0" class="active"></li>

                                @else

                                    <li data-target="#carouselProductImages" data-slide-to="{{ $num }}"></li>

                                @endif

                            @endforeach

                        </ol>

                        <div class="carousel-inner">

                            @foreach ($product->images as $key => $image)

                                @if ($key == 0)

                                    <div class="carousel-item active">

                                        <a href="{{ asset($image->path.$image->name) }}" class="image-popup">

                                            <img src="{{ asset($image->path.$image->name) }}" class="d-block w-100 img-fluid" alt="{{ $image->name }}">

                                        </a>

                                    </div>

                                @else

                                    <div class="carousel-item">

                                        <a href="{{ asset($image->path.$image->name) }}" class="image-popup">

                                            <img src="{{ asset($image->path.$image->name) }}" class="d-block w-100 img-fluid" alt="{{ $image->name }}">

                                        </a>

                                    </div>

                                @endif

                            @endforeach

                        </div>

                        <a class="carousel-control-prev" href="#carouselProductImages" role="button" data-slide="prev">

                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>

                        </a>

                        <a class="carousel-control-next" href="#carouselProductImages" role="button" data-slide="next">

                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>

                        </a>

                    </div>

                </div>

                <div class="col-lg-6 product-details pl-md-5 ftco-animate">

                    <h3>{{ $product->name }}</h3>

                    <p class="price"><span>R$&nbsp;{{ number_format(floatval($product->price), 2, ',', '.') }}</span></p>

                    <p class="text-justify">{{ $product->description }}</p>

                </div>

            </div>

        </div>

    </section>

    @include('partials.ecommerce._footer')

@endsection
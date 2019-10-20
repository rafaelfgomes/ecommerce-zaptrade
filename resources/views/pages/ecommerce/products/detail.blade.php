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
                    
                    <a href="images/menu-2.jpg" class="image-popup"><img src="images/product-1.jpg" class="img-fluid" alt="Colorlib Template"></a>
                
                </div>
                
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    
                    <h3>Young Woman Wearing Dress</h3>
                    
                    <p class="price"><span>$120.00</span></p>
                    
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                
                </div>
            
            </div>
        
        </div>

    </section>

    @include('partials.ecommerce._footer')

@endsection
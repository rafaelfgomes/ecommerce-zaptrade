@extends('layouts.ecommerce.app')

@section('content')

  @include('partials.ecommerce._header')

  @include('partials.ecommerce._navbar')

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">

    <div class="container">

      <div class="row no-gutters slider-text align-items-center justify-content-center">

        <div class="col-md-9 ftco-animate text-center">

          <h1 class="mb-0 bread">Entre em contato conosco</h1>

        </div>

      </div>

    </div>

  </div>

  <section class="ftco-section contact-section bg-light">

    <div class="container">

        <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-4 d-flex">
            <div class="info bg-white p-4">
              <p><span>Endereço:</span><br>Av. Ana Costa, 482 - cj 901 - Gonzaga, Santos - SP</p>
            </div>
        </div>
        
        <div class="col-md-4 d-flex">
            <div class="info bg-white p-4">
                <p>
                    <span>Contato:</span><br><a href="tel://+551332862277">+55 13 3286-2277</a>
                </p>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="info bg-white p-4">
                <p>
                    <span>E-mail:</span><br><a href="mailto:ecommerce@zaptrade.com.br">ecommerce@zaptrade.com.br</a>
                </p>
            </div>
        </div>

      </div>
      
      <div class="row block-9">

        <div class="col-md-6 order-md-last d-flex">

            <form action="#" class="bg-white p-5 contact-form">

                <div class="form-group">
                <input type="text" class="form-control" placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                <input type="text" class="form-control" placeholder="Digite seu e-mail">
                </div>
                
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Assunto">
                </div>
                
                <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Escreva sua mensagem para nós"></textarea>
                </div>
                
                <div class="form-group">
                <input type="submit" value="Enviar mensagem" class="btn btn-primary py-3 px-5">
                </div>
          
            </form>
        
        </div>

        <div class="col-md-6 d-flex">
            <div id="map" class="bg-white"></div>
        </div>

      </div>

    </div>

  </section>

  @include('partials.ecommerce._footer')

@endsection
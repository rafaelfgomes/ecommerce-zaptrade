@extends('layouts.dashboard.app')

@section('content')

<div class="wrapper ">

    @include('partials.dashboard._sidebar')

    <div class="main-panel">

      @include('partials.dashboard._navbar')
      
      <div class="content">

        <div class="row">

          <div class="col-md-4">
            
            <div class="card card-user">
              
              <div class="image">

                <img src="{{ asset('images/dashboard/damir-bosnjak.jpg') }}" alt="...">
              
              </div>
              
              <div class="card-body">

                <div class="author">
                  
                  <a href="#" class="text-decoration-none">
                    
                    <img class="avatar border-gray" src="{{ asset('images/dashboard/mike.jpg') }}" alt="">
                    <h5 class="title">Chet Faker</h5>

                  </a>
                  
                  <p class="description">
                    user@email.com
                  </p>

                </div>

                <p class="description text-center">
                  Gerente
                </p>
              
              </div>

            </div>

          </div>
          
          <div class="col-md-8">

            <div class="card card-user">

              <div class="card-header">
                <h5 class="card-title">Dados do usuário</h5>
              </div>
              
              <div class="card-body">

                <form>

                  <div class="row">

                    <div class="col-md-6 pr-1">
                      
                      <div class="form-group">

                        <label>Nome</label>
                        <input type="text" class="form-control" placeholder="Nome" value="Fulano">
                      
                      </div>

                    </div>
                    
                    <div class="col-md-6 pl-1">
                      
                      <div class="form-group">
                        
                        <label>E-mail</label>
                        <input type="text" class="form-control" placeholder="E-mail" value="fulano@email.com">

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6 pr-1">
                      
                      <div class="form-group">

                        <label>Perfil</label>
                        <input type="text" class="form-control" placeholder="Perfil" value="Gerente">
                      
                      </div>
                    
                    </div>
                    
                    <div class="col-md-6 pl-1">

                      <div class="form-group">
                        <label>Cadastrado em</label>
                        <input type="text" class="form-control" placeholder="Data de cadastro" value="01/10/2019" disabled>
                      </div>
                    
                    </div>
                    
                  </div>

                  <div class="row pt-2">

                    <div class="update ml-auto mr-auto">
                      <button type="button" class="btn btn-primary btn-round">Atualizar dados</button>
                    </div>
                  
                  </div>
                
                </form>
              
              </div>
            
            </div>

          </div>
          
        </div>

      </div>
      
      @include('partials.dashboard._footer')

    </div>

  </div>
    
@endsection
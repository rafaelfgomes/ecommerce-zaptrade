@extends('layouts.dashboard.app')

@section('content')

<div class="wrapper ">

    @include('partials.dashboard._sidebar')

    <div class="main-panel">

      @include('partials.dashboard._navbar')
      
      <div class="content">

        <div class="row">
          
          <div class="col-md-12">

            <div class="card card-user">

              <div class="card-header">

                <h5 class="card-title">Cadastrar novo usuário</h5>
              
              </div>
              
              <div class="card-body">

                <form>

                  <div class="row">

                    <div class="col-md-6 pr-1">
                      
                      <div class="form-group">

                        <label>Nome</label>
                        <input type="text" id="user-name" class="form-control" placeholder="Digite o nome">
                      
                      </div>

                    </div>
                    
                    <div class="col-md-6 pl-1">
                      
                      <div class="form-group">
                        
                        <label>E-mail</label>
                        <input type="text" id="user-email" class="form-control" placeholder="Digite o e-mail">

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6 pr-1">

                      <div class="form-group">
                        <label>Senha</label>
                        <input type="password" id="user-password" class="form-control" placeholder="Digite a senha">
                      </div>
                    
                    </div>

                    <div class="col-md-6 pl-1">
                      
                      <div class="form-group">

                        <label>Perfil</label>
                        <select class="custom-select" id="user-profile-id" name="user-profile-id" id="inputGroupSelectProfile"
                        @if ($userProfileId > 1) disabled @endif>

                            <option value="0" selected>Escolha o perfil</option>
                            @foreach ($profiles as $profile)

                              @if ($userProfileId == $profile->id)
                                  
                                <option value="{{ $profile->id }}" selected>{{ $profile->name }}</option>

                              @else

                                <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                  
                              @endif

                            @endforeach

                        </select>
                      
                      </div>
                    
                    </div>
                    
                  </div>

                  <div class="row pt-2">

                    <div class="update ml-auto mr-auto">
                      <input type="hidden" id="url" value="{{ url('/') }}">
                      <input type="hidden" id="user-logged-profile-id" value="{{ $userProfileId }}">
                      <button type="button" id="store-user" class="btn btn-primary btn-round">Cadastrar usuário</button>
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
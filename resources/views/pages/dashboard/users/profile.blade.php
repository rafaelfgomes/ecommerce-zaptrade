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

                    <img class="avatar border-gray" src="{{ asset('images/dashboard/logo-small.png') }}" alt="">
                    <h5 class="title">{{ $user->name }}</h5>

                  </a>

                  <p class="description">
                    {{ $user->email }}
                  </p>

                </div>

                <p class="description text-center">
                  {{ $userProfileName }}
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

                <form id="update-user-form">

                  <div class="row">

                    <div class="col-md-6 pr-1">

                      <div class="form-group">

                        <label>Nome</label>
                        <input type="text" id="user-name" name="name" class="form-control" placeholder="Nome" value="{{ $user->name }}" required>

                      </div>

                    </div>

                    <div class="col-md-6 pl-1">

                      <div class="form-group">

                        <label>E-mail</label>
                        <input type="text" id="user-email" name="email" class="form-control" placeholder="E-mail" value="{{ $user->email }}" required>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6 pr-1">

                      <div class="form-group">

                        <label>Senha atual</label>
                        <input type="password" id="user-password" name="password" class="form-control" placeholder="Senha atual" required>

                      </div>

                    </div>

                    <div class="col-md-6 pl-1">

                      <div class="form-group">

                        <label>Nova senha</label>
                        <input type="password" id="user-new-password" name="new-password" class="form-control" placeholder="Nova senha" required>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6 offset-md-3 pr-1">

                      <div class="form-group">

                        <label>Perfil</label>
                        <select class="custom-select" id="user-profile-id" name="user-profile-id" @if ($userProfileId > 1) disabled @endif>

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
                      <input type="hidden" name="user-id" id="user-id" value="{{ Auth::user()->id }}">
                      <button type="button" id="update-user" class="btn btn-primary btn-round">Atualizar dados</button>
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
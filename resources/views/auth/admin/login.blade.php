@extends('layouts.admin.app')

@section('content')

    <div class="container h-100">

        <div class="d-flex justify-content-center h-100 mt-3">
            
            <div class="user_card mt-5">
                
                <div class="d-flex justify-content-center">

                    <div class="brand_logo_container">

                        <img src="{{ asset('images/zaptradeadmin.jpg') }}" class="brand_logo" alt="Logo">

                    </div>
                    
                </div>

                <div class="d-flex justify-content-center form_container">

                    <form action="{{ route('admin.login') }}" method="POST">

                        <div class="input-group mb-3">

                            <div class="input-group-append">
                                <span class="input-group-text-login pt-1 pr-2 pl-2"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control input_user" placeholder="Digite seu e-mail" required>

                        </div>

                        <div class="input-group mb-3">

                            <div class="input-group-append">
                                <span class="input-group-text-login pt-1 pr-2 pl-2"><i class="fas fa-key"></i></span>
                            </div>

                            <input type="password" name="password" class="form-control input_pass" placeholder="Digite sua senha" required>

                        </div>

                        <div class="input-group mb-4">

                            <div class="input-group-append">
                                <span class="input-group-text-login pt-1 pr-2 pl-2"><i class="fas fa-key"></i></span>
                            </div>

                            <select class="custom-select select-profiles" name="profile-id" id="inputGroupSelectProfile">
                                <option value="0" selected>Escolha seu perfil</option>
                                @foreach ($profiles as $profile)

                                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                
                                @endforeach
                            
                            </select>

                        </div>

                        <div class="d-flex justify-content-center mt-5 login_container">
                            <button type="submit" class="btn login_btn">Logar</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

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
                <h5 class="card-title">Cadastrar nova categoria</h5>
              </div>

              <div class="card-body">

                <form>

                  <div class="row">

                    <div class="col-md-6 pr-1">

                      <div class="form-group">

                        <label>Nome da categoria</label>
                        <input type="text" class="form-control" id="category-store-name" name="name" required placeholder="Digite o nome da categoria">

                      </div>

                    </div>

                    <div class="col-md-6 pl-1">

                      <div class="form-group">

                        <label>Slug</label>
                        <input type="text" class="form-control" id="slug-store-name" name="slug_name" required placeholder="Digite o slug (nome para aparecer na url)">

                      </div>

                    </div>

                  </div>

                  <div class="row pt-3">
                    <input type="hidden" id="url" name="url" value="{{ url('/') }}">
                    <div class="update ml-auto mr-auto">
                      <button type="button" id="store-category" class="btn btn-primary btn-round">Cadastrar categoria</button>
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
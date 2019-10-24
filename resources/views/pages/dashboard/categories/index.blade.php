@extends('layouts.dashboard.app')

@section('content')

<div class="wrapper ">

    @include('partials.dashboard._sidebar')

    <div class="main-panel">

      @include('partials.dashboard._navbar')

      <div class="content">

        <div class="row">

          <div class="col-md-12">

            <div class="card">

              <div class="card-header">
                <h4 class="card-title">Categorias cadastradas</h4>
              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table">

                    <thead class="text-primary">
                      <th class="text-center">#</th>
                      <th>Nome</th>
                      <th>Slug</th>
                      <th class="text-center">Ações</th>
                    </thead>

                    <tbody>

                      @foreach ($categories as $category)
                          
                        <tr>
                          <td class="text-center">
                            {{ $category->id }}
                          </td>
                          <td>
                              {{ $category->name }}
                          </td>
                          <td>
                              {{ $category->slug_name }}
                          </td>
                          <td class="text-center">
                              <a class="btn btn-primary btn-round" href="{{ route('category.register.page') }}" role="button"><i class="fas fa-edit"></i></a>
                              <button type="button" id="delete-category" class="btn btn-danger btn-round"><i class="fas fa-trash"></i></button>
                          </td>
                          
                        </tr>

                      @endforeach

                    </tbody>

                  </table>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="row pt-2">

          <div class="col d-flex justify-content-center">
            
            {{ $categories->links() }}

          </div>

        </div>


      </div>

      @include('partials.dashboard._footer')

    </div>

  </div>

@endsection
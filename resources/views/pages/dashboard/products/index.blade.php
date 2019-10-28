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
                <h4 class="card-title">Produtos cadastrados</h4>
              </div>

              <div class="card-body">

                @if (count($products) > 0)

                  <div class="table-responsive">

                    <table class="table">
  
                      <thead class="text-primary">
                        <th class="text-center">#</th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                      </thead>
  
                      <tbody>
  
                        @foreach ($products as $product)
  
                          <tr>
                            <td class="text-center">
                              1
                            </td>
                            <td>
                              {{ $product->name }}
                            </td>
                            <td>
                              {{ $product->category->name }}
                            </td>
                            <td class="text-center">
                              <button type="button" class="btn btn-primary btn-round" data-url="{{ url('/') }}" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-description="{{ $product->description }}" data-active="{{ $product->is_approoved }}" data-toggle="modal" data-target="#updateProductModal"><i class="fas fa-edit"></i></button>
                              <button type="button" id="delete-product" class="btn btn-danger btn-round"><i class="fas fa-times"></i></button>
                            </td>
                            
                          </tr>
                            
                        @endforeach
  
                      </tbody>
  
                    </table>
  
                  </div>
                    
                @else

                  <p class="h3 text-center pt-5">Não há produtos cadastrados.<br>Realize os cadastros <a href="{{ route('product.register.page') }}">nesta página</a></p>
                    
                @endif

              </div>

            </div>

          </div>

        </div>

      </div>

      @include('partials.dashboard._footer')

    </div>

  </div>

@endsection
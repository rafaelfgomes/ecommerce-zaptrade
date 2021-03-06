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
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th class="text-center">Ações</th>
                      </thead>

                      <tbody>

                        @foreach ($products as $product)

                          <tr>
                            <td>
                              <img src="{{ asset($product->images[0]->path.$product->images[0]->name) }}" alt="" width="30" height="30">&nbsp;{{ $product->name }}
                            </td>
                            <td>
                              {{ $product->category->name }}
                            </td>
                            <td class="text-center">

                              <button type="button" class="btn btn-primary btn-round" data-url="{{ url('/') }}" data-id="{{ $product->id }}" data-toggle="modal" data-target="#updateProductModal" @if ($product->is_approved == 0) disabled @endif><i class="fas fa-edit"></i></button>

                              @if (Auth::user()->profile->id == 1)

                                @if ($product->is_approved == 1)

                                  <button type="button" id="disable-product" class="btn btn-danger btn-round" data-url="{{ url('/') }}" data-id="{{ $product->id }}" data-approved="{{ $product->is_approved }}" data-toggle="modal" data-target="#approvalProductModal"><i class="fas fa-times"></i></button>

                                @else

                                  <button type="button" id="disable-product" class="btn btn-success btn-round" data-url="{{ url('/') }}" data-id="{{ $product->id }}" data-approved="{{ $product->is_approved }}" data-toggle="modal" data-target="#approvalProductModal"><i class="fas fa-check"></i></button>

                                @endif

                              @endif

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

        @include('pages.components.dashboard.update-product-modal')
        @include('pages.components.dashboard.approval-modal')

      </div>

      @include('partials.dashboard._footer')

    </div>

  </div>

@endsection
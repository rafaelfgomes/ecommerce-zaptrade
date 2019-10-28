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

                <h5 class="card-title">Cadastrar novo produto</h5>
              
              </div>

              <div class="card-body">

                <form id="store-product-form" enctype="multipart/form-data">

                  <div class="row">
                    
                    <div class="col-md-4 pr-1">
                    
                      <div class="form-group">
                        <label>Nome do produto</label>
                        <input type="text" id="product-name" name="product-name" class="form-control" placeholder="Digite o nome do produto" required>
                      </div>
                    
                    </div>

                    <div class="col-md-4 pl-1">
                    
                      <div class="form-group">
                        <label>Preço</label>
                        <input type="text" id="product-price" name="product-price" class="form-control" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal=","  placeholder="Digite o preço" required>
                      </div>
                    
                    </div>

                    <div class="col-md-4 pl-1">
                    
                      <div class="form-group">
                        
                        <label>Categoria</label>

                        <select class="custom-select" id="category-id" name="category-id" id="inputGroupSelectCategory" required>

                          <option value="0" selected>Escolha a categoria</option>
                          @foreach ($categories as $category)

                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                          @endforeach

                        </select>

                      </div>
                    
                    </div>
                  
                  </div>

                  <div class="row">
                  
                    <div class="col-md-12">
                  
                      <div class="form-group">

                        <label>Descrição</label>
                        <textarea id="product-description" name="product-description" class="form-control textarea"></textarea>
                      </div>
                  
                    </div>
                  
                  </div>

                  <div class="row">
                    
                    <div class="col-md-12">

                      <div class="form-group">

                        <label>Imagens do produto</label>
                        <div class="custom-file">
                          <input type="file" accept="image/*" name="product-images[]" class="custom-file-input" id="product-images" multiple>
                          <label class="custom-file-label" for="product-images">Selecione os arquivos</label>
                          
                        </div>
                        <div id="images-preview" class="border rounded d-none"></div>

                      </div>

                    </div>
                  
                  </div>

                  <div class="row">

                    <div class="ml-auto mr-auto">
                      <input type="hidden" name="url" id="url" value="{{ url('/') }}">
                      <button type="button" id="product-store" name="product-store" class="btn btn-primary btn-round">Cadastrar produto</button>
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
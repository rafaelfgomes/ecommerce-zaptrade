<div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="updateProductModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="updateProductModalLabel">Atualizar produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

          <form id="update-product-form" enctype="multipart/form-data">

            <div class="row">

              <div class="col">

                <div class="form-group">
                  <label>Nome do produto</label>
                  <input type="text" id="product-update-name" name="product-name" class="form-control" placeholder="Digite o nome do produto" required>
                </div>

              </div>

              <div class="col">

                <div class="form-group">
                  <label>Preço</label>
                  <input type="text" id="product-update-price" name="product-price" class="form-control" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal=","  placeholder="Digite o preço" required>
                </div>

              </div>

            </div>

            <div class="row">

              <div class="col">

                <div class="form-group">

                  <label>Categoria</label>
                  <input type="text" id="product-update-category" name="product-category" class="form-control" placeholder="Categoria" required>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col">

                <div class="form-group">

                  <label>Descrição</label>
                  <textarea id="product-update-description" name="product-description" class="form-control textarea"></textarea>
                </div>

              </div>

            </div>

            <div class="row">

              <div class="col">

                <div class="form-group">

                  <label>Imagens do produto</label>
                  <div class="custom-file">

                    <input type="file" accept="image/*" name="product-images[]" class="custom-file-input" id="product-images" multiple>
                    <label class="custom-file-label" for="product-images">Selecione os arquivos</label>

                  </div>
                  <div id="images-preview" class="border rounded"></div>

                </div>

              </div>

            </div>

          </form>

      </div>

      <div class="modal-footer">
        <input type="hidden" name="pr">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" id="update-product" data-dismiss="modal" class="btn btn-primary">Atualizar</button>
      </div>
    </div>

  </div>

</div>
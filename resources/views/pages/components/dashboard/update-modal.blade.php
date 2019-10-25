<div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="updateCategoryModalLabel">Atualizar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form>

            <div class="row">

                <div class="col-md-6 pr-1">

                  <div class="form-group">

                    <label>Nome da categoria</label>
                    <input type="text" id="update-category-name" class="form-control" name="update-category-name" required>

                  </div>

                </div>

                <div class="col-md-6 pl-1">

                  <div class="form-group">

                    <label>Slug</label>
                    <input type="text" id="update-slug-name" class="form-control" name="update-slug-name" required>

                  </div>

                </div>

              </div>

        </form>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" id="button-update" data-dismiss="modal" class="btn btn-primary">Atualizar</button>
      </div>
    </div>

  </div>

</div>
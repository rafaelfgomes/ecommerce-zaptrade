$(document).ready(function () {

  //Máscara de dinheiro para o input
  $('#product-price').maskMoney();

  //Toastr options
  toastr.options.closeButton = true;
  toastr.options = { positionClass: 'toast-top-center' };

  //Logar usuário
  $('#login-user').on('click', function () {

    let url = $('#url').val() + '/auth/dashboard'

    let data = new FormData($('#login-dashboard-form')[0])

    $.ajax({
      url: url,
      data: data,
      dataType:'json',
      type:'POST',
      processData: false,
      contentType: false,
      success: function (response){

        $('#user-email').val('')
        $('#user-password').val('')
        $('#profile-id').val(0)

        window.location.replace(response.url)

      },
      error: function (error) {

        toastr.error(error.responseJSON.message, 'Erro ao realizar o login')

      }
    })

  })

  //Seleção e preview das images do produto
  $("#product-images").on("change", function() {

    var files = $(this)[0].files
    var label =  $(".custom-file-label")
    var str = ''

    $.each(files, function (index, element) {

      if (index == 0) {

        str = '"' + element.name + '"';

      } else {

        str = str + '; ' + '"' + element.name + '"';

      }

      $('#images-preview').removeClass('d-none')
        $('#images-preview').append('<img src="'+ URL.createObjectURL(element) + '" class="rounded" style="width: 120px; height: 120px;">');

    })

    label.html(str)

  });

  //Cadastrar categoria
  $('#store-category').on('click', function () {

    var name = $('#category-store-name').val()
    var slug = $('#slug-store-name').val()

    let url = $('#url').val() + '/categories'

    $.post(url, { name: name, slug: slug })
      .done(function(response) {

        toastr.success('Categoria ' + response.category.name + ' cadastrada com sucesso!', 'Categoria cadastrada', {
          timeOut: 2000,
          fadeOut: 2000,
          onHidden: function () {
              window.location.reload();
            }
        })

        $('#cat-name').val('')
        $('#slug-name').val('')

      })
      .fail(function() {

        toastr.error('Erro ao cadastrar a categoria')

      })

  })

  //Cadastrar usuário
  $('#store-user').on('click', function () {

    var name = $('#user-name').val()
    var email = $('#user-email').val()
    var pass = $('#user-password').val()
    var profileId = $('#user-profile-id').val()
    var userLoggedProfileId = $('#user-logged-profile-id').val()

    let url = $('#url').val() + '/users'

    $.post(url, { name: name, email: email, password: pass, profile_id: profileId })
      .done(function(response) {

        toastr.success('Usuário ' + response.user.name + ' cadastrado com sucesso!', 'Usuário cadastrado', {
          timeOut: 2000,
          fadeOut: 2000,
          onHidden: function () {
              window.location.reload();
            }
        })

        $('#user-name').val('')
        $('#user-email').val('')
        $('#user-password').val('')

        if (userLoggedProfileId == 1) {

          $('#user-profile-id').val('0')

        }

      })
      .fail(function() {

        toastr.error('Erro ao cadastrar o usuário')

      })

  })

  //Cadastrar produto
  $('#product-store').on('click', function () {

    let url = $('#url').val() + '/products'

    let data = new FormData($('#store-product-form')[0])

    $.ajax({
      url: url,
      data: data,
      dataType:'json',
      type:'POST',
      processData: false,
      contentType: false,
      success: function(response){

        toastr.success('Produto ' + response.product.name + ' cadastrado com sucesso!', 'Produto cadastrado', {
          timeOut: 2000,
          fadeOut: 2000,
          onHidden: function () {
              window.location.reload();
            }
        })

        $('#product-name').val('')
        $('#product-price').val('')
        $('#product-description').val('')
        $('#category-id').val(0)

      },
      error: function (error) {

        toastr.error(error, 'Erro ao cadastrar o produto')

      }
    })

    return

    $.post(url, data)
      .done(function(response) {

        console.log(response)

        toastr.success('Produto ' + response.user.name + ' cadastrado com sucesso!', 'Produto cadastrado', {
          timeOut: 2000,
          fadeOut: 2000,
          onHidden: function () {
              window.location.reload();
            }
        })

        $('#product-name').val('')
        $('#product-price').val('')
        $('#product-description').val('')


      })
      .fail(function(error) {



      })

  })

  //Atualizar categoria
  $('#updateCategoryModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var id = button.data('id')
    var name = button.data('name')
    var slug = button.data('slug')

    var modal = $(this)

    let url = button.data('url') + '/categories/update'

    var buttonUpdate = modal.find('.modal-footer button#button-update')

    modal.find('.modal-body input#update-category-name').val(name)
    modal.find('.modal-body input#update-slug-name').val(slug)

    buttonUpdate.click(function () {

      var newName = modal.find('.modal-body input#update-category-name').val()
      var newSlug = modal.find('.modal-body input#update-slug-name').val()

      data = {
        id: id,
        name: newName,
        slug: newSlug
      }

      $.post(url, data)
      .done(function() {

        toastr.success('Categoria ' + name + ' atualizada com sucesso!', 'Categoria atualizada', {
          timeOut: 2000,
          fadeOut: 2000,
          onHidden: function () {

            window.location.reload();

          }

        })

        $('#cat').val('')
        $('#slug-name').val('')
        $('#slug-name').attr('disabled', 'disabled')
        $('#update-category').attr('disabled', 'disabled')

      })
      .fail(function() {

        toastr.error('Erro ao atualizar a categoria')

      })

    })



  })

  $('#update-user').on('click', function () {

    var userId = $('#user-id').val()

    let url = $('#url').val() + '/users/update/' + userId

    let data = new FormData($('#update-user-form')[0])
    var selectedProfile = $('#user-profile-id').val()

    data.append('user-profile-id', selectedProfile)

    $.ajax({
      url: url,
      data: data,
      dataType:'json',
      type:'POST',
      processData: false,
      contentType: false,
      success: function (response){

        $('#user-password').val('')
        $('#user-new-password').val('')
        $('#user-profile-id').val(response.profile_id)

        toastr.success('Usuário ' + response.user.name + ' atualizado com sucesso!', 'Usuário atualizado', {
          timeOut: 2000,
          fadeOut: 2000,
          onHidden: function () {

            window.location.reload();

          }

        })

      },
      error: function (error) {

        toastr.error(error.responseJSON.message, 'Erro ao atualizar o usuário')

      }

    })

  })



})
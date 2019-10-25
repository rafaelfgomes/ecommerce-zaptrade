$(document).ready(function () {

  toastr.options.closeButton = true;
  toastr.options={positionClass: 'toast-top-center'};

  $('#cat').on('input', function () {

    var baseUrl = $(this).data('url')
    var selected = $(this).val()
    var length = selected.length

    $('#categories').find('option').each(function () {
      if ($(this).val() == selected) {

        var categoryId = $(this).data('id')
        var url = baseUrl + '/categories/by-id/' + categoryId

        if (length == 0) {

          $('#slug-name').attr('disabled', 'disabled')
          $('#update-category').attr('disabled', 'disabled')

        } else {

          $.get(url, function (response) {

            if (response.data.slug_name == ' ') {

              $('#slug-name').val()
              $('#slug-name').attr('disabled', 'disabled')
              $('#update-category').attr('disabled', 'disabled')

            } else {

              $('#slug-name').removeAttr('disabled')
              $('#update-category').removeAttr('disabled')
              $('#slug-name').val(response.data.slug_name)
              $('#category-id').val(response.data.id)

            }

          });

        }

      }
    })

  })

  $('#cat').on('change', function () {

    var selected = $(this).val()
    var length = selected.length

    if (length == 0) {

      $('#slug-name').val('')
      $('#slug-name').attr('disabled', 'disabled')

    }

  })

  $('#store-category').on('click', function () {

    var name = $('#category-store-name').val()
    var slug = $('#slug-store-name').val()

    var url = $('#url').val() + '/categories'

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

  $('#update-category').on('click', function () {

    var id = $('#category-id').val()
    var name = $('#cat').val()
    var slug = $('#slug-name').val()

    var url = $('#cat').data('url') + '/categories/update'

    $.post(url, { id: id, name: name, slug: slug })
      .done(function(response) {
        
        toastr.success('Categoria ' + response.category.name + ' atualizada com sucesso!', 'Categoria atualizada', {
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

  $('#user-register').on('click', function () {

    var name = $('#user-name').val()
    var email = $('#user-email').val()
    var pass = $('#user-password').val()
    var profileId = $('#user-profile-id').val()
    var userLoggedProfileId = $('#user-logged-profile-id').val()

    var url = $('#url').val() + '/users'    

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

})
$(document).ready(function () {

  $('#cat').on('input', function () {

    var baseUrl = $(this).data('url')
    var selected = $(this).val()
    var length = selected.length

    console.log(length)

    $('#categories').find('option').each(function () {
      if ($(this).val() == selected) {

        var categoryId = $(this).data('id')
        var url = baseUrl + '/categories/slug-name/' + categoryId

        if (length == 0) {
            
          $('#slug-name').attr('disabled', 'disabled')  

        } else {

          $.get(url, function (response) {

            if (response.data.slug_name == ' ') {

              $('#slug-name').val()
              $('#slug-name').attr('disabled', 'disabled')
              
            } else {

              $('#slug-name').removeAttr('disabled')
              $('#slug-name').val(response.data.slug_name)

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

})
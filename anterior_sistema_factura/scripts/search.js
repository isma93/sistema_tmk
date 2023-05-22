

$(document).ready(function () {

(function ($) {

  $('#filtrar').keyup(function () {

      var rex = new RegExp($(this).val(), 'i');

      $('.buscars label').hide();

      $('.buscars label').filter(function () {
      return rex.test($(this).text());
      }).show();

  })

}(jQuery));

});


$(document).ready(function () {

  (function ($) {
  
    $('#filtrar2').keyup(function () {
  
        var rex = new RegExp($(this).val(), 'i');
  
        $('.buscars label').hide();
  
        $('.buscars label').filter(function () {
        return rex.test($(this).text());
        }).show();
  
    })
  
  }(jQuery));
  
  });

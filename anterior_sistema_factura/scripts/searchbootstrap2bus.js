

$(document).ready(function () {

  (function ($) {
  
    $('#filtro').keyup(function () {
  
        var rex = new RegExp($(this).val(), 'i');
  
        $('.buscars h4').hide();
  
        $('.buscars h4').filter(function () {
        return rex.test($(this).text());
        }).show();
  
    })
  
  }(jQuery));
  
  });


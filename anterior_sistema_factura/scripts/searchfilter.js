$(document).ready(function () {

    (function ($) {

      $('#empleado_sucursal').change(function () {


       var myS= $('#empleado_sucursal option').filter(':selected').text();
      
        if (myS==="TODOS")
        {
              var rex = new RegExp(myS, 'i');

              $('.buscars h5').show();

             
        }else{
              var rex = new RegExp(myS, 'i');

                $('.buscars h5').hide();

                $('.buscars h5').filter(function () {
                return rex.test($(this).text());
                }).show(); 
            }
           })

    }(jQuery));

    });


//////////////////////////////////

    $(document).ready(function () {

        (function ($) {
    
          $('#categorias').change(function () {
    
    
           var myS= $('#categorias option').filter(':selected').text();
          
            if (myS==="TODOS")
            {
                  var rex = new RegExp(myS, 'i');
    
                  $('.buscars h5').show();
    
                 
            }else{
                  var rex = new RegExp(myS, 'i');
    
                    $('.buscars h5').hide();
    
                    $('.buscars h5').filter(function () {
                    return rex.test($(this).text());
                    }).show(); 
                }
               })
    
        }(jQuery));
    
        });


        ///////////////////////////////////////

        $(document).ready(function () {

            (function ($) {
        
              $('#marca').change(function () {
        
        
               var myS= $('#marca option').filter(':selected').text();
              
                if (myS==="TODOS")
                {
                      var rex = new RegExp(myS, 'i');
        
                      $('.buscars h5').show();
        
                     
                }else{
                      var rex = new RegExp(myS, 'i');
        
                        $('.buscars h5').hide();
        
                        $('.buscars h5').filter(function () {
                        return rex.test($(this).text());
                        }).show(); 
                    }
                    reset ();
                   })
        
            }(jQuery));
        
            });
            
            
            ///////////////////////////////////////

            $(document).ready(function () {
    
                (function ($) {
            
                  $('#cmbstock').change(function () {
            
            
                   var myS= $('#cmbstock option').filter(':selected').text();
                  
                    if (myS==="TODOS")
                    {
                          var rex = new RegExp(myS, 'i');
            
                          $('.buscars h5').show();
            
                         
                    }else{
                          var rex = new RegExp(myS, 'i');
            
                            $('.buscars h5').hide();
            
                            $('.buscars h5').filter(function () {
                            return rex.test($(this).text());
                            }).show(); 
                        }

                        cierre ();
                       })
            
                }(jQuery));
            
                });

                  ///////////////////////////////////////

            function cierre ()
            
            {

                  
                  var filterbutton = document.getElementById("filterid");
                  filterbutton.setAttribute("class","filter-menu");
                      
            }

            
            function reset ()
            
            {

                  setTimeout("location.href='../appcode/Existencias.php'", 0);



            }
              
              
                        
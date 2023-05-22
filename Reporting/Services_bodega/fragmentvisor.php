<?php 

  $id_intr = $_GET['id'];
  

?>
<head>
<!--
-----------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.map" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.js" integrity="sha512-1cF8XUz5U3BlnRVqNFn+aPNwwSr/FPtrmKvM1g4dJJ9tg8kmqRUzqbSOvRRAMScDnTkOcOnnfwF3+jRA/nE2Ow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js" integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.map" ></script>
<!--
-----------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------
-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>

<body onload="">
  
<a id="redirect" href="./ViewReportpdfbodega.php" class="" value="Print">.</a>
<br>
<div class="Container">

<iframe id="myIframe" name="myIframe" src="./Report_Nota.php?id=<?php echo $id_intr ?>&com=0" width=400 height=300 style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">"No es posible visualizar el contenido"</iframe>

          <script>
            //foco de impresion
            function Print(objetive_focus)
            {

            
              objetive_focus.focus();
              
              objetive_focus.print();
            

              objetive_focus.setTimeout(function () {  alert("Hoja impresa!"); window.location = "ViewReportpdfbodega.php";}, 100);
              
              
             
            }
           
            

            window.addEventListener("afterprint", function(event) {
            

            //heredar el name del frame en foco.
             alert("hello");
             
           });

          //evento impresion en espera
          window.addEventListener("beforeprint", function(event) {
            

           //heredar el name del frame en foco.
            Print(parent.myIframe); 
            
          });

          

            //Keycode 81 Q -- CtrlKey -- Crtl + Q mas codes -> // https://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes
                  $(document).keydown(function(objEvent) {        
                      if (objEvent.ctrlKey) {          
                            if (objEvent.keyCode == 81)
                             {                
                              Print(parent.myIframe); 
                            }            
                     }        
                });


                document.addEventListener("keydown", event => {
                      if(event.ctrlKey && event.keyCode==48){ 
                        
                        //Tecla enter
                        Print(parent.myIframe);
                          
                        
                      }
                    });



        </script>
      

</body>





<link rel="stylesheet" href="./login.css">
 <!--Ajax-->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
<!-------------------------------------------------------------------------------------->
 <!--Toast -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  

 <body>
<div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container">
  <h1>Log In</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form>
    <input type="text" id="TxtUser" name="TxtUser" placeholder="User..">
    <input type="password" name="Txtpassword" id="Txtpassword" placeholder="Password..">
    <a id="realizar" onclick="Search_user('Search_user');" href="#">Log in</a>
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Remember me</span>
      <span id="forgotten">Forgotten password</span>
    </div>
</form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Forgotten</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form>
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn">Get new password</a>
</form>
</div>
<script>
    $('#login-button').click(function(){
    $('#login-button').fadeOut("slow",function(){
      $("#container").fadeIn();
      TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
    });
  });
  
  $(".close-btn").click(function(){
    TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#container, #forgotten-container").fadeOut(800, function(){
      $("#login-button").fadeIn(800);
    });
  });
  
  /* Forgotten Password */
  $('#forgotten').click(function(){
    $("#container").fadeOut(function(){
      $("#forgotten-container").fadeIn();
    });
  });

  
    //-------------------BACKEND-------------------------------------------------------------------------------------------
    function Search_user(Method) {
        var TxtUser= document.getElementById("TxtUser").value;
        var Txtpassword= document.getElementById("Txtpassword").value;
        var parametros = {"TxtUser":TxtUser,"Txtpassword":Txtpassword,"Method":Method};
    $.ajax({
        data:parametros,
        url:'./EncryptUser.php',
        type: 'post',
        dataType: "json",
        error: function(xhr, status, errorThrown) {
        alert('Disculpe, existió un problema');
        dangertoast("Error exepción no controlada contacte con soporte tecnico Error#dblogin Error en dbusuarios");
        var senmsg= document.getElementById("realizar");
         senmsg.value = "Realizar asignación";
          senmsg.removeAttribute("disabled");
         },
        beforeSend: function () {
          var senmsg= document.getElementById("realizar");
          senmsg.setAttribute("disabled",true);
        },
        success: function (response) {   
           //Aquí validas lo que trae el nodo success ( $json['success'] )
           if (response.ok)
           {
            successtoast("Logeado");
            setTimeout("location.href='../../../index.php'", 2000);
           }
           else
           {
            dangertoast("Error usuario incorrecto");
           }
          
          var senmsg= document.getElementById("realizar");
          senmsg.removeAttribute("disabled");
        }
    });
    }
    //-------------END BACKEND------------------------------------------------------------------------------------------------
  
      document.addEventListener("keydown", event => {
                      if(event.keyCode==13){ 
                        
                        //Tecla enter
                        Search_user('Search_user');
                        
                      }
                    });

    
    </script>
    <script  src="../../../script.js"></script>
  <script  src="../../../scripts/Toast.js"></script>
</script>
</body>
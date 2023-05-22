<html>
<?php


include('../include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");



?>
<html>
<head>
<meta charset="utf-8">
<title>Notas Egreso ILP</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="js/invoice.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="../css/animate.css"/>
<link rel="stylesheet" type="text/css" href="../bk/modf.css"/>
<link rel="stylesheet" type="text/css" href="../bk/navbar.css"/>
<link rel="stylesheet" type="text/css" href="../css/mysl.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.transitions.css"/>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">





</head>

<script>
         
		 function retrologout()
            {
				if (confirm("¿Realmente deseas cerrar tu sesión?") == true) {
						return true;
					} else {
					return false;
					}		
					return false;
			}	
						
            
</script>
<script>
            function logout()
            {
               window.location.href = "destroy.php";
            }
</script>

<script>
            function init()
            {
               window.location.href = "../create_invoice.php";
            }
</script>

<script>
            function revisarnota()
            {
               window.location.href = "./AppCode/revisarnota.php";
            }
</script>
<script>
function ancla()
{

  var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        return true;
	} else {
    return false;
	}
  
}
</script>		
</head>


<div class="topnav" id="myTopnav" >
	

  <a href="../master.php" class="active"><img src="../images/Imagen1.png" width="50" height="24"></a>

  <?php
  session_start();
  //Parametros de reenvio
  $ingresar_nota=  '<a href="../create_invoice.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ingresar Nota de Egreso</a>';
 $revisar='<a href="../AppCode/revisarnota.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Revisar Notas</a>';
 $modulo_aut='<a href="../AppCode/Rest_Autorizado/ViewAut.php"><i class="fa fa-book" aria-hidden="true"></i> Módulo de Autorizaciones</a>'; 
 $reportes='<a class="active" href="#"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a>';
 $about ='<a href="#about"><i class="fa fa-rss" aria-hidden="true"></i> About</a>';
 if (isset($_SESSION['Modulo']))
			
 {

   if ($_SESSION['Modulo']!=5 )
   {
	   if ($_SESSION['Modulo']==1)
	   {
		echo $ingresar_nota;
		echo $about;
	   } else if ($_SESSION['Modulo']==2)
	   {
		echo $ingresar_nota;
		echo $revisar;
		echo $reportes;
		echo $about;

	   }
	   else if ($_SESSION['Modulo']==10)
	   {
		
		echo $reportes;
		echo $about;

	   }  
	  else if ($_SESSION['Modulo']==11)
	   {
		
		echo $reportes;
		echo $about;

	   }  
	 
	 
	   else if ($_SESSION['Modulo']==3 ||$_SESSION['Modulo']==7 ||$_SESSION['Modulo']==9)
	   {
		echo $ingresar_nota;
		echo $revisar;
		echo $modulo_aut;
		echo $reportes;
		echo $about;
	   }
	   else 
	   {
		echo '<script>
													  
		window.location = "../Found.php";
	   
   		</script>';
	   }
	   

   } else
   {
	echo $ingresar_nota;
	echo $revisar;
	echo $modulo_aut;
	echo $reportes;
	echo $about;
   }
} else 
{
	
	 echo '<script>
												   
	 window.location = "../Found.php";
	
		</script>';
	
}
 
 ?>
    <div class="pull-right">
  <a id="logout" onclick="return retrologout()" href="../destroy.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Cerrar Sesión</a>
   </div>
  
 
   <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>


</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
	




</body>
<body>

<br><br><br>

<center><iframe src="iframereport.php" style=" top:0px; left:0px; bottom:0px; right:0px; width:80%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
</iframe></center>  

<a type="hidden" id="edit" href="ViewReport.php">
</body>

</html>
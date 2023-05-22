

 <?php
session_start(); 


if ($_SESSION['Modulo']==5 )
{
    

}else
{
    echo '<script> window.location = "Index.php"; </script>';
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$codetemporal=$_SESSION['temporalcodigo_empleado'];
$contratemporal=$_SESSION['temporalPassword'];
$_SESSION = array();
$_SESSION['temporalcodigo_empleado']=$codetemporal;
$_SESSION['temporalPassword']=$contratemporal;


include('include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
?>
<head>
<meta charset="utf-8">
<title>Notas Egreso ILP</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
<link rel="stylesheet" type="text/css" href="./bk/modf.css"/>
<link rel="stylesheet" type="text/css" href="css/mysl.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
<script src="js/invoice.js"></script>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align:right;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }





}
.borderless td, .borderless th {
    border: none;
}
</style>
<script>
            function logout()
            {
               window.location.href = "destroy.php";
            }
</script>
<script>
            function revisarnotas()
            {
               window.location.href = "./AppCode/revisarnota.php";
            }
</script>
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
            function report()
            {
               window.location.href = "./Reporting/Report_master.php";
            }
</script>

<script>
         
		 function most(event)
            {

				event.preventDefault();	
				var activos = document.getElementById("activos").value
				var desactivos = document.getElementById("desactivos").value
				activos=activos - 1;
		if (desactivos==activos)
		{
			alert("No has ingresado productos.");
			return false;
		}
		

		else {
						var notas = document.getElementById("notas").value
							Swal.fire({
					title: '¿Estás seguro?', 
					text: 'Cliente: <?php echo $_SESSION['nom'];?>',            
					icon: 'warning',
					showCancelButton: true,
					cancelButtonColor: '#d33',
					confirmButtonText: 'Guardar',
					cancelButtonText: 'Cancelar'
					}).then((result) => {
					if (result.isConfirmed) {
					document.insert.submit();
					}
				})
		}

								
}	


 			
			
				
						
            
</script>






<script>
         
		 function mostj()
            {
				event.preventDefault();

			
				var activos = document.getElementById("activos").value
				var desactivos = document.getElementById("desactivos").value
				activos=activos - 1;
		if (desactivos==activos)
		{
			alert("Tabla vacia");
			return false;
		}
		else {
					var notas = document.getElementById("notas").value
					if (confirm("¿Realmente deseas enviar esta nota de egreso?") == true) {
						document.getElementById('insert-nt').submit();
					} else {
					return false;
					}		
					return false;
			}

								
}	


 			
			
				
						
            
</script>










<script>
         
		 function retrofilnull(event)
            {
				event.preventDefault();
				
				var actual = document.getElementById("actual").value
				var nuevo1 = document.getElementById("nuevo1").value
				var nuevo2 = document.getElementById("nuevo2").value
				
		if (nuevo1!=nuevo2)
		{
			alert("Las contraseñas no coinciden.");
			return false;
		}

		if (nuevo1.length<8)
		{
			alert("Debes ingresar una contraseña de almenos 8 caracteres.");
			return false;
		}
				Swal.fire({
        title: '¿Estás seguro?', 
		text: 'Se cambiara la contraseña de su usuario en este momento, para cancelar presione el boton de "Cancelar"',            
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
			document.getElementById('nullfill').submit();

        }
    })						
	}	
</script>
<script type="text/javascript">


function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else if (code == 46)//punto es 46
	{
		return true;
	}
	else{ // other keys.
      return false;
    }
}
</script>
<script type="text/javascript">
    // la Validación del Formulario 
	
	function cantidadval() {



var descripPromocion = document.getElementById("descripPromocion").value
var cantidad = document.getElementById("cantidad").value
var nam = document.getElementById("nombreProducto").value
if (nam == ""){alert("Debe de buscar un producto con su codigo para continuar");return false;}
else if (descripPromocion == ""){
//alert("Debes llenar el campo de Ruta")

alert("Debe ingresar una descripcion promocional");
return false;
}else if (cantidad == "") { alert("Debe ingresar una cantidad de producto"); return false; } else 
{

	
			
				var activos = document.getElementById("activos").value
				var desactivos = document.getElementById("desactivos").value
				activos=(activos - desactivos - 1);
		 if (activos>5)
		{
			alert("No puedes ingresar mas de 5 codigos");
			return false;
		}
	




}
}







    function validar() {

	

		var idcliente = document.getElementById("idcliente").value
        var elemento = document.getElementById("rutacliente").value
		var canalcliente = document.getElementById("canal").value
      if (idcliente == ""){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes llenar el campo de codigo cliente",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });


        return false
      }else {


		if (canalcliente == "0"){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes llenar el campo de canal",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });
        return false
      }else {
       

		if (elemento == "0"){
			
			Swal.fire({
					 icon: "error",
					 title: "Debes llenar el campo de Ruta",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });
       	 return false
		
		
		
		
		}
		
		else{return true}

        
      }


        
      }

	 
		
    }

  

</script>
		
		
</head>



<body>

<br>
<br><form onsubmit="retrofilnull(event)" action="./AppCode/passwordadmin.php" id="nullfill" method="post" class="invoice-form" role="form" novalidate>
<div class="container">
<div class="panel panel-danger">

														<div class="panel-heading">Cambio de contraseña obligatorio sistema ILP</div>	
														<center><h1><i class="fa fa-cube" aria-hidden="true"></i></h1></center>
														<div class="panel-body">

														<div class="form-group">

												
														
														<center><table class="table-borderless">
															<tr>
														<th width="100%" colspan="2"><span> Codigo empleado:</span></th>
														</tr><tr>											
														
														
														
														<th width="90%"><input id="actual" type="password" value=""class="form-control" name="actual"  placeholder="Codigo" autocomplete="off"></th>
														<th width="10%" ><a  onclick="myFunction()" class="btn btn-dark"><i id="ojo1" class="fa fa-eye" ></i></a></th>	
													</tr>


													<tr><th colspan="2"><hr></th></tr>


													<tr>
														<th width="100%" colspan="2"><span> Ingrese nueva contraseña:</span></th>
														</tr><tr>											
														
														
														
														<th width="90%"><input id="nuevo1" type="password" value=""class="form-control" name="nuevo1"  placeholder="Nueva contraseña" autocomplete="off"></th>
														<th width="10%" ><a onclick="myFunction2()"  class="btn btn-dark"><i id="ojo2" class="fa fa-eye" ></i></a></th>	
													</tr>


													<tr><th colspan="2"><hr></th></tr>

													<tr>
														<th width="100%" colspan="2"><span> Repita nueva contraseña :</span></th>
														</tr><tr>											
														
														
														
														<th width="90%"><input id="nuevo2" type="password" value=""class="form-control" name="nuevo2"  placeholder="Nueva contraseña" autocomplete="off"></th>
														<th width="10%" ><a onclick="myFunction3()"  class="btn btn-dark"><i id="ojo3" class="fa fa-eye" ></i></a></th>	
													</tr>

													<tr><th colspan="2"><hr></th></tr>

																							
														
														
														
														<th width="90%" colspan="1"><input id="actual" type="submit" value="Continuar" class="tn btn-danger	 btn-lg btn-block" name="actual"  placeholder="Descripción de Promocion" autocomplete="off"></th>
															
													</tr>
														</table>
														</div>






<script>

function myFunction() {
  var x = document.getElementById("actual");
  var eye1 = document.getElementById("ojo1");
  if (x.type === "password") {
    x.type = "text";
	eye1.className="fa fa-eye-slash";
  } else {
    x.type = "password";
	eye1.className="fa fa-eye";
  }
}


function myFunction2() {
  var x = document.getElementById("nuevo1");
  var eye2 = document.getElementById("ojo2");
  if (x.type === "password") {
    x.type = "text";
	eye2.className="fa fa-eye-slash";
  } else {
    x.type = "password";
	eye2.className="fa fa-eye";
  }
}


function myFunction3() {
  var x = document.getElementById("nuevo2");
  var eye3 = document.getElementById("ojo3");
  if (x.type === "password") {
    x.type = "text";
	eye3.className="fa fa-eye-slash";
  } else {
    x.type = "password";
	eye3.className="fa fa-eye";
  }
}
</script>



</body>
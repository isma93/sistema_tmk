
<?php
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include('include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
?>
<head>
<meta charset="utf-8">
<title>Remision TMK</title>
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


var descripPromocion = document.getElementById("descripPromocion").value
var cantidad = document.getElementById("cantidad").value
var nam = document.getElementById("nombreProducto").value
if (nam == ""){alert("Debe de buscar un producto con su código para continuar");return false;}
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








    function validar() {

	

		var idcliente = document.getElementById("idcliente").value
        var elemento = document.getElementById("rutacliente").value
		var canalcliente = document.getElementById("canal").value
      if (idcliente == ""){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes llenar el campo de código cliente",
				
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


<div class="topnav" id="myTopnav" >
	

  <a href="master.php" class="active"><img src="./images/Imagen1.png" width="50" height="24"></a>

  <?php
  //Parametros de reenvio
  $ingresar_nota=  '<a href="#"  class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ingresar Desalojo</a>';
 $revisar='<a href="./AppCode/revisarnota.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Revisar Desalojo</a>';
 $modulo_aut='<a href="./AppCode/Rest_Autorizado/ViewAut.php"><i class="fa fa-book" aria-hidden="true"></i> Módulo de Autorizaciones</a>'; 
 $reportes='<a href="./Reporting/Report_master.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a>';
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

	   } else if ($_SESSION['Modulo']==3 ||$_SESSION['Modulo']==7 ||$_SESSION['Modulo']==9)
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
													  
		window.location = "Found.php";
	   
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
												   
	 window.location = "Found.php";
	
		</script>';
	
}
 
 ?>
    <div class="pull-right">
  <a id="logout" onclick="return retrologout()" href="destroy.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Cerrar Sesión</a>
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













<!--ESPACE-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


			<form onsubmit="return validar()" action="BuscarCliente.php" id="BuscarCliente" method="post" class="invoice-form" role="form" novalidate> 
		
			
			<div class="load-animate animated fadeInUp">
			<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="title">ㅤㅤㅤㅤㅤㅤ</h2>
			</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

			<div>
			<div class="form-group">


			<!-- Aca ingresar la otra tabla-->



					   

				  
								<div >
													<div class= "form-group">
												  
													
													<input align="right" class="tn btn-info btn-lg btn-block" type="submit" id="btn-enviar" value="Seleccionar Cliente" name="BuscarCliente"></input>
												
													</div>

											   
								   
								</div>

								<div class="form-group">

											<select tabindex="2" name="clienteseleccionado" id="clienteseleccionado"  class="form-control">
												<option value="0">Seleccione Cliente..</option>

														<?php  
														$cid=$_SESSION['codigo_empleado'];
														$query="call SP_TMK_LISTAR_CLIENTES_EMPLEADOS('$cid')";
														$resultado=mysqli_query( $conexion, $query ) or die ( "Error de base de datos");
														$p = 1;
														while ($row=mysqli_fetch_array($resultado))
														{
														?>
														<option 
														
														value="<?php echo $row['codigo_empleado']; ?>" >  <?php echo $row['nombre_cliente']; ?> </option>
														<?php  $p++;
														}  
														//mysqli_close($conexion);
														mysqli_next_result($conexion); 
														
														?>
											</select>


														
								</div>




								<div>	

							

								
									</div>
																	
							


								<div class="form-group">


									
								</div>


			


								<div class="form-group"  autocomplete="off">

							
								<br>
								<div class="panel panel-primary">

<div class="panel-heading">Datos seleccionados</div>	

<div class="panel-body">
								</div>
<div class="panel-body">



						<div class="form-group">
							<span>Nombre del cliente:</span>
									<input readonly value="<?php if (isset($_SESSION['nom'])){echo $_SESSION['nom']; }else {echo'cliente no asignado';}?>" type="text" class="form-control" name="ruta" id="nombrecliente" placeholder="Aqui veras el nombre del cliente
									" autocomplete="off" >
								</div>
								
								<div class="form-group"  autocomplete="off">
								<span>Empleado:</span>
										<input readonly  value="<?php if (isset($_SESSION['first_name'])){echo $_SESSION['first_name']; }else {}?>" class="form-control" name="Direccion" id="first_name" placeholder="Direccion" required autocomplete="off">

										</div>


								<div class="form-group">
<!---------------------------------------------- -->

</div>























								<div class="form-group">
											</div></div></div>	
														</div>

									
								</div>

								</div>   



								</div>

								</form>	
							   <!-- </form> !-->

							   <!--- FORMULARIO MODAL CLIENTE!-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
							   

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
								<div>
							<div class= "form-group">
						 <form action="BuscarProducto.php" method="post" name="busqueda" class="invoice-form" role="form" novalidate> 
					

														
														</div>


													

														<?php 
	if (isset($_SESSION['foreingkey']))
	{
		if($_SESSION['foreingkey']==true)
		{

			$localkey=true;
			$_SESSION['foreingkey']=false;

		}else
		{
			$localkey=false;
		}

	}else
	{
		$localkey=false;

	}

	?>



														<div class="form-group">
																<button class="tn btn-info btn-lg btn-block" name="BuscarProducto" ONCLICK="location.href='BuscarProducto.php'">Buscar producto</button>
																</div>
																<div class="form-group">
																<!--<input tabindex="4"  value="<?php // if (isset($_SESSION['nombre_producto'])){if(isset($localkey)){if ($localkey==true){$_SESSION['id_producto']='';}else {echo $_SESSION['id_producto'];}} else {echo $_SESSION['id_producto'];} }else {}?>" type="text" class="form-control" name="te" placeholder="Código Producto" autocomplete="off">
																--></div>	
																<div>	

																<select name="te" id="te"  class="form-control">
																	<option value="0">Seleccione Producto</option>
												
																	<?php
																		$query=" select * FROM producto;";
																		$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																		$i = 0;
																		while ($row=mysqli_fetch_array($resultado))
																			{
																				?>
																			

																		<option 
																				<?php $_SESSION['codigo_producto'.$i]=$row['codigo_producto'];
																				$_SESSION['nombre_producto'.$i]=$row['nombre_producto'];
																				
																				
																				 ?>

																				value="<?php echo $row['codigo_producto']; ?>"    > <?php echo $row['codigo_producto'];echo " - ";  echo $row['nombre_producto']; ?> </option>
																				<?php  $i++;
																	} ?>
																	</select><br>
														        </div>
														</div>
													     	



							</form>	
								
														<div class="form-group">
													<form onsubmit="return cantidadval()" action="./AppCode/MetaCarga.php" method="post"> 
													<input type="hidden" readonly value="<?php if (isset($_SESSION['nombre_producto'])){echo $_SESSION['id_producto']; }else {echo 'Producto no encontrado';}?>" type="text" class="form-control" name="codigo" placeholder="Código Producto" autocomplete="off">
														


														<div class="form-group">

														<input <?php if (isset($_SESSION['ingreso_des'])){ if($_SESSION['ingreso_des']==true){}else{echo "readonly";} }else {echo "readonly";}?> tabindex="5" onkeypress="return valideKey(event);"  class="form-control" id= "cantidad" type="number" name="cantidad" placeholder="Cantidad" autocomplete="off" min="0" step="0.000001" max="99999" >
															
														</div>
														

														<div class="form-group"  autocomplete="off">
															
								

								</div>


														<div class="form-group">
															
														<input <?php if (isset($_SESSION['ingreso_des'])){ if($_SESSION['ingreso_des']==true){}else{echo "readonly";} }else {echo "readonly";}?> maxlength="44" tabindex="6" type="text" class="form-control" name="p_precio" id="p_precio" placeholder="Precio" autocomplete="off">
															
														</div>
													
								<div class="panel panel-primary">

<div class="panel-heading">Datos seleccionados</div>	

<div class="panel-body">
								</div>
<div class="panel-body">

<div class="form-group">
	<span>Nombre producto:</span>
	
<input readonly value="<?php if (isset($_SESSION['nombre_producto'])){if(isset($localkey)){if ($localkey==true){$_SESSION['nombre_producto']='';}else {echo $_SESSION['nombre_producto'];}} else {echo $_SESSION['nombre_producto'];} }else {}?>" type="text" class="form-control" name="nombreProducto" id="nombreProducto" placeholder="Nombre Producto" autocomplete="off">
														</div>

<div class="form-group">

														<input readonly type="text" class="form-control" name="Entidad" placeholder="Entidad" autocomplete="off">
															
														</div>





</div></div></div>
														<div class="form-group">
											<button class="tn btn-success btn-lg btn-block" id="addRows" type="submit"  >+ Agregar Más</button>
									</form>
														
															
														
															



								
							</div>
							</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			</div>
														</div>
														<div class="outer">
				<table class="table table-bordered" id="invoiceItem">	
					<tr>
						<thead >
						<th width="10%">Código</th>
						<th width="30%">Nombre Producto</th>
						<th width="15%">Cantidad</th>
						<th width="15%">Precio</th>								
						<th width="70%">Sub Total</th>
						<th width="20%">Acción</th>
						</thead>
					</tr>	
					<?php
					$i=1;	
					if (isset($_SESSION['contado'])){					
					while ($i <= $_SESSION['contado']){
										?>
									 
									<tr>
									    <?php

									$codificar ="";
									$codificar = $_SESSION['codigo'.$i]; ?>
										 <?php if ($_SESSION['codigo'.$i]<=0){} else{?><td width="10%"> <?php echo strval($codificar);?></td> <?php } ?> 
										  <?php if ($_SESSION['codigo'.$i]<=0){} else{?><td width="30%"> <?php echo $_SESSION['nombreProducto'.$i];?></td><?php }  ?> 
										  <?php if ($_SESSION['codigo'.$i]<=0){} else{?><td width="15%"><?php echo $_SESSION['cantidad'.$i];?></td> <?php }  ?> 
										  <?php  if ($_SESSION['codigo'.$i]<=0){} else{?><td width="15%"><?php if(isset($_SESSION['P_PRECIO'.$i])) echo $_SESSION['P_PRECIO'.$i];?> </td> <?php } ?> 
										  <?php if ($_SESSION['codigo'.$i]<=0){} else{?> <td width="70%"> <?php  if(isset($_SESSION['SUBTOTAL'.$i]))  echo $_SESSION['SUBTOTAL'.$i];?> <?php } ?> </td>
										<?php if ($_SESSION['codigo'.$i]<=0){} else{?><td width="20%"> <a class="btn btn-danger" href='./AppCode/Eliminartable.php?id=<?php echo $_SESSION['nombreProducto'.$i]?>&com=<?php echo $i ?>' > <i class="fa fa-trash"></i></a> <?php }  ?>
										<?php  $i++;
									} }?>
									</tr>				
				</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
			</div>
			<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

			
				
				
			</div>
			</div>


			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
								<div>
							<div class= "form-group">


							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <span class="form-inline" id="invoiceItem">
        <div class="form-group">
            <label>Gran total: &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon currency"><div style="font-size:10px">$</div></div>
                <input readonly value="<?php if (isset($_SESSION['GRANTOTALVAR'])) echo $_SESSION['GRANTOTALVAR'];  ?>" type="" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
            </div>
        </div>
        
    </span>
</div>
</div>


								</div>
								</div>


			<form onsubmit="mostj(event)" action="./AppCode/Insertable.php" method="post" id="insert-nt" name="insert-nt" class="invoice-form" role="form" novalidate> 
			<div class="">	
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<h3>Notas: </h3>
				<input id="activos" readonly type="hidden" value= "<?php echo $i; ?>" class="form-control" name="hh" placeholder="Entidad" autocomplete="off">
				<input id="desactivos" readonly type="hidden" value= "<?php if (isset($_SESSION['delete_this'])){echo $_SESSION['delete_this']; }else {} ?>" class="form-control" name="hh" placeholder="Entidad" autocomplete="off">
														
				<div class="form-group">
					<textarea maxlength="120" tabindex="7" class="form-control txt" rows="5" name="notas" id="notas" placeholder="Notas"></textarea>
				</div>
				<br>
				<div class="form-group">
					
					<input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="Guardar Nota" class="tn btn-success btn-lg btn-block">						
								
				</div>
				
			</div>

			</div>
			<div class="clearfix"></div>		      	
			</div>
			</form>
			<br><br><br><br><br><br><br><br><br><br>
			<script> 

document.addEventListener('keypress', function(evt) {

// Si el evento NO es una tecla Enter
if (evt.key !== 'Enter') {
  return;
}

let element = evt.target;

// Si el evento NO fue lanzado por un elemento con class "focusNext"
if (!element.classList.contains('form-control')) {
  return;
}

// AQUI logica para encontrar el siguiente
let tabIndex = element.tabIndex + 1;
var next = document.querySelector('[tabindex="'+tabIndex+'"]');

// Si encontramos un elemento
if (next) {
  next.focus();
  event.preventDefault();
}
});




</script>
			
<?php
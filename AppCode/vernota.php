
<html><head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
 <?php
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
if (!empty($_SESSION['backendreturn']))
{
if ($_SESSION['backendreturn']==true){
	$_SESSION['backid'] = $_SESSION['dir'];
	$ID=$_SESSION['dir'];
	$_SESSION['id_intr']=$_SESSION['dir'];
	$_SESSION['backendreturn'] = false;
	
}}
else {

 if (isset($_GET["id"])){
	$_SESSION['backid'] = $_GET["id"];
	$ID = $_GET["id"];
$com = $_GET["com"];
$_SESSION['id_intr']=$_GET["id"];
$_SESSION['backendreturn'] = false;

 }
 else {
	if (isset($_SESSION['backid'])){
		$ID = $_SESSION['backid'];
		$_SESSION['id_intr'] = $_SESSION['backid'];
	}
	  }

}

$query="SELECT * FROM nota_egreso where id_nota_egreso_interna ='$ID' ";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
$p = 0;
while ($row=mysqli_fetch_array($resultado))
	{
		?>


		<?php 
		/*
		$_SESSION['id_cliente'.$p]=$row['id_cliente'];
		$_SESSION['nombre_cliente'.$p]=$row['nombre_cliente'];
		$_SESSION['direccion_cliente'.$p]=$row['direccion_cliente'];
		*/
		$_SESSION['e_id_nota_egreso']=$row['id_nota_egreso'];
		$_SESSION['e_fecha_ingreso']=$row['fecha_ingreso'];
		$_SESSION['e_id_nota_egreso_interna']=$row['id_nota_egreso_interna'];
		$_SESSION['e_id_cliente']=$row['id_cliente'];
		$cl=$row['id_cliente'];
		$_SESSION['e_direccion_entrega']=$row['direccion_entrega'];
		$_SESSION['e_id_ruta']=$row['id_ruta'];
		$_SESSION['e_codigo_empleado']=$row['codigo_empleado'];
		$_SESSION['e_id_cuenta']=$row['id_cuenta'];
		$cuenta1=$row['id_cuenta'];
		$_SESSION['e_id_uso']=$row['id_uso'];
		$uso=$row['id_uso'];
		$_SESSION['e_id_cargo_entidad']=$row['id_cargo_entidad'];
		$entidad_id=$row['id_cargo_entidad'];
		$_SESSION['e_notas']=$row['notas'];
		
		
	
		
		
		
		
		
		?>

		
		<?php  $p++;


}
//DETALLE EGRESO
$query="SELECT * FROM detalle_nota_egreso where id_nota_interna ='$ID' ";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
$k = 0;
while ($row=mysqli_fetch_array($resultado))
	{
		?>


		<?php 
		/*
		$_SESSION['id_cliente'.$p]=$row['id_cliente'];
		$_SESSION['nombre_cliente'.$p]=$row['nombre_cliente'];
		$_SESSION['direccion_cliente'.$p]=$row['direccion_cliente'];
		*/
		$_SESSION['d_id_detalle_nota_egreso'.$k]=$row['id_detalle_nota_egreso'];
		$_SESSION['d_id_nota_interna'.$p]=$row['id_nota_interna'];
		$_SESSION['d_id_entidad'.$p]=$row['id_entidad'];
		$_SESSION['d_id_producto'.$p]=$row['id_producto'];
		$_SESSION['d_id_tipo_medida'.$p]=$row['id_tipo_medida'];
		$_SESSION['d_id_nota_interna'.$p]=$row['id_nota_interna'];
		$_SESSION['d_cantidad'.$p]=$row['cantidad'];
		$_SESSION['d_descripcion_promocion'.$p]=$row['descripcion_promocion'];
		
		
	
		
		
		
		
		
		?>

		
		<?php  $p++;

		
}

$query="SELECT * FROM cliente where id_cliente ='$cl' ";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
$k = 0;
while ($row=mysqli_fetch_array($resultado))
	{
		?>


		<?php 
		
		$_SESSION['cl_id_cliente']=$row['id_cliente'];
		$_SESSION['cl_nombre_cliente']=$row['nombre_cliente'];
		$_SESSION['cl_direccion_cliente']=$row['direccion_cliente'];
		
		
	
		
		
		
		
		
		?>

		
		<?php  $p++;

		
}


///////////////////////////////////////////////////////////////////////
$query="SELECT * FROM  uso_nota_egreso,cargo_entidad,cuentas_contables where id_cargo_entidad ='$entidad_id'and id_cuenta ='$cuenta1' and id_uso='$uso'";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
$k = 0;
while ($row=mysqli_fetch_array($resultado))
	{
		?>


		<?php 
		
		$_SESSION['usosno']=$row['uso_nota_egreso'];
		$_SESSION['id_cargo_entidad_']=$row['cargo_entidad'];
		$_SESSION['mbcuenta']=$row['nombre_cuenta'];
		
		
	
		
		
		
		
		
		?>

		
		<?php  $p++;

		
}

















												$Rut=$_SESSION['e_id_ruta'];
												$query="Select*from ruta where id_ruta='$Rut'";
																
																$resultado1=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																$z=1;
																while ($row=mysqli_fetch_array($resultado1))
																{
																	$ruta=$row['ruta'];
																	$z++;
																}

?>
<head>
<meta charset="utf-8">
<title>Notas Egreso ILP</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="../css/animate.css"/>
<link rel="stylesheet" type="text/css" href=".././bk/modf.css"/>
<link rel="stylesheet" type="text/css" href=".././bk/navbar.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
<script src="js/invoice.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script>
            function logout()
            {
               window.location.href = "destroy.php";
            }
</script>
<script>
            function revisarnotas()
            {
               window.location.href = "revisarnota.php";
            }
</script>

<script>
            function init()
            {
               window.location.href = "../create_invoice.php";
            }
</script>
<script>
         
		 function retrologout()
            {
				if (confirm("¿Realmente deseas cerrar tu sesion?") == true) {
						return true;
					} else {
					return false;
					}		
					return false;
			}	
						
            
</script>

<script>
         
		 function retronull(event)
            {
				event.preventDefault();
				
				
				Swal.fire({
        title: '¿Estás seguro?', 
		text: 'Una nota de egreso anulada no se podra recuperar',            
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
			document.getElementById('te').submit();
     

        }
    })						
	}	
						
            
</script>

<script>
         
		 function retrofil(event)
            {
				event.preventDefault();
				var nt = document.getElementById("nt").value
				var x1 = document.getElementById("usos").value
				var x2 = document.getElementById("entity_s").value
				var x3 = document.getElementById("cuenta").value
				if (nt!=0){

					if (x1!="PREDETERMINADO"){
						if (x2!="PREDETERMINADO"){
							if (x3!="PREDETERMINADO"){
				var notas = document.getElementById("notas").value
				Swal.fire({
        title: '¿Estás seguro?', 
		text: 'Una vez enviada la nota de egreso pasara a estar pendiente de autorizacion. ',            
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

	else {
		alert("Debes agregar cuenta");
	}	
}else {
		alert("Debes agregar entidad.");
	}	
					}
	else {
		alert("Debes agregar usos");
	}	


	}	//cierre cero
	else {
		alert("Debes seleccionar a quien se le asignara la nota de egreso.");
	}	
						
            }
</script>
		
<script type="text/javascript">
    // la Validación del Formulario 
	
    function validar() {

	

		var uso = document.getElementById("uso").value
        var entity = document.getElementById("entity").value
		var cuentas = document.getElementById("cuentas").value
      if (cuentas == 0){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes seleccionar un cuenta!.",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });


        return false
      } else if (entity == 0){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes seleccionar una entidad!.",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });


        return false
      }
	  else if (uso == 0){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes seleccionar un uso!.",
				
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


        
      

	 
		
    
  

</script>
		
		
</head>

<div class="topnav" id="myTopnav" >
	

  <a href="../master.php" class="active"><img src="../images/Imagen1.png" width="50" height="24"></a>

  <?php

  //Parametros de reenvio
  $ingresar_nota=  '<a href="../create_invoice.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ingresar Nota de Egreso</a>';
 $revisar='<a class="active" href="revisarnota.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Revisar Notas</a>';
 $modulo_aut='<a href="./Rest_Autorizado/ViewAut.php"><i class="fa fa-book" aria-hidden="true"></i> Modulo de Autorizaciones</a>'; 
 $reportes='<a href="../Reporting/Report_master.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a>';
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
  <a id="logout" onclick="return retrologout()" href="../destroy.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Cerrar Sesion</a>
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


			<form onsubmit="return validar()" action="saveentity.php" id="BuscarCliente" method="post" class="invoice-form" role="form" novalidate> 
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

  

					   <!-- PANELES-->

			<div class="panel panel-primary">

				<div class="panel-heading">Descripcion de datos</div>	

				<div class="panel-body">
					 <!-- PANELES-->
				  
								<div >
												
											   
								   
								</div>
								 
								  <div class="form-group" id="contenedor">

								 
								<tr>
								
								 <Td>
								 <span>Codigo del cliente:</span>
									 <input readonly value="<?php if (isset($_SESSION['e_id_cliente'])){echo $_SESSION['e_id_cliente']; }else {}?>" type="text" class="form-control" name="codigoCliente" id="idcliente" placeholder="Código Cliente" required autocomplete="off">
									 </td>
									 

								</tr>
											   
								</div>

								<div class="form-group">
								<span>Codigo de nota egreso:</span>
									<input readonly value="<?php if (isset(	$_SESSION['id_intr'])){echo 	$_SESSION['id_intr']; }else {}?>" type="text" class="form-control" name="ruta" id="nombrecliente" placeholder="Ruta" autocomplete="off" >
								</div>
								<div class="form-group">
								<span>Nombre del cliente:</span>
									<input readonly value="<?php if (isset($_SESSION['cl_nombre_cliente'])){echo $_SESSION['cl_nombre_cliente']; }else {}?>" type="text" class="form-control" name="ruta" id="nombrecliente" placeholder="Ruta" autocomplete="off" >
								</div>
								
								<div class="form-group"  autocomplete="off">
								<span>Direccion del cliente:</span>
										<input readonly  value="<?php if (isset($_SESSION['e_direccion_entrega'])){echo $_SESSION['e_direccion_entrega']; }else {}?>" class="form-control" name="Direccion" id="direccioncliente" placeholder="Direccion" required autocomplete="off">

										</div>



								<div class="form-group">
								<span>Ruta:		</span>

								<input readonly  value="<?php if (isset($ruta)){echo $ruta; }else {}?>"  type="text" class="form-control" name="rutacliente" id="rutacliente" placeholder="Ruta" autocomplete="off" required>

									
								</div>


								<div class="form-group"  autocomplete="off">

							

								</div>
								<div class="form-group">
								<span> Canal: </span>
														<input 
														<?php
															
															$idc=$_SESSION['id_intr'];
															$query="select*From nota_egreso where id_nota_egreso_interna= '$idc'";
															$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
															if ($resultado)
															{
																
																while ($row=mysqli_fetch_array($resultado))
																{
																	
																	 $var2=$row['id_canal'] ;

																	
																	
																}
																 if ($var2>0){

																$query="select*From canal where id_canal= '$var2'";
																$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
															
																while ($row=mysqli_fetch_array($resultado))
																{
																	
																	$res= $row['nombre_canal'];

																	
																	
																}
															
																	}		

															}


													


										?>
										
														
														
														
														readonly value="<?php echo $res; ?>" type="text" class="form-control" name="mostrandocanal" placeholder="Canal" autocomplete="off">
															
														</div>
													
									
								</div>
								<br>
								</div>   


								</div></div></div>
								</div>

							
							   <!-- </form> !-->
							   

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
								<div>
							<div class= "form-group">
						
														
														</div>


														<div class="form-group">
														<div class= "form-group">
												  
													
												  <input align="right" class="tn btn-info btn-lg btn-block" type="submit" id="guardar_entidad" value="Guardar Entidades" name="guardar_entidad"></input>
											  
												  </div>

														</div>
														<div class="form-group">
														



				
								<select name="cuentas" id="cuentas"  class="form-control">
									<option value="0">Seleccione la cuenta</option>
				 
									<?php
										$query="Select*from cuentas_contables;";
										$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
										$i = 0;
										while ($row=mysqli_fetch_array($resultado))
											{
												?>

										<option 
												<?php $_SESSION['id_cuenta'.$i]=$row['id_cuenta'];
												$cuenta=$row['cuenta'];
												$nombre_cuenta=$row['nombre_cuenta'];
												$_SESSION['cuenta'.$i]=$row['cuenta'];
												$_SESSION['nombre_cuenta'.$i]=$row['nombre_cuenta'];
												echo $_SESSION['cuenta'.$i];
												$_SESSION['numero_cuentas']=$i; ?>

												value="<?php echo $row['id_cuenta']; ?>"    > <?php echo $row['cuenta'];echo " - ";  echo $row['nombre_cuenta']; ?> </option>
												<?php  $i++;
									} ?>




									

										
										
										
										
										

										
															  
								</select>










														</div>
															
														
														</div>
							
								
														<div class="form-group">
												
													
														

								<select name="entity" id="entity"  class="form-control">
									<option value="0">Seleccione el cargo de entidad</option>
				 
									<?php
										$query="Select*from cargo_entidad;";
										$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
										$i = 0;
										while ($row=mysqli_fetch_array($resultado))
											{
												?>

										<option 
												<?php $_SESSION['id_cargo_entidad'.$i]=$row['id_cargo_entidad'];
												$_SESSION['cargo_entidad'.$i]=$row['cargo_entidad'];
												
												
												$_SESSION['numero_cargos']=$i; ?>

												value="<?php echo $row['id_cargo_entidad']; ?>"    > <?php echo $row['id_cargo_entidad'];echo " - ";  echo $row['cargo_entidad']; ?> </option>
												<?php  $i++;
									} ?>




									

										
										
										
										
										

										
															  
								</select>







														</div>


														<div class="form-group">

														



														<select name="uso" id="uso"  class="form-control">
																	<option value="0">Seleccione su uso</option>
												
																	<?php
																		$query="Select*from uso_nota_egreso;";
																		$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																		$i = 0;
																		while ($row=mysqli_fetch_array($resultado))
																			{
																				?>

																		<option 
																				<?php $_SESSION['id_uso'.$i]=$row['id_uso'];
																				$_SESSION['uso_nota_egreso'.$i]=$row['uso_nota_egreso'];
																				
																				
																				$_SESSION['numero_egreso']=$i; ?>

																				value="<?php echo $row['id_uso']; ?>"    > <?php echo $row['id_uso'];echo " - ";  echo $row['uso_nota_egreso']; ?> </option>
																				<?php  $i++;
																	} ?>




									

										
										
										
										
										

										
															  
								</select>








								
															
														</div>
														<div class="panel panel-primary">

														<div class="panel-heading">Descripcion de datos</div>	
														
														<div class="panel-body">

														<div class="form-group">
														<span> Cuenta: </span>
														
														<input readonly value="<?php echo $_SESSION['mbcuenta']; ?>"class="form-control" name="descripPromocion" id="cuenta" placeholder="Descripción de Promocion" autocomplete="off">
															
														</div>

														<div class="form-group"  autocomplete="off">
													
								

								</div>


														<div class="form-group">
														<span> Cargo de entidad: </span>
														<input readonly value="<?php echo $_SESSION['id_cargo_entidad_']; ?>"class="form-control" name="descripPromocion" id="entity_s" placeholder="Descripción de Promocion" autocomplete="off">
														<input type="hidden"  readonly value="<?php echo $_SESSION['id_intr']; ?>"class="form-control" name="codigointerno_" id="codigointerno_" placeholder="Descripción de Promocion" autocomplete="off">
															
														</div>
														<div class="form-group">
														<span> Usos: </span>
														<input readonly value="<?php echo $_SESSION['usosno']; ?>"class="form-control" name="descripPromocion" id="usos" placeholder="Descripción de Promocion" autocomplete="off">
															
														</div>

														<div class="form-group">
														</div>
														</div>
									
														
															
														
															



								
							</div>
							</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			</div>

			</form>	
			<form onsubmit="retrofil(event)" action="Confirm.php" method="post" name="insert" class="invoice-form" role="form" novalidate> 
		
				<table class="table table-bordered table-hover" id="invoiceItem">	
					<tr>
						
						<th width="10%">Código</th>
						<th width="30%">Nombre Producto</th>
						<th width="10%">Cantidad</th>div
						<th width="20%">Entidad</th>								
						<th width="50%">Descripción promoción</th>
					
					   
					</tr>	
					<tr>
				 						<?php
										 
												$query="select*from detalle_nota_egreso where id_nota_interna='$ID'";
												$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
												$Star = 1;
												while ($row=mysqli_fetch_array($resultado))
													{
														echo '<tr>';
														$id_detalle_nota_egreso = $row['id_detalle_nota_egreso'];
														$id_proc=$row['id_producto'];
														$cant=$row['cantidad'];
														$desc=$row['descripcion_promocion'];
													echo '<td> <input name= "id_'.$Star.'" class ="form-control" readonly value="'.$row['id_producto'].'"></td>';



													echo '<td >'; 
													
													
													
													$query="Select*from producto where codigo_producto='$id_proc';";
																		$resultado3=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																		$w = 1;
																		while ($row=mysqli_fetch_array($resultado3))
																			{
																				?>

																		
																				<?php 
																				
																				echo '<input name= "nametable_'.$Star.'" class ="form-control" readonly value="'.$row['nombre_producto'].'">';
																				?>

																				
																				<?php  $w++;
																	} 
																
													
													
													
														echo ' </td>';






													echo '<td> <input name= "cant_'.$Star.'" class ="form-control" readonly value= "'.$cant.'"></td>';

													echo '<td contenteditable="true"> '; 
													
													
													
													?>

													<select name="shh_<?php echo $Star; ?>" id="cargoentidad"  class="form-control">
													<option value="0">Seleccione..</option>
								 
													<?php
														$query="Select*from entidades;";
														$resultados=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
														$j = 0;
														while ($row=mysqli_fetch_array($resultados))
															{
																?>
				
														<option 
																<?php $_SESSION['id_entidad'.$i]=$row['id_entidad'];
																$_SESSION['marca_entidad'.$i]=$row['marca_entidad'];
																
																
																$_SESSION['entidad']=$row['entidad'];?>
				
																value="<?php echo $row['id_entidad']; ?>"    > <?php echo $row['marca_entidad'];echo " - ";  echo $row['entidad']; ?> </option>
																<?php  $j++;
													} ?>
				
				
				</select>
				
				
													
				
														
				
														
														
														
				
														
																			  
												








<?php
													echo '<td contenteditable="true"> <input maxlength="44" tabindex="'.$Star.'" name= "desc_'.$Star.'" class ="form-control"  value= "'.$desc.'"></td>';
													
													 echo  '<input   name="id_detalle_nota_egreso_'.$Star.'" value="'.$id_detalle_nota_egreso.'" type="hidden">';
													$Star++;
													
															
													
																				}
													
													?> <?php
														$i++;	
													echo 	'</tr>';				
													
												
													
														
														
															mysqli_close( $conexion );
										 
										 
										 
										 
										 
										 
																
											 ?>
		</tr>					
				</table> <input name="starr" value="<?php echo $Star; ?>" type="hidden"> 
			</div>
			</div>
			<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				
				
			</div>
			</div>
			<div class="">	
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="form-group">
					<select class= "form-control" name="autonota" id="nt">
					<option value="0">Seleccione a quien desea enviar su nota de egreso</option>
					<option value="2">REVISADO MERCADEO</option>
					<!-- Aqui murio varias horas de analisis en este sistema uwu.
					<option value="3">AUTORIZACION DE MERCADEO CUIH1</option>
					<option value="4">AUTORIZACION DE MERCADEO CUIH2</option>
					<option value="5">AUTORIZACION DE MERCADEO CUIP</option>
					<option value="6">AUTORIZACION DE MERCADEO CUIH LIQUIDOS</option>-->
					<option value="7">AUTORIZACION GERENCIAL</option>



					</select>
				</div>
				<h3>Notas: </h3>
				<div class="form-group">
					<textarea readonly class="form-control txt" rows="5" name="notas" id="notas" placeholder="Notas"><?php echo $_SESSION['e_notas']; ?></textarea>
				</div>
				<br>
				


				<div class="form-group">
					
					<table class="table table-bordered">
					<tr>
				<th width="50%"><input  id="confirmado" data-loading-text="Guardando factura..." type="submit" name="confirmado" value="Confirmar Nota Revisada" class="tn btn-success btn-lg btn-block">	
																			</th>	
				
				</form>	</div>

					<form onsubmit="retronull(event)" action="Eliminarnota.php" id="te" method="post" class="invoice-form" role="form" novalidate> 
			
					<th width="50%">	<input  id="anulado" data-loading-text="Guardando factura..." type="submit" name="anulado" value="Anular Nota" class="tn btn-danger	 btn-lg btn-block">											
																			</th>	
																			</tr>
																			</table>
			</div>
			
			</div>
			<div class="clearfix"></div>		      	
			</div>
			</form>

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
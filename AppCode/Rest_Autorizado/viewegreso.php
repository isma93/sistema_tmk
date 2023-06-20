
<html><head>
<head>
<meta charset="utf-8">
<title>Remisión TMK</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="js/invoice.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="../../css/animate.css"/>
<link rel="stylesheet" type="text/css" href="../../bk/modf.css"/>
<link rel="stylesheet" type="text/css" href="../../css/mysl.css"/>
<link rel="stylesheet" type="text/css" href="../../css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="../../css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="../../css/owl.transitions.css"/>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
 <?php
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('../../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
if (!empty($_SESSION['backendreturn'])){
if ($_SESSION['backendreturn']==true){
	$_SESSION['backid'] = $_SESSION['dir'];
	$ID=$_SESSION['dir'];
	$_SESSION['id_intr']=$_SESSION['dir'];
	$_SESSION['backendreturn'] = false;
}
}
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

$query="SELECT * FROM tmk_bitacora_estado_desalojo where id_interno_desalojo ='$ID' and id_estado='2'";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
$p = 0;
if ($resultado){
while ($row=mysqli_fetch_array($resultado))
	{
		?>


		<?php 
		/*
		$_SESSION['id_cliente'.$p]=$row['id_cliente'];
		$_SESSION['nombre_cliente'.$p]=$row['nombre_cliente'];
		$_SESSION['direccion_cliente'.$p]=$row['direccion_cliente'];
		*/
		$_SESSION['re_codigo']=$row['id_empleado'];
		$re_codigo=$_SESSION['re_codigo'];


	}
}

$query="SELECT * FROM tmk_desalojo where id_interno_desalojo ='$ID' ";
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
		//$_SESSION['e_id_nota_egreso']=$row['id_nota_egreso'];
		$_SESSION['e_fecha_desalojo']=$row['fecha_desalojo'];
		$_SESSION['e_id_interno_desalojo']=$row['id_interno_desalojo'];
		$_SESSION['e_id_cliente']=$row['id_cliente'];
		$cl=$row['id_cliente'];
		//$_SESSION['e_direccion_entrega']=$row['direccion_entrega'];
		//$_SESSION['e_id_ruta']=$row['id_ruta'];
		$_SESSION['e_id_empleado']=$row['id_empleado'];
		//$_SESSION['e_id_cuenta']=$row['id_cuenta'];
		//$cuenta1=$row['id_cuenta'];
		//$_SESSION['e_id_uso']=$row['id_uso'];
		//$uso=$row['id_uso'];
		//$_SESSION['e_id_cargo_entidad']=$row['id_cargo_entidad'];
		//$entidad_id=$row['id_cargo_entidad'];
		$_SESSION['e_notas']=$row['notas'];
		
		
	
		
		
		
		
		
		?>

		
		<?php  $p++;


}
//DETALLE EGRESO
$query="SELECT * FROM tmk_detalle_desalojo where id_interno_desalojo ='$ID' ";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
$k = 0;
$venta_total = 0;
while ($row=mysqli_fetch_array($resultado))
	{
		?>


		<?php 
		/*
		$_SESSION['id_cliente'.$p]=$row['id_cliente'];
		$_SESSION['nombre_cliente'.$p]=$row['nombre_cliente'];
		$_SESSION['direccion_cliente'.$p]=$row['direccion_cliente'];
		*/
		$_SESSION['d_id_detalle_desalojo'.$k]=$row['id_detalle_desalojo'];
		$_SESSION['d_id_interno_desalojo'.$p]=$row['id_interno_desalojo'];
		$_SESSION['d_venta'.$p]=$row['venta'];
		$_SESSION['d_id_producto'.$p]=$row['id_producto'];
		$_SESSION['d_id_unidad_medida'.$p]=$row['id_unidad_medida'];
		$_SESSION['d_precio_unitario'.$p]=$row['precio_unitario'];
		$_SESSION['d_cajas_vendidas'.$p]=$row['cajas_vendidas'];
		$venta1 =$row['venta'];
		//$_SESSION['d_descripcion_promocion'.$p]=$row['descripcion_promocion'];
		
		
	
		
		
		
		
		
		?>

		
		<?php  $p++;

		$venta_total = $venta1 + $venta_total;
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



?>
<head>
<meta charset="utf-8">
<title>Notas Egreso ILP</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="../css/animate.css"/>
<link rel="stylesheet" type="text/css" href="../../bk/modf.css"/>
<link rel="stylesheet" type="text/css" href="../../bk/navbar.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
<script src="js/invoice.js"></script>
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
         
		 function retrofil(event)
            {
				event.preventDefault();
				
				var notas = document.getElementById("notas").value
				Swal.fire({
        title: '¿Estás seguro?', 
		text: '¿Confirma de autorizada este desalojo?',            
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
</script>

<script>
         
		 function retrofilnull(event)
            {
				event.preventDefault();
				
				var notas = document.getElementById("notas").value
				Swal.fire({
        title: '¿Estás seguro?', 
		text: '¿Confirma de anulada esta nota de egreso?',            
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
			document.getElementById('nullfill').submit();

        }
    })						
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
	

  <a href="../../master.php" class="active"><img src="../../images/Imagen1.png" width="50" height="24"></a>

  <?php
	$key= false;
  //Parametros de reenvio
  $ingresar_nota=  '<a href="../../create_invoice.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ingresar Nota de Egreso</a>';
 $revisar='<a href="../revisarnota.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Revisar Notas</a>';
 $modulo_aut='<a class="active" href="ViewAut.php"><i class="fa fa-book" aria-hidden="true"></i> Modulo de Autorizaciones</a>'; 
 $reportes='<a href="../../Reporting/Report_master.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a>';
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



 if ($_SESSION['Modulo']==5) 
 {
	 $key=true;
 } else if ($_SESSION['Modulo']==7) 
 {
	 $key=true;
 }
 else if ($_SESSION['Modulo']==9) 
 {
	 $key=true;
 }


















} else 
{
	
	 echo '<script>
												   
	 window.location = "../../Found.php";
	
		</script>';
	
}
 
 ?>
    <div class="pull-right">
  <a id="logout" onclick="return retrologout()" href="../../destroy.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Cerrar Sesion</a>
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
								<span>Codigo del desalojo:</span>
									<input readonly value="<?php if (isset(	$_SESSION['id_intr'])){echo 	$_SESSION['id_intr']; }else {}?>" type="text" class="form-control" name="ruta" id="nombrecliente" placeholder="Ruta" autocomplete="off" >
								</div>
								<div class="form-group">
								<span>Nombre del cliente:</span>
									<input readonly value="<?php if (isset($_SESSION['cl_nombre_cliente'])){echo $_SESSION['cl_nombre_cliente']; }else {}?>" type="text" class="form-control" name="ruta" id="nombrecliente" placeholder="Ruta" autocomplete="off" >
								</div>
								
								<div class="form-group"  autocomplete="off">
								<span>Empleado:</span>
										<input readonly  value="<?php if (isset($_SESSION['first_name'])){echo $_SESSION['first_name']; }else {}?>" class="form-control" name="Direccion" id="direccioncliente" placeholder="Direccion" required autocomplete="off">

										</div>


								</div>
								<div class="form-group">
							


													

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
												  
													
												 
												  </div>

														</div>
														<div class="form-group">
														



				



									

										
										
										
										
										

										
															  
								









														</div>
															
														
														</div>
							
								
														<div class="form-group">
												
													
														

								




									

										
										
										
										
										

										
															  
								



														</div>


														<div class="form-group">

														



													








								
															
														</div>
														<div class="panel panel-primary">

														<div class="panel-heading">Descripcion de datos</div>	
														
														<div class="panel-body">

														<div class="form-group">
													
														</div>

														<div class="form-group"  autocomplete="off">
													
								

								</div>


														<div class="form-group">
															
														</div>

														<div class="form-group">
															
														</div>
														<div class="form-group">
													
														</div>



														<div class="form-group">
														<span> Revisado por: </span>
														<?php
														
														$query="select*From usuarios where codigo_empleado= '$re_codigo'";
															$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
															if ($resultado)
															{
																while ($row=mysqli_fetch_array($resultado))
																{
																?>
																<input readonly value="<?php echo $row['first_name'].' '.$row['last_name']; ?>"class="form-control" name="descripPromocion" id="descripPromocion" placeholder="Descripción de Promocion" autocomplete="off">
																
															<?php }} ?>
															
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
			<form onsubmit="retrofil(event)"  action="Confirm_aut.php" method="post" name="insert" class="invoice-form" role="form" novalidate> 
		
				<table class="table table-bordered table-hover" id="invoiceItem">	
				<th width="10%">Código</th>
						<th width="55%">Nombre Producto</th>
						<th width="15%">Cantidad</th>
						<th width="10%">Precio</th>								
						<th width="10%">Sub Total</th>
					   
					</tr>	
					<tr>
				 						<?php
										 
										 $query="select*from tmk_detalle_desalojo where id_interno_desalojo='$ID'";
										 $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
										 $Star = 1;
										 while ($row=mysqli_fetch_array($resultado))
											 {
												 echo '<tr>';
												 $id_interno_desalojo = $row['id_interno_desalojo'];
												 $id_proc=$row['id_producto'];
												 $cant=$row['cajas_vendidas'];
												 $venta=$row['venta'];
												 $precio= $row['precio_unitario'];
												 //$desc=$row['descripcion_promocion'];
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

							 echo '<td> <input name= "pre_'.$Star.'" class ="form-control" readonly value= "'.$precio.'"></td>';
; 
		 


$j = 0;
$i=1;
										
													
													
													echo '<td> <input name= "pre_'.$Star.'" class ="form-control" readonly value= "'.$venta.'"></td>';
																		
													?>

						




<?php
	
													
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




			<span class="form-inline" id="invoiceItem">
        <div class="form-group" style="font-size:20px">
            <label>Gran total: &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon currency"><div style="font-size:20px">$</div></div>
				

<input readonly value="
<?php



if (isset($venta_total)){echo $venta_total; }else {}?>"
 type="text" class="form-control" name="ventasql" id="ventasql" placeholder="0.00" autocomplete="off" >
														

			
              </div>
			  <label>Abono: &nbsp;</label>
			  <div class="input-group">
                <div class="input-group-addon currency"><div style="font-size:20px">$</div></div>
				
				<input class="form-control" id= "txtabono" type="number" name="txtabono" placeholder="txtabono" autocomplete="off" min="0" step="0.01" max="99999" >


														

			
              </div>





        </div>
        
    </span>




			<div class="">	
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			
				<h3>Notas: </h3>
				<div class="form-group">
					<textarea readonly class="form-control txt" rows="5" name="notas" id="notas" placeholder="Notas"><?php echo $_SESSION['e_notas']; ?></textarea>
				</div>
				<br>
				


				<div class="form-group">
					
					<table class="table table-bordered">
					<tr>
						<!--PENDIENTE 31-05-2022-->
				<th width="50%"><input <?php if ($key==true){} else {echo "disabled";}?> id="confirmado" data-loading-text="Guardando factura..." type="submit" name="confirmado" value="Confirmar Nota Revisada" class="tn btn-success btn-lg btn-block">	
																			</th>	
				
				</form>	</div>
					<form onsubmit="retrofilnull(event)" action="Eliminarnota.php" id="nullfill" method="post" class="invoice-form" role="form" novalidate> 
			
					<th width="50%">	<input <?php if ($key==true){} else {echo "disabled";} ?>  id="anulado" data-loading-text="Guardando factura..." type="submit" name="anulado" value="Anular Nota" class="tn btn-danger	 btn-lg btn-block">											
																			</th>	
																			</tr>
																			</table>
			</div>
			
			</div>
			<div class="clearfix"></div>		      	
			</div>
			</form>

			
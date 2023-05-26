<header>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		</header>
		<?php
		session_start();

		
		if (isset($_SESSION['rutacliente']))
		{

			


		}else {
			echo '<script>
											  
			window.location = "../create_invoice.php";
		   
			   </script>';

		}
			include('../include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");



            
            $query="select id_tmk_desalojo from tmk_desalojo order by  id_tmk_desalojo desc LIMIT 1";

			

						$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
							
			if ($resultado)
			{

                while ($row=mysqli_fetch_array($resultado))
				{
                    $_SESSION['ultcontador'] = $row['id_tmk_desalojo'];

                }
				$_SESSION['notas']=$_POST['notas'];
				$notas=$_SESSION['notas'];
				$_SESSION['ultcontador']=$_SESSION['ultcontador']+1;
                $codificador = $_SESSION['codigo_empleado'].'-'.$_SESSION['ultcontador'];
				
				$y=$_SESSION['ultcontador'];


				//$ruta1=$_SESSION['rutacliente'];
			if (isset($_SESSION['id_cliente'] )){
				$idcliente=$_SESSION['id_cliente'];
				$direccion=$_SESSION['direccion'];
				$id_canal=$_SESSION['canales'];
				$id_employe=$_SESSION['codigo_empleado'];
	
				

				
}
else {


	echo '<script> Swal.fire({
		icon: "error",
		title: "No has terminado de llenar el formulario!",
		allowOutsideClick: false,
		showConfirmButton: true,
		confirmButtonText: "Continuar"
		}).then(function(result){
		   if(result.value){                   
			window.location = "../create_invoice.php";
		   }
		});</script>';
}
			/*	if ($ruta1)
															{
																$Rut=$ruta1;
																$query="Select*from ruta where id_ruta='$Rut'";
																
																$resultado1=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																$z=1;
																while ($row=mysqli_fetch_array($resultado1))
																{
																	$ruta=$row['id_ruta'];
																	$z++;
																}
															}
			*/

try{
	if (isset($idcliente)){

		date_default_timezone_set('America/El_Salvador');    
		$DateAndTime = date('Y-m-d H:i:s ', time());  

				$query="insert into tmk_desalojo (fecha_sistema, fecha_desalojo, id_cliente,  id_empleado,id_ultimo_estado,notas, id_interno_desalojo) 
				values ('$DateAndTime','$DateAndTime','$idcliente','$id_employe','1','$notas','$codificador');";
				$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
		}}catch (Exception $e){}
				if ($resultado)
				{
					
					   
					$query="select id_detalle_desalojo from tmk_detalle_desalojo order by  id_detalle_desalojo desc LIMIT 1";

			

					$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");

					if ($resultado){

											while ($row=mysqli_fetch_array($resultado))
											{
												$_SESSION['id_detalle_n'] = $row['id_detalle_desalojo'];
												$k=$row['id_detalle_desalojo']+1;
											}


																				if (isset($_SESSION['contado'])){		
												
																										$i=1;	
																										while ($i <= $_SESSION['contado']){
																															?>
																															
																															<?php if ($_SESSION['codigo'.$i]<=0){}
																															
																															else{	
																																
																																		$id_producto = $_SESSION['codigo'.$i];									
																																		$cantidad =	$_SESSION['cantidad'.$i];
																																		$precio = $_SESSION['P_PRECIO'.$i];
																																		$venta = $_SESSION['SUBTOTAL'.$i];
																																		
																																		$query="insert into tmk_detalle_desalojo (id_interno_desalojo, id_producto, cajas_vendidas, id_unidad_medida, precio_unitario, venta) 
																																		values ('$codificador','$id_producto','$cantidad','1','$precio','$venta');";
																																		$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																																
																																		$k=$k+1;
																														
																														
																																}?>




																																<?php  $i++;
																														} 

																					$query="insert into tmk_bitacora_estado_desalojo (id_empleado, id_estado, id_interno_desalojo, fecha_estado) 
																					values ('$id_employe','1','$codificador','$DateAndTime');";
																				    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																				 if ($resultado)
																				 {

																					$query="UPDATE tmp_cookie SET Tmp_estado = '1', ruta_S2 = '1' Where ID='$id_employe'";
																					$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
																					if ($resultado){

																						$codigo_empleado=	$_SESSION['codigo_empleado'] ;
																						$email=	$_SESSION['email'] ;
																						$Password=	$_SESSION['Password']; 
																						$Modulo=	$_SESSION['Modulo'];
																						$first_name=	$_SESSION['first_name'];
																						$last_name=	$_SESSION['last_name'] ;
																						$padre=	$_SESSION['id_padre'] ;
																						$id_revisado=$_SESSION['id_revisado'];
																						$aut=$_SESSION['id_autorizado'];
																						$_SESSION = array();
															
																							$_SESSION['codigo_empleado']=$codigo_empleado ;
																							$_SESSION['email']= $email;
																							$_SESSION['Password']=$Password; 
																							$_SESSION['Modulo']=$Modulo;
																							$_SESSION['first_name']=$first_name;
																							$_SESSION['last_name']= $last_name;
																							$_SESSION['id_padre']= $padre;
																							$_SESSION['id_revisado'] = $id_revisado;
																							$_SESSION['id_autorizado'] = $aut;
															
																					echo	'<script>
																						Swal.fire({
																						icon: "success",
																						title: "¡Nota de remisión ingresada exitosa mente! tu código es:  '.$codificador.'",
																						allowOutsideClick: false,
																						showConfirmButton: true,
																						confirmButtonText: "Continuar"
																						}).then(function(result){
																							if(result.value){                   
																							window.location = "../create_invoice.php";
																							}
																						});
																						</script>';
																					}

																				 }
																		
																		
																				}
										


									}

				}

            }


				
            mysqli_close( $conexion ); ?>
			
            
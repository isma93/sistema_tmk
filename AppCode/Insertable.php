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



            
            $query="select id_nota_egreso from nota_egreso order by  id_nota_egreso desc LIMIT 1";

			

						$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
							
			if ($resultado)
			{

                while ($row=mysqli_fetch_array($resultado))
				{
                    $_SESSION['ultcontador'] = $row['id_nota_egreso'];

                }
				$_SESSION['notas']=$_POST['notas'];
				$notas=$_SESSION['notas'];
				$_SESSION['ultcontador']=$_SESSION['ultcontador']+1;
                $codificador = $_SESSION['codigo_empleado'].'-'.$_SESSION['ultcontador'];
				
				$y=$_SESSION['ultcontador'];


				$ruta1=$_SESSION['rutacliente'];
			if (isset($_SESSION['canales'] ) && isset($_SESSION['id_cliente'] ) && isset($_SESSION['direccion'] )){
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
				if ($ruta1)
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


try{
	if (isset($idcliente)){

		date_default_timezone_set('America/El_Salvador');    
$DateAndTime = date('Y-m-d H:i:s ', time());  

				$query="insert into nota_egreso (id_nota_egreso_interna, fecha_ingreso, id_cliente, direccion_entrega, id_ruta, codigo_empleado, id_cuenta, id_uso, fecha_entrega, id_cargo_entidad, notas, id_ultimo_estado, id_canal) values ('$codificador','$DateAndTime','$idcliente','$direccion',$ruta,'$id_employe','1','1',NOW(),'1','$notas','1','$id_canal'	);";
				$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
}}catch (Exception $e){}
				if ($resultado)
				{
					
					   
					$query="select id_detalle_nota_egreso from detalle_nota_egreso order by  id_detalle_nota_egreso desc LIMIT 1";

			

					$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");

					if ($resultado){

											while ($row=mysqli_fetch_array($resultado))
											{
												$_SESSION['id_detalle_n'] = $row['id_detalle_nota_egreso'];
												$k=$row['id_detalle_nota_egreso']+1;
											}


										if (isset($_SESSION['contado'])){		
											
																					$i=1;	
																					while ($i <= $_SESSION['contado']){
																																?>
																															
																															<?php if ($_SESSION['codigo'.$i]<=0){}
																															
																															else{	
																																
																																		$id_producto = $_SESSION['codigo'.$i];									
																																		$cantidad =	$_SESSION['cantidad'.$i];
																																		$descripPromocion= $_SESSION['descripPromocion'.$i];
																																		$query="insert into detalle_nota_egreso (id_entidad, id_producto, id_tipo_medida, id_nota_interna, cantidad, descripcion_promocion ) values ('1','$id_producto','1','$codificador','$cantidad','$descripPromocion');";
																																		$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
																																
																																		$k=$k+1;
																														
																														
																																}?>




																																<?php  $i++;
																														} 

																					$query="insert into bitacora_estados_nota_egreso (id_empleado, id_estado, id_nota_egreso_interna, fecha_estado) values ('$id_employe','1','$codificador','$DateAndTime');";
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
																						title: "Nota de registro ingresada exitosa mente! tu codigo de nota de egreso es:  '.$codificador.'",
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
			
            
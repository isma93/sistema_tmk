<?php
//**BACKEND***********************************************************************************

session_start();
$codigo_empleado=$_SESSION['codigo_empleado'];
include('../../../include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
					

$Method=$_POST['Method'];

			switch ($Method) {
				case "update_tbl_stock":
					mysqli_next_result($conexion);
                    $query="select id_movimiento_inventario from movimiento_inventario order by  id_movimiento_inventario desc LIMIT 1";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado)
                    {
						while ($row=mysqli_fetch_array($resultado))
						{
							$_SESSION['ultcontador'] = $row['id_movimiento_inventario'];
							
						}
						$intr=$_SESSION['ultcontador'];
						$intr=$codigo_empleado."-".$intr;
						
                    }

					$txtasignado=$_POST['txtasignado'];
					$sesioncode=$_POST['sesioncode'];
					$sesionenvio=$_POST['sesionenvio'];
					$sesiondestino=$_POST['sesiondestino'];
					$txtdocumento=$_POST['txtdocumento'];

					 
					mysqli_next_result($conexion);
					//Sesion ids
					 $Codigo_Producto= $_SESSION[$sesioncode];
					$Codigo_Envio= $_SESSION[$sesionenvio];
					$Codigo_Destino= $_SESSION[$sesiondestino];
				    date_default_timezone_set('America/El_Salvador');    
					$DateAndTime = date('Y-m-d H:i:s ', time()); 
					//Update///////////////////////////////////////////////////////////////////////////////////////////////////////
					$query="call SP_INSERT_MOVIMIENTOS_INVENTARIO ('$codigo_empleado','$DateAndTime','$intr','$Codigo_Envio','$Codigo_Destino','$txtdocumento','$Codigo_Producto','$txtasignado')";
					$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
					if ($resultado){             
		
					}
					//End update///////////////////////////////////////////////////////////////////////////////////////////////////////
					break;
				
					case "insert_tbl_producto":
						mysqli_next_result($conexion);
					
	
						$txtmarcaselect=$_POST['txtmarcaselect'];
						$txtcodigoproducto=$_POST['txtcodigoproducto'];
						$view=$_POST['view'];
						$txtnombreproducto=$_POST['txtnombreproducto'];
						date_default_timezone_set('America/El_Salvador');    
						$DateAndTime = date('Y-m-d H:i:s ', time()); 
						//Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
						$query="call SP_SETTING_PRODUCTOS ('1','$txtcodigoproducto','$view','NULO','NULO','$txtmarcaselect','$txtnombreproducto','$DateAndTime')";
						$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
						if ($resultado){             
			
						} 
						//End Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
						break;
				case "update_products":
							mysqli_next_result($conexion);
							$nombreproducto=$_POST['nombreproducto'];
							$precio=$_POST['precio'];
							$idproducto=$_POST['myidproduct'];
							$id=$_POST['id'];
							$id_sp=2;

							$mymark=$_SESSION['tbl_producto_nombre_marca'.$id];
							$idproducto=$_SESSION['tbl_producto_id_producto'.$id];
							date_default_timezone_set('America/El_Salvador');    
							$DateAndTime = date('Y-m-d H:i:s ', time()); 
							//Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
							$query="call SP_SETTING_PRODUCTOS ('$id_sp','$idproducto','$nombreproducto','$precio','NULO','NULO','NULO','$DateAndTime')";
							$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
							if ($resultado){             
									echo "correcto";
							} 
							//End Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
		

					break;


					case "insert_tbl_factura":
							mysqli_next_result($conexion);
						
							date_default_timezone_set('America/El_Salvador');    
							$DateAndTime = date('Y-m-d H:i:s ', time()); 
							$txtid_serie = $_POST['txtid_serie'];
							$txtid_sucursal_general = $_POST['txtid_sucursal'];
							$txt_nombre_serie = $_POST['txt_nombre_serie'];
							$txtproducto_sucursal = $_SESSION[$txtid_bodega];
							$txtcodigo_cliente=1000;
							$txtcodigo_empleado=$_SESSION['codigo_empleado'];
							$txtnum_factura = $_SESSION['num_factura'];
							$txtid_factura_interno = $txt_nombre_serie."-".$txtnum_factura;
							//Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
							$query="call SP_INSERT_FACTURA  ('$txtcodigo_cliente','$txtcodigo_empleado','$DateAndTime','$txtid_factura_interno','$txtid_serie','$txtid_sucursal_general','$txtnum_factura')";
							$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
							if ($resultado){    
								
								echo $resultado;
				
							} 
							//End Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
					break;



					case "insert_tbl_detalle_factura":
						mysqli_next_result($conexion);
						$txtid_bodega = $_POST['txtid_bodega'];
						$txtid_sucursal_general = $_POST['txtid_bodega'];
						$txt_nombre_serie = $_POST['txt_nombre_serie'];
						$txtnum_factura = $_SESSION['num_factura'];
						$txtid_factura_interno = $txt_nombre_serie."-".$txtnum_factura;
						$txtid_producto = $_POST['txtid_producto'];
						$txtprecio = $_POST['txtprecio'];
						$txtventasiniva = $_POST['txtventasiniva'];
						$txtventaconiva = $_POST['txtventaconiva'];
						$txtunidades = $_POST ['txtunidades'];
						$txtimpuesto = $_POST ['txtimpuesto'];
						echo $txtid_factura_interno."//";
						echo $txtid_producto."//";
						echo $txtimpuesto."//";
						echo $txtprecio ."//";
						echo $txtunidades."//";
						
					
						echo $txtventaconiva."//";
						echo $txtventasiniva."//";
						
					
						
						//Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
						$query="call SP_INSERT_DETALLE_FACTURA ('$txtid_factura_interno','$txtid_producto','$txtimpuesto','$txtprecio','$txtunidades','$txtventasiniva','$txtventaconiva','$txtid_bodega')";
						$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros 2");
						echo $resultado;
						if ($resultado){    
							
							echo $txtproducto_sucursal;
							
							
			
						} 
						//End Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
				break;




				case "select_documentos":
					mysqli_next_result($conexion);

					$txtid_sucursal = $_POST['txtid_sucursal'];
					$txtid_serie = $_POST['txtid_serie'];

                    $query="call SP_LISTA_ULTIMA_FACTURA_X_SUCURSAL ('$txtid_sucursal','$txtid_serie')";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros de la vista select_documento");
                    if ($resultado)
                    {
						while ($row=mysqli_fetch_array($resultado))
						{
							$_SESSION['num_factura'] = $row['num_factura'];
							$_SESSION['id_serie'] = $row['id_serie'];
							$_SESSION['id_sucursal'] = $row['id_sucursal'];
							$_SESSION['serie_documento'] = $row['serie_documento'];
							$_SESSION['num_minimo'] = $row['num_minimo'];
							$_SESSION['num_maximo'] = $row['num_maximo'];

							//echo $row['num_factura']+1;

							$_SESSION['num_factura']++;
		
							if ($_SESSION['num_minimo']>$_SESSION['num_factura'])
							{
								$_SESSION['num_factura'] = 'min';
								echo $_SESSION['num_factura'];
							}
							else if  ($_SESSION['num_maximo']<$_SESSION['num_factura'])
							{
								$_SESSION['num_factura'] = 'max';
								echo $_SESSION['num_factura'];
							}
							else 
							{
								echo $_SESSION['num_factura'];
							}
						

						}

						
						
                    }
					//End Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
			break;


			
			case "insert_tbl_compra":
						mysqli_next_result($conexion);
						date_default_timezone_set('America/El_Salvador');    
						$DateAndTime = date('Y-m-d H:i:s ', time()); 
						$txt_nombre_serie = $_POST['txt_nombre_serie'];
						$txtnum_documento = $_POST['txtnum_documento'];
						$txtid_serie = $_POST['txtid_serie'];
						$txtcodigo_empleado=$_SESSION['codigo_empleado'];
						$txtid_sucursal = $_POST['txtid_sucursal'];
						$txtid_proveedor = 1;
						$txtid_compra_interno = $txt_nombre_serie."-".$txtnum_documento;
						$_SESSION['compraintero']=$txtid_compra_interno;
						
						
						//Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
						$query="call SP_INSERT_COMPRA ('$txtid_compra_interno','$DateAndTime','$txtnum_documento','$txtid_serie','$txtcodigo_empleado','$txtid_sucursal','$txtid_proveedor')";
						$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros 2");
						if ($resultado){    
						
							echo "correcto";
							
			
						} 				
				//End Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
					break;





					case "insert_tbl_detalle_compra":
						mysqli_next_result($conexion);
						
						$txt_id_interno_compra = $_SESSION['compraintero'];
						$txtid_producto = $_POST['txtid_producto'];
						$txtcantidad_compra = $_POST['txtcantidad_compra'];
						$txtprecio_sin_iva=$_POST['txtprecio_sin_iva'];
						$txtimpuesto = $_POST['txtimpuesto'];
						$txtpercepcion = 0;
						$txtprecio_con_iva = $_POST['txtprecio_con_iva'];
						$txt_id_sucursal = $_POST['txtid_bodega'];

						//Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
						$query="call SP_INSERT_DETALLE_COMPRA ('$txt_id_interno_compra','$txtid_producto','$txtcantidad_compra','$txtprecio_sin_iva','$txtimpuesto','$txtpercepcion','$txtprecio_con_iva','$txt_id_sucursal')";
						$resultado=mysqli_query( $conexion, $query ) or die ( "No se puede ingresar los registros al detalle de compra");
						if ($resultado){    
						
							echo "correcto";
							
			
						} 				
				//End Insert///////////////////////////////////////////////////////////////////////////////////////////////////////
					break;





			}

	


//**BACKEND***********************************************************************************

?>
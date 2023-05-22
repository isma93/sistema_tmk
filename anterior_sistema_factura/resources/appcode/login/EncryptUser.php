
				<?php
				session_start();
				$response = array();
				$response['ok'] = false;
				include('../../../include/config.inc');
				$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
				mysqli_set_charset($conexion, "utf8");
$key=false;
	$presskeyrecord=false;
				if (isset($_POST['TxtUser'])) {
					$User = $_POST["TxtUser"];
				
					if(isset($_POST["remember-me"])){
					$recordarme = $_POST["remember-me"];
					$presskeyrecord=true;
					}
					else
					{
						$presskeyrecord=false;
					}

					if (isset($_POST['Txtpassword'])) {
						$Password = $_POST['Txtpassword'];



						$query = "CALL SelectUser('$User')";
						$resultado = mysqli_query($conexion, $query) or die("No se pueden mostrar los registros");

						if ($resultado) {
							//EXPORTAR DATOS DE DB
							while ($row = mysqli_fetch_array($resultado)) {


								if ($row['codigo_empleado'] = $User) {
								    $test1=$row['pass'];
									$_SESSION['temporalPassword'] = $row['pass'];
									$_SESSION['temporalcodigo_empleado'] = $row['codigo_empleado'];

									if ($_SESSION['temporalPassword']==$Password)
									{

										echo '<script> window.location = "changepassword.php"; </script>';
									}
									if (password_verify($Password, $test1)) {
										//COOKIES
										$_SESSION['codigo_empleado'] = $row['codigo_empleado'];
										
										if ($presskeyrecord){
										setcookie('localCookie_cod',$_COOKIE['localCookie_cod']=$row['codigo_empleado']);
										}else
										{
											setcookie('localCookie_cod',$_COOKIE['localCookie_cod']='');
										}
										$_SESSION['codigo_empleado'] = $row['codigo_empleado'];
										$_SESSION['nombre_empleado'] = $row['nombre_empleado'];
									
										$_SESSION['correo_empleado'] = $row['correo_empleado'];
										$_SESSION['id_rol'] = $row['id_rol'];
										$_SESSION['id_sucursal'] = $row['id_sucursal'];
										$_SESSION['pass'] = $row['pass'];
										$_SESSION['activo'] = $row['activo'];
										
										//ALERTA DE SESION Y REDIRECCIONAMIENTO
										$key=true;
										$test=$_SESSION['pass'];
										$response['ok'] = true;
										$_SESSION['AccountLogin']=true;

										/* if (password_verify($Password, $test1)){
										$fechaservidor=	($_SESSION['fecha_update_pass']);
										date_default_timezone_set('America/El_Salvador');    
                                                    $DateAndTime = date('Y-m-d H:i:s ', time()); 
													$fecha1= new DateTime($fechaservidor);
													$fecha2= new DateTime($DateAndTime);
													
												$diff = $fecha1->diff($fecha2);

												// flesharrayfechas
												$number=$diff->days;
												if ($number<45)
															{
															echo '<script>
															Swal.fire({
															icon: "success",
															title: "Inicio de sesion exitoso!",
															
															showConfirmButton: true,
															confirmButtonText: "Continuar"
															}).then(function(result){
																if(result.value){                   
																window.location = "master.php";
																}
															});
															</script>';
														}else
														{

															echo '<script> window.location = "changepassword.php"; </script>';
														} */
									/* } else
										{
								    	echo '<script>
								Swal.fire({
								 icon: "error",
								 title: "Oops...",
								 text: "¡El usuario o contraseña no coincide1!",
								 showConfirmButton: true,
								 confirmButtonText: "Cerrar"
								 }).then(function(result){
									if(result.value){                   
									 window.location = "Index.php";
									}
								 });
								</script>';
										    
								} */
									
										//header("Location:master.php");
					 					

									} else {
										
									}
								} else {
									
								}
							}
						} else {


							
						}
						//LIBERANDO RECURSOS Y CERRANDO LA DB;
						mysqli_close($conexion);
					} else {

						
					}
				} else {

					
				}

				if ($key==false)
				{
					

				}





		//Retornamos el nuestro arreglo en formato JSON, recuerda agregar el encabezado, es indispensable para el navegador
	//Saber que tipo de información estas enviando
	
	echo json_encode( $response );








				?>
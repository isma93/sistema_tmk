				<header>
				    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
				</header>
				<?php
				session_start();
				include('include/config.inc');
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
										$_SESSION['email'] = $row['correo_electronico'];
										$_SESSION['Password'] = $row['pass'];
									
										$_SESSION['Modulo'] = $row['id_rol'];
										$_SESSION['first_name'] = $row['first_name'];
										$_SESSION['last_name'] = $row['last_name'];
										$_SESSION['id_padre'] = $row['id_padre'];
										$_SESSION['id_revisado'] = $row['id_revisado'];
										$_SESSION['id_autorizado'] = $row['id_autorizado'];
										$_SESSION['fecha_update_pass'] = $row['fecha_update_pass'];
										//ALERTA DE SESION Y REDIRECCIONAMIENTO
										$key=true;
										$test=$_SESSION['Password'];

										if (password_verify($Password, $test1)){
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
															title: "¡Inicio de sesión exitoso!",
															
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
														}
									} else
										{
								    	echo '<script>
								Swal.fire({
								 icon: "error",
								 title: "Oops...",
								 text: "¡El usuario o contraseña no coincide!",
								 showConfirmButton: true,
								 confirmButtonText: "Cerrar"
								 }).then(function(result){
									if(result.value){                   
									 window.location = "Index.php";
									}
								 });
								</script>';
										    
								}
									
										//header("Location:master.php");
					 					

									} else {
										echo '<script>
								Swal.fire({
								 icon: "error",
								 title: "Oops...",
								 text: "¡El usuario o contraseña no coincide!",
								 showConfirmButton: true,
								 confirmButtonText: "Cerrar"
								 }).then(function(result){
									if(result.value){                   
									 window.location = "Index.php";
									}
								 });
								</script>';
									}
								} else {
									echo '<script>
						Swal.fire({
						 icon: "error",
						 title: "Oops...",
						 text: "¡El usuario o contraseña no coincide!",
						 showConfirmButton: true,
						 confirmButtonText: "Cerrar"
						 }).then(function(result){
							if(result.value){                   
							 window.location = "Index.php";
							}
						 });
						</script>';
								}
							}
						} else {


							echo '<script>
				Swal.fire({
				 icon: "error",
				 title: "Oops...",
				 text: "¡El usuario o contraseña no coincide!",
				 showConfirmButton: true,
				 confirmButtonText: "Cerrar"
				 }).then(function(result){
					if(result.value){                   
					 window.location = "Index.php";
					}
				 });
				</script>';
						}
						//LIBERANDO RECURSOS Y CERRANDO LA DB;
						mysqli_close($conexion);
					} else {

						echo '<script>
					Swal.fire({
					 icon: "error",
					 title: "Oops...",
					 text: "¡El usuario o contraseña no coincide!",
					 showConfirmButton: true,
					 confirmButtonText: "Cerrar"
					 }).then(function(result){
						if(result.value){                   
						 window.location = "Index.php";
						}
					 });
					</script>';
					}
				} else {

					echo '<script>
					Swal.fire({
					 icon: "error",
					 title: "Oops...",
					 text: "¡El usuario o contraseña no coincide!",
					 showConfirmButton: true,
					 confirmButtonText: "Cerrar"
					 }).then(function(result){
						if(result.value){                   
						 window.location = "Index.php";
						}
					 });
					</script>';
				}

				if ($key==false)
				{
					echo '<script>
					Swal.fire({
					 icon: "error",
					 title: "Oops...",
					 text: "¡El usuario o contraseña no coincide!",
					 showConfirmButton: true,
					 confirmButtonText: "Cerrar"
					 }).then(function(result){
						if(result.value){                   
						 window.location = "Index.php";
						}
					 });
					</script>';

				}














				?>
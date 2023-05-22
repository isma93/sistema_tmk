
		<?php
			
			if ($_SERVER["REQUEST_METHOD"]=="POST"){
			include('../../include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
			
					

					$query="select*from APP_canales";
					$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
				
				if ($resultado) {
							//EXPORTAR DATOS DE DB
							$json = "{\"data\":[";
							while ($row = mysqli_fetch_array($resultado)) 
							{

								$json=$json.json_encode($row);
								$json=$json.",";
							}

							$json.substr(trim($json),0,-1);

							$json = $json."]}";
							echo $json;
				}
					
				mysqli_close( $conexion );	
					

			}
		
						
			
		
		?>
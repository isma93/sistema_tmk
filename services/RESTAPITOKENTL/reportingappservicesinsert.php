
		<?php
			
			if ($_SERVER["REQUEST_METHOD"]=="POST"){
			include('../../include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
			
					$name=$_POST['name'];
					$link=$_POST['link'];
						$orientation=$_POST['orientation'];
							$output=$_POST['output'];
						$canal=$_POST['canal'];
						

					$query="insert into linksreporting (LINK,NOMBRE_LINK,id_canal, orientacion,output) values('$link','$name','$canal', '$orientation','$output')";
					$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
				
				if ($resultado) {
							
				}
					
				mysqli_close( $conexion );	
					

			}
		
						
			
		
		?>
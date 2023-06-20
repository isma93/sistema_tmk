<html>
	
<head>
<?php
session_start(); 
if (isset($_SESSION['contado'])){		
	echo 'TEST';	
	$com=1;		
	while ($com <= $_SESSION['contado']){
		$_SESSION['codigo'.$com]=0;
		$_SESSION['nombreProducto'.$com]='Eliminado';
		$_SESSION['cantidad'.$com]=0;					
		$_SESSION['Entidad'.$com]=0;
		$_SESSION['P_PRECIO'.$com]=0;
		$_SESSION['GRANTOTALVAR']=$_SESSION['GRANTOTALVAR']-$_SESSION['SUBTOTAL'.$com];
		$_SESSION['SUBTOTAL'.$com]=0;
		$com++;
	}
	
}
?>
	<title>MOSTRAR DATOS</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</head>	
		<body>
		
		<?php
			
			include('include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
				
				
				$clientelista=$_POST['clienteseleccionado'];
				$codigo_empleado = $_SESSION['codigo_empleado'];
				$query="call SP_TMK_LISTAR_CLIENTE_SELECCIONADO ('$clientelista','$codigo_empleado')";
				$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");

				if ($resultado){

					//06=06-23 Restablecer variables de tabla create invoice
					
									


					while ($row=mysqli_fetch_array($resultado))
						{
							$_SESSION['id_cliente']=$row['id_cliente'];
							$_SESSION['nom']=$row['nombre_cliente'];
							$_SESSION['direccion'] = $row['direccion_cliente'];
							$_SESSION['first_name']=$row['first_name'];

							 $cliente = $row['id_cliente'];

						
						}
						if(isset($cliente)){

							
							echo '<script>
													  
							window.location = "create_invoice.php";
						   
								   </script>';
							
							}else{


								echo    '<script>	Swal.fire({
									icon: "error",
									title: "Cliente no asignado",
									allowOutsideClick: false,
									showConfirmButton: true,
									confirmButtonText: "Continuar"
									}).then(function(result){
									   if(result.value){                   
										   window.location = "create_invoice.php";
									   }
									});</script>';
						}

					

					}else {

						echo    '<script>	Swal.fire({
							icon: "error",
							title: "Cliente no asignado",
							allowOutsideClick: false,
							showConfirmButton: true,
							confirmButtonText: "Continuar"
							}).then(function(result){
							   if(result.value){                   
								   window.location = "create_invoice.php";
							   }
							});</script>';

					}


				
					


					



		mysqli_close( $conexion );	
			
			/*
			echo"<table width='100%' border='1' align='center'>";
			echo "<tr>";
			echo "<TH>idAlumno</TH>
					<TH>Nombre</TH>
					<TH>Direccion</TH>
					<TH>Edad</TH>
					<TH></TH>
					<TH></TH>";
			echo "</tr>";
			while ($row=mysqli_fetch_array($resultado))
				{
					echo "<tr>";				
					echo "<td>",$row['id_cliente'],"</td>";
					echo "<td>",$row['nombre_cliente'],"</td>";
					echo "<td>",$row['direccion'],"</td>";
					echo "<td>",$row['municipio'],"</td>";
							
					echo "</tr>";
				}
			echo "</table>";
			*/
			//CERRAR CONEXIÓN DE BASE DE DATOS
		
			//header("Location:create_invoice.php");
		?>
		<BR>
		
		</body>
</html>
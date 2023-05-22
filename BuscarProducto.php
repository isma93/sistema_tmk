<html>
<head>
	<title>MOSTRAR DATOS</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</head>	
		<body>
		
		<?php
			session_start(); 
			include('include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
				$idc= $_POST["te"];
				$cid=$_SESSION['id_cliente'];
			
			$query="Select*from producto where codigo_producto= '$idc';";
			$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
			if ($resultado){
			while ($row=mysqli_fetch_array($resultado))
				{
					$_SESSION['id_producto']=$row['codigo_producto'];
					$_SESSION['nombre_producto']=$row['nombre_producto'];
					$_SESSION['marca_producto'] = $row['marca_producto'];
					$_SESSION['categoria_producto']=$row['categoria_producto'];
					
			}
			$_SESSION['ingreso_des']=true;
			if ($idc<>$_SESSION['id_producto'])
			{
				
			echo    '<script>	Swal.fire({
				icon: "error",
				title: "Código de producto no encontrado!.",
				allowOutsideClick: false,
				showConfirmButton: true,
				confirmButtonText: "Continuar"
				}).then(function(result){
				   if(result.value){                   
					   window.location = "create_invoice.php";
				   }
				});</script>';
			}else
			{
				echo '<script>
													  
			window.location = "create_invoice.php";
		   
	  			 </script>';
			}


		
		}else 
		{
			echo    '<script>	Swal.fire({
				icon: "error",
				title: "Código de producto no encontrado!.",
				allowOutsideClick: false,
				showConfirmButton: true,
				confirmButtonText: "Continuar"
				}).then(function(result){
				   if(result.value){                   
					   window.location = "create_invoice.php";
				   }
				});</script>';

		}
			//echo $_SESSION['nom'];
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
			
			
						mysqli_close( $conexion );	
		
			//header("Location:create_invoice.php");
		?>
		<BR>
		
		</body>
</html>
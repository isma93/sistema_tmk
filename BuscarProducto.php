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
	$idc = $_POST["te"];
	$cid = $_SESSION['id_cliente'];
	
	$query = "SELECT * FROM producto WHERE codigo_producto = '$idc';";
	$resultado = mysqli_query($conexion, $query) or die("No se pueden mostrar los registros");
	if ($resultado) {
		while ($row = mysqli_fetch_array($resultado)) {
			$_SESSION['id_producto'] = $row['codigo_producto'];
			$_SESSION['nombre_producto'] = $row['nombre_producto'];
			$_SESSION['marca_producto'] = $row['marca_producto'];
			$_SESSION['categoria_producto'] = $row['categoria_producto'];
		}
		$_SESSION['ingreso_des'] = true;
		if ($idc != $_SESSION['id_producto']) {
			// Si el código de producto no coincide, muestra una ventana emergente de error y redirige al usuario
			echo '<script>
				Swal.fire({
					icon: "error",
					title: "Código de producto no encontrado.",
					allowOutsideClick: false,
					showConfirmButton: true,
					confirmButtonText: "Continuar"
				}).then(function(result) {
					if (result.value) {
						window.location = "create_invoice.php";
					}
				});
			</script>';
		} else {
			// Si el código de producto coincide, muestra una ventana emergente de éxito y redirige al usuario
			echo '<script>
				Swal.fire({
					icon: "success",
					title: "Producto encontrado.",
					text: "ID de producto: ' . $_SESSION['id_producto'] . '",
					allowOutsideClick: false,
					showConfirmButton: true,
					confirmButtonText: "Continuar"
				}).then(function(result) {
					if (result.value) {
						window.location = "create_invoice.php";
					}
				});
			</script>';
		}
	} else {
		// Si no se pueden obtener resultados, muestra una ventana emergente de error y redirige al usuario
		echo '<script>
			Swal.fire({
				icon: "error",
				title: "Código de producto no encontrado.",
				allowOutsideClick: false,
				showConfirmButton: true,
				confirmButtonText: "Continuar"
			}).then(function(result) {
				if (result.value) {
					window.location = "create_invoice.php";
				}
			});
		</script>';
	}

	mysqli_close($conexion);
?>
<BR>
</body>
</html>

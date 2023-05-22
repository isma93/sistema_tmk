<html>
  <head>
    <title>CREAR DB</title>
  </head>
  <body >
		<?php 
		//----------------------------------------------------------------------------------------------------------------------------------------------------------
		//CREACION DE LA DB
		
			//EJEMPLO DE CONEXIÓN A BASE DE DATOS MYSQL CON PHP.
			//DATOS DE LA BASE DE DATOS
			$usuario = "root";
			$password = "";
			$servidor = "localhost";
			$basededatos = "test";
			//CREACIÓN DE LA CONEXIÓN A LA BASE DE DATOS CON MYSQL_CONNECT()
			$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
			//SELECCIÓN DE LA BASE DE DATOS A UTILIZAR
			$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
			//REALIZANDO LA CONSULTA PARA CREAR UNA DB SI ES QUE NO EXISTE
			$Consulta="CREATE DATABASE IF NOT EXISTS DB42;";
			$EjecutarConsulta = mysqli_query( $conexion, $Consulta ) or die ( "No se pudo crear la base de datos");
			//VERIFICANDO SI LA DB SE CREO
			if ($EjecutarConsulta)
			{
				echo ("La DB fue creada de Forma satisfactoria.<br>");
			}
			else
			{
				echo ("Surgio problema para crear la DB.<br>");
				echo ("El problema es: <br>");
				echo ("Codigo de error: <b>".mysql_errno ()."</b><br>");
				echo ("Descripcion de error: <b>".mysql_error ()."</b><br>");
			}
				mysqli_close($conexion);
		?>
		<BR>
		<BUTTON ONCLICK="location.href='index.html'">Regresar al Menu</BUTTON>
	</body>
</html>

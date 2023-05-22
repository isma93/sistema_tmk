<?php
//**BACKEND***********************************************************************************
session_start();
$Myid= $_POST['id'];
$Name=$_POST['name'];
include('../include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
      $query="insert into test values ('$Myid','$Name')";
			$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
			if ($resultado){                
			}
//**BACKEND***********************************************************************************
?>
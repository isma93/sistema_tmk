<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
<style>
table, th, td {
 /* border: 1px solid black;
  border-collapse: collapse;*/
  text-align: center;
}
    </style>
</head>
<?php
session_start(); 
$_SESSION['Loader'] = true;
//header('Content-type: application/vnd.ms-word');
//header("Content-Disposition: attachment; filename=millonarios_fc.doc");
 //header("Pragma: no-cache");
//header("Expires: 0");
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=notas_egreso_autorizadas.xls");
header("Pragma: no-cache");
header("Expires: 0");
include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);








if ($_POST['min-date']!="" && $_POST['max-date']!="")
{
$_SESSION['min']=$_POST['min-date'];
$_SESSION['max']=$_POST['max-date'];
$min=$_POST['min-date'];
$max=$_POST['max-date'];


}
else 
{
    
echo '<script>
													  
window.location = "ViewReportExcel.php";

</script>';

}







?>


<table>	
					<tr>
						
						<th width="10%">id_nota_interna</th>
						<th width="10%">id_cliente</th>
						<th width="10%">fecha_ingreso</th>
						<th width="10%">id_entidad</th>								
						<th width="10%">nombre_entidad</th>
                        <th width="10%">marca_entidad</th>
                        <th width="10%">id_uso</th>
                        <th width="10%">uso_nota_egreso</th>
                        <th width="10%">id_canal</th>
                        <th width="10%">nombre_canal</th>
                        <th width="10%">id_cargo_entidad</th>
                        <th width="10%">cargo_entidad</th>
                        <th width="10%">nombre_entidad</th>
                        <th width="10%">id_ruta</th>
                        <th width="10%">nombre_ruta</th>
                        <th width="10%">autorizado_por</th>
                        <th width="10%">cuenta_contable</th>
                        <th width="10%">nombre_cuenta</th>
                        <th width="10%">codigo_producto</th>
                         <th width="10%">nombre_producto</th>
                        <th width="10%">cantidad</th>
                        <th width="10%">observaciones</th>
                        <th width="10%">solicitante</th>
                        <th width="10%">decripcion_promocion</th>
                     
					
					   
					</tr>	
				
                    <?php
                    $query = "CALL SP_REPORTS_EXPORTAR_EXCEL('$min','$max')";
						$resultado = mysqli_query($conexion, $query) or die("No se pueden mostrar los registros");

						if ($resultado) {
							//EXPORTAR DATOS DE DB
							while ($row = mysqli_fetch_array($resultado)) {

                             echo   '<tr>';

                                echo '<td>'.$row['id_nota_interna'].'</td>';
                                echo '<td>'.$row['id_cliente'].'</td>';
                                echo '<td>'.$row['fecha_ingreso'].'</td>';
                                echo '<td>'.$row['id_entidad'].'</td>';
                                echo '<td>'.$row['nombre_entidad'].'</td>';
                                echo '<td>'.$row['marca_entidad'].'</td>';
                                echo '<td>'.$row['id_uso'].'</td>';

                                echo '<td>'.$row['uso_nota_egreso'].'</td>';
                                echo '<td>'.$row['id_canal'].'</td>';
                                echo '<td>'.$row['nombre_canal'].'</td>';
                                echo '<td>'.$row['id_cargo_entidad'].'</td>';
                                echo '<td>'.$row['cargo_entidad'].'</td>';

                                 echo '<td>'.$row['nombre_entidad'].'</td>';
                                 echo '<td>'.$row['id_ruta'].'</td>';
                                 echo '<td>'.$row['nombre_ruta'].'</td>';
                                 echo '<td>'.$row['autorizado_por'].'</td>';
                                 echo '<td>'.$row['cuenta_contable'].'</td>';
                                 echo '<td>'.$row['nombre_cuenta'].'</td>';
                                 echo '<td>'.$row['codigo_producto'].'</td>';
                                 echo '<td>'.$row['nombre_producto'].'</td>';
                                 echo '<td>'.$row['cantidad'].'</td>';
                                 echo '<td>'.$row['observaciones'].'</td>';
                                 echo '<td>'.$row['solicitante'].'</td>';
                                 echo '<td>'.$row['decripcion_promocion'].'</td>';
                                 echo 	'</tr>';	
                            }
                        }


                    ?>




                    </tr>
</table>
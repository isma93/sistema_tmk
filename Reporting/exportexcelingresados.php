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
header("Content-Disposition: attachment; filename=notas_egreso_ingresadas.xls");
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
													  
window.location = "ViewReportExcelRevisado.php";

</script>';

}







?>


<table>	
					<tr>
						
						<th width="10%">ruta</th>
						<th width="10%">cantidad</th>
						<th width="10%">nombre_producto</th>
						<th width="10%">marca_producto</th>								
						<th width="10%">descripcion_promocion</th>
                        <th width="10%">id_nota_interna</th>
                      
					   
					</tr>	
				
                    <?php
                    $query = "CALL SP_REPORTS_EXPORTAR_EXCEL_NOTAS_INGRESADAS('$min','$max')";
						$resultado = mysqli_query($conexion, $query) or die("No se pueden mostrar los registros");

						if ($resultado) {
							//EXPORTAR DATOS DE DB
							while ($row = mysqli_fetch_array($resultado)) {

                             echo   '<tr>';

                                echo '<td>'.$row['nombre_ruta'].'</td>';
                                echo '<td>'.$row['cantidad'].'</td>';
                                echo '<td>'.$row['nombre_producto'].'</td>';
                                echo '<td>'.$row['marca_producto'].'</td>';
                                echo '<td>'.$row['descripcion_promocion'].'</td>';
                                echo '<td>'.$row['id_nota_interna'].'</td>';
                             echo 	'</tr>';	
                            }
                        }


                    ?>




                    </tr>
</table>
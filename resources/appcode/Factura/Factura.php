<?php 
session_start();
?> 

<font face='Arial' size='3'>
<?php
include('../../../include/config.inc');
$num_factura_final = $_GET['ftc'];
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion,"utf8");

mysqli_next_result($conexion);
$fecha="";
$query="call SP_CREAR_TIQUET_IMPRESION('$num_factura_final');";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
if ($resultado){
    $i_num=1;
    $Subtotal = 0;
    $Ventatotal=0;
    $imp=0;
while ($row=mysqli_fetch_array($resultado))
    {
    $_SESSION['id_interno_factura'.(String)$i_num]=$row['id_interno_factura'];
    $_SESSION['num_factura'.(String)$i_num]=$row['num_factura'];
    $_SESSION['serie_documento'.(String)$i_num]=$row['serie_documento'];
    $_SESSION['fecha'.(String)$i_num]=$row['fecha'];
    $fecha = $row['fecha'];
    $_SESSION['id_producto'.(String)$i_num]=$row['id_producto'];
    $_SESSION['impuesto'.(String)$i_num]=$row['impuesto'];
    $_SESSION['precio'.(String)$i_num]=$row['precio'];
    $imp += $row['impuesto'];
    $_SESSION['nombre_producto'.(String)$i_num]=$row['nombre_producto'];
    $_SESSION['unidades'.(String)$i_num]=$row['unidades'];
    $_SESSION['venta_sin_iva'.(String)$i_num]=$row['venta_sin_iva'];
    $_SESSION['venta_con_iva'.(String)$i_num]=$row['venta_con_iva'];
    $Ventatotal += $row['venta_con_iva'];
    $Subtotal +=$row['venta_sin_iva'];
    $i_num++;
    }
    echo "****************************************<br>"; 
    echo "  EMPRESA INC<br>"; 
    echo "  NIT: 000<br>"; 
    echo "  NCR: 000<br>"; 
    echo "  El Salvador, San Salvador<br>"; 
    echo "  TEL: 00000<br>"; 
    echo "  FECHA: ".$fecha."<br>"; 
    echo "****************************************<br>"; 
   for ($i=1; $i < $i_num ; $i++) { 

    echo  $_SESSION['id_producto'.(String)$i]."<br>";
    echo $_SESSION['nombre_producto'.(String)$i]."<br>";
    echo "Precio: $".$_SESSION['precio'.(String)$i]." x Cant: ".  $_SESSION['unidades'.(String)$i]." Sum $".$_SESSION['venta_con_iva'.(String)$i]."<br>";
   }
   echo "*****************************************<br>";
 
   echo "Subtotal: $ ".$Subtotal."<br><br>"; 
   echo "Iva Ret: $ ".$imp."<br><br>"; 
   echo "Total de venta: $ ".$Ventatotal."<br><br>"; 
   echo "-------Gracias por visitarnos!----------";
    /*
    ****************************************
EMPRESA INC
NIT: 000
NCR: 000
DF MEXICO
TEL: 00000
 
Numero de ticket: 1
FECHA: 24/03/2023 10:01:35
*****************************************
PEPSI COLA
Precio: $1200 x Cant: 1 Sum $1200
-----------------------------------------
Subtotal: $ 1200
Iva: $ 156
Subtotal: $ 1356
Iva Ret: $ 0
Total de venta: $ 1356
Cambio: $ 44
-------Gracias por visitarnos!----------
*/

}
?>


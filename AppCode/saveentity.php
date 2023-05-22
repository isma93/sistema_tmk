<?php
session_start(); 
include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");







if (isset($_POST['guardar_entidad'])) {
  

    echo "Se ha pulsado el botón guardar entidades";

    $idcuentas=$_POST["cuentas"];
    $idcargoent=$_POST["entity"];
    $iduso=$_POST["uso"];
    $_SESSION['dir']=$_POST['codigointerno_'];
    $coder=$_SESSION['dir'];
    $_SESSION['backendreturn']=true;

    echo $iduso;
   
    $query="UPDATE nota_egreso SET id_cuenta ='$idcuentas' where id_nota_egreso_interna = '$coder' ";		
    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
        if ($resultado)
        {
           
            $query="UPDATE nota_egreso SET id_cargo_entidad ='$idcargoent' where id_nota_egreso_interna = '$coder' ";		
            $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                if ($resultado)
                {
        
                    $query="UPDATE nota_egreso SET id_uso ='$iduso' where id_nota_egreso_interna = '$coder' ";		
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                        if ($resultado)
                        {

                
                            echo '<script>
													  
                            window.location = "vernota.php";
                           
                       </script>';
                
                            
                        }
        
                    
                }
        

                

        }
        mysqli_close($conexion);




} else if (isset($_POST['confirmado'])) {
    Echo "Se ha pulsado el botón confirmar";













}else if (isset($_POST['anulado'])) {
Echo "Se ha pulsado el botón anulado";


















}




    



?>
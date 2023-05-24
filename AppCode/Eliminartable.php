<HTML>
<?php
session_start(); 
$ID = $_GET["id"];
$com = $_GET["com"];
$_SESSION['overword'] = 'apagado';
if( empty( $_SESSION['delete_this']) ) {
    $_SESSION['delete_this'] = 1;
	
	
}else {
    $_SESSION['delete_this'] += 1;
	
	
}				



 $delete = $_SESSION['delete_this'] ;
 $contador =$_SESSION['validadorv2'];
if ($delete == $contador)
{
	$_SESSION['overword'] = 'encendido';
}
echo $_SESSION['delete_this'];	

                                    $_SESSION['codigo'.$com]=0;
									$_SESSION['nombreProducto'.$com]='Eliminado';
									$_SESSION['cantidad'.$com]=0;					
									$_SESSION['Entidad'.$com]=0;
									$_SESSION['P_PRECIO'.$com]=0;
									$_SESSION['GRANTOTALVAR']=$_SESSION['GRANTOTALVAR']-$_SESSION['SUBTOTAL'.$com];
									$_SESSION['SUBTOTAL'.$com]=0;
									//$_SESSION['descripPromocion'.$ID]="Eliminado";
                                    echo '<script>
													  
									 window.location = "../create_invoice.php";
										
									</script>';
                                    ?>



<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script></head>
 <?php
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 

include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);


$ID = $_SESSION['id_intr'];
$id_employe=$_SESSION['codigo_empleado'];
   
    date_default_timezone_set('America/El_Salvador');    
$DateAndTime = date('Y-m-d H:i:s ', time()); 
      

                                $query="insert into tmk_bitacora_estado_desalojo (id_empleado, id_estado, id_interno_desalojo, fecha_estado )values ('$id_employe','2','$ID','$DateAndTime');";
							    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
							     if ($resultado)
								 {
                                   

                                    $query="UPDATE tmk_desalojo SET id_ultimo_estado = '2' where id_interno_desalojo = '$ID'";
                                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
                                     if ($resultado)
                                     {
//FIN
$Asign= ' ';//no tocar
                                                  
                                                    echo 	" '<script> Swal.fire({
                                                        icon: 'success',
                                                        title: 'HAS REVISADO EL DESALOJO : $ID CORRECTAMENTE!',
                                                        allowOutsideClick: false,
                                                        showConfirmButton: true,
                                                        confirmButtonText: 'Continuar'
                                                        }).then(function(result){
                                                           if(result.value){                   
                                                            window.location = 'revisarnota.php';
                                                           }
                                                        });</script>'"; 
                                     }




                                 }










                            ////////////////////////////////////////////////////////////////////////////////////////////////////////








?>
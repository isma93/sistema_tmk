

<html><head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
 <?php
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 

include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);

$actual = $_POST['actual'];
$nueva1 = $_POST['nuevo1'];
$nueva2 = $_POST['nuevo2'];
if (isset($_SESSION['temporalPassword']))
{
    $password=$_SESSION['temporalPassword'];
    echo"s";

}else {
    echo '<script> window.location = "../Index.php"; </script>';
    
}

if (password_verify($actual,$password) or $_SESSION['temporalPassword']==$actual ){

                             if ($nueva1==$nueva2){
                                                    date_default_timezone_set('America/El_Salvador');    
                                                    $DateAndTime = date('Y-m-d H:i:s ', time());  

                                                   $Hashcoder= password_hash($nueva2, PASSWORD_BCRYPT);
                                                   $code=$_SESSION['temporalcodigo_empleado'];
                                                            $query="UPDATE usuarios set fecha_update_pass='$DateAndTime', pass='$Hashcoder' where codigo_empleado='$code'";
                                                                                    $resultado=mysqli_query( $conexion, $query );
                                                                                    
                                                                                    
                                                                                        if ($resultado)
                                                                                        {

                                                                                            echo	'<script>
                                                                                            Swal.fire({
                                                                                            icon: "warning",
                                                                                            title: "Contraseña actualizada.",
                                                                                            allowOutsideClick: false,
                                                                                            showConfirmButton: true,
                                                                                            confirmButtonText: "Continuar"
                                                                                            }).then(function(result){
                                                                                                if(result.value){                   
                                                                                                window.location = "../destroy.php";
                                                                                                }
                                                                                            });
                                                                                            </script>';
                                                                                            echo"3";
                                                                                        }
                                                                                        else 
                                                                                        {
                                                                                            echo '<script>
                                                                                            Swal.fire({
                                                                                             icon: "error",
                                                                                             title: "ERROR",
                                                                                             text: "¡Contraseña no coincide!, contacte a soporte ILP si tiene inconvenientes. #ErrorA1",
                                                                                             showConfirmButton: true,
                                                                                             confirmButtonText: "Cerrar"
                                                                                             }).then(function(result){
                                                                                                if(result.value){                   
                                                                                                 window.location = "../changepassword.php";
                                                                                                }
                                                                                             });
                                                                                            </script>';
                                                                                          
                                                                                        }

                                                                                        
                                                                                        }
                                                                                        else{
                                                                                            echo '<script>
                                                                                            Swal.fire({
                                                                                             icon: "error",
                                                                                             title: "ERROR",
                                                                                             text: "¡Contraseña no coincide!, contacte a soporte ILP si tiene inconvenientes. #ErrorA2",
                                                                                             showConfirmButton: true,
                                                                                             confirmButtonText: "Cerrar"
                                                                                             }).then(function(result){
                                                                                                if(result.value){                   
                                                                                                 window.location = "../changepassword.php";
                                                                                                }
                                                                                             });
                                                                                            </script>';
                                                                                           
                                                  }
                    }
                    else{
                        echo '<script>
                        Swal.fire({
                         icon: "error",
                         title: "ERROR",
                         text: "¡Contraseña no coincide!, contacte a soporte ILP si tiene inconvenientes. #ErrorA3",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar"
                         }).then(function(result){
                            if(result.value){                   
                             window.location = "../changepassword.php";
                            }
                         });
                        </script>';
                        
}
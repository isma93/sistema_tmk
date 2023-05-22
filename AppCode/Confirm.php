<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script></head>
 <?php
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 

include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);




$ID = $_SESSION['id_intr'];
$_SESSION['Autorizacion']=$_POST["autonota"];
$autorizacion= $_SESSION['Autorizacion'];



    $Star = $_POST['starr'] - 1;
    $id_employe=$_SESSION['codigo_empleado'];
   
 
    echo '<br>';
$z=1;
$llave = false;
$tryhard=false;
        while ($z <=$Star)
    {
            
        $up= $_POST["shh_".$z];
        $desx= $_POST["desc_".$z];
       
if ($up!=0){
       $identificador= $_POST["id_detalle_nota_egreso_".$z];
       
                       $query="UPDATE detalle_nota_egreso SET id_entidad ='$up', descripcion_promocion = '$desx' where id_nota_interna='$ID' and id_detalle_nota_egreso = '$identificador' ";
						$resultado=mysqli_query( $conexion, $query );
						
						// while ($row=mysqli_fetch_array($resultado))
						// 	{ 
                        //  }
                            if ($resultado)
                            {
                                

                                $llave= true;
                           
                           
                            }
                                else 
                                {

                                   //enviar redirect
                                   echo '<script>
													  
                                   window.location = "vernota.php";
                                  
                                      </script>';

                                }




        
        
            echo '<br>';
       
    }//if
    else {
            if ($tryhard==false)
            {


           echo    '<script>	Swal.fire({
					 icon: "error",
					 title: "No has asignado entidades en la tabla!.",
                     allowOutsideClick: false,
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
                            window.location = "vernota.php";
						}
					 });</script>';
                     $llave= false;
                     $z =$Star;
            }else {}
       $tryhard=true;
    
    
    
    }
    $z++;
}//while

    if ($llave==true){
        date_default_timezone_set('America/El_Salvador');    
        $DateAndTime = date('Y-m-d H:i:s ', time()); 
                                $query="insert into bitacora_estados_nota_egreso (id_empleado, id_estado, id_nota_egreso_interna, fecha_estado )values ('$id_employe','2','$ID','$DateAndTime');";
							    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
							     if ($resultado)
								 {
                                   

                                    $query="UPDATE nota_egreso SET id_ultimo_estado = '$autorizacion' where id_nota_egreso_interna = '$ID'";
                                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
                                     if ($resultado)
                                     {
//FIN
$Asign= ' ';//no tocar
                                                    if ($autorizacion==3)
                                                    {
                                                        $Asign= 'AUTORIZACION DE MERCADEO CUIH1';
                                                    } else if ($autorizacion==4){$Asign= 'AUTORIZACION DE MERCADEO CUIH2';}else if ($autorizacion==5){$Asign= 'AUTORIZACION DE MERCADEO CUIP';}else if ($autorizacion==6){$Asign= 'AUTORIZACION DE MERCADEO CUIH LIQUIDOS';}else if ($autorizacion==7){$Asign= 'AUTORIZACION GERENCIAL';}else if ($autorizacion==2){$Asign= 'AUTORIZACION MERCADEO';}

                                                    echo 	"<script>
                                                    Swal.fire({
                                                        title: 'NOTA DE EGRESO ASIGNADA!',
                                                        allowOutsideClick: false,
                                                        text: 'HEMOS ASIGNADO TU NOTA DE EGRESO DE CODIGO: $ID  A: $Asign',
                                                        imageUrl: '../images/Imagen1.png',
                                                        imageWidth: 400,
                                                        imageHeight: 200,
                                                        imageAlt: 'Custom image',
                                                        showConfirmButton: true,
                                                                confirmButtonText: 'Continuar'
                                                                }).then(function(result){
                                                                    if(result.value){                   
                                                                    window.location = 'revisarnota.php';
                                                                    }


                                                    })
                                                    </script>"; 
                                     }




                                 }




                                } else 
                                {


                                    echo    '<script>	Swal.fire({
                                        icon: "error",
                                        title: "No has asignado entidades en la tabla!.",
                                        allowOutsideClick: false,
                                        showConfirmButton: true,
                                        confirmButtonText: "Continuar"
                                        }).then(function(result){
                                           if(result.value){                   
                                               window.location = "vernota.php";
                                           }
                                        });</script>';


                                }




                            






                            ////////////////////////////////////////////////////////////////////////////////////////////////////////








?>
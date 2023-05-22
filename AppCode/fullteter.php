<?php
session_start();
include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion,"utf8");

$query="select imagen from le_detalle_denuncia where id_detalle_denuncia = '4809'";		
            $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                if ($resultado)
                {



                    $i = 0;
												while ($row=mysqli_fetch_array($resultado))
													
                                                {

                                                $test = base64_encode($row['imagen']);

                                               

                                                // Format the image SRC:  data:{mime};base64,{data};
                                                $src = 'data:charset=utf-8;base64,'.$test;

                                                // Echo out a sample image
                                                echo '<img src="' . $src . '">';
                                                    $i++;
                                                }
                                              
      

                }



?>









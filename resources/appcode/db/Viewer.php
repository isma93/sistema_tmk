<?php
$codigo_empleado=$_SESSION['codigo_empleado'];

			        $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			        mysqli_set_charset($conexion,"utf8");
                    $filtroid=$_SESSION['codigo_empleado'];
                if ($_SESSION['id_rol'] == 1)
                {
                    $filtroid= 'NULO';
                }else 
                {
                    //ID EMPLEADO
                }

                    $query="call SP_LISTAR_EXISTENCIA_SUCURSAL ('$filtroid','$codigo_empleado')";
			        $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado){
                    $i_tbl_producto=1;
                    while ($row=mysqli_fetch_array($resultado))
                    {

                                $_SESSION['tbl_producto_nombre_producto'.(String)$i_tbl_producto]=$row['nombre_producto'];
                                $_SESSION['tbl_producto_nombre_marca'.(String)$i_tbl_producto]=$row['nombre_marca'];
                                $_SESSION['tbl_producto_nombre_categoria'.(String)$i_tbl_producto]=$row['nombre_categoria'];
                                $_SESSION['tbl_producto_nombre_sucursal'.(String)$i_tbl_producto]=$row['nombre_sucursal'];
                                $_SESSION['tbl_producto_id_sucursal'.(String)$i_tbl_producto]=$row['id_sucursal'];
                                $_SESSION['tbl_producto_precio_sin_iva'.(String)$i_tbl_producto]=$row['precio_sin_iva'];
                                $_SESSION['tbl_producto_precio_con_iva'.(String)$i_tbl_producto]=$row['precio_con_iva'];
                                $_SESSION['tbl_producto_existencias'.(String)$i_tbl_producto]=$row['existencias'];
                                $_SESSION['tbl_producto_id_producto'.(String)$i_tbl_producto]=$row['id_producto'];
                                $_SESSION['tbl_producto_imagen'.(String)$i_tbl_producto]=$row['imagen'];
                                $i_tbl_producto++;       
                    }

                    mysqli_next_result($conexion);
                    $query="Select*from sucursales";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado)
                    {
                        $i_tbl_sucursal=1;
                        while ($row=mysqli_fetch_array($resultado))
                        {
                        $_SESSION['tbl_sucursales_id_sucursal'.(String)$i_tbl_sucursal]=$row['id_sucursal'];
                        $_SESSION['tbl_sucursales_nombre_sucursal'.(String)$i_tbl_sucursal]=$row['nombre_sucursal'];
                        $i_tbl_sucursal++;
                        }
                    }

                    mysqli_next_result($conexion);
                    $query="call SP_FILTRO_SUCURSALES ('$codigo_empleado')";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado)
                    {
                        $i_tbl_empleado_sucursal=1;
                        while ($row=mysqli_fetch_array($resultado))
                        {
                        $_SESSION['tbl_empleado_sucursal_id_sucursal'.(String)$i_tbl_empleado_sucursal]=$row['id_sucursal'];
                        $_SESSION['tbl_empleado_sucursal_nombre_sucursal'.(String)$i_tbl_empleado_sucursal]=$row['nombre_sucursal'];
                        $i_tbl_empleado_sucursal++;
                        }  
                    }

                    mysqli_next_result($conexion);
                    $query="select*from categoria_productos";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado){
                        $i_tbl_categoria=1;
                    while ($row=mysqli_fetch_array($resultado))
                        {
                        $_SESSION['tbl_sucursales_id_categoria'.(String)$i_tbl_categoria]=$row['id_categoria'];
                        $_SESSION['tbl_sucursales_nombre_categoria'.(String)$i_tbl_categoria]=$row['nombre_categoria'];
                        $i_tbl_categoria++;
                        }
                    
                    }

                    mysqli_next_result($conexion);
                    $query="select*from marca_producto";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado){
                        $i_tbl_marca=1;
                    while ($row=mysqli_fetch_array($resultado))
                        {
                        $_SESSION['tbl_marca_id_marca'.(String)$i_tbl_marca]=$row['id_marca'];
                        $_SESSION['tbl_marca_nombre_marca'.(String)$i_tbl_marca]=$row['nombre_marca'];
                        $i_tbl_marca++;
                        }
                    
                    }

                    mysqli_next_result($conexion);
                    $query="select*from usuarios where codigo_empleado = '$codigo_empleado' ";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado){
                        $i_tbl_info_usuario=1;
                    while ($row=mysqli_fetch_array($resultado))
                        {
                        $_SESSION['tbl_usuarios_codigo_empleado'.(String)$i_tbl_info_usuario]=$row['codigo_empleado'];
                        $_SESSION['tbl_usuarios_nombre_empleado'.(String)$i_tbl_info_usuario]=$row['nombre_empleado'];
                        $_SESSION['tbl_usuarios_correo_empleado'.(String)$i_tbl_info_usuario]=$row['correo_empleado'];
                        $_SESSION['tbl_usuarios_id_rol'.(String)$i_tbl_info_usuario]=$row['id_rol'];
                        $_SESSION['tbl_usuarios_id_sucursal'.(String)$i_tbl_info_usuario]=$row['id_sucursal'];
                        $i_tbl_info_usuario++;
                        }
                    }

                        mysqli_next_result($conexion);
                        $SUCURSAL=$_SESSION['id_sucursal'];
                        $query="select*from SETTING where id_sucursal = '$SUCURSAL' ";
                        $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                        if ($resultado){
                            $i_tbl_setting=1;
                        while ($row=mysqli_fetch_array($resultado))
                            {
                            $_SESSION['tbl_setting_VAR_IVA']=$row['VAR_IVA'];
                            $_SESSION['tbl_setting_PERCEPCION']=$row['PERCEPCION'];
                            $_SESSION['tbl_serie_predeterminada']=$row['Serie_Predeterminada'];
                            $i_tbl_setting++;
                            }
                       
                    }
                    mysqli_next_result($conexion);
                    $sucur =$_SESSION['id_sucursal']; 
                    $query="SELECT * FROM series_documentos where id_sucursal = '$sucur' and Estado='1';";
                    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
                    if ($resultado){
                        $i_tbl_series_documento=1;
                    while ($row=mysqli_fetch_array($resultado))
                        {
                        $_SESSION['tbl_id_serie'.(String)$i_tbl_series_documento]=$row['id_serie'];
                        $_SESSION['tbl_serie_documento'.(String)$i_tbl_series_documento]=$row['serie_documento'];
                        $_SESSION['tbl_num_minimo'.(String)$i_tbl_series_documento]=$row['num_minimo'];
                        $_SESSION['tbl_num_maximo'.(String)$i_tbl_series_documento]=$row['num_maximo'];
                        $i_tbl_series_documento++;
                        }
                    


                        
                    }


	            }


?>
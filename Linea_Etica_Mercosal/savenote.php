<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
session_start();
include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion,"utf8");


//recibir
if (isset($_POST['anonimo'])){
$_SESSION['anonimo']=$_POST['anonimo'];
}
$_SESSION['im']=$_POST['im'];
$_SESSION['_nombre']=$_POST['nombre'];
$_SESSION['_apellido']=$_POST['apellido'];
$_SESSION['_cargo']=$_POST['cargo'];
$_SESSION['_email']=$_POST['email'];
$_SESSION['_telefono']=$_POST['telefono'];
///////////////////////////////////////
$_SESSION['c1pregunta1']=$_POST['c1pregunta1'];
$_SESSION['c1pregunta2']=$_POST['c1pregunta2'];
$_SESSION['c1pregunta3']=$_POST['c1pregunta3'];
$_SESSION['c1pregunta4']=$_POST['c1pregunta4'];
$_SESSION['c1pregunta5']=$_POST['c1pregunta5'];
$_SESSION['c1pregunta6']=$_POST['c1pregunta6'];
$_SESSION['c1pregunta7']=$_POST['im'];

//$_SESSION['c1imagen']=$_POST['notas'];

////////////////////
$_SESSION['c1pregunta8']=$_POST['c2pregunta1'];
$_SESSION['c1pregunta9']=$_POST['c2pregunta2'];
$_SESSION['c1pregunta10']=$_POST['c2pregunta3'];
$_SESSION['c1pregunta11']=$_POST['c2pregunta4'];
$_SESSION['c1pregunta12']=$_POST['c2pregunta5'];
$_SESSION['c1pregunta13']=$_POST['c2pregunta6'];
//$_SESSION['c1pregunta13']=$_POST['c2pregunta7'];
$_SESSION['c1pregunta14']=$_POST['im'];

//$_SESSION['c2imagen']=$_POST['c2imagen'];
//////////////////////////////////


$_SESSION['c1pregunta15']=$_POST['c3pregunta1'];
$_SESSION['c1pregunta16']=$_POST['c3pregunta2'];
$_SESSION['c1pregunta17']=$_POST['c3pregunta3'];
$_SESSION['c1pregunta18']=$_POST['c3pregunta4'];
$_SESSION['c1pregunta19']=$_POST['c3pregunta5'];
$_SESSION['c1pregunta20']=$_POST['im'];
//$_SESSION['c3imagen']=$_POST['notas'];

//////////////////////////////////////////}

$_SESSION['c1pregunta21']=$_POST['c4pregunta1'];
$_SESSION['c1pregunta22']=$_POST['c4pregunta2'];
$_SESSION['c1pregunta23']=$_POST['c4pregunta3'];
$_SESSION['c1pregunta24']=$_POST['c4pregunta4'];
$_SESSION['c1pregunta25']=$_POST['c4pregunta5'];
$_SESSION['c1pregunta26']=$_POST['c4pregunta6'];
$_SESSION['c1pregunta27']=$_POST['im'];
///////////////////////////////////////////////////

$_SESSION['c1pregunta28']=$_POST['c5pregunta1'];
$_SESSION['c1pregunta29']=$_POST['c5pregunta2'];
$_SESSION['c1pregunta30']=$_POST['c5pregunta3'];
$_SESSION['c1pregunta31']=$_POST['c5pregunta4'];
$_SESSION['c1pregunta32']=$_POST['c5pregunta5'];
$_SESSION['c1pregunta33']=$_POST['im'];
/////////////////////////////////////////////////

$_SESSION['c1pregunta34']=$_POST['c6pregunta1'];
$_SESSION['c1pregunta35']=$_POST['c6pregunta2'];
$_SESSION['c1pregunta36']=$_POST['c6pregunta3'];
$_SESSION['c1pregunta37']=$_POST['c6pregunta4'];
$_SESSION['c1pregunta38']=$_POST['c6pregunta5'];
$_SESSION['c1pregunta39']=$_POST['c6pregunta6'];
$_SESSION['c1pregunta40']=$_POST['im'];
/////////////////////////////////////////////////

$_SESSION['c1pregunta41']=$_POST['c7pregunta1'];
$_SESSION['c1pregunta42']=$_POST['c7pregunta2'];
$_SESSION['c1pregunta43']=$_POST['c7pregunta3'];
$_SESSION['c1pregunta44']=$_POST['c7pregunta4'];
$_SESSION['c1pregunta45']=$_POST['c7pregunta5'];
$_SESSION['c1pregunta46']=$_POST['im'];

/////////////////////////////////////////////////

$_SESSION['c1pregunta47']=$_POST['c8pregunta1'];
$_SESSION['c1pregunta48']=$_POST['c8pregunta2'];
$_SESSION['c1pregunta49']=$_POST['c8pregunta3'];
$_SESSION['c1pregunta50']=$_POST['c8pregunta4'];
$_SESSION['c1pregunta51']=$_POST['c8pregunta5'];
$_SESSION['c1pregunta52']=$_POST['c8pregunta6'];
$_SESSION['c1pregunta53']=$_POST['c8pregunta7'];
$_SESSION['c1pregunta54']=$_POST['c8pregunta8'];
$_SESSION['c1pregunta55']=$_POST['im'];

/////////////////////////////////////////////////

$_SESSION['c1pregunta56']=$_POST['c9pregunta1'];
$_SESSION['c1pregunta57']=$_POST['c9pregunta2'];
$_SESSION['c1pregunta58']=$_POST['c9pregunta3'];
$_SESSION['c1pregunta59']=$_POST['c9pregunta4'];
$_SESSION['c1pregunta60']=$_POST['c9pregunta5'];
$_SESSION['c1pregunta61']=$_POST['c9pregunta6'];
$_SESSION['c1pregunta62']=$_POST['im'];

////////////////////////////
$_SESSION['c1pregunta63']=$_POST['c10pregunta1'];
$_SESSION['c1pregunta64']=$_POST['im'];








////mostrar
/////////////////////////////////////







//insert into le_denuncia (apellido_denunciante,cargo_denunciante,correo_electronico_denunciante,id_interna_denuncia,nombre_denunciante,numero_telefono) values ('apellido','cargo','correo','idinterno','nombre',7122327)

$query="select id_denuncia from le_denuncia order by  id_denuncia desc LIMIT 1";		
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
    if ($resultado)
    {
        while ($row=mysqli_fetch_array($resultado))
        {
            $_SESSION['ultm'] = $row['id_denuncia'];
        }
        $Random_str = uniqid();  
        echo " -";
        $_SESSION['Keyl']=$Random_str."-".$_SESSION['ultm'];

        if ($_SESSION['Keyl'])
        {
            $_nombre=$_SESSION['_nombre'];
            $_apellido=$_SESSION['_apellido'];
            $_cargo=$_SESSION['_cargo'];
            $_email=$_SESSION['_email'];
            $_telefono=$_SESSION['_telefono'];
            $ok=$_SESSION['Keyl'];
            if ( $_SESSION['anonimo']){


                $query="insert into le_denuncia (apellido_denunciante,cargo_denunciante,correo_electronico_denunciante,id_interna_denuncia,nombre_denunciante,numero_telefono,fecha_denuncia) values ('Anonimo','Anonimo','Anonimo','$ok','Anonimo','Anonimo',NOW())";		
                $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
           
              }

            else {
                $query="insert into le_denuncia (apellido_denunciante,cargo_denunciante,correo_electronico_denunciante,id_interna_denuncia,nombre_denunciante,numero_telefono,fecha_denuncia) values ('$_apellido','$_cargo','$_email','$ok','$_nombre','$_telefono',NOW())";		
                $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
              
               }
                if ($resultado)
                {

                    $c1pregunta1=  $_SESSION['c1pregunta1'];
                    $c1pregunta2=  $_SESSION['c1pregunta2'];
                    $c1pregunta3= $_SESSION['c1pregunta3'];
                    $c1pregunta4= $_SESSION['c1pregunta4'];
                    $c1pregunta5=  $_SESSION['c1pregunta5'];
                    $c1pregunta6=  $_SESSION['c1pregunta6'];
                   // $c1pregunta7=  $_SESSION['im'];
                      //$_SESSION['c1imagen']=$_POST['notas'];
                      
                      ////////////////////
                      $c1pregunta8=   $_SESSION['c1pregunta8'];
                      $c1pregunta9=   $_SESSION['c1pregunta9'];
                      $c1pregunta10=   $_SESSION['c1pregunta10'];
                      $c1pregunta11=  $_SESSION['c1pregunta11'];
                      $c1pregunta12=   $_SESSION['c1pregunta12'];
                      $c1pregunta13=   $_SESSION['c1pregunta13'];
                     // $c1pregunta14=  $_SESSION['im'];
                      //$_SESSION['c2imagen']=$_POST['c2imagen'];
                      //////////////////////////////////
                      
                      
                      $c1pregunta15=  $_SESSION['c1pregunta15'];
                      $c1pregunta16=  $_SESSION['c1pregunta16'];
                      $c1pregunta17=  $_SESSION['c1pregunta17'];
                      $c1pregunta18= $_SESSION['c1pregunta18'];
                      $c1pregunta19= $_SESSION['c1pregunta19'];
                      //$c1pregunta20=  $_SESSION['im'];
                      //////////////////////////////////////////////
                      $c1pregunta21=  $_SESSION['c1pregunta21'];
                      $c1pregunta22=  $_SESSION['c1pregunta22'];
                      $c1pregunta23=  $_SESSION['c1pregunta23'];
                      $c1pregunta24= $_SESSION['c1pregunta24'];
                      $c1pregunta25= $_SESSION['c1pregunta25'];
                      $c1pregunta26= $_SESSION['c1pregunta26'];
                      //$c1pregunta27=  $_SESSION['im'];
                      //////////////////////////////////////////////
                      $c1pregunta28=  $_SESSION['c1pregunta28'];
                      $c1pregunta29=  $_SESSION['c1pregunta29'];
                      $c1pregunta30=  $_SESSION['c1pregunta30'];
                      $c1pregunta31= $_SESSION['c1pregunta31'];
                      $c1pregunta32= $_SESSION['c1pregunta32'];
                      //$c1pregunta33= $_SESSION['im'];
                        //////////////////////////////////////////////
                        $c1pregunta34=  $_SESSION['c1pregunta34'];
                        $c1pregunta35=  $_SESSION['c1pregunta35'];
                        $c1pregunta36=  $_SESSION['c1pregunta36'];
                        $c1pregunta37= $_SESSION['c1pregunta37'];
                        $c1pregunta38= $_SESSION['c1pregunta38'];
                        $c1pregunta39= $_SESSION['c1pregunta39'];
                        //$c1pregunta40= $_SESSION['im'];
                          //////////////////////////////////////////////
                      $c1pregunta41=  $_SESSION['c1pregunta41'];
                      $c1pregunt42=  $_SESSION['c1pregunta42'];
                      $c1pregunta43=  $_SESSION['c1pregunta43'];
                      $c1pregunta44= $_SESSION['c1pregunta44'];
                      $c1pregunta45= $_SESSION['c1pregunta45'];
                      //$c1pregunta46=  $_SESSION['im'];
                        //////////////////////////////////////////////
                        $c1pregunta47=  $_SESSION['c1pregunta47'];
                        $c1pregunta48=  $_SESSION['c1pregunta48'];
                        $c1pregunta49=  $_SESSION['c1pregunta49'];
                        $c1pregunta50= $_SESSION['c1pregunta50'];
                        $c1pregunta51= $_SESSION['c1pregunta51'];
                        $c1pregunta52= $_SESSION['c1pregunta52'];
                        $c1pregunta53= $_SESSION['c1pregunta53'];
                        $c1pregunta54= $_SESSION['c1pregunta54'];
                        // $c1pregunta55= $_SESSION['im'];
                          //////////////////////////////////////////////
                      $c1pregunta56=  $_SESSION['c1pregunta56'];
                      $c1pregunta57=  $_SESSION['c1pregunta57'];
                      $c1pregunta58=  $_SESSION['c1pregunta58'];
                      $c1pregunta59= $_SESSION['c1pregunta59'];
                      $c1pregunta60= $_SESSION['c1pregunta60'];
                      $c1pregunta61= $_SESSION['c1pregunta61'];
                      $c1pregunta62= $_SESSION['im'];
                    //////////////////////////////////////////////
                    $c1pregunta63=  $_SESSION['c1pregunta63'];
                    //$c1pregunta64= $_SESSION['im'];
                        

                    $i = 1;
                    
                    while ($i <= 64) {
                                       
                                        try
                                                   
                                      {                  
                                             $c1pregunta=   $_SESSION['c1pregunta'.$i];
                                             
                                                        $query="insert into le_detalle_denuncia (id_interna_denuncia,id_pregunta,detalle_denuncia,imagen) values ('$ok','$i','$c1pregunta','')";		
                                                        $resultadow=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros"); 
                                                        
                                                    
                                                                        
                                                       
                                                                              
                                                    //    echo    "Pregunta Numero: ".$c1pregunta."<br>";
                                                         
                                                     //   echo    "correcto en: ".$i."<br>";
                                                            $i++;
                                                        }catch(Exception $e){ $i++; }  
                                                
                                
                                    }

                                    images1($conexion, $ok);
                                    images2($conexion, $ok);
                                    images3($conexion, $ok);
                                     images4($conexion, $ok);
                                      images5($conexion, $ok);
                                       images6($conexion, $ok);
                                        images7($conexion, $ok);
                                         images8($conexion, $ok);
                                          images9($conexion, $ok);
                                           images10($conexion, $ok);



                  //  
                   


                }
            

        }


    }


  mysqli_close($conexion);


//Insercion


function subida_presskey1(){
                        //Si se quiere subir una imagen
                        if (isset($_POST['confirmado'])) {
                        //Recogemos el archivo enviado por el formulario
                        $archivo = $_FILES['c1imagen']['name'];
                        //Si el archivo contiene algo y es diferente de vacio
                        if (isset($archivo) && $archivo != "") {
                            //Obtenemos algunos datos necesarios sobre el archivo
                            $tipo = $_FILES['c1imagen']['type'];
                            $tamano = $_FILES['c1imagen']['size'];
                            $temp = $_FILES['c1imagen']['tmp_name'];
                            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) )) {
                                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                            }
                            else {
                                //Si la imagen es correcta en tamaño y tipo
                                //Se intenta subir al servidor
                                if (move_uploaded_file($temp, '../images/'.$archivo)) {
                                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                // chmod('images/'.$archivo, 0777);
                                    //Mostramos el mensaje de que se ha subido co éxito
                                    $_SESSION['key1']=true;
                                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                    //Mostramos la imagen subida
                                    echo '<p><img src="images/'.$archivo.'"></p>';
                                }
                                else {
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                }
                            }
                        }
                        }
}




function images1($rex, $ok){
    try{
    $foto= $_FILES["c1imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c1imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c1imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
        
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c1imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='7'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");  
    
    }

    }catch(Exception $e){echo "test";}                                                  

}

function images2($rex, $ok){
    $foto= $_FILES["c2imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c1imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c2imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c2imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='14'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}


function images3($rex, $ok){
    $foto= $_FILES["c3imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c3imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c3imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c3imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='20'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}


function images4($rex, $ok){
    $foto= $_FILES["c4imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c4imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c4imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c4imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='27'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}

function images5($rex, $ok){
    $foto= $_FILES["c5imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c5imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c5imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c5imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='33'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}

function images6($rex, $ok){
    $foto= $_FILES["c6imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c6imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c6imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c6imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='40'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}

function images7($rex, $ok){
    $foto= $_FILES["c7imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c7imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c7imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c7imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='46'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}

function images8($rex, $ok){
    $foto= $_FILES["c8imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c8imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c8imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c8imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='55'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}

function images9($rex, $ok){
    $foto= $_FILES["c9imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c9imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c9imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c9imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='62'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}

function images10($rex, $ok){
    $foto= $_FILES["c10imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["c10imagen"]["name"];
     //este es el archivo que añadiremosal campo blob
     $foto  = $_FILES['c10imagen']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    if ($foto){
    $foto=mysqli_real_escape_string($rex,file_get_contents($_FILES['c10imagen']['tmp_name']));
                                                                                            
    $query="UPDATE le_detalle_denuncia SET imagen = '$foto' WHERE id_interna_denuncia ='$ok' and id_pregunta='64'";		
    $resultadow=mysqli_query( $rex, $query ) or die ( "No se pueden mostrar los registros");                                                         
    }
}



echo 	"<script>
Swal.fire({
    title: 'EN HORA BUENA! 😃',
    text: 'HEMOS REGISTRADO TU DENUNCIA, PARA NOSOTROS ES MUY IMPORTANTE!',
    imageUrl: 'Imagen1.png',
    imageWidth: 400,
    imageHeight: 200,
    imageAlt: 'Custom image',
    showConfirmButton: true,
			 confirmButtonText: 'Continuar'
			 }).then(function(result){
				if(result.value){                   
				 window.location = 'Form.php';
				}


  })
</script>"; 


?>
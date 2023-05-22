

<?php





session_start();

$id_intr = $_GET['id'];

$codigo_empleado=	$_SESSION['codigo_empleado'] ;
$email=	$_SESSION['email'] ;
$Password=	$_SESSION['Password']; 
$Modulo=	$_SESSION['Modulo'];
$first_name=	$_SESSION['first_name'];
$last_name=	$_SESSION['last_name'] ;
$padre=	$_SESSION['id_padre'] ;
$id_revisado=$_SESSION['id_revisado'];
$aut=$_SESSION['id_autorizado'];
$_SESSION = array();

    $_SESSION['codigo_empleado']=$codigo_empleado ;
    $_SESSION['email']= $email;
    $_SESSION['Password']=$Password; 
    $_SESSION['Modulo']=$Modulo;
    $_SESSION['first_name']=$first_name;
    $_SESSION['last_name']= $last_name;
    $_SESSION['id_padre']= $padre;
    $_SESSION['id_revisado'] = $id_revisado;
    $_SESSION['id_autorizado'] = $aut;


?>

<?php




require('../../fpdf/fpdf.php');
//require('./jspdf.js');








include('../../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);

mysqli_set_charset($conexion,"utf8");


date_default_timezone_set('America/El_Salvador');    
$DateAndTime = date('Y-m-d H:i:s ', time()); 


$query="insert into bitacora_estados_nota_egreso (id_empleado, id_estado, id_nota_egreso_interna, fecha_estado )values ('$codigo_empleado','19','$id_intr','$DateAndTime');";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
 if ($resultado)
 {
   

    $query="UPDATE nota_egreso SET id_ultimo_estado = '19' where id_nota_egreso_interna = '$id_intr'";
    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
     if ($resultado)
     {
//FIN
$Asign= ' ';//no tocar
                  
                   
     }




 }




















 
 ?>

<?php
  $query="CALL SP_REPORTS_IMPRESION_NOTA_EGRESO_BODEGA ('$id_intr');";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
            if ($resultado)
            {
                $i = 0;
												while ($row=mysqli_fetch_array($resultado))
													
                                                {
                                                        
                                                 $id_nota=   $row['id_nota_interna'];
                                                 $index=   $row['empleado_autorizador'];
                                                 $bodega=   $row['empleado_bodega'];
                                                 $nombre_bodega=   $row['nombre_bodega'];
                                                 $id_cliente=   $row['id_cliente'];
                                                 $solicita=   $row['nombre_empleado_solicitante'];
                                                 $aut=   $row['autorizado_por'];
                                                 $fecha=   $row['fecha_ingreso'];
                                                $nota=    $row['observaciones'];
                                               $cuenta= $row['cuenta_contable'];
                                               $revisador= $row['nombre_empelado_revisado'];
                                               $idrevisador= $row['id_empleado_revisado'];
                                                // Echo out a sample image
                                               // echo '<img src="' . $src . '">';
                                                    $i++;
                                                }
                                             mysqli_next_result($conexion); //reburfer necesario para llamar uno o mas proc
                                                $i = 0;
                                                $query1="select*from cliente where id_cliente = '$id_cliente';";
                                                $resultado1=mysqli_query( $conexion, $query1 ) or die ( "SSSSSSSSSNo se pueden mostrar los canales");
                                                   if ($resultado1){
                                                while ($row=mysqli_fetch_array($resultado1))
													
                                                {
                                                        
                                                 $nombre_cliente=   $row['nombre_cliente'];
                                                 
                                                // Echo out a sample image
                                               // echo '<img src="' . $src . '">';
                                                    $i++;
                                                }
                                            }
          
          
                                            }






                             






class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    // // Arial bold 15
    // $this->SetFont('Arial','B',15);
    // // Movernos a la derecha
    // $this->Cell(80);
    // // Título
    // $this->Cell(30,10,'Title',1,0,'C');
    // // Salto de línea
    // $this->Ln(20);
}

// Pie de página
function Footer()
{
    // // Posición: a 1,5 cm del final
    // $this->SetY(-15);
    // // Arial italic 8
    // $this->SetFont('Arial','I',8);
    // // Número de página
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada

$pdf = new PDF();
//$pdf =  new JS_Form();

$pdf->AliasNbPages();
$pdf->AddPage();
$copia=1;

$mov=10;
//IMPRESAS


///////////////////////////////////////////////////////////
$pdf->SetFont('Times','',12);
$pdf->Image('../../images/Slogan.png',10,8,50);//(archivem,x,y,size)
$pdf -> Ln(20);
$pdf -> setXY(70,$mov); //(X,Y)
$pdf->SetFont('Arial','B',12);
$pdf -> SetFillColor(255,255,255);
$pdf->SetDrawColor(61,61,61);
$pdf -> Cell(0,10,utf8_decode('NOTA DE EGRESO DE BODEGA / ILP'),0,1,'B',0); 
$pdf -> setXY(160,$mov); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('N°  '.$id_nota),0,1,'B',0);
$pdf -> setXY(80,$mov+5); //(X,Y)
$pdf->SetFont('Arial','',9);
$pdf -> Cell(0,10,utf8_decode('Carretera a Santa Ana, Km. 28 1/2, Lote 3'),0,1,'',0); 
$pdf -> setXY(170,$mov+5); //(X,Y)
$pdf->SetFont('Arial','B',10);

$pdf -> Cell(0,10,utf8_decode('ORIGINAL'),0,1,'',0); 
$pdf->SetFont('Arial','',9);
$pdf -> setXY(70,$mov+10); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Parque Industrial El Rinconcito, San Juan Opico, La Libertad'),0,1,'',0); 
$pdf -> setXY(100,$mov+15); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Tel: 2316-8800'),0,1,'',0); 
$pdf -> setXY(10,$mov+20); //(X,Y)
$pdf->SetFont('Arial','',8);
$pdf -> Cell(0,10,utf8_decode('Entregamos a  '.substr($nombre_cliente, 0, 37)),0,1,'',0);
$pdf->SetFont('Arial','',9);
$pdf -> setXY(30,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
$pdf -> setXY(95,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Cod.'),0,1,'',0);
$pdf -> setXY(103,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode($id_cliente),0,1,'',0);
$pdf -> setXY(103,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_________________'),0,1,'',0);
$pdf -> setXY(135,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Fecha'),0,1,'',0);
$pdf -> setXY(145,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode($fecha),0,1,'',0);
$pdf -> setXY(145,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
$pdf -> setXY(10,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Direccion'),0,1,'',0);
$pdf -> setXY(25,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_______________________________________'),0,1,'',0);
$pdf -> setXY(95,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Nombre del Negocio'),0,1,'',0);
$pdf -> setXY(125,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
$pdf -> setXY(10,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Departamento / Municipio'),0,1,'',0);
$pdf -> setXY(50,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
$pdf -> setXY(95,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Solicita'),0,1,'',0);
$pdf -> setXY(107,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode($solicita),0,1,'',0);
$pdf -> setXY(107,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('______________________________________________'),0,1,'',0);

$pdf->SetFont('Arial','B',9);
$pdf -> setXY(10,$mov+40); //(X,Y)
$pdf -> Cell(25,5,utf8_decode('ENTIDAD'),1,1,'C',0); 
//$pdf -> setXY(40,50); //(X,Y)
//$pdf -> Cell(20,5,utf8_decode('CUENTA'),1,1,'C',0); 
$pdf -> setXY(35,$mov+40); //(X,Y)
$pdf -> Cell(32,5,utf8_decode(' CODIGO ARTICULO '),1,1,'C',0); 
$pdf -> setXY(67,$mov+40); //(X,Y)
$pdf -> Cell(20,5,utf8_decode('CANTIDAD'),1,1,'C',0); 
$pdf -> setXY(67,$mov+40); //(X,Y)
$pdf -> Cell(133,5,utf8_decode('DESCRIPCIÓN'),1,1,'C',0); 
$pdf -> Ln(1);  
$pdf->SetFont('Arial','',8);
$query="CALL SP_REPORTS_IMPRESION_NOTA_EGRESO_BODEGA ('$id_intr');";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
            if ($resultado)
            {
                $y=55;
                $cont=0;
                $i = 0;
                while ($row=mysqli_fetch_array($resultado))
                    
                {
                    $_SESSION['reporte_entidad'.$i] = $row['reporte_entidad'];
                    $_SESSION['cuenta_contable'.$i] = $row['cuenta_contable'];
                    $_SESSION['codigo_producto'.$i] = $row['codigo_producto'];
                    $_SESSION['cantidad'.$i] = $row['cantidad'];
                    $_SESSION['nombre_producto'.$i] = $row['nombre_producto'];
                    //saltos
                   
                    $pdf -> setXY(10,$y); //(X,Y)
                    $pdf -> Cell(25,5,utf8_decode($row['reporte_entidad']),1,1,'C',0);
                   // $pdf -> setXY(40,$y); //(X,Y)
                    //$pdf -> Cell(20,5,utf8_decode($row['cuenta_contable']),1,1,'C',0); 
                    $pdf -> setXY(35,$y); //(X,Y)
                    $pdf -> Cell(32,5,utf8_decode($row['codigo_producto']),1,1,'C',0); 
                    $pdf -> setXY(67,$y); //(X,Y)
                    $pdf -> Cell(20,5,utf8_decode($row['cantidad']),1,1,'C',0); 
                    $pdf -> setXY(87,$y); //(X,Y)
                    $pdf->SetFont('Arial','',6);
                    $pdf -> Cell(113,5,utf8_decode(substr($row['nombre_producto'],0,30)." /// ".$row['descripcion_promocion']),1,1,'L',0); 
                    $pdf->SetFont('Arial','',8);
                    $y=$y+5;
                    $i++;
                   // $pdf -> setXY(115,$y); //(X,Y)
                    //$pdf -> Cell(90,5,utf8_decode($cont),1,1,'C',0); 
                    $cont=$i;
                }
                


                while($cont<=5)
                    {
                       
                            $pdf -> setXY(10,$y); //(X,Y)
                            $pdf -> Cell(25,5,utf8_decode(''),1,1,'C',0);
                            //$pdf -> setXY(40,$y); //(X,Y)
                           // $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                            $pdf -> setXY(35,$y); //(X,Y)
                            $pdf -> Cell(32,5,utf8_decode(' '),1,1,'C',0); 
                            $pdf -> setXY(67,$y); //(X,Y)
                            $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                            $pdf -> setXY(67,$y); //(X,Y)
                            $pdf -> Cell(133,5,utf8_decode(''),1,1,'C',0); 
                             $y=$y+5;
                        
                        $cont=$cont+1;
                                       
                    }


                    //44 caracter maximo

          }
          $conexion->next_result();

//$pdf->SetFont('Arial','B',9);
$pdf -> setXY(10,$y); //(X,Y)
$pdf -> MultiCell(50,5,utf8_decode("CUENTAS"),1,'C',1); 
$pdf -> setXY(10,$y+5); //(X,Y)

////////////////////////////
$pdf->SetFont('Arial','',9);

$pdf -> setXY(60,$y+5); //(X,Y)
$pdf -> MultiCell(140,16,utf8_decode(" "),1,'L',1); 
$pdf -> setXY(60,$y+5); //(X,Y)
$pdf -> MultiCell(140,5,utf8_decode("OBSERVACIONES: "),0,'L',1); 
/////////////////////
$pdf -> setXY(60,$y); //(X,Y)
$pdf -> MultiCell(140,5,utf8_decode($cuenta),1,'L',1); 
$pdf->SetFont('Arial','',7);
$pdf -> MultiCell(50,4,utf8_decode("1-7110410 Prom. Mayorista \n 2-7110401 Muestra  \n 3-7110305 Exhibidores y Stand \n 4-7110402 Lanzamientos"),1,'L',1); 
//////////////////
$pdf -> setXY(62,$y+10); //(X,Y)
$pdf -> MultiCell(135,5,utf8_decode($nota),0,'L',1); 

$pdf -> setXY(10,$y+18); //(X,Y)
$pdf->SetFont('Arial','',4);
$pdf -> Cell(0,10,utf8_decode('ORIGINAL-BODEGA-BLANCO'),0,1,'',0);  



$pdf -> setXY(10,$y+31); //(X,Y)

$pdf->SetFont('Arial','B',10);
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
$pdf -> Ln(2);
$pdf -> setXY(20,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("BODEGA"),0,0,'C',1); 
$path = '../../images/layouts/F_Electronica/bodega/'.$bodega.'.png';

if (file_exists($path)) {
    
    $pdf->Image('../../images/layouts/F_Electronica/bodega/'.$bodega.'.png',10,100,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(10,$y+28); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($nombre_bodega,0,24) ),0,'L',1);  ///F
    $pdf->SetFont('Arial','B',10);
}

$pdf -> setXY(60,$y+31); //(X,Y)

$pdf->SetFont('Arial','B',10);
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
$pdf -> Ln(2);
$pdf -> setXY(72,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("RECIBI CONFORME"),0,0,'C',1); 
$pdf -> setXY(120,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("REVISADO"),0,0,'C',1); 
$pdf -> setXY(100,$y+31); //(X,Y)

$pdf->SetFont('Arial','B',10);
$path = '../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png';

if (file_exists($path)) {
    
    $pdf->Image('../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png',115,100,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(110,$y+28); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($revisador,0,24) ),0,'L',1);  ///F
    $pdf->SetFont('Arial','B',10);
}
$pdf -> setXY(107,$y+31); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
$pdf -> Ln(2);




$pdf -> setXY(150,$y+30); //(X,Y)

$pdf->SetFont('Arial','B',10);
$pdf -> setXY(170,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("AUTORIZADO"),0,0,'C',1); 

$path = '../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png';

if (file_exists($path)) {
    
    
    $pdf->Image('../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png',165,100,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(163,$y+29); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($aut,0,24)),0,'L',1);  ///F
}
$pdf->SetFont('Arial','B',10);
$pdf -> setXY(158,$y+31); 
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
$pdf -> Ln(2);


                

                                             //   $pdf->Image($datauri,20,20,'C');
    ///////////////////////////////COPIA/////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    
$mov=155;

$pdf->SetFont('Times','',12);
$pdf->Image('../../images/Slogan.png',10,152,50);//(archivem,x,y,size)

$pdf->Image('../../images/layouts/Marca_cliente.png',130,180,80);//(archivem,x,y,size)
$pdf -> Ln(20);
$pdf -> setXY(70,$mov); //(X,Y)
$pdf->SetFont('Arial','B',12);
$pdf -> SetFillColor(255,255,255);
$pdf->SetDrawColor(61,61,61);
$pdf -> Cell(0,10,utf8_decode('NOTA DE EGRESO DE BODEGA / ILP'),0,1,'B',0); 
$pdf -> setXY(160,$mov); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('N°  '.$id_nota),0,1,'B',0);
$pdf -> setXY(80,$mov+5); //(X,Y)
$pdf->SetFont('Arial','',9);
$pdf -> Cell(0,10,utf8_decode('Carretera a Santa Ana, Km. 28 1/2, Lote 3'),0,1,'',0); 
$pdf -> setXY(170,$mov+5); //(X,Y)
$pdf->SetFont('Arial','B',10);
$pdf -> Cell(0,10,utf8_decode('COPIA'),0,1,'',0); 
$pdf->SetFont('Arial','',9);
$pdf -> setXY(70,$mov+10); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Parque Industrial El Rinconcito, San Juan Opico, La Libertad'),0,1,'',0); 
$pdf -> setXY(100,$mov+15); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Tel: 2316-8800'),0,1,'',0); 
$pdf -> setXY(10,$mov+20); //(X,Y)
$pdf->SetFont('Arial','',8);
$pdf -> Cell(0,10,utf8_decode('Entregamos a  '.substr($nombre_cliente, 0, 37)),0,1,'',0);
$pdf->SetFont('Arial','',9);
$pdf -> setXY(30,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
$pdf -> setXY(95,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Cod.'),0,1,'',0);
$pdf -> setXY(103,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode($id_cliente),0,1,'',0);
$pdf -> setXY(103,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_________________'),0,1,'',0);
$pdf -> setXY(135,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Fecha'),0,1,'',0);
$pdf -> setXY(145,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode($fecha),0,1,'',0);
$pdf -> setXY(145,$mov+20); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
$pdf -> setXY(10,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Direccion'),0,1,'',0);
$pdf -> setXY(25,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_______________________________________'),0,1,'',0);
$pdf -> setXY(95,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Nombre del Negocio'),0,1,'',0);
$pdf -> setXY(125,$mov+25); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
$pdf -> setXY(10,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Departamento / Municipio'),0,1,'',0);
$pdf -> setXY(50,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
$pdf -> setXY(95,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('Solicita'),0,1,'',0);
$pdf -> setXY(107,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode($solicita),0,1,'',0);
$pdf -> setXY(107,$mov+30); //(X,Y)
$pdf -> Cell(0,10,utf8_decode('______________________________________________'),0,1,'',0);

$pdf->SetFont('Arial','B',9);
$pdf -> setXY(10,$mov+40); //(X,Y)
$pdf -> Cell(25,5,utf8_decode('ENTIDAD'),1,1,'C',0); 
//$pdf -> setXY(40,50); //(X,Y)
//$pdf -> Cell(20,5,utf8_decode('CUENTA'),1,1,'C',0); 
$pdf -> setXY(35,$mov+40); //(X,Y)
$pdf -> Cell(32,5,utf8_decode(' CODIGO ARTICULO '),1,1,'C',0); 
$pdf -> setXY(67,$mov+40); //(X,Y)
$pdf -> Cell(20,5,utf8_decode('CANTIDAD'),1,1,'C',0); 
$pdf -> setXY(67,$mov+40); //(X,Y)
$pdf -> Cell(133,5,utf8_decode('DESCRIPCIÓN'),1,1,'C',0); 
$pdf -> Ln(1);  
$pdf->SetFont('Arial','',8);
$query="CALL SP_REPORTS_IMPRESION_NOTA_EGRESO_BODEGA ('$id_intr');";
$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
            if ($resultado)
            {
                $y=200;
                $cont=0;
                $i = 0;
                while ($row=mysqli_fetch_array($resultado))
                    
                {
                    $_SESSION['reporte_entidad'.$i] = $row['reporte_entidad'];
                    $_SESSION['cuenta_contable'.$i] = $row['cuenta_contable'];
                    $_SESSION['codigo_producto'.$i] = $row['codigo_producto'];
                    $_SESSION['cantidad'.$i] = $row['cantidad'];
                    $_SESSION['nombre_producto'.$i] = $row['nombre_producto'];
                    //saltos
                   
                    $pdf -> setXY(10,$y); //(X,Y)
                    $pdf -> Cell(25,5,utf8_decode($row['reporte_entidad']),1,1,'C',0);
                   // $pdf -> setXY(40,$y); //(X,Y)
                    //$pdf -> Cell(20,5,utf8_decode($row['cuenta_contable']),1,1,'C',0); 
                    $pdf -> setXY(35,$y); //(X,Y)
                    $pdf -> Cell(32,5,utf8_decode($row['codigo_producto']),1,1,'C',0); 
                    $pdf -> setXY(67,$y); //(X,Y)
                    $pdf -> Cell(20,5,utf8_decode($row['cantidad']),1,1,'C',0); 
                    $pdf -> setXY(87,$y); //(X,Y)
                    $pdf->SetFont('Arial','',6);
                    $pdf -> Cell(113,5,utf8_decode(substr($row['nombre_producto'],0,30)." /// ".$row['descripcion_promocion']),1,1,'L',0); 
                    $pdf->SetFont('Arial','',8);
                    $y=$y+5;
                    $i++;
                   // $pdf -> setXY(115,$y); //(X,Y)
                    //$pdf -> Cell(90,5,utf8_decode($cont),1,1,'C',0); 
                    $cont=$i;
                }
                


                while($cont<=5)
                    {
                       
                            $pdf -> setXY(10,$y); //(X,Y)
                            $pdf -> Cell(25,5,utf8_decode(''),1,1,'C',0);
                            //$pdf -> setXY(40,$y); //(X,Y)
                           // $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                            $pdf -> setXY(35,$y); //(X,Y)
                            $pdf -> Cell(32,5,utf8_decode(' '),1,1,'C',0); 
                            $pdf -> setXY(67,$y); //(X,Y)
                            $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                            $pdf -> setXY(67,$y); //(X,Y)
                            $pdf -> Cell(133,5,utf8_decode(''),1,1,'C',0); 
                             $y=$y+5;
                        
                        $cont=$cont+1;
                                       
                    }


                    //44 caracter maximo

          }
          $conexion->next_result();

//$pdf->SetFont('Arial','B',9);
$pdf -> setXY(10,$y); //(X,Y)
$pdf -> MultiCell(50,5,utf8_decode("CUENTAS"),1,'C',1); 
$pdf -> setXY(10,$y+5); //(X,Y)

////////////////////////////
$pdf->SetFont('Arial','',9);

$pdf -> setXY(60,$y+5); //(X,Y)
$pdf -> MultiCell(140,16,utf8_decode(" "),1,'L',1); 
$pdf -> setXY(60,$y+5); //(X,Y)
$pdf -> MultiCell(140,5,utf8_decode("OBSERVACIONES: "),0,'L',1); 
/////////////////////
$pdf -> setXY(60,$y); //(X,Y)
$pdf -> MultiCell(140,5,utf8_decode($cuenta),1,'L',1); 
$pdf->SetFont('Arial','',7);
$pdf -> MultiCell(50,4,utf8_decode("1-7110410 Prom. Mayorista \n 2-7110401 Muestra  \n 3-7110305 Exhibidores y Stand \n 4-7110402 Lanzamientos"),1,'L',1); 
//////////////////
$pdf -> setXY(62,$y+10); //(X,Y)
$pdf -> MultiCell(135,5,utf8_decode($nota),0,'L',1); 

$pdf -> setXY(10,$y+18); //(X,Y)
$pdf->SetFont('Arial','',4);
$pdf -> Cell(0,10,utf8_decode('DUPLICADO-CLIENTE-CELESTE'),0,1,'',0);  

$pdf -> setXY(10,$y+31); //(X,Y)

$pdf->SetFont('Arial','B',10);
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
$pdf -> Ln(2);
$pdf -> setXY(20,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("BODEGA"),0,0,'C',1); 
$path = '../../images/layouts/F_Electronica/bodega/'.$bodega.'.png';

if (file_exists($path)) {
    
    $pdf->Image('../../images/layouts/F_Electronica/bodega/'.$bodega.'.png',10,245,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(10,$y+28); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($nombre_bodega,0,24) ),0,'L',1);  ///F
    $pdf->SetFont('Arial','B',10);
}












$pdf -> setXY(60,$y+31); //(X,Y)

$pdf->SetFont('Arial','B',10);
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
$pdf -> Ln(2);
$pdf -> setXY(72,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("RECIBI CONFORME"),0,0,'C',1); 
$pdf -> setXY(120,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("REVISADO"),0,0,'C',1); 
$pdf -> setXY(100,$y+31); //(X,Y)

$pdf->SetFont('Arial','B',10);
$path = '../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png';

if (file_exists($path)) {
    
    $pdf->Image('../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png',115,245,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(110,$y+28); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($revisador,0,24) ),0,'L',1);  ///F
    $pdf->SetFont('Arial','B',10);
}
$pdf -> setXY(107,$y+31); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
$pdf -> Ln(2);




$pdf -> setXY(150,$y+30); //(X,Y)

$pdf->SetFont('Arial','B',10);
$pdf -> setXY(170,$y+37); //(X,Y)
$pdf -> Cell(20,5,utf8_decode("AUTORIZADO"),0,0,'C',1); 

$path = '../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png';

if (file_exists($path)) {
    
    
    $pdf->Image('../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png',165,245,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(163,$y+28); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($aut,0,24)),0,'L',1);  ///F
}
$pdf->SetFont('Arial','B',10);
$pdf -> setXY(158,$y+31); 
$pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 

   

    



///////////////////////////////////////////////////////////////////////////////////
///////////////////////////HOJA 2/////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////














    //  $pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);// (Ancho, largo, content, border,salto,CENTRADO,COLOR GRILLA)
    
    //$pdf->Cell(0,10,utf8_decode('Test ').$i,0,1);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $copia=1;

    $mov=10;
    
    $pdf->SetFont('Times','',12);

    $pdf->Image('../../images/Slogan.png',10,8,50);//(archivem,x,y,size)
    $pdf -> Ln(20);
    $pdf -> setXY(70,$mov); //(X,Y)
    $pdf->SetFont('Arial','B',12);
    $pdf -> SetFillColor(255,255,255);
    $pdf->SetDrawColor(61,61,61);
    $pdf -> Cell(0,10,utf8_decode('NOTA DE EGRESO DE BODEGA / ILP'),0,1,'B',0); 
    $pdf -> setXY(160,$mov); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('N°  '.$id_nota),0,1,'B',0);
    $pdf -> setXY(80,$mov+5); //(X,Y)
    $pdf->SetFont('Arial','',9);
    $pdf -> Cell(0,10,utf8_decode('Carretera a Santa Ana, Km. 28 1/2, Lote 3'),0,1,'',0);

    $pdf -> setXY(170,$mov+5); //(X,Y)
    $pdf->SetFont('Arial','B',10);
    $pdf -> Cell(0,10,utf8_decode('COPIA'),0,1,'',0); 
     
    $pdf -> setXY(70,$mov+10); //(X,Y)
    
    $pdf -> Cell(0,10,utf8_decode('Parque Industrial El Rinconcito, San Juan Opico, La Libertad'),0,1,'',0); 
    $pdf -> setXY(100,$mov+15); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Tel: 2316-8800'),0,1,'',0); 
    $pdf -> setXY(10,$mov+20); //(X,Y)
    $pdf->SetFont('Arial','',8);
    $pdf -> Cell(0,10,utf8_decode('Entregamos a  '.substr($nombre_cliente, 0, 37)),0,1,'',0);
    $pdf->SetFont('Arial','',9);
    $pdf -> setXY(30,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
    $pdf -> setXY(95,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Cod.'),0,1,'',0);
    $pdf -> setXY(103,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode($id_cliente),0,1,'',0);
    $pdf -> setXY(103,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_________________'),0,1,'',0);
    $pdf -> setXY(135,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Fecha'),0,1,'',0);
    $pdf -> setXY(145,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode($fecha),0,1,'',0);
    $pdf -> setXY(145,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
    $pdf -> setXY(10,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Direccion'),0,1,'',0);
    $pdf -> setXY(25,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_______________________________________'),0,1,'',0);
    $pdf -> setXY(95,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Nombre del Negocio'),0,1,'',0);
    $pdf -> setXY(125,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
    $pdf -> setXY(10,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Departamento / Municipio'),0,1,'',0);
    $pdf -> setXY(50,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
    $pdf -> setXY(95,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Solicita'),0,1,'',0);
    $pdf -> setXY(107,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode($solicita),0,1,'',0);
    $pdf -> setXY(107,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('______________________________________________'),0,1,'',0);
    
    $pdf->SetFont('Arial','B',9);
    $pdf -> setXY(10,$mov+40); //(X,Y)
    $pdf -> Cell(25,5,utf8_decode('ENTIDAD'),1,1,'C',0); 
    //$pdf -> setXY(40,50); //(X,Y)
    //$pdf -> Cell(20,5,utf8_decode('CUENTA'),1,1,'C',0); 
    $pdf -> setXY(35,$mov+40); //(X,Y)
    $pdf -> Cell(32,5,utf8_decode(' CODIGO ARTICULO '),1,1,'C',0); 
    $pdf -> setXY(67,$mov+40); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode('CANTIDAD'),1,1,'C',0); 
    $pdf -> setXY(67,$mov+40); //(X,Y)
    $pdf -> Cell(133,5,utf8_decode('DESCRIPCIÓN'),1,1,'C',0); 
    $pdf -> Ln(1);  
    $pdf->SetFont('Arial','',8);
    $query="CALL SP_REPORTS_IMPRESION_NOTA_EGRESO_BODEGA ('$id_intr');";
    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
                if ($resultado)
                {
                    $y=55;
                    $cont=0;
                    $i = 0;
                    while ($row=mysqli_fetch_array($resultado))
                        
                    {
                        $_SESSION['reporte_entidad'.$i] = $row['reporte_entidad'];
                        $_SESSION['cuenta_contable'.$i] = $row['cuenta_contable'];
                        $_SESSION['codigo_producto'.$i] = $row['codigo_producto'];
                        $_SESSION['cantidad'.$i] = $row['cantidad'];
                        $_SESSION['nombre_producto'.$i] = $row['nombre_producto'];
                        //saltos
                       
                        $pdf -> setXY(10,$y); //(X,Y)
                        $pdf -> Cell(25,5,utf8_decode($row['reporte_entidad']),1,1,'C',0);
                       // $pdf -> setXY(40,$y); //(X,Y)
                        //$pdf -> Cell(20,5,utf8_decode($row['cuenta_contable']),1,1,'C',0); 
                        $pdf -> setXY(35,$y); //(X,Y)
                        $pdf -> Cell(32,5,utf8_decode($row['codigo_producto']),1,1,'C',0); 
                        $pdf -> setXY(67,$y); //(X,Y)
                        $pdf -> Cell(20,5,utf8_decode($row['cantidad']),1,1,'C',0); 
                        $pdf -> setXY(87,$y); //(X,Y)
                        $pdf->SetFont('Arial','',6);
                        $pdf -> Cell(113,5,utf8_decode(substr($row['nombre_producto'],0,30)." /// ".$row['descripcion_promocion']),1,1,'L',0); 
                        $pdf->SetFont('Arial','',8);
                        $y=$y+5;
                        $i++;
                       // $pdf -> setXY(115,$y); //(X,Y)
                        //$pdf -> Cell(90,5,utf8_decode($cont),1,1,'C',0); 
                        $cont=$i;
                    }
                    
    
    
                    while($cont<=5)
                        {
                           
                                $pdf -> setXY(10,$y); //(X,Y)
                                $pdf -> Cell(25,5,utf8_decode(''),1,1,'C',0);
                                //$pdf -> setXY(40,$y); //(X,Y)
                               // $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                                $pdf -> setXY(35,$y); //(X,Y)
                                $pdf -> Cell(32,5,utf8_decode(' '),1,1,'C',0); 
                                $pdf -> setXY(67,$y); //(X,Y)
                                $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                                $pdf -> setXY(67,$y); //(X,Y)
                                $pdf -> Cell(133,5,utf8_decode(''),1,1,'C',0); 
                                 $y=$y+5;
                            
                            $cont=$cont+1;
                                           
                        }
    
    
                        //44 caracter maximo
    
              }
              $conexion->next_result();
    
    //$pdf->SetFont('Arial','B',9);
    $pdf -> setXY(10,$y); //(X,Y)
    $pdf -> MultiCell(50,5,utf8_decode("CUENTAS"),1,'C',1); 
    $pdf -> setXY(10,$y+5); //(X,Y)
    
    ////////////////////////////
    $pdf->SetFont('Arial','',9);
    
    $pdf -> setXY(60,$y+5); //(X,Y)
    $pdf -> MultiCell(140,16,utf8_decode(" "),1,'L',1); 
    $pdf -> setXY(60,$y+5); //(X,Y)
    $pdf -> MultiCell(140,5,utf8_decode("OBSERVACIONES: "),0,'L',1); 
    /////////////////////
    $pdf -> setXY(60,$y); //(X,Y)
    $pdf -> MultiCell(140,5,utf8_decode($cuenta),1,'L',1); 
    $pdf->SetFont('Arial','',7);
    $pdf -> MultiCell(50,4,utf8_decode("1-7110410 Prom. Mayorista \n 2-7110401 Muestra  \n 3-7110305 Exhibidores y Stand \n 4-7110402 Lanzamientos"),1,'L',1); 
    //////////////////
    $pdf -> setXY(62,$y+10); //(X,Y)
    $pdf -> MultiCell(135,5,utf8_decode($nota),0,'L',1); 
    $pdf -> setXY(10,$y+18); //(X,Y)
$pdf->SetFont('Arial','',4);
$pdf -> Cell(0,10,utf8_decode('TRIPLICADO-ARCHIVO-AMARILLO'),0,1,'',0); 
    $pdf -> setXY(10,$y+31); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
    $pdf -> setXY(20,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("BODEGA"),0,0,'C',1); 
    $path = '../../images/layouts/F_Electronica/bodega/'.$bodega.'.png';

if (file_exists($path)) {
    
    $pdf->Image('../../images/layouts/F_Electronica/bodega/'.$bodega.'.png',10,100,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(10,$y+28); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($nombre_bodega,0,24) ),0,'L',1);  ///F
    $pdf->SetFont('Arial','B',10);
}
    
    $pdf -> setXY(60,$y+31); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
    $pdf -> setXY(72,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("RECIBI CONFORME"),0,0,'C',1); 
    $pdf -> setXY(120,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("REVISADO"),0,0,'C',1); 
    $pdf -> setXY(100,$y+31); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $path = '../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png';
    
    if (file_exists($path)) {
        
        $pdf->Image('../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png',115,100,30);//(archivem,x,y,size)
    } else {
        $pdf->SetFont('Arial','B',8);
        $pdf -> setXY(110,$y+28); //(X,Y)
        $pdf -> Cell(20,5,utf8_decode(substr($revisador,0,24) ),0,'L',1);  ///F
        $pdf->SetFont('Arial','B',10);
    }
    $pdf -> setXY(107,$y+31); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
    
    
    
    
    $pdf -> setXY(150,$y+30); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $pdf -> setXY(170,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("AUTORIZADO"),0,0,'C',1); 
    
    $path = '../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png';
    
    if (file_exists($path)) {
        
        
        $pdf->Image('../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png',165,100,30);//(archivem,x,y,size)
    } else {
        $pdf->SetFont('Arial','B',8);
        $pdf -> setXY(163,$y+28); //(X,Y)
        $pdf -> Cell(20,5,utf8_decode(substr($aut,0,24)),0,'L',1);  ///F
    }
    $pdf->SetFont('Arial','B',10);
    $pdf -> setXY(158,$y+31); 
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
    
    
                    
    
                                                 //   $pdf->Image($datauri,20,20,'C');
        ///////////////////////////////COPIA/////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       
        
    $mov=155;
    
    $pdf->SetFont('Times','',12);
    $pdf->Image('../../images/Slogan.png',10,152,50);//(archivem,x,y,size)
    $pdf -> Ln(20);
    $pdf -> setXY(70,$mov); //(X,Y)
    $pdf->SetFont('Arial','B',12);
    $pdf -> SetFillColor(255,255,255);
    $pdf->SetDrawColor(61,61,61);
    $pdf -> Cell(0,10,utf8_decode('NOTA DE EGRESO DE BODEGA / ILP'),0,1,'B',0); 
    $pdf -> setXY(160,$mov); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('N°  '.$id_nota),0,1,'B',0);
    $pdf -> setXY(80,$mov+5); //(X,Y)
    $pdf->SetFont('Arial','',9);
    $pdf -> Cell(0,10,utf8_decode('Carretera a Santa Ana, Km. 28 1/2, Lote 3'),0,1,'',0); 
    $pdf -> setXY(170,$mov+5); //(X,Y)
    $pdf->SetFont('Arial','B',10);
    $pdf -> Cell(0,10,utf8_decode('COPIA'),0,1,'',0); 
    $pdf->SetFont('Arial','',9);
    $pdf -> setXY(70,$mov+10); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Parque Industrial El Rinconcito, San Juan Opico, La Libertad'),0,1,'',0); 
    $pdf -> setXY(100,$mov+15); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Tel: 2316-8800'),0,1,'',0); 
    $pdf -> setXY(10,$mov+20); //(X,Y)
    $pdf->SetFont('Arial','',8);
    $pdf -> Cell(0,10,utf8_decode('Entregamos a  '.substr($nombre_cliente, 0, 37)),0,1,'',0);
    $pdf->SetFont('Arial','',9);
    $pdf -> setXY(30,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
    $pdf -> setXY(95,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Cod.'),0,1,'',0);
    $pdf -> setXY(103,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode($id_cliente),0,1,'',0);
    $pdf -> setXY(103,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_________________'),0,1,'',0);
    $pdf -> setXY(135,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Fecha'),0,1,'',0);
    $pdf -> setXY(145,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode($fecha),0,1,'',0);
    $pdf -> setXY(145,$mov+20); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
    $pdf -> setXY(10,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Direccion'),0,1,'',0);
    $pdf -> setXY(25,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_______________________________________'),0,1,'',0);
    $pdf -> setXY(95,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Nombre del Negocio'),0,1,'',0);
    $pdf -> setXY(125,$mov+25); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('____________________________________'),0,1,'',0);
    $pdf -> setXY(10,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Departamento / Municipio'),0,1,'',0);
    $pdf -> setXY(50,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('_________________________'),0,1,'',0);
    $pdf -> setXY(95,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('Solicita'),0,1,'',0);
    $pdf -> setXY(107,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode($solicita),0,1,'',0);
    $pdf -> setXY(107,$mov+30); //(X,Y)
    $pdf -> Cell(0,10,utf8_decode('______________________________________________'),0,1,'',0);
    
    $pdf->SetFont('Arial','B',9);
    $pdf -> setXY(10,$mov+40); //(X,Y)
    $pdf -> Cell(25,5,utf8_decode('ENTIDAD'),1,1,'C',0); 
    //$pdf -> setXY(40,50); //(X,Y)
    //$pdf -> Cell(20,5,utf8_decode('CUENTA'),1,1,'C',0); 
    $pdf -> setXY(35,$mov+40); //(X,Y)
    $pdf -> Cell(32,5,utf8_decode(' CODIGO ARTICULO '),1,1,'C',0); 
    $pdf -> setXY(67,$mov+40); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode('CANTIDAD'),1,1,'C',0); 
    $pdf -> setXY(67,$mov+40); //(X,Y)
    $pdf -> Cell(133,5,utf8_decode('DESCRIPCIÓN'),1,1,'C',0); 
    $pdf -> Ln(1);  
    $pdf->SetFont('Arial','',8);
    $query="CALL SP_REPORTS_IMPRESION_NOTA_EGRESO_BODEGA ('$id_intr');";
    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
                if ($resultado)
                {
                    $y=200;
                    $cont=0;
                    $i = 0;
                    while ($row=mysqli_fetch_array($resultado))
                        
                    {
                        $_SESSION['reporte_entidad'.$i] = $row['reporte_entidad'];
                        $_SESSION['cuenta_contable'.$i] = $row['cuenta_contable'];
                        $_SESSION['codigo_producto'.$i] = $row['codigo_producto'];
                        $_SESSION['cantidad'.$i] = $row['cantidad'];
                        $_SESSION['nombre_producto'.$i] = $row['nombre_producto'];
                        //saltos
                       
                        $pdf -> setXY(10,$y); //(X,Y)
                        $pdf -> Cell(25,5,utf8_decode($row['reporte_entidad']),1,1,'C',0);
                       // $pdf -> setXY(40,$y); //(X,Y)
                        //$pdf -> Cell(20,5,utf8_decode($row['cuenta_contable']),1,1,'C',0); 
                        $pdf -> setXY(35,$y); //(X,Y)
                        $pdf -> Cell(32,5,utf8_decode($row['codigo_producto']),1,1,'C',0); 
                        $pdf -> setXY(67,$y); //(X,Y)
                        $pdf -> Cell(20,5,utf8_decode($row['cantidad']),1,1,'C',0); 
                        $pdf -> setXY(87,$y); //(X,Y)
                        $pdf->SetFont('Arial','',6);
                        $pdf -> Cell(113,5,utf8_decode(substr($row['nombre_producto'],0,30)." /// ".$row['descripcion_promocion']),1,1,'L',0); 
                        $pdf->SetFont('Arial','',8);
                        $y=$y+5;
                        $i++;
                       // $pdf -> setXY(115,$y); //(X,Y)
                        //$pdf -> Cell(90,5,utf8_decode($cont),1,1,'C',0); 
                        $cont=$i;
                    }
                    
    
    
                    while($cont<=5)
                        {
                           
                                $pdf -> setXY(10,$y); //(X,Y)
                                $pdf -> Cell(25,5,utf8_decode(''),1,1,'C',0);
                                //$pdf -> setXY(40,$y); //(X,Y)
                               // $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                                $pdf -> setXY(35,$y); //(X,Y)
                                $pdf -> Cell(32,5,utf8_decode(' '),1,1,'C',0); 
                                $pdf -> setXY(67,$y); //(X,Y)
                                $pdf -> Cell(20,5,utf8_decode(' '),1,1,'C',0); 
                                $pdf -> setXY(67,$y); //(X,Y)
                                $pdf -> Cell(133,5,utf8_decode(''),1,1,'C',0); 
                                 $y=$y+5;
                            
                            $cont=$cont+1;
                                           
                        }
    
    
                        //44 caracter maximo
    
              }
              $conexion->next_result();
    
    //$pdf->SetFont('Arial','B',9);
    $pdf -> setXY(10,$y); //(X,Y)
    $pdf -> MultiCell(50,5,utf8_decode("CUENTAS"),1,'C',1); 
    $pdf -> setXY(10,$y+5); //(X,Y)
    
    ////////////////////////////
    $pdf->SetFont('Arial','',9);
    
    $pdf -> setXY(60,$y+5); //(X,Y)
    $pdf -> MultiCell(140,16,utf8_decode(" "),1,'L',1); 
    $pdf -> setXY(60,$y+5); //(X,Y)
    $pdf -> MultiCell(140,5,utf8_decode("OBSERVACIONES: "),0,'L',1); 
    /////////////////////
    $pdf -> setXY(60,$y); //(X,Y)
    $pdf -> MultiCell(140,5,utf8_decode($cuenta),1,'L',1); 
    $pdf->SetFont('Arial','',7);
    $pdf -> MultiCell(50,4,utf8_decode("1-7110410 Prom. Mayorista \n 2-7110401 Muestra  \n 3-7110305 Exhibidores y Stand \n 4-7110402 Lanzamientos"),1,'L',1); 
    //////////////////
    $pdf -> setXY(62,$y+10); //(X,Y)
    $pdf -> MultiCell(135,5,utf8_decode($nota),0,'L',1); 
    
    
    $pdf -> setXY(10,$y+18); //(X,Y)
$pdf->SetFont('Arial','',4);
$pdf -> Cell(0,10,utf8_decode('CUADRUPLICADO-MERCADEO-ROSADO'),0,1,'',0);  
    $pdf -> setXY(10,$y+31); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
    $pdf -> setXY(20,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("BODEGA"),0,0,'C',1); 
    $path = '../../images/layouts/F_Electronica/bodega/'.$bodega.'.png';

if (file_exists($path)) {
    
    $pdf->Image('../../images/layouts/F_Electronica/bodega/'.$bodega.'.png',10,245,30);//(archivem,x,y,size)
} else {
    $pdf->SetFont('Arial','B',8);
    $pdf -> setXY(10,$y+28); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode(substr($nombre_bodega,0,24) ),0,'L',1);  ///F
    $pdf->SetFont('Arial','B',10);
}
    
    $pdf -> setXY(60,$y+31); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
    $pdf -> setXY(72,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("RECIBI CONFORME"),0,0,'C',1); 
    $pdf -> setXY(120,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("REVISADO"),0,0,'C',1); 
    $pdf -> setXY(100,$y+31); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $path = '../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png';
    
    if (file_exists($path)) {
        
        $pdf->Image('../../images/layouts/F_Electronica/Revisado/'.$idrevisador.'.png',115,245,30);//(archivem,x,y,size)
    } else {
        $pdf->SetFont('Arial','B',8);
        $pdf -> setXY(110,$y+28); //(X,Y)
        $pdf -> Cell(20,5,utf8_decode(substr($revisador,0,24) ),0,'L',1);  ///F
        $pdf->SetFont('Arial','B',10);
    }
    $pdf -> setXY(107,$y+31); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
    
    
    
    
    $pdf -> setXY(150,$y+30); //(X,Y)
    
    $pdf->SetFont('Arial','B',10);
    $pdf -> setXY(170,$y+37); //(X,Y)
    $pdf -> Cell(20,5,utf8_decode("AUTORIZADO"),0,0,'C',1); 
    
    $path = '../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png';
    
    if (file_exists($path)) {
        
        
        $pdf->Image('../../images/layouts/F_Electronica/Autorizadores/'.$index.'.png',165,245,30);//(archivem,x,y,size)
    } else {
        $pdf->SetFont('Arial','B',8);
        $pdf -> setXY(163,$y+28); //(X,Y)
        $pdf -> Cell(20,5,utf8_decode(substr($aut,0,24)),0,'L',1);  ///F
    }
    $pdf->SetFont('Arial','B',10);
    $pdf -> setXY(158,$y+31); 
    $pdf -> Cell(20,5,utf8_decode("(F)__________________"),0,'L',1); 
    $pdf -> Ln(2);
        



    mysqli_close( $conexion );
    ?>

    <?php


//$pdf-> _JSprint();

$pdf->Output();

?>








<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.map" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.js" integrity="sha512-1cF8XUz5U3BlnRVqNFn+aPNwwSr/FPtrmKvM1g4dJJ9tg8kmqRUzqbSOvRRAMScDnTkOcOnnfwF3+jRA/nE2Ow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js" integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.map" ></script>

























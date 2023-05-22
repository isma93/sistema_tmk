
<?php 



?>
<style>
  html,body{
  overflow-x: hidden;
  color:black;
  font-family:'Opens Sans',helvetica;  
  height:100%;
  width:101%;
  margin: 0px;
  padding: 0px;
  
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="js/invoice.js"></script>
    <script>
            function init()
            {
               window.location.href = "ViewReport.php";
            }
</script>
<center>
<div class="row col-sm-8 row-cols-2 row-cols-md-2 g-4" >

 <?php 
 session_start();
//cambiar imagen
$disable='viewpdf.jpg';
 header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
 header("Cache-Control: post-check=0, pre-check=0", false);
 header("Pragma: no-cache"); 
 $l=0;
 include('../include/config.inc');
 $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
 $parameter=$_SESSION['codigo_empleado'];
                $query="call SP_REPORTS_MODULO_REPORTE_USUARIOS('$parameter')";
							    $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
							     if ($resultado)
								 {
                 $l=1;
                  while ($row = mysqli_fetch_array($resultado)) {
                    $_SESSION['codereport_local'.$l]= $row['id_reporte'];
                   $code_local= $row['codigo_empleado'];
                    $l++;
                  
                  
                  
                  }

                 } 


 
 ?>
<body>
  
  <!-------------------------------------------------------------------------------- -->
  <div class="col" >
  
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=1;
      $ruta_modulo="ViewReportExcel.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php;$disable='viewpdf.jpg'; }else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Reporte en Excel</h5>
        <p class="card-text">Módulo de autorizados.</p></a>
      </div>
    </div>
  </div><br>
 <!-------------------------------------------------------------------------------- -->
 <div class="col" >
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=2;
      $ruta_modulo="ViewReportpdf.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php;$disable='viewpdf.jpg'; }else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Reporte PDF</h5>
        <p class="card-text">Módulo de autorizados.</p></a>
      </div>
    </div>
  </div><br>
 <!-------------------------------------------------------------------------------- -->
  <div class="col" >
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=3;
      $ruta_modulo="ViewReportImpreso.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php;$disable='viewpdf.jpg'; }else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Reporte de notas impresas</h5>
        <p class="card-text">Módulo de notas impresas.</p></a>
      </div>
    </div>
  </div><br>
 <!-------------------------------------------------------------------------------- -->
   <div class="col" >
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=4;
      $ruta_modulo="ViewReportAnular.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php; $disable='viewpdf.jpg';}else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Modulo de anulación</h5>
        <p class="card-text">Módulo de anulación de notas de egreso.</p></a>
      </div>
    </div>
  </div><br>
  
  <!-------------------------------------------------------------------------------- -->
   <div class="col" >
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=5;
      $ruta_modulo="ViewReportExcelRevisado.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php; $disable='viewpdf.jpg';}else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Reporte Resumen</h5>
        <p class="card-text">Reporte para revisión y autorización</p></a>
      </div>
    </div>
  </div><br>
    <!-------------------------------------------------------------------------------- -->
    <div class="col" >
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=6;
      $ruta_modulo="../AppCode/Rest_Bodega/ViewAut.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php; $disable='viewpdf.jpg';}else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Modulo de Bodega</h5>
        <p class="card-text">Reporte para revisión y autorización de bodega</p></a>
      </div>
    </div>
  </div><br>
    <!-------------------------------------------------------------------------------- -->
    <div class="col" >
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=7;
      $ruta_modulo="./Services_bodega/ViewReportpdfbodega.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php; $disable='viewpdf.jpg';}else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Modulo de impresión Bodega</h5>
        <p class="card-text">Reporte notas pendientes de imprimir por bodega</p></a>
      </div>
    </div>
  </div><br>
    <!-------------------------------------------------------------------------------- -->
   
    <div class="col" >
    <div class="card"> 
      <?php 
      //DEFINE EL MODULO; ///////////
      $Numero_de_Modulo_Reporte=7;
      $ruta_modulo="./Services_bodega/ViewReportpdfbodega_impresa.php";
      ///////////////////////////////
      ?><?php $ruta_php =""; if ($l>1){	 $cont=1;	while ($cont < $l){ if ($_SESSION['codereport_local'.$cont]==$Numero_de_Modulo_Reporte) {$ruta_php=$ruta_modulo;}$cont++;}} ?> <a  onclick="parent.location.href = '<?php if ($ruta_php<>''){echo $ruta_php; $disable='viewpdf.jpg';}else{echo 'Report_master.php'; $disable='viewpdfdisable.jpg';} ?>'"   href="#">
     <?php echo  '<img src="../images/layouts/'.$disable.'" class="card-img-top" alt="...">' ?>
      <div class="card-body">
        <h5 class="card-title">Modulo de Notas impresas bodega</h5>
        <p class="card-text">Reporte muestras notas que ya estan impresas por bodega</p></a>
      </div>
    </div>
  </div><br>








 
</body>

<?php

session_start();
include('../../include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");


     $id_padre= $_SESSION['id_padre'];
    $id_revisado= $_SESSION['id_revisado']; 
    
    
?>
<html>
<head>
<meta charset="utf-8">
<title>Remisión TMK</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="js/invoice.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="../../css/animate.css"/>
<link rel="stylesheet" type="text/css" href="../../bk/modf.css"/>

<link rel="stylesheet" type="text/css" href="../../bk/navbar.css"/>
<link rel="stylesheet" type="text/css" href="../../css/mysl.css"/>
<link rel="stylesheet" type="text/css" href="../../css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="../../css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="../../css/owl.transitions.css"/>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
-->


<script>
         
		 function retrologout()
            {
				if (confirm("¿Realmente deseas cerrar tu sesión?") == true) {
						return true;
					} else {
					return false;
					}		
					return false;
			}	
						
            
</script>
<script>
            function logout()
            {
               window.location.href = "destroy.php";
            }
</script>

<script>
            function init()
            {
               window.location.href = "../create_invoice.php";
            }
</script>

<script>
            function revisarnota()
            {
               window.location.href = "./AppCode/revisarnota.php";
            }
</script>
<script>
function ancla()
{

  var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        return true;
	} else {
    return false;
	}
  
}
</script>		
</head>


<div class="topnav" id="myTopnav" >
	

  <a href="../../master.php" class="active"><img src="../../images/Imagen1.png" width="50" height="24"></a>

  <?php

  //Parametros de reenvio
  $ingresar_nota=  '<a href="../../create_invoice.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ingresar Nota de Egreso</a>';
 $revisar='<a href="../revisarnota.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Revisar Notas</a>';
 $modulo_aut='<a class="active" href="#"><i class="fa fa-book" aria-hidden="true"></i> Módulo de Liquidación</a>'; 
 $reportes='<a href="../../Reporting/Report_master.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a>';
 $about ='<a href="#about"><i class="fa fa-rss" aria-hidden="true"></i> About</a>';
 $inventario ='<a href="#about"><i class="fa fa-rss" aria-hidden="true"></i> Inventrio</a>';

 if (isset($_SESSION['Modulo']))
			
 {

   if ($_SESSION['Modulo']!=5 )
   {
	   if ($_SESSION['Modulo']==1)
	   {
			echo $ingresar_nota;
		echo $modulo_aut;
		echo $inventario;
    
		echo $about;

	   } else if ($_SESSION['Modulo']==2)
	   {
		echo $ingresar_nota;
		echo $revisar;
		echo $reportes;
		echo $about;

	   } else if ($_SESSION['Modulo']==3 ||$_SESSION['Modulo']==7 ||$_SESSION['Modulo']==9)
	   {
		echo $ingresar_nota;
		echo $revisar;
		echo $modulo_aut;
		echo $reportes;
		echo $about;
	   }
	   else 
	   {
		echo '<script>
													  
		window.location = "../../Found.php";
	   
   		</script>';
	   }
	   

   } else
   {
	echo $ingresar_nota;
	echo $revisar;
	echo $modulo_aut;
	echo $reportes;
	echo $about;
   }
} else 
{
	
	 echo '<script>
												   
	 window.location = "../../Found.php";
	
		</script>';
	
}
 
 ?>
    <div class="pull-right">
  <a id="logout" onclick="return retrologout()" href="../../destroy.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Cerrar Sesión</a>
   </div>
  
 
   <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>


</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
	



<br>

<div class="load-animate animated fadeInUp">
			<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<center><h1>Pendientes de Liquidar</h1></center>
			</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="">
			<!-- <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"> -->

			<div>
			<div class="form-group">
			<form action="arrayfechaut.php" method="post" name="busqueda" class="" role="form" novalidate> 
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-success">

<div class="panel-heading">Filtros</div>	

<div class="panel-body">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 pull-left">
           
            <label>Desde:</label>
            <input aria-describedby="basic-addon1" value="<?php if (isset($_SESSION['min'])){ echo $_SESSION['min'];} ?>" type="date" class="form-control" id="min-date" name="min-date" placeholder="From: yyyy-mm-dd">
            
            <label>Hasta:</label>
            <input aria-describedby="basic-addon1" value="<?php if (isset($_SESSION['max'])){ echo $_SESSION['max'];} ?>" type="date" class="form-control" id="max-date" name="max-date" placeholder="From: yyyy-mm-dd">
                                                   
            </div> 
			
			

            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 pull-right">
							<div class= "form-group">
							<br><button class="btn btn-danger btn-lg btn-block" id= "btn-search" name="btn_search" type="submit"> <h5><span class="glyphicon glyphicon-repeat"></span> ACTUALIZAR</h5></button>
							</form>
													
														</div>


														<div class="form-group">
														
                                                        <div class="input-group">

                                                   
													</div>
                                                    </div>
													<div class="form-group">
														<span class="btn btn-info btn-sm btn-block"><p class="text-left"><i class="fa fa-search" aria-hidden="true"></i><p> </span>
														<input aria-describedby="basic-addon1" id="filtrar" value="" type="text" class="form-control" name="te" placeholder="Busqueda">
														
												</div>
                                                        </div>
														</div>
                                                        
						
                            </div></div></div> </div> 


			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="outer">
			<table id="tabla" data-sort="table" class="table table-bordered" id="invoiceItem">   
                    <tr>
                    <th width="10%" >Código</th>
                        <th width="15%">Fecha de Ingreso</th>
                        <th width="30%">Empleado</th>div
                        <th width="27%">Nombre cliente</th>                             
                        <th width="10%">Monto</th>
                        <th width="10%">Saldo</th>
                        <th width="35%">Estado</th>
                        <th width="25%">Ver</th>
                      
                       
                    </tr>   
                    <tbody class="buscar">
                                    <tr>
                                        <?php
                                      $id_empleado=  $_SESSION['codigo_empleado'];
                                        if (isset($_SESSION['min'])){
                                          if (isset($_SESSION['max'])){
                                              $min = $_SESSION['min'];
                                              $max =$_SESSION['max'];
                                              $query="call SP_TMK_LISTAR_REMISION_TODAS_CON_FECHA('$min','$max')";
                      $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
                      
                                          }
                                      }else {
                                      //Modulo 5 = Vendedores, mercaderistas, etc.
                                        if ($_SESSION['Modulo']== 5){
                                      $query="select*from VIEW_TMK_LISTAR_DESALOJOS_REVISADOS";
                                      $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");
                                        }   
                                        else{

                                          $query="call SP_TMK_LISTAR_DESALOJOS_REVISADOS_X_USUARIOS('$id_empleado');";
                                          $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los canales");


                                          //aca iran los datos de los desalojos ingresados por impulsadoras

                                        }
                                          }





                                                $i = 0;
                                                while ($row=mysqli_fetch_array($resultado))
                                                {
                                                    echo '<tr>';
                                                    $idenvi=$row['id_interno_desalojo'];
                                                echo '<td> '; echo $row['id_interno_desalojo'];echo '</td>';
                                                
                                                echo '<td> '; echo $row['fecha_sistema'];echo '</td>';
                                                echo '<td> '; echo $row['nombre'];echo '</td>';

                                                
                                            
                                                echo '<td> '; echo $row['nombre_cliente'];echo '</td>';
                                                echo '<td> '; echo '$ '; echo $row['venta'];echo '</td>';
                                                echo '<td> '; echo '$ '; echo $row['saldo'];echo '</td>';
                                                      

                                                        

                                               
                                                if ($row['id_estado']=1){
                                                    echo '<td> '; echo "Liquidar";echo '</td>';
                                                                            }
                                                
                                                ?> <td>  <a class="btn btn-success" href='viewegreso.php?id=<?php echo $idenvi;?>&com=<?php echo $i ?>' ><i class="fa fa-eye"></i> Ver</a> <?php echo '</td>';
                                                ?> <?php
                                                    
                                                    $i++;   
                                                echo    '</tr>';                
                                                }
                                            
                                                
                                                    
                                                        
                                                        
                                                            mysqli_close( $conexion );
                                         
                                         
                                         
                                         
                                         
                                         
                                         ?>
                                        
                                    </tr>            
									</tbody>       
                </table>
<script>

$(document).ready(function () {
 
 (function ($) {

	 $('#filtrar').keyup(function () {

		  var rex = new RegExp($(this).val(), 'i');

		  $('.buscar tr').hide();

		  $('.buscar tr').filter(function () {
			return rex.test($(this).text());
		  }).show();

	 })

 }(jQuery));

});
</script>









				<script>
   /* W3 Example */
function busqueda() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function busquedaJQsimple() {
  var filtro = $("#buscar").val().toUpperCase();

  $("#tabla tbody tr").each(function() {
    texto = $(this).children("td:eq(0)").text().toUpperCase();
    
    if (texto.indexOf(filtro) < 0) {
      $(this).hide();
    } else{
      $(this).show();
    }
      
    
  });
  
}

function buscar(){
  
  var filtro = $("#buscar").val().toUpperCase();
  
  $("#tabla td").each(function() {
    var textoEnTd = $(this).text().toUpperCase();
    if(textoEnTd.indexOf(filtro)>=0){
      $(this).addClass("existe");
    }else{
      $(this).removeClass("existe");
    }
  })
  
  $("#tabla tbody tr").each(function(){
    if($(this).children(".existe").length>0){
      $(this).show();
    }else{
      $(this).hide();
    }
  })
  
}

function busquedaJQmultiple() {
  var filtro = $("#buscar").val().toUpperCase();

  $("#tabla tbody tr").each(function() {
    
    $(this).children("td").each(function() {
        var texto = $(this).text().toUpperCase();
        
        if (texto.indexOf(filtro) < 0) {
          $(this).addClass("sin");
        }else{
          $(this).removeClass("sin");
        }
    });
    
    // nTds = la cantidad de <td> en el <tr> evaluado
    nTds = $(this).children("td").length
    // nTdsSin = la cantidad de <td> con la clase ".sin" en el <tr> evaluado
    nTdsSin = $(this).children(".sin").length

    if(nTdsSin==nTds){
      //$(this).hide()
      $(this).addClass("noTiene");
    }else{
      //$(this).show()
       $(this).removeClass("noTiene");
    }
    
  });
  
}
        </script>

			</div>
			</div></div></div></div>
			
</body>









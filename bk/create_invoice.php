


<head>
<meta charset="utf-8">
<title>Notas Egreso ILP</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
<script src="js/invoice.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script>
            function logout()
            {
               window.location.href = "destroy.php";
            }
</script>
		
		
		
		
		
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="main-header" id="main-header">
  <nav class="navbar mynav navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="Index.php"">ilp Notas Egreso</a> </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <?php
		
		session_start(); 
		echo "<ul class='nav navbar-nav navbar-right'>";
		
       $canales = array();
		if (isset($_SESSION['Modulo'])){
			//Ingreso seguro de Administrador
			if ($_SESSION['Modulo'] == 5) 
			{
				echo '<li><a href="#" Onclick="init()">Crear una nota</a></li>';
				echo '<li><a href="#banner">Reportes</a></li>';
				echo '<li><a href="#work">Revisar Notas</a></li>';
				echo '<li><a href="#work">Autorizacion Mercadeo</a></li>';
				echo '<li><a href="#testimonials">Autorizacion (G.G)</a></li>';
			}
			
			
			
			
				if ($_SESSION['Modulo'] == 1) {
				  echo '<li><a href="#" Onclick="init()">Crear una nota</a></li>';
				  echo '<li><a href="#banner">Reportes</a></li>';
				}
				else if ($_SESSION['Modulo'] == 2 ) {
					echo '<li><a href="#work">Revisar Notas</a></li>';
				}
				else if ($_SESSION['Modulo'] == 3 ) {
				  echo '<li><a href="#work">Autorizacion Mercadeo</a></li>';
				}
				else if ($_SESSION['Modulo'] == 4 ) {
				  echo '<li><a href="#testimonials">Autorizacion (G.G)</a></li>';
				}
				}
				  echo '<li><a href="#about">Acerca de.</a></li>';
				  echo '<li><a href="#contact">Contacto</a></li>';
				 if (isset($_SESSION['Modulo'])){
				  if ($_SESSION['Modulo'] == 1 || $_SESSION['Modulo'] == 2 || $_SESSION['Modulo'] == 3 || $_SESSION['Modulo'] == 4 || $_SESSION['Modulo'] == 5)
				  {
				  echo "<li><a href='#' Onclick='logout()'>Logout</a></li>";
				  }
				 }
		  
       echo  "</ul>";
		?>
      </div>
    </div>
  </nav>
</div>





























			<form action="BuscarCliente.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate> 
			<div class="load-animate animated fadeInUp">
			<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="title">Nueva nota de egreso</h2>
			</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

			<div>
			<div class="form-group">


			<!-- Aca ingresar la otra tabla-->



					   

				  
								<div >
													<div class= "form-group">
												  
													
													<button align="right" class="btn btn-success" ONCLICK="location.href='BuscarCliente.php'"  name="BuscarCliente">Buscar cliente</button>
													</form>	
													</div>

											   
								   
								</div>
								 
								  <div class="form-group" id="contenedor">

								 
								<tr>
								
								 <Td>
									 <input value="<?php if (isset($_SESSION['id_cliente'])){echo $_SESSION['id_cliente']; }else {echo 'Usuario no encontrado';}?>" type="text" class="form-control" name="codigoCliente" id="codigoCliente" placeholder="Código Cliente" required autocomplete="off">
									 </td>
									 

								</tr>
											   
								</div>

								
								<div class="form-group">
									<input readonly value="<?php if (isset($_SESSION['nom'])){echo $_SESSION['nom']; }else {echo 'Usuario no encontrado';}?>" type="text" class="form-control" name="ruta" id="ruta" placeholder="Ruta" autocomplete="off" >
								</div>
								
								<div class="form-group"  autocomplete="off">

										<input readonly  value="<?php if (isset($_SESSION['direccion'])){echo $_SESSION['direccion']; }else {echo 'Usuario no encontrado';}?>" class="form-control" name="Direccion" id="Direccion" placeholder="Direccion" required autocomplete="off">

										</div>



								<div class="form-group">

								<input   type="text" class="form-control" name="ruta" id="ruta" placeholder="Ruta" autocomplete="off" >

									
								</div>


								<div class="form-group"  autocomplete="off">

								<select name="Canal" id="Canal"  class="form-control">
									<option value="0">Canal:</option>

									<?php
									$i = 0;

									while ($i <= $_SESSION['numero_de_canales']){
									?>

										<option value="<?php echo $_SESSION['id_canal'.$i]; ?>"> <?php echo $_SESSION['canal'.$i]; ?> </option>

										<?php  $i++;
									} ?>
															  
								</select>

								</div>


									
								</div>

								</div>   



								</div>

						   	
							   <!-- </form> !-->
							   

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
							<div class= "form-group">
							<form action="BuscarProducto.php" method="post" name="busqueda" class="invoice-form" role="form" novalidate> 
														
														</div>


														<div class="form-group">
														<button class="btn btn-success" name="BuscarProducto" type="submit">Buscar producto</button>
														<input  value="<?php if (isset($_SESSION['nombre_producto'])){echo $_SESSION['id_producto']; }else {echo 'Producto no encontrado';}?>" type="text" class="form-control" name="te" placeholder="Código Producto">

															
														</div>
							</form>	
								
														<div class="form-group">
													<form action="./AppCode/MetaCarga.php" method="post">
													<input type="hidden" readonly value="<?php if (isset($_SESSION['nombre_producto'])){echo $_SESSION['id_producto']; }else {echo 'Producto no encontrado';}?>" type="text" class="form-control" name="codigo" placeholder="Código Producto">
														<input value="<?php if (isset($_SESSION['nombre_producto'])){echo $_SESSION['nombre_producto']; }else {echo 'Producto no encontrado';}?>" type="text" class="form-control" name="nombreProducto" id="nombreProducto" placeholder="Nombre Producto" autocomplete="off">
														</div>


														<div class="form-group">

														<input type="text" class="form-control" name="cantidad" placeholder="Cantidad" autocomplete="off">
															
														</div>
														<div class="form-group">

														<input type="text" class="form-control" name="Entidad" placeholder="Entidad" autocomplete="off">
															
														</div>

														<div class="form-group"  autocomplete="off">
													
								

								</div>


														<div class="form-group">

														<input type="text" class="form-control" name="descripPromocion" id="descripPromocion" placeholder="descrión de Promocion" autocomplete="off">
															
														</div>

														<div class="form-group">
											<button class="btn btn-success" id="addRows" type="submit"  >+ Agregar Más</button>
										</form>
														
															
														
															



								
							</div>
							</div>
			<div class="">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
				<table class="table table-bordered table-hover" id="invoiceItem">	
					<tr>
						
						<th width="10%">Código</th>
						<th width="30%">Nombre Producto</th>
						<th width="15%">Cantidad</th>div
						<th width="15%">Entidad</th>								
						<th width="70%">Descripción promoción</th>
						<th width="20%">Accion</th>
					   
					</tr>	
					<?php
					$i=1;						
					while ($i <= $_SESSION['contado']){
										?>
									<tr>
									
										 <?php if ($_SESSION['codigo'.$i]<=0){} else{?><td> <?php echo $_SESSION['codigo'.$i];?></td> <?php } ?> 
										  <?php if ($_SESSION['codigo'.$i]<=0){} else{?><td> <?php echo $_SESSION['nombreProducto'.$i];?></td><?php }  ?> 
										  <?php if ($_SESSION['codigo'.$i]<=0){} else{?><td><?php echo $_SESSION['cantidad'.$i];?></td> <?php }  ?> 
										  <?php  if ($_SESSION['codigo'.$i]<=0){} else{?><td><?php echo $_SESSION['Entidad'.$i];?> </td> <?php } ?> 
										  <?php if ($_SESSION['codigo'.$i]<=0){} else{?> <td> <?php echo $_SESSION['descripPromocion'.$i];?> <?php } ?> </td>
										<?php if ($_SESSION['codigo'.$i]<=0){} else{?><td> <a href='./AppCode/Eliminartable.php?id=<?php echo $_SESSION['nombreProducto'.$i]?>&com=<?php echo $i ?>' >Eliminar</a> <?php }  ?>
										<?php  $i++;
									} ?>
									</tr>					
				</table>
			</div>
			</div>
			<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				
				
			</div>
			</div>
			<div class="">	
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<h3>Notas: </h3>
				<div class="form-group">
					<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Notas"></textarea>
				</div>
				<br>
				<div class="form-group">
					
					<input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="Guardar Nota" class="btn btn-success submit_btn invoice-save-btm">						
								
				</div>
				
			</div>

			</div>
			<div class="clearfix"></div>		      	
			</div>
			
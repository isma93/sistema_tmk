<?php
//**BACKEND***********************************************************************************
session_start();
$codigo_empleado=$_SESSION['codigo_empleado'];
include('../../include/config.inc');
include ('./db/Viewer.php');

//**BACKEND***********************************************************************************
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Products Dashboard UI</title>

<!-- Popper JS -->
<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://cdn.usebootstrap.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.usebootstrap.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Latest compiled JavaScript -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../../css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!--Toast -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!--Ajax-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

  <div class="app-content">
    <div class="app-content-header">
      
      <h1 class="app-content-headerText">Productos</h1>
     
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <span>ㅤ</span>
      <button class="app-content-headerButton">Nuevo Producto</button>
    <span>ㅤ</span>
      <button onclick="Existencia()" class="app-content-headerButton">Existencias</button>
    </div>

    <!--------------------------------------------------FILTER---------------------------------------------->
    <div class="app-content-actions">
      <input id="filtrar" class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div id="filterid" class="filter-menu">

            <label>Sucursales</label>
                <select id="empleado_sucursal" class="form-control" data-live-search="true">
                <option id="1">TODOS</option> 
                    <?php for ($i = 1; $i < $i_tbl_empleado_sucursal; $i++) 
                            {

                            echo '<option value="'.$i.'">'.$_SESSION['tbl_empleado_sucursal_nombre_sucursal'.(String)$i].'</option>';
                            }         
                    ?>
                </select>

            <label>Categorias</label>
            <select id="categorias"class="form-control" data-live-search="true">
            <option id="1">TODOS</option> 
                    <?php for ($i = 1; $i < $i_tbl_categoria; $i++) 
                            {

                            echo '<option value="'.$i.'">'.$_SESSION['tbl_sucursales_nombre_categoria'.(String)$i].'</option>';
                            }         
                    ?>
            </select>

            <label>Marcas</label>
            <select id="marca" class="form-control" data-live-search="true">
            <option id="1">TODOS</option> 
                        <?php for ($i = 1; $i < $i_tbl_marca; $i++) 
                                {

                                echo '<option value="'.$i.'">'.$_SESSION['tbl_marca_nombre_marca'.(String)$i].'</option>';
                                }         
                        ?>
                </select>
            <label>Stock</label>
            <select id="cmbstock">
            <option id="1">TODOS</option> 
              <option value="2">Con existencias</option>
              <option value="3">Poca Existencias</option>
            </select>
            <div class="filter-menu-buttons">
              <button onclick="reset();" class="filter-button reset">
                Reset
              </button>
              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
        <span>ㅤ</span>
        <button class="search-bar" title="Exportar excel"><span>Exportar excel</span></button>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
        
      </div>
    </div>

    <!--------------------------------------------------FILTER END---------------------------------------------->
        <form>
      <div class="form-row">
        <div class="form-group col-md-6">
        <h2 class="app-content-headerText">Seleccione un producto</h2>
        <select disabled id="SelectProduct"class="form-control" data-live-search="true">
        <option value="0" selected>Selecciona...</option>  
                 <?php for ($i = 1; $i < $i_tbl_producto; $i++) 
                        {

                        echo '<option value="'.$i.'">'.$_SESSION['tbl_producto_nombre_producto'.(String)$i].'</option>';
                        }         
                 ?>
          </select>
        </div>
        <div class="form-group col-md-2">
        <h2 class="app-content-headerText">Stock disponible</h2>
          <input readonly type="text" class="form-control" id="stockdisponible">
        </div>
        <div class="form-group col-md-2">
        <h2 class="app-content-headerText">Stock Asignado</h2>
          <input type="text" class="form-control" id="txtasignado">
        </div>
        <div class="form-group col-md-1">
        <h2 class="app-content-headerText">___________</h2>
          <input readonly onclick="MaximoStock()" type="" value="Max" class="btn btn-info" id="stockasignado">
        </div>
      </div>
     
      
      <div class="form-row">
      <div class="form-group col-md-2">
        <h2 class="app-content-headerText">N° Documento</h2>
          <input type="text" class="form-control" id="txtdocumento">
        </div>
        <div class="form-group col-md-4">
        <h2 class="app-content-headerText">Seleccione bodega de envio</h2>
        <select disabled id="Selectenvio" class="form-control" data-live-search="true">
        <option value="0" selected>Selecciona...</option>
          <?php  for ($x = 1; $x < $i_tbl_sucursal; $x++) 
                 {

                 echo '<option value='.$x.'>'.$_SESSION['tbl_sucursales_nombre_sucursal'.(String)$x].'</option>';
                 }
          ?>
          </select>
        </div>
        <div class="form-group col-md-4">
        <h2 class="app-content-headerText">Seleccione bodega de destino</h2>
        <select id="Selectdestino"class="form-control" data-live-search="true">
        <option value="0" selected>Selecciona...</option>
      
          <?php  for ($x = 1; $x < $i_tbl_sucursal; $x++) 
                 {

                 echo '<option value='.$x.'>'.$_SESSION['tbl_sucursales_nombre_sucursal'.(String)$x].'</option>';
                 }
          ?>
        </select>
        </div>
        <div class="form-group col-md-1">
        <h2 class="app-content-headerText">___________</h2>
          <input readonly type="" onclick="ValidarStock()" value="Realizar asignación" class="btn btn-info" id="realizar">
        </div>
      </div>
    </form>




    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell ">
          Items
          <button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button>
        </div>
        <div class="product-cell ">Categorias<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
       
        <div class="product-cell ">Marca<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Stock<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Precio<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Bodega<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Status<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Selección<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
      </div>


   
      <!--Table Layout------------------------------------------------->
      <div class="buscars">
       <?php
      
      //.......................................
       for ($i = 1; $i < $i_tbl_producto; $i++) {
            echo '<h5>';
            echo '<div class="products-row">'; 
            echo '<div class="product-cell image" style="flex-direction: row;">';        
            echo  '<img src="../images/path_proc/'.$_SESSION['tbl_producto_imagen'.(String)$i].'">';
            echo   '<span id="nameproducto'.(String)$i.'"> '.$_SESSION['tbl_producto_nombre_producto'.(String)$i].'</span>';
          echo '</div>';
            echo '<div class="product-cell "><span class="cell-label">Categorias:</span>'.$_SESSION['tbl_producto_nombre_categoria'.(String)$i].'</div>';
            echo '<div class="product-cell "><span class="cell-label">Marca:</span>'.$_SESSION['tbl_producto_nombre_marca'.(String)$i].'</div>';
            echo '<div class="product-cell "><span id="stock'.(String)$i.'" >'.$_SESSION['tbl_producto_existencias'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span class="cell-label">Precio:</span>$ '.$_SESSION['tbl_producto_precio_sin_iva'.(String)$i].'</div>';
            echo '<div class="product-cell "><span id="envio'.$i.'">'.$_SESSION['tbl_producto_nombre_sucursal'.(String)$i].'</div>';
            echo '<div class="product-cell ">';
            echo '<span class="cell-label">Status:</span>';
           if ($_SESSION['tbl_producto_existencias'.(String)$i]>5){echo '<span class="status active">Con Existencias</span> <!--status disabled-->';}
           else {echo '<span class="status disabled">Poca existencias</span> <!--status disabled-->';} 
            
            echo '</div>';
            echo '<div class="product-cell ">';
            echo '<span class="cell-label">Status:</span>';
            
        
            echo '<span class="status disabled"> <input onclick="SeleccionProducto('.$i.')" readonly type="submit" class="btn btn-info" id="'.$i.'" value="Seleccionar"></span> <!--status disabled-->';
            echo '</div>';
            echo '</div>';
            echo '</h5>';
       }   
        ?>
    </div>
   
    <!--Table Layout------------------------------------------------->
<!-- partial -->
<!--search and filter-->
  <script  src="../../script.js"></script>
  <script  src="../../scripts/Toast.js"></script>
  <script  src="../../scripts/searchbootstrap.js"></script>
  <script  src="../../scripts/searchfilter.js"></script>
  <script  src="../../scripts/editarexistencia.js"></script>

  <script>
  function SeleccionProducto(mid)
  {
    //conecto mi input
    var stock = document.getElementById("stockdisponible");
   
    //busco mi stock en el grid
    
   var sto= document.getElementById("stock"+mid);
   var mystockgrid= sto.innerHTML;
   var mysendbox= document.getElementById("envio"+mid).innerHTML;
   var Selectenvio= document.getElementById("Selectenvio");
   //debugger
    console.log(mystockgrid);
  //asigno el stock al input
    stock.value=mystockgrid;

   
    // Valores numéricos
    document.querySelector('#SelectProduct').value = mid;
    
    for(var i=1;i<Selectenvio.length;i++)
    {
      if(Selectenvio.options[i].text==mysendbox)
      {
        // seleccionamos el valor que coincide
        Selectenvio.selectedIndex=i;
      }
    }
 
  }

  function MaximoStock()
  {
    //conecto mi input
    var stock = document.getElementById("stockdisponible").value;
  
  
   var mystock= document.getElementById("txtasignado");
   
  //asigno el stock al input

   mystock.value=stock;
    
     
  }

  function ValidarStock()
    {
      
      var comboproducto = document.getElementById("SelectProduct");
      var selectedproduct = comboproducto.options[comboproducto.selectedIndex].value;
     
      var comboenvio = document.getElementById("Selectenvio");
      var selectedenvio = comboenvio.options[comboenvio.selectedIndex].value;
      
      var combodestino = document.getElementById("Selectdestino");
      var selectedestino = combodestino.options[combodestino.selectedIndex].value;

      var stockdisponible = document.getElementById("stockdisponible").value;
      var txtdocumento = document.getElementById("txtdocumento").value;
      var txtasignado = document.getElementById("txtasignado").value;
      
      var sesioncode="tbl_producto_id_producto"+selectedproduct;
      var sesionenvio= "tbl_sucursales_id_sucursal"+selectedenvio;
      var sesiondestino= "tbl_sucursales_id_sucursal"+selectedestino;
      

      if (ValidacionHelper(stockdisponible,txtasignado,txtdocumento,selectedestino,selectedenvio,selectedproduct))
      {
     
        update_tbl_stock(stockdisponible,txtasignado,txtdocumento,sesiondestino,sesionenvio,sesioncode,"update_tbl_stock");
      }
    }
    function ValidacionHelper(stockdisponible,txtasignado,txtdocumento,selectedestino,selectedenvio,selectedproduct)
    {
      var max, cant;
      max= parseFloat(stockdisponible);
      cant= parseFloat(txtasignado);
      if (cant>max||txtasignado===""||cant<=0)
      {
          warningtoast("El nivel de stock es mas bajo que tu cantidad asignada a destino!");
          return false;
      }
      else
         {
                if (txtdocumento===""||selectedproduct==="0"||selectedestino<2||selectedenvio<2||selectedenvio===selectedestino)
                {
                  warningtoast("Algo ha salido mal, porfavor verifique que ha seleccionado todos los campos Error#A1!");
                  return false;
                 
                }
                else
                {
                  
                  return true;
                  
                }
               
        }  
        return false;      
        
    }

     //-------------------BACKEND-------------------------------------------------------------------------------------------
     function update_tbl_stock(stockdisponible,txtasignado,txtdocumento,sesiondestino,sesionenvio,sesioncode, Method) {
        
        var parametros = {"stockdisponible":stockdisponible,"txtasignado":txtasignado,"txtdocumento":txtdocumento,"sesiondestino":sesiondestino,"sesionenvio":sesionenvio,"sesioncode":sesioncode,"Method":Method};
    $.ajax({
        data:parametros,
        url:'../appcode/db/PhpServices.php',
        type: 'post',
        error: function(xhr, status, errorThrown) {
        alert('Disculpe, existió un problema');
        dangertoast("Error exepción no controlada contacte con soporte tecnico Error#db1 Existencias");
        var senmsg= document.getElementById("realizar");
         senmsg.value = "Realizar asignación";
          senmsg.removeAttribute("disabled");
         },
        beforeSend: function () {
          var senmsg= document.getElementById("realizar");
          senmsg.value = "Cargando..";
          senmsg.setAttribute("disabled",true);
        },
        success: function (response) {  
          alert(response); 
          successtoast("Se ha actualizado el inventario correctamente");
          var senmsg= document.getElementById("realizar");
          senmsg.value = "Realizar asignación";
          senmsg.removeAttribute("disabled");
          setTimeout('document.location.reload()',2000);
          
        }
    });
    }

    
    

    //-------------END BACKEND------------------------------------------------------------------------------------------------
    

  </script>

</body>
</html>



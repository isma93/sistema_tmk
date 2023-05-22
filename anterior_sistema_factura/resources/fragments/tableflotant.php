<?php
//**BACKEND***********************************************************************************
session_start();
$codigo_empleado=$_SESSION['codigo_empleado'];
include('../../include/config.inc');
include ('../appcode/db/Viewer.php');

//**BACKEND***********************************************************************************
?>
<head>
<link rel="stylesheet" href="../../css/tableflotant.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

<!-- Table css ---------------------------------------------------------->
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

<!-- end Table css ---------------------------------------------------------->

</head>
<body>
<div class="button">
  <button><span>Click Me</span></button>
</div>
<!--FORM POP UP ******************************************************************************************************-->
<div class="pop-up">
  <div class="content">    
      <span  class="close" style="top:1%; color:white;">X</span>
        <br>
        
        <!--------------------------------------------------FILTER---------------------------------------------->
        <div class="app-content-actions">
         <input id="filtrar" class="search-bar" placeholder="Search..." type="text"> 
            <div class="app-content-actions-wrapper">
                <div class="filter-button-wrapper">
                    <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
                    <div style="right:0px" id="filterid" class="filter-menu">

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
      
      </div>
    </div>

    <!--------------------------------------------------FILTER END---------------------------------------------->
      
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
            echo '<div class="product-cell image">';        
            echo  '<img src="../images/path_proc/'.$_SESSION['tbl_producto_imagen'.(String)$i].'">';
            echo   '<span id="nameproducto'.(String)$i.'"> '.$_SESSION['tbl_producto_nombre_producto'.(String)$i].'</span>';
          echo '</div>';
            echo '<div class="product-cell "><span class="cell-label">Categorias:</span>'.$_SESSION['tbl_producto_nombre_categoria'.(String)$i].'</div>';
            echo '<div class="product-cell "><span class="cell-label">Marca:</span>'.$_SESSION['tbl_producto_nombre_marca'.(String)$i].'</div>';
            echo '<div class="product-cell "><span id="stock'.(String)$i.'" >'.$_SESSION['tbl_producto_existencias'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span class="cell-label">Precio:</span>$ '.$_SESSION['tbl_producto_precio_venta'.(String)$i].'</div>';
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
      </div>
    </div>
  </div>
</div>
<!--FORM POP UP ******************************************************************************************************-->

<script src="../../scripts/tableflotant.js"></script> 
<!--search and filter-->
<script  src="../../script.js"></script>
  <script  src="../../scripts/Toast.js"></script>
  <script  src="../../scripts/searchbootstrap.js"></script>
  <script  src="../../scripts/searchfilter.js"></script>
  <script  src="../../scripts/editarexistencia.js"></script>

</body>
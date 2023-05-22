<?php
//**BACKEND***********************************************************************************
session_start();
include('../include/config.inc');
include ('../resources/appcode/db/Viewer.php');
//**BACKEND***********************************************************************************
?>
    <!--DOM.ini Web client hiperlinks------------------------------------------------->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Products Dashboard UI</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://cdn.usebootstrap.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.usebootstrap.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!--Awensome icon-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--Toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!--Ajax-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
    <!--END DOM.ini Web client hiperlinks------------------------------------------------->
<body>
     <!--Header filter button------------------------------------------------->
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
      <button onclick="ListarProducto()" class="app-content-headerButton">Nuevo Producto</button>
    <span>ㅤ</span>
      <button onclick="Existencia()" class="app-content-headerButton">Existencias</button>
    </div>
    <div class="app-content-actions">
      <input id="filtrar" class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Category</label>
            <select>
              <option>All Categories</option>
              <option>Furniture</option>                     <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
            <label>Status</label>
            <select>
              <option>All Status</option>
              <option>Active</option>
              <option>Disabled</option>
            </select>
            <div class="filter-menu-buttons">
              <button class="filter-button reset">
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

     <!--HEADER Table Layout------------------------------------------------->
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell image">
          Items
          <button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button>
        </div>
        <div class="product-cell ">Codigo Producto<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
        <div class="product-cell ">Categorias<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
       
        <div class="product-cell ">Marca<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Stock<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Precio neto<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Precio IVA<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Bodega<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Status<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
          <div class="product-cell ">Edición<button class="sort-button">
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
            echo '<div style="flex-direction: row;" class="product-cell image">';        
            echo  '<img src="../resources/images/path_proc/'.$_SESSION['tbl_producto_imagen'.(String)$i].'">';
            echo   '<span id="nameproducto'.(String)$i.'"> '.$_SESSION['tbl_producto_nombre_producto'.(String)$i].'</span>';
            echo '</div>';
            echo '<div class="product-cell  " style="justify-content:center;"><span  id="idproducto'.(String)$i.'" >'.$_SESSION['tbl_producto_id_producto'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span id="categoria'.(String)$i.'" >'.$_SESSION['tbl_producto_nombre_categoria'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span id="marca'.(String)$i.'" >'.$_SESSION['tbl_producto_nombre_marca'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span id="stock'.(String)$i.'" >'.$_SESSION['tbl_producto_existencias'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span onkeypress="return valideKey(event);" id="precio'.(String)$i.'"> $ '.$_SESSION['tbl_producto_precio_sin_iva'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span onkeypress="return valideKey(event);" id="precioiva'.(String)$i.'"> $ '.$_SESSION['tbl_producto_precio_con_iva'.(String)$i].'</span></div>';
            echo '<div class="product-cell "><span id="bodega'.$i.'">'.$_SESSION['tbl_producto_nombre_sucursal'.(String)$i].'</div>';
            echo '<div class="product-cell ">';
            echo '<span class="cell-label">Status:</span>';
           if ($_SESSION['tbl_producto_existencias'.(String)$i]>5){echo '<span class="status active">Con Existencias</span> <!--status disabled-->';}
           else {echo '<span class="status disabled">Poca existencias</span> <!--status disabled-->';} 
            
            echo '</div>';
            echo '<div class="product-cell ">';
            echo '<span class="cell-label">Status:</span>';
            
        
            echo '<span class="product-cell"> <a onclick="EditarProducto('.$i.')" readonly type="submit" class="btn btn-info" id="Editar'.$i.'"><i id="botoneditar'.$i.'" class="fa fa-edit"></i></a></span> <!--status disabled-->';
           echo '</div>';
            echo '</div>';
            echo '</h5>';
       }   
        ?>
    </div>
   
    <!--Table Layout------------------------------------------------->
   
<!-- partial -->
<!--search and filter Javascript JSQUERY FROM Ajax developer-->
  <script  src="../script.js"></script>
  <script  src="../scripts/searchbootstrap.js"></script>
  <script  src="../scripts/editarexistencia.js"></script>
  <script  src="../scripts/Toast.js"></script>
  <script  src="../scripts/validarnumeros.js"></script>
  

  <script>  
       
       function ListarProducto()
    {
      var ruta="./Static/Compra.php";
      var iframe = parent.document.getElementById("Myframe");
      iframe.setAttribute("src", ruta);
    }
  
   function Existencia()
    {
      var ruta="./resources/appcode/Existencias.php";
      var iframe = parent.document.getElementById("Myframe");
      iframe.setAttribute("src", ruta);
    }
   function EditarProducto (id) 
   {
      var idproducto = "idproducto"+id;
       var buttonborder = "Editar"+id;
       var button = "botoneditar"+id;
      var myname = "nameproducto"+id;
      var mycategory = "categoria"+id;
      var mybox = "bodega"+id;
      var myprice = "precio"+id;
      var mystock = "stock"+id;
      var mymark = "marca"+id;
      var divObject1 = document.getElementById (myname);
      var divObject2 = document.getElementById (mycategory);
      var divObject3 = document.getElementById (mybox);
      var divObject4 = document.getElementById (myprice);
      var divObject5 = document.getElementById (mymark);
      var divObject6 = document.getElementById (mystock);
      var divObject7 = document.getElementById (idproducto);
      var divbutton = document.getElementById (button);
      var divbuttonborder = document.getElementById (buttonborder);
      divObject1.contentEditable = "true";
      //divObject2.contentEditable = "true";
      //divObject3.contentEditable = "true";
      divObject4.contentEditable = "true";
      //divObject5.contentEditable = "true";

     divObject1.style.color="yellow";
     divObject2.style.color="yellow";
     divObject3.style.color="yellow";
     divObject4.style.color="yellow";
     divObject5.style.color="yellow";
     divObject6.style.color="yellow";
     divObject7.style.color="yellow";
      //obtener nombre producto
     var nombreproducto= divObject1.innerHTML;
     var precio= divObject4.innerHTML;
     var myidproduct= divObject7.innerHTML;

     
      divbutton.setAttribute("class", "fa fa-save");
      divbuttonborder.setAttribute("class", "btn btn-danger");
      divbuttonborder.setAttribute("onclick", "SaveProducto("+id+")");
      warningtoast("Has iniciado en modo edición de producto!"+name);    
    }

    function SaveProducto(id)
    {
      var idproducto = "idproducto"+id;
      var buttonborder = "Editar"+id;
       var button = "botoneditar"+id;
      var myname = "nameproducto"+id;
      var mycategory = "categoria"+id;
      var mybox = "bodega"+id;
      var myprice = "precio"+id;
      var mystock = "stock"+id;
      var mymark = "marca"+id;
      var divObject1 = document.getElementById (myname);
      var divObject2 = document.getElementById (mycategory);
      var divObject3 = document.getElementById (mybox);
      var divObject4 = document.getElementById (myprice);
      var divObject5 = document.getElementById (mymark);
      var divObject6 = document.getElementById (mystock);
      var divObject7 = document.getElementById (idproducto);
      var divbutton = document.getElementById (button);
      var divbuttonborder = document.getElementById (buttonborder);
      divObject1.contentEditable = "false";
      divObject2.contentEditable = "false";
      divObject3.contentEditable = "false";
      divObject4.contentEditable = "false";
      divObject5.contentEditable = "false";
      divObject7.contentEditable = "false";
      divObject1.style.color="white";
     divObject2.style.color="white";
     divObject3.style.color="white";
     divObject4.style.color="white";
     divObject5.style.color="white";
     divObject6.style.color="white";
     divObject7.style.color="white";
       //obtener nombre producto
       var nombreproducto= divObject1.innerHTML;
       var precio= divObject4.innerHTML;
       var myidproduct= divObject7.innerHTML;
       precio = precio.replace('$', '');
       precio = precio.replace(' ', '');
   
      divbutton.setAttribute("class", "fa fa-edit");
      divbuttonborder.setAttribute("class", "btn btn-info");
      divbuttonborder.setAttribute("onclick", "EditarProducto("+id+")");
       
      update_products(myidproduct,nombreproducto,precio,id,"update_products");
    }



    //-------------------BACKEND-------------------------------------------------------------------------------------------
    function update_products(myidproduct,nombreproducto,precio,id,Method) {
      var buttonborder = "Editar"+id;
      var divbuttonborder = document.getElementById (buttonborder);
        var parametros = {"myidproduct":myidproduct,"id":id,"nombreproducto":nombreproducto,"precio":precio,"Method":Method};
    $.ajax({
        data:parametros,
        url:'../resources/appcode/db/PhpServices.php',
        type: 'post',
        error: function(xhr, status, errorThrown) {
        alert('Disculpe, existió un problema');
        dangertoast("Error exepción no controlada contacte con soporte tecnico Error#db1 Actualizar Productos");
        var senmsg= divbuttonborder;
         senmsg.value = "Realizar asignación";
          senmsg.removeAttribute("disabled");
         },
        beforeSend: function () {
          var senmsg= divbuttonborder;
          senmsg.value = "Cargando..";
          senmsg.setAttribute("disabled",true);
        },
        success: function (response) {  
          var respo= response;
          alert(respo); 
          successtoast("Se ha actualizado el inventario correctamente");
          var senmsg= divbuttonborder;
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



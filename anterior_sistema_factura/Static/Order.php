<?php
//**BACKEND***********************************************************************************
session_start();
include('../include/config.inc');
include('../resources/appcode/db/Viewer.php');
$Percepcion = $_SESSION['tbl_setting_PERCEPCION'];
$Iva = $_SESSION['tbl_setting_VAR_IVA'];
$Iva = $_SESSION['tbl_setting_VAR_IVA'];
$SUCURSAL=$_SESSION['id_sucursal'];
//las variables son asignadas en JS
echo "<script>
        iva = $Iva;
        percepcion = $Percepcion;
        txtid_sucursal = $SUCURSAL;
    
      </script>";
//**BACKEND***********************************************************************************
?>
<!--DOM.ini Web client hiperlinks------------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - Products Dashboard UI</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/tableflotant.css">
  <link rel="stylesheet" href="../css/ContentOrden.css">
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

      <h1 class="app-content-headerText">Ordenes</h1>

      <button onclick="tablecolor()" class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <!-- la clase button despliega el pop up-------------------------------------------------------------------->
      <span>ㅤ</span>
      <button onclick="desplegarpop()" class="app-content-headerButton">Agregar Producto a la Orden (insert)</button>
        <!-- <span>ㅤ</span>
        <button onclick="" class="app-content-headerButton">Existencias</button> -->
    </div>
    <div class="app-content-actions">
      <input id="filtro" class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">

        <span>ㅤ</span>
        <button class="search-bar" title="Exportar excel"><span>Exportar excel</span></button>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
            <line x1="8" y1="6" x2="21" y2="6" />
            <line x1="8" y1="12" x2="21" y2="12" />
            <line x1="8" y1="18" x2="21" y2="18" />
            <line x1="3" y1="6" x2="3.01" y2="6" />
            <line x1="3" y1="12" x2="3.01" y2="12" />
            <line x1="3" y1="18" x2="3.01" y2="18" />
          </svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
            <rect x="3" y="3" width="7" height="7" />
            <rect x="14" y="3" width="7" height="7" />
            <rect x="14" y="14" width="7" height="7" />
            <rect x="3" y="14" width="7" height="7" />
          </svg>
        </button>

      </div>
    </div>
    <div class="bordes_botones_derechos">
        <div class="Group_botones_derechos">
          <a onclick="recorrido_tabla();" type="submit" class="tn bg-warning btn-lg btn-block" id="btn_facturar">
            <h4 class="themelight"><i onclick="" id="" class="fa fa-shopping-cart"></i> Facturar F2</h5>
          </a></span>
          <a onclick="Limpiar();" readonly type="submit" class="tn btn-danger btn-lg btn-block" id="">
            <h4 class="themelight"><i id="" class="fa fa-trash"> </i> Limpiar</h5>
          </a></span>
          <br>
 
          <select id="Select_de_serie" class="form-control" data-live-search="true">
          <option value="0" selected>Selecciona...</option>
            <?php  for ($x = 1; $x < $i_tbl_series_documento; $x++) 
                  {
                    if ($_SESSION['tbl_serie_predeterminada']==$_SESSION['tbl_serie_documento'.(String)$x])
                    {
                      echo '<option selected value='.$_SESSION['tbl_id_serie'.(String)$x].'>'.$_SESSION['tbl_serie_documento'.(String)$x].'</option>';
                    }else
                    {
                      echo '<option value='.$_SESSION['tbl_id_serie'.(String)$x].'>'.$_SESSION['tbl_serie_documento'.(String)$x].'</option>';
                    }
                  
                  }
            ?>
            </select>
           <br>
              <input readonly type="text" placeholder="SUCURSAL" class="form-control" id="txtSelectSurcusal">
                  
       
        </div>
    </div>
    <div style="" class="Grid_de_Ordenes">
      <!--HEADER Table Layout------------------------------------------------->
      <div class="products-area-wrapper tableView">
        <div class="products-header">
          <div class="product-cell ">
            Items
            <button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button>
          </div>
          <div class="product-cell ">
            <center>Codigo Producto</center><button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button>
          </div>
          <div class="product-cell ">Cantidad<button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button></div>

          <div class="product-cell ">IVA<button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button></div>
          <div class="product-cell ">Stock<button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button></div>
          <div class="product-cell ">Precio neto<button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button></div>
            <div class="product-cell ">Precio IVA<button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button></div>
          <div class="product-cell ">Bodega<button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button></div>

          <div class="product-cell  ">Edición<button class="sort-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
              </svg>
            </button></div>
        </div>

        <!--Table Layout------------------------------------------------->

        <div id="insert" class="buscars">
          <!--tbl de facturacion -->

        </div>
      </div>
    </div>
    <div class="grupo_totales">
      <!--Table Layout------------------------------------------------->



      <!-- TBL TOTALES --------------------------------------------------------------------->
      <div class="themelight">
        <table id="tablecolor"  style="font-size: 25px;font-weight: bold; border: grey 5px solid; border-style: ridge;" class="table table-striped table-dark">
          <thead>
            <tr>
            </tr>
          </thead>
          <tbody>
            <tr> 
              <td colspan="3">IVA</td>
           
              <td id="txt_total_iva">00.00</td>
            </tr>
            <tr >
              <td colspan="3" >Subtotal</td>
        
              <td id="txt_subtotal">00.00</td>
            </tr>
            <tr>
              <td colspan="3">Total</td>
        
              <td id="txt_total">00.00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- partial -->

      <!-- /TBL TOTALES --------------------------------------------------------------------->

    <script>
      //iterador de tabla Cambiar attr conforme tema
      iterador = 0;
      var contador_de_tabla=0;

      function tablecolor() {

        var color = document.getElementById("tablecolor");
        if (color.className === "table table-dark") {
          color.setAttribute("class", "table table-bordered");
        } else {
          color.setAttribute("class", "table table-dark");
        }


      }

      var key_fact = false;
      function recorrido_tabla()
      {
        
        if (parseInt(contador_de_tabla)>=1){
        for (let index = 1; index <= contador_de_tabla; index++) 
        {
          var tmpid = document.getElementById('tbl_idproducto'+index).innerHTML;
          var tmpname = document.getElementById('tbl_nameproducto'+index).innerHTML;
          var tmpbodega= document.getElementById('tbl_producto_id_sucursal'+index).innerHTML;
          var tmpprecio= document.getElementById('tbl_precio'+index).innerHTML;
          var tmpcantidad = document.getElementById('tbl_cantidad'+index).innerHTML;
          var tmpprecioiva= document.getElementById('tbl_precioiva'+index).innerHTML;
          var tmpstock= document.getElementById('tbl_stock'+index).innerHTML;

            if (parseFloat(tmpstock) < parseFloat(tmpcantidad))
            {
              alert("Nivel de inventario demasiado bajo.");
              key_fact=false;
              index = contador_de_tabla+1;
            } else 
            {
              key_fact= true;
            }


      /*     alert(tmpid);
          alert(tmpname);
          alert(tmpbodega);
          alert(tmpprecio);
          alert(tmpcantidad);
          alert(tmpprecioiva); */

        }
        if (key_fact)
        {
         
          var cmbserie = document.getElementById("Select_de_serie");
          var txtid_serie = cmbserie.options[cmbserie.selectedIndex].value;
          Select_Ult_Nota(txtid_serie, txtid_sucursal, 'select_documentos');
         
        }
      }

      }


      function Existencia() {
        var ruta = "./resources/appcode/Existencias.php";
        var iframe = parent.document.getElementById("Myframe");
        iframe.setAttribute("src", ruta);
      }

      function Limpiar() {
        try{
          if (parseInt(contador_de_tabla)>=1)
        {
          for (let index = 1; index <= contador_de_tabla; index++) 
          {
          $('#grid_de_limpieza'+index).remove();
          }
        }
        v1=0;v2=0;v3=0;
        cal_iva_total = document.getElementById('txt_total_iva').innerHTML=currency(v1);
        cal_subtotal = document.getElementById('txt_subtotal').innerHTML=currency(v2);
        cal_total = document.getElementById('txt_total').innerHTML=currency(v3);
        contador_de_tabla=0;
        iterador=0;
        
        } 
        catch (error) {
        console.error(error);
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
          }
      }
      
      


      document.addEventListener("keydown", event => {
        if (event.keyCode == 120) {

          //Tecla f9
          EditarProducto(contador_de_tabla);
          var ct = document.querySelector("#tbl_cantidad"+contador_de_tabla);
       
        
          ct.innerHTML="";
          ct.focus();
       /*    const range = document.createRange();
          range.selectNode(ct);
          window.getSelection().removeAllRanges();
          window.getSelection().addRange(range);
          range.deleteContents(); */

          /* // Obtener la selección actual
            var selection = window.getSelection();

            // Si hay al menos un rango de selección, borrarlo
            if (selection.rangeCount > 0) {
              var range = selection.getRangeAt(0);
              range.deleteContents();
            } */
           

       /*     // Crear un nuevo objeto KeyboardEvent con el keyCode de la tecla "suprimir"
          var event = new KeyboardEvent('keydown', { 'keyCode': 46 });

          // Llamar a la función dispatchEvent en el elemento
          ct.dispatchEvent(event); */
         
          

        }
      });

     

      document.addEventListener("keydown", event => {
        if (event.keyCode == 13) {
          var ct = document.querySelector("#tbl_cantidad"+contador_de_tabla);
       
        
       if(ct.innerHTML!="")
       {
        //Tecla enter
        SaveProducto(contador_de_tabla);
       }
       else 
       {
        alert("Cantidad Vacia");
       }         

        }
      });


      document.addEventListener("keydown", event => {
        if (event.keyCode == 45) {
          desplegarpop(); 

        }
      });
      document.addEventListener("keydown", event => {
        if (event.keyCode == 115) {
          document.getElementById('filtrar').focus();
        }
      });

      document.addEventListener("keydown", event => {
        if (event.keyCode == 113) {
          recorrido_tabla();
        }
      });
      var responsesucursal="";
      function agregarFila(producto_imagen, producto_nombre_producto, producto_id_producto, cantidad_agregada,
        iva_prod, producto_existencias, producto_precio_venta,producto_precio_venta_con_iva, producto_nombre_sucursal,idbodega) {

        iterador++;
        document.getElementById('insert').innerHTML += '<h4 style="" id="grid_de_limpieza'+iterador+'"><div style="    border-bottom-style: groove;" class="products-row">' +
          '<div class="product-cell ">' +
          '<span id="tbl_nameproducto' + iterador + '">' + producto_nombre_producto + '</span>' +
          '</div>' +
          '<div class="product-cell " style="justify-content:center;"><span  id="tbl_idproducto' + iterador +
          '">' + producto_id_producto + '</span></div>' +
          '<div style="font-size: 16px;" class="product-cell "><span onkeypress="return valideKey(event);" id="tbl_cantidad' + iterador +
          '">' + cantidad_agregada + '</span></div>' +
          '<div class="product-cell "><span id="tbl_iva' + iterador + '" > ' + currency(iva_prod) + '</span></div>' +
          '<div class="product-cell "><span id="tbl_stock' + iterador + '" >' + producto_existencias +
          '</span></div>' +
          '<div class="product-cell "><span  id="tbl_precio' + iterador + '">  ' + currency(producto_precio_venta) +
          '</span></div>' +
          '<div class="product-cell "><span  id="tbl_precioiva' + iterador + '">  ' + producto_precio_venta_con_iva +
          '</span></div>' +
          '<div class="product-cell "><span id="tbl_producto_id_sucursal_nombre' + iterador + '">' + producto_nombre_sucursal +
          '</div>' +
          '<div class="product-cell ">' +
          
          '<span class="product-cell"> <a onclick="EditarProducto(' + iterador +
          ')" readonly type="submit" class="btn btn-info" id="Editar' + iterador + '"><i id="botoneditar' +
          iterador + '" class="fa fa-edit"></i></a></span> <!--status disabled-->' +
          '</div>' +
          '</div>' +
          '<div style="display:none;"class=""><span id="tbl_producto_id_sucursal' + iterador + '">' + idbodega +
          '</h4>';
          contador_de_tabla++;
          if (contador_de_tabla==1)
          {
            responsesucursal = document.getElementById('txtSelectSurcusal');
            responsesucursal.value =  producto_nombre_sucursal;
          }  
          SelectSucursalpopup =document.getElementById('empleado_sucursal');
          for(var i=1;i<SelectSucursalpopup.length;i++)
          {
            if(SelectSucursalpopup.options[i].text==responsesucursal.value)
            {
              // seleccionamos el valor que coincide
              
              SelectSucursalpopup.selectedIndex=i;
              filtrado_de_grid();
            }
          }
        cerrarpop();

      }
      function filtrado_de_grid(){
  
  var myS= $('#empleado_sucursal option').filter(':selected').text();
  
  if (myS==="TODOS")
  {
        var rex = new RegExp(myS, 'i');

        $('.buscars h5').show();

        
  }else{
        var rex = new RegExp(myS, 'i');

              $('.buscars h5').hide();

              $('.buscars h5').filter(function () {
              return rex.test($(this).text());
              }).show(); 
        }
}
      
  //-------------------BACKEND-------------------------------------------------------------------------------------------
  var ultm=""; 
      function llamarfactura()
      {
            var w = 500;
            var h = 500;
            var left = (screen.width / 2) - (w / 2);
            var top = (screen.height / 2) - (h / 2);
            var popupWindow = window.open('../resources/appcode/Factura/Factura.php?ftc='+(ultm)+'', 'popupWindow', 'height=' + h + ',width=' + w + ',left=' + left + ',top=' + top);
            if (window.focus) {
                popupWindow.focus();
            }
      }

      function Select_Ult_Nota(txtid_serie, txtid_sucursal, Method) {

        ftc_button = document.getElementById('btn_facturar');
        ftc_button.setAttribute("onclick",'');
       
        var parametros = {
          "txtid_serie": txtid_serie,
          "txtid_sucursal": txtid_sucursal,
          "Method": Method
        };
        $.ajax({
          data: parametros,
          url: '../resources/appcode/db/PhpServices.php',
          type: 'post',
          error: function(xhr, status, errorThrown) {
            alert('Disculpe, existió un problema');
            dangertoast(
              "Error exepción no controlada contacte con soporte tecnico Error#db1 Actualizar Productos"
            );
            ftc_button.setAttribute("onclick",'recorrido_tabla();');
            
          },
          beforeSend: function() {
            
         
            
          },
          success: function(response) {
         
            console.log(response); // Verificar la respuesta del servidor en la consola del navegador
            if (response==="min")
            {
              alert('Numero de serie minimo');
              ftc_button.setAttribute("onclick",'recorrido_tabla();');
              
            }
            else if (response==="max")
            {
              alert('Numero de serie max');
              ftc_button.setAttribute("onclick",'recorrido_tabla();');
           
            }
            else 
            {
                  // Asignar la respuesta a una variable en JS
                  successtoast("Se ha obtenido numero de facturacion...");
                  var cmbserie = document.getElementById("Select_de_serie");
                  var txt_nombre_serie = cmbserie.options[cmbserie.selectedIndex].innerHTML;
                  ultm = txt_nombre_serie+"-"+response;
                  Insert_header_fact(txt_nombre_serie,txtid_serie, txtid_sucursal, 'insert_tbl_factura');
    
            }
            
          }
        });
      }


      function Insert_header_fact(txt_nombre_serie,txtid_serie, txtid_sucursal, Method) {
       
       var parametros = {
        "txt_nombre_serie": txt_nombre_serie,
         "txtid_serie": txtid_serie,
         "txtid_sucursal": txtid_sucursal,
         "Method": Method
       };
       $.ajax({
         data: parametros,
         url: '../resources/appcode/db/PhpServices.php',
         type: 'post',
         error: function(xhr, status, errorThrown) {
           alert('Disculpe, existió un problema');
           dangertoast(
             "Error exepción no controlada contacte con soporte tecnico Error#db1 Actualizar Productos"
           );
           ftc_button.setAttribute("onclick",'recorrido_tabla();');
           
         },
         beforeSend: function() {
        
           
         },
         success: function(response) {
          
           successtoast("Facturado");
           //Limpiar();
           rows_detailts_insert(txt_nombre_serie, txtid_sucursal);
           ftc_button.setAttribute("onclick",'recorrido_tabla();');
           
          
         }
       });
     }

     function rows_detailts_insert(txt_nombre_serie, txtid_sucursal)
     {
      if (parseInt(contador_de_tabla)>=1){
        try{
        for (let index = 1; index <= contador_de_tabla; index++) 
        {
        
          txtimpuesto= document.getElementById('tbl_iva'+index).innerHTML ;
          txtunidades= document.getElementById('tbl_cantidad'+index).innerHTML;
          txtventaconiva= document.getElementById('tbl_precioiva'+index).innerHTML ;
          txtventasiniva= document.getElementById('tbl_precio'+index).innerHTML ;
          txtprecio= document.getElementById('tbl_precio'+index).innerHTML ;
          txtid_producto= document.getElementById('tbl_idproducto'+index).innerHTML ;
          txttbl_bodega= document.getElementById('tbl_producto_id_sucursal'+index).innerHTML ;
         // txtid_bodega= document.getElementById('tbl_producto_id_sucursal'+index).innerHTML ;
         txtid_bodega= txtid_sucursal ;
          
          Insert_details_fact(txtid_bodega,txt_nombre_serie,txtimpuesto,txtunidades, txtventaconiva,txtventasiniva,txtprecio,txtid_producto, 'insert_tbl_detalle_factura')
        }
         //JQUERY DE ENVIO FACTURA
         llamarfactura();
          ///////////////////////////////// 
        setTimeout('document.location.reload()',1000); //limpiar facturas, recargar stock
      } catch (error) {
        console.error(error);
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
          }

      }
     }
     function Insert_details_fact(txtid_bodega,txt_nombre_serie,txtimpuesto,txtunidades, txtventaconiva,txtventasiniva,txtprecio,txtid_producto, Method) {
      txtimpuesto = ParseSQL_Num(txtimpuesto);
      txtunidades = ParseSQL_Num(txtunidades);
      txtventaconiva = ParseSQL_Num(txtventaconiva);
      txtprecio = ParseSQL_Num(txtprecio);
      txtventasiniva = ParseSQL_Num(txtventasiniva);

    alert(txtid_bodega);
      
      var parametros = {
        "txtid_bodega": txtid_bodega,
        "txt_nombre_serie": txt_nombre_serie,
        "txtimpuesto": txtimpuesto,
        "txtunidades": txtunidades,
        "txtventaconiva": txtventaconiva,
        "txtventasiniva": txtventasiniva,
        "txtprecio": txtprecio,
        "txtid_producto": txtid_producto,
         "Method": Method
       };
       $.ajax({
         data: parametros,
         url: '../resources/appcode/db/PhpServices.php',
         type: 'post',
         error: function(xhr, status, errorThrown) {
           alert('Disculpe, existió un problema');
           dangertoast(
             "Error exepción no controlada contacte con soporte tecnico Error#db1 Actualizar Productos"
           );
           ftc_button.setAttribute("onclick",'recorrido_tabla();');
           
         },
         beforeSend: function() {
        
           
         },
         success: function(response) {
          console.log(response); // Verificar la respuesta del servidor en la consola del navegador
          var resultado = response; // Asignar la respuesta a una variable en JS
          // Hacer lo que necesites con la variable resultado aquí
           successtoast("Facturado con detalle");
          
          
         }
       });
     }
      //-------------END BACKEND------------------------------------------------------------------------------------------------
    </script>


    <!--FORM POP UP ******************************************************************************************************-->
    <div class="pop-up">
      <div class="content">
        <span onclick="cerrarpop()" class="close" style="top:1%; color:white;">X</span>
        <br>

        <!--------------------------------------------------FILTER---------------------------------------------->
        <div class="app-content-actions">
          <input id="filtrar" class="search-bar" placeholder="Search..." type="text">
          <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
              <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                  <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                </svg></button>
              <div style="right:0px" id="filterid" class="filter-menu">

                <label>Sucursales</label>
                <select id="empleado_sucursal" class="form-control" data-live-search="true">
                  <?php for ($i = 1; $i < $i_tbl_empleado_sucursal; $i++) {

                    echo '<option value="' . $i . '">' . $_SESSION['tbl_empleado_sucursal_nombre_sucursal' . (string)$i] . '</option>';
                  }
                  ?>
                </select>

                <label>Categorias</label>
                <select id="categorias" class="form-control" data-live-search="true">
                  <option id="1">TODOS</option>
                  <?php for ($i = 1; $i < $i_tbl_categoria; $i++) {

                    echo '<option value="' . $i . '">' . $_SESSION['tbl_sucursales_nombre_categoria' . (string)$i] . '</option>';
                  }
                  ?>
                </select>

                <label>Marcas</label>
                <select id="marca" class="form-control" data-live-search="true">
                  <option id="1">TODOS</option>
                  <?php for ($i = 1; $i < $i_tbl_marca; $i++) {

                    echo '<option value="' . $i . '">' . $_SESSION['tbl_marca_nombre_marca' . (string)$i] . '</option>';
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button>
            </div>
            <div class="product-cell ">Codigo Producto<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button></div>
            <div class="product-cell ">Categorias<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button></div>

            <div class="product-cell ">Marca<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button></div>
            <div class="product-cell ">Stock<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button></div>
            <div class="product-cell ">Precio neto<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg></div>
                <div class="product-cell ">Precio IVA<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button></div>
            <div class="product-cell ">Bodega<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button></div>
            <div class="product-cell ">Status<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
              </button></div>
            <div class="product-cell ">Selección<button class="sort-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z" />
                </svg>
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
              echo  '<span id="nameproducto' . (string)$i . '"> ' . $_SESSION['tbl_producto_nombre_producto' . (string)$i] . '</span>';
              echo '</div>';
              echo '<div class="product-cell " style="justify-content:center;"><span id="idproducto' . (string)$i . '" >' . $_SESSION['tbl_producto_id_producto' . (string)$i] . '</span></div>';
              echo '<div class="product-cell "><span id="categoria">' . $_SESSION['tbl_producto_nombre_categoria' . (string)$i] . '</span></div>';
              echo '<div class="product-cell "><span id="marca">' . $_SESSION['tbl_producto_nombre_marca' . (string)$i] . '</span></div>';
              echo '<div class="product-cell "><span id="stock' . (string)$i . '" >' . $_SESSION['tbl_producto_existencias' . (string)$i] . '</span></div>';
              echo '<div class="product-cell "><span id="precio' . $i . '">$' . $_SESSION['tbl_producto_precio_sin_iva' . (string)$i] . '</span> </div>';
              echo '<div class="product-cell "><span id="precioiva' . $i . '">$' . $_SESSION['tbl_producto_precio_con_iva' . (string)$i] . '</span> </div>';
              echo '<div class="product-cell "><span id="tmp_tbl_producto_id_sucursal' . $i . '">' . $_SESSION['tbl_producto_nombre_sucursal' . (string)$i] . '</div>';
              echo '<div class="product-cell ">';
              echo '<span class="cell-label">Status:</span>';
              if ($_SESSION['tbl_producto_existencias' . (string)$i] > 5) {
                echo '<span class="status active">Con Existencias</span> <!--status disabled-->';
              } else {
                echo '<span class="status disabled">Poca existencias</span> <!--status disabled-->';
              }
              echo '</div>';
              echo '<div class="product-cell ">';
              echo '<span class="cell-label">Status:</span>';
              echo '<span class="status disabled"> <input 
              style=" display: inline-block; font-weight: 1px; color: #fffff;text-align: center;vertical-align: middle;-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; background-color: transparent; border: 1px solid transparent; padding: -10.625rem .75; font-size: 9px;rem: ; line-height: 1.5; border-radius: 1.25rem; transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;" 
              onclick="SeleccionProducto(' . $i . ')" readonly type="submit" class="btn btn-info" id="' . $i . '" value="Seleccionar"></span> <!--status disabled-->';
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
  <!--search and filter Javascript JSQUERY FROM Ajax developer-->
  <script src="../scripts/Order_CurrencyFormat.js"></script> <!--Formato de moneda-->
  <script src="../scripts/Order_Calcular.js"></script> <!--Calculo de valores-->
  <script src="../scripts/Order_GridController.js"></script> <!--Area funcional de grid-->
  <script src="../script.js"></script> <!--Uso generico-->
  <script src="../scripts/searchbootstrap.js"></script> <!-- busqueda de tbl-->
  <script src="../scripts/editarexistencia.js"></script>  <!-- edicion de existencia-->
  <script src="../scripts/Toast.js"></script>  <!-- notificaciones-->
  <script src="../scripts/tableflotant.js"></script> <!-- responsive desing-->
  <script src="../scripts/validarnumeros.js"></script><!-- bloqueo de numeros en div o input-->
  <script src="../scripts/db/AjaxServices.js"></script><!-- Backend-->
  <script src="../scripts/searchfilter.js"></script> <!-- busqueda antigua funcional en caso de no usar bootstrap-->
  <script src="../scripts/searchbootstrap2bus.js"></script><!-- busqueda boot segunda tabla -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script> <!-- desuso por concurrencia-->
</body>

</html>
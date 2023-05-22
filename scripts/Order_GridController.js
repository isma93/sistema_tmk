
var tmp_cantidad=0; //sostiene el dato mientras actualiza cantidad

function EliminarProducto(id)
      {
        $('#grid_de_limpieza'+id).remove();

      }
      function EditarProducto(id) {

        //asign -------------------------------
        var idproducto = "tbl_idproducto" + id;
        var buttonborder = "Editar" + id;
        var button = "botoneditar" + id;
        var myname = "tbl_nameproducto" + id;
        var mycuantity = "tbl_cantidad" + id;
        var mybox = "tbl_producto_id_sucursal" + id;
        var myprice = "tbl_precio" + id;
        var mypriceiva = "tbl_precioiva" + id;
        var mystock = "tbl_stock" + id;
        var myiva = "tbl_iva" + id;
        var divObject1 = document.getElementById(myname);
        var divObject2 = document.getElementById(mycuantity);
        var divObject3 = document.getElementById(mybox);
        var divObject4 = document.getElementById(myprice);
        var divObject5 = document.getElementById(myiva);
        var divObject6 = document.getElementById(mystock);
        var divObject8 = document.getElementById(mypriceiva);
        var divObject7 = document.getElementById(idproducto);
        var divbutton = document.getElementById(button);
        var divbuttonborder = document.getElementById(buttonborder);
        divObject2.contentEditable = "true";
        divObject1.style.color = "yellow";
        divObject2.style.color = "yellow";
        divObject3.style.color = "yellow";
        divObject4.style.color = "yellow";
        divObject5.style.color = "yellow";
        divObject6.style.color = "yellow";
        divObject7.style.color = "yellow";
        divObject8.style.color = "yellow";
        //obtener nombre producto
        var nombreproducto = divObject1.innerHTML;
        tmp_cantidad = divObject2.innerHTML;
        var precio = divObject4.innerHTML;
        var myidproduct = divObject7.innerHTML;
        divbutton.setAttribute("class", "fa fa-save");
        divbuttonborder.setAttribute("class", "btn btn-danger");
        divbuttonborder.setAttribute("onclick", "SaveProducto(" + id + ")");
        warningtoast("Has iniciado en modo edición de producto!");
     
      }


      function SaveProducto(id) {
        var idproducto = "tbl_idproducto" + id;
        var buttonborder = "Editar" + id;
        var button = "botoneditar" + id;
        var myname = "tbl_nameproducto" + id;
        var mycuantity = "tbl_cantidad" + id;
        var mybox = "tbl_producto_id_sucursal" + id;
        var myprice = "tbl_precio" + id;
        var mypriceiva = "tbl_precioiva" + id;
        var mystock = "tbl_stock" + id;
        var myiva = "tbl_iva" + id;
        var divObject1 = document.getElementById(myname);
        var divObject2 = document.getElementById(mycuantity);
        var divObject3 = document.getElementById(mybox);
        var divObject4 = document.getElementById(myprice);
        var divObject5 = document.getElementById(myiva);
        var divObject6 = document.getElementById(mystock);
        var divObject8 = document.getElementById(mypriceiva);
        var divObject7 = document.getElementById(idproducto);
        var divbutton = document.getElementById(button);
        var divbuttonborder = document.getElementById(buttonborder);
       
        divObject1.contentEditable = "false";
        divObject2.contentEditable = "false";
        divObject3.contentEditable = "false";
        divObject4.contentEditable = "false";
        divObject5.contentEditable = "false";
        divObject7.contentEditable = "false";
        divObject8.contentEditable = "false";
        divObject1.style.color = "white";
        divObject2.style.color = "white";
        divObject3.style.color = "white";
        divObject4.style.color = "white";
        divObject5.style.color = "white";
        divObject6.style.color = "white";
        divObject7.style.color = "white";
        divObject8.style.color = "white";
        //obtener nombre producto
        var nombreproducto = divObject1.innerHTML;
        precio = divObject4.innerHTML;
        cantidad = divObject2.innerHTML;
        iva_anterior = divObject5.innerHTML;
        cantidad_an = tmp_cantidad;
        var myidproduct = divObject7.innerHTML;
         precio = precio.replace('$', '');
        precio = precio.replace(' ', ''); 
        precio_an= precio;
        iva_anterior = iva_anterior.replace('$', '');
        iva_anterior = iva_anterior.replace(' ', ''); 
        var iva_producto_an = iva_anterior; 
     
        divbutton.setAttribute("class", "fa fa-edit");
        divbuttonborder.setAttribute("class", "btn btn-info");
        divbuttonborder.setAttribute("onclick", "EditarProducto(" + id + ")");

        re_calc_totales(iva_producto_an,precio_an,cantidad_an,precio,cantidad, id);
        
      }

      function SeleccionProducto(numero_fila) {
      
        var stock = document.getElementById("stock" + numero_fila).innerHTML;
        var bodega = document.getElementById("tmp_tbl_producto_id_sucursal" + numero_fila).innerHTML;
        var idbodega = "tbl_producto_id_sucursal"+numero_fila;
        var precio = document.getElementById("precio" + numero_fila).innerHTML;
        precio = precio.replace('$', '');
        precio = precio.replace(' ', ''); 
        precio = round(precio);
  
        var precioiva = document.getElementById("precioiva" + numero_fila).innerHTML;
        var iva_producto = round(precio*iva); 
        
        var cantidad = 0;
        cantidad=1;
        cantidad= round(cantidad);
        var idproducto = document.getElementById("idproducto" + numero_fila).innerHTML;
        var nameproducto = document.getElementById("nameproducto" + numero_fila).innerHTML;
        
        calc_totales(iva_producto,precio,cantidad);
       
        agregarFila("", nameproducto, idproducto, cantidad, iva_producto, stock, precio,precioiva, bodega, idbodega);


      }

    
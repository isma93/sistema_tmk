//initial var global
v1=0;v2=0;v3=0;
//funcion de recalculo al accionar cambio de cantidad
function re_calc_totales(iva_producto_an,precio_an,cantidad_an, precio,cantidad, id)
      {
        try {

        
         //Math anterior se resta 
        v1=round(v1-iva_producto_an);
        v2=round(v2-(cantidad_an*precio_an));
        v3=round(v2-v1);

          //Math se suma nuevo

        iva_producto = precio*iva;
        var re_total_iva= (cantidad*iva_producto);
        var re_total_precio= (cantidad*precio);
        var re_total_precio_iva = re_total_iva+re_total_precio;
        v1=round(v1+re_total_iva);
        v2=round(v2+re_total_precio);
        v3=round(v2+v1);

        //sign

        var x1 = "tbl_iva" + id;
        var x2 = "tbl_precioiva" + id;
        var x3 = "tbl_cantidad" + id;
        var x4 = "tbl_precio" + id;
        var reiva = document.getElementById(x1);
        var reprecioiva = document.getElementById(x2);
        var recantidad = document.getElementById(x3);
        var reprecio = document.getElementById(x4);
        //var tbliva = document.getElementById(x1);
        reiva.innerHTML=re_total_iva;
        reprecioiva.innerHTML=currency(re_total_precio_iva);
        recantidad.innerHTML=cantidad;
        reprecio=innerHTML= re_total_precio;

        var cal_iva_total, cal_subtotal, cal_total;
        cal_iva_total = document.getElementById('txt_total_iva').innerHTML=currency(v1);
        cal_subtotal = document.getElementById('txt_subtotal').innerHTML=currency(v2);
        cal_total = document.getElementById('txt_total').innerHTML=currency(v3);

        }
        catch (error) {
        console.error(error);
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
          }


      }

//funcion de calculo inicial al seleccion de proc
      function calc_totales(iva_producto,precio,cantidad)
      {
        try {

        
         //Math
        v1=round(v1+iva_producto);
        v2=round(v2+(cantidad*precio));
        v3=round(v2+v1);
    


        //sign
        
        var cal_iva_total, cal_subtotal, cal_total;
        cal_iva_total = document.getElementById('txt_total_iva').innerHTML=currency(v1);
        cal_subtotal = document.getElementById('txt_subtotal').innerHTML=currency(v2);
        cal_total = document.getElementById('txt_total').innerHTML=currency(v3);

        }
        catch (error) {
        console.error(error);
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
          }


      }

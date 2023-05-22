 $(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', true);
		}
	});  

	
	
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
		htmlRows += '<td><input type="text" name="descripPromocion[]" id="descripcion_'+count+'" class="form-control" autocomplete="off"></td>';          
		htmlRows += '<td><input type="numeric" name="cantidad[]" id="cantidad_'+count+'" class="form-control" autocomplete="off"></td>';          
		htmlRows += '<td><input type="text" name="marca[]" id="marca_'+count+'" class="form-control" autocomplete="off"></td>';   
		htmlRows += '<td><input type="text" name="mercadeo[]" id="mercadeo_'+count+'" class="form-control" autocomplete="off"></td>';   
		htmlRows += '<td><input type="text" name="tipoMedida[]" id="tipoMedida_'+count+'" class="form-control" autocomplete="off"></td>'; 
		
		
		$('#invoiceItem').append(htmlRows);
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
			var linea = $('#invoiceItem').length
			$('#lineasNota').val(linea);
		});
		$('#checkAll').prop('checked', true);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {
			$('#amountDue').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				dataType: "json",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response.status == 1) {
						$('#'+id).closest("tr").remove();
					}
				}
			});
		} else {
			return false;
		}
	});




	$("#BuscarCliente").click( function(e){
		e.preventDefault();
		var id = $("#codigoCliente").val();
		console.log(id);

		var valores =
		{
			"codigo" : id

		}

		$.ajax({
			url:"Class/GetCliente.php",
			type: "POST",
			dataType: "JSON",
			data:valores,
			success:function(response){
				try {
					console.log(response[0]);

					$('#nombreCliente').html(response[0]['nombre_cliente']);//.result.nombre_cliente);
					
					var i = response.length;
	
					//var data = response;
					var direcciones = "";

					$('#direccion').html('');
					$('#direccion').append('<option value="0">Direccion:</option>');
					for(var j = 0; j < i; j++){
						
						direcciones += "<option value="+response[j]['no_direccion']+">"+response[j]['nombre_municipio']+ " - "+response[j]['direccion']+ ":</option>";
	
					}
					
					$('#direccion').append(direcciones);
					$('#direccion').val(1);
					$('#id_cliente_seleccionado').val(response[0]['id_cliente']);


				} catch (error) {
					$('#codigoCliente').html('');
					$('#nombreCliente').html('');
					$('#direccion').html('');
					$('#direccion').append('<option value="0">Direccion:</option>');
					$('#canal').val(0);
					('#id_cliente_seleccionado').val('');
				}



			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
			}

		});
	});


	$("#buscarProducto").click( function(e){
		e.preventDefault();
		var id = $("#codigoProducto").val();
		console.log(id);

		var valores =
		{
			"id_producto" : id

		}

		$.ajax({
			url:"Class/GetProducto.php",
			type: "POST",
			dataType: "JSON",
			data:valores,
			success:function(response){

				try {
					console.log(response[0]);

					$('#nombreProducto').html(response[0]['nombre_producto']);//.result.nombre_cliente);
					$('#entidad').val(response[0]['id_entidad']);
					$('#id_producto_seleccionado').html(response[0]['id_producto']);
					console.log($('#id_producto_seleccionado').text() + ' le asigné el valor al producto');


				} catch (error) {
					console.error(error);
					$('#nombreProducto').html('');//.result.nombre_cliente);
					$('#entidad').val(0);
					$('#id_producto_seleccionado').val('');
				}
				


			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(textStatus);
				
			}

		});
	});



	$("#addDetalle").click( function(e){
		e.preventDefault();
		var id_producto = $("#id_producto_seleccionado").text();
		var nombre_producto = $("#nombreProducto").text();
		var cantidad = $("#cantidad").val();
		var id_entidad = $('#entidad').val();
		var nombre_entidad = $('#entidad option:selected').text();
		var desc_promo = $('#descripPromocion').val().toUpperCase();
		var primerDetalle = $('#primerDetalle').text();
		var linea = 0;
		
		if(primerDetalle.length == 0){
			linea = $('#invoiceItem').length;
		}			
		else{
			linea = $('#invoiceItem').length + 1;
		}
		
		if(id_producto == '' || cantidad == '' || id_entidad == ''|| desc_promo == '' ){
			

		}else{
			
			console.log(id_producto);
			console.log(nombre_producto);
			console.log(cantidad);
			console.log(nombre_entidad);
			console.log(desc_promo);
			console.log(id_entidad);


			var htmlRows = '';
			htmlRows += '<tr>';
			htmlRows += '<td><input class="itemRow" type="checkbox"></td>';  
			htmlRows += '<td><input readonly type="text" name="tbl_id_producto[]" id="tbl_id_producto_'+linea+'" class="form-control" autocomplete="off" value="'+id_producto+'"></td>';
            htmlRows += '<td><input readonly type="text" name="productName[]" id="productName_" class="form-control" autocomplete="off" value="'+nombre_producto+'"></td>';			
            htmlRows += '<td><input readonly type="number" name="tbl_cantidad[]" id="tbl_cantidad_'+linea+'" class="form-control quantity" autocomplete="off" value="'+cantidad+'"></td>';
            htmlRows += '<td><input readonly type="text" name="tbl_entidad[]" id="tbl_entidad_'+linea+'" class="form-control" autocomplete="off" value="'+nombre_entidad+'"></td>';
            htmlRows += '<td><input readonly type="text" name="tbl_desc[]" id="tbl_desc_'+linea+'" class="form-control" autocomplete="off" value="'+desc_promo+'"></td>';
			htmlRows += '<input type="hidden" name="tbl_id_entidad[]" id="tbl_id_entidad_'+linea+'" class="form-control" autocomplete="off" value="'+id_entidad+'">';
			htmlRows += '</tr>';

			
			if(primerDetalle.length > 0){
				$('#invoiceItem').append(htmlRows);
			}			
			else{

				var rowsColumn = '';
				rowsColumn += '<tr>';
				rowsColumn += '<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>';
				rowsColumn += '<th width="10%">Código</th>';
				rowsColumn += '<th width="30%">Nombre Producto</th>';
				rowsColumn += '<th width="8%">Cantidad</th>';
				rowsColumn += '<th width="30%">Entidad</th>';							
				rowsColumn += '<th width="20%">Descripción promoción</th>';         
				rowsColumn += '</tr>';
				
				$('#invoiceItem').html(rowsColumn);
				$('#invoiceItem').append(htmlRows);
				$('#primerDetalle').html('YA');

			}
		}

		$('#nombreProducto').html('');//.result.nombre_cliente);
		$('#entidad').val(0);
		$('#id_producto_seleccionado').val('');
		$('#lineasNota').val(linea);
		$('#codigoProducto').val('');
		$('#descripPromocion').val('');
		$('#cantidad').val('');
		
	});
});	


function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount));	
	var taxRate = $("#taxRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		$('#taxAmount').val(taxAmount);
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount);
		$('#totalAftertax').val(subTotal);		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {		
			$('#amountDue').val(subTotal);
		}
	}

	$(document).on("click",".editar-btn",function(){
		var id = $(this).data('id');
		$.ajax({
			url :"edit_invoice.php",
			type:"POST",
			cache:false,
			data:{editarId:id},
			success:function(data){
				$("#editarForm").html(data);
			},
		});
	});


	

	
}







 
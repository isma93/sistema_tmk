<?php

class Invoice{
	
  private $host  = 'localhost';
  private $user  = 'root';
  private $password   = "";
  //private $database  = "php_factura";
	private $invoiceUserTable = 'factura_usuarios';
 	private $invoiceOrderTable = 'factura_orden';
	private $invoiceOrderItemTable = 'factura_orden_producto';
	private $dbConnect = false;

	

	public function __construct(){
      /*  if(!$this->dbConnect){
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }*/
		if(!$this->dbConnect){
				$serverName = "NBAMARTINEZ\SQLEXPRESS02";
				$connectionInfo = array( "Database"=>"nota_egreso");
				$conn = sqlsrv_connect( $serverName, $connectionInfo);

				$this->dbConnect = $conn;
		}else{
			die("Error en la conexión: " . $conn->connect_error);
		}

    }
	private function getData($sqlQuery) {
		$result = sqlsrv_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. sqlsrv_errors());
		}
		$data= array();
		while ($row = sqlsrv_fetch_array($result)) {
		 
		}
		return $data;
	}


	private function getNumRows($sqlQuery) {
		$result = sqlsrv_query($this->dbConnect, $sqlQuery);
		if(!$result){
			print('Error in query: '. sqlsrv_error());
		}
		$numRows = sqlsrv_num_rows($result);
		return $numRows;
	}
	/*public function loginUsers($email, $password){
		$sqlQuery = "
			SELECT id, email, first_name, last_name, address, mobile
			FROM ".$this->invoiceUserTable."
			WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}*/
	public function checkLoggedIn(){
		if(!$_SESSION['userid']) {
			header("Location:index.php");
		}
	}
	public function saveInvoice($POST) {
		$sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(user_id, order_receiver_name, order_receiver_address, order_total_before_tax, order_total_tax, order_tax_per, order_total_after_tax, order_amount_paid, order_total_amount_due, note)
			VALUES ('".$POST['userId']."', '".$POST['companyName']."', '".$POST['address']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."', '".$POST['amountPaid']."', '".$POST['amountDue']."', '".$POST['notes']."')";
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "
			INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount)
			VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}
	}
	/*public function updateInvoice($POST) {
		if($POST['invoiceId']) {
			$sqlInsert = "
				UPDATE ".$this->invoiceOrderTable."
				SET order_receiver_name = '".$POST['companyName']."', order_receiver_address= '".$POST['address']."', order_total_before_tax = '".$POST['subTotal']."', order_total_tax = '".$POST['taxAmount']."', order_tax_per = '".$POST['taxRate']."', order_total_after_tax = '".$POST['totalAftertax']."', order_amount_paid = '".$POST['amountPaid']."', order_total_amount_due = '".$POST['amountDue']."', note = '".$POST['notes']."'
				WHERE user_id = '".$POST['userId']."' AND order_id = '".$POST['invoiceId']."'";
			mysqli_query($this->dbConnect, $sqlInsert);
		}
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "
				INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount)
				VALUES ('".$POST['invoiceId']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}
	}*/
	public function getInvoiceList($estado){

		$sqlQuery = "SELECT * FROM fn_get_listado_notas_por_estado('".$estado."')";
		return  $this->getData($sqlQuery);
	}

	public function getCliente($codigo){

		$sqlQuery = "select * from [fn_get_cliente_y_direcciones_por_id]('".$codigo."')";
		//print $sqlQuery;
		return  $this->getData($sqlQuery);
	}

	public function getCanales(){

		$sqlQuery = "select * from canal";
		//print $sqlQuery;
		return  $this->getData($sqlQuery);
	}

	public function getEntidades(){

		$sqlQuery = "select id_entidad, concat(
			categoria_mercadeo, ' - ', 
			categoria, ' - ',
			marca)  as entidad

			from entidad

			order by categoria_mercadeo, categoria, marca asc
		";
		//print $sqlQuery;
		return  $this->getData($sqlQuery);
	}



	public function getInvoiceListUser($usuario){

		$sqlQuery = "SELECT * FROM fn_get_listado_notas_por_usuario('".$usuario."')";
		return  $this->getData($sqlQuery);
	}

	public function pruebaConexion(){
		$mensaje = "Estamos conectados";
		return $mensaje;
	}

	public function getInvoice($invoiceId){
		$sqlQuery = "select * from fn_get_nota_por_id(" .$invoiceId.")";
		$result = sqlsrv_query($this->dbConnect, $sqlQuery);
		$row = sqlsrv_fetch_array($result);
		return $row;
	}
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "
			select detalle_nota_egreso.id_detalle_nota_egreso, detalle_nota_egreso.id_producto, producto.nombre_producto, detalle_nota_egreso.cantidad,
			tipo_medida.tipo_medida, detalle_nota_egreso.descripcion_promocion,
			concat(entidad.marca, ' - ', entidad.categoria,' - ', entidad.categoria_mercadeo) as entidad, entidad.id_entidad

			from detalle_nota_egreso inner join producto on detalle_nota_egreso.id_producto = producto.id_producto
			inner join tipo_medida on detalle_nota_egreso.tipo_medida = tipo_medida.id_tipo_medida
			inner join entidad on detalle_nota_egreso.id_entidad = entidad.id_entidad

			where detalle_nota_egreso.id_nota_egreso = '$invoiceId'";
		return  $this->getData($sqlQuery);
	}
	public function deleteInvoiceItems($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderItemTable."
			WHERE order_id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);
	}
	public function deleteInvoice($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderTable."
			WHERE order_id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);
		$this->deleteInvoiceItems($invoiceId);
		return 1;
	}

	public function updateDetalleNota($POST) {
		/*if($POST['invoiceId']) {
			$sqlInsert = "
				UPDATE ".$this->invoiceOrderTable."
				SET order_receiver_name = '".$POST['companyName']."', order_receiver_address= '".$POST['address']."', order_total_before_tax = '".$POST['subTotal']."', order_total_tax = '".$POST['taxAmount']."', order_tax_per = '".$POST['taxRate']."', order_total_after_tax = '".$POST['totalAftertax']."', order_amount_paid = '".$POST['amountPaid']."', order_total_amount_due = '".$POST['amountDue']."', note = '".$POST['notes']."'
				WHERE user_id = '".$POST['userId']."' AND order_id = '".$POST['invoiceId']."'";
			mysqli_query($this->dbConnect, $sqlInsert);
		}
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "
				INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount)
				VALUES ('".$POST['invoiceId']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}*/
	}

	public function updateInvoice($POST) {		
		
		if($POST['id_nota_egreso']) {
			
			$sqlUpdate = "sp_nota_egreso_inactivar_ultimo_estado ".$POST['id_nota_egreso']."";
			sqlsrv_query($this->dbConnect, $sqlUpdate);

			$sqlUpdate = "sp_nota_egreso_establecer_ultimo_estado " .$POST['id_nota_egreso'].",1,2,' nada '";
			
			sqlsrv_query($this->dbConnect, $sqlUpdate);

			for ($i = 0; $i < count($POST['id_producto']) ; $i++) {	
				
				echo '<script language="javascript">console.log("'.$i.' fila " );</script>';
					$f = strlen($POST['row_check'][$i]);		
					$valor = $POST['row_check'][$i];		
					$produ = $POST['id_producto'][$i];		
				echo '<script language="javascript">console.log("'.$f.' oEstad '.$valor.' '.$produ.'" );</script>';
				
				if($POST['row_check'][$i] == 'on'){					

					$sqlUpdate = "sp_detalle_nota_egreso_inactivar_ultimo_estado ".$POST['id_detalle_nota_egreso'][$i]."";
					sqlsrv_query($this->dbConnect, $sqlUpdate);
					
					$sqlUpdate = "sp_detalle_nota_egreso_establecer_ultimo_estado " .$POST['id_detalle_nota_egreso'][$i].",1,2,' nada '";
					sqlsrv_query($this->dbConnect, $sqlUpdate);

					$sqlUpdate = "sp_detalle_nota_egreso_actualizar_entidad ".$POST['id_detalle_nota_egreso'][$i].",".$POST['id_entidad'][$i]."";
					//die($sqlUpdate);
					sqlsrv_query($this->dbConnect, $sqlUpdate);
					echo '<script language="javascript">console.log("'.$i.' POST " );</script>';

				}		
			}
		}		
	}

	public function autorizarNota($POST, $USER, $NIVEL_AUTORIZACION) {		
		
		if($POST['id_nota_egreso']) {
			
			$sqlUpdate = "sp_nota_egreso_inactivar_ultimo_estado ".$POST['id_nota_egreso']."";
			sqlsrv_query($this->dbConnect, $sqlUpdate);
			echo '<script language="javascript">console.log("'.$sqlUpdate.' POST " );</script>';
			$sqlUpdate = "sp_nota_egreso_establecer_ultimo_estado " .$POST['id_nota_egreso']."," .$USER."," .$NIVEL_AUTORIZACION.",' nada '";
			echo '<script language="javascript">console.log("'.$sqlUpdate.' POST " );</script>';
			sqlsrv_query($this->dbConnect, $sqlUpdate);

			for ($i = 0; $i < count($POST['id_producto']) ; $i++) {	
								

					$sqlUpdate = "sp_detalle_nota_egreso_inactivar_ultimo_estado ".$POST['id_detalle_nota_egreso'][$i]."";
					sqlsrv_query($this->dbConnect, $sqlUpdate);
					echo '<script language="javascript">console.log("'.$sqlUpdate.' POST " );</script>';
					$sqlUpdate = "sp_detalle_nota_egreso_establecer_ultimo_estado " .$POST['id_detalle_nota_egreso'][$i]."," .$USER."," .$NIVEL_AUTORIZACION.",' nada '";
					sqlsrv_query($this->dbConnect, $sqlUpdate);
					echo '<script language="javascript">console.log("'.$sqlUpdate.' POST " );</script>';
					$sqlUpdate = "sp_detalle_nota_egreso_actualizar_entidad ".$POST['id_detalle_nota_egreso'][$i].",".$POST['id_entidad'][$i]."";
					echo '<script language="javascript">console.log("'.$sqlUpdate.' POST " );</script>';
					sqlsrv_query($this->dbConnect, $sqlUpdate);
					echo '<script language="javascript">console.log("'.$i.' POST " );</script>';
	
			}
		}		
	}
	






	
	public function loginUsers($email, $password){
		$query = "select * from fn_get_login_usuario('".$email."', '".$password."')";
        return  $this->getData($query);
	}



}
?>

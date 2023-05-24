<HTML>
<H1>Hello</h1>
<head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script></head>


<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 
session_start(); 



$codigo=$_POST["codigo"];
$p_precio=$_POST["p_precio"];
$nombreProducto=$_POST["nombreProducto"];
$cantidad=$_POST["cantidad"];
$Entidad=$_POST["Entidad"];
//$descripPromocion=$_POST["descripPromocion"];



$LP=1;	
while ($LP <= $_SESSION['contado'])
{

if($_SESSION['codigo'.$LP]==$codigo)
{
	$repetido=true;
	$LP+=1;
	$LP=$_SESSION['contado']+1;
}else{
	$repetido=false;
	$LP+=1;
	
}



}



?>

						

									<?php 

if ($repetido==false){

					//$_SESSION['contado']= 0;
				if( isset( $_SESSION['contado'] ) ) {
					$_SESSION['contado'] += 1;

					
				}else {
					
					$_SESSION['contado'] = 1;
					//echo $_SESSION['contado'];
					
					}
									if (empty($_SESSION['validadorv2'])){$_SESSION['validadorv2']=1;}else{$_SESSION['validadorv2']=$_SESSION['validadorv2']+1;}
									
									
									


									$i = 1;
									$u= $_SESSION['contado'];
									$_SESSION['codigo'.$u]=$codigo;
									$_SESSION['nombreProducto'.$u]=$nombreProducto;
									$_SESSION['cantidad'.$u]=$cantidad;					
									$_SESSION['Entidad'.$u]=$Entidad;
									//$_SESSION['descripPromocion'.$u]=$descripPromocion;
									$_SESSION['P_PRECIO'.$u]=$p_precio;
									$_SESSION['SUBTOTAL'.$u]=$p_precio*$cantidad;
									//if (isset($_SESSION['GRANTOTALVAR']))
									$_SESSION['GRANTOTALVAR']=$_SESSION['GRANTOTALVAR']+$_SESSION['SUBTOTAL'.$u];



									while ($i <= $_SESSION['contado']){
										?>
									
										<?php  $i++;
									} 
									$_SESSION['foreingkey']=true;
							
									echo '<script>
													  
										 window.location = "../create_invoice.php";
										
								</script>';
					}else
					{
						echo    '<script>	Swal.fire({
							icon: "error",
							title: "Código de producto ya seleccionado!.",
							allowOutsideClick: false,
							showConfirmButton: true,
							confirmButtonText: "Continuar"
							}).then(function(result){
							   if(result.value){                   
								   window.location = "../create_invoice.php";
							   }
							});</script>';

					}
									?>
									</tr>

						</table>
								
<?php 
session_start();
if ($_POST['min-date']!="" && $_POST['max-date']!="")
{

	
$_SESSION['min']=$_POST['min-date'];
$_SESSION['max']=$_POST['max-date'];



echo $_SESSION['min'];
echo  $_SESSION['max'];


}
else 
{
	$_SESSION['min']="NULO";
	$_SESSION['max']="NULO";
echo $_SESSION['min'];
echo  $_SESSION['max'];

}

if ($_POST['autorizadores']==0)
{
$_SESSION['autorizadores1']=$_SESSION['autorizadores'];
	$_SESSION['autorizadores']="NULO";

}
else
{
   	$_SESSION['autorizadores1']=$_SESSION['autorizadores'];
	$_SESSION['autorizadores']=$_POST['autorizadores'];
}
$_SESSION['flex']=true;

echo '<script>
													  
										 window.location = "ViewReportpdfbodega_impresa.php";
										
</script>';
?>
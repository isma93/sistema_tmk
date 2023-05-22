<?php 
session_start();
if ($_POST['min-date']!="" && $_POST['max-date']!="")
{
$_SESSION['min']=$_POST['min-date'];
$_SESSION['max']=$_POST['max-date'];

echo $_SESSION['min'];
echo  $_SESSION['max'];
}


echo '<script>
													  
										 window.location = "ViewAut.php";
										
									</script>';

?>
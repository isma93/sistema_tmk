
<link rel="stylesheet" type="text/css" href="./bk/navbar.css"/>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav" >
	

  <a href="#home" class="active">ILP</a>

  
  <a href="#news"  class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ingresar Nota de Egreso</a>
  <a href="#news"><i class="fa fa-briefcase" aria-hidden="true"></i> Revisar Notas</a>
  <a href="#contact"><i class="fa fa-book" aria-hidden="true"></i> Modulo de Autorizaciones</a>
  <a href="#news"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a>
  <a href="#about"><i class="fa fa-rss" aria-hidden="true"></i> About</a>

  <div class="pull-right">
  <a href="#about"><i class="fa fa-user-circle" aria-hidden="true"></i> Cerrar Sesion</a>
</div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>




<script>



</script>











</body>
</html>
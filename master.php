<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trade Marketing</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
<link rel="stylesheet" type="text/css" href="bk/navbar.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script>
         
		 function retrologout()
            {
				if (confirm("¿Realmente deseas cerrar tu sesión?") == true) {
						return true;
					} else {
					return false;
					}		
					return false;
			}	
						
            
</script>
<script>
            function logout()
            {
               window.location.href = "destroy.php";
            }
</script>

<script>
            function init()
            {
               window.location.href = "create_invoice.php";
            }
</script>

<script>
            function revisarnota()
            {
               window.location.href = "./AppCode/revisarnota.php";
            }
</script>
		
</head>


<div class="topnav" id="myTopnav" >
	

  <a href="master.php" class="active"><img src="./images/Imagen1.png" width="50" height="24"></a>

  <?php
  session_start();
  //Parametros de reenvio
  $ingresar_nota=  '<a href="create_invoice.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ingresar Desalojo</a>';
 $revisar='<a href="./AppCode/revisarnota.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Revisar Desalojo</a>';
 $modulo_aut='<a href="./AppCode/Rest_Autorizado/ViewAut.php"><i class="fa fa-book" aria-hidden="true"></i> Módulo de Liquidación</a>'; 

 $reportes='<a href="./Reporting/Report_master.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a>';
 $about ='<a href="#about"><i class="fa fa-rss" aria-hidden="true"></i> About</a>';
 $inventario ='<a href="./AppCode/inventario.php"><i class="fa fa-book" aria-hidden="true"></i>Inventario</a>';

 if (isset($_SESSION['Modulo']))
			
 {

   if ($_SESSION['Modulo']!=5 )
   {
	   if ($_SESSION['Modulo']==1)
	   {
		echo $ingresar_nota;
    echo $inventario;
		echo $about;
    
	   } else if ($_SESSION['Modulo']==2)
	   {
		echo $ingresar_nota;
		echo $revisar;
    echo $inventario;
		echo $reportes;
		echo $about;

	   } 
     else if ($_SESSION['Modulo']==10)
	   {
		
		echo $reportes;
		echo $about;

	   }

     else if ($_SESSION['Modulo']==11)
	   {
		
		echo $reportes;
		echo $about;

	   }
     
     
     else if ($_SESSION['Modulo']==3 ||$_SESSION['Modulo']==7 ||$_SESSION['Modulo']==9)
	   {
		echo $ingresar_nota;
		echo $revisar;
		echo $modulo_aut;
		echo $reportes;
    echo $inventario;
		echo $about;
	   }
	   else 
	   {
		echo '<script>
													  
		window.location = "Found.php";
	   
   		</script>';
	   }
	   

   } else
   {
	echo $ingresar_nota;
	echo $revisar;
	echo $modulo_aut;
	echo $reportes;
  echo $inventario;

	echo $about;
   }
} else 
{
	
	 echo '<script>
												   
	 window.location = "Found.php";
	
		</script>';
	
}
 
 ?>
    <div class="pull-right">
  <a id="logout" onclick="return retrologout()" href="destroy.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Cerrar Sesión</a>
   </div>
  
 
   <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>


</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
	














<div class="banner" id="banner">
  <div class="bg-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-text">
            <h1>Sistema TradeAPI</h1>
            <p>Hola <?php if (isset($_SESSION['Modulo'])){echo $_SESSION['first_name']; }?></p>
            <a href="#contact" class="banner-button">Feedback</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>

         
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="js/jquery.countTo.js"></script> 
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script> 
<script>
$(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
     
          navigation : false, // Show next and prev buttons
          slideSpeed : 500,
		  autoPlay : 3000,
          paginationSpeed : 400,
          singleItem:true
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });
     
    });

	/*$('.timer').each(count);*/
	jQuery(function ($) {
      // custom formatting example
      $('.timer').data('countToOptions', {
        formatter: function (value, options) {
          return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
      });


  // start all the timers
      $('#testimonials').waypoint(function() {
    $('.timer').each(count);
	});
 
      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
    });


	$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>
</body>
</html>

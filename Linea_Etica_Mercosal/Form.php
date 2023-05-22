

 <?php
session_start(); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('../include/config.inc');
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);

?>
<head>
<meta charset="utf-8">
<title>Notas Egreso ILP</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<!--<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>-->
<link rel="stylesheet" type="text/css" href="../css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="../css/animate.css"/>
<link rel="stylesheet" type="text/css" href=".././bk/modf.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="../css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!--<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'> -->
<script src="js/invoice.js"></script>

<script >

    // la Validación del Formulario 
	
            function desktop() {  


                var telefono = document.getElementById("telefono").value
                var email = document.getElementById("email").value
                var cargo = document.getElementById("cargo").value
                var apellido = document.getElementById("apellido").value
                var nombre = document.getElementById("nombre").value
              

                
                                                if(document.getElementById('anonimo').checked){
                                                    
                                                } else {


                                                    if (nombre=="")
                                                                {
                                                                                Swal.fire({
                                                                    icon: "error",
                                                                    title: "Debes ingresar tu nombre a marcar anonimo.",
                                                                
                                                                    showConfirmButton: true,
                                                                    confirmButtonText: "Continuar"
                                                                    }).then(function(result){
                                                                        if(result.value){                   
                                                                        
                                                                        }
                                                                    });

                                                                    return false;
                                                                }
                                                //////////////////////////////////////////
                                                //////////////////////////////////////////////////7
                                                                if (telefono=="")
                                                                {
                                                                                Swal.fire({
                                                                    icon: "error",
                                                                    title: "Debes ingresar tu telefono a marcar anonimo.",
                                                                
                                                                    showConfirmButton: true,
                                                                    confirmButtonText: "Continuar"
                                                                    }).then(function(result){
                                                                        if(result.value){                   
                                                                        
                                                                        }
                                                                    });

                                                                    return false;
                                                                }
                                                //////////////////////////////////////////  
                                                if (email=="")
                                                                {
                                                                                Swal.fire({
                                                                    icon: "error",
                                                                    title: "Debes ingresar tu email a marcar anonimo.",
                                                                
                                                                    showConfirmButton: true,
                                                                    confirmButtonText: "Continuar"
                                                                    }).then(function(result){
                                                                        if(result.value){                   
                                                                        
                                                                        }
                                                                    });

                                                                    return false;
                                                                }
                                                //////////////////////////////////////////  

                                                if (cargo=="")
                                                                {
                                                                                Swal.fire({
                                                                    icon: "error",
                                                                    title: "Debes ingresar tu cargo a marcar anonimo.",
                                                                
                                                                    showConfirmButton: true,
                                                                    confirmButtonText: "Continuar"
                                                                    }).then(function(result){
                                                                        if(result.value){                   
                                                                        
                                                                        }
                                                                    });

                                                                    return false;
                                                                }
                                                ////////////////////////////////////////// 
                                                
                                                if (apellido=="")
                                                                {
                                                                                Swal.fire({
                                                                    icon: "error",
                                                                    title: "Debes ingresar tu apellido a marcar anonimo.",
                                                                
                                                                    showConfirmButton: true,
                                                                    confirmButtonText: "Continuar"
                                                                    }).then(function(result){
                                                                        if(result.value){                   
                                                                        
                                                                        }
                                                                    });

                                                                    return false;
                                                                }
                                                //////////////////////////////////////////  
                                                





                                                            }   
                











        var c1pregunta1 = document.getElementById("c1pregunta1").value
      var c1pregunta2 = document.getElementById("c1pregunta2").value
         var c1pregunta3 = document.getElementById("c1pregunta3").value
       var c1pregunta4 = document.getElementById("c1pregunta4").value
        var c1pregunta5 = document.getElementById("c1pregunta5").value
        var c1pregunta6 = document.getElementById("c1pregunta6").value
        var c1pregunta7 = "Key";
        var c1pregunta8 = document.getElementById("c2pregunta1").value
        var c1pregunta9 = document.getElementById("c2pregunta2").value
        var c1pregunta10 = document.getElementById("c2pregunta3").value
        var c1pregunta11 = document.getElementById("c2pregunta4").value
        var c1pregunta12 = document.getElementById("c2pregunta5").value
        var c1pregunta13 = document.getElementById("c2pregunta6").value
        var c1pregunta14 = "Key";
        var c1pregunta15 = document.getElementById("c3pregunta1").value
         var c1pregunta16 = document.getElementById("c3pregunta2").value

        var c1pregunta17 = document.getElementById("c3pregunta3").value
        var c1pregunta18 = document.getElementById("c3pregunta4").value
        var c1pregunta19 = document.getElementById("c3pregunta5").value
        var c1pregunta20 = "Key";
       var c1pregunta21 = document.getElementById("c4pregunta1").value
        var c1pregunta22 = document.getElementById("c4pregunta2").value

        var c1pregunta23 = document.getElementById("c4pregunta3").value
        var c1pregunta24= document.getElementById("c4pregunta4").value
        var c1pregunta25 = document.getElementById("c4pregunta5").value

        var c1pregunta26 = document.getElementById("c4pregunta6").value
        var c1pregunta27= "Key";
        var c1pregunta28= document.getElementById("c5pregunta1").value
        var c1pregunta29= document.getElementById("c5pregunta2").value
        var c1pregunta30= document.getElementById("c5pregunta3").value
        var c1pregunta31= document.getElementById("c5pregunta4").value
        var c1pregunta32= document.getElementById("c5pregunta5").value
        var c1pregunta33= "Key";
        var c1pregunta34= document.getElementById("c6pregunta1").value

        var c1pregunta35= document.getElementById("c6pregunta2").value
        var c1pregunta36= document.getElementById("c6pregunta3").value
        var c1pregunta37= document.getElementById("c6pregunta4").value
       var c1pregunta38= document.getElementById("c6pregunta5").value
        var c1pregunta39= document.getElementById("c6pregunta6").value
        var c1pregunta40= "Key";

        var c1pregunta41 = document.getElementById("c7pregunta1").value
        var c1pregunta42 = document.getElementById("c7pregunta2").value
        var c1pregunta43 = document.getElementById("c7pregunta3").value
        var c1pregunta44 = document.getElementById("c7pregunta4").value
        var c1pregunta45 = document.getElementById("c7pregunta5").value
         var c1pregunta46 =  "Key";

        var c1pregunta47 = document.getElementById("c8pregunta1").value
        var c1pregunta48= document.getElementById("c8pregunta2").value
       var c1pregunta49 = document.getElementById("c8pregunta3").value

        var c1pregunta50 = document.getElementById("c8pregunta4").value
         var c1pregunta51= document.getElementById("c8pregunta5").value
        var c1pregunta52= document.getElementById("c8pregunta6").value
        var c1pregunta53= document.getElementById("c8pregunta7").value
        var c1pregunta54= document.getElementById("c8pregunta8").value
        var c1pregunta55= "Key";
        var c1pregunta56= document.getElementById("c9pregunta1").value
        var c1pregunta57= document.getElementById("c9pregunta2").value
        var c1pregunta58= document.getElementById("c9pregunta3").value

        var c1pregunta59= document.getElementById("c9pregunta4").value
        var c1pregunta60= document.getElementById("c9pregunta5").value
        var c1pregunta61= document.getElementById("c9pregunta6").value
        var c1pregunta62= "Key";
        var c1pregunta63= document.getElementById("c10pregunta1").value
        var c1pregunta64= "Key";


        //var elemento = document.getElementById("rutacliente").value
       // var canalcliente = document.getElementById("canal").value
       //////////////////////7
    //   var salad = [c1pregunta1,c1pregunta2,c1pregunta3,c1pregunta4,c1pregunta5,c1pregunta6,c1pregunta7,c1pregunta8,c1pregunta9,c1pregunta10,c1pregunta11,c1pregunta12,c1pregunta13,c1pregunta14,c1pregunta15,c1pregunta16,c1pregunta17,c1pregunta18,c1pregunta19,c1pregunta20,c1pregunta21,c1pregunta22,c1pregunta23,c1pregunta24,c1pregunta25,c1pregunta26,c1pregunta27,c1pregunta28,c1pregunta29,c1pregunta30,c1pregunta31,c1pregunta32,c1pregunta33,c1pregunta34,c1pregunta35,c1pregunta36,c1pregunta37,c1pregunta38,c1pregunta39,c1pregunta40,c1pregunta41,c1pregunta42,c1pregunta43,c1pregunta44,c1pregunta45,c1pregunta46,c1pregunta47,c1pregunta48,c1pregunta49,c1pregunta50,c1pregunta51,c1pregunta52,c1pregunta53,c1pregunta54,c1pregunta55,c1pregunta56,c1pregunta57,c1pregunta58,c1pregunta59,c1pregunta60,c1pregunta61,c1pregunta62,c1pregunta63,c1pregunta64];
       ////////////////7777777
    
       if (c1pregunta1 != ""){

        return true;
      
                }

       
//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta2 != "")
        {
            return true;

        }

    //////////////////////////////////////////////////////////////////////////
    else if (c1pregunta3 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta4 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta5 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta6 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta7 != "Key")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta8 != "Seleccionar una opción")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta9 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta10 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta11 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta12 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta13 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta14 != "Key")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta15 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta16 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta17 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta18 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta19 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta20 != "Key")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta21 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta22 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta23 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta24 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta25 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta26 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta27 != "Key")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta28 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta29 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta30 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta31 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta32 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta33 != "Key")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta34 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta35 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta36 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta37 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta38 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta39 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta40 != "Key")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta41 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta43 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta44 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta45 != "")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta46 != "Key")
        {
            return true;

        }//////////////////////////////////////////////////////////////////////////
        else if (c1pregunta47 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta48 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta49 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta50 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta51 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta52 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta53 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta54 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta55 != "Key")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta56 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta57 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta58 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta59 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta60 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta61 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta62 != "Key")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta63 != "")
        {
            return true;

        }
        //////////////////////////////////////////////////////////////////////////
        else if (c1pregunta64 != "Key")
        {
            return true;

        }

else     
{

    
Swal.fire({
        icon: "error",
        title: "Debes llenar almenos un campo",
    
        showConfirmButton: true,
        confirmButtonText: "Continuar"
        }).then(function(result){
            if(result.value){                   
            
            }
        });

        return false;

}



    
    }






</script>







<script>
            function logout()
            {
               window.location.href = "destroy.php";
            }
</script>
<script>
            function revisarnotas()
            {
               window.location.href = "revisarnota.php";
            }
</script>

<script>
            function init()
            {
               window.location.href = "../create_invoice.php";
            }
</script>


<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function anom(selectTag){



 if(document.getElementById('anonimo').checked){

    document.getElementById('anom1').hidden = true;
 
 document.getElementById('anom1').hidden = true;
 document.getElementById('anom1').style = 'none';
 document.getElementById('anom1').style = 'none';

 }else{
    document.getElementById('anom1').hidden = false;
document.getElementById('anom1').hidden = false;
document.getElementById('anom1').style = 'block';
 document.getElementById('anom1').style = 'block';
 }
}



</script>

<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function acoso(selectTag){



 if(document.getElementById('acoso_').checked){
document.getElementById('acoso1').hidden = false;
document.getElementById('acoso1').hidden = false;
document.getElementById('acoso1').style = 'block';
 document.getElementById('acoso1').style = 'block';
 }else{
 document.getElementById('acoso1').hidden = true;
 
 document.getElementById('acoso1').hidden = true;
 document.getElementById('acoso1').style = 'none';
 document.getElementById('acoso1').style = 'none';
 }
}




</script>


<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function mejora(selectTag){



 if(document.getElementById('mejora_').checked){
document.getElementById('mejora1').hidden = false;
document.getElementById('mejora1').hidden = false;
document.getElementById('mejora1').style = 'block';
 document.getElementById('mejora1').style = 'block';
 }else{
 document.getElementById('mejora1').hidden = true;
 
 document.getElementById('mejora1').hidden = true;
 document.getElementById('mejora1').style = 'none';
 document.getElementById('mejora1').style = 'none';
 }
}




</script>

<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function otros(selectTag){



 if(document.getElementById('otros_').checked){
document.getElementById('otros1').hidden = false;
document.getElementById('otros1').hidden = false;
document.getElementById('otros1').style = 'block';
 document.getElementById('otros1').style = 'block';
 }else{
 document.getElementById('otros1').hidden = true;
 
 document.getElementById('otros1').hidden = true;
 document.getElementById('otros1').style = 'none';
 document.getElementById('otros1').style = 'none';
 }
}




</script>


</script>

<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function robo(selectTag){



 if(document.getElementById('robo_').checked){
document.getElementById('robo1').hidden = false;
document.getElementById('robo1').hidden = false;
document.getElementById('robo1').style = 'block';
 document.getElementById('robo1').style = 'block';
 }else{
 document.getElementById('robo1').hidden = true;
 
 document.getElementById('robo1').hidden = true;
 document.getElementById('robo1').style = 'none';
 document.getElementById('robo1').style = 'none';
 }
}




</script>


<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function desen(selectTag){



 if(document.getElementById('desen_').checked){
document.getElementById('desen1').hidden = false;
document.getElementById('desen1').hidden = false;
document.getElementById('desen1').style = 'block';
 document.getElementById('desen1').style = 'block';
 }else{
 document.getElementById('desen1').hidden = true;
 
 document.getElementById('desen1').hidden = true;
 document.getElementById('desen1').style = 'none';
 document.getElementById('desen1').style = 'none';
 }
}




</script>

<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function desc(selectTag){



 if(document.getElementById('desc_').checked){
document.getElementById('desc1').hidden = false;
document.getElementById('desc1').hidden = false;
document.getElementById('desc1').style = 'block';
 document.getElementById('desc1').style = 'block';
 }else{
 document.getElementById('desc1').hidden = true;
 
 document.getElementById('desc1').hidden = true;
 document.getElementById('desc1').style = 'none';
 document.getElementById('desc1').style = 'none';
 }
}




</script>

<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function corrupto(selectTag){



 if(document.getElementById('corrupto_').checked){
document.getElementById('corrupto1').hidden = false;
document.getElementById('corrupto1').hidden = false;
document.getElementById('corrupto1').style = 'block';
 document.getElementById('corrupto1').style = 'block';
 }else{
 document.getElementById('corrupto1').hidden = true;
 
 document.getElementById('corrupto1').hidden = true;
 document.getElementById('corrupto1').style = 'none';
 document.getElementById('corrupto1').style = 'none';
 }
}




</script>


<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function adulterio(selectTag){



 if(document.getElementById('adulterio_').checked){
document.getElementById('adul1').hidden = false;
document.getElementById('adul1').hidden = false;
document.getElementById('adul1').style = 'block';
 document.getElementById('adul1').style = 'block';
 }else{
 document.getElementById('adul1').hidden = true;
 
 document.getElementById('adul1').hidden = true;
 document.getElementById('adul1').style = 'none';
 document.getElementById('adul1').style = 'none';
 }
}




</script>


<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function nave(selectTag){



 if(document.getElementById('Fraude').checked){
document.getElementById('fraude1').hidden = false;
document.getElementById('fraude1').hidden = false;
document.getElementById('fraude1').style = 'block';
 document.getElementById('fraude1').style = 'block';
 }else{
 document.getElementById('fraude1').hidden = true;
 
 document.getElementById('fraude1').hidden = true;
 document.getElementById('fraude1').style = 'none';
 document.getElementById('fraude1').style = 'none';
 }
}




</script> 


<script language="javascript" type="text/javascript">
    /////////////////////////////////////////////////////////////////////////////////////////////////
function conflicto(selectTag){



 if(document.getElementById('conflicto_').checked){
document.getElementById('conc').hidden = false;
document.getElementById('conc').hidden = false;
document.getElementById('conc').style = 'block';
 document.getElementById('conc').style = 'block';
 }else{
 document.getElementById('conc').hidden = true;
 
 document.getElementById('conc').hidden = true;
 document.getElementById('conc').style = 'none';
 document.getElementById('conc').style = 'none';
 }
}




</script> 







<script>
         
		 function most(event)
            {
				event.preventDefault();
				
				Swal.fire({
        title: '¿Estás seguro?', 
		text: '',            
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
        document.insert.submit();
        }
    })						
						
						
            }
</script>
		
<script type="text/javascript">
    // la Validación del Formulario 
	
    function validar() {

	

		var idcliente = document.getElementById("idcliente").value
        var elemento = document.getElementById("rutacliente").value
		var canalcliente = document.getElementById("canal").value
      if (idcliente == ""){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes llenar el campo de codigo cliente",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });


        return false
      }else {


		if (canalcliente == "0"){
        //alert("Debes llenar el campo de Ruta")

		Swal.fire({
					 icon: "error",
					 title: "Debes llenar el campo de canal",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });
        return false
      }else {
       

		if (elemento == ""){
			
			Swal.fire({
					 icon: "error",
					 title: "Debes llenar el campo de Ruta",
				
					 showConfirmButton: true,
					 confirmButtonText: "Continuar"
					 }).then(function(result){
						if(result.value){                   
						
						}
					 });
       	 return false
		
		
		
		
		}
		
		else{return true}

        
      }


        
      }

	 
		
    }

  

</script>
		
		
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >
<div class="main-header" id="main-header">
  <nav class="navbar mynav navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="Index.php">ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</a> </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <?php
		
	//	session_start(); 
		echo "<ul class='nav navbar-nav navbar-right'>";
		
      
		  
       echo  "</ul>";
		?>
      </div>
    </div>
  </nav>
</div>

























<!--ESPACE-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">




			<form enctype="multipart/form-data" onsubmit="return desktop()" action="savenote.php" id="BuscarCliente" method="post" class="invoice-form" role="form" novalidate> 
			<div class="load-animate animated fadeInUp">
			<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="title">ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</h2><br>
			</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="">
			<div>
			<div class="form-group">


			<!-- Aca ingresar la otra tabla-->

            <div class="col-xs-10 col-sm-3 col-md-5 col-lg-5 pull-left">      
           
	 <img src="Imagen1.png" alt="Descripción de la imagen">
     <h2>Bienvenido a la Linea Etica de Mercosal ILP</h2><br>
     
        <p class="text-justify">
            
   
        <h3 class="text-justify">A continuación Ud. ingresará al formulario de reportes. Tenga a bien realizar un relato que contenga la mayor cantidad de información posible, con el objetivo de que el comité.</h3>
           
    </p> 
        
            </div>
           
        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 pull-right">
					   <!-- PANELES-->
                       
			<div class="panel panel-success">
            
				<div  class="panel-heading">Ingreso de datos</div>	
                
				<div class="panel-footer">

					 <!-- PANELES-->
				  
								<div >
												
											   
								   
								</div>
								 
								  <div class="form-group" id="contenedor">

								 
								<tr>
								
								 <Td>
<!-- FORMULARIO DE DATOS********************************************************************************************************************************************************************************-->
       

                    <div class="form-check">
                    <div class="panel-body">
                    <h5><input name="anonimo" onchange="anom(this)" class="form-check-input" type="checkbox" value="anonimo" id="anonimo">
                        <label  class="form-check-label" for="anonimo">Deseo mantenerme Anonimoㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</h5>
                        </label>
                        </div> </div>
                      

                        <div style="display: block;" id="anom1">
                                 <div class="form-group">
                                    <span class="" id="pr"><n><h5>Nombre: </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required autocomplete="off">
                                </div>
                                                                   
								<div class="form-group">
                                     <span class="" id="pr"><n><h5>Apellido:</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido" required autocomplete="off">
								</div>
                               
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>Cargo: </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="cargo" id="cargo" placeholder="Ingrese su cargo" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>Correo Electronico:</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="email" id="email" placeholder="Ingrese su correo electronico" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>Numero de Telefono:</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su numero de telefono" required autocomplete="off">
								</div>
                                
                            </div>













<h5> Seleccione que desea realizar: </h5>
<!-- FORMULARIO DE FRAUDE********************************************************************************************************************************************************************************-->
                        
                        <div class="form-check">

                        <input style="display: none;" onchange="nave(this)" class="btn-check" type="checkbox" value="Fraude" id="Fraude">
                        <label  class="" for="Fraude">
                        (lavado de dinero , robo de mercaderia , bienes o valores , gastos y compras sin autorizacion etc)ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ
                        </label>
                        <label  class="btn btn-primary btn-lg btn-block" for="Fraude"><center>Fraude economico
                        </center></label>
                        </div>

                        <div style="display: none;" id="fraude1">
                                 <div class="form-group">
                                    <span  id="pr"><n><h5>¿Qué fue lo que paso ? ¿Se relaciona con mercaderias,<br> dinero u otros valores?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c1pregunta1" id="c1pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
                                </div>
                                                                   
								<div class="form-group">
                                     <span class="" id="pr"><n><h5>¿En cuanto estima el valor del fraude/ incidente? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c1pregunta2" id="c1pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Como se llevo a cabo la irregularidad? Por favor describa lo ocurrido  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c1pregunta3" id="c1pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Dónde y cuando sucede o sucedio el hecho? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c1pregunta4" id="c1pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>Considera que existen otros involucrados en el hecho? Por favor mencioneles </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c1pregunta5" id="c1pregunta5" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c1pregunta6" id="c1pregunta6" placeholder="Ingrese respuesta"></textarea>
								</div>
                                <div class="form-group">
                                <input id="c1imagen" type="file" name="c1imagen">
								</div>
                            </div>
<!-- FORMULARIO DE CONFLICTO********************************************************************************************************************************************************************************-->
<br>
<div class="form-check">
                        <input style="display: none;" onchange="conflicto(this)" class="btn-check" type="checkbox" value="conflicto" id="conflicto_">
                        <label  class="" for="conflicto_">
                       Informar un posible conflicto de Intereses propio</label>
                        </div>
                        <label  class="btn btn-primary btn-lg btn-block" for="conflicto_">
                       <center> Informar un posible conflicto de Intereses propio</center></label>
                        </div>

                        <div style="display: none;" id="conc">
                                 <div class="form-group">
                                    <span class="" id="pr"><n><h5>Es posible conflicto de interes se presenta entre</h5> <n></span> 
                                    <select class="form-control" id="c2pregunta1" NAME="c2pregunta1" onchange="d1(this)">
                                        <option value="Seleccionar una opción">Seleccionar una opción</option>
                                        <option value="Usted y otro colaborador">Usted y otro colaborador</option>
                                        <option value="Usted y un proveedor">Usted y un proveedor</option>
                                        <option value="Usted y un contratista o distribuidor">Usted y un contratista o distribuidor </option>
                                        <option value="Usted y un cliente">Usted y un cliente </option>
                                    </select>
                                                                        
                                </div>
                                                                   
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>¿Cómo se llama la persona con la cual podria existir el conflicto de intereses? ( Informar cargo, area y empresa, en caso que este fuera proveedor indicar nombre de la empresa y sector?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c2pregunta2" id="c2pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Qué tipo de relación presenta usted con esta persona?  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c2pregunta3" id="c2pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Desde hace cuanto ocurre esta situacion? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c2pregunta4" id="c2pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Dio aviso anteriormete algun integrante de Gestion Humana, Auditoria, Jefe o Superviosor? ¿a quien? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c2pregunta5" id="c2pregunta5" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c2pregunta6" id="c2pregunta6" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c2imagen" id="c2imagen">
								</div>
                            </div>


<!-- FORMULARIO DE ADULTERIO********************************************************************************************************************************************************************************-->




<br>
<div class="form-check">
                        <input style="display: none;" onchange="adulterio(this)" class="btn-check" type="checkbox" value="adulterio_" id="adulterio_">
                        <label  class="" for="adulterio_">
                        Adulteracion de informacion contable, operativa y financiera, documentos legales y elusion de controles internos de la empresaㅤㅤㅤㅤㅤ
                        </label>
                        <label  class="btn btn-primary btn-lg btn-block" for="adulterio_">
                        Adulteracion de informacion</label>
                        </div>

                        <div style="display: none;" id="adul1">
                                 
                                                                   
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>¿En que consistio el hecho?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c3pregunta1" id="c3pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Como se llevo a cabo?   </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c3pregunta2" id="c3pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Donde y cuando sucede o sucedió el hecho?     </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c3pregunta3" id="c3pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>

                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Considera que existen otros involucrados en hecho? Por favor mencionelos . </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c3pregunta4" id="c3pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c3pregunta5" id="c3pregunta5" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c3imagen">
								</div>
                            </div>





















<!-- FORMULARIO DE ACOSO********************************************************************************************************************************************************************************-->
<br><br>
<div class="form-check">
                        <input style="display: none;" onchange="acoso(this)" class="btn-check" type="checkbox" value="acoso_" id="acoso_">
                        <label  class="" for="acoso_">
                        Acoso, discriminacion y malos tratos al persona (actos en determinado genero, etnia, nacionalidad etc) ㅤㅤㅤㅤㅤㅤㅤㅤㅤ
                        </label>
                        
                        <label  class="btn btn-primary btn-lg btn-block" for="acoso_">
                       <center> Acoso, discriminacion y malos tratos al persona </center></label>
                        </div>

                        <div style="display: none;" id="acoso1">
                                 
                                                                   
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>En que consistio el hecho? ¿se trata de un acoso , fue fisico y/o verba?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c4pregunta1" id="c4pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>Como se lleva o llevo a cabo el hecho? Por favor describa lo acurrido?   </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c4pregunta2" id="c4pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5> donde y cuando sucede o sucedio el hecho? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c4pregunta3" id="c4pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Dio aviso anteriormete algun inta que otras personas afecta el hecho y de que manera? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c4pregunta4" id="c4pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>ademas del denunciado existe otras personas involucradas ? Indique nombre/s cargo/s </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c4pregunta5" id="c4pregunta5" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c4pregunta6" id="c4pregunta6" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c4imagen" id="c4imagen">
								</div>
                            </div>






<!-- FORMULARIO DE desempeño********************************************************************************************************************************************************************************-->


<br><br>
<div class="form-check">
                        <input style="display: none;" onchange="desen(this)" class="btn-check" type="checkbox" value="desen_" id="desen_">
                        <label  class="" for="desen_">
                        Mal desempeño de empleados/colaboradores, supervisores y/o gerente (incluye abusos de poder, favoritismo , amenaza y mal comportamiento) ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ
                        </label>
                        <label  class="btn btn-primary btn-lg btn-block" for="desen_">
                        Mal desempeño de empleados/colaboradores, supervisores y/o gerente </label>
                        </div>

                        <div style="display: none;" id="desen1">
                                                    
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>¿En que consitio el hecho?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c5pregunta1" id="c5pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">¿Como se llevo a cabo el hecho ? Por favor describa lo ocurrido  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c5pregunta2" id="c5pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Donde y cuando sucede o sucedió la irregularidad? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c5pregunta3" id="c5pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Ademas del denunciado existen otras personas involucradas? Indique nombre/s cargo/s </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c5pregunta4" id="c5pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c5pregunta5" id="c5pregunta5" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c5imagen" id="c5imagen">
								</div>
                            











<!-- FORMULARIO DE Corrupcion ********************************************************************************************************************************************************************************-->


<br>
<div class="form-check">
                        <input style="display: none;" onchange="corrupto(this)" class="btn-check" type="checkbox" value="corrupto_" id="corrupto_">
                        <label  class="" for="corrupto_">
                        Corrupción y acuerdo con proveedores/clientes (incluyendo conflicto de interes) </label>
                        </div>
                        <label  class="btn btn-primary btn-lg btn-block" for="corrupto_">
                        Corrupción y acuerdo con proveedores/clientes </label>
                        </div>

                        <div style="display: none;" id="corrupto1">
                                                    
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>¿en que consistió el hecho?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c6pregunta1" id="c6pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">¿con que proveedor? Indique nombre de la empresa, de la persona de contacto , su cargo  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c6pregunta2" id="c6pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿donde y cuando sucede o sucedió el hecho? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c6pregunta3" id="c6pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Como se lleva o llevo a cabo la irregularidad? Por favor describa lo ocurrido  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c6pregunta4" id="c6pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>ademas del denunciado existen otras personas involucradas? Indique nombre/s cargo/s  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c6pregunta5" id="c6pregunta5" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c6pregunta6" id="c6pregunta6" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c6imagen" id="c6imagen">
								</div>
                            
















<!-- FORMULARIO DE Descuido********************************************************************************************************************************************************************************-->



<br><br>
<div class="form-check">
                        <input style="display: none;" onchange="desc(this)" class="btn-check" type="checkbox" value="desc_" id="desc_">
                        <label  class="" for="desc_">
                        Descuido o utilizacion inapropiada de los bienes, servicios y/o informacion de la organización </label>
                        </div>
                        <label  class="btn btn-primary btn-lg btn-block" for="desc_">
                        Descuido o utilizacion inapropiada </label>
                        </div>

                        <div style="display: none;" id="desc1">
                                                    
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>¿En que consitio el hecho?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c7pregunta1" id="c7pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">¿Como se llevo o llevá a cabo la irregularidad? Por favor describa lo ocurrido  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c7pregunta2" id="c7pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Donde y cuando sucede o sucedió la irregularidad? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c7pregunta3" id="c7pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Ademas del denunciado existen otras personas involucradas? Indique nombre/s cargo/s </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c7pregunta4" id="c7pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c7pregunta5" id="c7pregunta5" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c7imagen" id="c7imagen">
								</div>
                            </div>

                          









<!-- FORMULARIO DE robo********************************************************************************************************************************************************************************-->



<br><br>
<div class="form-check">
                        <input style="display: none;" onchange="robo(this)" class="btn-check" type="checkbox" value="robo_" id="robo_">
                        <label  class="" for="robo_">
                        Robo o sustraccion de informacion interna de la empresa  </label>
                        <label  class="btn btn-primary btn-lg btn-block" for="robo_">
                        Robo o sustraccion de informacion interna de la empresa  </label>
                        

                        <div style="display: none;" id="robo1">
                                                    
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>¿En que consitio el hecho?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c8pregunta1" id="c8pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">¿Como se llevo o llevá a cabo la irregularidad? Por favor describa lo ocurrido  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c8pregunta2" id="c8pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Donde y cuando sucede o sucedió el hecho?  </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c8pregunta3" id="c8pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>A que persona u organización esta entregando informacion? Por favor detalle nombre/s cargo/s</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c8pregunta4" id="c8pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>El implicado recibe dinero, bienes o algún premio como contraprestación? Por favor señale, si es posible, datos objetivos como objeto, fecha, monto y cómo se hace la entrega.</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c8pregunta5" id="c8pregunta5" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Qué tipo de información transmite a terceros? ¿Datos de clientes, precios, costos, productos, marcas, proveedores u otros? Detalle por favor el concepto y tipo de información.</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c8pregunta6" id="c8pregunta6" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Además del denunciado existen otras personas involucradas? Indique nombre/s, cargo/s</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c8pregunta7" id="c8pregunta7" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. DESCRIBA DETALLADAMENTE COMO SUCEDIERON LOS HECHOS  </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c8pregunta8" id="c8pregunta8" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c8imagen" id="c8imagen">
								</div>
                            </div>


















<!-- FORMULARIO DE mejora********************************************************************************************************************************************************************************-->



<br><br>
<div class="form-check">
                        <input style="display: none;" onchange="mejora(this)" class="btn-check" type="checkbox" value="mejora_" id="mejora_">
                        <label  class="" for="mejora_">
                        Mejora de Procesos   </label>
                        <label  class="btn btn-primary btn-lg btn-block" for="mejora_">
                        Mejora de Procesos   </label>
                        
                        </div>
                        

                        <div style="display: none;" id="mejora1">
                                                    
								<div class="form-group">
                                    
                                     <span class="" id="pr"><n><h5>¿Qué proceso considera que debe mejorar o está fallando?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c9pregunta1" id="c9pregunta1" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                                <div class="form-group">¿Qué falla observa dentro del proceso reportado? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c9pregunta2" id="c9pregunta2" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Qué problemas le causa a la empresa? </h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c9pregunta3" id="c9pregunta3" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Qué mejora considera que se de implementar?</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c9pregunta4" id="c9pregunta4" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>¿Quién considera responsable de la falla y de llevar adelante la mejora?.</h5> <n></span>  
									 <input  value="" type="text" class="form-control" name="c9pregunta5" id="c9pregunta5" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>
                               
                        
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c9pregunta6" id="c9pregunta6" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c9imagen" id="c9imagen">
								</div>
                            </div>


















<!-- FORMULARIO DE otros********************************************************************************************************************************************************************************-->




<br><br>
<div class="form-check">
                        <input style="display: none;" onchange="otros(this)" class="btn-check" type="checkbox" value="otros_" id="otros_">
                        <label  class="" for="otros_">
                        OTROS  </label>
                        <label  class="btn btn-primary btn-lg btn-block" for="otros_">
                        OTROS  </label>
                        </div>

                        <div style="display: none;" id="otros1">                             
                                   
                        
                                <div class="form-group">
                                     <span class="" id="pr"><n><h5>CAMPO LIBRE PARA AGREGAR OTRA INFORMACION. </h5> <n></span>  
									 <textarea  class="form-control txt" rows="5" name="c10pregunta1" id="c10pregunta1" placeholder="Ingrese los hechos.."></textarea>
								</div>
                                <div class="form-group">
                                <input type="file" name="c10imagen" id="c10imagen">
								</div>
                            </div>


                            <div class="form-group">
                                   
									 <input readonly type="hidden"  value="Images" type="text" class="form-control" name="im" id="im" placeholder="Ingrese respuesta" required autocomplete="off">
								</div>







<!-- FORMULARIO DE CONFLICTO********************************************************************************************************************************************************************************-->













<!-- FORMULARIO DE CONFLICTO********************************************************************************************************************************************************************************-->


                                <div class="form-group">
                                     <br>
                                <input id="confirmado" data-loading-text="Guardando factura..." type="submit" name="confirmado" value="Enviar" class="btn btn-warning btn-lg btn-block">	
                            
                            </div>
						


								<div class="form-group"  autocomplete="off">

							

								</div>
								<div class="form-group">

													


													


																		
														
														
														
													
															
														</div>

									
								</div>

								</div>   


								</div></div></div>
								

							
							   <!-- </form> !-->
							   

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div>
							<div class= "form-group">
						
														
														</div>


									


								
							</div>
							</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			</div>
				
			</div>
			</div>
			<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				
				
			</div>
			</div>
		
			<div class="">	
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				
				<br>
				<div class="form-group">
					
				
				
								
				</div>
				
			</div>
			
			</div>
			<div class="clearfix"></div>		      	
			</div>
			</form>
			
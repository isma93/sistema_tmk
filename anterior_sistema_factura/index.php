<?php session_start(); ?>
<!--Account log-->
<?php if(isset($_SESSION['AccountLogin']))
 {
  $module = $_SESSION['AccountLogin'];
 }else{header("Location:./resources/appcode/login/login.php");}?>
 <!-----------END------------>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/loading.css">
    <link rel="stylesheet" href="./css/IframeResponsive.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Evolution<br>anime store</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="#" onclick="Dashboard()">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="#" onclick="Order()">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Ordenes</span>
       </a>
       <span class="tooltip">Ordenes</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' onclick="Products()"></i>
         <span class="links_name">Inventarios</span>
       </a>
       <span class="tooltip">Inventarios</span>
     </li>
     <li>
       <a href="#" onclick="Analisis()">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analisis</span>
       </a>
       <span class="tooltip">Analisis</span>
     </li>
      <li>
       <a href="#">
         <i class='bx bx-user' onclick="Usuarios()"></i>
         <span class="links_name">Usuarios</span>
       </a>
       <span class="tooltip">Usuarios</span>
     </li>
     <li>
       <a href="#" onclick="About()">
         <i class='bx bx-chat' ></i>
         <span class="links_name">About</span>
       </a>
       <span class="tooltip">About</span>
     </li>
     <li>
       <a href="#" onclick="Setting()">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name"><?php if(empty($_SESSION['nombre_empleado'])){ }else{echo $_SESSION['nombre_empleado'];}?></div>
             <div class="job">Usuario</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <section class="home-section">
    <!--FORM CLASS-------------------------------------->
    <script>
            function Order()
            {
              
              if (<?php echo $module;?>===1){
                var ruta="./Static/Order.php";
                var iframe = document.getElementById("Myframe");
                iframe.setAttribute("src", ruta);
                loader();
              }
            }
    </script>
      <script>
            function Dashboard()
            {
                var ruta="./Static/Dashboard.php";
                var iframe = document.getElementById("Myframe");
                iframe.setAttribute("src", ruta);
                loader();
            }
    </script>
    <script>
            function About()
            {
                var ruta="./Static/About.php";
                var iframe = document.getElementById("Myframe");
                iframe.setAttribute("src", ruta);
                loader();
            }
    </script>
    <script>
            function Analisis()
            {
                var ruta="./resources/fragments/tableflotant.php";
                var iframe = document.getElementById("Myframe");
                iframe.setAttribute("src", ruta);
                loader();
            }
    </script>
     <script>
            function Setting()
            {
                var ruta="./Static/Setting.php";
                var iframe = document.getElementById("Myframe");
                iframe.setAttribute("src", ruta);
                loader();
            }
    </script>
    <script>
            function Usuarios()
            {
                var ruta="./Static/Usuarios.php";
                var iframe = document.getElementById("Myframe");
                iframe.setAttribute("src", ruta);
                loader();
            }
    </script>
    <script>
            function Products()
            {
                var ruta="./Static/Products.php";
                var iframe = document.getElementById("Myframe");
                iframe.setAttribute("src", ruta);
                loader();
            }
    </script>
   
    
    
   <div id='loading' style="top:200px"></div>
   <div id='appwrapper'>
    <iframe id="Myframe" onload="preloader();" class="responsive-iframe"  src="./static/Dashboard.php" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    

    <!--FORM CLASS-------------------------------------->
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }


  //user account modules


  //Loading deff iframe

 
      // <![CDATA[
      function preloader(){
        document.getElementById('loading').style.display = 'none';
        document.getElementById('appwrapper').style.display = 'block';
      }//preloader
      function loader()
      {
        document.getElementById('loading').style.display = 'block';
        document.getElementById('appwrapper').style.display = 'none';
      }
      window.onload = preloader;
      // ]]>
    


  </script>

</body>
</html>
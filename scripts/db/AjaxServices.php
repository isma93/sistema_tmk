    
    
    <script  src="../Toast.js"></script>
     <!--Ajax-->
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    function Insert_tbl_test(id,name) {
        
        var parametros = {"id":id,"name":name};
    $.ajax({
        data:parametros,
        url:'../../resources/appcode/db/PhpServices.php',
        type: 'post',
        beforeSend: function () {
          dangertoast("SAVE"+id); 
        },
        success: function (response) {   
          successtoast("SAVE"+name); 
        }
    });

    }


    </script>
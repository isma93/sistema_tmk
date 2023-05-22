function validarImagen(idinputfile){
    
      
    var Document =document.getElementById("txtimagen");
    var filePath = Document.value;
    var allowedExtensions =/(\.png|\.jpeg|\.jpg)$/i;
    
    if (allowedExtensions.exec(filePath))
        { 
            return true;  
        }  
        else{
            dangertoast("La Imagen cargada debe estar en extensión /jpeg /png /jpg")
            Document.value='';
            return false;
        }
}
    

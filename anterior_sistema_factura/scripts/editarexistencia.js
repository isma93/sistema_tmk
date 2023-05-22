function ponerReadOnly(idstock, i)
    {
        // Ponemos el atributo de solo lectura
        $("#"+idstock).attr("readonly","readonly");
        // Ponemos una clase para cambiar el color del texto y mostrar que
        // esta deshabilitado
        $("#"+idstock).addClass("readOnly");
    }
 
    function quitarReadOnly(idstock, i)
    {
        // Eliminamos el atributo de solo lectura
        $("#"+idstock).removeAttr("readonly");
        // Eliminamos la clase que hace que cambie el color
        $("#"+idstock).removeClass("readOnly");
    }

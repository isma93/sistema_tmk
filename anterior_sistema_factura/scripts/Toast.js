
     function warningtoast(msg){
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.progressBar='true';
        toastr["warning"](msg)
        toastr.options = 
        { 
            "closeButton": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "0",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
    function successtoast(msg){
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.progressBar='true';
                toastr["success"](msg)

        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    }
    function dangertoast(msg){
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.progressBar='true';
                toastr["error"](msg)

        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    }
/* function questiontoast(){
    toastr["info"]('<div>¿Es inventario nuevo?</a></div><div><button type="button" id="SI" class="btn btn-primary">SI</button><button type="button" id="NO" class="btn btn-danger" style="margin: 0 8px 0 8px">NO</button></div>')

    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
} */
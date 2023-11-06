$(document).ready(function(){
	fnListadoOrdenado(false, "#divListaOrdenar");
})

function fnListadoOrdenado(flag,zona){
	$.ajax({
        url: 'hub/hub.php',
        data: { "funcion": "fnListaConceptos",
        	    "flag": flag
        	    
        		
              },
           type: 'POST',
        dataType: 'html',
        cache:false,
        async:false
         }).done(function(data){
         	$(zona).html(data);
         });
}

$(document).on("keypress", ".solonumero", "", function(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    });   

$(document).on("click", ".youtube", "", function(){
  var boolean=true;
  $(".solonumero").each(function(){
    if($.trim($(this).val()).length==0)
      boolean=false;
  })
  if(boolean==false){
    alertas("Debe ingresar el orden en todos los items", "error");
    return 0;
  }
  $("#divListaOrdenar > .comment").each(function(){
    if($(this).data("orden")==$(this).find(".solonumero").val())
      $(this).find(".resultado").html('<i class="fa fa-check-square c-success f-30" aria-hidden="true"></i>');
    else
      $(this).find(".resultado").html('<i class="fa fa-exclamation-triangle c-error f-30" aria-hidden="true"></i>');
  })
  fnListadoOrdenado(true,"#divListaOrdenada");
  var elemento=1; $(".cuadrado").each(function(){$(this).text(elemento); elemento++})
})

function alertas(texto, type) {
   toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "rtl": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "timeOut": 0,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

toastr[type](texto, "");
}

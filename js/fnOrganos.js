// function para cargar los elementos de la página
$(document).ready(function(){
	fnImagenesDescripciones();
	fnPalabras();
	
})

function fnImagenesDescripciones(){
	$.ajax({
        url: 'hub/hub.php',
        data: { "funcion": "fnViewImagenesDescripciones",
        		
              },
           type: 'POST',
        dataType: 'html',
        cache:false,
        async:false
         }).done(function(data){
         	$("#divOrganos	").html(data);
         });
}

function fnPalabras() {
	$.ajax({
        url: 'hub/hub.php',
        data: { "funcion": "fnViewPartes",
        		
              },
           type: 'POST',
        dataType: 'html',
        cache:false,
        async:false
         }).done(function(data){
         	$("#divPartes").html(data);
         });
}

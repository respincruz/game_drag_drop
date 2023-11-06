<?php 
require("../clases/c_game.php");
$o_game=new c_game();

switch ($_POST["funcion"]) {
	case 'fnViewZonas': call_user_func(array($o_game, "fnViewZonas"));
	break;
	
	case 'fnParesConceptos': call_user_func(array($o_game, "fnParesConceptos"));
	break;
	case 'fnRespuestas': call_user_func(array($o_game, "fnRespuestas"));
	break;
	case "fnListaConceptos": call_user_func(array($o_game, "fnListaConceptos"), $_POST["flag"]);
	break;
	case "fnViewImagenesDescripciones": call_user_func(array($o_game, "fnViewImagenesDescripciones"));
	break;
	case "fnViewPartes": call_user_func(array($o_game, "fnViewPartes"));
	break;
}
?>
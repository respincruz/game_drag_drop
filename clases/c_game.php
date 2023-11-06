<?php 
class c_game{
	function fnViewZonas(){
		$data = @file_get_contents('../json/opciones.json');
		$items = json_decode($data, true);
		shuffle($items);
		$data=@file_get_contents('../json/imagenes.json');
		$images= json_decode($data, true);
		shuffle($images);
		$html='';
		for($i=0; $i<count($items); $i++){
		  $html.='<div class="row active-with-click">
				        <div class="col-md-4 col-sm-6 col-xs-12">
				            <article class="material-card '.$items[$i]["color"].' mc-active m-b-0">
				                <h2>
				                    <span>'.$items[$i]["lblHeader"].'</span>
				                    <strong>
				                        <i class="fa fa-fw fa-star"></i>
				                        '.$items[$i]["lblSubHeader"].'
				                    </strong>
				                </h2>
				                <div class="mc-content">
				          
				                    <div class="mc-description">
				                      '.$items[$i]["Body"].'
				                    </div>
				                </div>
				          
				          
				            </article>
				        </div>

				        <div class="col-md-4 col-sm-6 col-xs-12 border-gris p-0 dropBox answer ui-droppable vcenter text-center f-bold f-20" data-idzona="'.$items[$i]["id"].'">
				            <span class="comment">Arrastre la imagen Correcta</span>
				            <div><span class="flagresultado"></span></div>
				        </div>

				        <div class="col-md-4 col-sm-6 col-xs-12 p-10 option ui-droppable   dropBox ">
				            <div class="card ui-draggable ui-draggable-handle">
				                    <img class="img-responsive border-gris " data-idimage="'.$images[$i]["id"].'" src="'.$images[$i]["image"].'">
				            </div>
				        </div>
				    </div>';
		}
		echo $html;
		
	}

	function fnViewPiezas(){
		$data = @file_get_contents('../json/opciones.json');
		$items = json_decode($data, true);
		shuffle($items);
		$html='';
		for($i=0;$i<count($items);$i++){
			$html.='  <div class="'.$items[$i]["ancho"].' option ui-droppable   dropBox ">
				            <div class="card ui-draggable ui-draggable-handle techo_negro">
				                   
				            </div>
				        </div>';
		}
	}

	function fnParesConceptos(){
		$data = @file_get_contents('../json/pares.json');
		$items = json_decode($data, true);
		shuffle($items);

		$html='<div class="row bg-gris m-b-20 "> 
					<div class="col-md-12 bd-gris">
						<h3 class="f-bolder ">Roles</h3>
					</div>
			   </div>';
		for($i=0;$i<count($items);$i++){
			if($i%2==0)
				$html.='<div class="row ">';
			$html.='<div class="col-md-6 col-sm-6 col-xs-12">
			            <article class="material-card '.$items[$i]["color"].' mc-active" id="'.trim($items[$i]["id"]).'">
			                <h2>
			                    <span>'.$items[$i]["lblHeader"].'</span>
			                    
			                </h2>
			                <div class="mc-content">
			                   
			                    <div class="mc-description">
			                    	<div class="row p-20">';
			                    	for($j=0;$j<12;$j++)
			                    		$html.='<div class="col-md-3 dropBox answer ui-droppable h-40 vcenter text-center" data-grupo_id="'.$items[$i]["id"].'"></div>';
			                $html.='</div>

			                    </div>
			                </div>
			                <!--<a class="mc-btn-action">
			                    <i class="fa fa-bars"></i>
			                </a>-->
			                <div class="mc-footer">
			                    <h4>Resultados
			                    </h4>
			                    <a class="bg-success"> <span class="fa fa-square-o fa-stack-2x"></span>
			  
										    <strong class="fa-stack-1x">
										        0    
										    </strong>
								</a>
			                    <a class="bg-error"> <span class="fa fa-square-o fa-stack-2x"></span>
			  
										    <strong class="fa-stack-1x">
										        0   
										    </strong>
								</a>
			                  
			                </div>
			            </article>
			        </div> ';


			if(($i+1)%2==0 || ($i+1)==count($items))
				$html.='</div>';
		}

		echo $html;

	}

	///function para cargar las preguntas
	function fnRespuestas(){
		$data = @file_get_contents('../json/pares_descripciones.json');
		$items = json_decode($data, true);
		shuffle($items);

		$html='<div class="row comment bg-red"> 
					<div class="col-md-12">
						<h3 class="f-bolder c-white">Responsabilidades</h3>
					</div>
			   </div>';
		for($i=0;$i<count($items);$i++){
			$html.='<div class="row comment">
						<div class="col-md-2 formulation f-bolder text-center option ui-droppable   dropBox">
							<div class="formulation f-bolder text-center card ui-draggable ui-draggable-handle" data-grupo="'.trim($items[$i]["group_id"]).'">	
								'.strtoupper(base_convert($i+10, 10, 36)).'
							</div>
						</div>
						<div class="col-md-10 f-11 f-bolder">'.$items[$i]["lblSummary"].
						'</div>
					</div>';
		}
		
		echo $html;
	}

	function fnListaConceptos($flag_orden){
		$data = @file_get_contents('../json/lista.json');
		$items = json_decode($data, true);
		$html='';

		if($flag_orden=="false"){
			shuffle($items);
			$htmlcolumn1='<div class="quantity">
	  							<input type="number" class="solonumero">
							</div>';
			$col_width_desc=10;
			$html.='<div class="row comment bg-red"> 
					<div class="col-md-12">
						<h3 class="f-bolder c-white">Ordenar</h3>
					</div>
			   </div>';
		}
		else{
			$htmlcolumn1='<div class="cuadrado text-center c-white f-bolder"></div>';
			$col_width_desc=11;
			$html.='<div class="row comment bg-red"> 
					<div class="col-md-12">
						<h3 class="f-bolder c-white">Orden Correcto</h3>
					</div>
			   </div>';
		}
       
		
		for($i=0;$i<count($items);$i++){
			$html.='<div class="row comment" data-orden="'.$items[$i]["orden"].'">
						<div class="col-md-1">
							'.$htmlcolumn1.'
						</div>
						<div class="col-md-'.$col_width_desc.'">'.$items[$i]["lblSummary"].'</div>';
						if($flag_orden=="false")
						  $html.='<div class="col-md-1 resultado" ></div>';
				    $html.='</div>';
		}
		echo $html;
	}




	function fnViewImagenesDescripciones(){
		$data = @file_get_contents('../json/organos.json');
		$items = json_decode($data, true);
		shuffle($items);

		$html='<div class="row bg-gris m-b-20 "> 
					<div class="col-md-12 bd-gris">
						<h3 class="f-bolder ">Organos</h3>
					</div>
			   </div>';

		

		for($i=0;$i<count($items);$i++){
			if($i%4==0)
				$html.='<div class="row ">';
			$html.='<div class="col-md-3 col-sm-3 col-xs-12">
			            <article class="material-card '.$items[$i]["color"].' mc-active" id="'.trim($items[$i]["id"]).'">
			                <h2 class="height-50">
			                    <span></span>
			                    
			                </h2>
			                <div class="mc-content">
			                   
			                    <div class="mc-description">
			                    	<div class="row p-20">
			                    		<div class="col-md-12">
			                    			<img src="'.$items[$i]["imagen"].'">
			                    		</div>


			                    	</div>

			                    </div>
			                </div>
			                <!--<a class="mc-btn-action">
			                    <i class="fa fa-bars"></i>
			                </a>-->
			                <div class="mc-footer">
			                    <h4>Resultados
			                    </h4>
			                    <a class="bg-success"> <span class="fa fa-square-o fa-stack-2x"></span>
			  
										    <strong class="fa-stack-1x">
										        0    
										    </strong>
								</a>
			                    <a class="bg-error"> <span class="fa fa-square-o fa-stack-2x"></span>
			  
										    <strong class="fa-stack-1x">
										        0   
										    </strong>
								</a>
			                  
			                </div>
			            </article>
			        </div> ';


			if(($i+1)%4==0 || ($i+1)==count($items))
				$html.='</div>';
		}

		echo $html;
	}

	function fnViewPartes(){
		$html='<div class="row">';
		$data = @file_get_contents('../json/partes_organos.json');
		$items = json_decode($data, true);
		shuffle($items);
		
		$array_colors=array("bg-red", "bg-blue", "bg-gris", "bg-blue2", "bg-pink", "bg-purple", "bg-deep-purple", "bg-indigo");
		shuffle($array_colors);

		for($i=0;$i<count($items);$i++){
			$html.='<div class="col-md-1 f-12 f-bolder ui-draggable ui-draggable-handle c-white p-t-7 '.$array_colors[$i].'" id="'.$items[$i]["id"].'">'.$items[$i]["lblHeader"].'</div>';
		}
		$html.='</div>';
		echo $html;
	}
}
?>
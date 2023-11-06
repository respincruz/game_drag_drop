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

		$html='';
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

		$html='';
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
}
?>
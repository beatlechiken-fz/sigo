<?php

function creaFormulario($nombre,$accion,$metodo,$javascript){
	$html = '<form name="' . $nombre . '" action="' . $accion . '" method="' . $metodo . '" ';
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . ' >';
	echo $html;
}


function creaCampoTexto($nombre,$valor,$ancho,$caracteresMaximos,$tipoDato,$clases,$estilos,$javascript){
	$html = '<input type="text" name="' . $nombre . '" id="' . $nombre . '" maxlength="' . $caracteresMaximos . '" value="' . $valor . '" onblur="validaCampo(this,' . $tipoDato . ');" ';
	if($clases!=""){
		$html = $html . ' class="' . $clases . '" ';	
	}
	if($estilos!=""){
		$html = $html . ' style="width:' . $ancho . '; ' . $estilos . '" ';	
	}else{
		$html = $html . ' style="width:' . $ancho . ';" ';	
	}
	if($esLectura==true){
		$html = $html . ' readonly="true" ';	
	}
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . ' />';
	echo $html;
}


function creaCampoPassword($nombre,$valor,$ancho,$caracteresMaximos,$tipoDato,$clases,$estilos,$javascript){
	$html = '<input type="password" name="' . $nombre . '" id="' . $nombre . '" maxlength="' . $caracteresMaximos . '" value="' . $valor . '" onblur="validaCampo(this,' . $tipoDato . ');" ';
	if($clases!=""){
		$html = $html . ' class="' . $clases . '" ';	
	}
	if($estilos!=""){
		$html = $html . ' style="width:' . $ancho . '; ' . $estilos . '" ';	
	}else{
		$html = $html . ' style="width:' . $ancho . ';" ';	
	}
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . ' />';
	echo $html;
}


function creaCampoOculto($nombre,$valor,$javascript){
	$html = '<input type="hidden" name="' . $nombre . '" id="' . $nombre . '" value="' . $valor . '" ';
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . ' />';
	echo $html;
}

function creaBotonImagen($nombre,$accion,$valor,$color,$clases,$estilos,$javascript){
	if($accion == "Submit"){
		$html = '<input name="' . $nombre . '" id="' . $nombre . '" type="submit" ';
	}elseif($accion == "Reset"){
		$html = '<input name="' . $nombre . '" id="' . $nombre . '" type="reset" ';		
	}else{
		$html = '<input name="' . $nombre . '" id="' . $nombre . '" type="button" ';	
	}
	$html = $html . ' value="' . $valor . '" ';
	if($clases!=""){
		$html = $html . ' class="' . $clases . '" ';	
	}
	if($estilos!=""){
		$html = $html . ' style="' . $estilos . '" ';	
	}else{
		$html = $html . ' style="background:url(../imagenes/boton_' . $color . '_centro.png) repeat-x;" ';	
	}
	$html = $html . ' ';
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . ' />';
	echo $html;
}


function creaBotonRadio($nombre,$valor,$clases,$estilos,$seleccionado,$javascript){
	$html = '<input type="radio" name="' . $nombre . '" id="' . $nombre . '" value="' . $valor . '" ';
	if($seleccionado==true){
		$html = $html . ' checked="checked" ';	
	}
	if($clases!=""){
		$html = $html . ' class="' . $clases . '" ';	
	}
	if($estilos!=""){
		$html = $html . ' style="' . $estilos . '" ';	
	}
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . ' /> ' . $valor;
	echo $html;
}


function creaCheckBox($nombre,$valor,$clases,$estilos,$seleccionado,$javascript){
	$html = '<input type="checkbox" name="' . $nombre . '" id="' . $nombre . '" value="' . $valor . '" ';
	if($seleccionado==true){
		$html = $html . ' selected ';	
	}
	if($clases!=""){
		$html = $html . ' class="' . $clases . '" ';	
	}
	if($estilos!=""){
		$html = $html . ' style="' . $estilos . '" ';	
	}
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . ' />';
	echo $html;
}


function creaTextArea($nombre,$valor,$ancho,$alto,$clases,$estilos,$javascript){
	$html = '<textarea name="' . $nombre . '" id="' . $nombre . '" value="' . $valor . '" ';
	if($clases!=""){
		$html = $html . ' class="' . $clases . '" ';	
	}
	if($estilos!=""){
		$html = $html . ' style="width:' . $ancho . '; height:' . $alto . '; ' . $estilos . '" ';	
	}else{
		$html = $html . ' style="width:' . $ancho . '; height:' . $alto . ';" ';	
	}
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' >';	
	}else{
		$html = $html . ' >';
	}
	$html = $html . $valor;
	$html = $html . ' </textarea>';
	echo $html;
}


function creaListaDesplegable($nombre,$valores,$ancho,$clases,$estilos,$javascript){
	$html = '<select name="' . $nombre . '" id="' . $nombre . '" ';
	if($clases!=""){
		$html = $html . ' class="' . $clases . '" ';	
	}
	if($estilos!=""){
		$html = $html . ' style="width:' . $ancho . '; height:' . $alto . ' ' . $estilos . '" ';	
	}else{
		$html = $html . ' style="width:' . $ancho . ';" ';	
	}
	if($javascript!=""){
		$html = $html . ' ' . $javascript . ' ';	
	}
	$html = $html . '>';
	foreach ($valores as $opcion) {
			$valor = substr($opcion,0,strpos($opcion,","));
			$seleccionado = substr($opcion,strpos($opcion,",")+1);
			if(seleccionado == true){
				$html = $html . '<option selected="selected" value="' . $valor . '">' . $valor . '</option>';
			}else{
				$html = $html . '<option value="' . $valor . '">' . $valor . '</option>';
			}
	}
	$html = $html . '</select>';
	echo $html;
}

?>


<?php
include("basedatos.php");

//Función para fijar una variable en sesión
function fijaVariableSesion($variable,$valor){
	session_start();
	$_SESSION[$variable] = $valor;
}

//Función para obtener una variable de sesión
function obtenVariableSesion($variable){
	session_start();
	return $_SESSION[$variable];
}


//Funcion para general un panel de avisos
//Parametros: categoria - Indica la categoria del mensaje
function generaPanelAvisos($categoria){
	$linkBD = conectaBD();
	
	$rstResultado = selecionaDatos("flujo.venta,flujo.clave,flujo.fecha_vencimiento,flujo.observaciones","avisos","avisos.estado = 'A' AND avisos.tipo='".$categoria."'","flujo","avisos.id_flujo = flujo.id_flujo","");			
	while($avisos = mysql_fetch_array($rstResultado)){
		$rstResultado2 = selecionaDatos("clientes.nombre,clientes.cliente","ventas","ventas.venta = '".$avisos["venta"]."'","clientes","ventas.cliente = clientes.cliente","");			
		$cliente = mysql_fetch_array($rstResultado2);
		mysql_free_result($rstResultado2);
		$rstResultado2 = selecionaDatos("productos.descripcion,productos.precio,productos.moneda","productos","productos.clave = '".$avisos["clave"]."'","","","");			
		$producto = mysql_fetch_array($rstResultado2);
		mysql_free_result($rstResultado2);

		if($categoria == "D"){
			$html = $html . "<img src='imagenes/repliega_panel.png' style='float:left; margin-left:7px;'/><span class='categoria'>Dominios a caducar</span><br/><br/>";
			if($avisos["observaciones"]!=""){
				$html = $html . "<span class='aviso'>".$avisos["observaciones"]."</span><br/>";
			}
            $html = $html . "<span class='aviso'>".$cliente["cliente"]."-".$cliente["nombre"]."</span><br/>";
			$html = $html . "<span class='productoAviso'>".$producto["descripcion"]."</span><br/>";
			$html = $html . "<span class='productoAviso'>$".$producto["precio"]." ".$producto["moneda"];
			if($producto["moneda"]=="usd"){
				$rstResultado2 = selecionaDatos("monedas.valor","monedas","monedas.moneda = '".$producto["moneda"]."'","","","");			
				$moneda = mysql_fetch_array($rstResultado2);
				mysql_free_result($rstResultado2);
				$html = $html . "($".$producto["precio"]*$moneda["valor"].")</span><br/>";
			}else{
				$html = $html . "</span><br/>";
			}
            $html = $html . "<span class='fechaAviso'>Vencimiento: ".substr($avisos["fecha_vencimiento"],0,10)."</span><br/>";
			$html = $html . "<img src='imagenes/mail_send.png' style='margin-left:15px; float:left;'/>".
                            "<img src='imagenes/revisar.png' style='float:left; margin-left:7px;'/>".
                            "<img src='imagenes/detalle.png' style='float:left; margin-left:7px;'/>";
		}
		if($categoria == "H"){$html = $html . "<span class='categoria'>Hosting a caducar</span><br/><br/>";}
		if($categoria == "C"){$html = $html . "<span class='categoria'>Pendientes de cobro</span><br/><br/>";}
		if($categoria == "F"){$html = $html . "<span class='categoria'>Financieros</span><br/><br/>";}
		if($categoria == "P"){$html = $html . "<span class='categoria'>Proyectos</span><br/><br/>";}	
	}
	
	echo $html;
	
	mysql_free_result($rstResultado);
	mysql_close($linkBD);
}


function creaOperaciones($valores,$tipo){
	$html = "<span class='titulo'>" . $valores['titulo'] . "</span><br/>";
	//if($rol=='Administrador'){
	if($tipo == "listado"){
		$html = $html . '<div style="float:left; width:350px;">';
			$html = $html . '<img id="nuevo" src="imagenes/agregar.png" style="border:0px;" onmouseover="asignaEventoNuevo(1,\'nuevo\');"/>';
			$html = $html . '<img id="eliminar" src="imagenes/eliminar.png" style="border:0px;"/>';		
		$html = $html . '</div><br/><br/><br/>';
	}
	//}
	
	echo $html;
}


function creaEncabezados($valores){
	$html = '<table class="listado" cellspacing="0"><tr class="encabezado">';
	$html = $html . '<td style="width:30px" class="celdaEncabezado">&nbsp;</td>';
	foreach ($valores as $columna) {
		$titulo = substr($columna,0,strpos($columna,":"));
		$ancho = substr($columna,strpos($columna,":")+1);
		$html = $html . '<td style="width:' . $ancho . 'px" class="celdaEncabezado">' . $titulo . '</td>';
	}
	$html = $html . '<td style="width:50px" class="celdaEncabezado">&nbsp;</td>';
	$html = $html . '</tr>';
	echo $html;
}


function creaListado($rstResultado,$valores){
	$numFila = 1;

	while($filasInformacion = mysql_fetch_array($rstResultado)){
		if($numFila%2 == 0){
			$html = $html . '<tr class="filaListadoPar">';	
		}else{
			$html = $html . '<tr class="filaListadoImpar">';		
		}
		$html = $html . '<td>a</td>'; 
		foreach ($valores as $columna) {
			$html = $html . '<td>' . $filasInformacion[$columna] . '</td>';
		}
		$html = $html . '<td><img src="imagenes/detalle.png" style="float:left; margin-left:7px;" id="detalle' . $filasInformacion[0] . '"/></td>';
		$html = $html . '</tr>';
		$numFila++;
	}
	$html = $html . '</table>';
	echo $html;
}


?>


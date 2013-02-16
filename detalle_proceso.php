<?php
include("basedatos.php");
include("formularios.php");

function obtenDetalleCliente($cliente){
	$linkBD = conectaBD();
	
	$rstResultado = selecionaDatos("clientes.cliente, clientes.nombre, clientes.direccion, clientes.telefono, clientes.celular, clientes.correo, clientes.fecha_registro, clientes.estado, clientes.observaciones","clientes","cliente = '".$cliente."'","","","");			
	$valores = array("cliente","nombre","direccion","telefono","celular","correo","fecha_registro","estado","observaciones");
    $etiquetas = array("Clave de cliente","Nombre","Dirección","teléfono","Celular","Correo electrónico","Fecha de registro","Estado","Observaciones");
	$html = $html . '<ul class="tabs">';
	$html = $html . '<li><a href="javascript:tabSwitch(1, 2, \'tab_\', \'content_\');" id="tab_1" class="active">Información del cliente</a></li>';  
    $html = $html . '<li><a href="javascript:tabSwitch(2, 2, \'tab_\', \'content_\');" id="tab_2">Productos adquiridos</a></li>';
	$html = $html . '</ul>';
	
	$html = $html . '<div id="content_1" class="content">';
	$html = $html . muestraDetalle($rstResultado,$valores,$etiquetas);
	$html = $html . '</div>';
	mysql_free_result($rstResultado);
	
	$rstResultado = ejecutaConsulta("SELECT flujo.observaciones,flujo.fecha_vencimiento,productos.descripcion FROM ventas INNER JOIN flujo ON ventas.venta = flujo.venta INNER JOIN productos ON flujo.clave = productos.clave WHERE cliente = '".$cliente."'");			
	$valores = array("descripcion","observaciones","fecha_vencimiento");
    $etiquetas = array("Descripción del producto","Obesrvaciones","Fecha de vencimiento");
	$html = $html . '<div id="content_2" class="content">';
	$html = $html . muestraDetalle($rstResultado,$valores,$etiquetas);
	$html = $html . '</div>';
	mysql_free_result($rstResultado);
	
	mysql_close($linkBD);
	return $html;
}


function obtenDetalleHosting($id_flujo){
	$linkBD = conectaBD();
	
	$rstResultado = ejecutaConsulta("SELECT flujo.id_flujo, flujo.venta, flujo.clave, productos.descripcion, flujo.importe, flujo.iva, flujo.descuento, flujo.observaciones,flujo.tipo_descuento,flujo.fecha_registro,flujo.fecha_vencimiento FROM flujo INNER JOIN productos ON flujo.clave = productos.clave WHERE id_flujo = '".$id_flujo."'");			
	$valores = array("id_flujo","venta","clave","descripcion","importe","iva","descuento","tipo_descuento","observaciones","fecha_registro","fecha_vencimiento");
    $etiquetas = array("Id del flujo","Venta asociada","Clave del producto","Descrición del producto","Subtotal","I.V.A.(16%)","Descuento","Tipo de descuento","Observaciones","Fecha de creación","Vigencia del servicio");
	$html = $html . muestraDetalle($rstResultado,$valores,$etiquetas,"Información del servicio");
	mysql_free_result($rstResultado);
	
	mysql_close($linkBD);
	return $html;
}



function muestraDetalle($rstResultado,$valores,$etiquetas){
	while($filasInformacion = mysql_fetch_array($rstResultado)){
		$i=0;
		$html = $html . '<br/>';
		$html = $html . '<table class="tablaDetalle" cellspacing="0">';
		foreach($valores as $columna){
			
			if ($i % 2 == 0){
				$html = $html . '<tr class="filaParDetalle">';	
			}else{
				$html = $html . '<tr class="filaImparDetalle">';
			}
			$html = $html . '<td class="etiquetaDetalle">' . $etiquetas[$i] . '</td>';
			$html = $html . '<td class="datoDetalle">' . $filasInformacion[$columna] . '</td>';
			$html = $html . '</tr>';
			$i++;
		}
		$html = $html . '</table>';
	}
	$html = $html . '<br/>';
	return $html;
}


function obtenDetalleBClientes($criterio){
	$linkBD = conectaBD();
	
	$rstResultado = selecionaDatos("clientes.cliente, clientes.nombre","clientes","cliente like '%".$criterio."%' OR nombre like '%".$criterio."%'","","","");			
	$html = $html . '<table>' .
						'<tr style="background:#009;">' .
					 		'<td>Cliente</td>' .
							'<td>Nombre</td>' .
						'</tr>' ;
						$i = 1;
						while($filasInformacion = mysql_fetch_array($rstResultado)){
							if($i%2==0){
								$html = $html . '<tr style="background:#CCF">';
							}else{
								$html = $html . '<tr style="background:#FFF">';
							}
							$html = $html . '<td><a href="javascript: if (navigator.appName == '."\'".'Microsoft Internet Explorer'."\'".'){document.frames['."\'".'iframeOculto'."\'".'].location='."\'".'detalle.php?seleccionado='.$filasInformacion["cliente"]."\'".';}else{document.getElementById('."\'".'objectOculto'."\'".').data='."\'".'detalle.php?seleccionado='.$filasInformacion["cliente"]."\'".';} cierraCapa(); ">'.$filasInformacion["cliente"].'</a></td>' .
											'<td>'.$filasInformacion["nombre"].'</td>' .
							'</tr>';
							$i++;						
						}
	$html = $html . '</table>';
	
	
	mysql_free_result($rstResultado);
		
	mysql_close($linkBD);
	return $html;	
	
	
}

?>
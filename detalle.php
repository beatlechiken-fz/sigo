<?php 
include("detalle_proceso.php"); 

echo '<div id="contenidoDetalle" class="tabbed_box">';
echo '<img id="cerrar" src="imagenes/cerrar.png" style="border:0px; float:left;" onmouseover="asignaEventoCerrar();"/><br/>';
echo '<div class="tabbed_area">';

if($_GET['detalle']=="cliente"){ 
	echo obtenDetalleCliente($_GET['id']);
}
if($_GET['detalle']=="hosting"){ 
	echo obtenDetalleHosting($_GET['id']);
}
if($_GET['detalle']=="BClientes"){
	echo obtenDetalleBClientes($_GET['criterio']);
}
echo '</div></div>';

?>


<?php
/* Principio: Zona para importar librerias y fijar valores globales */
include("funciones.php");
include("formularios.php");

$tituloPagina = "Edición de Hosting y Dominios";
$ruta = "";

require("header.php");
/* Fin: Zona para importar librerias y fijar valores globales */
?>

    <div style="width:100%;">
    	<div id="contenidoCuerpo">
        
        	<!-- Principio: Se genera el panel lateral -->
        	<div id="panelIzquierdo">
                <div id="panelIzquierdoInterior">
                    <?php generaPanelAvisos("D");?><br/><br/><br/>
                </div>
            </div>
            <!-- Fin: Se genera el panel lateral -->
            
            <!-- Principio: Se genera el formulario de clientes -->
            <div id="listado">
                <?php
				$valores = array("titulo"=>$tituloPagina);
				creaOperaciones($valores,"edicion");
				$linkBD = conectaBD();
				$rstResultado2 = selecionaDatos("*","flujo","","","","");			

				echo "</br>";
				
				creaFormulario("hosting","edicion_proceso.php","POST");
				
					/* Principio: Creación de campos */
					echo "<div class='etiquetaCampo'>Cliente:&nbsp;&nbsp;</div>" . "<table><tr><td>";
					echo creaCampoTexto("cliente","","150px",60,"alfanumerico","campoDatos",""); 
					echo "</td><td>" . 
						 '<img src="imagenes/detalle.png" style="float:left; margin-left:7px;" onClick="valor = document.getElementById(\'cliente\').value; if (navigator.appName == \'Microsoft Internet Explorer\'){document.frames[\'iframeOculto\'].location=\'detalle.php?detalle=BClientes&criterio=\'+valor;}else{document.getElementById(\'objectOculto\').data=\'detalle.php?detalle=BClientes&criterio=\'+valor;} document.getElementById(\'oculta\').style.width=\'100%\'; document.getElementById(\'oculta\').style.height=\'100%\'; document.getElementById(\'detalle\').style.width=\'600px\'; document.getElementById(\'detalle\').style.height=\'500px\'; document.getElementById(\'detalle\').style.padding=\'7px 0 0 7px\';"/>' . "</td></tr></table><br/><br/>";
					
					echo "<div class='etiquetaCampo' style='line-height:20px;'>Productos:&nbsp;&nbsp;</div>";
							  echo "<div class='panelSubCategoria'><span class='subCategoria'>Dominios</span><span class='etiquetaSubtotalCat'>&nbsp;&nbsp;Subtotal&nbsp;&nbsp;</span>&nbsp;&nbsp;<span class='valorSubtotalCat'>$</span><span class='valorSubtotalCat' id='subtotalDominios'>0.00</span><br/>";	
							  echo "<hr class='divisionSubCategoria'/><br/>";
							  $rstResultado = selecionaDatos("*","productos","clave like 'DMN%'","","","");	  
							  while($producto = mysql_fetch_array($rstResultado)){
									echo creaCheckBox($producto["clave"],"","","","",'onClick="calculaTotales(\'' . $producto["clave"] . '\');"') . "<span class='tituloProducto'>" . $producto["descripcion"] . "</span><br/><br/>";
									echo "<table><tr><td>"; 
									echo "<td>Duración:&nbsp;&nbsp;</td><td>";
									echo creaCampoTexto("d".$producto["clave"],"1","50px",60,"alfanumerico","campoDatos","",'onFocus="fijaAnterior(document.getElementById(\'d'.$producto["clave"].'\').value);" onChange="calculaPrecio(\'' . $producto["clave"] . '\');"') . "&nbsp;Años";
									echo "</td></tr></table><br/>";
									if($producto["moneda"]=="usd"){
										$rstResultado3 = selecionaDatos("valor","monedas","moneda = 'usd'","","","");
										$moneda = mysql_fetch_array($rstResultado3);
										$precio = $moneda["valor"] * $producto["precio"];	
										mysql_free_result($rstResultado3);
									}else{
										$precio = $producto["precio"];
									}
									if($producto["iva"]>0){
										$iva = ($moneda["iva"] / 100) * $precio;	
									}else{
										$iva = "0.00";
									}
									echo "<span class='etiquetaDinero'>Precio:</span> <span class='valorDinero'>$</span><span class='valorDinero' id='p".$producto["clave"]."'>".$precio."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										  <span class='etiquetaDinero'>IVA:</span> <span class='valorDinero'>$</span><span class='valorDinero' id='i".$producto["clave"]."'>".$iva."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										  <span class='etiquetaSubtotal'>Subtotal:</span> <span class='valorSubtotal'>$</span><span class='valorSubtotal' id='s".$producto["clave"]."'>".($precio+$iva)."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/>";
							  }
							  mysql_free_result($rstResultado);
							  echo "</div>";
					
					
					echo "<div class='etiquetaCampo' style='line-height:20px;'>Tipo de venta:&nbsp;&nbsp;</div>" . 
						 creaBotonRadio("tipo","Venta","","",true,"") . creaBotonRadio("tipo","Cotización","","margin-left:20px;",false,"") . creaBotonRadio("tipo","Factura","","margin-left:20px;",false,"") . "<br/><br/>";
					
					echo "<div class='etiquetaCampo'>Observaciones:&nbsp;&nbsp;</div>" . 
						 creaTextArea("observaciones","","500px","100px","","border:#999 solid 1px;","") . "<br/><br/>";
					/* Fin: Creación de campos */
					
					/* Principio: Botones de accion de formulario */
					echo creaBotonImagen("cancelar","","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancelar","","botonFormulario","background:url(imagenes/boton_cancelar_rojo.png);",'onmouseover="asignaEventoNuevo(2,\'cancelar\');"') . 
					 	 creaBotonImagen("limpiar","Reset","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limpiar","","botonFormulario","background:url(imagenes/boton_limpiar_gris.png);","") . 
						 creaBotonImagen("enviar","Submit","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar","","botonFormulario","background:url(imagenes/boton_guardar_naranja.png); color:#FFF; margin-left:15px;","") . "<br/><br/><br/>";
					/* Fin: Botones de accion de formulario */
					
				echo "</form>";
				
				mysql_free_result($rstResultado2);
				mysql_close($linkBD);
				?>
            </div>
            <!-- Fin: Se genera el formulario de clientes -->
            
        </div>
    </div>   
    
    <?php 
		creaFormulario("oculto","edicion_proceso.php","POST"); 
		creaCampoOculto("id","","");
		echo "</form>";
	?>    
</body>

</html>

<?php require("scripts/operaciones.php"); ?>
<script language="javascript" src="scripts/procesos.js"></script>
<script language="javascript">fijaPagina("hosting");</script>
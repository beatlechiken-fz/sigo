<?php
/* Principio: Zona para importar librerias y fijar valores globales */
include("funciones.php");
include("formularios.php");

$tituloPagina = "Edición de Clientes";
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
				$rstResultado2 = selecionaDatos("*","clientes","","","","");			

				echo "</br>";
				
				creaFormulario("cliente","edicion_proceso.php","POST");
				
					/* Principio: Creación de campos */
					echo "<div class='etiquetaCampo'>Nombre completo:&nbsp;&nbsp;</div>" . 
						 creaCampoTexto("nombre","","350px",60,"alfanumerico","campoDatos","") . "<br/><br/>";
					
					echo "<div class='etiquetaCampo'>Dirección:&nbsp;&nbsp;</div>" . 
						 creaCampoTexto("direccion","","500px",60,"alfanumerico","campoDatos","") . "<br/><br/>";
					
					echo "<div class='etiquetaCampo'>Teléfono:&nbsp;&nbsp;</div>" . 
						 creaCampoTexto("telefono","","200px",60,"alfanumerico","campoDatos","") . "<br/><br/>";
					
					echo "<div class='etiquetaCampo'>Celular:&nbsp;&nbsp;</div>" . 
						 creaCampoTexto("celular","","200px",60,"alfanumerico","campoDatos","") . "<br/><br/>";
					
					echo "<div class='etiquetaCampo'>Correo electrónico:&nbsp;&nbsp;</div>" . 
						 creaCampoTexto("correo","","300px",60,"alfanumerico","campoDatos","") . "<br/><br/>";
					
					echo "<div class='etiquetaCampo' style='line-height:20px;'>Estado:&nbsp;&nbsp;</div>" . 
						 creaBotonRadio("estado","Activo","","",true,"") . creaBotonRadio("estado","Inactivo","","margin-left:20px;",false,"") . "<br/><br/>";
					
					echo "<div class='etiquetaCampo'>Observaciones:&nbsp;&nbsp;</div>" . 
						 creaTextArea("observaciones","","500px","100px","","border:#999 solid 1px;","") . "<br/><br/>";
					/* Fin: Creación de campos */
					
					/* Principio: Botones de accion de formulario */
					echo creaBotonImagen("cancelar","","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancelar","","botonFormulario","background:url(imagenes/boton_cancelar_rojo.png);",'onmouseover="asignaEventoNuevo(2,\'cancelar\');"') . 
					 	 creaBotonImagen("limpiar","Reset","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limpiar","","botonFormulario","background:url(imagenes/boton_limpiar_gris.png);","") . 
						 creaBotonImagen("enviar","Submit","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar","","botonFormulario","background:url(imagenes/boton_guardar_naranja.png); color:#FFF; margin-left:15px;","") . "<br/><br/><br/>";
					/* Fin: Botones de accion de formulario */
					
				echo "</form>";
				
				mysql_free_result($rstResultado);
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
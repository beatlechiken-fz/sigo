<?php require("variablesGlobales.php"); ?>

<script language="javascript">
	var modalidad;
	
	function asignaEventoNuevo(modo,elemento){
		modalidad = modo;
		if (document.getElementById(elemento).addEventListener) {
			document.getElementById(elemento).addEventListener("click", nuevoRegistro, false);
		} else {
			document.getElementById(elemento).attachEvent("onclick", nuevoRegistro);
		}
	}
	
	function nuevoRegistro(){
		if(modalidad == 1){		
			<?php 
			foreach($paginasEditar as $detalle => $pagina){
				if(obtenVariableSesion('detalle')==$detalle){
				?>
					window.location = '<?php echo $pagina; ?>';
				<?php
				}
			}
			?>
		}
		if(modalidad == 2){		
			<?php 
			foreach($paginasCancelar as $detalle => $pagina){
				if(obtenVariableSesion('detalle')==$detalle){
				?>
					window.location = '<?php echo $pagina; ?>';
				<?php
				}
			}
			?>
		}
	} 
	
	
	
	
</script>
	
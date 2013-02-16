<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<!--Encabezado, css y scripts-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIGO - <?php echo $tituloPagina; ?></title>
    <script language="javascript" src="<?php echo $ruta;?>scripts/fecha.js"></script>
    <?php if ($tituloPagina == "Clientes"){ ?>
    	<script language="javascript" src="<?php echo $ruta;?>scripts/funciones_listados.js"></script>
	<?php } ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $ruta;?>imagenes/favicon.ico" />
    <link href="<?php echo $ruta;?>css/diastra.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $ruta;?>css/sigo.css" rel="stylesheet" type="text/css"/>
    <script language="javascript">
		function cierraCapa(){ 
			document.getElementById('oculta').style.width='0'; 
			document.getElementById('oculta').style.height='0'; 
			document.getElementById('detalle').style.width='0'; 
			document.getElementById('detalle').style.height='0'; 
			document.getElementById('detalle').style.padding='0';
			document.getElementById('detalle').style.padding='0';
			var detalle = document.getElementById("detalle");
			var contenidoDetalle = document.getElementById("contenidoDetalle");
			detalle.removeChild(contenidoDetalle);	 
		}
		
		function asignaEventoCerrar(){
			if (document.getElementById('cerrar').addEventListener) {
				document.getElementById('cerrar').addEventListener('click',cierraCapa,false);	
			}else{
				document.getElementById('cerrar').attachEvent("onclick", cierraCapa);	
			}
		}
		
		function callkeydownhandler(evnt){
			var ev = (evnt) ? evnt : event;
   			var code=(ev.which) ? ev.which : event.keyCode;
   			if(code==27){ 
				document.getElementById('oculta').style.width='0'; 
				document.getElementById('oculta').style.height='0'; 
				document.getElementById('detalle').style.width='0'; 
				document.getElementById('detalle').style.height='0'; 
				document.getElementById('detalle').style.padding='0';
				document.getElementById('detalle').style.padding='0';
				var detalle = document.getElementById("detalle");
				var contenidoDetalle = document.getElementById("contenidoDetalle");
				detalle.removeChild(contenidoDetalle);
			}
		}
		
		if (window.document.addEventListener) {
 		  	window.document.addEventListener("keydown", callkeydownhandler, false);
		} else {
   			window.document.attachEvent("onkeydown", callkeydownhandler);
		}
		
	</script>
</head>

<!--Cuerpo de la pagina-->
<body>
	
    <div id="oculta"></div>
    <div id="detalle"></div>
    
    <div id="header">
    	<div id="contenido">
        	<img src="<?php echo $ruta;?>imagenes/logo_sigo.png" style="width:450px; height:87px; float:left;"/>
            
            <div id="sesion">
            	<table style="width:100%;">
                    <tr>
                        <td style="text-align:right;">Morelia, M&eacute;xico;</td>
                        <td style="width:36px;"><img src="<?php echo $ruta;?>imagenes/mexico.JPG" style="width:35px; height:35px;" alt="M&eacute;xico"/></td>
                        <td style="text-align:right; width:3px; border-right:#FFF dotted 2px;">&nbsp;</td>
                        <td style="width:36px;"><img src="<?php echo $ruta;?>imagenes/mexico.JPG" style="width:35px; height:35px;" alt="M&eacute;xico"/></td>
                    </tr>
                </table>
            </div>
            
            <div id="menu">
                <table style="height:30px; border:0px;" cellpadding="0" cellspacing="0">
                    <tr style="text-align:center;">
                    	<?php 
						$menus = array("Inicio","Hosting y dominios","Clientes","Repores","Utilidades");
						$menusURL = array("inicio.php","hosting.php","clientes.php","reportes.php","utilidades.php");
						for($i=0;$i<count($menus);$i++)
							if(stristr($tituloPagina,$menus[$i])!=false){
						?>
                        		<td class="menuActivoIzquierdo">&nbsp;&nbsp;</td>
	        	                <td class="menuActivoCentro"><?php echo $menus[$i];?></td>
    		                    <td class="menuActivoDerecho">&nbsp;&nbsp;&nbsp;</td>
                        <?php
							}else{
						?>
                        		<td class="menuInactivo"><a href="<?php echo $ruta.$menusURL[$i];?>"><?php echo $menus[$i];?></a></td>
                        <?php
							}
						?>
                    </tr>
                </table>
            </div>
        </div>	
    </div>
    
    <div id="sombra"></div>


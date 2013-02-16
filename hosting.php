<?php
/* Principio: Zona para importar librerias y fijar valores globales */
include("funciones.php");
include("formularios.php");

$tituloPagina = "Hosting y dominios";
$ruta = "";

require("header.php");

fijaVariableSesion("detalle","hosting");
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
            
            <!-- Principio: Se genera el listado de clientes -->
            <div id="listado">
                <?php
				$valores = array("titulo"=>$tituloPagina);
				creaOperaciones($valores,"listado");
				$valores = array("Cliente:75","Producto:200","Observaciones:250","Vigencia:100");
				creaEncabezados($valores);
				$linkBD = conectaBD();
				$rstResultado2 = ejecutaConsulta("SELECT flujo.id_flujo,ventas.cliente,productos.descripcion,flujo.observaciones,flujo.fecha_vencimiento FROM ventas INNER JOIN flujo ON ventas.venta = flujo.venta INNER JOIN productos ON flujo.clave = productos.clave");			
				$valores = array("cliente","descripcion","observaciones","fecha_vencimiento");
				creaListado($rstResultado2,$valores);
				mysql_free_result($rstResultado);
				mysql_close($linkBD);
				?>
            </div>
            <!-- Fin: Se genera el listado de clientes -->
            
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

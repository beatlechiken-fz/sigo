<?php
/* Principio: Zona para importar librerias y fijar valores globales */
include("funciones.php");
include("formularios.php");

$tituloPagina = "Clientes";
$ruta = "";

require("header.php");

fijaVariableSesion("detalle","cliente");
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
				$valores = array("Cliente:125","Nombre:200","Ingreso:200","Estado:60");
				creaEncabezados($valores);
				$linkBD = conectaBD();
				$rstResultado2 = selecionaDatos("clientes.cliente, clientes.nombre, clientes.fecha_registro, clientes.estado","clientes","","","","");			
				echo '<script language="javascript">numRegistros = ' . obtenNumeroDeRegistros($rstResultado2) . ';</script>';
				echo '<script language="javascript">det = "' . obtenVariableSesion('detalle') . '";</script>';
				$valores = array("cliente","nombre","fecha_registro","estado");
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

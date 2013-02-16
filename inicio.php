<?php
include("funciones.php");
$tituloPagina = "Inicio";
$ruta = "";
require("header.php");
?>

    <div style="width:100%;">
    	<div id="contenidoCuerpo">
        	
        	<table style="text-align:left;">
            	<tr>
                	<td class="panelAvisos">
                    	<?php generaPanelAvisos("D");?>
                    </td>
                    <td style="width:240px; border-right:#CCC solid 1px; padding-right:10px; padding-left:10px;"></td>
                    <td style="width:240px; padding-left:10px;"></td>
                </tr>
            </table>
            
        </div>
    </div>   
        
</body>

</html>

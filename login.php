<?php
include("formularios.php");
?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Acceso al SIGO</title>
    <link rel="stylesheet" type="text/css" href="css/sigo.css"/>
</head>

<body>

	<div id="accesoSuperior">
    	<img src="imagenes/logo_sistema.png"/>
        <h2>Sistema Integral para<br/>la Gestión de Operaciones</h2>
        <h1>Bienvenido<br/><span>Acceso al sistema</span></h1>
    </div>
    
    <div id="accesoInferior">
    	<div>
        	<img src="imagenes/logo_diastra.png"/>
            <?php creaFormulario("login","login_proceso.php","POST"); ?>
            <table>
                <tr>
                    <td>Usuario:&nbsp;&nbsp;</td><td><?php creaCampoTexto("usuario","","250px",30,"alfanumerico","","height:35px;"); ?></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td>Contraseña:&nbsp;&nbsp;</td><td><?php creaCampoPassword("pass","","250px",30,"alfanumerico","","height:35px;"); ?></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                	<td colspan="2"><?php creaBotonImagen("ingresar","Submit","Ingresar","","","background:url(imagenes/boton_ingreso_plata.png); width:200px; height:35px; border:0px; font-family:'Trebuchet MS'; font-size:16px;",""); ?></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    
</body>

</html>
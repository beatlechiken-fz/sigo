<?php
include("basedatos.php");

if(isset($_POST['usuario'])){
	if(isset($_POST['pass'])){
		$linkBD = conectaBD();
		$rstResultado = selecionaDatos("usuario,pass,estado","usuarios","usuario='".$_POST['usuario']."' AND pass='".$_POST['pass']."'","","","");			
		if(mysql_num_rows($rstResultado)>0){
			$usuario = mysql_fetch_array($rstResultado);
			if($usuario['estado']=="A"){
				header('Location: inicio.php');	
			}else{
				echo "El usuario esta desactivado";		
			}
		}else{
			echo "No existe el usuario";	
		}
		mysql_free_result($rstResultado);
		mysql_close($linkBD);
		
	}
}else{
			
}
?>
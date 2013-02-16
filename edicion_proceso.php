<?php
include("funciones.php");

$linkBD = conectaBD();

if(obtenVariableSesion("detalle") == "cliente"){
	$tabla = "clientes";
	$rstResultado2 = selecionaDatos("MAX(current_id) as maximo","tablas","tabla = 'clientes'","","","");
	$max_id = mysql_fetch_array($rstResultado2);
	$cliente = "C" . ($max_id["maximo"] + 1); 
	if($_POST['estado'] == "Activo"){
		$estado = "A";
	}else{
		$estado = "I";
	}
	$valores = array("cliente"=>$cliente,
					 "nombre"=>$_POST['nombre'],
					 "direccion"=>$_POST['direccion'],
					 "telefono"=>$_POST['telefono'],
					 "celular"=>$_POST['celular'],
					 "correo"=>$_POST['correo'],
					 "fecha_registro"=>date("Y:m:d H:i:s"),
					 "estado"=>$estado,
					 "observaciones"=>$_POST['observaciones']);
	$tabla_update = "tablas";
	$valores_update = array("current_id"=>($max_id["maximo"] + 1));
	$condicion = "tabla = 'clientes'";
	$archivo_redireccion = "clientes.php";
	$actualizar_id = true;	
	mysql_free_result($rstResultado2);			 
}

creaRegistro($tabla,$valores);

if($actualizar_id){
	actualizaRegistro($tabla_update,$valores_update,$condicion);
}

header("Location:" . $archivo_redireccion);

mysql_close($linkBD);

?>
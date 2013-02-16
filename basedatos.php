<?php

include("configuraciones.php");

//Función para conectar a la base de datos
function conectaBD(){
   if (!($link= mysql_connect(SERVIDOR,USUARIO,PASSWORD)))
   {
      echo "Error al conectar con la base de datos.";
      exit();
   }
   if (!mysql_select_db(BD,$link))
   {
      echo "Error no se puede seleccionar la base de datos.";
      exit();
   }
   return $link;
}


//Funcion para insertar en una tabla
function creaRegistro($tabla,$valores){
	foreach ($valores as $campo => $valor) {
		$camposInsertar = $camposInsertar . $campo . ",";
		$valoresInsertar = $valoresInsertar . "'" . $valor . "',";
	} 
	$camposInsertar = substr($camposInsertar,0,strlen($camposInsertar)-1);
	$valoresInsertar = substr($valoresInsertar,0,strlen($valoresInsertar)-1);
	return mysql_query("INSERT INTO " . $tabla . "(" . $camposInsertar . ") VALUES(" . $valoresInsertar . ")");
}


//Funcion para actualizar registros
function actualizaRegistro($tabla,$valores,$condicion){
	foreach ($valores as $campo => $valor) {
		$informacionActualizar = $informacionActualizar . " SET " . $campo . "='" . $valor . "',";
	} 
	$informacionActualizar = substr($informacionActualizar,0,strlen($informacionActualizar)-1);
	if($condicion != ""){
		$sql = "UPDATE " . $tabla . " " . $informacionActualizar . " WHERE " . $condicion;
	}else{
		$sql = "UPDATE " . $tabla . " " . $informacionActualizar;	
	}

	return mysql_query($sql);
}


//Funcion para eliminar registros
function eliminaRegistro($tabla,$condicion){
	if($condicion != ""){
		$sql = "DELETE FROM " . $tabla . " WHERE " . $condicion;
	}else{
		$sql = "DELETE FROM " . $tabla;	
	}
	return mysql_query($sql);
}


//Funcion para seleccionar
function selecionaDatos($seleccionCampos,$tabla,$condicionConsulta,$tablaJoin,$condicionJoin,$otros){
	$sql = "SELECT " . $seleccionCampos . " FROM " . $tabla . " ";
	if ($tablaJoin != "" || $condicionJoin != ""){
		$sql = $sql . " INNER JOIN " . $tablaJoin . " ON " . $condicionJoin . " ";
	}
	if ($condicionConsulta != ""){
		$sql = $sql . " WHERE " . $condicionConsulta . " ";
	}
	$rst = mysql_query($sql);	return $rst;
}


//Funcion para seleccionar libremente
function ejecutaConsulta($sql){
	$rst = mysql_query($sql);
	return $rst;
}


//Funcion para obtener el numero de registros
function obtenNumeroDeRegistros($rst){
	$num = mysql_num_rows($rst);
	return $num;
}

?>

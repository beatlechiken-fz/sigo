var anterior;
var paginaActual;

function fijaAnterior(valorAnterior){
	anterior = valorAnterior;
}

function fijaPagina(pagina){
	paginaActual = pagina;
	asignaEventosCarga();
}

function calculaPrecio(clave){
	if(document.getElementById('d'+clave).value > 0){
		precio = document.getElementById('p'+clave).innerHTML / anterior;	
		iva = document.getElementById('i'+clave).innerHTML / anterior;
		document.getElementById('p'+clave).innerHTML = document.getElementById('d'+clave).value * precio;
		document.getElementById('i'+clave).innerHTML = document.getElementById('d'+clave).value * iva;
		document.getElementById('s'+clave).innerHTML = (document.getElementById('d'+clave).value * precio) + (document.getElementById('d'+clave).value * iva);
	}
}

function calculaTotales(clave){
	subtotalItem = document.getElementById('s'+clave).innerHTML;
	if(document.getElementById(clave).checked == true){	
		document.getElementById('subtotalDominios').innerHTML = (parseFloat(document.getElementById('subtotalDominios').innerHTML) + parseFloat(subtotalItem));
	}else{
		document.getElementById('subtotalDominios').innerHTML = (parseFloat(document.getElementById('subtotalDominios').innerHTML) - parseFloat(subtotalItem));
	}
}

//Principio: Asignación de eventos en tiempo de carga
function asignaEventosCarga(){
	if (document.addEventListener) {
		if(paginaActual=="hosting"){ 
			window.addEventListener("load", iniciaValoresHosting, false);
		} 
	} else {
		if(paginaActual=="hosting"){ 
			window.attachEvent("onload", iniciaValoresHosting);
		} 
	}
}
//Fin: Asignación de eventos en tiempo de carga

function iniciaValoresHosting(){

}
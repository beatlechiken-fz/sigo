addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  var ob;
  var iterador = 1;
  var f = 1;
  var letraDetalle;
  if (det = "cliente"){ letraDetalle = "C" }
  
  while(f<=numRegistros)
  {
	ob=document.getElementById('detalle'+letraDetalle+iterador);
	if(ob != null) {
		addEvent(ob,'click',presionDetalle,false);
		f++;
	}
	iterador++;
  }
}


var conexion1;
function presionDetalle(e) 
{
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  if (det == "cliente"){
  	conexion1.open("GET", "detalle.php?id=" + (e.target.id).replace("detalle","") + "&detalle=" + det, true);
  }
  conexion1.send(null);
}

function procesarEventos()
{
  var detalles = document.getElementById("detalles");
  if(conexion1.readyState == 4)
  {
	document.getElementById('oculta').style.width = '100%'; 
	document.getElementById('oculta').style.height = '100%'; 
	document.getElementById('detalle').style.width = '800px'; 
	document.getElementById('detalle').style.height = '500px'; 
	document.getElementById('detalle').style.padding = '7px 0 0 7px';
	leftD = (document.getElementById('detalle').style.width).replace("px","") / 2 * (-1);	
	document.getElementById('detalle').style.marginLeft = leftD + 'px';
	topD = (document.getElementById('detalle').style.height).replace("px","") / 2 * (-1);	
	document.getElementById('detalle').style.marginTop = topD + 'px'; 
	document.getElementById('detalle').innerHTML = conexion1.responseText;
  } 
  else 
  {
	//detalles.innerHTML = 'Cargando...';
  }
}

//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
	elemento.attachEvent('on'+nomevento,funcion);
	return true;
  }
  else  
	if (elemento.addEventListener)
	{
	  elemento.addEventListener(nomevento,funcion,captura);
	  return true;
	}
	else
	  return false;
}

function crearXMLHttpRequest() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
	xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else 
	if (window.XMLHttpRequest) 
	  xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}


function tabSwitch(active, number, tab_prefix, content_prefix) {  
    for (var i=1; i < number+1; i++) {  
      document.getElementById(content_prefix+i).style.display = 'none';  
      document.getElementById(tab_prefix+i).className = '';  
    }  
    document.getElementById(content_prefix+active).style.display = 'block';  
    document.getElementById(tab_prefix+active).className = 'active';  
}
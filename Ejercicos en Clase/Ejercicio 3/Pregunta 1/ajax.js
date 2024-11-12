// function Pregunta1() {
// 	var contenedor;
// 	contenedor = document.getElementById('contenido');
// 	var ajax = new XMLHttpRequest() //crea el objetov ajax 
// 	ajax.open("get", 'delete.php?id='+idPersona, true);
// 	ajax.onreadystatechange = function () {
// 		if (ajax.readyState == 4) {
	
// 			contenedor.innerHTML = ajax.responseText
// 		}
// 	}
// 	ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
// 	ajax.send();
// }
varTurno='x';
function cargarContenido(abrir) {
	var contenedor;
	contenedor = document.getElementById('contenido');
	var ajax = new XMLHttpRequest() //crea el objetov ajax 
	ajax.open("get", abrir, true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
            console.log(ajax)
			console.log(abrir)
			console.log(contenedor)

			
			contenedor.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
	ajax.send();
}

function controlarTurno(idBoton) {
    var boton = document.getElementById(idBoton);
    var mensaje = document.getElementById('mensaje');
    if(	boton.innerHTML.trim()==''){
        boton.innerHTML=varTurno;
        if(varTurno=='x'){
            varTurno='o';
        }
        
        else{
            varTurno='x';

        }
		mensaje.innerHTML = "Turno " + varTurno.toUpperCase();
    }

    
}

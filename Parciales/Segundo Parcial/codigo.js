function cargarBotones() {
    var botones = document.getElementById("menu");
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var response = ajax.responseText;
            
            botones.innerHTML = response;
            console.log(response);
        }
    };
    ajax.send();
}

function pregunta(numero) {
    var historial = document.getElementById("historial"); 
    if (!historial) {
        console.error("No se encontró el elemento con id 'historial'.");
        return;
    }

    var nombre = "Shariel Aylin Verduguez Choquevillca"; 
    var carnet = "35-5629";
    if (!document.getElementById("infoUsuario")) {
        var infoElemento = document.createElement("div");
        infoElemento.id = "infoUsuario";
        infoElemento.textContent = "Mi nombre es: " + nombre + " y mi carnet es: " + carnet;
        historial.appendChild(infoElemento);
    }

    var nuevaPregunta = document.createElement("div");
    nuevaPregunta.textContent = "Pregunta " + numero;

    historial.appendChild(nuevaPregunta);
    if (numero === 1) {
        pregunta1();
    } else if (numero === 2) {
        pregunta2();
    } else if (numero === 3) {
        pregunta3();
    } else if (numero === 4) {
        pregunta4();
    } else if (numero === 5) {
        pregunta5();
    } else {
        console.warn("Número de pregunta no tiene función asociada.");
    }

}

function pregunta2(){
    var principal = document.getElementById("principal");
    principal.innerHTML = `
                <label>Tabla del</label>
                <input type="number" id="tabla" placeholder="Número" value="5">
                <label>Suma</label>
                <input type="checkbox" id="suma">
                <label>Resta</label>
                <input type="checkbox" id="resta">
                <label>Multiplicar</label>
                <input type="checkbox" id="multiplicar">
                <label>Dividir</label>
                <input type="checkbox" id="dividir">
                <label>Hasta el</label>
                <input type="number" id="hasta" placeholder="Número" value="4">
                <button onclick="calcular()">Calcular</button>
                <div id="resultado"><div>
            `;
}

function calcular() {
    const tabla = parseInt(document.getElementById("tabla").value);
    const hasta = parseInt(document.getElementById("hasta").value);
    const suma = document.getElementById("suma").checked;
    const resta = document.getElementById("resta").checked;
    const multiplicar = document.getElementById("multiplicar").checked;
    const dividir = document.getElementById("dividir").checked;

    let htmlTabla = `<table><thead><tr><th>#</th><th>Operación</th><th>${tabla}</th><th>=</th><th>Resultado</th></tr></thead><tbody>`;

    for (let i = 1; i <= hasta; i++) {
        if (suma) {
            htmlTabla += `<tr><td>${i}</td><td>+</td><td>${tabla}</td><td>=</td><td>${i + tabla}</td></tr>`;
        }
        if (resta) {
            htmlTabla += `<tr><td>${i}</td><td>-</td><td>${tabla}</td><td>=</td><td>${i - tabla}</td></tr>`;
        }
        if (multiplicar) {
            htmlTabla += `<tr><td>${i}</td><td>*</td><td>${tabla}</td><td>=</td><td>${i * tabla}</td></tr>`;
        }
        if (dividir) {
            htmlTabla += `<tr><td>${i}</td><td>/</td><td>${tabla}</td><td>=</td><td>${(i / tabla).toFixed(2)}</td></tr>`;
        }
    }

    htmlTabla += `</tbody></table>`;
    document.getElementById("resultado").innerHTML = "";
    document.getElementById("resultado").innerHTML = htmlTabla;
}



function pregunta5() {
    var formulario = document.getElementById('principal');
    formulario.innerHTML = "";

    var ajax = new XMLHttpRequest();
    ajax.open("GET", "colores.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            formulario.innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

function cambiarColor() {
    var seccion = document.getElementById('seccion').value; 
    var color = document.getElementById('color').value;    

    if (seccion && color) {
        var elemento = document.getElementById(seccion);
        if (elemento) {
            elemento.style.backgroundColor = color;
        } else {
            console.error("Sección no encontrada:", seccion);
        }
    }
}

function pregunta4() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "forminserar3.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("principal").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

function registrarLibros(event) {
    event.preventDefault();

    var form = document.getElementById('formularioLibros');
    var formData = new FormData(form);

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "registrar.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            listarLibros();
        }
    };
    ajax.send(formData);
}

function listarLibros() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "listar.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("resultado").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

function pregunta3() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "imagen.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("principal").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

document.addEventListener('DOMContentLoaded', function() {
    const imagenes = [
        "imagenes/arquitecturacomputadoras.jpg",
        "imagenes/bigdata.jpg",
        "imagenes/captacha.jpg",
    ];

    let indiceActual = 0;

    const imagenElemento = document.getElementById('imagen-libro');
    const siguienteBtn = document.getElementById('siguiente-btn');

    if (siguienteBtn) {
       
        function cambiarImagen() {
           
            indiceActual = (indiceActual + 1) % imagenes.length;
            
            imagenElemento.src = images[indiceActual];
        }

        siguienteBtn.addEventListener('click', cambiarImagen);
    } else {
        console.error('Botón "Siguiente" no encontrado');
    }
});
function login() {
    document.getElementById('loginModal').style.display = 'flex';
}

function closeLoginModal() {
    document.getElementById('loginModal').style.display = 'flex';
}


function authenticate() {

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;


    if (!username || !password) {
        alert('Por favor, complete todos los campos');
        return;
    }


    const formData = new URLSearchParams();
    formData.append('usuario', username);
    formData.append('password', password);


    fetch('authenticate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: formData.toString()
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Bienvenido, ${data.nombrecompleto}`);
            console.log('Datos del usuario:', data);


            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('BotonLogin').innerHTML = `<div style="margin-left: 620px; background-color: rgb(231, 225, 225);border: 1px solid rgb(231, 225, 225); border-radius: 10px ; padding: 8px;">${username}</div>`;
            console.log(username);
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

function cargar(pagina){
    fetch(pagina)
    .then(response => response.text())
    .then(data => {
        document.getElementById('contenido').innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}

function calcular() {
    const a = parseFloat(document.getElementById('a').value);
    const b = parseFloat(document.getElementById('b').value);
    const c = parseFloat(document.getElementById('c').value);

    const discriminante = b * b - 4 * a * c;

    let x1, x2;

    if (discriminante > 0) {
        x1 = (-b + Math.sqrt(discriminante)) / (2 * a);
        x2 = (-b - Math.sqrt(discriminante)) / (2 * a);
    } else if (discriminante === 0) {
        x1 = x2 = -b / (2 * a);
    } else {
        const parteReal = (-b / (2 * a)).toFixed(2);
        const parteImaginaria = (Math.sqrt(-discriminante) / (2 * a)).toFixed(2);
        x1 = `${parteReal} + <span style="color: red;">${parteImaginaria}i</span>`;
        x2 = `${parteReal} - <span style="color: red;">${parteImaginaria}i</span>`;
    }

    document.getElementById('raiz1').innerHTML = `x1 = ${x1}`;
    document.getElementById('raiz2').innerHTML = `x2 = ${x2}`;
}

let colorSeleccionado = null; 
function cargarColores() {
    const colores = [
        "#FF0000", "#00FF00", "#0000FF", "#FFFF00",
        "#FFA500", "#800080", "#FFC0CB", "#A52A2A",
        "#808080", "#00FFFF", "#4B0082", "#C0C0C0",
        "#008080", "#800000", "#FFD700", "#000000"
    ];
    const contenido = document.getElementById('contenido'); 
    contenido.innerHTML = ""; 
    const tabla = document.createElement('table');

    let index = 0;
    for (let i = 0; i < 4; i++) {
        const fila = document.createElement('tr');
        for (let j = 0; j < 4; j++) {
            const celda = document.createElement('td');
            celda.style.backgroundColor = colores[index];
            celda.innerText = colores[index];
            celda.style.cursor = "pointer";

    
            celda.onclick = function () {
                seleccionarColor(this);
            };
            fila.appendChild(celda);
            index++;
        }
        tabla.appendChild(fila);
    }

    contenido.appendChild(tabla); 
}

let primerClicContenido = true
function seleccionarColor(celda) {
    
    colorSeleccionado = celda.style.backgroundColor;
    alert(`Color seleccionado: ${colorSeleccionado}`);

    
    const elementos = ["pie", "BotonLogin", "nav", "contenido", "menu"];
    elementos.forEach(id => {
        const elemento = document.getElementById(id);
        if (elemento) {
            elemento.onclick = function () {
                cambiarColor(this, elementos);
            };
        }
    });
}

function cambiarColor(elemento, elementos) {

    if (elemento.id === "contenido" && primerClicContenido) {
        primerClicContenido = false; 
        return;
    }

    if (colorSeleccionado) {
        elemento.style.backgroundColor = colorSeleccionado;


        elementos.forEach(id => {
            const elem = document.getElementById(id);
            if (elem) {
                elem.onclick = null; 
            }
        });


        colorSeleccionado = null;
        primerClicContenido = true;
    } else {
        alert("Primero selecciona un color.");
    }
}

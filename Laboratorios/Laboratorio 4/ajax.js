function mostrarCorreosEntrada(tipo) {
    fetch(`get_correos.php?tipo=${tipo}`)
        .then(response => response.json())
        .then(data => {
            let tabla = `<table>
                            <tr>
                                <th>Correo</th>
                                <th>Asunto</th>
                                <th>Estado</th>
                                <th>Operación</th>
                            </tr>`;
            data.forEach(correo => {
                tabla += `<tr>
                            <td>${correo.correo}</td>
                            <td>${correo.asunto}</td>
                            <td>${correo.estado}</td>
                            <td><button onclick="verMensaje(${correo.id})">Ver</button></td>
                          </tr>`;
            });
            tabla += `</table>`;
            document.getElementById("tabla-correos").innerHTML = tabla;
        })
        .catch(error => {
            console.error("Error al cargar los correos:", error);
        });
}

function mostrarCorreosSalida(tipo) {
    fetch(`get_mensaje.php?tipo=${tipo}`)
        .then(response => response.json())
        .then(data => {
            let tabla = `<table>
                            <tr>
                                <th>Correo</th>
                                <th>Asunto</th>
                                <th>Estado</th>
                                <th>Operación</th>
                            </tr>`;
            data.forEach(correo => {
                tabla += `<tr>
                            <td>${correo.correo}</td>
                            <td>${correo.asunto}</td>
                            <td>${correo.estado}</td>
                            <td><button onclick="verMensaje(${correo.id})">Ver</button></td>
                          </tr>`;
            });
            tabla += `</table>`;
            document.getElementById("tabla-correos").innerHTML = tabla;
        })
        .catch(error => {
            console.error("Error al cargar los correos:", error);
        });
}

function verMensaje(id) {
    fetch(`ver.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.mensaje) {
                document.getElementById("mensaje-correo").textContent = data.mensaje;
                document.getElementById("myModal").style.display = "block";
            } else {
                const errorMsg = data.error || "No se pudo recuperar el mensaje.";
                alert(errorMsg);
            }
        })
        .catch(error => {
            console.error("Error al cargar el mensaje:", error);
            alert("Error de conexión al servidor.");
        });
}

window.onclick = function(event) {
    if (event.target === document.getElementById("myModal")) {
        document.getElementById("myModal").style.display = "none";
    }
}

document.getElementById("redactar").addEventListener("click", function() {
    document.getElementById("modalRedactar").style.display = "block";
});

function abrirModalRedactar() {
    document.getElementById('modalRedactar').style.display = 'flex';
}

function cerrarModalRedactar() {
    document.getElementById('modalRedactar').style.display = 'none';
}

function enviarCorreo(event) {
    event.preventDefault();

    const correo = document.getElementById('correo').value;
    const asunto = document.getElementById('asunto').value;
    const mensaje = document.getElementById('mensaje').value;
    const estado = document.getElementById('estado').value;
    const bandeja = document.getElementById('bandeja').value;

    console.log('Correo:', correo);
    console.log('Asunto:', asunto);
    console.log('Mensaje:', mensaje);
    console.log('Estado:', estado);
    console.log('Bandeja:', bandeja);

    alert('Correo enviado exitosamente.');

    cerrarModalRedactar();
}

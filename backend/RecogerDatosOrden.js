document.getElementById("btnRegistrarOrdenTrabajo").addEventListener("click", function() {
    
    let datos = {
        id_cliente: document.getElementById("id_cliente").value,
        id_vehiculo: document.getElementById("vehiculo_input").value,
        id_servicio: document.getElementById("servicio_input").value,
        requiereRepuesto: document.getElementById("check").checked,
        id_repuesto: document.getElementById("repuesto_input").value,
        trabajador: document.getElementById("trabajador_input").value,
        valor: document.getElementById("valor_input").value,
        fecha_inicio: document.getElementById("fechaInicio_input").value,
        fecha_fin: document.getElementById("fechaFin_input").value,
        estado: document.getElementById("estado_input").value
    };

let errores = [];

    let fechaInicio = new Date(datos.fecha_inicio);
    let fechaFin = new Date(datos.fecha_fin);

    if (!datos.fecha_inicio) errores.push("Fecha inicio obligatoria");
    if (!datos.fecha_fin) errores.push("Fecha fin obligatoria");

    if (fechaInicio >= fechaFin) {
        errores.push("La fecha de inicio debe ser menor que la final");
    }

    let ahora = new Date();
    if (fechaInicio < ahora) {
        errores.push("La fecha de inicio no puede ser en el pasado");
    }

    if (!datos.id_cliente) errores.push("Debes buscar un cliente");
    if (!datos.id_vehiculo) errores.push("Selecciona un vehículo");
    if (!datos.id_servicio) errores.push("Selecciona un servicio");
    if (!datos.trabajador) errores.push("Ingresa el trabajador");
    if (!datos.valor) errores.push("Ingresa el valor");
    if (!datos.fecha_inicio) errores.push("Fecha inicio obligatoria");
    if (!datos.fecha_fin) errores.push("Fecha fin obligatoria");
    if (!datos.estado) errores.push("Estado obligatorio");


    if (datos.requiereRepuesto && !datos.id_repuesto) {
        errores.push("Debes seleccionar un repuesto");
    }

    if (errores.length > 0) {
        alert(errores.join("\n"));
        return;
    }


    fetch("/CRUD/insertar_orden.php",{
        method: "POST", 
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => {

        if (data.exitoso) {
            alert("Orden registrada correctamente");
            location.reload();
        } else {
            alert("Error al registrar");
            console.log(data);
        }

    })
    .catch(error => console.error(error));

});
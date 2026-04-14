fetch("/api/obtenerNombresServicios.php")
  .then(res => res.json())
  .then(data => {
    let select = document.getElementById("servicio_input");

    data.forEach(rep => {
      let option = document.createElement("option");
      option.value = rep.id_servicio;
      option.textContent = rep.Nombre_servicio;
      select.appendChild(option);
    });
  });
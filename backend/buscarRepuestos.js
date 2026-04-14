fetch("/api/obtenerNombresRepuestos.php")
  .then(res => res.json())
  .then(data => {
    let select = document.getElementById("repuesto_input");

    data.forEach(rep => {
      let option = document.createElement("option");
      option.value = rep.id_Repuesto;
      option.textContent = rep.Nombre_Repuesto;
      select.appendChild(option);
    });
  });
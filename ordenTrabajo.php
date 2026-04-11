<?php
    $jsonRepuestos = file_get_contents("http://localhost/TallerMecanica/api/obtenerNombresRepuestos.php");
    $repuestos = json_decode($jsonRepuestos, true);

    $jsonServicios = file_get_contents("http://localhost/TallerMecanica/api/obtenerNombresServicios.php");
    $servicios = json_decode($jsonServicios, true);

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Trabajo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<<<<<<< HEAD
    <link rel="stylesheet" href="https://unpkg.com/dselect@latest/dist/css/dselect.css">
    <script src="https://kit.fontawesome.com/b42da86e0b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/dselect@latest/dist/js/dselect.js"></script>
    <?php
    include "conexion.php";
    include "verTabla.php";

    $obj = new tabla($conn);
    $result = $obj->listaOrdenes();
    ?>
</head>
=======
    </head>
>>>>>>> b40d47756126850e30502d870662e7b11b08c171

<body>

    <div class="container-fluid row">
   
    <form class="col-4 offset-4 p-3">
        <h3 class="text-center text-secondary">Registrar Orden de Trabajo</h3>
        <div class="mb-3">
            <label class="form-label">Numero de Documento</label>
            <input type="text" class="form-control" name="numDocumento" id="numDocumento">
            <button type="button" id="btnBuscar" class="btn btn-primary">Buscar</button>

            <input type="hidden" id="id_cliente" name="id_cliente">



        </div>

    </form>
    <form class="col-4 offset-4 p-3">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vehiculo</label>
            <select class="form-select" id="vehiculo_input">
                <option value="">Selecciona...</option>
            </select>  
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Servicio</label>
            <select class="form-select" id="servicio_input">
                <option value=""> Selecciona... </option>
                <?php foreach($servicios as $ser): ?>
                    <option value="<?= $ser['id_servicio'] ?>">
                        <?= $ser['Nombre_servicio'] ?>
                </option>
                <?php endforeach; ?>
            </select>        
        </div>
        <div class="mb-3">
            <label for="check">¿El servicio requiere de repuesto?</label>
            <input type="checkbox" id="check" name="repuesto_hay" value="yes">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre del repuesto</label>
            <select name="dropdown_repuesto" class="form-select">
                <option value=""> Selecciona... </option>
                <?php foreach($repuestos as $rep): ?>
                    <option value="<?= $rep['id_Repuesto'] ?>">
                        <?= $rep['Nombre_Repuesto'] ?>
                </option>
                <?php endforeach; ?>
            </select>     
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Trabajador responsable</label>
            <input type="text" class="form-control" name="nombre">
        </div>
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Valor total</label>
            <input type="text" class="form-control" name="valor">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha y hora de inicio</label>
            <input type="datetime-local" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha y hora de finalizacion</label>
            <input type="datetime-local" class="form-control">
        </div>
        <button type="submit" id="btnRegistrarOrdenTrabajo" class="btn btn-primary"name="btnregistrar" value="ok">Registrar</button>
    </form>
    <div class="col-12 p-4">
<table class="table">
  <thead class="table-primary">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Estado</th>
      <th scope="col">Nombre</th>
      <th scope="col">Valor Total</th>
      <th scope="col">Hora de inicio</th>
      <th scope="col">Hora finalizacion</th>
      <th scope="col">Trabajador R</th>
      <th scope="col">Repuesto</th>
      <th scope="col">Repuesto</th>
      <th scope="col">Vehiculo</th>
      <th scope="col">Servicio</th>
      <th scope="col"></th>
  
    </tr>
  </thead>
  <tbody>
    <tr>
    </tr>
  </tbody>
</table>
</div> 
>>>>>>> b40d47756126850e30502d870662e7b11b08c171


    <script src="buscarVehiculosPorCliente.js"></script>
    <script src="buscarCliente.js"></script>.
</body>

</html>
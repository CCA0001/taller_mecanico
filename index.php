<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b42da86e0b.js" crossorigin="anonymous"></script>
    </head>

<body>
    <div class="container-fluid row">
   
    <form class="col-4 offset-4 p-3">
        <h3 class="text-center text-secondary">Registrar Orden de Trabajo</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre del propietario</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de vehiculo</label>
            <input type="text" class="form-control" name="vehiculo">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Servicio</label>
            <input type="text" class="form-control" name="servicio">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Repuesto</label>
            <input type="checkbox" id="check" name="repuesto_hay" value="yes">
            <label for="check">Usa repuesto?</label>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">id repuesto</label>
                <input type="text" class="form-control" name="id_repuesto">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Trabajador responsable</label>
                <input type="text" class="form-control" name="nombre">
            </div>
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Valor total</label>
                <input type="text" class="form-control" name="valor">
            </div>
         </div>

            <button type="submit" class="btn btn-primary"name="btnregistrar" value="ok">Registrar</button>
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
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
       <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
       <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
       <td>Mark</td>
      <td>Otto</td>
       <td>
      <a href="" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href=""class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
       </td>
    </tr>
  </tbody>
</table></div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
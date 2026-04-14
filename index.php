<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Trabajo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b42da86e0b.js" crossorigin="anonymous"></script>

    <?php
        include "conexion/conexion.php";
        include "verTabla.php";

        $obj = new tabla($conn);
        $result = $obj->listaOrdenes();
    ?>
</head>

<body>

    <div class="container-fluid row">

        <h2 class="text-center text-secondary">Órdenes Activas</h2>

        <div class="text-center mb-3">
            <button onclick="anterior()" class="btn btn-secondary">Anterior</button>
            <button onclick="siguiente()" class="btn btn-primary">Siguiente</button>
        </div>

        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Valor</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Trabajador</th>
                </tr>
            </thead>
            <tbody id="tablaOrden"></tbody>
        </table>


   
    <form class="col-4 offset-4 p-3" name="form">
        <h3 class="text-center text-secondary">Registrar Orden de Trabajo</h3>
        <div class="mb-3">
            <label class="form-label">Numero de Documento</label>
            <input type="text" class="form-control" name="numDocumento" id="numDocumento">
            <button type="button" id="btnBuscar" class="btn btn-primary">Buscar</button>

            <input type="hidden" id="id_cliente" name="id_cliente">


        </div>

        <div class="mb-3">
            <label for="vehiculo_input" class="form-label">Vehiculo</label>
            <select class="form-select" id="vehiculo_input">
                <option value="">Selecciona...</option>
            </select>  
        </div>
        <div class="mb-3">
            <label for="servicio_input" class="form-label">Servicio</label>
            <select class="form-select" id="servicio_input">
                <option value=""> Selecciona... </option>
            </select>        
        </div>
        <div class="mb-3">
            <label for="check">¿El servicio requiere de repuesto?</label>
            <input type="checkbox" id="check" name="repuesto_hay" value="yes">
        </div>
        <div class="mb-3">
            <label for="repuesto_input" class="form-label">Nombre del repuesto</label>
            <select name="dropdown_repuesto" class="form-select" id="repuesto_input">
                <option value=""> Selecciona... </option>
            </select>     
        </div>
        <div class="mb-3">
            <label for="trabajador_input" class="form-label">Trabajador responsable</label>
            <input type="text" class="form-control" name="nombre" id="trabajador_input">
        </div>
         <div class="mb-3">
            <label for="valor_input" class="form-label">Valor total</label>
            <input type="text" class="form-control" name="valor" id="valor_input">
        </div>
        <div class="mb-3">
            <label for="fechaInicio_input" class="form-label">Fecha y hora de inicio</label>
            <input type="datetime-local" class="form-control" id="fechaInicio_input">
        </div>
        <div class="mb-3">
            <label for="fechaFin_input" class="form-label">Fecha y hora de finalizacion</label>
            <input type="datetime-local" class="form-control" id="fechaFin_input">
        </div>
         <div class="mb-3">
            <label for="estado_input" class="form-label">Estado</label>
            <select name="dropdown_repuesto" class="form-select" id="estado_input">
                <option value=""> Selecciona... </option>
                <option value="En Proceso"> En Proceso </option>
                <option value="Por Hacer"> Por Hacer </option>
                <option value="Completado"> Completado </option>
            </select>            
        </div>
        <button type="button" id="btnRegistrarOrdenTrabajo" class="btn btn-primary"name="btnregistrar" value="ok">Registrar</button>
    </form>
        <div class="col-12 p-4">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Hora inicio</th>
                        <th scope="col">Hora fin</th>
                        <th scope="col">Trabajador R</th>
                        <th scope="col">Vehiculo</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = sqlsrv_fetch_object($result)) { ?>
                        <tr>
                            <th scope="row"><?= $fila->id_OrdenTrabajo ?></th>
                            <td><?= $fila->estado ?></td>
                            <td><?= $fila->Cedula ?></td>
                            <td>$<?= number_format($fila->Valor_Total, 0, ',', '.') ?></td>
                            <td><?= $fila->Hora_Inicio ? $fila->Hora_Inicio->format('d/m/H:i') : '---' ?></td>
                            <td><?= $fila->Hora_finalizacion ? $fila->Hora_finalizacion->format('d/m/H:i') : '---' ?></td>
                            <td><?= $fila->Trabajador_Responsable ?></td>
                            <td><?= $fila->Tipo ?></td>
                            <td><?= $fila->Nombre_servicio ?></td>
                            <td>
                                <a href="ventanaEditar.php?id=<?= $fila->id_OrdenTrabajo ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <a href="crud/eliminar_orden.php?id=<?= $fila->id_OrdenTrabajo ?>"
                                    onclick="return confirm('¿Está seguro de eliminar esta fila?')"
                                    class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script src="backend/buscarVehiculosPorCliente.js"></script>
    <script src="backend/buscarRepuestos.js"></script>.
    <script src="backend/buscarServicios.js"></script>.
    <script src="backend/buscarCliente.js"></script>.
    <script src="backend/RecogerDatosOrden.js"></script>
    <script src="listaCircular.js"></script>
</body>

</html>
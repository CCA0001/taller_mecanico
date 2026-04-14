<?php
    include(__DIR__ . "conexion/conexion.php");
    require_once "CRUD/modelo.php"; 
    $obj = new OrdenTrabajo($conn);
    $id = isset($_GET["id"]) ? $_GET["id"] : die("Error: ID no encontrado");
    $datos = $obj->buscarPorId($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventana Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid row mt-5">
        <form class="col-4 offset-4 p-4 shadow bg-white rounded" method="POST" action="CRUD/editar.php">
            <h3 class="text-center text-secondary mb-4">Editar Orden de Trabajo</h3>
            
            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="mb-3">
                <label class="form-label">Cédula del Cliente</label>
                <input type="text" class="form-control" name="numDocumento" value="<?= $datos->CedulaCliente ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Estado de la Orden</label>
                <select class="form-select" name="estado">
                    <option value="Pendiente" <?= ($datos->estado == 'Pendiente') ? 'selected' : '' ?>>Pendiente</option>
                    <option value="En Proceso" <?= ($datos->estado == 'En Proceso') ? 'selected' : '' ?>>En Proceso</option>
                    <option value="Finalizado" <?= ($datos->estado == 'Finalizado') ? 'selected' : '' ?>>Finalizado</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo de Vehículo</label>
                <select class="form-select" name="id_vehiculo">
                    <?php 
                    $listVeh = $obj->listarVehiculos();
                    while ($v = sqlsrv_fetch_object($listVeh)) { 
                        $selected = ($v->id_vehiculo == $datos->id_vehiculo) ? "selected" : "";
                        echo "<option value='$v->id_vehiculo' $selected>$v->Tipo</option>";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Servicio</label>
                <select class="form-select" name="id_servicio">
                    <?php 
                    $listSer = $obj->listarServicios();
                    while ($s = sqlsrv_fetch_object($listSer)) { 
                        $selected = ($s->id_servicio == $datos->id_servicio) ? "selected" : "";
                        echo "<option value='$s->id_servicio' $selected>$s->Nombre_Servicio</option>";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="check_repuesto" name="repuesto_hay" value="1" <?= ($datos->Repuesto == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="check_repuesto">¿Requiere repuesto?</label>
                </div>
                <select name="select_box" id="select_repuesto" class="form-select" <?= ($datos->Repuesto == 1) ? '' : 'disabled' ?>>
                    <option value="">Selecciona...</option>
                    <?php 
                    $listRep = $obj->listarRepuestos();
                    while ($r = sqlsrv_fetch_object($listRep)) { 
                        $selected = ($r->id_Repuesto == $datos->id_Repuesto) ? "selected" : "";
                        echo "<option value='$r->id_Repuesto' $selected>$r->Nombre_Repuesto</option>";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Trabajador responsable</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->Trabajador_Responsable ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Valor total</label>
                <input type="text" class="form-control" name="valor" value="<?= $datos->Valor_Total ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha Inicio</label>
                <input type="datetime-local" name="fecha_inicio" class="form-control" value="<?= $datos->Hora_Inicio ? $datos->Hora_Inicio->format('Y-m-d\TH:i') : '' ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha Finalización</label>
                <input type="datetime-local" name="fecha_fin" class="form-control" value="<?= $datos->Hora_finalizacion ? $datos->Hora_finalizacion->format('Y-m-d\TH:i') : '' ?>">
            </div>

            <button type="submit" class="btn btn-success w-100" name="btnregistrar" value="ok">Guardar Cambios</button>
        </form>
    </div>

    <script>
        const checkbox = document.getElementById('check_repuesto');
        const selectRepuesto = document.getElementById('select_repuesto');
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                selectRepuesto.disabled = false;
            } else {
                selectRepuesto.disabled = true;
                selectRepuesto.value = "";
            }
        });
    </script>
</body>
</html>
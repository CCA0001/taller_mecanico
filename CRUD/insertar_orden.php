<?php
    header("Content-Type: application/json");
    include(__DIR__. "/../conexion/conexion.php");

    $data = json_decode(file_get_contents("php://input"), true);

    $id_cliente   = $data['id_cliente'];
    $id_vehiculo  = $data['id_vehiculo'];
    $id_servicio  = $data['id_servicio'];
    $requiereRepuesto = $data['requiereRepuesto'];
    $id_repuesto = $requiereRepuesto ? $data['id_repuesto'] : null;    $trabajador = $data['trabajador'];
    $valor        = $data['valor'];
    $fecha_inicio = str_replace("T", " ", $data['fecha_inicio']) . ":00";
    $fecha_fin = str_replace("T", " ", $data['fecha_fin']) . ":00";
    $estado = $data['estado'];

    // Query
    $sql = "INSERT INTO Orden_Trabajo 
    (id_cliente, id_vehiculo, id_servicio, Repuesto, id_Repuesto, Trabajador_Responsable, Valor_Total, Hora_Inicio, Hora_finalizacion, estado)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params = [
        $id_cliente,
        $id_vehiculo,
        $id_servicio,
        $requiereRepuesto,
        $id_repuesto,
        $trabajador,
        $valor,
        $fecha_inicio,
        $fecha_fin,
        $estado
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["exitoso" => true]);

    } else {
        echo json_encode([
            "exitoso" => false,
            "error" => sqlsrv_errors()
        ]);
    }
    
?>
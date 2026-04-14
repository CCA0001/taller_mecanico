<?php
    header("Content-Type: application/json");

    include(__DIR__ . "../conexion/conexion.php");

    $sql = "SELECT id_servicio, Nombre_servicio FROM Servicio";
    $stmt = sqlsrv_query($conn, $sql);

    $servicios = [];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $servicios[] = $row;
    }

    echo json_encode($servicios);
?>
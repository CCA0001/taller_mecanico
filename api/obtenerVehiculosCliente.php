<?php
    header("Content-Type: application/json");
    include(__DIR__ . "../conexion/conexion.php");

    $id_cliente = $_GET['id_cliente'] ?? null;

    if (!$id_cliente) {
        echo json_encode(["error" => "Sin id"]);
        exit();
    }

    $sql = "SELECT id_vehiculo, Placa FROM Vehiculo WHERE id_cliente = ?";
    $params = [$id_cliente];

    $stmt = sqlsrv_query($conn, $sql, $params);

    $vehiculos = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $vehiculos[] = $row;
    }

    echo json_encode($vehiculos);
?>
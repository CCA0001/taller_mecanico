<?php
include(__DIR__. "/../conexion/conexion.php");
require_once "modelo.php"; 

if (!empty($_POST["btnregistrar"])) {
    $id = $_POST["id"];
    $val = $_POST["valor"];
    $hi = str_replace("T", " ", $_POST["fecha_inicio"]);
    $hf = str_replace("T", " ", $_POST["fecha_fin"]);
    $nom = $_POST["nombre"];
    $rep_bit = isset($_POST["repuesto_hay"]) ? 1 : 0;
    $id_veh = $_POST["id_vehiculo"];
    $id_ser = $_POST["id_servicio"];
    $est = $_POST["estado"];
    $id_rep = ($rep_bit == 1 && !empty($_POST["select_box"])) ? $_POST["select_box"] : "NULL";

    $obj = new OrdenTrabajo($conn);
    $resultado = $obj->editar($id, $val, $hi, $hf, $nom, $rep_bit, $id_rep, $id_veh, $id_ser, $est);

    if ($resultado) {
        header("location:../ordenTrabajo.php?res=ok");
    } else {
        die(print_r(sqlsrv_errors(), true));
    }
}
?>
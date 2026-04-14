<?php   
    include(__DIR__ . "/../conexion/conexion.php");

    if (!empty($_GET["id"])) {
        $id_recibido=$_GET["id"];

        $sql="DELETE FROM [dbo].[Orden_Trabajo] WHERE id_OrdenTrabajo=?";
        $query = sqlsrv_query($conn, $sql, [$id_recibido]);

        if ($query) {
        header("location:../ordenTrabajo.php");
        }
    }
?>
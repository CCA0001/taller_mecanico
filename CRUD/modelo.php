<?php
class OrdenTrabajo {
    private $conn;

    public function __construct() {
        include __DIR__ . "/../conexion/conexion.php"; 
        $this->conn = $conn;
    }

    public function buscarPorId($id) {
        $sql = "SELECT o.*, c.Cedula as CedulaCliente 
                FROM Orden_Trabajo o
                INNER JOIN Cliente c ON o.id_cliente = c.id_cliente
                WHERE o.id_OrdenTrabajo = $id";
        $res = sqlsrv_query($this->conn, $sql);
        return sqlsrv_fetch_object($res);
    }

    public function editar($id, $val, $hi, $hf, $nom, $rep_bit, $id_rep, $id_veh, $id_ser, $est) {
        $sql = "UPDATE Orden_Trabajo SET 
                Valor_Total = $val, 
                Hora_Inicio = '$hi', 
                Hora_finalizacion = '$hf', 
                Trabajador_Responsable = '$nom', 
                Repuesto = $rep_bit, 
                id_Repuesto = $id_rep, 
                id_vehiculo = $id_veh, 
                id_servicio = $id_ser,
                estado = '$est'
                WHERE id_OrdenTrabajo = $id";
        return sqlsrv_query($this->conn, $sql);
    }

    public function listarVehiculos() {
        return sqlsrv_query($this->conn, "SELECT id_vehiculo, Tipo FROM Vehiculo");
    }

    public function listarServicios() {
        return sqlsrv_query($this->conn, "SELECT id_servicio, Nombre_Servicio FROM Servicio");
    }

    public function listarRepuestos() {
        return sqlsrv_query($this->conn, "SELECT id_Repuesto, Nombre_Repuesto FROM Repuesto");
    }
}
?>
<?php
//autor: Palacios Avila Ariel
require_once 'config/conexion.php';

class SolicitudServicioDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion(); //
    }

    public function selectAllFiltro($parametro)
    {
        $sql = "SELECT * FROM solicitud_servicio s, tipo_servicio t WHERE s.tipo_servicio";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike, 'b3' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function selectTipoProducto()
    {
        $sql = "select * from tipo_producto";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }
}

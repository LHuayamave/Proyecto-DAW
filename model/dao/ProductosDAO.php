<?php
require_once 'config/config.php';

class ProductosDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion(); //
    }

    public function selectAll($parametro)
    {
        $sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.stock_inicial,
        p.fecha_ingreso, p.total, t.tipo_producto, pr.nombre_proveedor
        FROM producto p
        INNER JOIN tipo_producto t ON p.id_producto = t.id_tipo
        INNER JOIN proveedor pr on p.id_proveedor = pr.id_proveedor";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function selectOne($id)
    {
        $sql = "SELECT * from producto where" .
            "id=:id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto;
    }
}

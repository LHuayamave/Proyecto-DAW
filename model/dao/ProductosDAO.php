<?php
//autor: Huayamave Cedeño Luis
require_once 'config/conexion.php';

class ProductosDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion(); //
    }

    public function selectAllFiltro($parametro)
    {
        $sql = "SELECT * FROM producto p, tipo_producto t, proveedor pr
        WHERE p.id_tipo = t.id_tipo AND
        p.id_proveedor = pr.id_proveedor and 
        (p.nombre like :b1 or t.tipo_producto like :b2 or pr.nombre_proveedor like :b3)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike, 'b3' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function selectAllProductos()
    {
        $sql = "select * from producto";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }

    public function selectOne($id)
    {
        $sql = "SELECT * from producto where" .
            "id_producto=:id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto;
    }

    public function insert($prod)
    {
        try {
            $sql = "INSERT INTO producto (id_producto, nombre_producto, descripcion, stock_inicial, fecha_ingreso, total,
            id_tipo, id_proveedor) VALUES
            (:null, :nom, :desc, :stock, :fecha, :total, :idTipo, :idProveedor)";

            $stmt = $this->con->prepare($sql);
            $data = [
                'nom' => $prod->getNombre(),
                'desc' => $prod->getDescripcion(),
                'stock' => $prod->getStockInicial(),
                'fecha' => $prod->getFecha_ingreso(),
                'total' => $prod->getTotal(),
                'idTipo' => $prod->getId_tipo(),
                'idProveedor' => $prod->getId_proveedor()
            ];
            $stmt->execute($data);
            if ($stmt->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }
}

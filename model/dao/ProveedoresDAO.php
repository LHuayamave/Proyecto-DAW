<?php
// autor:Nieves Pincay Kenia
require_once 'config/conexion.php';

class ProveedoresDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAllFiltro($parametro) {
        // sql de la sentencia
        $sql = "SELECT * FROM proveedor p , medio_pago m  where p.id_medio_pago = m.id_medio_pago and 
        (p.nombre like :b1 or m.nombre_medio like :b2)";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike);
        // ejecutar la sentencia
        $stmt->execute($data);
        //recuperar  resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultados;
    }

    public function selectAllMetodosPago() {
        // sql de la sentencia
        $sql = "select * from medio_pago";
        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }

    public function selectOne($id) { // buscar un proveedor por su id
        $sql = "select * from proveedor where ".
        "id_proveedor=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos
        $proveedor = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $proveedor;
    }

    public function insert($prov){
        try{
        //sentencia sql
        $sql = "INSERT INTO proveedor (id_proveedor, nombre, direccion, telefono, fecha_contrato, 
        id_medio_pago) VALUES 
        (:idPro, :nom, :dir, :telf, :fcontrato, :idMedio)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'idPro' =>  $prov->getIdProveedor(),
        'nom' =>  $prov->getNombre(),
        'dir' =>  $prov->getDireccion(),
        'telf' =>  $prov->getTelefono(),
        'fcontrato' =>  $prov->getFechaContrato(),
        'idMedio' =>  $prov->getIdmedioPago()
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }

    public function update($prov){

        try{
            $sql = "UPDATE `proveedor` SET `nombre`=:nom,`direccion`=:dir," .
                    "`telefono`=:telf,`fecha_contrato`=:fcontrato,`id_medio_pago`=:idMedio WHERE id_proveedor=:idPro";
        
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' =>  $prov->getNombre(),
                'dir' =>  $prov->getDireccion(),
                'telf' =>  $prov->getTelefono(),
                'fcontrato' =>  $prov->getFechaContrato(),
                'idMedio' =>  $prov->getIdmedioPago(),
                'idPro' =>  $prov->getIdProveedor()
            ];
            
            $sentencia->execute($data);
            
            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
            return true;       
    }

    public function delete($prov){
        try{
            $sql = "DELETE FROM `proveedor` WHERE id_proveedor =:id";
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' =>  $prov->getIdProveedor()
            ];
            $sentencia->execute($data); 
            if ($sentencia->rowCount() <= 0) {
            return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    
        return true;
    }
    
}

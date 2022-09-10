<?php
// dao data access object
require_once 'config/Conexion.php';

class CotizacionDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAllFiltro($parametro) {
        // sql de la sentencia
        $sql = "SELECT * FROM cotizacion c INNER JOIN tipo_producto t ON c.id_tipo = t.id_tipo where c.id_tipo = t.id_tipo and 
        (c.nombre like :b1 or t.tipo_producto like :b2)";
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

    public function selectAll($parametro) {
        // sql de la sentencia
      $sql = "SELECT * FROM cotizacion c INNER JOIN tipo_producto t ON c.id_tipo = t.id_tipo where c.id_tipo = t.id_tipo and  
      (nombre like :b1 or tipo_producto like :b2)";
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

    public function selectOne($id) { // buscar un producto por su id
        $sql = "select * from cotizacion where ".
        "id_cotizacion=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $producto;
    }

    public function insert($cot){
        try{
        //sentencia sql
        $sql = "INSERT INTO cotizacion (id_cotizacion, nombre, correo, telefono, direccion, 
        descripcion, presupuesto, fecha_cotizacion, id_tipo) VALUES 
        (:idCot, :nom, :cor, :telf, :dir, :descp, :pres, :fch, :idTip)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'idCot' =>  $cot->getId(),
        'nom' =>  $cot->getNombre(),
        'cor' =>  $cot->getCorreo(),
        'telf' =>  $cot->getTelefono(),
        'dir' =>  $cot->getDireccion(),
        'descp' =>  $cot->getDescripcion(),
        'pres' => $cot->getPresupuesto(),
        'fch' => $cot->getfechaCotizacion(),
        'idTip' => $cot->getId_tipo(),
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
            return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }

    public function update($cot){

        try{
            //prepare
            $sql = "UPDATE `cotizacion` SET `nombre`=:nom,`correo`=:cor," .
                "`telefono`=:telf,`direccion`=:dir,`descripcion`=:descp,`presupuesto`=:pres,`fecha_cotizacion`=:fch,`id_tipo`=:idTip WHERE id_cotizacion=:idCot";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'idCot' =>  $cot->getId(),
                'nom' =>  $cot->getNombre(),
                'cor' =>  $cot->getCorreo(),
                'telf' =>  $cot->getTelefono(),
                'dir' =>  $cot->getDireccion(),
                'descp' =>  $cot->getDescripcion(),
                'pres' => $cot->getPresupuesto(),
                'fch' => $cot->getfechaCotizacion(),
                'idTip' => $cot->getId_tipo(),
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
            return true;       
    }

    public function delete($cod)
    {
        try {
            $sql = "DELETE FROM `cotizacion` WHERE id_cotizacion =:id";
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' =>  $cod->getId(),
            ];
            $sentencia->execute($data);
            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }
}
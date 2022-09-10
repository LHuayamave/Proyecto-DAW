<?php
// dao data access object
require_once 'config/Conexion.php';

class SolicitudTecnicoDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        // sql de la sentencia
      $sql = "SELECT * FROM solicitud_tecnico s, problemas p  where s.id_problemas = p.id_problemas and 
      (nombre like :b1 or nombre_problema like :b2)";
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
        $sql = "select * from solicitud_tecnico where ".
        "id_solicitud=:id";
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

    public function selectAllProblems()
    {
        // sql de la sentencia
        $sql = "select * from problemas";
        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }

    public function insert($soli)
    {
        try {
            //sentencia sql
            $sql = "INSERT INTO solicitud_tecnico (id_solicitud, nombre, apellido, correo, fecha_solicitud, id_problemas) 
            VALUES (NULL, :nom, :apell, :corr, :fsolicitud, :idProblem)";


            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                
                'nom' =>  $soli->getNombre(),
                'apell' =>  $soli->getApellido(),
                'corr' =>  $soli->getCorreo(),
                'fsolicitud' =>  $soli->getFecha_solicitud(),
                'idProblem' =>  $soli->getId_problemas()
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }


    
}

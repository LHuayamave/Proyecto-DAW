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
        $sql = "SELECT * FROM solicitud_servicio s, tipo_servicio t WHERE s.id_tipo = t.id_tipo and
        (s.nombre like :b1 or t.tipo_servicio like :b2)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function selectTipoServicio()
    {
        $sql = "select * from tipo_servicio";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }

    public function selectOne($id)
    {
        $sql = "SELECT * from solicitud_servicio where id_solicitud=:id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $tipo_solicitud = $stmt->fetch(PDO::FETCH_ASSOC);

        return $tipo_solicitud;
    }

    public function insert($soli)
    {
        try {
            $sql = "INSERT INTO `solicitud_servicio`(`id_solicitud`, `nombre`, `correo`, `telefono`, `direccion`,
            `descripcion`, `fecha_solicitud`, `id_tipo`) VALUES 
            (:id, :nom, :correo, :tele, :dir, :desc, :fecha, :idTipo)";

            $stmt = $this->con->prepare($sql);
            $data = [
                'id' => $soli->getIdSolicitud(),
                'nom' => $soli->getNombre(),
                'correo' => $soli->getCorreo(),
                'tele' => $soli->getTelefono(),
                'dir' => $soli->getDireccion(),
                'desc' => $soli->getDescripcion(),
                'fecha' => $soli->getFechaSolicitud(),
                'idTipo' => $soli->getIdTipo()
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

<?php
require_once 'model/dao/SolicitudServicioDAO.php';
require_once 'model/dto/SolicitudServicio.php';

class SolicitudServicioController
{
    private $model;

    public function __construct()
    {
        $this->model = new SolicitudServicioDAO();
    }

    public function index()
    {
        $resultados = $this->model->selectAllFiltro("");
        require_once VSOLICITUDSERVICIO . 'list.php';
    }
    public function search()
    {
        $parametro = (!empty($_POST['b'])) ? htmlentities($_POST['b']) : "";
        $resultados = $this->model->selectAllFiltro($parametro);
        require_once VSOLICITUDSERVICIO . 'list.php';
    }
    public function view_new()
    {
        $modeloSoli = new SolicitudServicioDAO();
        $tipo = $modeloSoli->selectTipoServicio();

        require_once VSOLICITUDSERVICIO . 'nuevo.php';
    }

    public function new()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $soli = new SolicitudServicio();
            $soli->setIdTipo(htmlentities($_POST['tipo_servicio']));
            $soli->setIdSolicitud(htmlentities($_POST['id']));
            $soli->setNombre(htmlentities($_POST['nombre']));
            $soli->setCorreo(htmlentities($_POST['correo']));
            $soli->setTelefono(htmlentities($_POST['telefono']));
            $soli->setDireccion(htmlentities($_POST['direccion']));
            $soli->setDescripcion(htmlentities($_POST['descripcion']));
            $soli->setFechaSolicitud(htmlentities($_POST['fecha_solicitud']));

            //comunicar con el modelo
            $exito = $this->model->insert($soli);

            $msj = 'Solicitud enviada exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo enviar la solicitud";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=SolicitudServicio&f=index');
        }
    }
}

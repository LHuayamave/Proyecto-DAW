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
}

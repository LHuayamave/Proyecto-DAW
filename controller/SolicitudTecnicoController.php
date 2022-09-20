<?php
//Autor: Sellan Fajardo Israel
require_once 'model/dao/SolicitudTecnicoDAO.php';

require_once 'model/dto/SolicitudTecnico.php';

class SolicitudTecnicoController
{
    private $model;

    public function __construct()
    { // constructor
        $this->model = new SolicitudTecnicoDAO();
    }

    // funciones del controlador
    public function index()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }
        else {
            //comunica con el modelo (enviar datos o obtener datos)
            $resultados = $this->model->selectAllFiltro("");
            // comunicarnos a la vista
            // require_once HEADERADICIONAL;
            require_once VSOLICITUDTECNICO . 'list.php';
            // require_once FOOTER ;
        }
    }

    public function search()
    {
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
        //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAllFiltro($parametro);
        // comunicarnos a la vista
        require_once VSOLICITUDTECNICO . 'list.php';
    }

    public function searchAjax()
    {
        $parametro = (!empty($_GET["b"])) ? htmlentities($_GET["b"]) : "";
        $resultados = $this->model->selectAllFiltro($parametro);
        echo json_encode($resultados);
    }

    // muestra el formulario de nuevo producto
    public function view_new()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
        else{
            //comunicarse con el modelo
            $modeloSolicitud = new SolicitudTecnicoDAO();
            $problemas = $modeloSolicitud->selectAllProblems();

            // comunicarse con la vista
            require_once VSOLICITUDTECNICO . 'nuevo.php';
        }
    }

    // lee datos del formulario de una nueva solictud y lo inserta en la bdd (llamando al modelo)
    public function new()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
        //cuando la solicitud es por post
        else if ($_SERVER['REQUEST_METHOD'] == 'POST') { // insertar solicitud

            $soli = new SolicitudTecnico();
            // lectura de parametros
            $soli->setNombre(htmlentities($_POST['nombre']));
            $soli->setApellido(htmlentities($_POST['apellido']));
            $soli->setCorreo(htmlentities($_POST['correo']));
            $soli->setFechaSolicitud(htmlentities($_POST['fecha_solicitud']));
            $soli->setId_problemas(htmlentities($_POST['problemas']));

            //comunicar con el modelo
            $exito = $this->model->insert($soli);

            $msj = 'Solicitud fue guardada con rotundo exito :)';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
    }

    public function delete()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0 || $_SESSION['rol'] == 1){
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
        else {
            //leeer parametros
            $soli = new SolicitudTecnico();
            $soli->setIdSolicitud(htmlentities($_REQUEST['id']));

            //comunicando con el modelo
            $exito = $this->model->delete($soli);
            $msj = 'Solicitud eliminada con exito';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo eliminar la solicitud";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
    }

    public function view_edit()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
        else {
            //leer parametro
            $id = $_REQUEST['id'];
            $soli = $this->model->selectOne($id);
            $modeloSoli = new SolicitudTecnicoDAO();
            $problemas = $modeloSoli->selectAllProblems();
            // comunicarse con la vista editar solicitud
            require_once VSOLICITUDTECNICO . 'edit.php';
        }
    }

    public function edit()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $soli = new SolicitudTecnico();
            // lectura de parametros
            $soli->setIdSolicitud(htmlentities($_POST['id_solicitud']));
            $soli->setNombre(htmlentities($_POST['nombre']));
            $soli->setApellido(htmlentities($_POST['apellido']));
            $soli->setCorreo(htmlentities($_POST['correo']));
            $soli->setFechaSolicitud(htmlentities($_POST['fecha']));
            $soli->setId_problemas(htmlentities($_POST['problemas']));


            //llamar al modelo
            $exito = $this->model->update($soli);

            $msj = 'Solicitud actualizada con exito';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion :(";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=solicitudtecnico&f=index');
        }
    }
}

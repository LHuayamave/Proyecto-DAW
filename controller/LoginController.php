<?php
// autor:Nieves Pincay Kenia
require_once 'model/dao/LoginDAO.php';
require_once 'model/dto/Login.php';

class LoginController
{
    private $model;

    public function __construct()
    {
        $this->model = new LoginDAO();
    }

    // funciones del controlador
    public function index()
    {
        //comunica con el modelo (enviar datos o obtener datos)
        //$resultados = $this->model->selectAllFiltro("");
        // comunicarnos a la vista
        require_once VLOGIN . 'ingresar.php';
    }

    
}

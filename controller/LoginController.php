<?php

session_start();

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

    public function validar(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = new Login();

            $login-> setUsuario(htmlentities($_POST['usuario']));
            $login-> setContrasenia(htmlentities($_POST['contra']));

            $exito = $this->model->validarUsuario($login);

            $msj = 'Inicio de sesion exitoso :)';
            $color = 'primary';
            
            if (!$exito) {
                $msj = "No se pudo inciar sesión";
                $color = "danger";
            }
                
            if (!isset($_SESSION)) {
                session_start();
                
            };
            
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
            }
    }
}

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

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //     $login = new Login();

        //     $login-> setUsuario(htmlentities($_POST['usuario']));
        //     $login-> setContrasenia(htmlentities($_POST['contra']));

        //     $exito = $this->model->validarUsuario($login);

        //     $msj = 'Inicio de sesion exitoso :)';
        //     $color = 'primary';
            
        //     if (!$exito) {
        //         $msj = "No se pudo inciar sesión";
        //         $color = "danger";
        //     }
                
        //     if (!isset($_SESSION)) {
        //         session_start();
                
        //     };
            
        //         $_SESSION['mensaje'] = $msj;
        //         $_SESSION['color'] = $color;
        //     }

        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //buscar usuario
            $login = new Login();
            $login -> setUsuario(htmlspecialchars($_POST['usuario']));
            $login -> setContrasenia(htmlentities($_POST['contra']));

            $exito = $this->model->validarUsuario($login);
            
            $msj = 'Usuario correcto';
            $color = 'primary';
            if(!$exito){
                $msj = 'Usuario incorrecto';
                $color = "danger";
                //require_once VLOGIN . 'ingresar.php';
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            $_SESSION['usuario'] = $login -> getUsuario();
            $_SESSION['contra'] = $login -> getContrasenia();
            //llamar a la vista
            header('Location:index.php?c=cotizacion&f=index');
        }

            
    }
}

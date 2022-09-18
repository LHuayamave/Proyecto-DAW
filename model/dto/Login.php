<?php
// autor:Nieves Pincay Kenia
class Login
{
    private $usuario, $contrasenia;

    function __construct()
    {
    }

    function getUsuario()
    {
        return $this->usuario;
    }

    function getContrasenia()
    {
        return $this->contrasenia;
    }

    function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    public function __set($usuario, $valor)
    {
        if (property_exists('Usuario', $usuario)) {
            $this->$usuario = $valor;
        } else {
            echo $usuario . "No existe ";
        }
    }


    public function __get($usuario)
    {
        if (property_exists('Producto', $usuario)) {
            return $this->$usuario;
        }

        return NULL;
    }

}

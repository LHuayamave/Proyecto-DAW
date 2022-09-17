<?php
// autor:Nieves Pincay Kenia
class Proveedor
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

}

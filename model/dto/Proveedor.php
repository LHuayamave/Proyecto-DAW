<?php

class Proveedor
{
    private $idProveedor, $nombre, $direccion, $telefono, $fechaContrato, $idMedioPago;

    function __construct()
    {
    }

    function getIdProveedor()
    {
        return $this->idProveedor;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function getTelefono()
    {
        return $this->telefono;
    }
    function getFechaContrato()
    {
        return $this->fechaContrato;
    }

    function getIdmedioPago()
    {
        return $this->idMedioPago;
    }

    function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    function setFechaContrato($fechaContrato)
    {
        $this->fechaContrato = $fechaContrato;
    }

    function setIdMedioPago($idMedioPago)
    {
        $this->idMedioPago = $idMedioPago;
    }
}

<?php
class SolicitudServicio
{
    private $id_solicitud, $nombre, $correo, $telefono, $direccion, $descripcion, $fecha_solicitud,
        $id_tipo;

    function __construct()
    {
    }

    function getIdSolicitud()
    {
        return $this->id_solicitud;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getCorreo()
    {
        return $this->correo;
    }

    function getTelefono()
    {
        return $this->telefono;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getFechaSolicitud()
    {
        return $this->fecha_solicitud;
    }

    function getIdTipo()
    {
        return $this->id_tipo;
    }

    function setIdSolicitud($id_solicitud)
    {
        $this->id_solicitud = $id_solicitud;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}

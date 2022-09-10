<?php
class SolicitudServicio
{
    private $id_solicitud, $nombre, $correo, z, $direccion, $descripcion, $fecha_solicitud,
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

    function setFechaSolicitud($fecha_solicitud)
    {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
    }

    public function __set($nombre, $valor)
    {
        if (property_exists('SolicitudServicio', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe.";
        }
    }


    public function __get($nombre)
    {
        if (property_exists('SolicitudServicio', $nombre)) {
            return $this->$nombre;
        }

        return NULL;
    }
}

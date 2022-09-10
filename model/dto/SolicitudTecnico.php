<?php
class SolicitudTecnico
{
    private $id_solicitud, $nombre, $apellido, $correo, $fecha_solicitud, $id_problemas;

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

    function getApellido()
    {
        return $this->apellido;
    }

    function getCorreo()
    {
        return $this->correo;
    }

    function getFecha_solicitud()
    {
        return $this->fecha_solicitud;
    }

    function getId_problemas()
    {
        return $this->id_problemas;
    }

    function setIdSolicitud($id_solicitud)
    {
        $this->id_solicitud = $id_solicitud;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    function setFechaSolicitud($fecha_solicitud)
    {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function setId_problemas($id_problemas)
    {
        $this->id_problemas = $id_problemas;
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

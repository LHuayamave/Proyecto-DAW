<?php
//Autor: Aguirre Aguirre Ronaldo
class Cotizacion
{
    private $id, $nombre, $correo, $telefono, $direccion,
        $descripcion, $presupuesto, $fechaCotizacion, $id_tipo;

    function __construct()
    {
    }

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getcorreo()
    {
        return $this->correo;
    }

    function getTelefono()
    {
        return $this->telefono;
    }

    function getdireccion()
    {
        return $this->direccion;
    }

    function getdescripcion()
    {
        return $this->descripcion;
    }

    function getPresupuesto()
    {
        return $this->presupuesto;
    }

    function getfechaCotizacion()
    {
        return $this->fechaCotizacion;
    }

    function getId_tipo()
    {
        return $this->id_tipo;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setcorreo($correo)
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

    function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;
    }

    function setfechaCotizacion($fechaCotizacion)
    {
        $this->fechaCotizacion = $fechaCotizacion;
    }

    function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
    }

    public function __set($nombre, $valor)
    {
        if (property_exists('Cotizacion', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe ";
        }
    }


    public function __get($nombre)
    {
        if (property_exists('Cotizacion', $nombre)) {
            return $this->$nombre;
        }

        return NULL;
    }
}

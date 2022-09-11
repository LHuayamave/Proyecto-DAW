<?php
//Autor: Huayamave Cedeño Luis
class Producto
{
    private $id_producto, $nombre_producto, $descripcion, $stock_inicial, $fecha_ingreso,
        $total, $id_tipo, $id_proveedor;

    function __construct()
    {
    }

    function getIdProducto()
    {
        return $this->id_producto;
    }

    function getNombreProducto()
    {
        return $this->nombre_producto;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getStockInicial()
    {
        return $this->stock_inicial;
    }

    function getFecha_ingreso()
    {
        return $this->fecha_ingreso;
    }

    function getTotal()
    {
        return $this->total;
    }

    function getId_tipo()
    {
        return $this->id_tipo;
    }

    function getId_proveedor()
    {
        return $this->id_proveedor;
    }

    function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    function setNombreProducto($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    function setStockInicial($stock_inicial)
    {
        $this->stock_inicial = $stock_inicial;
    }

    function setFechaIngreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;
    }

    function setTotal($total)
    {
        $this->total = $total;
    }

    function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
    }

    function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    public function __set($nombre, $valor)
    {
        if (property_exists('Producto', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe ";
        }
    }


    public function __get($nombre)
    {
        if (property_exists('Producto', $nombre)) {
            return $this->$nombre;
        }

        return NULL;
    }
}

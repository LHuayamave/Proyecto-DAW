<?php
require_once 'model/dao/ProductosDAO.php';
require_once 'model/dto/Producto.php';

class ProductosController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductosDAO();
    }

    public function index()
    {
        $resultados = $this->model->selectAll("");
        require_once VPRODUCTOS . 'list.php';
    }

    public function search()
    {
        $parametro = (!empty($_POST['b'])) ? htmlentities($_POST['b']) : "";
        $resultados = $this->model->selectAll($parametro);
        require_once VPRODUCTOS . 'list.php';
    }
}

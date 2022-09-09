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
        $resultados = $this->model->selectAllFiltro("");
        require_once VPRODUCTOS . 'list.php';
    }

    public function search()
    {
        $parametro = (!empty($_POST['b'])) ? htmlentities($_POST['b']) : "";
        $resultados = $this->model->selectAllFiltro($parametro);
        require_once VPRODUCTOS . 'list.php';
    }

    public function view_new()
    {
        $modeloProd = new ProductosDAO();
        $prod = $modeloProd->selectAllProductos();
        require_once VPRODUCTOS . 'nuevo.php';
    }

    public function new()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prod = new Producto();
            $prod->setIdTipo(htmlentities($_POST['tipo_producto']));
            $prod->setIdProveedor(htmlentities($_POST['proveedor']));
            $prod->setNombre(htmlentities($_POST['nombre']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setStockInicial(htmlentities($_POST['stock_inicial']));
            $prod->setFechaIngreso(htmlentities($_POST['fecha_ingreso']));
            $prod->setTotal(htmlentities($_POST['total']));

            $exito = $this->model->insert($prod);
            $msj = 'Se ha guardado el producto de manera existe';
            $color = 'primary';
            if (!$exito) {
                $msj = 'No se pudo guardar el producto';
                $color = 'danger';
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            header('Location:index.php?c=productos&f=index');
        }
    }
}

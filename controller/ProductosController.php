<?php
//Autor: Huayamave Cedeño Luis
require_once 'model/dao/ProductosDAO.php';
require_once 'model/dao/ProveedoresDAO.php';
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
        $modeloProv = new ProveedoresDAO();
        $prov = $modeloProv->selectAll();

        $modeloTipo = new ProductosDAO();
        $tipo = $modeloTipo->selectTipoProducto();
        require_once VPRODUCTOS . 'nuevo.php';
    }

    public function new()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prod = new Producto();
            $prod->setNombreProducto(htmlentities($_POST['nombre_producto']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setStockInicial(htmlentities($_POST['stock_inicial']));
            $prod->setFechaIngreso(htmlentities($_POST['fecha_ingreso']));
            $prod->setTotal(htmlentities($_POST['total']));
            $prod->setIdTipo(htmlentities($_POST['tipo_producto']));
            $prod->setIdProveedor(htmlentities($_POST['nombre_proveedor']));

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

    public function delete()
    {
        $prod = new Producto();
        $prod->setIdProducto(htmlentities($_REQUEST['id']));
        $exito = $this->model->delete($prod);
        $msj = 'Producto eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar este Producto";
            $color = "danger";
        }
        if (!isset($_SESSION)) {
            session_start();
        };
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        header('Location:index.php?c=productos&f=index');
    }

    public function view_edit()
    {
        $id = $_REQUEST['id'];
        $prod = $this->model->selectOne($id);

        $modeloProv = new ProveedoresDAO();
        $prov = $modeloProv->selectAll();

        $modeloTipo = new ProductosDAO();
        $tipo = $modeloTipo->selectTipoProducto();

        require_once VPRODUCTOS . 'edit.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prod = new Producto();
            $prod->setIdProducto(htmlentities($_POST['id']));
            $prod->setNombreProducto(htmlentities($_POST['nombre_producto']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setStockInicial(htmlentities($_POST['stock_inicial']));
            $prod->setFechaIngreso(htmlentities($_POST['fecha_ingreso']));
            $prod->setTotal(htmlentities($_POST['total']));
            $prod->setIdProveedor(htmlentities($_POST['nombre_proveedor']));
            $prod->setIdTipo(htmlentities($_POST['tipo_producto']));

            $exito = $this->model->update($prod);
            $msj = 'Producto actualizado de manera exitosa';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo actualizar el producto";
                $color = "danger";
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

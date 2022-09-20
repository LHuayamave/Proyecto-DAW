<?php
//Autor: Aguirre Aguirre Ronaldo
require_once 'model/dao/CotizacionDAO.php';
require_once 'model/dao/ProductosDAO.php';
require_once 'model/dto/Cotizacion.php';

class CotizacionController
{
    private $model;

    public function __construct()
    { // constructor
        $this->model = new CotizacionDAO();
    }

    // funciones del controlador
    public function index()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }
        //if (!isset($_SESSION))
        //{
           // require_once VLOGIN . 'ingresar.php';
        //}
        else
        {
            echo $_SESSION['rol'];
            //comunica con el modelo (enviar datos o obtener datos)
            $resultados = $this->model->selectAll("");
            // comunicarnos a la vista
            // require_once HEADERADICIONAL;
            require_once VCOTIZACION . 'list.php';
            // require_once FOOTER ;
        }
    }

    public function search()
    {
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
        //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAllFiltro($parametro);
        // comunicarnos a la vista
        require_once VCOTIZACION . 'list.php';
    }

    // buscar con ajax
    public function searchAjax() {
    //lectura de parametros
    $parametro = (!empty($_GET["b"]))?htmlentities($_GET["b"]):"";
    //llamar al modelo
    $resultados =  $this->model->selectAll($parametro);
    //no llama a la vista  
    // imprime resultados para que la vista pueda leerlos a traves de js
    echo json_encode($resultados);
    }

    // lee datos del formulario de nuevo Cotizacion y lo inserta en la bdd (llamando al modelo)
    public function new()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=cotizacion&f=index');
        }
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // insertar el Cotizacion
            $cot = new Cotizacion();
            $cot->setId(htmlentities($_POST['id']));
            $cot->setNombre(htmlentities($_POST['nombre']));
            $cot->setCorreo(htmlentities($_POST['correo']));
            $cot->setTelefono(htmlentities($_POST['telefono']));
            $cot->setDireccion(htmlentities($_POST['direccion']));
            $cot->setDescripcion(htmlentities($_POST['descripcion']));
            $cot->setPresupuesto(htmlentities($_POST['presupuesto']));
            $cot->setfechaCotizacion(htmlentities($_POST['fecha']));
            $cot->setIdTipo(htmlentities($_POST['tipo_producto']));

            //comunicar con el modelo
            $exito = $this->model->insert($cot);

            $msj = 'Cotizacion guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=cotizacion&f=index');
        }
    }

    // muestra el formulario de nuevo producto
    public function view_new()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=cotizacion&f=index');
        }else{
            //comunicarse con el modelo
            $modeloTipoProd = new ProductosDAO();
            $tipoProductos = $modeloTipoProd->selectTipoProducto();

            // comunicarse con la vista
            require_once VCOTIZACION . 'nuevo.php';
        }
    }

    public function delete()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=cotizacion&f=index');
        }else {
            $prod = new Cotizacion();
            $prod->setId(htmlentities($_REQUEST['id']));
            $exito = $this->model->delete($prod);
            $msj = 'Cotizacion eliminado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo eliminar esta cotizacion";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            header('Location:index.php?c=cotizacion&f=index');
        }
    }

    // muestra el formulario de editar cotizacion
    public function view_edit()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=cotizacion&f=index');
        }else {
            //leer parametro
            $id = $_REQUEST['id'];
            $cot = $this->model->selectOne($id);
            $modeloTipoProd = new ProductosDAO();
            $tipoProductos = $modeloTipoProd->selectTipoProducto();

            // comunicarse con la vista
            require_once VCOTIZACION . 'edit.php';
        }
    }

    // lee datos del formulario de editar cotizacion y lo actualiza en la bdd (llamando al modelo)
    public function edit()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($_SESSION['usuario']  == null || $_SESSION['usuario'] == '' && $_SESSION['contra'] == null || $_SESSION['contra'] == '') {
            require_once VLOGIN . 'ingresar.php'; //redirijir
        }

        if($_SESSION['rol'] == null || $_SESSION['rol'] == 0){
            header('Location:index.php?c=cotizacion&f=index');
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $cot = new Cotizacion();
            $cot->setId(htmlentities($_POST['id']));
            $cot->setNombre(htmlentities($_POST['nombre']));
            $cot->setCorreo(htmlentities($_POST['correo']));
            $cot->setTelefono(htmlentities($_POST['telefono']));
            $cot->setDireccion(htmlentities($_POST['direccion']));
            $cot->setDescripcion(htmlentities($_POST['descripcion']));
            $cot->setPresupuesto(htmlentities($_POST['presupuesto']));
            $cot->setfechaCotizacion(htmlentities($_POST['fecha']));
            $cot->setIdTipo(htmlentities($_POST['tipo_producto']));

            //llamar al modelo
            $exito = $this->model->update($cot);

            $msj = 'Cotizacion actualizado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=cotizacion&f=index');
        }
    }
}

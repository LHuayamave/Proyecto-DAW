<!--autora : Nieves Pincay Kenia-->
<?php
require_once 'model/dao/ProveedoresDAO.php';
require_once 'model/dto/Proveedor.php';

class ProveedoresController {
    private $model;
    
    public function __construct() {// constructor
        $this->model = new ProveedoresDAO();
    }

    // funciones del controlador
    public function index() {
        //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAllFiltro("");
        // comunicarnos a la vista
        // require_once HEADERADICIONAL;
        require_once VPROVEEDORES.'list.php';
        // require_once FOOTER ;
    }

    public function search(){
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
        //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAllFiltro($parametro);
        // comunicarnos a la vista
        require_once VPROVEEDORES.'list.php';
    }

    // muestra el formulario de nuevo producto
    public function view_new(){
        //comunicarse con el modelo
        $modeloProv = new ProveedoresDAO();
        $prove = $modeloProv->selectAllMetodosPago();

        // comunicarse con la vista
        require_once VPROVEEDORES.'nuevo.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
      //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            // considerar verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            $prov = new Proveedor();
            // lectura de parametros
            $prov->setIdMedioPago(htmlentities($_POST['medioPago']));
            $prov->setIdProveedor(htmlentities($_POST['id']));
            $prov->setNombre(htmlentities($_POST['nombre']));
            $prov->setDireccion(htmlentities($_POST['direccion']));
            $prov->setTelefono(htmlentities($_POST['telefono']));
            $prov->setFechaContrato(htmlentities($_POST['fecha']));
            


            //comunicar con el modelo
            $exito = $this->model->insert($prov);

            $msj = 'Producto guardado exitosamente';
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
            header('Location:index.php?c=proveedores&f=index');
        } 
    }

    public function delete(){
        //leeer parametros
        $prov = new Proveedor();
        $prov->setIdProveedor(htmlentities($_REQUEST['id']));
            
            //comunicando con el modelo
            $exito = $this->model->delete($prov);
            $msj = 'Producto eliminado exitosamente';
                $color = 'primary';
                if (!$exito) {
                    $msj = "No se pudo eliminar la actualizacion";
                    $color = "danger";
                }
                if(!isset($_SESSION)){ session_start();};
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=proveedores&f=index');
    }


   // muestra el formulario de editar producto
    public function view_edit(){
        //leer parametro
        $id= $_REQUEST['id']; // verificar, limpiar
        //comunicarse con el modelo de productos
        $prov = $this->model->selectOne($id);
        //comunicarse con el modelo de categorias
        $modeloProv = new ProveedoresDAO();
        $prove = $modeloProv->selectAllMetodosPago();
        

        // comunicarse con la vista
        require_once VPROVEEDORES.'edit.php';
    }

   // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            // leer parametros
            $prov = new Proveedor();
            $prov->setIdProveedor(htmlentities($_POST['id']));
            $prov->setNombre(htmlentities($_POST['nombre']));
            $prov->setDireccion(htmlentities($_POST['direccion']));
            $prov->setTelefono(htmlentities($_POST['telefono']));
            $prov->setFechaContrato(htmlentities($_POST['fecha']));
            $prov->setIdMedioPago(htmlentities($_POST['medioPago']));
            
            //llamar al modelo
            $exito = $this->model->update($prov);
            
            $msj = 'Proveedor actualizado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
            if(!isset($_SESSION)){ session_start();};
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?c=Proveedores&f=index');
            
        } 
    }
}

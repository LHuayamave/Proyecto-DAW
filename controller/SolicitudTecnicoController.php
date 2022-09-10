
<?php
require_once 'model/dao/SolicitudTecnicoDAO.php';

require_once 'model/dto/SolicitudTecnico.php';

class SolicitudTecnicoController {
    private $model;
    
    public function __construct() {// constructor
        $this->model = new SolicitudTecnicoDAO();
    }

    // funciones del controlador
    public function index() {
      //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectAll("");
      // comunicarnos a la vista
     // require_once HEADERADICIONAL;
      require_once VSOLICITUDTECNICO.'list.php';
     // require_once FOOTER ;
      
    }

    public function search(){
      // lectura de parametros enviados
      $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
     //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectAll($parametro);
     // comunicarnos a la vista
     require_once VSOLICITUDTECNICO.'list.php';
    }

    // muestra el formulario de nuevo producto
    public function view_new(){
          //comunicarse con el modelo
          $modeloCat = new CategoriasDAO();
          $categorias = $modeloCat->selectAll();

          // comunicarse con la vista
          require_once VSOLICITUDTECNICO.'nuevo.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
      //cuando la solicitud es por post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
          // considerar verificaciones
          //if(!isset($_POST['codigo'])){ header('');}
          $prod = new Producto();
          // lectura de parametros
          $prod->setCodigo(htmlentities($_POST['codigo']));
          $prod->setNombre(htmlentities($_POST['nombre']));
          $prod->setDescripcion(htmlentities($_POST['descripcion']));
          $prod->setPrecio(htmlentities($_POST['precio']));
          $prod->setIdCategoria(htmlentities($_POST['categoria']));
          $estado = (isset($_POST['estado'])) ? 1 : 0; // ejemplo de dato no obligatorio
          $prod->setEstado($estado);
          $prod->setUsuario('usuario'); //$_SESSION['usuario'];
          $fechaActual = new DateTime('NOW');
          $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
        
          //comunicar con el modelo
          $exito = $this->model->insert($prod);

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
          header('Location:index.php?c=Productos&f=index');
      } 
  }
}
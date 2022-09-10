
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
          $modeloSolicitud = new SolicitudTecnicoDAO();
          $problemas = $modeloSolicitud->selectAllProblems();

          // comunicarse con la vista
          require_once VSOLICITUDTECNICO.'nuevo.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
      //cuando la solicitud es por post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
          // considerar verificaciones
          //if(!isset($_POST['codigo'])){ header('');}
          $soli = new SolicitudTecnico();
          // lectura de parametros
          $soli->setNombre(htmlentities($_POST['nombre']));
          $soli->setApellido(htmlentities($_POST['apellido']));
          $soli->setCorreo(htmlentities($_POST['correo']));
          $soli->setFechaSolicitud(htmlentities($_POST['fecha_solicitud']));
          $soli->setId_problemas(htmlentities($_POST['problemas']));
        
          //comunicar con el modelo
          $exito = $this->model->insert($soli);

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
          header('Location:index.php?c=solicitudtecnico&f=index');
      } 
  }
}
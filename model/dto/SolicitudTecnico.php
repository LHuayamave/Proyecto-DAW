<?php
    class Solicitud_Tecnico{

        private $id_solicitud, $nombre, $apellido, $correo, $fecha_solicitud, $id_problemas;

        function __construct() {
        
        }


        //Metodos Getter
        function getId_solicitud(){
            return $this->id_solicitud;
        }

        function getNombre(){
            return $this->nombre;
        }

        function getApellido(){
            return $this->apellido;
        }

        function getCorreo(){
            return $this->correo;
        }

        function getFecha_solicidutd(){
            return $this->fecha_solicitud;
        }

        function getId_problemas(){
            return $this->id_problemas;
        }


        //Metodos Setter
        function setId_solicitud($id_solicitud) {
            $this->id_solicitud = $id_solicitud;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }
        
        function setCorreo($correo){
            $this->correo = $correo;
        }

        function setFecha_solicitud($fecha_solicitud){
            $this->fecha_solicitud = $fecha_solicitud;
        }

        function setId_problemas($id_problemas){
            $this->id_problemas = $id_problemas;
        }

        // Methods get y set parametrizados
        public function __set($nombre, $valor) {
            // Verifica que la propiedad exista
            if (property_exists('Solicitud', $nombre)) {
                $this->$nombre = $valor;
            } else {
                echo $nombre . " No existe.";
            }
        }

        public function __get($nombre) {
            // Verifica que exista la propiedad
              if (property_exists('Solicitud', $nombre)) {
                  return $this->$nombre;
              }
             // Retorna null si no existe
              return NULL;
          }



    }
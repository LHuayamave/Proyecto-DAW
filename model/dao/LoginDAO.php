<?php
// autor:Nieves Pincay Kenia
require_once 'config/conexion.php';

class LoginDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    function validarUsuario($login){
        try {
            $sql = "SELECT *FROM usuarios where correo=:USER and contrasenia=:PASS";
            // $resultado = $this->con->prepare($sql);
            // $resultado->execute(array(":USER"=>$login->getUsuario(), ":PASS"=>$login->getContrasenia()));
            // $cantidad_resultado = $resultado->rowCount();
            // return $resultado;
            // }catch (Exception $e) {
            //     echo $e;
            // } finally {

            //     $cantidad_resultado = null;
            // }
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'USER' => $login -> getUsuario(),
                'PASS' => $login -> getContrasenia()
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function selectRol($parametro)
    {
        // sql de la sentencia
        $sql = "SELECT id_trabajo FROM usuarios where correo=:USER";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $data = [
            'USER' => $parametro,
        ];

        $stmt->execute($data);
        //recuperar  resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultados;
    }
}

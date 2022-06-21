<?php
    class connection{
        public static function conectar(){
            try{
                $conexion = new mysqli('localhost', 'root', '', 'restaurante');
                return $conexion;
            } catch (Exception $e){
                die($e->getMessage());
            }
        }
    }
?>
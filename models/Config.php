<?php
    require '../config/Connection.php';
    
    Class Config {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT config_id, config_title, config_value 
                    FROM config;";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($config_id) {
            $sql = "SELECT config_id, config_title, config_value 
                    FROM config
                    WHERE config_id = '$config_id'; ";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($config_title, $config_value, $lastupdated) {
            $sql = "INSERT INTO config (config_title, config_value, lastupdated)
                    VALUES ('$config_title', '$config_value', '$lastupdated');";
            return ejecutarConsulta($sql);
        }
        
        public function editar($config_title, $config_value, $lastupdated, $config_id) {
            $sql = "UPDATE config SET 
                    config_title = '$config_title',
                    config_value = '$config_value',
                    lastupdated = '$lastupdated'
                    WHERE config_id = '$config_id';";
            return ejecutarConsulta($sql);
        }
    }
?>
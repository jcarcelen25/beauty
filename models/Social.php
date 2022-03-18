<?php
    require '../config/Connection.php';
    
    Class Social {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT social_id, social_name, social_url, social_icon, social_position, social_status, lastupdated 
                    FROM social;";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_activos() {
            $sql = "SELECT social_id, social_name, social_url, social_icon, social_position, social_status, lastupdated 
                    FROM social
                    WHERE social_status = '1';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_inactivos() {
            $sql = "SELECT social_id, social_name, social_url, social_icon, social_position, social_status, lastupdated 
                    FROM social
                    WHERE social_status = '0';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($social_id) {
            $sql = "SELECT social_id, social_name, social_url, social_icon, social_position, social_status, lastupdated 
                    FROM social
                    WHERE social_id = '$social_id';";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($social_name, $social_url, $social_icon, $social_position, $lastupdated) {
            $sql = "INSERT INTO social (social_name, social_url, social_icon, social_position, social_status, lastupdated)
                    VALUES ('$social_name', '$social_url', '$social_icon', '$social_position', '1', '$lastupdated');";
            return ejecutarConsulta($sql);
        }
        
        public function editar($social_name, $social_url, $social_icon, $social_position, $lastupdated, $social_id) {
            $sql = "UPDATE social SET 
                    social_name = '$social_name',
                    social_url = '$social_url',
                    social_icon = '$social_icon',
                    social_position = '$social_position',
                    lastupdated = '$lastupdated'
                    WHERE social_id = '$social_id';";
            return ejecutarConsulta($sql);
        }
        
        public function desactivar($lastupdated, $social_id) {
            $sql = "UPDATE social SET
                    social_status = '0',
                    lastupdated = '$lastupdated'
                    WHERE social_id = '$social_id';";
            return ejecutarConsulta($sql);
        }
        
        public function activar($lastupdated, $social_id) {
            $sql = "UPDATE social SET
                    social_status = '1',
                    lastupdated = '$lastupdated'
                    WHERE social_id = '$social_id';";
            return ejecutarConsulta($sql);
        }
        
        public function registrar_origen($social_id) {
            $sql = "UPDATE social
                    SET social_count = (
                        (SELECT social_count
                         FROM social
                         WHERE social_id = $social_id) + 1)
                    WHERE social_id = $social_id; ";
            return ejecutarConsulta($sql);
        }
    }
?>
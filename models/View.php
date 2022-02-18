<?php
    require '../config/Connection.php';
    
    Class View {
        public function __construct() { /* constructor */ }
        
        public function insertar($view_origin, $id_post) {
            $sql = "INSERT INTO view (view_origin, view_date, id_post)
                    VALUES ('$view_origin', NOW(), '$id_post');";
            return ejecutarConsulta($sql);
        }
    }
?>
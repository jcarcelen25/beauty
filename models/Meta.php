<?php
    require '../config/Connection.php';
    
    Class Meta {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos($id_post) {
            $sql = "SELECT meta_id, meta_title, meta_value, id_post, lastupdated
                    FROM meta
                    WHERE id_post = '$id_post';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($meta_id) {
            $sql = "SELECT meta_id, meta_title, meta_value, id_post, lastupdated
                    FROM meta
                    WHERE meta_id = '$meta_id';";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($meta_title, $meta_value, $id_post, $lastupdated) {
            $sql = "INSERT INTO meta (meta_title, meta_value, id_post, lastupdated)
                    VALUES ('$meta_title', '$meta_value', '$id_post', '$lastupdated'); ";
            return ejecutarConsulta($sql);
        }
        
        public function editar($meta_title, $meta_value, $lastupdated, $meta_id) {
            $sql = "UPDATE meta SET
                    meta_title = '$meta_title',
                    meta_value = '$meta_value',
                    lastupdated = '$lastupdated'
                    WHERE meta_id = '$meta_id';";
            return ejecutarConsulta($sql);
        }
    }
?>
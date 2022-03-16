<?php
    require '../config/Connection.php';
    
    Class Image {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos($id_post) {
            $sql = "SELECT image_id, image_url, image_type, image_position, image_status
                    FROM image
                    WHERE id_post = '$id_post'; ";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_activos($id_post) {
            $sql = "SELECT image_id, image_url, image_type, image_position, image_status
                    FROM image
                    WHERE id_post = '$id_post'
                    AND image_status = '1';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_inactivos($id_post) {
            $sql = "SELECT image_id, image_url, image_type, image_position, image_status
                    FROM image
                    WHERE id_post = '$id_post'
                    AND image_status = '0';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($image_id) {
            $sql = "SELECT image_id, image_url, image_type, image_position, image_status
                    FROM image
                    WHERE image_id = '$image_id'; ";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($image_url, $image_type, $image_position, $id_post, $lastupdated) {
            $sql = "INSERT INTO image (image_url, image_type, image_position, image_status, id_post, lastupdated)
                    VALUES ('$image_url', '$image_type', '$image_position', '1', '$id_post', '$lastupdated');";
            return ejecutarConsulta($sql);
        }
        
        public function editar($image_url, $image_type, $image_position, $lastupdated, $image_id) {
            $sql = "UPDATE image SET 
                    image_url = '$image_url',
                    image_type = '$image_type',
                    image_position = '$image_position',
                    lastupdated = '$lastupdated'
                    WHERE image_id = '$image_id';";
            return ejecutarConsulta($sql);
        }
        
        public function desactivar($lastupdated, $image_id) {
            $sql = "UPDATE image SET 
                    image_status = '0',
                    lastupdated = '$lastupdated'
                    WHERE image_id = '$image_id';";
            return ejecutarConsulta($sql);
        }
        
        public function activar($lastupdated, $image_id) {
            $sql = "UPDATE image SET 
                    image_status = '1',
                    lastupdated = '$lastupdated'
                    WHERE image_id = '$image_id';";
            return ejecutarConsulta($sql);
        }
    }
?>
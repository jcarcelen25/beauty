<?php
    require '../config/Connection.php';
    
    Class Post {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT post_id, post_title, post_meta_title, post_slug, post_summary, post_published, post_content, post_likes, post_status, b.author_user
                    FROM post a 
                    JOIN author b ON a.id_author = b.author_id;";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_activos() {
            $sql = "SELECT post_id, post_title, post_meta_title, post_slug, post_summary, post_published, post_content, post_likes, post_status, b.author_user
                    FROM post a 
                    JOIN author b ON a.id_author = b.author_id
                    WHERE post_status = '1';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_inactivos() {
            $sql = "SELECT post_id, post_title, post_meta_title, post_slug, post_summary, post_published, post_content, post_likes, post_status, b.author_user
                    FROM post a 
                    JOIN author b ON a.id_author = b.author_id
                    WHERE post_status = '0';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($post_id) {
            $sql = "SELECT post_id, post_title, post_meta_title, post_slug, post_summary, post_published, post_content, post_likes, post_status, id_author 
                    FROM post
                    WHERE post_id = '$post_id';";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($post_title, $post_meta_title, $post_slug, $post_summary, $post_content, $id_author, $lastupdated) {
            $sql = "INSERT INTO post (post_title, post_meta_title, post_slug, post_summary, post_published, post_content, post_likes, post_status, id_author, lastupdated)
                    VALUES ('$post_title', '$post_meta_title', '$post_slug', '$post_summary', 'NOW()', '$post_content', '0', '1', '$id_author', '$lastupdated');";
            return ejecutarConsulta($sql);
        }
        
        public function editar($post_title, $post_meta_title, $post_slug, $post_summary, $post_content, $lastupdated, $post_id) {
            $sql = "UPDATE post SET
                    post_title = '$post_title',
                    post_meta_title = '$post_meta_title',
                    post_slug = '$post_slug',
                    post_summary = '$post_summary',
                    post_content = '$post_content',
                    lastupdated = '$lastupdated'
                    WHERE post_id = '$post_id'; ";
            return ejecutarConsulta($sql);
        }
        
        public function desactivar($lastupdated, $post_id) {
            $sql = "UPDATE post SET 
                    post_status = '0',
                    lastupdated = '$lastupdated'
                    WHERE post_id = '$post_id';";
            return ejecutarConsulta($sql);
        }
        
        public function activar($lastupdated, $post_id) {
            $sql = "UPDATE post SET 
                    post_status = '1',
                    lastupdated = '$lastupdated'
                    WHERE post_id = '$post_id';";
            return ejecutarConsulta($sql);
        }
    }
?>
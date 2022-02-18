<?php
    require '../config/Connection.php';
    
    Class Comment {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT comment_id, post_title, author_user, comment_text, comment_date, comment_level, comment_status
                    FROM comment a 
                    JOIN author b ON a.id_author = b.author_id
                    JOIN post c ON a.id_post = c.post_id;";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_activos() {
            $sql = "SELECT comment_id, post_title, author_user, comment_text, comment_date, comment_level, comment_status
                    FROM comment a 
                    JOIN author b ON a.id_author = b.author_id
                    JOIN post c ON a.id_post = c.post_id
                    WHERE comment_status = '1';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_inactivos() {
            $sql = "SELECT comment_id, post_title, author_user, comment_text, comment_date, comment_level, comment_status
                    FROM comment a 
                    JOIN author b ON a.id_author = b.author_id
                    JOIN post c ON a.id_post = c.post_id
                    WHERE comment_status = '0';";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($comment_id) {
            $sql = "SELECT comment_id, comment_text, comment_date, comment_level, comment_status, id_author, id_post 
                    FROM comment 
                    WHERE comment_id = '$comment_id'; ";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($comment_text, $comment_level, $id_author, $id_post) {
            $sql = "INSERT INTO comment (comment_text, comment_date, comment_level, comment_status, id_author, id_post)
                    VALUES ('$comment_text', NOW(), '$comment_level', '1', '$id_author', '$id_post');";
            return ejecutarConsulta($sql);
        }
        
        public function editar($comment_text, $comment_id) {
            $sql = "UPDATE comment SET 
                    comment_text = '$comment_text',
                    comment_date = NOW()
                    WHERE comment_id = '$comment_id';";
            return ejecutarConsulta($sql);
        }
        
        public function desactivar($comment_id) {
            $sql = "UPDATE comment SET 
                    comment_status = '1'
                    WHERE comment_id = '$comment_id';";
            return ejecutarConsulta($sql);
        }
        
        public function activar($comment_id) {
            $sql = "UPDATE comment SET 
                    comment_status = '0'
                    WHERE comment_id = '$comment_id';";
            return ejecutarConsulta($sql);
        }
    }
?>
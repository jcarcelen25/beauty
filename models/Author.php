<?php
    require '../config/Connection.php';
    
    Class Author {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT author_id, author_user, author_status,
                        (SELECT COUNT(post_id) FROM post b WHERE a.author_id = b.id_author) AS post,
                        (SELECT SUM(view_id) FROM view c JOIN post d ON c.id_post = d.post_id WHERE d.id_author = a.author_id) AS visitas,
                        (SELECT SUM(post_likes) FROM post b WHERE a.author_id = b.id_author) AS likes
                    FROM author a; ";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_activos() {
            $sql = "SELECT author_id, author_user, author_status,
                        (SELECT COUNT(post_id) FROM post b WHERE a.author_id = b.id_author) AS post,
                        (SELECT SUM(view_id) FROM view c JOIN post d ON c.id_post = d.post_id WHERE d.id_author = a.author_id) AS visitas,
                        (SELECT SUM(post_likes) FROM post b WHERE a.author_id = b.id_author) AS likes
                    FROM author a
                    WHERE author_status > '0'; ";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_inactivos() {
            $sql = "SELECT author_id, author_user, author_status,
                        (SELECT COUNT(post_id) FROM post b WHERE a.author_id = b.id_author) AS post,
                        (SELECT SUM(view_id) FROM view c JOIN post d ON c.id_post = d.post_id WHERE d.id_author = a.author_id) AS visitas,
                        (SELECT SUM(post_likes) FROM post b WHERE a.author_id = b.id_author) AS likes
                    FROM author a
                    WHERE author_status = '0'; ";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($author_id) {
            $sql = "SELECT author_id, author_user, author_status
                    FROM author
                    WHERE author_id = '$author_id'; ";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($author_user, $author_password, $lastupdated) {
            $sql = "INSERT INTO author (author_user, author_password, author_status, lastupdated)
                    VALUES ('$author_user', '$author_password', '2', $lastupdated);";
            return ejecutarConsulta($sql);
        }
        
        public function editar($author_password, $lastupdated, $author_id) {
            $sql = "UPDATE author SET 
                    author_password = '$author_password',
                    lastupdated = '$lastupdated'
                    WHERE author_id = '$author_id';";
            return ejecutarConsulta($sql);
        }
        
        public function desactivar($lastupdated, $author_id) {
            $sql = "UPDATE author SET 
                    author_status = '0',
                    lastupdated = '$lastupdated'
                    WHERE author_id = '$author_id';";
            return ejecutarConsulta($sql);
        }
        
        public function activar($lastupdated, $author_id) {
            $sql = "UPDATE author SET 
                    author_status = '2',
                    lastupdated = '$lastupdated'
                    WHERE author_id = '$author_id';";
            return ejecutarConsulta($sql);
        }
        
        public function login($usuario, $clave) {
            $sql = "SELECT author_id, author_user
                    FROM author 
                    WHERE author_status > 0
                    AND author_user = '$usuario' 
                    AND author_password = '$clave' ; ";
            return ejecutarConsulta($sql);
        }
    }
?>
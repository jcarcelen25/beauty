<?php
    require '../config/Connection.php';
    
    Class Author {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT author_id, author_user, author_status, lastupdated
                    FROM author;";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_activos() {
            $sql = "SELECT author_id, author_user, author_status, lastupdated
                    FROM author
                    WHERE author_status = '1'; ";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_inactivos() {
            $sql = "SELECT author_id, author_user, author_status, lastupdated
                    FROM author
                    WHERE author_status = '0'; ";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($author_id) {
            $sql = "SELECT author_id, author_user, author_status, lastupdated
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
    }
?>
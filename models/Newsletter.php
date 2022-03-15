<?php
    require '../config/Connection.php';
    
    Class Newsletter {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT newsletter_id, newsletter_email, newsletter_date
                    FROM newsletter; ";
            return ejecutarConsulta($sql);
        }

        public function insertar($newsletter_email) {
            $sql = "INSERT INTO newsletter (newsletter_email, newsletter_date)
                    VALUES ('$newsletter_email', NOW());";
            return ejecutarConsulta($sql);
        }
        
        public function desactivar($newsletter_id) {
            $sql = "DELETE FROM newsletter
                    WHERE newsletter_id = '$newsletter_id';";
            return ejecutarConsulta($sql);
        }
    }
?>
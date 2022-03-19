<?php
    require '../config/Connection.php';
    
    Class Count {
        public function __construct() { /* constructor */ }
        
        public function mostrar_todos() {
            $sql = "SELECT count_id, count_name, count_type, count_ammount, DATE_FORMAT(count_date, '%d/%m/%Y') AS date,
                        (SELECT SUM(count_ammount) FROM count) AS total
                    FROM count; ";
            return ejecutarConsulta($sql);
        }
        
        public function mostrar_uno($count_id) {
            $sql = "SELECT count_id, count_name, count_type, count_ammount
                    FROM count
                    WHERE count_id = '$count_id'; ";
            return ejecutarConsultaSimple($sql);
        }
        
        public function insertar($count_name, $count_type, $count_ammount) {
            $sql = "INSERT INTO count (count_name, count_type, count_ammount, count_date)
                    VALUES ('$count_name', '$count_type', '$count_ammount', NOW());";
            return ejecutarConsulta($sql);
        }
        
        public function editar($count_name, $count_type, $count_ammount, $count_id) {
            $sql = "UPDATE count SET 
                    count_name = '$count_name',
                    count_type = '$count_type',
                    count_ammount = '$count_ammount'
                    WHERE count_id = '$count_id';";
            return ejecutarConsulta($sql);
        }
    }
?>
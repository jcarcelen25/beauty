<?php
    require_once 'global.php';
    
    $conexion = new mysqli(DB_HOST, USER_DB, PASSWORD_DB, DB_NAME);
    mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');
    mysqli_query($conexion,'SET lc_time_names = "es_ES" ');
    error_reporting(0);  /* no se muestran los errores de php */
    
    if (mysqli_connect_errno()) {
        printf("Error de conexión: ", mysqli_connect_error());
        exit();
    }
    
    if (!function_exists('ejecutarConsulta')) { /* Metodo que puede regresar varias filas de resultado - para insert, update y delete */
        function ejecutarConsulta($sql) {
            global $conexion;
            $query = $conexion->query($sql);
            return $query;
        }

        function ejecutarJson($sql){ /* Metodo que puede regresar un arreglo de objetos JSON - varias filas */
            global $conexion;
            mysqli_set_charset($conexion,"utf8");
            $res_query = mysqli_query($conexion, $sql);   
            $resultado = array();
            while ($producto = $res_query -> fetch_assoc()) {
                $resultado[]=$producto;
            }
            
            if (!empty($resultado)) {
                return json_encode($resultado,JSON_UNESCAPED_UNICODE);
            } else {
                $resultado[] = "500";
                return json_encode($resultado,JSON_UNESCAPED_UNICODE);
            }
        }

        function ejecutarConsultaSimple($sql) { /* Metodo que puede regresar una sola fila de resultado - solo para select */
            global $conexion;
            $query = $conexion->query($sql);
            $row = $query->fetch_assoc();
            return $row;
        }
        
        function ejecutarConsultaRetornarID($sql) { /* Metodo que hace un insert y regresa el id */
            global $conexion;
            $query = $conexion->query($sql);
            return $conexion->insert_id;
        }
        
        function LimpiarCadena($str) { /* Limpia la cadena */
            global $conexion;
            $str = mysqli_real_escape_string($conexion,trim($str));
            return htmlspecialchars($str);
        }
    }
?>
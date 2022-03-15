<?php
    require_once '../models/Config.php';

    ob_start();
    if (strlen(session_id()) < 1) {
        session_start();
    }
    
    $config_id = isset($_POST["config_id"])? LimpiarCadena($_POST["config_id"]):"";
    $config_title = isset($_POST["config_title"])? LimpiarCadena($_POST["config_title"]):"";
    $config_value = isset($_POST["config_value"])? LimpiarCadena($_POST["config_value"]):"";
    
    $config = new Config();
        
    switch ($_GET["accion"]) {
        case 'mostrar_todos':
            $respuesta = $config -> mostrar_todos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->config_id,
                    "1" => $registrar->config_title,
                    "2" => $registrar->config_value,
                    "3" => '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->config_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->config_id.')">Eliminar</span></div>'
                );
            }
            
            $resultados = array(
                "sEcho"=>1, /* informacion para la herramienta datatables */
                "iTotalRecords"=>count($datos), /* envía el total de columnas a la datatable */
                "iTotalDisplayRecords"=>count($datos), /* envia el total de filas a visualizar */
                "aaData"=>$datos /* envía el arreglo completo que se llenó con el while */
            );
            echo json_encode($resultados);
        break;

        case 'mostrar_uno':
            $respuesta = $config -> mostrar_uno($config_id);
            echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;
    
        case 'guardar':
            if (empty($config_id)) { /* insertar */
                $respuesta = $config -> insertar($config_title, $config_value, $_SESSION['author_id']);
                echo $respuesta ? "1": "0";
            } else { /* actualizar */
                $respuesta = $config -> editar($config_title, $config_value, $_SESSION['author_id'], $config_id);
                echo $respuesta ? "1": "0";
            }
        break;
    
        case 'desactivar':
            $respuesta = $config -> desactivar($config_id);
            echo $respuesta ? "1": "0";
        break;
    }    
?>

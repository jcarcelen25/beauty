<?php
    require_once '../models/Count.php';

    $count_id = isset($_POST["count_id"])? LimpiarCadena($_POST["count_id"]):"";
    $count_name = isset($_POST["count_name"])? LimpiarCadena($_POST["count_name"]):"";
    $count_type = isset($_POST["count_type"])? LimpiarCadena($_POST["count_type"]):"";
    $count_ammount = isset($_POST["count_ammount"])? LimpiarCadena($_POST["count_ammount"]):"";
    
    $count = new Count();
        
    switch ($_GET["accion"]) {
        case 'mostrar_todos':
            $respuesta = $count -> mostrar_todos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->count_id,
                    "1" => $registrar->date,
                    "2" => $registrar->count_name,
                    "3" => ($registrar->count_type < 1)? '': '<div style="text-align:center">+$'.$registrar->count_ammount.'</div>', // ingreso
                    "4" => ($registrar->count_type < 1)? '<div style="text-align:center">$'.$registrar->count_ammount.'</div>': '', // egreso
                    "5" => ($registrar->total < 0)? '<div style="text-align:center">$'.$registrar->total.'</div>': '<div style="text-align:center">+$'.$registrar->total.'</div>', // total
                    "6" => '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->count_id.')">Editar</span>'
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
            $respuesta = $count -> mostrar_uno($count_id);
            echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;
    
        case 'guardar':
            if (empty($author_id)) { /* insertar */
                $respuesta = $count -> insertar($count_name, $count_type, $count_ammount);
                echo $respuesta ? "1": "0";
            } else { /* actualizar */
                $respuesta = $count -> editar($count_name, $count_type, $count_ammount, $count_id);
                echo $respuesta ? "1": "0";
            }
        break;
    }    
?>

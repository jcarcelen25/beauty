<?php
    require_once '../models/Newsletter.php';

    $newsletter_id = isset($_POST["newsletter_id"])? LimpiarCadena($_POST["newsletter_id"]):"";
    $newsletter_email = isset($_POST["newsletter_email"])? LimpiarCadena($_POST["newsletter_email"]):"";
    
    $newsletter = new Newsletter();
        
    switch ($_GET["accion"]) {
        case 'mostrar_todos':
            $respuesta = $newsletter -> mostrar_todos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->newsletter_id,
                    "1" => $registrar->newsletter_email,
                    "2" => $registrar->newsletter_date,
                    "3" => '<span class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->newsletter_id.')">Desactivar</span>'
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

        case 'guardar':
            $respuesta = $newsletter -> insertar($newsletter_email);
            echo $respuesta ? "1": "0";
        break;
    
        case 'desactivar':
            $respuesta = $newsletter -> desactivar($newsletter_id);
            echo $respuesta ? "1": "0";
        break;
    }    
?>

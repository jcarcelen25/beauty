<?php
    require_once '../models/Author.php';

    $author_id = $_SESSION['author_id'];
    $author_user = $_SESSION['author_user'];
    $author_password = $_SESSION['author_password'];
        
    $author = new Author();
        
    switch ($_GET["accion"]) {
        case 'mostrar_activos':
            $respuesta = $author -> mostrar_activos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $author->author_id,
                    "1" => $author->author_user,
                    "2" => $author->author_status,
                    "3" => $author->post,
                    "4" => $author->visitas,
                    "5" => $author->likes,
                    "6" => ''
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

        case 'mostrar_inactivos':
            $respuesta = $author -> mostrar_inactivos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $author->author_id,
                    "1" => $author->author_user,
                    "2" => $author->author_status,
                    "3" => $author->post,
                    "4" => $author->visitas,
                    "5" => $author->likes,
                    "6" => ''
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

        case 'mostrar_todos':
            $respuesta = $author -> mostrar_todos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $author->author_id,
                    "1" => $author->author_user,
                    "2" => $author->author_status,
                    "3" => $author->post,
                    "4" => $author->visitas,
                    "5" => $author->likes,
                    "6" => ''
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
    
        case 'login':
            $usuario = $_POST['usuario'];
            $clave = hash("SHA256",$_POST['clave']);
            
            $respuesta = $author -> verificar_login($usuario, $clave);
            $registrar = $respuesta -> fetch_object();
            if (isset($registrar)) {
                $_SESSION['author_id'] = $registrar -> persona_id;
            }
            echo json_encode($registrar);
        break;
    }    
?>

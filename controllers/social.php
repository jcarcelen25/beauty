<?php
    require_once '../models/Social.php';

    ob_start();
    if (strlen(session_id()) < 1) {
        session_start();
    }
    
    $social_id = isset($_POST["social_id"])? LimpiarCadena($_POST["social_id"]):"";
    $social_name = isset($_POST["social_name"])? LimpiarCadena($_POST["social_name"]):"";
    $social_url = isset($_POST["social_url"])? LimpiarCadena($_POST["social_url"]):"";
    $social_icon = isset($_POST["social_icon"])? LimpiarCadena($_POST["social_icon"]):"";
    $social_position = isset($_POST["social_position"])? LimpiarCadena($_POST["social_position"]):"";
    
    $social = new Social();
    
    switch ($_GET["accion"]) {
        case 'mostrar_activos':
            $respuesta = $social -> mostrar_activos($_REQUEST["id_post"]);
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->social_id,
                    "1" => $registrar->social_name,
                    "2" => '<div class="text-center" style="background-color:#3177fe;"><img src="../images/icons/'.$registrar->social_icon.'" style="width:75px; padding:5px;"></div>',
                    "3" => '<pre>'.$registrar->social_url.'</pre>',
                    "4" => $registrar->social_position,
                    "5" => ($registrar->social_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "6" => ($registrar->social_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->social_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->social_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->social_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->social_id.')">Desactivar</span>'
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
            $respuesta = $social -> mostrar_inactivos($_REQUEST["id_post"]);
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->social_id,
                    "1" => $registrar->social_name,
                    "2" => '<div class="text-center" style="background-color:#3177fe;"><img src="../images/icons/'.$registrar->social_icon.'" style="width:75px; padding:5px;"></div>',
                    "3" => '<pre>'.$registrar->social_url.'</pre>',
                    "4" => $registrar->social_position,
                    "5" => ($registrar->social_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "6" => ($registrar->social_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->social_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->social_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->social_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->social_id.')">Desactivar</span>'
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
            $respuesta = $social -> mostrar_todos($_REQUEST["id_post"]);
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->social_id,
                    "1" => $registrar->social_name,
                    "2" => '<div class="text-center" style="background-color:#3177fe;"><img src="../images/icons/'.$registrar->social_icon.'" style="width:75px; padding:5px;"></div>',
                    "3" => '<pre>'.$registrar->social_url.'</pre>',
                    "4" => $registrar->social_position,
                    "5" => ($registrar->social_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "6" => ($registrar->social_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->social_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->social_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->social_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->social_id.')">Desactivar</span>'
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
            $respuesta = $social -> mostrar_uno($social_id);
            echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;
    
        case 'guardar':
            if (!file_exists($_FILES['social_icon']['tmp_name'])|| !is_uploaded_file($_FILES['social_icon']['tmp_name'])) { /* valida si hay imagen */
                $social_icon = $_POST["imagen_actual"];
            } else {
                $extension = explode(".", $_FILES["social_icon"]["name"]);
                if ($_FILES['social_icon']['type'] == "image/jpg" || $_FILES['social_icon']['type'] == "image/jpeg" || $_FILES['social_icon']['type'] == "image/png") {
                    $social_icon = round(microtime(true)).'.'.end($extension);
                    move_uploaded_file($_FILES["social_icon"]["tmp_name"], "../images/icons/".$social_icon);
                } else {
                    echo "Error: el archivo enviado no es del formato correcto, se recibe un ".$_FILES['social_icon']['type'];
                }
            }
            
            if (empty($social_id)) { /* insertar */
                $respuesta = $social -> insertar($social_name, $social_url, $social_icon, $social_position, $_SESSION['author_id']);
                echo $respuesta ? "1": "0";
            } else { /* actualizar */
                $respuesta = $social -> editar($social_name, $social_url, $social_icon, $social_position, $_SESSION['author_id'], $social_id);
                echo $respuesta ? "1": "0";
            }
        break;
    
        case 'desactivar':
            $respuesta = $social -> desactivar($_SESSION['author_id'], $social_id);
            echo $respuesta ? "1": "0";
        break;
    
        case 'activar':
            $respuesta = $social -> activar($_SESSION['author_id'], $social_id);
            echo $respuesta ? "1": "0";
        break;
    }
?>
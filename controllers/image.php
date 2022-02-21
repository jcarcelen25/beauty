<?php
    require_once '../models/Image.php';

    ob_start();
    if (strlen(session_id()) < 1) {
        session_start();
    }
    
    $id_post = isset($_POST["id_post"])? LimpiarCadena($_POST["id_post"]):"";
    $image_id = isset($_POST["image_id"])? LimpiarCadena($_POST["image_id"]):"";
    $image_url = isset($_POST["image_url"])? LimpiarCadena($_POST["image_url"]):"";
    $image_type = isset($_POST["image_type"])? LimpiarCadena($_POST["image_type"]):"";
    $image_position = isset($_POST["image_position"])? LimpiarCadena($_POST["image_position"]):"";
    
    $image = new Image();
    
    switch ($_GET["accion"]) {
        case 'mostrar_activos':
            $respuesta = $image -> mostrar_activos($_REQUEST["id_post"]);
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->image_id,
                    "1" => '<img src="../images/post/'.$registrar->image_url.'" style="width:300px; border-radius:15px;"> ',
                    "2" => ($registrar->image_type == "1")? 'Post': 'Banner',
                    "3" => $registrar->image_position,
                    "4" => ($registrar->image_status == "0'")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "5" => ($registrar->image_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->image_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->image_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->image_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->image_id.')">Desactivar</span>'
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
            $respuesta = $image -> mostrar_inactivos($_REQUEST["id_post"]);
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->image_id,
                    "1" => '<img src="../images/post/'.$registrar->image_url.'" style="width:300px; border-radius:15px;"> ',
                    "2" => ($registrar->image_type == "1")? 'Post': 'Banner',
                    "3" => $registrar->image_position,
                    "4" => ($registrar->image_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "5" => ($registrar->image_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->image_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->image_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->image_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->image_id.')">Desactivar</span>'
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
            $respuesta = $image -> mostrar_todos($_REQUEST["id_post"]);
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->image_id,
                    "1" => '<img src="../images/post/'.$registrar->image_url.'" style="width:300px; border-radius:15px;"> ',
                    "2" => ($registrar->image_type == "1")? 'Post': 'Banner',
                    "3" => $registrar->image_position,
                    "4" => ($registrar->image_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "5" => ($registrar->image_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->image_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->image_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->image_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->image_id.')">Desactivar</span>'
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
            $respuesta = $image -> mostrar_uno($image_id);
            echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;
    
        case 'guardar':
            if (!file_exists($_FILES['image_url']['tmp_name'])|| !is_uploaded_file($_FILES['image_url']['tmp_name'])) { /* valida si hay imagen */
                $image_url = $_POST["imagen_actual"];
            } else {
                $extension = explode(".", $_FILES["image_url"]["name"]);
                if ($_FILES['image_url']['type'] == "image/jpg" || $_FILES['image_url']['type'] == "image/jpeg" || $_FILES['image_url']['type'] == "image/png") {
                    $image_url = round(microtime(true)).'.'.end($extension);
                    move_uploaded_file($_FILES["image_url"]["tmp_name"], "../images/post/".$image_url);
                } else {
                    echo "Error: el archivo enviado no es del formato correcto, se recibe un ".$_FILES['image_url']['type'];
                }
            }
            
            if (empty($image_id)) { /* insertar */
                $respuesta = $image -> insertar($image_url, $image_type, $image_position, $id_post, $_SESSION['author_id']);
                echo $respuesta ? "1": "0";
            } else { /* actualizar */
                $respuesta = $image -> editar($image_url, $image_type, $image_position, $_SESSION['author_id'], $image_id);
                echo $respuesta ? "1": "0";
            }
        break;
    
        case 'desactivar':
            $respuesta = $image -> desactivar($_SESSION['author_id'], $image_id);
            echo $respuesta ? "1": "0";
        break;
    
        case 'activar':
            $respuesta = $image -> activar($_SESSION['author_id'], $image_id);
            echo $respuesta ? "1": "0";
        break;
    }
?>
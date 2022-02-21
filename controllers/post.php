<?php
    require_once '../models/Post.php';

    ob_start();
    if (strlen(session_id()) < 1) {
        session_start();
    }
    
    $post_id = isset($_POST["post_id"])? LimpiarCadena($_POST["post_id"]):"";
    $post_title = isset($_POST["post_title"])? LimpiarCadena($_POST["post_title"]):"";
    $post_meta_title = isset($_POST["post_meta_title"])? LimpiarCadena($_POST["post_meta_title"]):"";
    $post_slug = isset($_POST["post_slug"])? LimpiarCadena($_POST["post_slug"]):"";
    $post_summary = isset($_POST["post_summary"])? LimpiarCadena($_POST["post_summary"]):"";
    $post_content = isset($_POST["post_content"])? LimpiarCadena($_POST["post_content"]):"";
    $id_author = isset($_POST["id_author"])? LimpiarCadena($_POST["id_author"]):"";
    
    $post = new Post();
    
    switch ($_GET["accion"]) {
        case 'mostrar_activos':
            $respuesta = $post -> mostrar_activos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->post_id,
                    "1" => $registrar->post_title,
                    "2" => $registrar->post_meta_title,
                    "3" => $registrar->post_slug,
                    "4" => substr($registrar->post_summary, 0, 150),
                    "5" => $registrar->author_user,
                    "6" => $registrar->post_published,
                    "7" => ($registrar->post_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "8" => $registrar->visitas,
                    "9" => $registrar->likes,
                    "10" => ($registrar->post_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->post_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span><br><a href="fotos_uno.php?id=1053" target="modalIframe" onclick="verModal(true)" style="margin:1px;" class="btn btn-sm btn-success" title="Fotos">Fotos</a><br><a href="tags_uno.php?id=1053" target="modalIframe" onclick="verModal(true)" style="margin:1px;" class="btn btn-sm btn-warning" title="Tags">Tags</a><br><span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->post_id.')">Desactivar</span>'
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
            $respuesta = $post -> mostrar_inactivos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->post_id,
                    "1" => $registrar->post_title,
                    "2" => $registrar->post_meta_title,
                    "3" => $registrar->post_slug,
                    "4" => substr($registrar->post_summary, 0, 150),
                    "5" => $registrar->author_user,
                    "6" => $registrar->post_published,
                    "7" => ($registrar->post_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "8" => $registrar->visitas,
                    "9" => $registrar->likes,
                    "10" => ($registrar->post_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->post_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span><br><span style="margin:1px;" class="btn btn-sm btn-success" title="Tags" onclick="fotos('.$registrar->post_id.')">Fotos</span><br><span style="margin:1px;" class="btn btn-sm btn-warning" title="Tags" onclick="tags('.$registrar->post_id.')">Tags</span><br><span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->post_id.')">Desactivar</span>'
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
            $respuesta = $post -> mostrar_todos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->post_id,
                    "1" => $registrar->post_title,
                    "2" => $registrar->post_meta_title,
                    "3" => $registrar->post_slug,
                    "4" => substr($registrar->post_summary, 0, 150),
                    "5" => $registrar->author_user,
                    "6" => $registrar->post_published,
                    "7" => ($registrar->post_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "8" => $registrar->visitas,
                    "9" => $registrar->likes,
                    "10" => ($registrar->post_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->post_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span><br><span style="margin:1px;" class="btn btn-sm btn-success" title="Tags" onclick="fotos('.$registrar->post_id.')">Fotos</span><br><span style="margin:1px;" class="btn btn-sm btn-warning" title="Tags" onclick="tags('.$registrar->post_id.')">Tags</span><br><span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->post_id.')">Desactivar</span>'
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
            $respuesta = $post -> mostrar_uno($post_id);
            echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;
    
        case 'guardar':
            if (empty($post_id)) { /* insertar */
                $respuesta = $post -> insertar($post_title, $post_meta_title, $post_slug, $post_summary, $post_content, $_SESSION['author_id'], $_SESSION['author_id']);
                echo $respuesta ? "1": "0";
            } else { /* actualizar */
                $respuesta = $post -> editar($post_title, $post_meta_title, $post_slug, $post_summary, $post_content, $_SESSION['author_id'], $post_id);
                echo $respuesta ? "1": "0";
            }
        break;
    
        case 'desactivar':
            $respuesta = $post -> desactivar($_SESSION['author_id'], $post_id);
            echo $respuesta ? "1": "0";
        break;
    
        case 'activar':
            $respuesta = $post -> activar($_SESSION['author_id'], $post_id);
            echo $respuesta ? "1": "0";
        break;
    }
?>
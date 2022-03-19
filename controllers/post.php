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
    $ads_type = isset($_POST["ads_type"])? LimpiarCadena($_POST["ads_type"]):"";
    
    $post = new Post();
    
    switch ($_GET["accion"]) {
        case 'mostrar_activos':
            $respuesta = $post -> mostrar_activos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->post_id,
                    "1" => $registrar->post_title,
                    "2" => $registrar->post_slug,
                    "3" => substr($registrar->post_summary, 0, 150),
                    "4" => ($registrar->fotos > 0)? $registrar->fotos : 'sin_fotos',
                    "5" => ($registrar->post_views > 0)? $registrar->post_views :'sin_visitas',
                    "6" => ($registrar->post_likes > 0)? $registrar->post_likes : 'sin_likes',
                    "7" => $registrar->author_user,
                    "8" => $registrar->post_published,
                    "9" => ($registrar->post_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "10" => ($registrar->post_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->post_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span><br><a href="fotos_uno.php?id='.$registrar->post_id.'" target="modalIframe" onclick="verModal(true)" style="margin:1px;" class="btn btn-sm btn-success" title="Fotos">Fotos</a><span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->post_id.')">Desactivar</span>'
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
                    "2" => $registrar->post_slug,
                    "3" => substr($registrar->post_summary, 0, 150),
                    "4" => ($registrar->fotos > 0)? $registrar->fotos : 'sin_fotos',
                    "5" => ($registrar->post_views > 0)? $registrar->post_views :'sin_visitas',
                    "6" => ($registrar->post_likes > 0)? $registrar->post_likes : 'sin_likes',
                    "7" => $registrar->author_user,
                    "8" => $registrar->post_published,
                    "9" => ($registrar->post_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "10" => ($registrar->post_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->post_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span><br><a href="fotos_uno.php?id='.$registrar->post_id.'" target="modalIframe" onclick="verModal(true)" style="margin:1px;" class="btn btn-sm btn-success" title="Fotos">Fotos</a><span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->post_id.')">Desactivar</span>'
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
                    "2" => $registrar->post_slug,
                    "3" => substr($registrar->post_summary, 0, 150),
                    "4" => ($registrar->fotos > 0)? $registrar->fotos : 'sin_fotos',
                    "5" => ($registrar->post_views > 0)? $registrar->post_views :'sin_visitas',
                    "6" => ($registrar->post_likes > 0)? $registrar->post_likes : 'sin_likes',
                    "7" => $registrar->author_user,
                    "8" => $registrar->post_published,
                    "9" => ($registrar->post_status == "0")?
                        '<small class="badge badge-danger">Inactivo</small>':
                        '<small class="badge badge-success">Activo</small>',
                    "10" => ($registrar->post_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->post_id.')">Activar</span>':
                        '<span class="btn btn-sm btn-info" style="margin:1px;" title="Editar" onclick="mostrarUno('.$registrar->post_id.')">Editar</span><br><a href="fotos_uno.php?id='.$registrar->post_id.'" target="modalIframe" onclick="verModal(true)" style="margin:1px;" class="btn btn-sm btn-success" title="Fotos">Fotos</a><span style="margin:1px;" class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->post_id.')">Desactivar</span>'
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
    
        case 'like':
            $respuesta = $post -> like($post_id);
            echo $respuesta ? "1": "0";
        break;
    
        case 'visita':
            $respuesta = $post -> visita($post_id);
            echo $respuesta ? "1": "0";
        break;
    
        case 'donar':
            $respuesta = $post -> donar($ads_type);
            echo $respuesta ? "1": "0";
        break;
    
        case 'mostrar_ads':
            $respuesta = $post -> mostrar_ads();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                $datos[] = array(
                    "0" => $registrar->ads_id,
                    "1" => $registrar->ads_type,
                    "2" => $registrar->ads_count
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
    }
?>
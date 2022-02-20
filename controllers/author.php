<?php
    require_once '../models/Author.php';

    $author_id = isset($_POST["author_id"])? LimpiarCadena($_POST["author_id"]):"";
    $author_user = isset($_POST["author_user"])? LimpiarCadena($_POST["author_user"]):"";
    $author_password = isset($_POST["author_password"])? LimpiarCadena($_POST["author_password"]):"";
    $author_password2 = isset($_POST["author_password2"])? LimpiarCadena($_POST["author_password2"]):"";
    
    $author = new Author();
        
    switch ($_GET["accion"]) {
        case 'mostrar_activos':
            $respuesta = $author -> mostrar_activos();
            $datos = Array(); /* arreglo para guardar los datos */
            while ($registrar = $respuesta -> fetch_object()) {
                if ($registrar->author_status == "0") { $status = '<small class="badge badge-danger">Inactivo</small>'; }
                else if ($registrar->author_status == "1") { $status = '<small class="badge badge-success">Autor</small>'; }
                else { $status = '<small class="badge badge-success">Administrador</small>'; }
                
                $datos[] = array(
                    "0" => $registrar->author_id,
                    "1" => $registrar->author_user,
                    "2" => $status,
                    "3" => ($registrar->post > 0)? $registrar->post: '0',
                    "4" => ($registrar->visitas > 0)? $registrar->visitas: '0',
                    "5" => ($registrar->likes > 0) ? $registrar->likes: '0',
                    "6" => ($registrar->author_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->author_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->author_id.')">Activar</span></div>':
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->author_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->author_id.')">Desactivar</span></div>'
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
                if ($registrar->author_status == "0") { $status = '<small class="badge badge-danger">Inactivo</small>'; }
                else if ($registrar->author_status == "1") { $status = '<small class="badge badge-success">Autor</small>'; }
                else { $status = '<small class="badge badge-success">Administrador</small>'; }
                
                $datos[] = array(
                    "0" => $registrar->author_id,
                    "1" => $registrar->author_user,
                    "2" => $status,
                    "3" => ($registrar->post > 0)? $registrar->post: '0',
                    "4" => ($registrar->visitas > 0)? $registrar->visitas: '0',
                    "5" => ($registrar->likes > 0) ? $registrar->likes: '0',
                    "6" => ($registrar->author_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->author_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->author_id.')">Activar</span></div>':
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->author_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->author_id.')">Desactivar</span></div>'
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
                if ($registrar->author_status == "0") { $status = '<small class="badge badge-danger">Inactivo</small>'; }
                else if ($registrar->author_status == "1") { $status = '<small class="badge badge-success">Autor</small>'; }
                else { $status = '<small class="badge badge-success">Administrador</small>'; }
                
                $datos[] = array(
                    "0" => $registrar->author_id,
                    "1" => $registrar->author_user,
                    "2" => $status,
                    "3" => ($registrar->post > 0)? $registrar->post: '0',
                    "4" => ($registrar->visitas > 0)? $registrar->visitas: '0',
                    "5" => ($registrar->likes > 0) ? $registrar->likes: '0',
                    "6" => ($registrar->author_status == "0")?
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->author_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-warning" title="Eliminar" onclick="activar('.$registrar->author_id.')">Activar</span></div>':
                        '<span class="btn btn-sm btn-info" title="Editar" onclick="mostrarUno('.$registrar->author_id.')">Editar</span>&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" title="Eliminar" onclick="desactivar('.$registrar->author_id.')">Desactivar</span></div>'
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
            $respuesta = $author -> mostrar_uno($author_id);
            echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;
    
        case 'guardar':
            $author_password = hash("SHA256",$_POST['author_password']);
            $author_password2 = hash("SHA256",$_POST['author_password2']);
            
            if ($author_password == $author_password2) {
                if (empty($author_id)) { /* insertar */
                    $respuesta = $author -> insertar($author_user, $author_password, "0");
                    echo $respuesta ? "1": "0";
                } else { /* actualizar */
                    $respuesta = $author -> editar($author_password, $lastupdated, $author_id);
                    echo $respuesta ? "1": "0";
                }
            } else {
                echo "0";
            }
        break;
    
        case 'desactivar':
            $respuesta = $author -> desactivar("0", $author_id);
            echo $respuesta ? "1": "0";
        break;
    
        case 'activar':
            $respuesta = $author -> activar("0", $author_id);
            echo $respuesta ? "1": "0";
        break;
    
        case 'login':
            $usuario = $_POST['usuario'];
            $clave = hash("SHA256",$_POST['clave']);
            
            $respuesta = $author -> login($usuario, $clave);
            $registrar = $respuesta -> fetch_object();
            if (isset($registrar)) {
                $_SESSION['author_id'] = $registrar -> persona_id;
            }
            echo json_encode($registrar);
        break;
    }    
?>

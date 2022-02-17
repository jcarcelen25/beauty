<?php
    switch ($_GET["accion"]) {
        case 'login':
            $usuario = $_POST['usuario'];
            $clave = hash("SHA256",$_POST['clave']);
            
            $respuesta = $usuarios -> verificar_login($usuario, $clave);
            $registrar = $respuesta -> fetch_object();
            if (isset($registrar)) {
                $_SESSION['persona_id'] = $registrar -> persona_id;
            }
            echo json_encode($registrar);
        break;
    }    
?>
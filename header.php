<?php require './config/Connection.php'; ?>
<?php
    session_start(); /* toma las variables de sesion */
    ob_start(); /* inicia almacenamiento en buffer */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        
        <title>Beauty & Photography</title>
        <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/png">

        <meta name="author" content="<?php echo$desarrollador; ?>" />
        <meta name="description" content="<?php echo $descripcion; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>"/>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="theme-color" content="#fbc1cd">
        
        <link href="src/bootstrap.css" rel="stylesheet">
        <link href="src/style.css" rel="stylesheet">
        <link href="src/lightbox.css" rel="stylesheet" />
        
        <script src="src/bootstrap.js"></script>
        <script src="src/lightbox-plus-jquery.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweerAlert -->
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Calistoga&family=Lobster&family=Montserrat&display=swap" rel="stylesheet">
    </head>
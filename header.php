<?php require './config/Connection.php'; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        
        <title><?php echo $empresa; ?></title>
        <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/png">

        <meta name="author" content="<?php echo$desarrollador; ?>" />
        <meta name="description" content="<?php echo $descripcion; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>"/>
        <meta name="robots" content="index, follow" />
        <meta name="theme-color" content="#000">
        
        <link href="src/bootstrap.css" rel="stylesheet">
        <link href="src/style.css" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet">
    </head>
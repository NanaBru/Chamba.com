<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?php 
        echo $_SESSION['nombre'];
        session_destroy();
    ?> 
    registrada! Congrats!</h1>
    <a href="index.html"><button>Volver</button></a>
</body>
</html>
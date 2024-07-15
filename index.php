<?php

    /* @autor Brian Sanchez */

    include './class/autoload.php';

    // Conectar a la base de datos
    $db = new database('localhost', 'root', '', 'miproyecto');

    // Obtener productos
    $productos = $db->select('productos');

    // Cargar la vista
    include './views/home.html';
?>

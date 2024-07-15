<?php

    /* @autor Brian Sanchez */
    
    include '../class/autoload.php';

    // Conectar a la base de datos
    $db = new database('localhost', 'root', '', 'miproyecto');

    // Obtener categorías
    $categorias = $db->select('categorias');

    // Cargar la vista
    include './views/lista_categorias.html';
?>

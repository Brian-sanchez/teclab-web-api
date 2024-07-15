<?php

    /* @autor Brian Sanchez */
    
    include '../class/autoload.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $datos_json = file_get_contents('php://input');
        $datos = json_decode($datos_json, true);

        $db = new database('localhost', 'root', '', 'miproyecto');

        $id = $datos['id'];
        $nombre = $datos['nombre'];

        $categoria = new categorias($db);
        $categoria->id = $id;
        $categoria->nombre = $nombre;
        $categoria->guardar();

        echo "Categoría guardada con éxito.";
    }
?>
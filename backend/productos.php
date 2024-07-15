<?php

    /* @autor Brian Sanchez */
    
    include '../class/autoload.php';

    $db = new database('localhost', 'root', '', 'miproyecto');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $datos_json = file_get_contents('php://input');
        $datos = json_decode($datos_json, true);

        $id = $datos['id'];
        $nombre = $datos['nombre'];
        $imagen = $datos['imagen'];
        $descripcion = $datos['descripcion'];
        $precio = $datos['precio'];
        $categoria = $datos['categoria'];

        echo $imagen;

        // Trabajar con categorías
        $productos = new productos($db);
        $productos->id = $id;
        $productos->nombre = $nombre;
        $productos->imagen = $imagen;
        $productos->descripcion = $descripcion;
        $productos->precio = $precio;
        $productos->categoria = $categoria;
        $productos->guardar();

        // Mostrar la cadena resultante
        echo "Producto guardado con éxito.";
    } else {
        // Obtener categorías
        $categorias = $db->select('categorias');

        include './views/productos.html';
    }
?>
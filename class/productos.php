<?php

    /* @autor Brian Sanchez */
    class productos {
        public $id;
        public $nombre;
        public $imagen;
        public $descripcion;
        public $precio;
        public $categoria;

        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function guardar() {
            $data = [
                'id' => $this->id,
                'nombre' => $this->nombre,
                'imagen' => $this->imagen,
                'descripcion' => $this->descripcion,
                'precio' => $this->precio,
                'categoria' => $this->categoria
            ];

            $this->db->insert('productos', $data);
        }

        public function eliminar() {
            if ($this->id) {
                $this->db->delete('productos', "id = $this->id");
            }
        }
    }
?>

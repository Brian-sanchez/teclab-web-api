<?php

    /* @autor Brian Sanchez */
    class categorias {
        public $id;
        public $nombre;

        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function guardar() {
            $data = [
                'id' => $this->id,
                'nombre' => $this->nombre
            ];

            $this->db->insert('categorias', $data);
        }

        public function eliminar() {
            if ($this->id) {
                $this->db->delete('categorias', "id = $this->id");
            }
        }
    }
?>

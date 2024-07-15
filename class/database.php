<?php

    /* @autor Brian Sanchez */
    class database {
        private $conn;

        public function __construct($servername, $username, $password, $dbname) {
            $this->conn = new mysqli($servername, $username, $password, $dbname);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function insert($table, $data) {
            $columns = implode(", ", array_keys($data));
            $values = implode("', '", array_values($data));
            $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
            return $this->conn->query($sql);
        }

        public function update($table, $data, $where) {
            $set = [];
            foreach ($data as $column => $value) {
                $set[] = "$column = '$value'";
            }
            $set = implode(", ", $set);
            $sql = "UPDATE $table SET $set WHERE $where";
            return $this->conn->query($sql);
        }

        public function delete($table, $where) {
            $sql = "DELETE FROM $table WHERE $where";
            return $this->conn->query($sql);
        }

        public function select($table, $where = '1', $columns = '*') {
            $sql = "SELECT $columns FROM $table WHERE $where";
            $result = $this->conn->query($sql);
            $rows = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
            return $rows;
        }
    }
?>

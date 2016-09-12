<?php

class Connection {

    protected $db;

    public function Connection() {
        $conn = NULL;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=siakad", "root", "beta");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
    }

    public function getConnection() {
        return $this->db;
    }

    public function tambah($array) {
        try {
            $value = array_values($array);
            $tabel = $value[0];
            $data_key = implode(",", array_keys($value[1]));
            $data_value = array_values($value[1]);
            $count = count($data_value);
            $tag = ltrim(str_repeat(",?", $count), ",");
            $sql = "INSERT INTO $tabel($data_key) VALUES ($tag)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute($data_value);
            echo 'Berhasil';
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
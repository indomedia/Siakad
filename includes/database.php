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
    public function tambah($tabel, $kolom, $data) {
        $tag = ltrim(str_repeat(",?", count($data)), ",");
        $sql = "INSERT INTO $tabel($kolom) VALUES ($tag)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }

}

?>
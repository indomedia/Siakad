<?php

class Connection {

    protected $db;

    public function Connection() {
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

    public function tambahData($array) {
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

    public function editData($array) {
        try {
            $value = array_values($array);
            $table = $value[0];
            $data_key = implode("=?,", array_keys($value[1])) . "=?";
            $wherecount = array_keys($value[2]);
            $count = count($wherecount);
            $data_value = array_merge(array_values($value[1]), array_values($value[2]));
            if ($count <= 1) {
                $where = implode("=?,", array_keys($value[2])) . "=?";
            } else if ($count >= 2) {
                $where = implode("=? AND ", array_keys($value[2])) . "=?";
            }
            $ql = "UPDATE $table SET $data_key WHERE $where";
            $stmt = $this->db->prepare($ql);
            $stmt->execute($data_value);
            echo 'berhasil';
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function hapusData($array) {
        try {
            $value = array_values($array);
            $table = $value[0];
            $wherecount = array_keys($value[2]);
            $count = count($wherecount);
            if ($count <= 1) {
                $where = implode("=?,", array_keys($value[2])) . "=?";
            } else if ($count >= 2) {
                $where = implode("=? AND ", array_keys($value[2])) . "=?";
            }
            $ql = "DELETE FROM $table WHERE $where";
            $stmt = $this->db->prepare($ql);
            $stmt->execute(array_values($value[2]));
            echo $stmt->rowCount()." record berhasil dihapus";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

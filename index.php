<?php

include 'includes/database.php';
$con = new Connection();
$con->getConnection();
$data = array("10", "89", "Salatiga");
//$con->tambah("mahasiswa", "id_mahasiswa, nim, alamat", $data);
$array = array("tabel" => "mahasiswa",
    "data" => array(
        "id_mahasiswa" => 11,
        "nim" => 104275026,
        "alamat" => "Salatiga"
    )
);
$con->tambahData($array);

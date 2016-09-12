<?php

include 'includes/database.php';
$con = new Connection();
$con->getConnection();
$array = array(
    "tabel" => "mahasiswa",
    "data" => array(
        "alamat" => "Klampeyan RT 01 RW 03 Salatiga"
    ),
    "where" => array(
        "nim" => 104275026,
        "id_mahasiswa" => 12
    )
);


<?php
include 'includes/database.php';
    $con = new Connection();
    $con->getConnection();
    $data=array("10", "89", "Salatiga");
    //$con->tambah("mahasiswa", "id_mahasiswa, nim, alamat", $data);
    $a=array("tabel"=>"mahasiswa",
        "data"=>array(
                        "id_mahasiswa"=>11, 
                        "nim"=>104275026, 
                        "alamat"=>"Salatiga"
                        )
        );
    $value= array_values($a);
    $count = count($a);
    $tabel=$value[0];
    $data_key = implode(",", array_keys($value[1]));
    $data_value = implode(",", array_values($value[1]));
    $con->tambah($a);
   
    


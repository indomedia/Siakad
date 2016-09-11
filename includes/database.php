<?php
try{
  $db = new PDO("mysql:host=localhost;dbname=siaka;charset=utf8mb4","root", "beta");  
} catch (Exception $ex) {
    echo 'gagal '.$ex.getMessage();
}

$db->prepare("insert into mahasiswa(id_mahasiswa, nim, alamat) values (?, ?, ?)");
$db->execute(array('1', '104274026', 'Klampeyan RT 01 RW 03'));
$db->query("select * from mahasiswa");
foreach ($db->fetch(PDO::FETCH_BOTH) as $row){
    echo $row['nim'];
}

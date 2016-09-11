<?php
try{
	$db=new PDO("mysql:host=localhost;dbname=siakad;charset=utf8mb4","root","beta");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $ex){
	exit("Tidak dapat menyambungkan dengan database! ".$ex->getMessage());
}



//$sql="INSERT INTO mahasiswa(id_mahasiswa, nim, alamat) VALUES (?, ?, ?)";
//$stmt = $db->prepare($sql);
//$stmt->execute(array(1,2,3));
$db->query("select * from mahasiswa");
foreach ($db->fetch(PDO::FETCH_BOTH) as $row){
    echo $row['nim'];
}
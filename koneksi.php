<?php
	
	//Sesuaikan config mysql nya
    $dns 		= "mysql:host=localhost;dbname=pilsis";
	$db_user 	= "root";
	$db_pass 	= "";

	try {
        $pdo = new PDO($dns, $db_user, $db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));      
    } catch (PDOException $e) {
        echo "Koneksi ke database gagal: ".$e->getMessage();
        die();
    }

 $koneksi = mysqli_connect("localhost","root","","pilsis");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>
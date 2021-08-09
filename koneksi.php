<?php
	$host = 'us-cdbr-east-04.cleardb.com'; 
	$db = 'e92d0a86';
	$user = 'b06e4d78cc70c5'; 
	$pass = 'e92d0a86';
	$charset = 'utf8mb4';

	// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

	// try{
	// 	$pdo = new PDO($dsn, $user, $pass); 
	// 	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	// } catch (PDOException $e){
	// 	throw new PDOException($e->getMessage());
	// }

	$koneksi = mysqli_connect("remotemysql.com,crbjmgeTtQ,FeK6dpleJ2,crbjmgeTtQ"); 
	if (mysqli_connect_errno()) {
		echo "Koneksi database eror asdasdasdasdasd: ". mysqli_connect_error();
	}
?>

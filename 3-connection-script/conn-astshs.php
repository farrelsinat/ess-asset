<?php
$host = 'localhost';
$user = 'u597806360_asset_shs';
$pass = 'AsT-PdsI#2025_ShS';
$db = 'u597806360_db_shs';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
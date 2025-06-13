<?php
$host = 'localhost';
$user = 'u597806360_asset_bop';
$pass = 'AsT-PdsI#2025_BoP';
$db = 'u597806360_db_bop';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
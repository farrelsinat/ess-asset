<?php
$host = 'localhost';
$user = 'u597806360_asset_top';
$pass = 'AsT-PdsI#2025_tOP';
$db = 'u597806360_db_top';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
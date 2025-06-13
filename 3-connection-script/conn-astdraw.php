<?php
$host = 'localhost';
$user = 'u597806360_asset_dw';
$pass = 'AsT-PdsI#2025_dW';
$db = 'u597806360_db_dw';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
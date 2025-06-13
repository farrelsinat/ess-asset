<?php
$host = 'localhost';
$user = 'u597806360_asset_mcr';
$pass = 'AsT-PdsI#2025_MCr';
$db = 'u597806360_db_mcr';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
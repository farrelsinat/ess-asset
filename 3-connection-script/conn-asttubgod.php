<?php
$host = 'localhost';
$user = 'u597806360_asset_tubgod';
$pass = 'AsT-PdsI#2025_tUBgoD';
$db = 'u597806360_db_tubgod';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
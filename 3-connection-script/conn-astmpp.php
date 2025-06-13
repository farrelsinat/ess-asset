<?php
$host = 'localhost';
$user = 'u597806360_asset_mpp';
$pass = 'AsT-PdsI#2025_mPp';
$db = 'u597806360_db_mpp';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
<?php
$servername = "localhost";
$username = "u597806360_admassetpdsi";
$password = "AsT-PdsI#2025";
$dbname = "u597806360_db_akuness";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("Koneksi gagal".$conn->connect_error);
}
//echo "Koneksi berhasil";
?>
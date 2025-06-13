<?php
$host = 'localhost';
$user = 'u597806360_doc_wo';
$pass = 'AsT-PdsI#2025_Wo';
$db = 'u597806360_db_wo';

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
		//echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db);
?>
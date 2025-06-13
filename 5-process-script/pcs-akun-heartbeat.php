<?php
session_start();
require 'conn-akun.php'; // your DB connection

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    date_default_timezone_set('Asia/Jakarta');
    $now = date('Y-m-d H:i:s');

    $query = "UPDATE tb_akuness SET last_active = '$now' WHERE username = '$username'";
    mysqli_query($conn, $query);
}
?>
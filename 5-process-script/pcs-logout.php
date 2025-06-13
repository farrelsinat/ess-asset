<?php
session_start();
require 'conn-akun.php'; // connect to your database

date_default_timezone_set('Asia/Jakarta');

// Get username from session before destroying it
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Set is_online to 0 and update last_logout time
    $logoutTime = date('Y-m-d H:i:s');
    $updateStatusQuery = "
        UPDATE tb_akuness 
        SET is_online = 0, last_logout = '$logoutTime' 
        WHERE username = '$username'
    ";
    mysqli_query($conn, $updateStatusQuery);
}

// Clear all session data
session_unset();
session_destroy();

// Redirect to sign-in page
header('Location: page-signin.php');
exit();
?>
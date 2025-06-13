<?php
require 'conn-akun.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $status = $_POST['status_akun'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the query to insert the new user
    $query = "INSERT INTO tb_akuness (email, username, password, user_role, status_akun) VALUES ('$email', '$username', '$hashedPassword', '$role', '$status')";
    if (mysqli_query($conn, $query)) {
        echo "
        <script>
        alert('User successfully added.');
        window.location.href = 'page-admpanelfinput.php'; // Redirect to the same page or to an admin page
        </script>";
    } else {
        echo "
        <script>
        alert('Error adding user: " . mysqli_error($conn) . "');
        window.location.href = 'page-admpanelfinput.php';
        </script>";
    }
}
?>
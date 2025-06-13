<?php
require 'conn-akun.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_akuness WHERE email = '$email'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    if ($result) {
        if ($result['status_akun'] === 'DISABLED') {
            echo "
            <script>
            alert('Akun Anda sedang dinonaktifkan. Silakan hubungi Admin.');
            window.location.href = 'page-signin.php';
            </script>";
            exit();
        }
        // Verify hashed password
        if (password_verify($password, $result['password'])) {
            // Store username in the session
            $_SESSION['username'] = $result['username'];
            $_SESSION['user_role'] = $result['user_role']; // Add user role to session
            
            mysqli_query($conn, "SET time_zone = '+07:00'");
            $updateStatusQuery = "UPDATE tb_akuness SET is_online = 1, last_login = NOW() WHERE email = '$email'";
            mysqli_query($conn, $updateStatusQuery);

            if (isset($_POST['rememberMe'])) {
                // Set cookies for email and password hash for 30 days
                setcookie("email", $email, time() + (86400 * 30), "/");
                // Do not store plaintext password in cookies
                setcookie("password", "", time() - 3600, "/");
            } else {
                // Clear cookies if "Remember Me" is not checked
                setcookie("email", "", time() - 3600, "/");
                setcookie("password", "", time() - 3600, "/");
            }

            header('Location: page-home.php');
        } else {
            echo "
            <script>
            alert('Password tidak sesuai.');
            window.location.href = 'page-signin.php';
            </script>";
        }
    } else {
        echo "
        <script>
        alert('Email tidak tersedia.');
        window.location.href = 'page-signin.php';
        </script>";
    }
}
?>
<?php
require 'conn-akun.php'; // Your database connection

// Fetch all accounts
$query = "SELECT id_akun, password FROM tb_akuness";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_akun = $row['id_akun'];
        $password = $row['password'];

        // Hash the plaintext password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the database with the hashed password
        $updateQuery = "UPDATE tb_akuness SET password = '$hashedPassword' WHERE id_akun = $id_akun";
        mysqli_query($conn, $updateQuery);
    }
    echo "Passwords have been successfully hashed.";
} else {
    echo "Failed to retrieve accounts.";
}
?>
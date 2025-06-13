<?php
include 'conn-asttubgod.php'; // Replace with your database connection

if (isset($_GET['sn_pin'])) {
    $sn_pin = $_GET['sn_pin'];
    $query = "SELECT * FROM tb_dbhasiltubgod WHERE sn_pin = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $sn_pin);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
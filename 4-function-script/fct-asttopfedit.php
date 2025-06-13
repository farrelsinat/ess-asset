<?php
include 'conn-asttop.php'; // Replace with your database connection

if (isset($_GET['sn_top'])) {
    $sn_top = $_GET['sn_top'];
    $query = "SELECT * FROM tb_dbhasiltop WHERE sn_top = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $sn_top);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
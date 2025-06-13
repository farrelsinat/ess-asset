<?php
include 'conn-astmcr.php'; // Replace with your database connection

if (isset($_GET['sn_mcr'])) {
    $sn_mcr = $_GET['sn_mcr'];
    $query = "SELECT * FROM tb_dbhasilmcr WHERE sn_mcr = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $sn_mcr);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
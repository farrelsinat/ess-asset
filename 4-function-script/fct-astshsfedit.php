<?php
include 'conn-astshs.php'; // Replace with your database connection

if (isset($_GET['sn_shs'])) {
    $sn_shs = $_GET['sn_shs'];
    $query = "SELECT * FROM tb_dbhasilshs WHERE sn_shs = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $sn_shs);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
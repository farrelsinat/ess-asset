<?php
include 'conn-astbop.php'; // Replace with your database connection

if (isset($_GET['sn_bop'])) {
    $sn_bop = $_GET['sn_bop'];
    $query = "SELECT * FROM tb_dbhasilbop WHERE sn_bop = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $sn_bop);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
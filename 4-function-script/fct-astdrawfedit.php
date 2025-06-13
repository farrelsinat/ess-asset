<?php
include 'conn-astdraw.php'; // Replace with your database connection

if (isset($_GET['sn_dw'])) {
    $sn_dw = $_GET['sn_dw'];
    $query = "SELECT * FROM tb_dbhasildraw WHERE sn_dw = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $sn_dw);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
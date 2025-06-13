<?php
include 'conn-astmpp.php'; // Replace with your database connection

if (isset($_GET['sn_mpp'])) {
    $sn_mpp = $_GET['sn_mpp'];
    $query = "SELECT * FROM tb_dbhasilmpp WHERE sn_mpp = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $sn_mpp);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
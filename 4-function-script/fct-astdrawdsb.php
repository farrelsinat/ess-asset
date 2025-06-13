<?php
// fetch_annular_details.php
include 'conn-astdraw.php'; // Update with your database connection script

if (isset($_GET['rig_yard'])) { 
    $rigyard = $_GET['rig_yard'];
    $rigopr = $_GET['rig_operation'];

    // Query to fetch details based on size, pressure, and jenis_bop
    $query = "SELECT rig_operation, rig_yard, sn_dw, man, type, legacy FROM tb_dbhasildraw WHERE rig_yard = ? AND rig_operation = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $rigyard, $rigopr);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Return data as JSON
    echo json_encode($data);
}
?>

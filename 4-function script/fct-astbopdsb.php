<?php
// fetch_annular_details.php
include 'conn-astbop.php'; // Update with your database connection script

if (isset($_GET['size']) && isset($_GET['pressure'])) { 
    $size = $_GET['size'];
    $pressure = $_GET['pressure'];
    $jenis_bop = $_GET['jenis_bop'];

    // Query to fetch details based on size, pressure, and jenis_bop
    $query = "SELECT rig_operation, rig_yard, sn_bop, no_mov, man, status_unit, no_coc, akhir_coc, status_coc, file_coc FROM tb_dbhasilbop WHERE size = ? AND pressure = ? AND jenis_bop = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $size, $pressure, $jenis_bop);
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

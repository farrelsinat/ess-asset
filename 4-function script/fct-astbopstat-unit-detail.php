<?php
header('Content-Type: application/json');
session_start();

// Database connection
$server = "localhost";
$username = "u597806360_asset_bop";
$password = "AsT-PdsI#2025_BoP";
$dbname = "u597806360_db_bop";

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Sanitize input
$status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';
$jenis_bop = isset($_GET['jenis_bop']) ? $conn->real_escape_string($_GET['jenis_bop']) : '';
$rig_operation = isset($_GET['rig_operation']) ? $conn->real_escape_string($_GET['rig_operation']) : '';
$rig_yard = isset($_GET['rig_yard']) ? $conn->real_escape_string($_GET['rig_yard']) : '';
$ukuran = isset($_GET['size']) ? $conn->real_escape_string($_GET['size']) : '';
$tekanan = isset($_GET['pressure']) ? $conn->real_escape_string($_GET['pressure']) : '';

// Build WHERE conditions
$where = [];
if (!empty($status)) $where[] = "status_unit = '$status'";
if (!empty($jenis_bop)) $where[] = "jenis_bop = '$jenis_bop'";
if (!empty($rig_operation)) $where[] = "rig_operation = '$rig_operation'";
if (!empty($rig_yard)) $where[] = "rig_yard = '$rig_yard'";
if (!empty($ukuran)) $where[] = "size = '$ukuran'";
if (!empty($tekanan)) $where[] = "pressure = '$tekanan'";

$whereClause = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';

// Query data
$sql = "SELECT jenis_bop, status_unit AS status, rig_operation, rig_yard, sn_bop, no_mov, size, pressure, no_coc FROM tb_dbhasilbop $whereClause ORDER BY jenis_bop ASC";
$result = $conn->query($sql);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = ["error" => $conn->error];
}

echo json_encode($data);
$conn->close();
?>
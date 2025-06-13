<?php
session_start();

$server = "localhost";
$username = "u597806360_asset_bop";
$password = "AsT-PdsI#2025_BoP";
$dbname = "u597806360_db_bop";

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$jenis_bop = isset($_GET['jenis_bop']) ? $conn->real_escape_string($_GET['jenis_bop']) : '';
$rig_operation = isset($_GET['rig_operation']) ? $conn->real_escape_string($_GET['rig_operation']) : '';
$rig_yard = isset($_GET['rig_yard']) ? $conn->real_escape_string($_GET['rig_yard']) : '';
$size = isset($_GET['size']) ? $conn->real_escape_string($_GET['size']) : '';
$pressure = isset($_GET['pressure']) ? $conn->real_escape_string($_GET['pressure']) : '';

$whereClauses = [];
if (!empty($jenis_bop)) {
    $whereClauses[] = "jenis_bop = '$jenis_bop'";
}
if (!empty($rig_operation)) {
    $whereClauses[] = "rig_operation = '$rig_operation'";
}
if (!empty($rig_yard)) {
    $whereClauses[] = "rig_yard = '$rig_yard'";
}
if (!empty($size)) {
    $whereClauses[] = "size = '$size'";
}
if (!empty($pressure)) {
    $whereClauses[] = "pressure = '$pressure'";
}

$whereSQL = '';
if (!empty($whereClauses)) {
    $whereSQL = 'WHERE ' . implode(' AND ', $whereClauses);
}

$sql = "SELECT `status_unit`, COUNT(*) AS count FROM tb_dbhasilbop $whereSQL GROUP BY `status_unit`";

$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "status" => $row["status_unit"],
        "count" => $row["count"]
    ];
}

echo json_encode($data);
$conn->close();
?>
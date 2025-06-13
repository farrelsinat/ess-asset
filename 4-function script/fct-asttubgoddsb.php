<?php
// Database connection
$host = 'localhost';
$dbname = 'u597806360_db_tubgod';
$username = 'u597806360_asset_tubgod';
$password = 'AsT-PdsI#2025_tUBgoD';
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];

    if ($type === 'countCurrentMonth') {
        // Get the current month and year
        $currentMonth = date('m'); 
        $currentYear = date('Y');
        // Count records where the month and year match the current month and year
        $sql = "SELECT COUNT(*) AS count FROM tb_dbhasiltubgod WHERE MONTH(periode_laporan) = '$currentMonth' AND YEAR(periode_laporan) = '$currentYear'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        echo json_encode($data['count']);
    }

    if ($type === 'filterData') {
        $date = $_POST['date'] ?? '';
        $month = $_POST['month'] ?? '';
        $year = $_POST['year'] ?? '';
        $rig_operation = $_POST['rig_operation'] ?? '';
        $rig_yard = $_POST['rig_yard'] ?? '';
        $jenistubgod = $_POST['jenis_tubgod'] ?? '';
        $man = $_POST['man'] ?? '';
        $snpin = $_POST['sn_pin'] ?? '';

        $conditions = [];

        if (!empty($date)) $conditions[] = "DATE(periode_laporan) = '$date'";
        if (!empty($month)) $conditions[] = "MONTH(periode_laporan) = '$month'";
        if (!empty($year)) $conditions[] = "YEAR(periode_laporan) = '$year'";
        if (!empty($rig_operation)) $conditions[] = "rig_operation LIKE '%$rig_operation%'";
        if (!empty($rig_yard)) $conditions[] = "rig_yard LIKE '%$rig_yard%'";
        if (!empty($jenistubgod)) $conditions[] = "jenis_tubgod LIKE '%$jenistubgod%'";
        if (!empty($man)) $conditions[] = "man LIKE '%$man%'";
        if (!empty($snpin)) $conditions[] = "sn_pin = '$snpin'";

        $whereClause = count($conditions) > 0 ? "WHERE " . implode(' AND ', $conditions) : "";

        $sql = "SELECT COUNT(*) AS count FROM tb_dbhasiltubgod $whereClause";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        echo json_encode($data['count']);
    }
}

$conn->close();
?>

<?php
session_start();

$server = "localhost";
$username = "u597806360_asset_tubgod";
$password = "AsT-PdsI#2025_tUBgoD";
$dbname = "u597806360_db_tubgod";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Get the current user from session or other method
$currentUser = isset($_SESSION['username']) ? $_SESSION['username'] : 'unknown_user';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sn_pin = $_POST['sn_pin'];
    $sn_box = $_POST['sn_box'];
    $jenis_tubgod = $_POST['jenis_tubgod'];
    $man = $_POST['man'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];

    // Check for existing record
    $checkSql = "SELECT * FROM tb_dbhourstubgod WHERE sn_pin = '$sn_pin' ORDER BY id_hours_tubgod DESC LIMIT 1";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (is_null($row['time_out'])) {
            // Update time_out if it's NULL
            $updateSql = "UPDATE tb_dbhourstubgod
                          SET time_out = CONVERT_TZ(NOW(), '+00:00', '+07:00'), username = '$currentUser' 
                          WHERE id_hours_tubgod = {$row['id_hours_tubgod']}";
            if ($conn->query($updateSql) === TRUE) {
                
                // **Calculate the duration between time_in and time_out**
                $durationSql = "SELECT TIMEDIFF(time_out, time_in) AS duration 
                                FROM tb_dbhourstubgod 
                                WHERE id_hours_tubgod = {$row['id_hours_tubgod']}";
                $durationResult = $conn->query($durationSql);
                
                if ($durationResult->num_rows > 0) {
                    $durationRow = $durationResult->fetch_assoc();
                    $duration = $durationRow['duration'];

                    // Optionally, update the row to store the duration in the table
                    $updateDurationSql = "UPDATE tb_dbhourstubgod 
                                          SET duration = '$duration' 
                                          WHERE id_hours_tubgod = {$row['id_hours_tubgod']}";
                    $conn->query($updateDurationSql);

                    // **Sum the total duration for the same sn_pin**
                    $sumDurationSql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total_duration 
                                       FROM tb_dbhourstubgod 
                                       WHERE sn_pin = '$sn_pin'";
                    $sumDurationResult = $conn->query($sumDurationSql);
                    $totalDuration = '00:00:00'; // Default if no result

                    if ($sumDurationResult->num_rows > 0) {
                        $sumDurationRow = $sumDurationResult->fetch_assoc();
                        $totalDuration = $sumDurationRow['total_duration'];
                    }

                    // **Update the total_duration in the same table**
                    $updateTotalDurationSql = "UPDATE tb_dbhourstubgod 
                                               SET total_duration = '$totalDuration' 
                                               WHERE sn_pin = '$sn_pin'";
                    $conn->query($updateTotalDurationSql);

                    echo "TIME OUT berhasil tercatat untuk S/N PIN: $sn_pin. Durasi: $duration. Total Running Hours: $totalDuration.";
                }
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // Insert a new row if time_out is already set
            $insertSql = "INSERT INTO tb_dbhourstubgod (sn_pin, sn_box, jenis_tubgod, man, no_mov, no_po, time_in, username)
                          VALUES ('$sn_pin', '$sn_box', '$jenis_tubgod', '$man', '$no_mov', '$no_po', CONVERT_TZ(NOW(), '+00:00', '+07:00'), '$currentUser')";
            if ($conn->query($insertSql) === TRUE) {
                // **Sum the total duration for the same sn_pin**
                $sumDurationSql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total_duration 
                                   FROM tb_dbhourstubgod 
                                   WHERE sn_pin = '$sn_pin'";
                $sumDurationResult = $conn->query($sumDurationSql);
                $totalDuration = '00:00:00'; // Default if no result

                if ($sumDurationResult->num_rows > 0) {
                    $sumDurationRow = $sumDurationResult->fetch_assoc();
                    $totalDuration = $sumDurationRow['total_duration'];
                }

                // **Update the total_duration in the same table**
                $updateTotalDurationSql = "UPDATE tb_dbhourstubgod 
                                           SET total_duration = '$totalDuration' 
                                           WHERE sn_pin = '$sn_pin'";
                $conn->query($updateTotalDurationSql);

                echo "TIME IN (Data Baru) berhasil tercatat untuk S/N PIN: $sn_pin. Total Running Hours: $totalDuration.";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }
    } else {
        // Insert a new record if no previous record exists
        $insertSql = "INSERT INTO tb_dbhourstubgod (sn_pin, sn_box, jenis_tubgod, man, no_mov, no_po, time_in, username)
                      VALUES ('$sn_pin', '$sn_box', '$jenis_tubgod', '$man', '$no_mov', '$no_po', CONVERT_TZ(NOW(), '+00:00', '+07:00'), '$currentUser')";
        if ($conn->query($insertSql) === TRUE) {
            echo "TIME IN (Data Awal) berhasil tercatat untuk S/N PIN: $sn_pin.";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
}

$conn->close();
?>

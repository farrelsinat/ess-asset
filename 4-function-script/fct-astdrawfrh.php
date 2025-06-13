<?php
session_start();

$server = "localhost";
$username = "u597806360_asset_dw";
$password = "AsT-PdsI#2025_dW";
$dbname = "u597806360_db_dw";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Get the current user from session or other method
$currentUser = isset($_SESSION['username']) ? $_SESSION['username'] : 'unknown_user';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sn_dw = $_POST['sn_dw'];
    $man = $_POST['man'];
    $type = $_POST['type'];
    $legacy = $_POST['legacy'];

    // Check for existing record
    $checkSql = "SELECT * FROM tb_dbhoursdraw WHERE sn_dw = '$sn_dw' ORDER BY id_hours_dw DESC LIMIT 1";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (is_null($row['time_out'])) {
            // Update time_out if it's NULL
            $updateSql = "UPDATE tb_dbhoursdraw
                          SET time_out = CONVERT_TZ(NOW(), '+00:00', '+07:00'), username = '$currentUser' 
                          WHERE id_hours_dw = {$row['id_hours_dw']}";
            if ($conn->query($updateSql) === TRUE) {
                
                // **Calculate the duration between time_in and time_out**
                $durationSql = "SELECT TIMEDIFF(time_out, time_in) AS duration 
                                FROM tb_dbhoursdraw 
                                WHERE id_hours_dw = {$row['id_hours_dw']}";
                $durationResult = $conn->query($durationSql);
                
                if ($durationResult->num_rows > 0) {
                    $durationRow = $durationResult->fetch_assoc();
                    $duration = $durationRow['duration'];

                    // Optionally, update the row to store the duration in the table
                    $updateDurationSql = "UPDATE tb_dbhoursdraw 
                                          SET duration = '$duration' 
                                          WHERE id_hours_dw = {$row['id_hours_dw']}";
                    $conn->query($updateDurationSql);

                    // **Sum the total duration for the same sn_dw**
                    $sumDurationSql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total_duration 
                                       FROM tb_dbhoursdraw 
                                       WHERE sn_dw = '$sn_dw'";
                    $sumDurationResult = $conn->query($sumDurationSql);
                    $totalDuration = '00:00:00'; // Default if no result

                    if ($sumDurationResult->num_rows > 0) {
                        $sumDurationRow = $sumDurationResult->fetch_assoc();
                        $totalDuration = $sumDurationRow['total_duration'];
                    }

                    // **Update the total_duration in the same table**
                    $updateTotalDurationSql = "UPDATE tb_dbhoursdraw 
                                               SET total_duration = '$totalDuration' 
                                               WHERE sn_dw = '$sn_dw'";
                    $conn->query($updateTotalDurationSql);

                    echo "TIME OUT berhasil tercatat untuk S/N Drawworks: $sn_dw. Durasi: $duration. Total Running Hours: $totalDuration.";
                }
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // Insert a new row if time_out is already set
            $insertSql = "INSERT INTO tb_dbhoursdraw (sn_dw, man, type, legacy, time_in, username)
                          VALUES ('$sn_dw', '$man', '$type', '$legacy', CONVERT_TZ(NOW(), '+00:00', '+07:00'), '$currentUser')";
            if ($conn->query($insertSql) === TRUE) {
                // **Sum the total duration for the same sn_dw**
                $sumDurationSql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS total_duration 
                                   FROM tb_dbhoursdraw
                                   WHERE sn_dw = '$sn_dw'";
                $sumDurationResult = $conn->query($sumDurationSql);
                $totalDuration = '00:00:00'; // Default if no result

                if ($sumDurationResult->num_rows > 0) {
                    $sumDurationRow = $sumDurationResult->fetch_assoc();
                    $totalDuration = $sumDurationRow['total_duration'];
                }

                // **Update the total_duration in the same table**
                $updateTotalDurationSql = "UPDATE tb_dbhoursdraw 
                                           SET total_duration = '$totalDuration' 
                                           WHERE sn_dw = '$sn_dw'";
                $conn->query($updateTotalDurationSql);

                echo "TIME IN (Data Baru) berhasil tercatat untuk S/N Drawworks: $sn_dw. Total Running Hours: $totalDuration.";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }
    } else {
        // Insert a new record if no previous record exists
        $insertSql = "INSERT INTO tb_dbhoursdraw (sn_dw, man, type, legacy, time_in, username)
                      VALUES ('$sn_dw', '$man', '$type', '$legacy', CONVERT_TZ(NOW(), '+00:00', '+07:00'), '$currentUser')";
        if ($conn->query($insertSql) === TRUE) {
            echo "TIME IN (Data Awal) berhasil tercatat untuk S/N Drawworks: $sn_dw.";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
}

$conn->close();
?>

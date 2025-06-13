<?php
include 'conn-asttubgod.php';
session_start();

$username = $_SESSION['username'] ?? 'unknown_user';

// Function to delete data with detailed deletion history
function hapus_data($data) {
    global $conn; // Use the global connection variable
    $id_tubgod = $data['hapus'];

    // Step 1: Retrieve the record before deletion
    $get_query = "SELECT periode_laporan, rig_operation, rig_yard, sn_pin, jenis_tubgod, username FROM tb_dbhasiltubgod WHERE id_tubgod = '$id_tubgod';";
    $get_result = mysqli_query($conn, $get_query);
    $record = mysqli_fetch_assoc($get_result);

    if ($record) {
        // Step 2: Insert deletion history log with detailed fields
        $periode_laporan = $record['periode_laporan'];
        $rig_operation = $record['rig_operation'];
        $rig_yard = $record['rig_yard'];
        $sn_pin = $record['sn_pin'];
        $jenis_tubgod = $record['jenis_tubgod'];
        $inputed_by = $record['username'];
        $deleted_by = $_SESSION['username'] ?? 'unknown'; // Get the username from session

        $log_query = "
            INSERT INTO tb_dbdeltubgod (deleted_item_id, periode_laporan, rig_operation, rig_yard, sn_pin, jenis_tubgod, inputed_by, deleted_by, deletion_time) 
            VALUES ('$id_tubgod', '$periode_laporan', '$rig_operation', '$rig_yard', '$sn_pin', '$jenis_tubgod', '$inputed_by', '$deleted_by', CONVERT_TZ(NOW(), '+00:00', '+07:00'));
        ";
        mysqli_query($conn, $log_query);
    }

    // Step 3: Perform the deletion
    $delete_query = "DELETE FROM tb_dbhasiltubgod WHERE id_tubgod = '$id_tubgod';";
    $delete_result = mysqli_query($conn, $delete_query);

    return $delete_result; // Return the result of the deletion query
}

// Handle delete action
if (isset($_GET['hapus'])) {
    $berhasil = hapus_data($_GET);

    if ($berhasil) {
        $_SESSION['eksekusi'] = "Data berhasil DIHAPUS! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil dihapus. Silakan coba lagi.";
    }
    header("location: page-asttubgoddtb.php");
    exit(); // Stop further execution after handling delete
}

// Handle edit action
if (isset($_POST['aksi']) && $_POST['aksi'] === 'edit') {
    $id_tubgod = $_POST['id_tubgod'];
    $periode_laporan = $_POST['periode_laporan'];
    $rigopr = $_POST['rig_operation'];
    $rigyard = $_POST['rig_yard'];
    $sn_pin = $_POST['sn_pin'];

    // Retrieve additional data based on S/N PIN (already fetched in the form script)
    $sn_box = $_POST['sn_box'];
    $jenis_tubgod = $_POST['jenis_tubgod'];
    $man = $_POST['man'];
    $conn_type = $_POST['conn_type'];
    $pounder = $_POST['pounder'];
    $weight = $_POST['weight'];
    $length = $_POST['length'];
    $use_date = $_POST['use_date'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];

    // Update query
    $query = "UPDATE tb_dbhasiltubgod 
              SET periode_laporan = '$periode_laporan', rig_operation = '$rigopr', rig_yard = '$rigyard', sn_pin = '$sn_pin', sn_box = '$sn_box', jenis_tubgod = '$jenis_tubgod', 
                  man = '$man', conn_type = '$conn_type', pounder = '$pounder', weight = '$weight', length = '$length', 
                  use_date = '$use_date', no_mov = '$no_mov', no_po = '$no_po', username = '$username'
              WHERE id_tubgod = '$id_tubgod'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['eksekusi'] = "Data berhasil DIUBAH! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil diubah. " . mysqli_error($conn);
    }

    header("location: page-asttubgoddtb.php");
    exit();
}

// Handle add action
$periode_laporan = $_POST['periode_laporan'];
$rig_operation = $_POST['rig_operation'];
$rig_yard = $_POST['rig_yard'];

$selected_data = $_POST['data'];
$success = true; // Flag to track the overall success of the operation

// Prepare a single query with multiple rows
$values = [];
foreach ($selected_data as $sn_pin) {
    $sn_box = $_POST['sn_box'][$sn_pin];
    $jenis_tubgod = $_POST['jenis_tubgod'][$sn_pin];
    $man = $_POST['man'][$sn_pin];
    $conn_type = $_POST['conn_type'][$sn_pin];
    $pounder = $_POST['pounder'][$sn_pin];
    $weight = $_POST['weight'][$sn_pin];
    $length = $_POST['length'][$sn_pin];
    $use_date = $_POST['use_date'][$sn_pin];
    $no_mov = $_POST['no_mov'][$sn_pin];
    $no_po = $_POST['no_po'][$sn_pin];

    $values[] = "('$periode_laporan', '$rig_operation', '$rig_yard', '$sn_pin', '$sn_box', '$jenis_tubgod', '$man', '$conn_type', '$pounder', '$weight', '$length', '$use_date', '$no_mov', '$no_po', '$username')";
}

// Split the insert query into chunks to handle large datasets
$chunk_size = 500; // Adjust based on your server's capability
$chunks = array_chunk($values, $chunk_size);

foreach ($chunks as $chunk) {
    $query = "INSERT INTO tb_dbhasiltubgod 
        (periode_laporan, rig_operation, rig_yard, sn_pin, sn_box, jenis_tubgod, man, conn_type, pounder, weight, length, use_date, no_mov, no_po, username) 
        VALUES " . implode(", ", $chunk);

    if (!mysqli_query($conn, $query)) {
        $success = false; // Set the flag to false if any insert fails
        $error_message = mysqli_error($conn); // Capture the error message
        break; // Stop further processing if an error occurs
    }
}

// Handle add action result
if ($success) {
    $_SESSION['eksekusi'] = "Data berhasil DITAMBAHKAN! Harap periksa kembali data tersebut pada tabel di bawah ini.";
} else {
    $_SESSION['eksekusi'] = "Error: Data tidak berhasil ditambahkan. " . $error_message;
}

header("location: page-asttubgoddtb.php");
exit();
?>

<?php
include 'conn-asttop.php';
session_start();

$username = $_SESSION['username'] ?? 'unknown_user';

// Function to delete data with detailed deletion history
function hapus_data($data) {
    global $conn; // Use the global connection variable
    $id_top = $data['hapus'];

    // Step 1: Retrieve the record before deletion
    $get_query = "SELECT periode_laporan, rig_operation, rig_yard, sn_top, type, tonase, status_top, username FROM tb_dbhasiltop WHERE id_top = '$id_top';";
    $get_result = mysqli_query($conn, $get_query);
    $record = mysqli_fetch_assoc($get_result);

    if ($record) {
        // Step 2: Insert deletion history log with detailed fields
        $periode_laporan = $record['periode_laporan'];
        $rig_operation = $record['rig_operation'];
        $rig_yard = $record['rig_yard'];
        $sn_top = $record['sn_top'];
        $type = $record['type'];
        $tonase = $record['tonase'];
        $status = $record['status_top'];
        $inputed_by = $record['username'];
        $deleted_by = $_SESSION['username'] ?? 'unknown'; // Get the username from session

        $log_query = "
            INSERT INTO tb_dbdeltop (deleted_item_id, periode_laporan, rig_operation, rig_yard, sn_top, type, tonase, status_top, inputed_by, deleted_by, deletion_time) 
            VALUES ('$id_top', '$periode_laporan', '$rig_operation', '$rig_yard', '$sn_top', '$type', '$tonase', '$status', '$inputed_by', '$deleted_by', CONVERT_TZ(NOW(), '+00:00', '+07:00'));
        ";
        mysqli_query($conn, $log_query);
    }

    // Step 3: Perform the deletion
    $delete_query = "DELETE FROM tb_dbhasiltop WHERE id_top = '$id_top';";
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
    header("location: page-asttopdtb.php");
    exit(); // Stop further execution after handling delete
}

// Handle edit action
if (isset($_POST['aksi']) && $_POST['aksi'] === 'edit') {
    $id_top = $_POST['id_top'];
    $periode_laporan = $_POST['periode_laporan'];
    $rigopr = $_POST['rig_operation'];
    $rigyard = $_POST['rig_yard'];
    $sn_top = $_POST['sn_top'];
    $type = $_POST['type'];
    $tonase = $_POST['tonase'];
    $tahunbeli = $_POST['tahun_beli'];
    $status = $_POST['status_top'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];

    // Retrieve the original data
    $get_query = "SELECT * FROM tb_dbhasiltop WHERE id_top = '$id_top'";
    $get_result = mysqli_query($conn, $get_query);
    
    if ($get_result && mysqli_num_rows($get_result) > 0) {
        $record = mysqli_fetch_assoc($get_result);

        // Insert the original data into tb_dbedittop
        $inputed_by = $record['username']; // Assuming the original username is stored in 'username'
        $edited_by = $_SESSION['username'] ?? 'unknown'; // Assuming $username holds the current user's name

        if ($record['rig_operation'] !== $rigopr || $record['rig_yard'] !== $rigyard) {
            $historyQuery = "INSERT INTO tb_dbedittop 
                (edited_item_id, periode_laporan, rig_operation, rig_yard, sn_top, type, tonase, status_top, inputed_by, edited_by, edit_time, new_rig_operation, new_rig_yard)
                VALUES 
                ('$id_top', '{$record['periode_laporan']}', '{$record['rig_operation']}', '{$record['rig_yard']}', '{$record['sn_top']}', 
                 '{$record['type']}', '{$record['tonase']}', '{$record['status_top']}', '$inputed_by', '$edited_by', CONVERT_TZ(NOW(), '+00:00', '+07:00'), '$rigopr', '$rigyard')";
            if (!mysqli_query($conn, $historyQuery)) {
                $_SESSION['eksekusi'] = "Error: Gagal menyimpan data riwayat edit. " . mysqli_error($conn);
                header("location: page-asttopdtb.php");
                exit();
            }
        }
    } else {
        $_SESSION['eksekusi'] = "Error: Data asli tidak ditemukan untuk riwayat edit.";
        header("location: page-asttopdtb.php");
        exit();
    }

    // Update query
    $query = "UPDATE tb_dbhasiltop 
              SET periode_laporan = '$periode_laporan', rig_operation = '$rigopr', rig_yard = '$rigyard', sn_top = '$sn_top', type = '$type', tonase = '$tonase', tahun_beli = '$tahunbeli', status_top = '$status', no_mov = '$no_mov', no_po = '$no_po', username = '$username'
              WHERE id_top = '$id_top'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['eksekusi'] = "Data berhasil DIUBAH! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil diubah. " . mysqli_error($conn);
    }

    header("location: page-asttopdtb.php");
    exit();
}

// Handle add action
if (isset($_POST['aksi']) && $_POST['aksi'] === 'add') {
    $id_top = $_POST['id_top'];
    $periode_laporan = $_POST['periode_laporan'];
    $rigopr = $_POST['rig_operation'];
    $rigyard = $_POST['rig_yard'];
    $sn_top = $_POST['sn_top'];
    $type = $_POST['type'];
    $tonase = $_POST['tonase'];
    $tahunbeli = $_POST['tahun_beli'];
    $status = $_POST['status_top'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];

    // Update query
    $query = "INSERT INTO tb_dbhasiltop 
              SET periode_laporan = '$periode_laporan', rig_operation = '$rigopr', rig_yard = '$rigyard', sn_top = '$sn_top', type = '$type', tonase = '$tonase', tahun_beli = '$tahunbeli', status_top = '$status', no_mov = '$no_mov', no_po = '$no_po', username = '$username'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['eksekusi'] = "Data berhasil DITAMBAHKAN! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil diubah. " . mysqli_error($conn);
    }

    header("location: page-asttopdtb.php");
    exit();
}
?>

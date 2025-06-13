<?php
include 'conn-astdraw.php';
session_start();

$username = $_SESSION['username'] ?? 'unknown_user';

// Function to delete data with detailed deletion history
function hapus_data($data) {
    global $conn; // Use the global connection variable
    $id_dw = $data['hapus'];

    // Step 1: Retrieve the record before deletion
    $get_query = "SELECT periode_laporan, rig_operation, rig_yard, sn_dw, man, type, legacy, username FROM tb_dbhasildraw WHERE id_dw = '$id_dw';";
    $get_result = mysqli_query($conn, $get_query);
    $record = mysqli_fetch_assoc($get_result);

    if ($record) {
        // Step 2: Insert deletion history log with detailed fields
        $periode_laporan = $record['periode_laporan'];
        $rig_operation = $record['rig_operation'];
        $rig_yard = $record['rig_yard'];
        $sn_dw = $record['sn_dw'];
        $man = $record['man'];
        $type = $record['type'];
        $legacy = $record['legacy'];
        $inputed_by = $record['username'];
        $deleted_by = $_SESSION['username'] ?? 'unknown'; // Get the username from session

        $log_query = "
            INSERT INTO tb_dbdeldraw (deleted_item_id, periode_laporan, rig_operation, rig_yard, sn_dw, man, type, legacy, inputed_by, deleted_by, deletion_time) 
            VALUES ('$id_dw', '$periode_laporan', '$rig_operation', '$rig_yard', '$sn_dw', '$man', '$type', '$legacy', '$inputed_by', '$deleted_by', CONVERT_TZ(NOW(), '+00:00', '+07:00'));
        ";
        mysqli_query($conn, $log_query);
    }

    // Step 3: Perform the deletion
    $delete_query = "DELETE FROM tb_dbhasildraw WHERE id_dw = '$id_dw';";
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
    header("location: page-astdrawdtb.php");
    exit(); // Stop further execution after handling delete
}

// Handle edit action
if (isset($_POST['aksi']) && $_POST['aksi'] === 'edit') {
    $id_dw = $_POST['id_dw'];
    $periode_laporan = $_POST['periode_laporan'];
    $rigopr = $_POST['rig_operation'];
    $rigyard = $_POST['rig_yard'];
    $sn_dw = $_POST['sn_dw'];
    $man = $_POST['man'];
    $type = $_POST['type'];
    $legacy = $_POST['legacy'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];

    // Retrieve the original data
    $get_query = "SELECT * FROM tb_dbhasildraw WHERE id_dw = '$id_dw'";
    $get_result = mysqli_query($conn, $get_query);
    
    if ($get_result && mysqli_num_rows($get_result) > 0) {
        $record = mysqli_fetch_assoc($get_result);

        // Insert the original data into tb_dbeditdraw
        $inputed_by = $record['username']; // Assuming the original username is stored in 'username'
        $edited_by = $_SESSION['username'] ?? 'unknown'; // Assuming $username holds the current user's name

        if ($record['rig_operation'] !== $rigopr || $record['rig_yard'] !== $rigyard) {
            $historyQuery = "INSERT INTO tb_dbeditdraw 
                (edited_item_id, periode_laporan, rig_operation, rig_yard, sn_dw, man, type, legacy, inputed_by, edited_by, edit_time, new_rig_operation, new_rig_yard)
                VALUES 
                ('$id_dw', '{$record['periode_laporan']}', '{$record['rig_operation']}', '{$record['rig_yard']}', '{$record['sn_dw']}', 
                 '{$record['man']}', '{$record['type']}', '{$record['legacy']}', '$inputed_by', '$edited_by', CONVERT_TZ(NOW(), '+00:00', '+07:00'), '$rigopr', '$rigyard')";
            if (!mysqli_query($conn, $historyQuery)) {
                $_SESSION['eksekusi'] = "Error: Gagal menyimpan data riwayat edit. " . mysqli_error($conn);
                header("location: page-astdrawdtb.php");
                exit();
            }
        }
    } else {
        $_SESSION['eksekusi'] = "Error: Data asli tidak ditemukan untuk riwayat edit.";
        header("location: page-astdrawdtb.php");
        exit();
    }

    // Update query
    $query = "UPDATE tb_dbhasildraw 
              SET periode_laporan = '$periode_laporan', rig_operation = '$rigopr', rig_yard = '$rigyard', sn_dw = '$sn_dw', man = '$man', type = '$type', legacy = '$legacy', no_mov = '$no_mov', no_po = '$no_po', username = '$username'
              WHERE id_dw = '$id_dw'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['eksekusi'] = "Data berhasil DIUBAH! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil diubah. " . mysqli_error($conn);
    }

    header("location: page-astdrawdtb.php");
    exit();
}

// Handle add action
if (isset($_POST['aksi']) && $_POST['aksi'] === 'add') {
    $id_dw = $_POST['id_dw'];
    $periode_laporan = $_POST['periode_laporan'];
    $rigopr = $_POST['rig_operation'];
    $rigyard = $_POST['rig_yard'];
    $sn_dw = $_POST['sn_dw'];
    $man = $_POST['man'];
    $type = $_POST['type'];
    $legacy = $_POST['legacy'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];

    // Update query
    $query = "INSERT INTO tb_dbhasildraw 
              SET periode_laporan = '$periode_laporan', rig_operation = '$rigopr', rig_yard = '$rigyard', sn_dw = '$sn_dw', man = '$man', type = '$type', legacy = '$legacy', no_mov = '$no_mov', no_po = '$no_po', username = '$username'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['eksekusi'] = "Data berhasil DITAMBAHKAN! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil diubah. " . mysqli_error($conn);
    }

    header("location: page-astdrawdtb.php");
    exit();
}
?>

<?php
include 'conn-astbop.php';
session_start();

$username = $_SESSION['username'] ?? 'unknown_user';

// Function to delete data with detailed deletion history
function hapus_data($data) {
    global $conn; // Use the global connection variable
    $id_bop = $data['hapus'];

    // Step 1: Retrieve the record before deletion
    $get_query = "SELECT periode_laporan, rig_operation, rig_yard, sn_bop, jenis_bop, size, pressure, man, username FROM tb_dbhasilbop WHERE id_bop = '$id_bop';";
    $get_result = mysqli_query($conn, $get_query);
    $record = mysqli_fetch_assoc($get_result);

    if ($record) {
        // Step 2: Insert deletion history log with detailed fields
        $periode_laporan = $record['periode_laporan'];
        $rig_operation = $record['rig_operation'];
        $rig_yard = $record['rig_yard'];
        $sn_bop = $record['sn_bop'];
        $jenis_bop = $record['jenis_bop'];
        $size = $record['size'];
        $pressure = $record['pressure'];
        $man = $record['man'];
        $inputed_by = $record['username'];
        $deleted_by = $_SESSION['username'] ?? 'unknown'; // Get the username from session

        $log_query = "
            INSERT INTO tb_dbdelbop (deleted_item_id, periode_laporan, rig_operation, rig_yard, sn_bop, jenis_bop, size, pressure, man, inputed_by, deleted_by, deletion_time) 
            VALUES ('$id_bop', '$periode_laporan', '$rig_operation', '$rig_yard', '$sn_bop', '$jenis_bop', '$size', '$pressure', '$man', '$inputed_by', '$deleted_by', CONVERT_TZ(NOW(), '+00:00', '+07:00'));
        ";
        mysqli_query($conn, $log_query);
        
        $file_path = $record['file_coc'];
        if (!empty($file_path)) {
            $full_path = __DIR__ . '/' . $file_path; // Ensure correct absolute path
            if (file_exists($full_path)) {
                unlink($full_path);
            } else {
                error_log("File not found: " . $full_path); // Debug log
            }
        }
    }

    // Step 3: Perform the deletion
    $delete_query = "DELETE FROM tb_dbhasilbop WHERE id_bop = '$id_bop';";
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
    header("location: page-astbopdtb.php");
    exit(); // Stop further execution after handling delete
}

//Function PDF upload
$upload_dir = 'file-coc/';

function upload_pdf($file) {
    global $upload_dir;
    if ($file['error'] === UPLOAD_ERR_OK) {
        $file_name = basename($file['name']);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        if ($file_ext !== 'pdf') {
            return [false, "Error: Harap upload file dalam format .pdf!"];
        }
        
        $new_file_name = uniqid('coc-bop_', true) . ".pdf";
        $file_path = $upload_dir . $new_file_name;
        
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            return [true, $file_path];
        } else {
            return [false, "Error: File upload failed."];
        }
    }
    return [false, "Error: No file uploaded or upload error."];
}

// Handle edit action
if (isset($_POST['aksi']) && $_POST['aksi'] === 'edit') {
    $id_bop = $_POST['id_bop'];
    $periode_laporan = $_POST['periode_laporan'];
    $rigopr = $_POST['rig_operation'];
    $rigyard = $_POST['rig_yard'];
    $sn_bop = $_POST['sn_bop'];
    $jenis_bop = $_POST['jenis_bop'];
    $size = $_POST['size'];
    $pressure = $_POST['pressure'];
    $man = $_POST['man'];
    $type = $_POST['type'];
    $no_coc = $_POST['no_coc'];
    $akhir_coc = $_POST['akhir_coc'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];

    // Retrieve the original data
    $get_query = "SELECT * FROM tb_dbhasilbop WHERE id_bop = '$id_bop'";
    $get_result = mysqli_query($conn, $get_query);
    
    if ($get_result && mysqli_num_rows($get_result) > 0) {
        $record = mysqli_fetch_assoc($get_result);

        // Insert the original data into tb_dbeditbop
        $inputed_by = $record['username']; // Assuming the original username is stored in 'username'
        $edited_by = $_SESSION['username'] ?? 'unknown'; // Assuming $username holds the current user's name
        
        if ($record['rig_operation'] !== $rigopr || $record['rig_yard'] !== $rigyard) {
            $historyQuery = "INSERT INTO tb_dbeditbop 
                (edited_item_id, periode_laporan, rig_operation, rig_yard, sn_bop, jenis_bop, size, pressure, man, inputed_by, edited_by, edit_time, new_rig_operation, new_rig_yard)
                VALUES 
                ('$id_bop', '{$record['periode_laporan']}', '{$record['rig_operation']}', '{$record['rig_yard']}', '{$record['sn_bop']}', 
                 '{$record['jenis_bop']}', '{$record['size']}', '{$record['pressure']}', '{$record['man']}', 
                 '$inputed_by', '$edited_by', CONVERT_TZ(NOW(), '+00:00', '+07:00'), '$rigopr', '$rigyard')";
            if (!mysqli_query($conn, $historyQuery)) {
                $_SESSION['eksekusi'] = "Error: Gagal menyimpan data riwayat edit. " . mysqli_error($conn);
                header("location: page-astbopdtb.php");
                exit();
            }
        }
    } else {
        $_SESSION['eksekusi'] = "Error: Data asli tidak ditemukan untuk riwayat edit.";
        header("location: page-astbopdtb.php");
        exit();
    }
    
    // Handle file update
    $file_coc = $record['file_coc']; // Keep old file by default
    
    if (!empty($_FILES['file_coc']['name'])) {
        list($upload_success, $new_file_path) = upload_pdf($_FILES['file_coc']);
        
        if ($upload_success) {
            // Delete old file if it exists
            if (!empty($file_coc) && file_exists($file_coc)) {
                unlink($file_coc);
            }
    
            // Assign new file path to $file_coc
            $file_coc = $new_file_path;
        } else {
            $_SESSION['eksekusi'] = "File upload failed: " . $new_file_path;
            header("location: page-astbopdtb.php");
            exit();
        }
    }

    // Update query
    $query = "UPDATE tb_dbhasilbop 
              SET periode_laporan = '$periode_laporan', rig_operation = '$rigopr', rig_yard = '$rigyard', sn_bop = '$sn_bop', jenis_bop = '$jenis_bop', size = '$size', 
                  pressure = '$pressure', man = '$man', type = '$type', no_coc = '$no_coc', akhir_coc = '$akhir_coc', file_coc = '$file_coc', no_mov = '$no_mov', no_po = '$no_po', username = '$username'
              WHERE id_bop = '$id_bop'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['eksekusi'] = "Data berhasil DIUBAH! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil diubah. " . mysqli_error($conn);
    }

    header("location: page-astbopdtb.php");
    exit();
}

// Handle add action
if (isset($_POST['aksi']) && $_POST['aksi'] === 'add') {
    $id_bop = $_POST['id_bop'];
    $periode_laporan = $_POST['periode_laporan'];
    $rigopr = $_POST['rig_operation'];
    $rigyard = $_POST['rig_yard'];
    $sn_bop = $_POST['sn_bop'];
    $jenis_bop = $_POST['jenis_bop'];
    $size = $_POST['size'];
    $pressure = $_POST['pressure'];
    $man = $_POST['man'];
    $type = $_POST['type'];
    $no_coc = $_POST['no_coc'];
    $akhir_coc = $_POST['akhir_coc'];
    $no_mov = $_POST['no_mov'];
    $no_po = $_POST['no_po'];
    
    $file_coc = NULL;
    if (!empty($_FILES['file_coc']['name'])) {
        list($upload_success, $message) = upload_pdf($_FILES['file_coc']);
        if ($upload_success) {
            $file_coc = $message;
        } else {
            $_SESSION['eksekusi'] = $message;
            header("location: page-astbopdtb.php");
            exit();
        }
    }

    // Update query
    $query = "INSERT INTO tb_dbhasilbop 
              SET periode_laporan = '$periode_laporan', rig_operation = '$rigopr', rig_yard = '$rigyard', sn_bop = '$sn_bop', jenis_bop = '$jenis_bop', size = '$size', 
                  pressure = '$pressure', man = '$man', type = '$type', no_coc = '$no_coc', akhir_coc = '$akhir_coc', file_coc = '$file_coc', no_mov = '$no_mov', no_po = '$no_po', username = '$username'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['eksekusi'] = "Data berhasil DITAMBAHKAN! Harap periksa kembali data tersebut pada tabel di bawah ini.";
    } else {
        $_SESSION['eksekusi'] = "Error: Data tidak berhasil diubah. " . mysqli_error($conn);
    }

    header("location: page-astbopdtb.php");
    exit();
}
?>

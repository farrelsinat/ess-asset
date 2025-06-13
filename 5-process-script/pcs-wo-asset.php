<?php
require('fpdf/fpdf.php'); // Include FPDF library
require('phpqrcode/qrlib.php');
require('conn-wo-asset.php');

ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $tglbuat_woass = $_POST['tglbuat_woass'];
    $susun_woass = $_POST['susun_woass'];
    $nama_susun_woass = $_POST['nama_susun_woass'];
    $asal_woass = $_POST['asal_woass'];
    $nama_asal_woass = $_POST['nama_asal_woass'];
    $costc_woass = $_POST['costc_woass'];
    $wbs_woass = $_POST['wbs_woass'];
    $jenis_woass = $_POST['jenis_woass'];
    $tujuan_woass = $_POST['tujuan_woass'];
    $tglperlu_woass = $_POST['tglperlu_woass'];
    $desc_woass = $_POST['desc_woass'];
    $note_woass = $_POST['note_woass'];
    $lokasal_woass = $_POST['lokasal_woass'];
    $pic_lokasal_woass = $_POST['pic_lokasal_woass'];
    $loktuj_woass = $_POST['loktuj_woass'];
    $pic_loktuj_woass = $_POST['pic_loktuj_woass'];

    // Handle arrays (convert them to comma-separated strings)
    $barang_woass = isset($_POST['barang_woass']) ? implode(', ', $_POST['barang_woass']) : '';
    $qty_woass = isset($_POST['qty_woass']) ? implode(', ', $_POST['qty_woass']) : '';
    $iden_woass = isset($_POST['iden_woass']) ? implode(', ', $_POST['iden_woass']) : '';

    // Prepare and execute SQL statement
    $sql = "INSERT INTO tb_dbwoass 
            (tglbuat_woass, susun_woass, nama_susun_woass, asal_woass, nama_asal_woass, costc_woass, wbs_woass, jenis_woass, tujuan_woass, tglperlu_woass, desc_woass, barang_woass, qty_woass, iden_woass, note_woass, lokasal_woass, pic_lokasal_woass, loktuj_woass, pic_loktuj_woass) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssiisss",
        $tglbuat_woass,$susun_woass, $nama_susun_woass, $asal_woass, $nama_asal_woass, $costc_woass, $wbs_woass, $jenis_woass, $tujuan_woass, $tglperlu_woass, $desc_woass,
        $barang_woass, $qty_woass, $iden_woass, $note_woass, $lokasal_woass, $pic_lokasal_woass, $loktuj_woass, $pic_loktuj_woass
    );

    if ($stmt->execute()) {
        $id_woass = $conn->insert_id; // This is your id_woass
        $no_woass = str_pad($id_woass, 3, "0", STR_PAD_LEFT);
    
        // Update no_woass to match id_woass
        $update_sql = "UPDATE tb_dbwoass SET no_woass = ? WHERE id_woass = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $no_woass, $id_woass);
        $update_stmt->execute();
    
        // Generate QR code image
        $tempDir = 'temp_qr/'; // make sure this folder exists and is writable
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0755, true);
        }
    
        $qrContent = "WO No: $no_woass/DSI1220/2025-S0"; // Content encoded in QR code
        $qrFileName = $tempDir . 'qr_' . $id_woass . '.png'; // Unique filename per request
        QRcode::png($qrContent, $qrFileName, QR_ECLEVEL_L, 4); // Generates PNG QR code
    } else {
        die("Database error: " . $conn->error);
    }

    // Clear output buffer before generating PDF
    ob_end_clean();

    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    // Add logo to the upper right
    $pdf->Image('fpdf/pdsilogocolored1.png', 250, 10, 40); // Adjust position and size
    
    // Title
    $pdf->Cell(0, 15, 'PERMINTAAN PEKERJAAN / WORK ORDER', 0, 1, 'C');
    
    // WO Details (aligned colons)
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(40, 5, 'W.O. No.', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, "$no_woass/DSI1220/2025-S0", 0, 0);
    $pdf->Cell(40, 5, 'Cost Center', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $costc_woass, 0, 1);

    $pdf->Cell(40, 5, 'Tanggal', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $tglbuat_woass, 0, 0);
    $pdf->Cell(40, 5, 'WBS', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $wbs_woass, 0, 1);

    $pdf->Cell(40, 5, 'Dari', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $asal_woass, 0, 0);
    $pdf->Cell(40, 5, 'Tanggal Diperlukan', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $tglperlu_woass, 0, 1);

    $pdf->Cell(40, 5, 'Kepada', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $tujuan_woass, 0, 1);
    
    $pdf->Ln(5);

    // Request details (align to the left end of the box)
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetX((210 - 180) / 2); // Align with box start
    $pdf->Cell(180, 5, $desc_woass, 0, 1, 'L'); // Align left
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetX((210 - 180) / 2); // Align with box start
    $pdf->Cell(180, 10, "Harap dipenuhi $jenis_woass berikut ini dengan rincian:", 0, 1, 'L'); // Align left
    
    // Define box position and size (centered on the page)
    $boxWidth = 265; // Adjusted width for better fitting
    $boxHeight = 75; // Estimated height (adjust dynamically if needed)
    $pageWidth = $pdf->GetPageWidth(); // Get the actual page width
    $boxX = ($pageWidth - $boxWidth) / 2; // Perfectly center the box horizontally
    $boxY = $pdf->GetY(); // Current Y position
    
    // Optional: Table headers (inside box)
    $pdf->SetX($boxX + 10);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(100, 7, 'Deskripsi Barang', 1, 0, 'C');
    $pdf->Cell(30, 7, 'Qty', 1, 0, 'C');
    $pdf->Cell($boxWidth - 100 - 40 - 15, 7, 'Identifikasi', 1, 1, 'C'); // Adjust to fit within box
    
    // Table rows
    $pdf->SetFont('Arial', '', 10);
    foreach ($_POST['barang_woass'] as $index => $barang) {
        $barang_woass = $_POST['barang_woass'][$index];
        $qty_woass = $_POST['qty_woass'][$index];
        $iden_woass = $_POST['iden_woass'][$index];
    
        $pdf->SetX($boxX + 10);
        $pdf->Cell(100, 7, $barang_woass, 1);
        $pdf->Cell(30, 7, $qty_woass, 1);
        $pdf->Cell($boxWidth - 100 - 40 - 15, 7, $iden_woass, 1); // Adjust width
        $pdf->Ln();
    }
    
    // Define label width for proper alignment
    $labelWidth = 10; // Adjust as needed
    $valueWidth = $boxWidth - $labelWidth - 10; // Adjust spacing
    
    // Set font
    $pdf->SetFont('Arial', '', 9);
    
    // === LEFT SIDE (Dari, PIC Dari, Ke, PIC Ke) ===
    $leftX = 20;         // Left margin
    $leftY = 110;        // Top position for both sections
    
    $pdf->SetXY($leftX, $leftY);
    
    // Dari
    $pdf->SetFont('', 'B');
    $pdf->Cell($labelWidth, 5, "Dari", 0, 0);
    $pdf->Cell($valueWidth, 5, ": $lokasal_woass", 0, 1);
    $pdf->SetFont('', '');
    
    // PIC Dari
    $pdf->SetX($leftX);
    $pdf->Cell($labelWidth, 5, "PIC", 0, 0);
    $pdf->Cell($valueWidth, 5, ": $pic_lokasal_woass", 0, 1);
    
    // Ke
    $pdf->SetX($leftX);
    $pdf->SetFont('', 'B');
    $pdf->Cell($labelWidth, 5, "Ke", 0, 0);
    $pdf->Cell($valueWidth, 5, ": $loktuj_woass", 0, 1);
    $pdf->SetFont('', '');
    
    // PIC Ke
    $pdf->SetX($leftX);
    $pdf->Cell($labelWidth, 5, "PIC", 0, 0);
    $pdf->Cell($valueWidth, 5, ": $pic_loktuj_woass", 0, 1);
    
    // === RIGHT SIDE (Note) ===
    $rightX = 180;
    $rightY = 125;
    
    $pdf->SetXY($rightX, $rightY);
    $pdf->SetFont('', 'BI');
    $pdf->Cell($labelWidth, 5, "Note", 0, 0);
    $pdf->Cell($valueWidth, 5, ": $note_woass", 0, 1);
    $pdf->SetFont('', '');
    
    // Move to a fixed position before the signature table
    $pdf->SetY(144); // Adjust this value to fix the position
    
    // Signature Table
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(95, 5, 'Bagian Peminta', 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, 'Disetujui Oleh', 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, 'Approval QR Code', 0, 1, 'C'); // No border
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(95, 5, $susun_woass, 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, $asal_woass, 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, '', 0, 1, 'C'); // No border
    
    $pdf->Image($qrFileName, $pdf->GetX() + 222.5, $pdf->GetY() - 5, 30, 30);
    
    $pdf->Cell(95, 30, '', 0, 0, 'C'); // No border on signature box
    $pdf->Cell(95, 30, '', 0, 0, 'C'); // No border on signature box
    $pdf->Cell(95, 30, '', 0, 1, 'C'); // No border on cost estimation box
    
    $pdf->Cell(95, 5, $nama_susun_woass, 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, $nama_asal_woass, 0, 0, 'C'); // No border
    $pdf->SetFont('Arial', 'I', 6);
    $pdf->SetXY(222.5, 177.5);
    $pdf->MultiCell(60, 5, 'Dokumen ini dinyatakan sah dengan tanda tangan digital dari ess-pdsi.com', 0, 'C');
    $pdf->SetFont('', '');
    
    $pdf->Output("WO-$no_woass-$jenis_woass-$barang_woass.pdf", 'I');
    
    if (file_exists($qrFileName)) {
    unlink($qrFileName);
    }
}
?>

<?php
require('fpdf/fpdf.php'); // Include FPDF library
require('conn-wo-ro.php');

ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $no_woro = $_POST['no_woro'];
    $tglbuat_woro = $_POST['tglbuat_woro'];
    $asal_woro = $_POST['asal_woro'];
    $nama_asal_woro = $_POST['nama_asal_woro'];
    $atasan_woro = $_POST['atasan_woro'];
    $nama_atasan_woro = $_POST['nama_atasan_woro'];
    $tujuan_woro = $_POST['tujuan_woro'];
    $costc_woro = $_POST['costc_woro'];
    $wbs_woro = $_POST['wbs_woro'];
    $jenis_woro = $_POST['jenis_woro'];
    $tglperlu_woro = $_POST['tglperlu_woro'];
    $desc_woro = $_POST['desc_woro'];
    $note_woro = $_POST['note_woro'];
    $lokasal_woro = $_POST['lokasal_woro'];
    $pic_lokasal_woro = $_POST['pic_lokasal_woro'];
    $loktuj_woro = $_POST['loktuj_woro'];
    $pic_loktuj_woro = $_POST['pic_loktuj_woro'];

    // Handle arrays (convert them to comma-separated strings)
    $barang_woro = isset($_POST['barang_woro']) ? implode(', ', $_POST['barang_woro']) : '';
    $qty_woro = isset($_POST['qty_woro']) ? implode(', ', $_POST['qty_woro']) : '';
    $utk_woro = isset($_POST['utk_woro']) ? implode(', ', $_POST['utk_woro']) : '';

    // Prepare and execute SQL statement
    $sql = "INSERT INTO tb_dbworo 
            (no_woro, tglbuat_woro, asal_woro, nama_asal_woro, atasan_woro, nama_atasan_woro, tujuan_woro, costc_woro, wbs_woro, jenis_woro, tglperlu_woro, desc_woro, barang_woro, qty_woro, utk_woro, note_woro, lokasal_woro, pic_lokasal_woro, loktuj_woro, pic_loktuj_woro) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssiissss",
        $no_woro, $tglbuat_woro, $asal_woro, $nama_asal_woro, $atasan_woro, $nama_atasan_woro,
        $tujuan_woro, $costc_woro, $wbs_woro, $jenis_woro, $tglperlu_woro, $desc_woro,
        $barang_woro, $qty_woro, $utk_woro, $note_woro, $lokasal_woro, $pic_lokasal_woro,
        $loktuj_woro, $pic_loktuj_woro
    );

    if ($stmt->execute()) {
        echo "Data inserted successfully!<br>";
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
    $pdf->Cell(0, 15, 'PERMINTAAN PEKERJAAN', 0, 1, 'C');
    
    // WO Details (aligned colons)
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(40, 5, 'W.O. No.', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $no_woro, 0, 0);
    $pdf->Cell(40, 5, 'Cost Center', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $costc_woro, 0, 1);

    $pdf->Cell(40, 5, 'Tanggal', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $tglbuat_woro, 0, 0);
    $pdf->Cell(40, 5, 'Tanggal Diperlukan', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $tglperlu_woro, 0, 1);

    $pdf->Cell(40, 5, 'Dari', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $asal_woro, 0, 0);
    $pdf->Cell(40, 5, 'WBS', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $wbs_woro, 0, 1);

    $pdf->Cell(40, 5, 'Kepada', 0, 0);
    $pdf->Cell(5, 5, ':', 0, 0);
    $pdf->Cell(100, 5, $tujuan_woro, 0, 1);
    
    $pdf->Ln(5);

    // Request details (align to the left end of the box)
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetX((210 - 180) / 2); // Align with box start
    $pdf->Cell(180, 5, $desc_woro, 0, 1, 'L'); // Align left
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetX((210 - 180) / 2); // Align with box start
    $pdf->Cell(180, 10, "Harap dipenuhi $jenis_woro berikut ini dengan rincian:", 0, 1, 'L'); // Align left
    
    // Define box position and size (centered on the page)
    $boxWidth = 265; // Adjusted width for better fitting
    $boxHeight = 75; // Estimated height (adjust dynamically if needed)
    $pageWidth = $pdf->GetPageWidth(); // Get the actual page width
    $boxX = ($pageWidth - $boxWidth) / 2; // Perfectly center the box horizontally
    $boxY = $pdf->GetY(); // Current Y position
    
    // Draw the box
    $pdf->Rect($boxX, $boxY, $boxWidth, $boxHeight);
    
    $pdf->SetX($boxX + 5);
    $pdf->SetFont('Arial', 'B', 11);
    
    foreach ($_POST['barang_woro'] as $index => $barang) {
        $barang_woro = $_POST['barang_woro'][$index];
        $qty_woro = $_POST['qty_woro'][$index];
        $utk_woro = $_POST['utk_woro'][$index];
    
        $pdf->SetX($boxX + 10);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell($boxWidth - 15, 7, "- $barang_woro sebanyak $qty_woro EA/Jts/Unit untuk $utk_woro.", 0, 1);
    }
    
    // Define label width for proper alignment
    $labelWidth = 10; // Adjust as needed
    $valueWidth = $boxWidth - $labelWidth - 10; // Adjust spacing
    
    // Set custom X and Y positions
    $fixedXPosition = 200; // Adjust to move left/right
    $fixedYPosition = 120; // Adjust to move up/down
    
    $pdf->SetFont('Arial', '', 9);
    
    // Set the starting position (fixed)
    $pdf->SetXY($fixedXPosition, $fixedYPosition);
    
    // Note
    $pdf->Cell($labelWidth, 5, "Note", 0, 0);
    $pdf->Cell($valueWidth, 5, ": $note_woro", 0, 1);
    
    // Dari
    $pdf->SetX($fixedXPosition);
    $pdf->Cell($labelWidth, 3, "Dari", 0, 0);
    $pdf->Cell($valueWidth, 3, ": $lokasal_woro", 0, 1);
    
    // PIC Dari
    $pdf->SetX($fixedXPosition);
    $pdf->Cell($labelWidth, 3, "PIC", 0, 0);
    $pdf->Cell($valueWidth, 3, ": $pic_lokasal_woro", 0, 1);
    
    // Ke
    $pdf->SetX($fixedXPosition);
    $pdf->Cell($labelWidth, 3, "Ke", 0, 0);
    $pdf->Cell($valueWidth, 3, ": $loktuj_woro", 0, 1);
    
    // PIC Ke
    $pdf->SetX($fixedXPosition);
    $pdf->Cell($labelWidth, 3, "PIC", 0, 0);
    $pdf->Cell($valueWidth, 3, ": $pic_loktuj_woro", 0, 1);

    // Move to a fixed position before the signature table
    $pdf->SetY(144); // Adjust this value to fix the position
    
    // Signature Table
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(95, 5, 'Bagian Peminta', 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, 'Mengetahui', 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, 'Perkiraan Biaya (Rp)', 0, 1, 'C'); // No border
    
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(95, 5, $asal_woro, 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, $atasan_woro, 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, '', 0, 1, 'C'); // No border
    
    $pdf->Cell(95, 30, '', 0, 0, 'C'); // No border on signature box
    $pdf->Cell(95, 30, '', 0, 0, 'C'); // No border on signature box
    $pdf->Cell(95, 30, '', 0, 1, 'C'); // No border on cost estimation box
    
    $pdf->Cell(95, 5, $nama_asal_woro, 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, $nama_atasan_woro, 0, 0, 'C'); // No border
    $pdf->Cell(95, 5, '', 0, 1, 'C'); // No border on cost estimation text
    
    $pdf->Output("$tglbuat_woro-WO-$jenis_woro-$asal_woro.pdf", 'D');
}
?>

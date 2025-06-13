<!DOCTYPE html>

<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
}

$allowed_roles = ['admin', 'asset'];

if (!in_array($_SESSION['user_role'], $allowed_roles)) {
    echo "Akses dibatasi. Anda tidak memiliki izin.";
    exit;
}
?>

<?php
include 'conn-asttubgod.php';

$id_tubgod = '';
$periode = '';
$rigopr = '';
$rigyard = '';
$snpin = '';
$snbox = '';
$tubgod = '';
$man = '';
$ctype = '';
$pounder = '';
$weight = '';
$length = '';
$udate = '';
$nomov = '';
$nopo = '';

if(isset($_GET['edit'])){
  $id_tubgod = $_GET['edit'];

  $query = "SELECT * FROM tb_dbhasiltubgod WHERE id_tubgod = '$id_tubgod';";
  $sql = mysqli_query($conn, $query);

  if($result = mysqli_fetch_assoc($sql)){
    $periode = $result['periode_laporan'];
    $rigopr = $result['rig_operation'];
    $rigyard = $result['rig_yard'];
    $snpin = $result['sn_pin'];
    $snbox = $result['sn_box'];
    $tubgod = $result['jenis_tubgod'];
    $man = $result['man'];
    $ctype = $result['conn_type'];
    $pounder = $result['pounder'];
    $weight = $result['weight'];
    $length = $result['length'];
    $udate = $result['use_date'];
    $nomov = $result['no_mov'];
    $nopo = $result['no_po'];

          //var_dump($result);
          //die();
  }
}
?>

<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/logo/ess-icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <title>ESS | TUBULAR Input Data</title>

  <style>
    body {
      padding-top: 160px; /* Adjust the value based on the height of your navbar */
    }
    .navbar {
      justify-content: space-between;
    }
    .navbar-brand {
      font-size: 25px;
      font-weight: bold;
      margin-bottom: 0;
      padding-bottom: 0;
    }
    .navbar-text {
      font-size: 15px;
      font-style: italic;
      margin-top: -5px;
      padding-top: 0;
    }
    .navbar-center {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }
    .navbar-nav .nav-item {
      margin-right: 20px; /* Adjust this value to increase spacing */
    }
    /* Remove extra margin for the last nav-item */
    .navbar-nav .nav-item:last-child {
      margin-right: 0;
    }
    .navbar-toggler {
      border-width: 0px;
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='white' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        /* Use a custom white SVG icon for the toggler */
    }
    .navbar-first {
      justify-content: space-between;
      z-index: 1030;
    }
    .navbar-second {
      top: 55px;
      position: fixed;
      width: 100%;
      z-index: 1029;
    }
    .navbar-nav .nav-link {
      color: white;
      padding: 8px 15px; /* Adds padding to allow for box effect */
      border-radius: 5px; /* Rounded corners */
      transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
    }
    /* Box-like hover effect */
    .navbar-nav .nav-link:hover {
      background-color: #ffc107 !important; /* Bootstrap warning background color */
      color: black !important; /* Dark text for contrast */
    }
    @media (max-width: 768px) {
      .navbar-brand .full-text {
        display: none;
      }
    }
    @media (min-width: 769px) {
      .navbar-brand .short-text {
        display: none;
      }
    }
  </style>

</head>
<body>
  <nav class="navbar navbar-first fixed-top navbar-expand-lg bg-danger">
    <div class="container-fluid">
      <!-- Left side: Navbar Brand -->
      <div class="d-flex flex-column align-items-start">
        <a class="navbar-brand text-white" href="page-home.php">
          <span class="full-text"><img src="/logo/asset-logo-1.png" alt="Bootstrap" style="height: 30px;"> | <img src="/logo/ess-logo.png" alt="Bootstrap" style="height: 30px;"></span>
          <span class="short-text"><img src="/logo/ess-logo.png" alt="Bootstrap" style="height: 30px;"></span>
        </a>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active text-white" href="page-home.php">
              <i class="fa fa-home" aria-hidden="true"></i> Home
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-database" aria-hidden="true"></i> Database
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="page-asttubgoddtb.php">Tubular Goods</a></li>
              <li><a class="dropdown-item" href="page-astbopdtb.php">Blow Out Preventer</a></li>
              <li><a class="dropdown-item" href="page-astdrawdtb.php">Drawworks</a></li>
              <li><a class="dropdown-item" href="page-asttopdtb.php">Top Drive</a></li>
              <li><a class="dropdown-item" href="page-astshsdtb.php">Shale Shaker</a></li>
              <li><a class="dropdown-item" href="page-astmcrdtb.php">Mud Cleaner</a></li>
              <li><a class="dropdown-item" href="page-astmppdtb.php">Mud Pump</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" href="page-pic.php">
              <i class="fa fa-phone" aria-hidden="true"></i> PIC
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" href="page-akunprofile.php">
              <i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['username']; ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" href="pcs-logout.php">
              <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-second fixed-top" style="background-color: #198754;">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand text-white">INPUT DATA - TUBULAR</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <script>
  // Define options for each RIG Operation
    const rigYardOptions = {
      "JAWA": ["PDSI #08.1/H40D-M", "PDSI #09.2/N80UE-E", "PDSI #12.3/N110-M", "PDSI #13.1/H40D-M", "PDSI #15.3/N110-M", "PDSI #28.2/D1000-E", "PDSI #31.3/D1500-E", "PDSI #38.2/D1000-E", "PDSI #40.3/DS1500-E", "PDSI #55.2/XJ550-M", "PDSI #56.2/XJ550-M", "WS BOP MUNDU JAWA", "YARD BONGAS", "YARD KAPETAKAN", "IDTC", "SUNTER", "PLB CILINCING"],
      "SBS": ["PDSI #01.2/N80B-M", "PDSI #05.2/OW760-M", "PDSI #07.1/PD350-M", "PDSI #16.2/NT45-M", "PDSI #18.2/LTO650-M", "PDSI #20.2/EMSCOD2-M", "PDSI #23.1/CWKT650-M", "PDSI #24.1/CWKT210-M", "PDSI #25.2/LTO750-M", "PDSI #26.1/H25CD-M", "PDSI #29.3/D1500-E/53", "PDSI #30.2/D1000-E", "PDSI #33.1/IDECO/H35-M", "PDSI #34.1/IDECO/H35-M", "PDSI #36.1/SKYTOP650-M", "PDSI #39.3/D1500-E/57", "PDSI #41.3/N110UE-E", "PDSI #44.1/PD350-M", "PDSI #45.1/PD350-M", "WS BOP PML SBS", "STAGING AREA TLJ-207", "STAGING ARE TLJ-216"],
      "JANARO": ["PDSI #17.2/NT45-M", "PDSI #19.1/LTO350-M", "PDSI #35.1/IDECO/H35-M", "PDSI #42.3/N1500-E", "PDSI #46.1/PD350-M", "PDSI #49.2/PD550-M", "PDSI #50.2/PD550-M", "PDSI #51.2/PD550-M", "PDSI #52.2/PD550-M", "PDSI #53.2/ZJ750-M", "PDSI #54.2/ZJ750-M", "YARD DURI", "YARD KENALI ASAM JAMBI", "YARD RANTAU"],
      "KTI": ["PDSI #04.3/N110-M", "PDSI #10.2/D700-M", "PDSI #11.2/N80B-M", "PDSI #21.2/OW700-M", "PDSI #22.2/OW700-M", "PDSI #32.2/N80UE-E", "PDSI #43.3/AB1500-E"],
      "OFF SHORE": ["PDSI #47.2/PD550-M", "PDSI #48.2/PD550-M"],
      "WS VENDOR": ["BENVORS GN PUTRI", "JMS GN PUTRI", "FUJI CIKARANG", "JMS BALIKPAPAN", "FUJI BALIKPAPAN", "REGIAN BALIKPAPAN"],
    };

  // Function to update the second dropdown based on the selection in the first
    function updateRigYardOptions() {
      const rigOperation = document.getElementById("inputrigopr").value;
      const rigYardSelect = document.getElementById("inputrigyard");
      
      // Clear existing options
      rigYardSelect.innerHTML = '<option value="">Pilih Letak</option>';

      // Get the corresponding options based on the selected RIG Operation
      const options = rigYardOptions[rigOperation] || [];

      // Populate the second dropdown with the new options
      options.forEach(option => {
        const newOption = document.createElement("option");
        newOption.value = option;
        newOption.text = option;
        rigYardSelect.appendChild(newOption);
      });
    }
  </script>

  <div class="container">
    <form id="dataForm" method="POST" action="pcs-asttubgod">
      <input type="hidden" value="<?php echo $id_tubgod; ?>" name="id_tubgod">
      <div class="mb-3 row justify-content-center">
        <label for="inputperiode" class="col-sm-2 col-form-label">Periode</label>
        <div class="col-sm-5">
          <input type="date" name="periode_laporan" class="form-control" id="inputperiode" required value="<?php echo $periode;?>">
        </div>
      </div>
      <div class="mb-3 row justify-content-center">
        <label for="inputrigopr" class="col-sm-2 col-form-label">Lokasi</label>
        <div class="col-sm-5">
          <select value="<?php echo $rigopr;?>" id="inputrigopr" name="rig_operation" class="form-select" required onchange="updateRigYardOptions()">
            <option <?php if($rigopr == ''){ echo "selected";} ?> value="">Pilih Lokasi</option>
            <option <?php if($rigopr == 'JAWA'){ echo "selected";} ?> value="JAWA">JAWA</option>
            <option <?php if($rigopr == 'SBS'){ echo "selected";} ?> value="SBS">SBS</option>
            <option <?php if($rigopr == 'JANARO'){ echo "selected";} ?> value="JANARO">JANARO</option>
            <option <?php if($rigopr == 'KTI'){ echo "selected";} ?> value="KTI">KTI</option>
            <option <?php if($rigopr == 'OFF SHORE'){ echo "selected";} ?> value="OFF SHORE">OFF SHORE</option>
            <option <?php if($rigopr == 'WS VENDOR'){ echo "selected";} ?> value="WS VENDOR">WS VENDOR</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row justify-content-center">
        <label for="inputrigyard" class="col-sm-2 col-form-label">Letak</label>
        <div class="col-sm-5">
          <select value="<?php echo $rigyard;?>" id="inputrigyard" name="rig_yard" class="form-select" required>
            <option <?php if($rigyard == ''){ echo "selected";} ?> value="">Pilih Letak</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row justify-content-center">
        <div class="col-sm-8">
          <h5 class="text-center mt-3">Pilih Data Tubular Goods</h5>
          <!-- Search Field -->
          <input type="text" id="searchInput" class="form-control mt-3 mb-1" placeholder="Cari berdasarkan S/N PIN, Jenis Tubular, Manufacture, No. Movable, atau No. PO" onkeyup="searchTable()">
            <div class="border p-3 rounded mt-2 table-responsive" style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
              <div id="paginationControls" class="d-flex justify-content-center">
                <button onclick="changePage(event, -1)" class="btn btn-secondary">Back</button>
                <span id="pageInfo" class="mx-2"></span>
                <button onclick="changePage(event, 1)" class="btn btn-secondary">Next</button>
              </div>
              <table id="dataTable" class="table table-striped" style="width: 100%; max-width: 100%;">
                  <thead>
                    <tr>
                      <th scope="col">
                        <input type="checkbox" id="checkAll" onclick="toggleCheckAll()"> Pilih Semua
                      </th>
                      <th scope="col">No.</th>
                      <th scope="col">Serial PIN</th>
                      <th scope="col">Serial BOX</th>
                      <th scope="col">Movable</th>
                      <th scope="col">Jenis</th>
                      <th scope="col">Manufaktur</th>
                      <th scope="col">Tipe Koneksi</th>
                      <th scope="col">Pounder (ppf)</th>
                      <th scope="col">Berat (kg)</th>
                      <th scope="col">Panjang (m)</th>
                      <th scope="col">Tanggal Pemakaian</th>
                      <th scope="col">Nomor PO</th>
                    </tr>
                  </thead>
                  <tbody id="dataTableBody">
                    <?php
                    $conn = mysqli_connect("localhost", "u597806360_asset_tubgod", "AsT-PdsI#2025_tUBgoD", "u597806360_db_tubgod");
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT id_tubgod, sn_pin, sn_box, jenis_tubgod, man, conn_type, pounder, weight, length, use_date, no_mov, no_po FROM tb_dbbahantubgod";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      $index = 1; // Start numbering
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='data[]' value='" . $row["sn_pin"] . "'>";
                        echo "<input type='hidden' name='sn_box[" . $row["sn_pin"] . "]' value='" . $row["sn_box"] . "'>";
                        echo "<input type='hidden' name='no_mov[" . $row["sn_pin"] . "]' value='" . $row["no_mov"] . "'>";
                        echo "<input type='hidden' name='jenis_tubgod[" . $row["sn_pin"] . "]' value='" . $row["jenis_tubgod"] . "'>";
                        echo "<input type='hidden' name='man[" . $row["sn_pin"] . "]' value='" . $row["man"] . "'>";
                        echo "<input type='hidden' name='conn_type[" . $row["sn_pin"] . "]' value='" . $row["conn_type"] . "'>";
                        echo "<input type='hidden' name='pounder[" . $row["sn_pin"] . "]' value='" . $row["pounder"] . "'>";
                        echo "<input type='hidden' name='weight[" . $row["sn_pin"] . "]' value='" . $row["weight"] . "'>";
                        echo "<input type='hidden' name='length[" . $row["sn_pin"] . "]' value='" . $row["length"] . "'>";
                        echo "<input type='hidden' name='use_date[" . $row["sn_pin"] . "]' value='" . $row["use_date"] . "'>";
                        echo "<input type='hidden' name='no_po[" . $row["sn_pin"] . "]' value='" . $row["no_po"] . "'>";
                        echo "</td>";
                        echo "<td>" . $index++ . "</td>";
                        echo "<td>" . $row["sn_pin"] . "</td>";
                        echo "<td>" . $row["sn_box"] . "</td>";
                        echo "<td>" . $row["no_mov"] . "</td>";
                        echo "<td>" . $row["jenis_tubgod"] . "</td>";
                        echo "<td>" . $row["man"] . "</td>";
                        echo "<td>" . $row["conn_type"] . "</td>";
                        echo "<td>" . $row["pounder"] . "</td>";
                        echo "<td>" . $row["weight"] . "</td>";
                        echo "<td>" . $row["length"] . "</td>";
                        echo "<td>" . $row["use_date"] . "</td>";
                        echo "<td>" . $row["no_po"] . "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='12'>No results found</td></tr>";
                    }
                    $conn->close();
                    ?>
                  </tbody>
              </table>
            </div>
            <div class="row mt-2 justify-content-center">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="submitData" style="width: 100px">OK</button>
            </div>
            <div class="row mt-1 justify-content-center">  
              <div class="col justify-content-center">
                <h6 class="text-center" style="font-weight: normal;">Klik "OK" setelah memilih data.</h6>
              </div>
            </div>
            <div class="mb-3 row mt-4 justify-content-center">
              <div class="col-sm-5 d-flex justify-content-center">
                  <button type="submit" name="aksi" value="add" class="btn btn-success me-2">
                    <i class="fa fa-plus-square me-2" aria-hidden="true"></i>Tambah Data
                  </button>
                <a href="page-asttubgoddtb.php" type="button" class="btn btn-danger">
                  <i class="fa fa-reply me-2" aria-hidden="true"></i>Batal
                </a>
              </div>
            </div>
        </div>
      </div>

    </form>
  </div>

  <!-- Display Selected Goods in Table Format -->
  <div class="container">
    <div class="mb-3 row justify-content-center">
      <div class="col-sm-8">
        <h6 class="text-center mt-4">Harap periksa kembali data yang telah dipilih!</h6>
        <span id="selectedCountDisplay" class="text">Data terpilih: 0</span>
        <div class="border p-3 rounded mt-2 table-responsive" style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
          <table class="table table-striped" id="selectedGoodsTable" style="display: none;">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">S/N PIN</th>
                <th scope="col">S/N BOX</th>
                <th scope="col">Jenis Tubular</th>
                <th scope="col">Manufacture</th>
                <th scope="col">Tipe Koneksi</th>
                <th scope="col">Pounder (ppf)</th>
                <th scope="col">Weight</th>
                <th scope="col">Length</th>
                <th scope="col">First Use Date</th>
                <th scope="col">No. Movable</th>
                <th scope="col">No. PO</th>
              </tr>
            </thead>
            <tbody id="selectedGoodsBody"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

        <script>
          const rowsPerPage = 10; // Number of rows to display per page
          let currentPage = 1;

          // Function to render a specific page
          function renderPage(page) {
            const rows = document.querySelectorAll("#dataTableBody tr");
            const totalPages = Math.ceil(rows.length / rowsPerPage);

              // Update page info text
            document.getElementById("pageInfo").innerText = `Page ${page} of ${totalPages}`;

              // Hide all rows initially
            rows.forEach(row => row.style.display = "none");

              // Calculate the start and end index for the rows of the current page
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

              // Display the rows that are within the current page's range
            for (let i = start; i < end && i < rows.length; i++) {
              rows[i].style.display = "";
            }
          }

          // Function to change page
          function changePage(event, direction) {
              event.preventDefault(); // Prevent any default action (like closing the modal)
              event.stopPropagation(); // Prevent the event from bubbling up and causing issues
              
              const rows = document.querySelectorAll("#dataTableBody tr");
              const totalPages = Math.ceil(rows.length / rowsPerPage);

              // Adjust the current page
              currentPage += direction;
              if (currentPage < 1) currentPage = 1;
              if (currentPage > totalPages) currentPage = totalPages;

              // Render the new page
              renderPage(currentPage);
            }

          // Initial render
            renderPage(currentPage);

          // Function to search the table
            function searchTable() {
              const searchInput = document.getElementById("searchInput").value.toLowerCase();
              const table = document.getElementById("dataTableBody");
              const rows = table.getElementsByTagName("tr");

              // Uncheck the "Check All" box on a new search
              document.getElementById("checkAll").checked = false;

              Array.from(rows).forEach((row) => {
                  // Adjust column indices based on table structure:
                  const snPinColumn = row.getElementsByTagName("td")[2]; // Column for `sn_pin`
                  const jenisTubularColumn = row.getElementsByTagName("td")[4]; // Column for `jenis tubular`
                  const manufactureColumn = row.getElementsByTagName("td")[5]; // Column for `manufacture`
                  const movableColumn = row.getElementsByTagName("td")[11]; // Column for `movable`
                  const nomorPoColumn = row.getElementsByTagName("td")[12]; // Column for `nomor po`

                  // Get the text content of each column, or set it to empty if the column is missing
                  const snPinValue = snPinColumn ? snPinColumn.textContent.toLowerCase() : "";
                  const jenisTubularValue = jenisTubularColumn ? jenisTubularColumn.textContent.toLowerCase() : "";
                  const manufactureValue = manufactureColumn ? manufactureColumn.textContent.toLowerCase() : "";
                  const movableValue = movableColumn ? movableColumn.textContent.toLowerCase() : "";
                  const nomorPoValue = nomorPoColumn ? nomorPoColumn.textContent.toLowerCase() : "";

                  // Show the row if any column contains the search input
                  if (
                    snPinValue.includes(searchInput) ||
                    jenisTubularValue.includes(searchInput) ||
                    manufactureValue.includes(searchInput) ||
                    movableValue.includes(searchInput) ||
                    nomorPoValue.includes(searchInput)
                    ) {
                    row.style.display = "";
                } else {
                  row.style.display = "none";
                }
              });
            }


          // Function to display selected data in the table format and update count
            document.getElementById("submitData").addEventListener("click", function () {
              const selectedGoodsBody = document.getElementById("selectedGoodsBody");
              selectedGoodsBody.innerHTML = ""; // Clear previous selections
              const selectedRows = document.querySelectorAll('input[name="data[]"]:checked');

              // Update the count display
              document.getElementById("selectedCountDisplay").textContent = `Data terpilih: ${selectedRows.length}`;

              // Collect selected data to display in the selected goods table
              const selectedGoodsIds = [];
              selectedRows.forEach((checkbox, index) => {
                const row = checkbox.closest("tr");
                const cells = row.querySelectorAll("td");

                const newRow = document.createElement("tr");
                const numberCell = document.createElement("td");
                  numberCell.textContent = index + 1; // Start from 1
                  newRow.appendChild(numberCell);

                  // Add data cells
                  const columns = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
                  columns.forEach(colIndex => {
                    const cell = document.createElement("td");
                    cell.textContent = cells[colIndex].textContent;
                    newRow.appendChild(cell);
                  });

                  selectedGoodsBody.appendChild(newRow);
                  selectedGoodsIds.push(checkbox.value); // Collect ID for submission
                });

              // Show the selected goods table if there are selected items
              document.getElementById("selectedGoodsTable").style.display = selectedRows.length > 0 ? "table" : "none";

              // Add the selected IDs to a hidden input in the form for submission
              const inputField = document.createElement("input");
              inputField.type = "hidden";
              inputField.name = "selectedGoods[]"; // Ensure this matches on the PHP side
              inputField.value = JSON.stringify(selectedGoodsIds); // Send as JSON
              document.getElementById("dataForm").appendChild(inputField);
            });

          // Function to toggle all checkboxes when "Check All" is clicked
            function toggleCheckAll() {
              const checkAllBox = document.getElementById("checkAll");
              const rows = document.querySelectorAll("#dataTableBody tr");

              Array.from(rows).forEach((row) => {
                if (row.style.display !== "none") {
                  const checkbox = row.querySelector('input[type="checkbox"]');
                  if (checkbox) {
                    checkbox.checked = checkAllBox.checked;
                  }
                }
              });
            }

          // Function to update the "Check All" checkbox status based on individual checkboxes
            function updateCheckAllStatus() {
              const checkAllBox = document.getElementById("checkAll");
              const checkboxes = document.querySelectorAll('input[name="data[]"]');

              checkAllBox.checked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            }

          // Add event listeners to each individual checkbox
            document.querySelectorAll('input[name="data[]"]').forEach(checkbox => {
              checkbox.addEventListener('change', updateCheckAllStatus);
            });

          // Add event listener for submit data button
            document.getElementById("tambahDataBtn").addEventListener("click", function () {
              const periodeLaporan = document.getElementById("periode_laporan").value;
              const rigOperation = document.getElementById("rig_operation").value;
              const rigYard = document.getElementById("rig_yard").value;

              const selectedData = [];
              document.querySelectorAll("input[name='data[]']:checked").forEach((checkbox) => {
                const row = checkbox.closest("tr");
                selectedData.push({
                  sn_pin: row.querySelector(".sn_pin").textContent.trim(),
                  sn_box: row.querySelector(".sn_box").textContent.trim(),
                  jenis_tubgod: row.querySelector(".jenis_tubgod").textContent.trim(),
                  man: row.querySelector(".man").textContent.trim(),
                  conn_type: row.querySelector(".conn_type").textContent.trim(),
                  pounder: row.querySelector(".pounder").textContent.trim(),
                  weight: row.querySelector(".weight").textContent.trim(),
                  length: row.querySelector(".length").textContent.trim(),
                  use_date: row.querySelector(".use_date").textContent.trim(),
                  no_mov: row.querySelector(".no_mov").textContent.trim(),
                      no_po: row.querySelector(".no_po") ? row.querySelector(".no_po").textContent.trim() : "" // If no_po exists
                    });
              });

              // Send the selected data to the server
              fetch("pcs-asttubgod", {
                method: "POST",
                headers: {
                  "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                  periode_laporan: periodeLaporan,
                  rig_operation: rigOperation,
                  rig_yard: rigYard,
                      selected_data: JSON.stringify(selectedData) // Send selected data as JSON string
                    })
              })
              .then(response => response.json())
              .then(data => {
                if (data.success) {
                  alert("Data has been successfully added!");
                } else {
                  alert("Error adding data.");
                }
              })
              .catch(error => console.error("Error:", error));
            });
          </script>

        </body>
        </html>
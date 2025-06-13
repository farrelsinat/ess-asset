<?php
include 'conn-astdraw.php';
session_start();

$query = "SELECT * FROM tb_dbhasildraw;";
$sql = mysqli_query($conn, $query);
$no = 0;
$no2 = 0;
?>

<?php
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
}

$user_role = $_SESSION['user_role'];

$allowed_roles = ['admin', 'maintenance', 'asset', 'operation'];

if (!in_array($_SESSION['user_role'], $allowed_roles)) {
    echo "Akses dibatasi. Anda tidak memiliki izin.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/logo/ess-icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
  <script type="text/javascript" src="datatables/datatables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

  <title>ESS | DRAWWORKS Database</title>

  <style>
    body {
      padding-top: 120px; /* Adjust the value based on the height of your navbar */
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
    .table {
      width: 100%; /* Makes the table fit within the container width */
      font-size: 0.9rem; /* Reduce font size for better fit */
    }
    .table td, .table th {
      padding: 0.5rem; /* Reduce padding for cells */
      overflow: hidden; /* Ensures content doesn't spill outside cells */
      text-overflow: ellipsis; /* Adds '...' if content is too long */
      white-space: nowrap; /* Prevents text wrapping */
      text-align: center;
    }
    #dt th, #dt td {
      text-align: center !important;
      vertical-align: middle !important;
    }
    .btn-xs {
      padding: 2px 6px;
      font-size: 12px;
    }
    .dashboard-card {
      border-width: 0px;
      color: transparent;
    }
    .button-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      justify-items: center;
      width: 100%;
      max-width: 1000px;
    }
    .button-container-2 {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      gap: 15px;
      justify-items: center;
      width: 100%;
      max-width: 1000px;
    }
  </style>

</head>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dt').DataTable();
  } );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ds').DataTable();
  } );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dz').DataTable();
  } );
</script>

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

  <nav class="navbar navbar-second fixed-top" style="background-color: #ffc107;">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand text">DATABASE - DRAWWORKS</a>
    </div>
  </nav>
  
  <!-- Modal Opening -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="card mt-3" style="width: 90%; border-width: 1px; padding: 10px;">
                    <h6 class="text">INFORMASI</h6>
                    <p class="text">Database ini adalah seluruh data unit DRAWWORKS berdasarkan update pada 28 Januari 2025.</p>
                    <p class="text">Dimungkinkan ada perubahan atau tambahan data unit DRAWWORKS yang belum tercatat, mohon diperiksa kembali setiap data tersebut.</p>
                    <p class="text">Apabila menemukan data unit DRAWWORKS yang terduplikasi(double), harap menghubungi PIC.</p>
                </div>
                <div class="card mt-3" style="width: 90%; border-width: 1px; padding: 10px;">
                    <h6 class="text">CARA PENGGUNAAN</h6>
                    <p class="text">Input Data = Form untuk menambahkan data unit DRAWWORKS pengadaan/investasi baru dan/atau data unit DRAWWORKS yang belum pernah masuk ke dalam database.</p>
                    <p class="text">Dashboard = Rangkuman data sebaran unit DRAWWORKS di dalam database.</p>
                    <p class="text">Riwayat Edit = Informasi terkait perubahan(lokasi, dll) pada data unit DRAWWORKS.</p>
                    <p class="text">Riwayat Hapus = Informasi terkait penghapusan suatu data unit DRAWWORKS.</p>
                    <p class="text">
                        <button type="button" class="btn btn-primary btn-sm btn-xs">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </button> = Form untuk mengubah data unit DRAWWORKS, seperti perubahan pada lokasi, COC, dll.
                    </p>
                    <p class="text">
                        <button type="button" class="btn btn-danger btn-sm btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button> = Tombol untuk menghapus suatu data unit DRAWWORKS.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

  <script src="js/bootstrap.bundle.min.js"></script>

  <div class="container">
    <div class="card dashboard-card row mt-5">
      <!-- Submit Button -->
      <div class="button-container-2">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#infoModal" style="width: 100%; font-weight: bold;">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Informasi & Cara Penggunaan <i class="fa fa-info-circle" aria-hidden="true"></i>
            </button>
      </div>
      <div class="button-container mt-3">
        <?php if ($user_role == 'admin' || $user_role == 'asset') : ?>
            <a href="page-astdrawfinput.php" class="btn btn-success" style="width: 100%; font-weight: bold;">
              <i class="fa fa-plus-square" aria-hidden="true"></i> Input Data
            </a>
        <?php elseif ($user_role == 'maintenance' || $user_role == 'operation' || $user_role == 'guest') : ?>
            <button class="btn btn-success" style="width: 100%; font-weight: bold;" disabled>
              <i class="fa fa-plus-square" aria-hidden="true"></i> Input Data
            </button>
        <?php endif; ?>
        <a href="page-astdrawdsb.php" type="button" class="btn btn-primary" style="width: 100%; font-weight: bold;">
          <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        </a>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edittableModal" style="width: 100%; font-weight: bold;">
          <i class="fa fa-pencil" aria-hidden="true"></i> Riwayat Edit
        </button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deltableModal" style="width: 100%; font-weight: bold;">
          <i class="fa fa-trash" aria-hidden="true"></i> Riwayat Hapus
        </button>
      </div>
      <!-- Search Form -->
      <div class="col-auto">
        <form class="d-flex">
        </form>
      </div>
    </div>

    <?php
    if(isset($_SESSION['eksekusi'])):
      ?>
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        <strong class="text-dark">
          <?php
          echo $_SESSION['eksekusi'];
          ?>
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
      unset($_SESSION['eksekusi']);
    endif;
    ?>

    <!-- Responsive Table -->
    <div class="table-responsive mt-4">
      <table id="dt" class="table table-striped table-tertiary-color cell-border hover" style="width: 100%;">
        <thead>
          <tr class="align-middle text-center">
            <th>No.</th>
            <th>Aksi</th>
            <th>Periode</th>
            <th>Lokasi</th>
            <th>Letak</th>
            <th>Serial</th>
            <th>Movable</th>
            <th>Manufaktur</th>
            <th>Tipe</th>
            <th>Legacy</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($result = mysqli_fetch_assoc($sql)){
            ?>
            <tr class="align-middle text-center">
              <td>
                <?php echo ++$no ?>
              </td>
              <td>
                <?php if ($user_role == 'admin' || $user_role == 'asset' || $user_role == 'maintenance') : ?>
                    <a href="page-astdrawfedit.php?edit=<?php echo $result['id_dw'] ?>&sn_dw=<?php echo $result['sn_dw'] ?>" type="button" class="btn btn-primary btn-sm btn-xs">
                      <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                <?php elseif ($user_role == 'operation' || $user_role == 'guest') : ?>
                    <button type="button" class="btn btn-primary btn-sm btn-xs" disabled>
                      <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </button>
                <?php endif; ?>
                <?php if ($user_role == 'admin' || $user_role == 'asset') : ?>
                    <a href="pcs-astdraw.php?hapus=<?php echo $result['id_dw'] ?>" type="button" class="btn btn-danger btn-sm btn-xs" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                <?php elseif ($user_role == 'maintenance' || $user_role == 'operation' || $user_role == 'guest') : ?>
                    <button type="button" class="btn btn-danger btn-sm btn-xs" disabled>
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                <?php endif; ?>
              </td>
              <td>
                <?php echo $result['periode_laporan'] ?>
              </td>
              <td>
                <?php echo $result['rig_operation'] ?>
              </td>
              <td>
                <?php echo $result['rig_yard'] ?>
              </td>
              <td>
                <?php echo $result['sn_dw'] ?>
              </td>
              <td>
                <?php echo $result['no_mov'] ?>
              </td>
              <td>
                <?php echo $result['man'] ?>
              </td>
              <td>
                <?php echo $result['type'] ?>
              </td>
              <td>
                <?php echo $result['legacy'] ?>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  
    <div class="mt-3 mb-3 text-center">
        <button id="exportExcel" class="btn btn-success">Export to Excel</button>
        <button id="exportCSV" class="btn btn-info">Export to CSV</button>
    </div>
    
    <script>
    document.getElementById("exportExcel").addEventListener("click", function () {
        let table = $('#dt').DataTable(); // Get DataTable instance
        let data = table.rows().data().toArray(); // Get all rows
    
        let wb = XLSX.utils.book_new();
        let ws_data = [];
    
        // Add headers (excluding the first column - Action)
        let headers = table.columns().header().toArray().slice(1).map(th => th.innerText);
        ws_data.push(headers);
    
        // Add row data (excluding first column - Action)
        data.forEach(row => {
            ws_data.push(Object.values(row).slice(1)); // Remove Action column
        });
    
        let ws = XLSX.utils.aoa_to_sheet(ws_data);
        XLSX.utils.book_append_sheet(wb, ws, "Data");
        XLSX.writeFile(wb, "Drawworks-ESS-2025.xlsx");
    });
    
    document.getElementById("exportCSV").addEventListener("click", function () {
        let table = $('#dt').DataTable();
        let data = table.rows().data().toArray();
    
        let rows = [];
        
        // Add headers (excluding first column)
        let headers = table.columns().header().toArray().slice(1).map(th => th.innerText);
        rows.push(headers.join(",")); 
    
        // Add row data (excluding first column)
        data.forEach(row => {
            let cells = Object.values(row).slice(1).map(cell => `"${cell}"`); // Remove Action column
            rows.push(cells.join(","));
        });
    
        // Create CSV file
        let csvContent = rows.join("\n");
        let blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
        let link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "Drawworks-ESS-2025.csv";
        link.click();
    });
    </script>
  
  <div class="modal fade" id="deltableModal" tabindex="-1" aria-labelledby="deltableModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deltableModalLabel">RIWAYAT HAPUS - DRAWWORKS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Table Inside Modal -->
            <div class="table-responsive">
              <table id="dz" class="table table-striped table-tertiary-color cell-border hover text-white" style="width: 100%;">
                <thead>
                  <tr class="align-middle text-center" style="font-weight: bold;">
                    <th>No.</th>
                    <th>Periode</th>
                    <th>Lokasi</th>
                    <th>Letak</th>
                    <th>Serial</th>
                    <th>Manufaktur</th>
                    <th>Tipe</th>
                    <th>Legacy</th>
                    <th>Diinput Oleh</th>
                    <th>Dihapus Oleh</th>
                    <th>Waktu Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $server = "localhost";
                  $username = "u597806360_asset_dw";
                  $password = "AsT-PdsI#2025_dW";
                  $dbname = "u597806360_db_dw";

                  $conn = new mysqli($server, $username, $password, $dbname);

                  if($conn->connect_error){
                    die("Connection Failed" .$conn->connect_error);
                  }
                  $sql = "SELECT periode_laporan, rig_operation, rig_yard, sn_dw, man, type, legacy, inputed_by, deleted_by, deletion_time FROM tb_dbdeldraw";
                  $query = $conn->query($sql);
                  while ($row = $query->fetch_assoc()){
                    ?>
                    <tr class="align-middle text-center">
                      <td><?php echo ++$no2 ?></td>
                      <td><?php echo $row['periode_laporan'];?></td>
                      <td><?php echo $row['rig_operation'];?></td>
                      <td><?php echo $row['rig_yard'];?></td>
                      <td><?php echo $row['sn_dw'];?></td>
                      <td><?php echo $row['man'];?></td>
                      <td><?php echo $row['type'];?></td>
                      <td><?php echo $row['legacy'];?></td>
                      <td><?php echo $row['inputed_by'];?></td>
                      <td><?php echo $row['deleted_by'];?></td>
                      <td><?php echo $row['deletion_time'];?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="edittableModal" tabindex="-1" aria-labelledby="edittableModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edittableModalLabel">RIWAYAT EDIT - DRAWWORKS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Table Inside Modal -->
            <div class="table-responsive">
              <table id="ds" class="table table-striped table-tertiary-color cell-border hover text-white" style="width: 100%;">
                <thead>
                  <tr class="align-middle text-center" style="font-weight: bold;">
                    <th>No.</th>
                    <th>Periode</th>
                    <th>Lokasi Asal</th>
                    <th>Letak Asal</th>
                    <th>Lokasi Tujuan</th>
                    <th>Letak Tujuan</th>
                    <th>Serial</th>
                    <th>Manufaktur</th>
                    <th>Tipe</th>
                    <th>Legacy</th>
                    <th>Diinput Oleh</th>
                    <th>Diedit Oleh</th>
                    <th>Waktu Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $server = "localhost";
                  $username = "u597806360_asset_dw";
                  $password = "AsT-PdsI#2025_dW";
                  $dbname = "u597806360_db_dw";

                  $conn = new mysqli($server, $username, $password, $dbname);

                  if($conn->connect_error){
                    die("Connection Failed" .$conn->connect_error);
                  }
                  $sql = "SELECT periode_laporan, rig_operation, rig_yard, new_rig_operation, new_rig_yard, sn_dw, man, type, legacy, inputed_by, edited_by, edit_time FROM tb_dbeditdraw";
                  $query = $conn->query($sql);
                  while ($row = $query->fetch_assoc()){
                    ?>
                    <tr class="align-middle text-center">
                      <td><?php echo ++$no2 ?></td>
                      <td><?php echo $row['periode_laporan'];?></td>
                      <td><?php echo $row['rig_operation'];?></td>
                      <td><?php echo $row['rig_yard'];?></td>
                      <td><?php echo $row['new_rig_operation'];?></td>
                      <td><?php echo $row['new_rig_yard'];?></td>
                      <td><?php echo $row['sn_dw'];?></td>
                      <td><?php echo $row['man'];?></td>
                      <td><?php echo $row['type'];?></td>
                      <td><?php echo $row['legacy'];?></td>
                      <td><?php echo $row['inputed_by'];?></td>
                      <td><?php echo $row['edited_by'];?></td>
                      <td><?php echo $row['edit_time'];?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
        setInterval(() => {
            fetch('pcs-akun-heartbeat.php');
        }, 30000); // Sends ping every 1 minute
  </script>

  </body>

  </html>
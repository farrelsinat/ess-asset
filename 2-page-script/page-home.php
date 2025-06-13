<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
}

$user_role = $_SESSION['user_role'];
?>

<?php
//TUBGOD
include 'conn-asttubgod.php';

// Query to calculate total tubular goods count across all statuses
$total_query = "SELECT COUNT(*) AS total_tubular_goods FROM tb_dbhasiltubgod";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total_tubular_goods = $total_data['total_tubular_goods'];

// Query to get all data for table display
$query = "SELECT * FROM tb_dbhasiltubgod";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<?php
//BOP
include 'conn-astbop.php';

// Query to calculate total tubular goods count across all statuses
$total_query = "SELECT COUNT(*) AS total_bop FROM tb_dbhasilbop";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total_bop = $total_data['total_bop'];

// Query to get all data for table display
$query = "SELECT * FROM tb_dbhasilbop";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<?php
//DRAWWORKS
include 'conn-astdraw.php';

// Query to calculate total tubular goods count across all statuses
$total_query = "SELECT COUNT(*) AS total_draw FROM tb_dbhasildraw";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total_draw = $total_data['total_draw'];

// Query to get all data for table display
$query = "SELECT * FROM tb_dbhasildraw";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<?php
//TOP DRIVE
include 'conn-asttop.php';

// Query to calculate total tubular goods count across all statuses
$total_query = "SELECT COUNT(*) AS total_top FROM tb_dbhasiltop";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total_top = $total_data['total_top'];

// Query to get all data for table display
$query = "SELECT * FROM tb_dbhasiltop";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<?php
//SHALE SHAKER
include 'conn-astshs.php';

// Query to calculate total tubular goods count across all statuses
$total_query = "SELECT COUNT(*) AS total_shs FROM tb_dbhasilshs";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total_shs = $total_data['total_shs'];

// Query to get all data for table display
$query = "SELECT * FROM tb_dbhasilshs";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<?php
//MUD CLEANER
include 'conn-astmcr.php';

// Query to calculate total tubular goods count across all statuses
$total_query = "SELECT COUNT(*) AS total_mcr FROM tb_dbhasilmcr";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total_mcr = $total_data['total_mcr'];

// Query to get all data for table display
$query = "SELECT * FROM tb_dbhasilmcr";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<?php
//MUD PUMP
include 'conn-astmpp.php';

// Query to calculate total tubular goods count across all statuses
$total_query = "SELECT COUNT(*) AS total_mpp FROM tb_dbhasilmpp";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total_mpp = $total_data['total_mpp'];

// Query to get all data for table display
$query = "SELECT * FROM tb_dbhasilmpp";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/logo/ess-icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
  <script type="text/javascript" src="datatables/datatables.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <title>ESS | Home</title>

  <style>
    body {
      padding-top: 160px; /* Adjust the value based on the height of your navbar */
      background-color: #F8F1EC;
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
    .dashboard-section {
      display: flex;
      justify-content: center;
      margin-top: 0px;
      margin-bottom: 0px;
      width: 100%;
      max-width: 1000px;
    }
    .dashboard-card {
      width: 100%;
      max-width: 1000px;
      border-radius: 15px;
      border-width: 0px;
    }
    .dashboard-card-2 {
      width: 100%;
      max-width: 1000px;
      padding: 10px 10px 10px 10px;
      border-radius: 15px;
      background-color: black;
    }
    .dashboard-title {
      font-size: 1.5rem;
      font-weight: bold;
      text-align: center;
    }
    .dashboard-buttons {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      justify-items: center;
    }
    .dashboard-buttons-wo {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      justify-items: center;
    }
    .dashboard-buttons button {
      padding: 10px 20px;
      font-size: 0.75rem;
      width: 100%;
      text-align: center;
      font-weight: bold;
    }
    .dashboard-buttons-wo button {
      padding: 10px 20px;
      font-size: 0.75rem;
      width: 100%;
      text-align: center;
      font-weight: bold;
    }
    .dashboard-qrscan {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      justify-items: center;
    }
    .dashboard-qrscan button {
      padding: 10px 20px;
      font-size: 1.1rem;
      width: 100%;
      text-align: center;
    }
    .whatsapp-float {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 1000;
      background-color: #198754;
      color: white;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .whatsapp-float:hover {
      background-color: #1DA851;
      text-decoration: none;
    }
    .admpanel-float {
      position: fixed;
      bottom: 110px;
      right: 30px;
      z-index: 1000;
      background-color: #dc3545;
      color: white;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .admpanel-float:hover {
      background-color: #ffc107;
      text-decoration: none;
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

  <nav class="navbar navbar-second fixed-top" style="background-color: #b02a37;">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand text-white">ESS HOME PAGE</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  
  <?php if ($user_role == 'admin') : ?>
      <a
        href="page-admpaneldtb.php"
        class="admpanel-float"
      >
        <i class="bi bi-person-circle" style="font-size: 30px;"></i>
      </a>
      <a
        href="page-pic.php"
        class="whatsapp-float"
      >
        <i class="bi bi-whatsapp" style="font-size: 30px;"></i>
      </a>
  <?php elseif ($user_role == 'asset' || $user_role == 'maintenance' || $user_role == 'operation' || $user_role == 'guest') : ?>
      <a
        href="page-pic.php"
        class="whatsapp-float"
      >
        <i class="bi bi-whatsapp" style="font-size: 30px;"></i>
      </a>
  <?php endif; ?>
  
  <div class="container dashboard-section">
    <div class="row mt-0" style="justify-content: center; width: 1000px;">
      <div class="col-md-3 mb-3 mb-md-0">
        <div class="d-flex justify-content-center">
            <button class="btn btn-warning" style="width: 100%; max-width: 1000px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#databaseModal">
              <i class="fa fa-database" style="padding: 15px; font-size: 25px;" aria-hidden="true"></i>Database
            </button>
        </div>
      </div>
      <div class="col-md-3 mb-3 mb-md-0">
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary text-white" style="width: 100%; max-width: 1000px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#scannerModal">
              <i class="fa fa-qrcode" style="color: white; padding: 15px; font-size: 25px;" aria-hidden="true"></i>QR Scanner
            </button>
        </div>
      </div>
      <div class="col-md-3 mb-3 mb-md-0">
        <div class="d-flex justify-content-center">
            <button class="btn btn-success text-white" style="width: 100%; max-width: 1000px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#woModal">
              <i class="fa fa-file-text" style="color: white; padding: 15px; font-size: 25px;" aria-hidden="true"></i>Work Order
            </button>
        </div>
      </div>
      <div class="col-md-3 mb-3 mb-md-0">
        <div class="d-flex justify-content-center">
            <button class="btn btn-info text-white" style="width: 100%; max-width: 1000px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#unitstatusModal">
              <i class="fa fa-pie-chart" style="color: white; padding: 15px; font-size: 25px;" aria-hidden="true"></i>Status Unit
            </button>
        </div>
      </div>
    </div>
  </div>
  
    <div class="modal fade" id="databaseModal" tabindex="-1" aria-labelledby="databaseModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header flex-column align-items-start">
            <h5 class="modal-title" id="databaseModalLabel">Database</h5>
            <p class="text-muted mb-0" style="font-size: 0.85rem;">Pilih Database berikut untuk melihat rincian data dari setiap aset PDSI.</p>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <div class="dashboard-buttons">
              <button onclick="location.href='page-asttubgoddtb.php'" class="btn btn-warning" style="font-weight: bold;">Tubular</button>
              <button onclick="location.href='page-astbopdtb.php'" class="btn btn-warning" style="font-weight: bold;">BOP</button>
              <button onclick="location.href='page-astdrawdtb.php'" class="btn btn-warning" style="font-weight: bold;">Drawworks</button>
              <button onclick="location.href='page-asttopdtb.php'" class="btn btn-warning" style="font-weight: bold;">Top Drive</button>
              <button onclick="location.href='page-astshsdtb.php'" class="btn btn-warning" style="font-weight: bold;">Shale Shaker</button>
              <button onclick="location.href='page-astmcrdtb.php'" class="btn btn-warning" style="font-weight: bold;">Mud Cleaner</button>
              <button onclick="location.href='page-astmppdtb.php'" class="btn btn-warning" style="font-weight: bold;">Mud Pump</button>
              <button onclick="location.href='#'" class="btn btn-warning" style="font-weight: bold;">HTE</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="scannerModal" tabindex="-1" aria-labelledby="scannerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header flex-column align-items-start">
            <h5 class="modal-title" id="scannerModalLabel">QR Scanner</h5>
            <p class="text-muted mb-0" style="font-size: 0.85rem;">Pilih QR Scanner untuk melihat spesifikasi aset dan memasukkan running hours aset.</p>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center mt-3 mb-0">
            <p class="text-center mb-2" style="font-weight: bold; font-size: 1.25rem;">Cek Spesifikasi</p>
              <div class="dashboard-buttons">
                <button onclick="location.href='page-scanqr-cektubgod.php'" class="btn btn-primary text-white" style="font-weight: bold;">Tubular</button>
                <button onclick="location.href='page-scanqr-cekbop.php'" class="btn btn-primary text-white" style="font-weight: bold;">BOP</button>
                <button onclick="location.href='page-scanqr-cekdraw.php'" class="btn btn-primary text-white" style="font-weight: bold;">Drawworks</button>
                <button onclick="location.href='page-scanqr-cektop.php'" class="btn btn-primary text-white" style="font-weight: bold;">Top Drive</button>
                <button onclick="location.href='page-scanqr-cekshs.php'" class="btn btn-primary text-white" style="font-weight: bold;">Shale Shaker</button>
                <button onclick="location.href='page-scanqr-cekmcr.php'" class="btn btn-primary text-white" style="font-weight: bold;">Mud Cleaner</button>
                <button onclick="location.href='page-scanqr-cekmpp.php'" class="btn btn-primary text-white" style="font-weight: bold;">Mud Pump</button>
                <button onclick="location.href='#'" class="btn btn-primary text-white" style="font-weight: bold;">HTE</button>
              </div>
          </div>
          <div class="modal-body mt-3 mb-3">
            <p class="text-center mb-2" style="font-weight: bold; font-size: 1.25rem;">Running Hours</p>
              <div class="dashboard-buttons">
                <button onclick="location.href='page-scanqr-hourtubgod.php'" class="btn btn-primary text-white" style="font-weight: bold;">Tubular</button>
                <button onclick="location.href='page-scanqr-hourbop.php'" class="btn btn-primary text-white" style="font-weight: bold;">BOP</button>
                <button onclick="location.href='page-scanqr-hourdraw.php'" class="btn btn-primary text-white" style="font-weight: bold;">Drawworks</button>
                <button onclick="location.href='page-scanqr-hourtop.php'" class="btn btn-primary text-white" style="font-weight: bold;">Top Drive</button>
                <button onclick="location.href='page-scanqr-hourshs.php'" class="btn btn-primary text-white" style="font-weight: bold;">Shale Shaker</button>
                <button onclick="location.href='page-scanqr-hourmcr.php'" class="btn btn-primary text-white" style="font-weight: bold;">Mud Cleaner</button>
                <button onclick="location.href='page-scanqr-hourmpp.php'" class="btn btn-primary text-white" style="font-weight: bold;">Mud Pump</button>
                <button onclick="location.href='#'" class="btn btn-primary text-white" style="font-weight: bold;">HTE</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="woModal" tabindex="-1" aria-labelledby="woModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header flex-column align-items-start">
            <h5 class="modal-title" id="woModalLabel">Work Order (WO)</h5>
            <p class="text-muted mb-0" style="font-size: 0.85rem;">Pilih WO berdasarkan fungsi pembuat.</p>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <div class="dashboard-buttons">
                <?php if ($user_role == 'admin') : ?>
                <button onclick="location.href='page-wo-rofinput.php'" class="btn btn-success">
                  Operation
                </button>
                <button onClick="location.href='page-wo-assetfinput.php'" class="btn btn-success">
                  Asset Management
                </button>
                <?php elseif ($user_role == 'asset' || $user_role == 'maintenance' || $user_role == 'operation' || $user_role == 'guest') : ?>
                <button onClick="location.href='#'" class="btn btn-success">
                  Operation
                </button>
                <button onClick="location.href='#'" class="btn btn-success">
                  Asset Management
                </button>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="unitstatusModal" tabindex="-1" aria-labelledby="unitstatusModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header flex-column align-items-start">
            <h5 class="modal-title" id="unitstatusModalLabel">Status Unit</h5>
            <p class="text-muted mb-0" style="font-size: 0.85rem;">Pilih Status Unit untuk melihat sebaran kondisi setiap aset PDSI.</p>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <div class="dashboard-buttons">
              <button onclick="location.href='#'" class="btn btn-info text-white" style="font-weight: bold;">Tubular</button>
              <button onclick="location.href='page-astbopstat.php'" class="btn btn-info text-white" style="font-weight: bold;">BOP</button>
              <button onclick="location.href='#'" class="btn btn-info text-white" style="font-weight: bold;">Drawworks</button>
              <button onclick="location.href='#'" class="btn btn-info text-white" style="font-weight: bold;">Top Drive</button>
              <button onclick="location.href='#'" class="btn btn-info text-white" style="font-weight: bold;">Shale Shaker</button>
              <button onclick="location.href='#'" class="btn btn-info text-white" style="font-weight: bold;">Mud Cleaner</button>
              <button onclick="location.href='#'" class="btn btn-info text-white" style="font-weight: bold;">Mud Pump</button>
              <button onclick="location.href='#'" class="btn btn-info text-white" style="font-weight: bold;">HTE</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="container dashboard-section">
    <div class="card dashboard-card bg-secondary mt-5 mb-0" style="width: 1000px; border-radius: 15px; padding: 5px 5px;">
      <h3 class="text-white text-center mb-0" style="font-weight: bold; padding: 10px;">Asset Quantities</h3>
    </div>
  </div>

  <div class="container dashboard-section">
    <!-- Summary Section -->
    <div class="row mt-3" style="justify-content: center; width: 1000px;">
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">Tubular Goods</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;"><?php echo $total_tubular_goods; ?></p>
            <div class="d-flex justify-content-center">
              <a href="page-asttubgoddsb.php" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title  mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">Blow Out Preventer</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;"><?php echo $total_bop; ?></p>
            <div class="d-flex justify-content-center">
              <a href="page-astbopdsb.php" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">Drawworks</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;"><?php echo $total_draw; ?></p>
            <div class="d-flex justify-content-center">
              <a href="page-astdrawdsb.php" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">Top Drive</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;"><?php echo $total_top; ?></p>
            <div class="d-flex justify-content-center">
              <a href="page-asttopdsb.php" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">Shale Shaker</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;"><?php echo $total_shs; ?></p>
            <div class="d-flex justify-content-center">
              <a href="page-astshsdsb.php" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">Mud Cleaner</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;"><?php echo $total_mcr; ?></p>
            <div class="d-flex justify-content-center">
              <a href="page-astmcrdsb.php" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">Mud Pump</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;"><?php echo $total_mpp; ?></p>
            <div class="d-flex justify-content-center">
              <a href="page-astmppdsb.php" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card dashboard-card text-center mb-3" style="border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0">Jumlah Total</p>
            <p class="card-text mt-0 mb-0" style="font-weight: bold;">HTE</p>
            <p class="card-text text-success mt-0" style="font-size: 3rem; font-weight: bold;">0</p>
            <div class="d-flex justify-content-center">
              <a onClick="return confirm('On progress..')" class="btn btn-primary" style="color: white;"><strong>Dashboard</strong></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container dashboard-section">
    <span class="text-white mt-3 mb-3" style="font-size: 0.75rem;">
      © 2025 Asset Management
    </span>
  </div>
  
  <script>
    setInterval(() => {
        fetch('pcs-akun-heartbeat.php');
    }, 30000); // Sends ping every 1 minute
  </script>

</body>

</html>
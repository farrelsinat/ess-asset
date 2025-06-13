<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
}

$user_role = $_SESSION['user_role'];
?>

<!DOCTYPE html>
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

  <title>ESS | TUBULAR Dashboard</title>

  <style>
    body {
      padding-top: 160px; /* Adjust the value based on the height of your navbar */
      background-color: #003580;
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
    .button-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      justify-items: center;
      width: 100%;
      max-width: 1000px;
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
      <a class="navbar-brand text-white">DASHBOARD - TUBULAR</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <?php
  include 'conn-asttubgod.php';

  $rigopr = ["MRO 1", "MRO 2", "MRO 3", "MRO 4", "MRO 5", "MRO 6", "MRO 7", "YARD SBS", "YARD JAWA", "YARD JANARO", "YARD KTI"];
  $rigyard = [
      "1.2", "4.3", "5.2", "7.1", "8.1", "9.2", "10.2", "11.2", "12.3", "13.1", 
      "15.3", "16.2", "17.2", "18.2", "19.1", "20.2", "21.2", "22.2", "23.1", 
      "24.1", "25.2", "26.1", "28.2", "29.3", "30.2", "31.3", "32.2", "33.1", 
      "34.1", "35.1", "36.1", "38.2", "39.3", "40.4", "41.3", "42.3", "43.3", 
      "44.1", "45.1", "46.1", "47.2", "48.2", "49.2", "50.2", "51.2", "52.2", 
      "53", "54", 
      "JACK UP", 
      "PIPE YARD CEMARA", "PIPE YARD PRABU", 
      "TLJ 170 (STAGING AREA)", "TLJ 216 (PIPE JUNK)", "TLJ 270 (STAGING AREA)", 
      "YARD ANGGANA", "YARD BONGAS", "YARD BUNYU", "YARD DURI", 
      "YARD KENALI", "YARD MUTIARA", "YARD RANTAU", 
      "YARD SANGA-SANGA", "YARD ANGGANA"
  ];
  $jenistubgod = ["DC 3 1/2", "DC 4 3/4", "DC 6 1/4", "DC 6 1/2", "DC 8", "DP 2 7/8", "DP 2 3/8", "DP 3 1/2", "DP 4 1/2", "DP 5", "HWDP 3 1/2", "HWDP 5", "DRILLING JAR 4 3/4", "DRILLING JAR 6 1/2", "SCRAPPER 4", "SCRAPPER 7", "SCRAPPER 9 5/8"];
  $man = ["BOHAI", "PETRO M"];

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
  // Get the current month and year
  $currentMonth = date('m'); // Current month (e.g., '12' for December)
  $currentYear = date('Y');  // Current year (e.g., '2024')

  $tubulars = ["DC 3 1/2", "DC 4 3/4", "DC 6 1/4", "DC 6 1/2", "DC 8", "DP 2 7/8", "DP 2 3/8", "DP 3 1/2", "DP 4 1/2", "DP 5", "HWDP 3 1/2", "HWDP 5", "DRILLING JAR 4 3/4", "DRILLING JAR 6 1/2", "SCRAPPER 4", "SCRAPPER 7", "SCRAPPER 9 5/8"];

  $tubularCounts = [];

  foreach ($tubulars as $tubular) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasiltubgod 
              WHERE jenis_tubgod = '$tubular'";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $tubularCounts[$tubular] = $row['total'] ?? 0; // Default to 0 if no result
  }
  ?>

  <!-- JUMLAH TUBGOD -->
  <div class="container dashboard-section">
    <div class="col">
      <div class="card dashboard-card text-center mb-0" style="width: 100%; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); padding: 5px 5px;">
        <div class="d-flex justify-content-center align-items-center mt-0">
          <h5 class="text text-center mb-0" style="font-size: 1rem; font-weight: bold;">TOTAL JOINT:</h5>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-0">
          <h5 class="count-box text-danger mb-0" style="font-size: 4rem; font-weight: bold;"><?php echo $total_tubular_goods; ?></h5>
        </div>
        <div class="button-container mt-2 mb-2">
              <a href="page-asttubgodfinput.php" type="button" class="btn btn-success" style="width: 100%; font-weight: bold;">
                <i class="fa fa-plus-square me-2" aria-hidden="true"></i>Input Data
              </a>
          <a href="page-asttubgoddtb.php" type="button" class="btn btn-warning" style="width: 100%; font-weight: bold;">
            <i class="fa fa-database me-2" aria-hidden="true"></i>Database
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container dashboard-section">
    <div class="row">
      <?php foreach ($tubularCounts as $tubular => $count): ?>
        <div class="col-md-3">
          <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
            <div class="card-body">
              <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo htmlspecialchars($tubular); ?></p>
              <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $count; ?></p>
              <a onClick="return confirm('On progress.. :)')" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#"><strong>Detail</strong></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</body>

</html>
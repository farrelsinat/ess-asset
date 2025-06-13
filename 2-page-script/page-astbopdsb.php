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

  <title>ESS | BOP Dashboard</title>

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
      grid-template-columns: repeat(3, 1fr);
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
      <a class="navbar-brand text-white">DASHBOARD - BOP</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <?php
  //TUBGOD
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
  $annulars = ['ANNULAR'];
  $srams = ['SINGLE RAM'];
  $sramshs = ['SINGLE RAM-(SHEAR)'];
  $drams = ['DOUBLE RAM'];
  $dramshs = ['DOUBLE RAM-(SHEAR)'];

  $annularCounts = [];
  $sramCounts = [];
  $sramshCounts = [];
  $dramCounts = [];
  $dramshCounts = [];

  foreach ($annulars as $annular) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasilbop 
              WHERE jenis_bop = '$annular'";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $annularCounts[$annular] = $row['total'] ?? 0; // Default to 0 if no result
  }

  foreach ($srams as $sram) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasilbop 
              WHERE jenis_bop = '$sram'";      
 
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $sramCounts[$sram] = $row['total'] ?? 0; // Default to 0 if no result
  }

  foreach ($sramshs as $sramsh) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasilbop 
              WHERE jenis_bop = '$sramsh'";      
  
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $sramshCounts[$sramsh] = $row['total'] ?? 0; // Default to 0 if no result
  }

  foreach ($drams as $dram) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasilbop 
              WHERE jenis_bop = '$dram'";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $dramCounts[$dram] = $row['total'] ?? 0; // Default to 0 if no result
  }

  foreach ($dramshs as $dramsh) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasilbop 
              WHERE jenis_bop = '$dramsh'";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $dramshCounts[$dramsh] = $row['total'] ?? 0; // Default to 0 if no result
  }

  ?>

  <?php
  $host = 'localhost';
  $dbname = 'u597806360_db_bop';
  $username = 'u597806360_asset_bop';
  $password = 'AsT-PdsI#2025_BoP';

  try {
      // Database connection
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      /**
       * Function to count the total data for a given BOP type and conditions
       *
       * @param PDO $pdo
       * @param string $jenis_bop The type of BOP (e.g., DIVERTER, ANNULAR)
       * @param array $conditions The size and pressure conditions
       * @return array The counts of each condition
       */
      function getBopCounts($pdo, $jenis_bop, $conditions) {
          // Prepare the SQL statement with placeholders
          $sql = "SELECT jenis_bop, size, pressure, COUNT(*) AS total_count 
                  FROM tb_dbhasilbop 
                  WHERE jenis_bop = :jenis_bop
                  AND (";

          // Dynamically add conditions to the WHERE clause
          $whereClauses = [];
          foreach ($conditions as $index => $condition) {
              $whereClauses[] = "(size = :size_$index AND pressure = :pressure_$index)";
          }
          $sql .= implode(' OR ', $whereClauses) . ") 
                  GROUP BY size, pressure";

          $stmt = $pdo->prepare($sql);

          // Bind BOP type and dynamic parameters for each condition
          $stmt->bindValue(":jenis_bop", $jenis_bop);
          foreach ($conditions as $index => $condition) {
              $stmt->bindValue(":size_$index", $condition['size']);
              $stmt->bindValue(":pressure_$index", $condition['pressure']);
          }

          $stmt->execute();
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Organize the result counts
          $counts = [];
          foreach ($results as $result) {
              $title = "{$result['size']} {$result['pressure']}";
              $counts[] = [
                  'title' => $title,
                  'count' => $result['total_count']
              ];
          }
          return $counts;
      }

      // ** ANNULAR Conditions **
      $annConditions = [
          ['size' => '6"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '2000'],
          ['size' => '7-1/16"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '5000'],
          ['size' => '7-1/16"', 'pressure' => '10000'],
          ['size' => '7-1/16"', 'pressure' => '15000'],
          ['size' => '11"', 'pressure' => '2000'],
          ['size' => '11"', 'pressure' => '3000'],
          ['size' => '11"', 'pressure' => '5000'],
          ['size' => '11"', 'pressure' => '10000'],
          ['size' => '11"', 'pressure' => '15000'],
          ['size' => '13-5/8"', 'pressure' => '2000'],
          ['size' => '13-5/8"', 'pressure' => '3000'],
          ['size' => '13-5/8"', 'pressure' => '5000'],
          ['size' => '13-5/8"', 'pressure' => '10000'],
          ['size' => '13-5/8"', 'pressure' => '15000'],
          ['size' => '16-3/4"', 'pressure' => '2000'],
          ['size' => '16-3/4"', 'pressure' => '3000'],
          ['size' => '16-3/4"', 'pressure' => '5000'],
          ['size' => '16-3/4"', 'pressure' => '10000'],
          ['size' => '16-3/4"', 'pressure' => '15000'],
          ['size' => '18-3/4"', 'pressure' => '2000'],
          ['size' => '18-3/4"', 'pressure' => '3000'],
          ['size' => '18-3/4"', 'pressure' => '5000'],
          ['size' => '18-3/4"', 'pressure' => '10000'],
          ['size' => '18-3/4"', 'pressure' => '15000'],
          ['size' => '20-3/4"', 'pressure' => '2000'],
          ['size' => '20-3/4"', 'pressure' => '3000'],
          ['size' => '20-3/4"', 'pressure' => '5000'],
          ['size' => '21-1/4"', 'pressure' => '2000'],
          ['size' => '21-1/4"', 'pressure' => '3000'],
          ['size' => '21-1/4"', 'pressure' => '5000'],
          ['size' => '29-1/2"', 'pressure' => '500'],
      ];

      // ** SINGLE RAM Conditions **
      $singConditions = [
          ['size' => '6"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '2000'],
          ['size' => '7-1/16"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '5000'],
          ['size' => '7-1/16"', 'pressure' => '10000'],
          ['size' => '7-1/16"', 'pressure' => '15000'],
          ['size' => '11"', 'pressure' => '2000'],
          ['size' => '11"', 'pressure' => '3000'],
          ['size' => '11"', 'pressure' => '5000'],
          ['size' => '11"', 'pressure' => '10000'],
          ['size' => '11"', 'pressure' => '15000'],
          ['size' => '13-5/8"', 'pressure' => '2000'],
          ['size' => '13-5/8"', 'pressure' => '3000'],
          ['size' => '13-5/8"', 'pressure' => '5000'],
          ['size' => '13-5/8"', 'pressure' => '10000'],
          ['size' => '13-5/8"', 'pressure' => '15000'],
          ['size' => '16-3/4"', 'pressure' => '2000'],
          ['size' => '16-3/4"', 'pressure' => '3000'],
          ['size' => '16-3/4"', 'pressure' => '5000'],
          ['size' => '16-3/4"', 'pressure' => '10000'],
          ['size' => '16-3/4"', 'pressure' => '15000'],
          ['size' => '18-3/4"', 'pressure' => '2000'],
          ['size' => '18-3/4"', 'pressure' => '3000'],
          ['size' => '18-3/4"', 'pressure' => '5000'],
          ['size' => '18-3/4"', 'pressure' => '10000'],
          ['size' => '18-3/4"', 'pressure' => '15000'],
          ['size' => '20-3/4"', 'pressure' => '2000'],
          ['size' => '20-3/4"', 'pressure' => '3000'],
          ['size' => '20-3/4"', 'pressure' => '5000'],
          ['size' => '21-1/4"', 'pressure' => '2000'],
          ['size' => '21-1/4"', 'pressure' => '3000'],
          ['size' => '21-1/4"', 'pressure' => '5000'],
          ['size' => '29-1/2"', 'pressure' => '500'],
      ];

      // ** SINGLE RAM SHEAR Conditions **
      $singshConditions = [
          ['size' => '6"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '2000'],
          ['size' => '7-1/16"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '5000'],
          ['size' => '7-1/16"', 'pressure' => '10000'],
          ['size' => '7-1/16"', 'pressure' => '15000'],
          ['size' => '11"', 'pressure' => '2000'],
          ['size' => '11"', 'pressure' => '3000'],
          ['size' => '11"', 'pressure' => '5000'],
          ['size' => '11"', 'pressure' => '10000'],
          ['size' => '11"', 'pressure' => '15000'],
          ['size' => '13-5/8"', 'pressure' => '2000'],
          ['size' => '13-5/8"', 'pressure' => '3000'],
          ['size' => '13-5/8"', 'pressure' => '5000'],
          ['size' => '13-5/8"', 'pressure' => '10000'],
          ['size' => '13-5/8"', 'pressure' => '15000'],
          ['size' => '16-3/4"', 'pressure' => '2000'],
          ['size' => '16-3/4"', 'pressure' => '3000'],
          ['size' => '16-3/4"', 'pressure' => '5000'],
          ['size' => '16-3/4"', 'pressure' => '10000'],
          ['size' => '16-3/4"', 'pressure' => '15000'],
          ['size' => '18-3/4"', 'pressure' => '2000'],
          ['size' => '18-3/4"', 'pressure' => '3000'],
          ['size' => '18-3/4"', 'pressure' => '5000'],
          ['size' => '18-3/4"', 'pressure' => '10000'],
          ['size' => '18-3/4"', 'pressure' => '15000'],
          ['size' => '20-3/4"', 'pressure' => '2000'],
          ['size' => '20-3/4"', 'pressure' => '3000'],
          ['size' => '20-3/4"', 'pressure' => '5000'],
          ['size' => '21-1/4"', 'pressure' => '2000'],
          ['size' => '21-1/4"', 'pressure' => '3000'],
          ['size' => '21-1/4"', 'pressure' => '5000'],
          ['size' => '29-1/2"', 'pressure' => '500'],
      ];

      // ** DOUBLE RAM Conditions **
      $dobConditions = [
          ['size' => '6"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '2000'],
          ['size' => '7-1/16"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '5000'],
          ['size' => '7-1/16"', 'pressure' => '10000'],
          ['size' => '7-1/16"', 'pressure' => '15000'],
          ['size' => '11"', 'pressure' => '2000'],
          ['size' => '11"', 'pressure' => '3000'],
          ['size' => '11"', 'pressure' => '5000'],
          ['size' => '11"', 'pressure' => '10000'],
          ['size' => '11"', 'pressure' => '15000'],
          ['size' => '13-5/8"', 'pressure' => '2000'],
          ['size' => '13-5/8"', 'pressure' => '3000'],
          ['size' => '13-5/8"', 'pressure' => '5000'],
          ['size' => '13-5/8"', 'pressure' => '10000'],
          ['size' => '13-5/8"', 'pressure' => '15000'],
          ['size' => '16-3/4"', 'pressure' => '2000'],
          ['size' => '16-3/4"', 'pressure' => '3000'],
          ['size' => '16-3/4"', 'pressure' => '5000'],
          ['size' => '16-3/4"', 'pressure' => '10000'],
          ['size' => '16-3/4"', 'pressure' => '15000'],
          ['size' => '18-3/4"', 'pressure' => '2000'],
          ['size' => '18-3/4"', 'pressure' => '3000'],
          ['size' => '18-3/4"', 'pressure' => '5000'],
          ['size' => '18-3/4"', 'pressure' => '10000'],
          ['size' => '18-3/4"', 'pressure' => '15000'],
          ['size' => '20-3/4"', 'pressure' => '2000'],
          ['size' => '20-3/4"', 'pressure' => '3000'],
          ['size' => '20-3/4"', 'pressure' => '5000'],
          ['size' => '21-1/4"', 'pressure' => '2000'],
          ['size' => '21-1/4"', 'pressure' => '3000'],
          ['size' => '21-1/4"', 'pressure' => '5000'],
          ['size' => '29-1/2"', 'pressure' => '500'],
      ];

      // ** DOUBLE RAM SHEAR Conditions **
      $dobshConditions = [
          ['size' => '6"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '2000'],
          ['size' => '7-1/16"', 'pressure' => '3000'],
          ['size' => '7-1/16"', 'pressure' => '5000'],
          ['size' => '7-1/16"', 'pressure' => '10000'],
          ['size' => '7-1/16"', 'pressure' => '15000'],
          ['size' => '11"', 'pressure' => '2000'],
          ['size' => '11"', 'pressure' => '3000'],
          ['size' => '11"', 'pressure' => '5000'],
          ['size' => '11"', 'pressure' => '10000'],
          ['size' => '11"', 'pressure' => '15000'],
          ['size' => '13-5/8"', 'pressure' => '2000'],
          ['size' => '13-5/8"', 'pressure' => '3000'],
          ['size' => '13-5/8"', 'pressure' => '5000'],
          ['size' => '13-5/8"', 'pressure' => '10000'],
          ['size' => '13-5/8"', 'pressure' => '15000'],
          ['size' => '16-3/4"', 'pressure' => '2000'],
          ['size' => '16-3/4"', 'pressure' => '3000'],
          ['size' => '16-3/4"', 'pressure' => '5000'],
          ['size' => '16-3/4"', 'pressure' => '10000'],
          ['size' => '16-3/4"', 'pressure' => '15000'],
          ['size' => '18-3/4"', 'pressure' => '2000'],
          ['size' => '18-3/4"', 'pressure' => '3000'],
          ['size' => '18-3/4"', 'pressure' => '5000'],
          ['size' => '18-3/4"', 'pressure' => '10000'],
          ['size' => '18-3/4"', 'pressure' => '15000'],
          ['size' => '20-3/4"', 'pressure' => '2000'],
          ['size' => '20-3/4"', 'pressure' => '3000'],
          ['size' => '20-3/4"', 'pressure' => '5000'],
          ['size' => '21-1/4"', 'pressure' => '2000'],
          ['size' => '21-1/4"', 'pressure' => '3000'],
          ['size' => '21-1/4"', 'pressure' => '5000'],
          ['size' => '29-1/2"', 'pressure' => '500'],
      ];

      // Get the counts for each BOP type
      $annCounts = getBopCounts($pdo, 'ANNULAR', $annConditions);
      $singCounts = getBopCounts($pdo, 'SINGLE RAM', $singConditions);
      $singshCounts = getBopCounts($pdo, 'SINGLE RAM-(SHEAR)', $singshConditions);
      $dobCounts = getBopCounts($pdo, 'DOUBLE RAM', $dobConditions);
      $dobshCounts = getBopCounts($pdo, 'DOUBLE RAM-(SHEAR)', $dobshConditions);

  } catch (PDOException $e) {
      error_log('Database Error: ' . $e->getMessage());
      echo 'An error occurred. Please try again later.';
  }
  ?>

  <!-- JUMLAH BOP -->
  <div class="container dashboard-section">
    <div class="col">
      <div class="card dashboard-card text-center mb-0" style="width: 100%; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); padding: 5px 5px;">
        <div class="d-flex justify-content-center align-items-center mt-0">
          <h5 class="text text-center mb-0" style="font-size: 1rem; font-weight: bold;">TOTAL UNIT:</h5>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-0">
          <h5 class="count-box text-danger mb-0" style="font-size: 4rem; font-weight: bold;"><?php echo $total_bop; ?></h5>
        </div>
        <div class="button-container mt-2 mb-2">
              <a href="page-astbopfinput.php" type="button" class="btn btn-success" style="width: 100%; font-weight: bold;">
                <i class="fa fa-plus-square me-2" aria-hidden="true"></i>Input Data
              </a>
          <a href="page-astbopdtb.php" type="button" class="btn btn-warning" style="width: 100%; font-weight: bold;">
            <i class="fa fa-database me-2" aria-hidden="true"></i>Database
          </a>
          <a href="page-astbopstat.php" type="button" class="btn text-white" style="background-color: #0dcaf0; width: 100%; font-weight: bold;">
            <i class="fa fa-pie-chart me-2" aria-hidden="true"></i>Status
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container dashboard-section">
    <div class="row">

      <!-- Card 1 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $annular; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $annularCounts[$annular]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#annularModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $sram; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $sramCounts[$sram]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#sramModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $sramsh; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $sramshCounts[$sramsh]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#sramshModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $dram; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $dramCounts[$dram]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#dramModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $dramsh; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $dramshCounts[$dramsh]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#dramshModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mt-3 dashboard-card text-center" style="background-color: black; width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title text-white mb-0" style="font-size: 0.9rem; font-weight: bold;">N/A</p>
            <p class="card-text text-white mb-0" style="font-size: 2rem; font-weight: bold;">N/A</p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mt-3 dashboard-card text-center" style="background-color: black; width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title text-white mb-0" style="font-size: 0.9rem; font-weight: bold;">N/A</p>
            <p class="card-text text-white mb-0" style="font-size: 2rem; font-weight: bold;">N/A</p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mt-3 dashboard-card text-center" style="background-color: black; width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title text-white mb-0" style="font-size: 0.9rem; font-weight: bold;">N/A</p>
            <p class="card-text text-white mb-0" style="font-size: 2rem; font-weight: bold;">N/A</p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Annular Modal -->
  <div class="modal fade" id="annularModal" tabindex="-1" aria-labelledby="annularModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="annularModalLabel">ANNULAR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($annCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Ukuran & Tekanan</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($annCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#anndetailModal" 
                                              data-size="<?= htmlspecialchars(explode(' ', $count['title'])[0], ENT_QUOTES); ?>" 
                                              data-pressure="<?= htmlspecialchars(explode(' ', $count['title'])[1], ENT_QUOTES); ?>"
                                              data-jenisbop="ANNULAR">
                                              <?= $count['count']; ?>
                                          </button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php else : ?>
                      <p>No data found.</p>
                  <?php endif; ?>
              </div>
          </div>
        </div>
      </div>
  </div>
  
  <?php if ($user_role == 'admin' || $user_role == 'asset' || $user_role == 'maintenance' || $user_role == 'operation') : ?>
  <div class="modal fade" id="anndetailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="anndetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="anndetailContent">
                      <!-- Details will be loaded here -->
                      <p>Loading...</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php elseif ($user_role == 'guest') : ?>
  <?php endif; ?>
  
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all detail buttons
        const detailButtons = document.querySelectorAll(".detail-btn");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Get the size and pressure from the clicked button
                const size = this.getAttribute("data-size");
                const pressure = this.getAttribute("data-pressure");

                // Update the modal title
                const anndetailModalLabel = document.getElementById("anndetailModalLabel");
                anndetailModalLabel.textContent = `ANNULAR ${size} ${pressure}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const size = this.getAttribute('data-size');
            const pressure = this.getAttribute('data-pressure');
            const jenisBop = this.getAttribute('data-jenisbop');
            const modalContent = document.getElementById('anndetailContent');
            const user_role = "<?php echo $_SESSION['user_role']; ?>";

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            fetch(`fct-astbopdsb.php?size=${size}&pressure=${pressure}&jenis_bop=${jenisBop}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                    // Create a table or list to display the data
                        let html = `
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Lokasi</th>
                                            <th>Letak</th>
                                            <th>Serial</th>
                                            <th>Movable</th>
                                            <th>Manufaktur</th>
                                            <th>Status Unit</th>
                                            <th>Nomor COC</th>
                                            <th>Masa COC</th>
                                            <th>Status COC</th>
                                            <th>Dokumen COC</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_bop}</td>
                                    <td>${row.no_mov}</td>
                                    <td>${row.man}</td>
                                    <td>${row.status_unit}</td>
                                    <td>${row.no_coc}</td>
                                    <td>${row.akhir_coc}</td>
                                    <td>${row.status_coc}</td>
                                    <td>
                                        ${
                                            row.file_coc 
                                            ? (user_role == 'admin' || user_role == 'asset' || user_role == 'maintenance' 
                                                ? `<a href="${row.file_coc}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                   <a href="${row.file_coc}" download class="btn btn-danger btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>`
                                                : `<span>Akses dibatasi</span>`)
                                            : `<span>Tidak ada file</span>`
                                        }
                                    </td>
                                </tr>`;
                        });
                        html += `
                                    </tbody>
                                </table>
                            </div>`;
                        modalContent.innerHTML = html;
                    } else {
                        modalContent.innerHTML = '<p>No data available for the selected criteria.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    modalContent.innerHTML = '<p>Failed to load data.</p>';
                });
        });
    });
  </script>

  <!-- Single Ram Modal -->
  <div class="modal fade" id="sramModal" tabindex="-1" aria-labelledby="sramModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sramModalLabel">SINGLE RAM</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($singCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Ukuran & Tekanan</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($singCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#sramdetailModal" 
                                              data-size="<?= htmlspecialchars(explode(' ', $count['title'])[0], ENT_QUOTES); ?>" 
                                              data-pressure="<?= htmlspecialchars(explode(' ', $count['title'])[1], ENT_QUOTES); ?>"
                                              data-jenisbop="SINGLE RAM">
                                              <?= $count['count']; ?>
                                          </button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php else : ?>
                      <p>No data found.</p>
                  <?php endif; ?>
              </div>
          </div>
        </div>
      </div>
  </div>
  
  <?php if ($user_role == 'admin' || $user_role == 'asset' || $user_role == 'maintenance' || $user_role == 'operation') : ?>
  <div class="modal fade" id="sramdetailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="sramdetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="sramdetailContent">
                      <!-- Details will be loaded here -->
                      <p>Loading...</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php elseif ($user_role == 'guest') : ?>
  <?php endif; ?>
  
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all detail buttons
        const detailButtons = document.querySelectorAll(".detail-btn");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Get the size and pressure from the clicked button
                const size = this.getAttribute("data-size");
                const pressure = this.getAttribute("data-pressure");

                // Update the modal title
                const sramdetailModalLabel = document.getElementById("sramdetailModalLabel");
                sramdetailModalLabel.textContent = `SINGLE RAM ${size} ${pressure}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const size = this.getAttribute('data-size');
            const pressure = this.getAttribute('data-pressure');
            const jenisBop = this.getAttribute('data-jenisbop');
            const modalContent = document.getElementById('sramdetailContent');
            const user_role = "<?php echo $_SESSION['user_role']; ?>";

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            fetch(`fct-astbopdsb.php?size=${size}&pressure=${pressure}&jenis_bop=${jenisBop}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                    // Create a table or list to display the data
                        let html = `
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Lokasi</th>
                                            <th>Letak</th>
                                            <th>Serial</th>
                                            <th>Movable</th>
                                            <th>Manufaktur</th>
                                            <th>Status Unit</th>
                                            <th>Nomor COC</th>
                                            <th>Masa COC</th>
                                            <th>Status COC</th>
                                            <th>Dokumen COC</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_bop}</td>
                                    <td>${row.no_mov}</td>
                                    <td>${row.man}</td>
                                    <td>${row.status_unit}</td>
                                    <td>${row.no_coc}</td>
                                    <td>${row.akhir_coc}</td>
                                    <td>${row.status_coc}</td>
                                    <td>
                                        ${
                                            row.file_coc 
                                            ? (user_role == 'admin' || user_role == 'asset' || user_role == 'maintenance' 
                                                ? `<a href="${row.file_coc}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                   <a href="${row.file_coc}" download class="btn btn-danger btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>`
                                                : `<span>Akses dibatasi</span>`)
                                            : `<span>Tidak ada file</span>`
                                        }
                                    </td>
                                </tr>`;
                        });
                        html += `
                                    </tbody>
                                </table>
                            </div>`;
                        modalContent.innerHTML = html;
                    } else {
                        modalContent.innerHTML = '<p>No data available for the selected criteria.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    modalContent.innerHTML = '<p>Failed to load data.</p>';
                });
        });
    });
  </script>

  <!-- Single Ram Shear Modal -->
  <div class="modal fade" id="sramshModal" tabindex="-1" aria-labelledby="sramshModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sramModalLabel">SINGLE RAM (SHEAR)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($singshCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Ukuran & Tekanan</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($singshCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#sramshdetailModal" 
                                              data-size="<?= htmlspecialchars(explode(' ', $count['title'])[0], ENT_QUOTES); ?>" 
                                              data-pressure="<?= htmlspecialchars(explode(' ', $count['title'])[1], ENT_QUOTES); ?>"
                                              data-jenisbop="SINGLE RAM-(SHEAR)">
                                              <?= $count['count']; ?>
                                          </button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php else : ?>
                      <p>No data found.</p>
                  <?php endif; ?>
              </div>
          </div>
        </div>
      </div>
  </div>
  
  <?php if ($user_role == 'admin' || $user_role == 'asset' || $user_role == 'maintenance' || $user_role == 'operation') : ?>
  <div class="modal fade" id="sramshdetailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="sramshdetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="sramshdetailContent">
                      <!-- Details will be loaded here -->
                      <p>Loading...</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php elseif ($user_role == 'guest') : ?>
  <?php endif; ?>
  
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all detail buttons
        const detailButtons = document.querySelectorAll(".detail-btn");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Get the size and pressure from the clicked button
                const size = this.getAttribute("data-size");
                const pressure = this.getAttribute("data-pressure");

                // Update the modal title
                const sramshdetailModalLabel = document.getElementById("sramshdetailModalLabel");
                sramshdetailModalLabel.textContent = `SINGLE RAM (SHEAR) ${size} ${pressure}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const size = this.getAttribute('data-size');
            const pressure = this.getAttribute('data-pressure');
            const jenisBop = this.getAttribute('data-jenisbop');
            const modalContent = document.getElementById('sramshdetailContent');
            const user_role = "<?php echo $_SESSION['user_role']; ?>";

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            fetch(`fct-astbopdsb.php?size=${size}&pressure=${pressure}&jenis_bop=${jenisBop}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                    // Create a table or list to display the data
                        let html = `
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Lokasi</th>
                                            <th>Letak</th>
                                            <th>Serial</th>
                                            <th>Movable</th>
                                            <th>Manufaktur</th>
                                            <th>Status Unit</th>
                                            <th>Nomor COC</th>
                                            <th>Masa COC</th>
                                            <th>Status COC</th>
                                            <th>Dokumen COC</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_bop}</td>
                                    <td>${row.no_mov}</td>
                                    <td>${row.man}</td>
                                    <td>${row.status_unit}</td>
                                    <td>${row.no_coc}</td>
                                    <td>${row.akhir_coc}</td>
                                    <td>${row.status_coc}</td>
                                    <td>
                                        ${
                                            row.file_coc 
                                            ? (user_role == 'admin' || user_role == 'asset' || user_role == 'maintenance' 
                                                ? `<a href="${row.file_coc}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                   <a href="${row.file_coc}" download class="btn btn-danger btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>`
                                                : `<span>Akses dibatasi</span>`)
                                            : `<span>Tidak ada file</span>`
                                        }
                                    </td>
                                </tr>`;
                        });
                        html += `
                                    </tbody>
                                </table>
                            </div>`;
                        modalContent.innerHTML = html;
                    } else {
                        modalContent.innerHTML = '<p>No data available for the selected criteria.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    modalContent.innerHTML = '<p>Failed to load data.</p>';
                });
        });
    });
  </script>

  <!-- Double Ram Modal -->
  <div class="modal fade" id="dramModal" tabindex="-1" aria-labelledby="dramModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="dramModalLabel">DOUBLE RAM</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($dobCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Ukuran & Tekanan</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($dobCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#dramdetailModal" 
                                              data-size="<?= htmlspecialchars(explode(' ', $count['title'])[0], ENT_QUOTES); ?>" 
                                              data-pressure="<?= htmlspecialchars(explode(' ', $count['title'])[1], ENT_QUOTES); ?>"
                                              data-jenisbop="DOUBLE RAM">
                                              <?= $count['count']; ?>
                                          </button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php else : ?>
                      <p>No data found.</p>
                  <?php endif; ?>
              </div>
          </div>
        </div>
      </div>
  </div>
  
  <?php if ($user_role == 'admin' || $user_role == 'asset' || $user_role == 'maintenance' || $user_role == 'operation') : ?>
  <div class="modal fade" id="dramdetailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="dramdetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="dramdetailContent">
                      <!-- Details will be loaded here -->
                      <p>Loading...</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php elseif ($user_role == 'guest') : ?>
  <?php endif; ?>
  
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all detail buttons
        const detailButtons = document.querySelectorAll(".detail-btn");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Get the size and pressure from the clicked button
                const size = this.getAttribute("data-size");
                const pressure = this.getAttribute("data-pressure");

                // Update the modal title
                const dramdetailModalLabel = document.getElementById("dramdetailModalLabel");
                dramdetailModalLabel.textContent = `DOUBLE RAM ${size} ${pressure}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const size = this.getAttribute('data-size');
            const pressure = this.getAttribute('data-pressure');
            const jenisBop = this.getAttribute('data-jenisbop');
            const modalContent = document.getElementById('dramdetailContent');
            const user_role = "<?php echo $_SESSION['user_role']; ?>";

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            fetch(`fct-astbopdsb.php?size=${size}&pressure=${pressure}&jenis_bop=${jenisBop}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                    // Create a table or list to display the data
                        let html = `
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Lokasi</th>
                                            <th>Letak</th>
                                            <th>Serial</th>
                                            <th>Movable</th>
                                            <th>Manufaktur</th>
                                            <th>Status Unit</th>
                                            <th>Nomor COC</th>
                                            <th>Masa COC</th>
                                            <th>Status COC</th>
                                            <th>Dokumen COC</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_bop}</td>
                                    <td>${row.no_mov}</td>
                                    <td>${row.man}</td>
                                    <td>${row.status_unit}</td>
                                    <td>${row.no_coc}</td>
                                    <td>${row.akhir_coc}</td>
                                    <td>${row.status_coc}</td>
                                    <td>
                                        ${
                                            row.file_coc 
                                            ? (user_role == 'admin' || user_role == 'asset' || user_role == 'maintenance' 
                                                ? `<a href="${row.file_coc}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                   <a href="${row.file_coc}" download class="btn btn-danger btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>`
                                                : `<span>Akses dibatasi</span>`)
                                            : `<span>Tidak ada file</span>`
                                        }
                                    </td>
                                </tr>`;
                        });
                        html += `
                                    </tbody>
                                </table>
                            </div>`;
                        modalContent.innerHTML = html;
                    } else {
                        modalContent.innerHTML = '<p>No data available for the selected criteria.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    modalContent.innerHTML = '<p>Failed to load data.</p>';
                });
        });
    });
  </script>

  <!-- Double Ram Shear Modal -->
  <div class="modal fade" id="dramshModal" tabindex="-1" aria-labelledby="dramshModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="dramModalLabel">DOUBLE RAM - (SHEAR)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($dobshCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Ukuran & Tekanan</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($dobshCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#dramshdetailModal" 
                                              data-size="<?= htmlspecialchars(explode(' ', $count['title'])[0], ENT_QUOTES); ?>" 
                                              data-pressure="<?= htmlspecialchars(explode(' ', $count['title'])[1], ENT_QUOTES); ?>"
                                              data-jenisbop="DOUBLE RAM-(SHEAR)">
                                              <?= $count['count']; ?>
                                          </button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php else : ?>
                      <p>No data found.</p>
                  <?php endif; ?>
              </div>
          </div>
        </div>
      </div>
  </div>
  
  <?php if ($user_role == 'admin' || $user_role == 'asset' || $user_role == 'maintenance' || $user_role == 'operation') : ?>
  <div class="modal fade" id="dramshdetailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="dramshdetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="dramshdetailContent">
                      <!-- Details will be loaded here -->
                      <p>Loading...</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php elseif ($user_role == 'guest') : ?>
  <?php endif; ?>
  
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all detail buttons
        const detailButtons = document.querySelectorAll(".detail-btn");

        detailButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Get the size and pressure from the clicked button
                const size = this.getAttribute("data-size");
                const pressure = this.getAttribute("data-pressure");

                // Update the modal title
                const dramshdetailModalLabel = document.getElementById("dramshdetailModalLabel");
                dramshdetailModalLabel.textContent = `DOUBLE RAM (SHEAR) ${size} ${pressure}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const size = this.getAttribute('data-size');
            const pressure = this.getAttribute('data-pressure');
            const jenisBop = this.getAttribute('data-jenisbop');
            const modalContent = document.getElementById('dramshdetailContent');
            const user_role = "<?php echo $_SESSION['user_role']; ?>";

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            fetch(`fct-astbopdsb.php?size=${size}&pressure=${pressure}&jenis_bop=${jenisBop}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                    // Create a table or list to display the data
                        let html = `
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Lokasi</th>
                                            <th>Letak</th>
                                            <th>Serial</th>
                                            <th>Movable</th>
                                            <th>Manufaktur</th>
                                            <th>Status Unit</th>
                                            <th>Nomor COC</th>
                                            <th>Masa COC</th>
                                            <th>Status COC</th>
                                            <th>Dokumen COC</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_bop}</td>
                                    <td>${row.no_mov}</td>
                                    <td>${row.man}</td>
                                    <td>${row.status_unit}</td>
                                    <td>${row.no_coc}</td>
                                    <td>${row.akhir_coc}</td>
                                    <td>${row.status_coc}</td>
                                    <td>
                                        ${
                                            row.file_coc 
                                            ? (user_role == 'admin' || user_role == 'asset' || user_role == 'maintenance' 
                                                ? `<a href="${row.file_coc}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                   <a href="${row.file_coc}" download class="btn btn-danger btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>`
                                                : `<span>Akses dibatasi</span>`)
                                            : `<span>Tidak ada file</span>`
                                        }
                                    </td>
                                </tr>`;
                        });
                        html += `
                                    </tbody>
                                </table>
                            </div>`;
                        modalContent.innerHTML = html;
                    } else {
                        modalContent.innerHTML = '<p>No data available for the selected criteria.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    modalContent.innerHTML = '<p>Failed to load data.</p>';
                });
        });
    });
  </script>
  
  <script>
        setInterval(() => {
            fetch('pcs-akun-heartbeat.php');
        }, 30000); // Sends ping every 1 minute
  </script>

</body>

</html>
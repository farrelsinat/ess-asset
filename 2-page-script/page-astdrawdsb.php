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

  <title>ESS | DRAWWORKS Dashboard</title>

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
      <a class="navbar-brand text-white">DASHBOARD - DRAWWORKS</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

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
  $jawas = ['JAWA'];
  $sbss = ['SBS'];
  $janaros = ['JANARO'];
  $ktis = ['KTI'];
  $offshores = ['OFF SHORE'];

  $jawaCounts = [];
  $sbsCounts = [];
  $janaroCounts = [];
  $ktiCounts = [];
  $offshoreCounts = [];

  foreach ($jawas as $jawa) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasildraw 
              WHERE rig_operation = '$jawa'";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $jawaCounts[$jawa] = $row['total'] ?? 0; // Default to 0 if no result
  }

  foreach ($sbss as $sbs) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasildraw 
              WHERE rig_operation = '$sbs'";      
 
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $sbsCounts[$sbs] = $row['total'] ?? 0; // Default to 0 if no result
  }

  foreach ($janaros as $janaro) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasildraw 
              WHERE rig_operation = '$janaro'";      
  
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $janaroCounts[$janaro] = $row['total'] ?? 0; // Default to 0 if no result
  }

  foreach ($ktis as $kti) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasildraw 
              WHERE rig_operation = '$kti'";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $ktiCounts[$kti] = $row['total'] ?? 0; // Default to 0 if no result
  }
  
  foreach ($offshores as $offshore) {
      $sql = "SELECT COUNT(*) AS total FROM tb_dbhasildraw 
              WHERE rig_operation = '$offshore'";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Fetch the count from the result
      $row = $result->fetch_assoc();
      $offshoreCounts[$offshore] = $row['total'] ?? 0; // Default to 0 if no result
  }

  ?>
  
  <?php
$host = 'localhost';
$dbname = 'u597806360_db_dw';
$username = 'u597806360_asset_dw';
$password = 'AsT-PdsI#2025_dW';

try {
    // Database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function getDrawCounts($pdo, $rigopr, $rigyards) {
        // Create named placeholders for each rig_yard
        $placeholders = [];
        $params = [':rig_operation' => $rigopr];

        foreach ($rigyards as $index => $rigyard) {
            $key = ":rigyard" . $index;
            $placeholders[] = $key;
            $params[$key] = $rigyard;
        }

        // Construct the SQL query
        $sql = "SELECT rig_operation, rig_yard, COUNT(*) AS total_count 
                FROM tb_dbhasildraw 
                WHERE rig_operation = :rig_operation
                AND rig_yard IN (" . implode(",", $placeholders) . ") 
                GROUP BY rig_yard";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Organize the result counts
        $counts = [];
        foreach ($results as $result) {
            $counts[] = [
                'title' => $result['rig_yard'],
                'count' => $result['total_count']
            ];
        }
        return $counts;
    }

    // Define size conditions for each category
    $jawaRigyards = ["PDSI #08.1/H40D-M", "PDSI #09.2/N80UE-E", "PDSI #12.3/N110-M", "PDSI #13.1/H40D-M", "PDSI #15.3/N110-M", "PDSI #28.2/D1000-E", "PDSI #31.3/D1500-E", "PDSI #38.2/D1000-E", "PDSI #40.4/DS2000-E", "WS MUNDU", "YARD BONGAS", "YARD KAPETAKAN", "IDTC"];
    $sbsRigyards = ["PDSI #01.2/N80B-M", "PDSI #05.2/OW760-M", "PDSI #07.1/PD350-M", "PDSI #16.2/NT45-M", "PDSI #18.2/LTO650-M", "PDSI #20.2/EMSCOD2-M", "PDSI #23.1/CWKT650-M", "PDSI #24.1/CWKT210-M", "PDSI #25.2/LTO750-M", "PDSI #26.1/H25CD-M", "PDSI #29.3/D1500-E/53", "PDSI #30.2/D1000-E", "PDSI #33.1/IDECO/H35-M", "PDSI #34.1/IDECO/H35-M", "PDSI #36.1/SKYTOP650-M", "PDSI #39.3/D1500-E/57", "PDSI #41.3/N110UE-E", "PDSI #44.1/PD350-M", "PDSI #45.1/PD350-M", "PML SBS", "STAGING AREA TLJ-207", "STAGING ARE TLJ-216"];
    $janaroRigyards = ["PDSI #17.2/NT45-M", "PDSI #19.1/LTO350-M", "PDSI #35.1/IDECO/H35-M", "PDSI #42.3/N1500-E", "PDSI #46.1/PD350-M", "PDSI #49.2/PD550-M", "PDSI #50.2/PD550-M", "PDSI #51.2/PD550-M", "PDSI #52.2/PD550-M", "PDSI #53.2/ZJ750-M", "PDSI #54.2/ZJ750-M", "YARD DURI", "YARD KENALI ASAM JAMBI", "YARD RANTAU"];
    $ktiRigyards = ["PDSI #04.3/N110-M", "PDSI #10.2/D700-M", "PDSI #11.2/N80B-M", "PDSI #21.2/OW700-M", "PDSI #22.2/OW700-M", "PDSI #32.2/N80UE-E", "PDSI #43.3/AB1500-E"];
    $offshoreRigyards = ["PDSI #47.2/PD550-M", "PDSI #48.2/PD550-M"];

    // Fetch counts for each category
    $jawCounts = getDrawCounts($pdo, 'JAWA', $jawaRigyards);
    $sbCounts = getDrawCounts($pdo, 'SBS', $sbsRigyards);
    $janarCounts = getDrawCounts($pdo, 'JANARO', $janaroRigyards);
    $ktCounts = getDrawCounts($pdo, 'KTI', $ktiRigyards);
    $offshorCounts = getDrawCounts($pdo, 'OFF SHORE', $offshoreRigyards);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
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
          <h5 class="count-box text-danger mb-0" style="font-size: 4rem; font-weight: bold;"><?php echo $total_draw; ?></h5>
        </div>
        <div class="button-container mt-2 mb-2">
              <a href="page-astdrawfinput.php" type="button" class="btn btn-success" style="width: 100%; font-weight: bold;">
                <i class="fa fa-plus-square me-2" aria-hidden="true"></i>Input Data
              </a>
          <a href="page-astdrawdtb.php" type="button" class="btn btn-warning" style="width: 100%; font-weight: bold;">
            <i class="fa fa-database me-2" aria-hidden="true"></i>Database
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
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $jawa; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $jawaCounts[$jawa]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#jawaModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $sbs; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $sbsCounts[$sbs]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#sbsModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $janaro; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $janaroCounts[$janaro]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#janaroModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $kti; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $ktiCounts[$kti]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#ktiModal"><strong>Detail</strong></a>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-3">
        <div class="card mt-3 dashboard-card text-center" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 15px;">
          <div class="card-body">
            <p class="card-title mb-0" style="font-size: 0.9rem; font-weight: bold;"><?php echo $offshore; ?></p>
            <p class="card-text text-success mb-0" style="font-size: 2rem; font-weight: bold;"><?php echo $offshoreCounts[$offshore]; ?></p>
            <a href="#" class="btn btn-primary mt-0" style="color: white;" data-bs-toggle="modal" data-bs-target="#offshoreModal"><strong>Detail</strong></a>
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

  <!-- Jawa Modal -->
  <div class="modal fade" id="jawaModal" tabindex="-1" aria-labelledby="jawaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="jawaModalLabel">JAWA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($jawCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Letak</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($jawCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#jawadetailModal" 
                                              data-rigyard="<?= htmlspecialchars($count['title'], ENT_QUOTES); ?>"
                                              data-rigopr="JAWA">
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
  <div class="modal fade" id="jawadetailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="jawadetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="jawadetailContent">
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
                const rig_yard = this.getAttribute("data-rigyard");

                // Update the modal title
                const jawadetailModalLabel = document.getElementById("jawadetailModalLabel");
                jawadetailModalLabel.textContent = `JAWA - ${rig_yard}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const rig_yard = this.getAttribute('data-rigyard');
            const rig_operation = this.getAttribute('data-rigopr');
            const modalContent = document.getElementById('jawadetailContent');

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            const encodedRigYard = encodeURIComponent(rig_yard);
            fetch(`fct-astdrawdsb.php?rig_yard=${encodedRigYard}&rig_operation=${rig_operation}`)
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
                                            <th>Manufaktur</th>
                                            <th>Tipe</th>
                                            <th>Legacy</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_dw}</td>
                                    <td>${row.man}</td>
                                    <td>${row.type}</td>
                                    <td>${row.legacy}</td>
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

  <!-- SBS Modal -->
  <div class="modal fade" id="sbsModal" tabindex="-1" aria-labelledby="sbsModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sbsModalLabel">SBS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($sbCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Letak</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($sbCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#sbsdetailModal" 
                                              data-rigyard="<?= htmlspecialchars($count['title'], ENT_QUOTES); ?>"
                                              data-rigopr="SBS">
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
  <div class="modal fade" id="sbsdetailModal" tabindex="-1" aria-labelledby="sbsModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="sbsdetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="sbsdetailContent">
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
                const rig_yard = this.getAttribute("data-rigyard");

                // Update the modal title
                const sbsdetailModalLabel = document.getElementById("sbsdetailModalLabel");
                sbsdetailModalLabel.textContent = `SBS - ${rig_yard}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const rig_yard = this.getAttribute('data-rigyard');
            const rig_operation = this.getAttribute('data-rigopr');
            const modalContent = document.getElementById('sbsdetailContent');

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            const encodedRigYard = encodeURIComponent(rig_yard);
            fetch(`fct-astdrawdsb.php?rig_yard=${encodedRigYard}&rig_operation=${rig_operation}`)
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
                                            <th>Manufaktur</th>
                                            <th>Tipe</th>
                                            <th>Legacy</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_dw}</td>
                                    <td>${row.man}</td>
                                    <td>${row.type}</td>
                                    <td>${row.legacy}</td>
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

  <!-- JANARO Modal -->
  <div class="modal fade" id="janaroModal" tabindex="-1" aria-labelledby="janaroModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="janaroModalLabel">JANARO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($janarCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Letak</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($janarCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#janarodetailModal"
                                              data-rigyard="<?= htmlspecialchars($count['title'], ENT_QUOTES); ?>"
                                              data-rigopr="JANARO">
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
  <div class="modal fade" id="janarodetailModal" tabindex="-1" aria-labelledby="janaroModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="janarodetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="janarodetailContent">
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
                const rig_yard = this.getAttribute("data-rigyard");

                // Update the modal title
                const janarodetailModalLabel = document.getElementById("janarodetailModalLabel");
                janarodetailModalLabel.textContent = `JANARO - ${rig_yard}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const rig_yard = this.getAttribute('data-rigyard');
            const rig_operation = this.getAttribute('data-rigopr');
            const modalContent = document.getElementById('janarodetailContent');

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            const encodedRigYard = encodeURIComponent(rig_yard);
            fetch(`fct-astdrawdsb.php?rig_yard=${encodedRigYard}&rig_operation=${rig_operation}`)
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
                                            <th>Manufaktur</th>
                                            <th>Tipe</th>
                                            <th>Legacy</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_dw}</td>
                                    <td>${row.man}</td>
                                    <td>${row.type}</td>
                                    <td>${row.legacy}</td>
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

  <!-- KTI Modal -->
  <div class="modal fade" id="ktiModal" tabindex="-1" aria-labelledby="ktiModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ktiModalLabel">KTI</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($ktCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Letak</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($ktCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#ktidetailModal" 
                                              data-rigyard="<?= htmlspecialchars($count['title'], ENT_QUOTES); ?>"
                                              data-rigopr="KTI">
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
  <div class="modal fade" id="ktidetailModal" tabindex="-1" aria-labelledby="ktiModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="ktidetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="ktidetailContent">
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
                const rig_yard = this.getAttribute("data-rigyard");

                // Update the modal title
                const ktidetailModalLabel = document.getElementById("ktidetailModalLabel");
                ktidetailModalLabel.textContent = `KTI - ${rig_yard}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const rig_yard = this.getAttribute('data-rigyard');
            const rig_operation = this.getAttribute('data-rigopr');
            const modalContent = document.getElementById('ktidetailContent');

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            const encodedRigYard = encodeURIComponent(rig_yard);
            fetch(`fct-astdrawdsb.php?rig_yard=${encodedRigYard}&rig_operation=${rig_operation}`)
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
                                            <th>Manufaktur</th>
                                            <th>Tipe</th>
                                            <th>Legacy</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_dw}</td>
                                    <td>${row.man}</td>
                                    <td>${row.type}</td>
                                    <td>${row.legacy}</td>
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

  <!-- OFF SHORE Modal -->
  <div class="modal fade" id="offshoreModal" tabindex="-1" aria-labelledby="offshoreModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="offshoreModalLabel">OFF SHORE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <?php if (!empty($offshorCounts)) : ?>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 50%;">Letak</th>
                                  <th class="text-center" style="width: 50%;">Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($offshorCounts as $count) : ?>
                                  <tr>
                                      <td class="text-center" style="width: 50%;"><?= $count['title']; ?></td>
                                      <td class="text-center" style="width: 50%;">
                                          <button 
                                              class="btn btn-link detail-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#offshoredetailModal" 
                                              data-rigyard="<?= htmlspecialchars($count['title'], ENT_QUOTES); ?>"
                                              data-rigopr="OFF SHORE">
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
  <div class="modal fade" id="offshoredetailModal" tabindex="-1" aria-labelledby="offshoreModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="offshoredetailModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div id="offshoredetailContent">
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
                const rig_yard = this.getAttribute("data-rigyard");

                // Update the modal title
                const offshoredetailModalLabel = document.getElementById("offshoredetailModalLabel");
                offshoredetailModalLabel.textContent = `OFF SHORE - ${rig_yard}`;

                // Optionally, you can also make an AJAX call here to fetch more details
                // and update the #detailContent div.
            });
        });
    });
  </script>
  
  <script>
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function () {
            const rig_yard = this.getAttribute('data-rigyard');
            const rig_operation = this.getAttribute('data-rigopr');
            const modalContent = document.getElementById('offshoredetailContent');

            // Clear previous modal content
            modalContent.innerHTML = '<p>Loading...</p>';

            // Fetch data from the server
            const encodedRigYard = encodeURIComponent(rig_yard);
            fetch(`fct-astdrawdsb.php?rig_yard=${encodedRigYard}&rig_operation=${rig_operation}`)
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
                                            <th>Manufaktur</th>
                                            <th>Tipe</th>
                                            <th>Legacy</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(row => {
                            html += `
                                <tr class="text-center">
                                    <td>${row.rig_operation}</td>
                                    <td>${row.rig_yard}</td>
                                    <td>${row.sn_dw}</td>
                                    <td>${row.man}</td>
                                    <td>${row.type}</td>
                                    <td>${row.legacy}</td>
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
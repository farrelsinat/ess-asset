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
include 'conn-astbop.php';

$id_bop = '';
$periode = '';
$rigopr = '';
$rigyard = '';
$snbop = '';
$jenisbop = '';
$size = '';
$pressure = '';
$man = '';
$type = '';
$nococ = '';
$akhircoc = '';
$nomov = '';
$nopo = '';

if(isset($_GET['edit'])){
  $id_bop = $_GET['edit'];

  $query = "SELECT * FROM tb_dbhasilbop WHERE id_bop = '$id_bop';";
  $sql = mysqli_query($conn, $query);

  if($result = mysqli_fetch_assoc($sql)){
    $periode = $result['periode_laporan'];
    $rigopr = $result['rig_operation'];
    $rigyard = $result['rig_yard'];
    $snbop = $result['sn_bop'];
    $jenisbop = $result['jenis_bop'];
    $size = $result['size'];
    $pressure = $result['pressure'];
    $man = $result['man'];
    $type = $result['type'];
    $nococ = $result['no_coc'];
    $akhircoc = $result['akhir_coc'];
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

  <title>ESS | BOP Input Data</title>

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
    
<!-- Modal Announce -->
<div class="modal fade" id="autoPopup" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <p class="modal-title text-center" style="font-size: 1.5rem; font-weight: bold;" id="modalLabel">Perhatian!</p>
      </div>
      <div class="modal-body"  style="font-size: 1rem;">
          <p class="text">Sebelum melakukan input data, mohon pastikan data unit BOP yang akan dimasukkan belum ada pada database untuk menghindari terjadinya duplikasi data.</p>
          <p class="text">Data unit BOP yang akan dimasukkan dapat diperiksa terlebih dahulu pada database, dengan mencari melalui Serial, Nomor Movable, atau Nomor COC.</p>
          <p class="text">Jika data unit BOP tersebut tidak ditemukan pada database, data tersebut aman untuk dimasukkan.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" style="font-weight: bold;">Lanjutkan..</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var myModal = new bootstrap.Modal(document.getElementById("autoPopup"));
    myModal.show();
  });
</script>

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
      <a class="navbar-brand text-white">INPUT DATA - BOP</a>
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
      "WS VENDOR": ["BENVORS GN PUTRI", "JMS GN PUTRI", "FUJI CIKARANG", "VDHI TANGERANG", "JMS BALIKPAPAN", "FUJI BALIKPAPAN", "REGIAN BALIKPAPAN"],
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
    <div class="mb-3 row justify-content-center">
        <div class="card bg-warning mb-3" style="width: 90%; font-weight: bold; border-width: 0px;">
            <span class="text-center mt-3">Harap perhatikan contoh penulisan pada setiap data. Jika data tidak ada, harap dikosongkan atau ketik "N/A".</span>
            <span class="text-center mt-2">Mohon hindari kesamaan Serial dari BOP yang akan ditambahkan dengan yang sudah ada pada database.</span>
            <span class="text-center mt-2 mb-3">Jika telah melakukan input data, harap hubungi PIC.</span>
        </div>
    </div>
      <form id="dataForm" method="POST" action="pcs-astbop" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_bop; ?>" name="id_bop">
          
          <div class="mb-3 row justify-content-center">
              <label for="inputperiode" class="col-sm-2 col-form-label">Periode</label>
              <div class="col-sm-5">
                  <input type="date" name="periode_laporan" class="form-control" id="inputperiode" required readonly value="<?php echo date('Y-m-d'); ?>">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="inputrigopr" class="col-sm-2 col-form-label">Lokasi</label>
              <div class="col-sm-5">
                  <select value="<?php echo $rigopr;?>" id="inputrigopr" name="rig_operation" class="form-select" required onchange="updateRigYardOptions()">
                    <option value="" disabled selected>Pilih Lokasi</option>
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
                    <option <?php if($rigyard == ''){ echo "selected";} ?> value="<?php echo $rigyard; ?>" class="text-secondary"><?php echo $rigyard; ?></option>
                  </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="sn_bop" class="col-sm-2 col-form-label">Serial</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="sn_bop" name="sn_bop" placeholder="Cth: BAW-171">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="no_mov" class="col-sm-2 col-form-label">Movable</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="no_mov" name="no_mov" placeholder="Cth: 03.62.1879">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="jenis_bop" class="col-sm-2 col-form-label">Jenis</label>
              <div class="col-sm-5">
                <select class="form-select" id="jenis_bop" name="jenis_bop">
                    <option value="" disabled selected>Pilih Jenis</option>
                    <option value="ANNULAR">ANNULAR</option>
                    <option value="SINGLE RAM">SINGLE RAM</option>
                    <option value="SINGLE RAM-(SHEAR)">SINGLE RAM-(SHEAR)</option>
                    <option value="DOUBLE RAM">DOUBLE RAM</option>
                    <option value="DOUBLE RAM-(SHEAR)">DOUBLE RAM-(SHEAR)</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="size" class="col-sm-2 col-form-label">Ukuran</label>
              <div class="col-sm-5">
                  <select class="form-select" id="size" name="size">
                    <option value="" disabled selected>Pilih Ukuran</option>
                    <option value='6"'>6"</option>
                    <option value='7-1/16"'>7-1/16"</option>
                    <option value='11"'>11"</option>
                    <option value='13-5/8"'>13-5/8"</option>
                    <option value='16-3/4"'>16-3/4"</option>
                    <option value='18-3/4"'>18-3/4"</option>
                    <option value='20-3/4"'>20-3/4"</option>
                    <option value='21-1/4"'>21-1/4"</option>
                    <option value='29-1/2"'>29-1/2"</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="pressure" class="col-sm-2 col-form-label">Tekanan</label>
              <div class="col-sm-5">
                <select class="form-select" id="pressure" name="pressure">
                    <option value="" disabled selected>Pilih Tekanan</option>
                    <option value="500">500</option>
                    <option value="2000">2000</option>
                    <option value="3000">3000</option>
                    <option value="5000">5000</option>
                    <option value="10000">10000</option>
                    <option value="15000">15000</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="man" class="col-sm-2 col-form-label">Manufaktur</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="man" name="man" placeholder="Cth: HYDRILL">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="type" class="col-sm-2 col-form-label">Tipe</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="type" name="type" placeholder="Cth: GK">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="no_coc" class="col-sm-2 col-form-label">Nomor COC</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="no_coc" name="no_coc" placeholder="Cth: 011/COC-FIT/IV/2023">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="akhir_coc" class="col-sm-2 col-form-label">Masa COC</label>
              <div class="col-sm-5">
                  <input type="date" class="form-control" id="akhir_coc" name="akhir_coc">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="file_coc" class="col-sm-2 col-form-label">Dokumen COC</label>
              <div class="col-sm-5">
                  <input type="file" name="file_coc" class="form-control" id="file_coc" accept=".pdf">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="no_po" class="col-sm-2 col-form-label">Nomor PO</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="no_po" name="no_po" placeholder="Cth: 4300075198">
              </div>
          </div>
          
          <div class="mb-3 row mt-4 justify-content-center">
              <div class="col-sm-5 d-flex justify-content-center">
                  <button type="submit" name="aksi" value="add" class="btn btn-success me-2">
                      <i class="fa fa-plus-square me-2" aria-hidden="true"></i>Tambah Data
                  </button>
                  <a href="page-astbopdtb.php" type="button" class="btn btn-danger">
                      <i class="fa fa-reply me-2" aria-hidden="true"></i>Batal
                  </a>
              </div>
          </div>
      </form>
  </div>
  
  <script>
        setInterval(() => {
            fetch('pcs-akun-heartbeat.php');
        }, 30000); // Sends ping every 1 minute
  </script>

</body>
</html>
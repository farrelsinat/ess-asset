<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
}

$allowed_roles = ['admin', 'maintenance', 'asset', 'operation'];

if (!in_array($_SESSION['user_role'], $allowed_roles)) {
    echo "Akses dibatasi. Anda tidak memiliki izin.";
    exit;
}
?>

<?php
include 'conn-asttubgod.php';

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
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script src="https://unpkg.com/@zxing/library@latest"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <title>ESS | TUBULAR Scan QR | Input Running Hours</title>

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
      max-width: 500px;
    }
    .dashboard-card {
      width: 100%;
      max-width: 1000px;
      color: black; /* White text for contrast */
      padding: 20px;
      border-width: 0px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
    .dashboard-title {
      font-size: 1.5rem;
      font-weight: bold;
      text-align: center;
    }
    .tubular-specs {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      justify-items: center;
    }
    .running-hours {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      justify-items: center;
    }
    #loading {
      z-index: 1000;
    }
    .spinner-border {
      width: 3rem;
      height: 3rem;
    }
    #scanner-container {
      position: relative;
      width: 100%;
      margin: auto;
      overflow: hidden;
    }
    .watermark-text {
      position: absolute;
      top: 90%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      font-size: 0.75rem;
      font-weight: bold;
      pointer-events: none; /* Ensures the text does not interfere with user interaction */
      opacity: 1; /* Slight transparency for watermark effect */
    }
    .watermark-text-2 {
      position: absolute;
      top: 10%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      font-size: 1rem;
      font-weight: bold;
      pointer-events: none; /* Ensures the text does not interfere with user interaction */
      opacity: 1; /* Slight transparency for watermark effect */
    }
    .watermark-logo {
      position: absolute;
      top: 10%;
      left: 10%;
      transform: translate(-50%, -50%);
      color: white;
      pointer-events: none; /* Ensures the text does not interfere with user interaction */
      opacity: 1; /* Slight transparency for watermark effect */
    }
    .watermark-logo-2 {
      position: absolute;
      top: 10%;
      left: 90%;
      transform: translate(-50%, -50%);
      color: white;
      pointer-events: none; /* Ensures the text does not interfere with user interaction */
      opacity: 1; /* Slight transparency for watermark effect */
    }
    #preview {
      width: 100%;
      height: auto;
      border-radius: 15px;
    }
    .scan-gradient {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 10px;
      background: linear-gradient(90deg, transparent, skyblue, transparent);
      animation: move-gradient 1.5s linear infinite;
    }

    @keyframes move-gradient {
      0% {
        top: 0;
      }
      100% {
        top: 100%;
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

  <nav class="navbar navbar-second fixed-top" style="background-color: #0d6efd;">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand text-white">RUNNING HOURS - TUBULAR</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
  <script type="text/javascript" src="datatables/datatables.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#dt').DataTable();
    } );
  </script>

  <div class="container dashboard-section">
    <div class="card dashboard-card" style="background-color: black; border-radius: 15px 15px 0px 0px;">
      <div id="loading" style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <div id="scanner-container">
          <video id="preview" width="100%"></video>
          <div class="scan-gradient"></div>
          <div class="watermark-logo"><i class="fa fa-qrcode me-2"></i></div>
          <div class="watermark-text-2 text-white">Scan QR Code Asset</div>
          <div class="watermark-logo-2"><i class="fa fa-qrcode me-2"></i></div>
          <div class="watermark-text text-white">Powered by <img src="/logo/asset-logo-1.png" alt="Bootstrap" style="height:20px;"></div>
        </div>
      </div>
      <div id="alert-container"></div>
    </div>
  </div>

  <div class="container dashboard-section">
    <div class="card dashboard-card bg-danger" style="border-radius: 0px 0px 15px 15px;">
      <div class="dashboard-title text-white mb-2">Identitas Tubular Goods</div>
      <form action="fct-asttubgodfrh" method="POST" class="form-horizontal">
          <div class="tubular-specs mb-3">
              <label for="sn_pin" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Serial PIN
                  <input type="text" class="form-control" id="sn_pin" name="sn_pin" readonly>
              </label>
              <label for="sn_box" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Serial BOX
                  <input type="text" class="form-control" id="sn_box" name="sn_box" readonly>
              </label>
              <label for="jenis_tubgod" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Jenis
                  <input type="text" class="form-control" id="jenis_tubgod" name="jenis_tubgod" readonly>
              </label>
              <label for="man" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Manufaktur
                  <input type="text" class="form-control" id="man" name="man" readonly>
              </label>
              <label for="no_mov" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Movable
                  <input type="text" class="form-control" id="no_mov" name="no_mov" readonly>
              </label>
              <label for="no_po" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Nomor PO
                  <input type="text" class="form-control" id="no_po" name="no_po" readonly>
              </label>
          </div>
          <button type="submit" class="btn btn-success" style="font-weight: bold; width: 100%;"><i class="fa fa-plus-square me-2" aria-hidden="true"></i>Submit</button>
      </form>
      <div class="row justify-content-center mt-3">
        <div class="col">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tableModal" style="width: 100%; font-weight: bold;"><i class="fa fa-database me-2" aria-hidden="true"></i>DB RH</button>
        </div>
        <div class="col">
          <button onclick="location.href='page-home.php'" type="button" class="btn btn-warning" style="width: 100%; font-weight: bold;"><i class="fa fa-arrow-left me-2" aria-hidden="true"></i>Home</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tableModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tableModalLabel">DB RUNNING HOURS - TUBULAR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Table Inside Modal -->
            <div class="table-responsive">
              <table id="dt" class="table table-striped table-tertiary-color cell-border hover text-white" style="width: 100%;">
                <thead>
                  <tr class="align-middle text-center" style="font-weight: bold;">
                    <th>No.</th>
                    <th>Serial PIN</th>
                    <th>Serial BOX</th>
                    <th>Jenis</th>
                    <th>Manufaktur</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Durasi</th>
                    <th>Total RH</th>
                    <th>User</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $server = "localhost";
                  $username = "u597806360_asset_tubgod";
                  $password = "AsT-PdsI#2025_tUBgoD";
                  $dbname = "u597806360_db_tubgod";

                  $conn = new mysqli($server, $username, $password, $dbname);

                  if($conn->connect_error){
                    die("Connection Failed" .$conn->connect_error);
                  }
                  $sql = "SELECT sn_pin, sn_box, jenis_tubgod, man, time_in, time_out, duration, total_duration, username FROM tb_dbhourstubgod";
                  $query = $conn->query($sql);
                  while ($row = $query->fetch_assoc()){
                    ?>
                    <tr class="align-middle text-center">
                      <td><?php echo ++$no ?></td>
                      <td><?php echo $row['sn_pin'];?></td>
                      <td><?php echo $row['sn_box'];?></td>
                      <td><?php echo $row['jenis_tubgod'];?></td>
                      <td><?php echo $row['man'];?></td>
                      <td><?php echo $row['time_in'];?></td>
                      <td><?php echo $row['time_out'];?></td>
                      <td><?php echo $row['duration'];?></td>
                      <td><?php echo $row['total_duration'];?></td>
                      <td><?php echo $row['username'];?></td>
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

  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

  <script>
      // Use ZXing to scan the QR code
      const codeReader = new ZXing.BrowserQRCodeReader();
      let selectedDeviceId;

      document.addEventListener('DOMContentLoaded', function () {
          const videoElement = document.getElementById('preview');
          const snPinField = document.getElementById('sn_pin');

          // Get the available cameras
          codeReader.getVideoInputDevices().then((videoInputDevices) => {
              if (videoInputDevices.length > 0) {
                  // Select the back camera if available, otherwise use the first available camera
                  selectedDeviceId = videoInputDevices.find(device => device.label.toLowerCase().includes('back'))?.deviceId 
                      || videoInputDevices[0].deviceId;

                  // Start scanning using the selected camera
                  startScanner(selectedDeviceId);
              } else {
                  alert('No camera found.');
              }
          }).catch((error) => {
              console.error('Camera error:', error);
          });

          function startScanner(deviceId) {
              codeReader.decodeFromVideoDevice(deviceId, 'preview', (result, err) => {
                  if (result) {
                      console.log('QR Code detected:', result.text);

                      // Set the scanned result in the sn_pin field
                      snPinField.value = result.text;

                      // Dispatch input event to trigger fetchData
                      const inputEvent = new Event('input', { bubbles: true });
                      snPinField.dispatchEvent(inputEvent);

                      // Optional: Show loading spinner
                      const loading = document.getElementById('loading');
                      if (loading) loading.style.display = 'block';
                  }
                  if (err && !(err instanceof ZXing.NotFoundException)) {
                      console.error('QR Code scan error:', err);
                  }
              });

              // Flip the camera for front-facing cameras
              codeReader.getVideoInputDevices().then((videoInputDevices) => {
                  const currentDevice = videoInputDevices.find(device => device.deviceId === deviceId);
                  if (currentDevice && !currentDevice.label.toLowerCase().includes('back')) {
                      videoElement.style.transform = 'scaleX(-1)'; // Flip the video horizontally for front cameras
                  } else {
                      videoElement.style.transform = ''; // No flip for back cameras
                  }
              });
          }

          // Add input event listener to fetch data
          snPinField.addEventListener('input', function () {
              fetchData(this.value);
          });

          function fetchData(snPin) {
              if (snPin) {
                  const loading = document.getElementById('loading');
                  loading.style.display = 'block'; // Show the spinner

                  fetch(`fct-asttubgodfedit.php?sn_pin=${snPin}`)
                      .then(response => response.json())
                      .then(data => {
                          document.getElementById('sn_box').value = data.sn_box || '';
                          document.getElementById('jenis_tubgod').value = data.jenis_tubgod || '';
                          document.getElementById('man').value = data.man || '';
                          document.getElementById('no_mov').value = data.no_mov || '';
                          document.getElementById('no_po').value = data.no_po || '';
                      })
                      .catch(error => console.error('Error fetching data:', error))
                      .finally(() => {
                          loading.style.display = 'none'; // Hide the spinner
                      });
              }
          }
      });
  </script>

  <script>
      document.addEventListener('DOMContentLoaded', function () {
          const form = document.querySelector('form');
          const snPinField = document.getElementById('sn_pin');
          const alertContainer = document.getElementById('alert-container');

          form.addEventListener('submit', function (event) {
              // Prevent submission if sn_pin is empty
              if (!snPinField.value.trim()) {
                  event.preventDefault();
                  showAlert('Harap scan QR Code terlebih dahulu sebelum submit!', 'danger');
                  return;
              }

              // Submit the form via fetch
              event.preventDefault(); // Prevent default form submission
              const formData = new FormData(form);
              fetch('fct-asttubgodfrh', {
                  method: 'POST',
                  body: formData
              })
                  .then(response => response.text()) // Expect the PHP echo message as plain text
                  .then(data => {
                      // Use the PHP response as the alert message
                      const messageType = data.toLowerCase().includes('error') ? 'danger' : 'success';
                      showAlert(data, messageType);
                      if (messageType === 'success') {
                          setTimeout(() => {
                              location.reload(); // Refresh page after 3 seconds
                          }, 3000);
                      }
                  })
                  .catch(error => {
                      showAlert('Data tidak terkirim. Harap coba lagi.', 'danger');
                      console.error('Error:', error);
                  });
          });

          function showAlert(message, type) {
              alertContainer.innerHTML = `
                  <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                      ${message}
                  </div>
              `;
              setTimeout(() => {
                  alertContainer.innerHTML = ''; // Remove the alert after 3 seconds
              }, 3000);
          }
      });
  </script>


</body>

</html>
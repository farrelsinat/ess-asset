<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
}
?>

<?php
include 'conn-astdraw.php';

$id_dw = '';
$periode = '';
$rigopr = '';
$rigyard = '';
$sndw = '';
$man = '';
$type = '';
$legacy = '';
$nomov = '';
$nopo = '';

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

  <title>ESS | DRAWWORKS Scan QR | Cek Spesifikasi</title>

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
      <a class="navbar-brand text-white">SPESIFIKASI - DRAWWORKS</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <div class="dashboard-wrapper">
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
        <div class="row justify-content-center mt-3">
          <button id="capture-all-btn" class="btn btn-primary" style="font-weight: bold;"><i class="fa fa-camera me-2" aria-hidden="true"></i>Screenshot</button>
        </div>
        <div class="row justify-content-center mt-3">
          <img id="capture-all-img" style="max-width: 100%; display: none;" alt="Captured Screenshot">
        </div>
      </div>
    </div>

    <div class="container dashboard-section">
      <div class="card dashboard-card bg-danger" style="border-radius: 0px 0px 15px 15px;">
        <div class="dashboard-title text-white mb-2">Spesifikasi Drawworks</div>
        <div class="tubular-specs">
          <label for="sn_dw" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Serial<input type="text" class="form-control" id="sn_dw" name="sn_dw" readonly></label>

          <label for="man" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Manufaktur<input type="text" class="form-control" id="man" name="man" readonly></label>

          <label for="type" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Tipe<input type="text" class="form-control" id="type" name="type" readonly></label>

          <label for="legacy" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Legacy<input type="text" class="form-control" id="legacy" name="legacy" readonly></label>

          <label for="no_mov" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Movable<input type="text" class="form-control" id="no_mov" name="no_mov" readonly></label>

          <label for="no_po" class="text-white mb-1" style="font-weight: bold; font-size: 0.75rem">Nomor PO<input type="text" class="form-control" id="no_po" name="no_po" readonly></label>
        </div>
        <div class="row justify-content-center mt-3">
          <div class="col">
            <button type="button" class="btn btn-primary" id="refresh-btn" style="width: 100%; font-weight: bold;"><i class="fa fa-refresh me-2" aria-hidden="true"></i>Refresh</button>
          </div>
          <div class="col">
            <button onclick="location.href='page-home.php'" type="button" class="btn btn-warning" style="width: 100%; font-weight: bold;"><i class="fa fa-arrow-left me-2" aria-hidden="true"></i>Home</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

  <script>
      const codeReader = new ZXing.BrowserQRCodeReader();
      let selectedDeviceId;

      document.addEventListener('DOMContentLoaded', function () {
          const videoElement = document.getElementById('preview');
          const snDrawField = document.getElementById('sn_dw');
          const refreshButton = document.getElementById('refresh-btn');
          const captureAllBtn = document.getElementById('capture-all-btn');
          const captureAllImg = document.getElementById('capture-all-img');

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

                      // Set the value from the QR code
                      snDrawField.value = result.text;

                      // Dispatch input event to trigger fetchData
                      const inputEvent = new Event('input', { bubbles: true });
                      snDrawField.dispatchEvent(inputEvent);

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
          snDrawField.addEventListener('input', function () {
              fetchData(this.value);
          });

          function fetchData(snDW) {
              if (snDW) {
                  const loading = document.getElementById('loading');
                  loading.style.display = 'block'; // Show the spinner

                  fetch(`fct-astdrawfedit.php?sn_dw=${snDW}`)
                      .then(response => response.json())
                      .then(data => {
                          document.getElementById('man').value = data.man || '';
                          document.getElementById('type').value = data.type || '';
                          document.getElementById('legacy').value = data.legacy || '';
                          document.getElementById('no_mov').value = data.no_mov || '';
                          document.getElementById('no_po').value = data.no_po || '';
                      })
                      .catch(error => console.error('Error fetching data:', error))
                      .finally(() => {
                          loading.style.display = 'none'; // Hide the spinner
                      });
              }
          }

          // Refresh button to clear inputs and reset scanner
          refreshButton.addEventListener('click', function () {
              clearFields();
              resetScreenshot();
              startScanner(selectedDeviceId); // Restart scanning
          });

          function clearFields() {
              // Clear all the fields
              document.getElementById('sn_dw').value = '';
              document.getElementById('man').value = '';
              document.getElementById('type').value = '';
              document.getElementById('legacy').value = '';
              document.getElementById('no_mov').value = '';
              document.getElementById('no_po').value = '';
          }

          function resetScreenshot() {
              // Hide and reset the screenshot image
              captureAllImg.style.display = 'none';
              captureAllImg.src = '';
          }

          // Screenshot for the dashboard container
          captureAllBtn.addEventListener('click', function () {
              const container = document.querySelector('.dashboard-wrapper'); // Replace with a specific wrapper if needed
              
              // Temporarily hide the previous screenshot image
              captureAllImg.style.display = 'none';

              html2canvas(container).then(canvas => {
                  // Display the captured image
                  captureAllImg.src = canvas.toDataURL('image/png');
                  captureAllImg.style.display = 'block';
              }).catch(error => {
                  console.error('Screenshot failed:', error);
              });
          });
      });
  </script>

</body>

</html>
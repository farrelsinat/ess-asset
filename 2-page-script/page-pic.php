<!DOCTYPE html>

<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
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

  <title>ESS | PIC</title>

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
      <a class="navbar-brand text-white">PIC</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center mb-4" style="gap: 50px;">
        <div class="card" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-width: 0px;">
          <div class="card-body">
            <h5 class="card-title"><strong>Farrel Sinatria</strong></h5>
            <p class="card-text mb-0"><i class="fa fa-phone me-3" aria-hidden="true"></i>: +62-811-9203-019</p>
            <p class="card-text"><i class="fa fa-envelope me-3" aria-hidden="true"></i>: mk.farrel.sinatria@mitrakerja.pertamina.com</p>
            <div class="d-flex justify-content-end">
              <a href="https://wa.me/628119203019" class="btn btn-success" style="font-family: sans-serif; color: white;"><i class="fa fa-whatsapp me-2" aria-hidden="true"></i><strong>WhatsApp</strong></a>
            </div>
          </div>
        </div>
        <div class="card" style="width: 100%; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-width: 0px;">
          <div class="card-body">
            <h5 class="card-title"><strong>Sonny Wicaksono</strong></h5>
            <p class="card-text mb-0"><i class="fa fa-phone me-3" aria-hidden="true"></i>: +62-813-4664-4109</p>
            <p class="card-text"><i class="fa fa-envelope me-3" aria-hidden="true"></i>: sonny.wicaksono@pertamina.com</p>
            <div class="d-flex justify-content-end">
              <a href="https://wa.me/6281346644109" class="btn btn-success" style="font-family: sans-serif; color: white;"><i class="fa fa-whatsapp me-2" aria-hidden="true"></i><strong>WhatsApp</strong></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <!-- Card 1 -->
      <div class="col-12 d-flex justify-content-center mb-4">
        <div class="card" style="width: 100%; background-color: #ffc107; border-width: 0px;">
          <p class="lead text-center mt-3 mb-3" style=" font-family: sans-serif; font-size: 1rem; font-weight: bold;">
            Silahkan hubungi PIC apabila menemukan kesalahan/error dan memiliki pertanyaan terkait pengisian data pada situs ini.
          </p>
        </div>
        </div>
          
    <div class="col-12 d-flex justify-content-center mb-4">
        <div class="card" style="width: 100%; background-color: #FFFFFF; border-width: 0px;">
          <p class="lead text-center text-success mt-3 mb-0" style=" font-family: sans-serif; font-size: 1rem; font-weight: bold;">
            ☺ Terima kasih atas kerja samanya ☺
          </p>
          <p class="lead text-center text-success mt-1 mb-0" style=" font-family: sans-serif; font-size: 0.75rem; font-weight: bold;">
            Thank you for your cooperation - 感谢您的合作 - 협조해 주셔서 감사합니다
          </p>
          <p class="lead text-center text-success mt-1 mb-3" style=" font-family: sans-serif; font-size: 0.75rem; font-weight: bold;">
            ご協力ありがとうございます - شكرًا لتعاونكم - Vielen Dank für Ihre Zusammenarbeit
          </p>
        </div>
      </div>
    </div>
    
  </div>
  
  <script>
        setInterval(() => {
            fetch('pcs-akun-heartbeat.php');
        }, 30000); // Sends ping every 1 minute
  </script>

  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
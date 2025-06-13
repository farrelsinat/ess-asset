<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: page-signin.php');
    exit;
}

// Check if the logged-in user is an admin
if ($_SESSION['user_role'] !== 'admin') {
    echo "Akses dibatasi. Anda bukan Admin.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/logo/ess-icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>ESS | Adm Panel</title>
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
        .dashboard-card {
          width: 100%;
          max-width: 1000px;
          color: black; /* White text for contrast */
          padding: 20px;
          border-radius: 15px;
          border-width: 0px;
          box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-custom {
            background-color: #dc3545;
            color: white;
            border-radius: 15px;
            padding: 20px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-width: 0px;
        }
        .card-custom2 {
            background-color: transparent;
            max-width: 150px;
            border-width: 0px;
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
        <a class="navbar-brand text-white">TAMBAH AKUN PENGGUNA</a>
      </div>
    </nav>

    <div class="container dashboard-section">
        <div class="card card-custom mb-5">
            <div class="card-body">
                <form class="form-signin" method="post" action="pcs-admpanel" autocomplete="off">
                    <label>Email</label>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off">
                    </div>
                    <label>Username</label>
                    <div class="input-group mb-3">
                        <input type="username" name="username" id="username" class="form-control" placeholder="Username" required autocomplete="off">
                    </div>
                    <label>Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="new-password">
                        <span class="input-group-text bg-primary" id="togglePassword" style="cursor: pointer;">
                          <i class="fa fa-eye" style="color: white;"></i>
                        </span>
                    </div>
                    <label>Role Akun</label>
                    <div class="input-group mb-3">
                        <select name="role" id="role" class="form-control" required>
                            <option value="">Pilih Role Akun</option>
                            <option value="admin">Admin</option>
                            <option value="asset">Asset Management</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="operation">Operation</option>
                            <option value="guest">Guest</option>
                        </select>
                    </div>
                    <label>Status Akun</label>
                    <div class="input-group mb-3">
                        <select name="status_akun" id="status_akun" class="form-control" required>
                            <option value="">Pilih Status Akun</option>
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="DISABLED">DISABLE</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-100 mt-4 mb-0" style="font-weight: bold;">
                          <i class="fa fa-plus-square me-2" aria-hidden="true"></i>Tambah Pengguna
                        </button>
                    </div>
                </form>
                    <div class="text-center"> 
                        <a href="page-admpaneldtb.php" class="btn btn-warning w-100 mt-3 mb-0" style="font-weight: bold;">
                          <i class="fa fa-arrow-left me-2" aria-hidden="true"></i></i>Batal
                        </a>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script to toggle password visibility -->
    <script>
      const togglePassword = document.getElementById('togglePassword');
      const passwordField = document.getElementById('password');
      const eyeIcon = togglePassword.querySelector('i');

      togglePassword.addEventListener('click', function () {
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;

        // Toggle the eye icon
        if (type === 'password') {
          eyeIcon.classList.remove('fa-eye-slash');
          eyeIcon.classList.add('fa-eye');
        } else {
          eyeIcon.classList.remove('fa-eye');
          eyeIcon.classList.add('fa-eye-slash');
        }
      });
    </script>
    
    <script>
        setInterval(() => {
            fetch('pcs-akun-heartbeat.php');
        }, 30000); // Sends ping every 1 minute
    </script>
    
</body>
</html>

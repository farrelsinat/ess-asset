<?php
require 'conn-akun.php'; // Your DB connection
session_start();

header("Content-Security-Policy: default-src 'self'; script-src 'self' https://code.jquery.com; style-src 'self' 'unsafe-inline';");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

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

$flash_message = "";

// Handle updates
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_user'])) {
    $id = $_POST['id_akun'];
    $new_role = $_POST['user_role'];
    $new_status = $_POST['status_akun'];
    $update_query = "UPDATE tb_akuness SET user_role = '$new_role', status_akun = '$new_status' WHERE id_akun = '$id'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['flash'] = "User updated successfully.";
        $_SESSION['flash_type'] = "primary";
    } else {
        $_SESSION['flash'] = "Failed to update user.";
        $_SESSION['flash_type'] = "danger";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle deletion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_user'])) {
    $id = $_POST['id_akun'];
    $delete_query = "DELETE FROM tb_akuness WHERE id_akun = '$id'";
    if (mysqli_query($conn, $delete_query)) {
        $_SESSION['flash'] = "User deleted successfully.";
        $_SESSION['flash_type'] = "danger";
    } else {
        $_SESSION['flash'] = "Failed to delete user.";
        $_SESSION['flash_type'] = "danger";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_SESSION['flash_message'])) {
    $flash_message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}

// Fetch all users
$query = "SELECT * FROM tb_akuness";
$result = mysqli_query($conn, $query);

$no = 0;
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

    <title>ESS | Adm Panel</title>
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
        .status-dropdown.active {
            background-color: #198754; /* Light green */
            color: #155724;
        }
        .status-dropdown.disabled {
            background-color: #dc3545; /* Light red */
            color: #721c24;
        }
    </style>
</head>

<body>

<script type="text/javascript">
  $(document).ready(function () {
    $('#dt').DataTable();
  });
</script>

<?php if (isset($_SESSION['flash'])): ?>
<div id="flash-message" class="alert alert-<?php echo $_SESSION['flash_type']; ?> alert-dismissible fade show text-center" role="alert" style="position: fixed; top: 80px; left: 50%; transform: translateX(-50%); z-index: 9999; width: 50%;">
  <?php echo $_SESSION['flash']; ?>
</div>
<?php unset($_SESSION['flash'], $_SESSION['flash_type']); endif; ?>

<script>
  setTimeout(function() {
    var alert = document.getElementById('flash-message');
    if (alert) {
      alert.classList.remove('show');
      alert.classList.add('hide');
      alert.style.display = 'none';
    }
  }, 2000); // 2000 milliseconds = 2 seconds
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

    <nav class="navbar navbar-second fixed-top" style="background-color: #b02a37;">
      <div class="container-fluid justify-content-center">
        <a class="navbar-brand text-white">PENGATURAN AKUN PENGGUNA</a>
      </div>
    </nav>
    
    <div class="container dashboard-section mt-3">
        <a class="btn btn-success" style="width: 100%; font-weight: bold;" href="page-admpanelfinput.php"><i class="fa fa-plus-square me-2" aria-hidden="true"></i>Tambah Akun Pengguna</a>
    </div>
    
    <div class="container dashboard-section mt-3">
    <div class="table-responsive mb-5">
        <table id="dt" class="table table-bordered table-striped table-tertiary-color cell-border hover" style="width: 100%;">
            <thead>
                <tr class="align-middle text-center" style="font-weight: bold;">
                    <th>No.</th>
                    <th>ID Akun</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role Akun</th>
                    <th>Status Akun</th>
                    <th>Status Login</th>
                    <th>Waktu Login</th>
                    <th>Waktu Aktif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
                <tr>
                    <form method="POST">
                        <td style="font-weight: bold;"><?php echo ++$no ?></td>
                        <td><?php echo $row['id_akun']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td>
                            <select name="user_role" style="font-weight: bold;">
                                <option value="admin" <?php if ($row['user_role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                <option value="asset" <?php if ($row['user_role'] == 'asset') echo 'selected'; ?>>Asset Management</option>
                                <option value="maintenance" <?php if ($row['user_role'] == 'maintenance') echo 'selected'; ?>>Maintenance</option>
                                <option value="operation" <?php if ($row['user_role'] == 'operation') echo 'selected'; ?>>Operation</option>
                                <option value="guest" <?php if ($row['user_role'] == 'guest') echo 'selected'; ?>>Guest</option>
                            </select>
                        </td>
                        <td>
                            <select name="status_akun" style="color: white; font-weight: bold;" class="status-dropdown" onchange="updateSelectColor(this)">
                                <option value="ACTIVE" <?php if ($row['status_akun'] == 'ACTIVE') echo 'selected'; ?>>ACTIVE</option>
                                <option value="DISABLED" <?php if ($row['status_akun'] == 'DISABLED') echo 'selected'; ?>>DISABLE</option>
                            </select>
                        </td>
                        <td>
                          <?php if ($row['is_online'] == 1): ?>
                            <span class="badge bg-success" style="font-size: 12pt;">ONLINE</span>
                          <?php else: ?>
                            <span class="badge bg-danger" style="font-size: 12pt;">OFFLINE</span>
                          <?php endif; ?>
                        </td>
                        <td><?php echo $row['last_login']; ?></td>
                        <td><?php echo $row['last_active']; ?></td>
                        <td class="text-center">
                            <input type="hidden" name="id_akun" value="<?php echo $row['id_akun']; ?>">
                            <button type="submit" name="update_user" class="btn btn-primary btn-sm" style="font-weight: bold; margin-right: 4px;">UPDATE</button>
                        </form>
                        <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus akun pengguna ini?');" style="display:inline;">
                            <input type="hidden" name="id_akun" value="<?php echo $row['id_akun']; ?>">
                            <button type="submit" name="delete_user" class="btn btn-danger btn-sm" style="font-weight: bold;">DELETE</button>
                        </form>
                        </td>
                    </form>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
    </div>
    
    <script>
    function updateSelectColor(select) {
        select.classList.remove('active', 'disabled');
        if (select.value === 'ACTIVE') {
            select.classList.add('active');
        } else if (select.value === 'DISABLED') {
            select.classList.add('disabled');
        }
    }
    
    // Apply initial color when the page loads
    window.addEventListener('DOMContentLoaded', function() {
        const selects = document.querySelectorAll('.status-dropdown');
        selects.forEach(updateSelectColor);
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        setInterval(() => {
            fetch('pcs-akun-heartbeat.php');
        }, 30000); // Sends ping every 1 minute
    </script>
    
</body>
</html>

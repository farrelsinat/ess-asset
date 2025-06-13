<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['email'])){
  header('Location: page-home.php');
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/logo/ess-icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>ESS | Sign In</title>
    <style>
        body, html {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #003580;
            margin: 0;
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
            margin-top: 15px;
        }
        .card-custom2 {
            background-color: transparent;
            max-width: 150px;
            border-width: 0px;
        }
        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            justify-items: center;
        }
    </style>
</head>

<body>

    <div class="dashboard-container">
        <div class="card card-custom2">
            <img src="/logo/asset-logo-1.png" alt="Bootstrap">
        </div>
        <div class="card card-custom">
            <div class="card-header pb-0 text-center bg-transparent">
                <img src="/logo/ess-logo.png" alt="Bootstrap" style="max-width: 200px;">
                <p class="text mt-2">By Asset Management</p>
            </div>
            <div class="card-body">
                <form class="form-signin" method="post" action="pcs-signin">
                    <label>Email</label>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required
                        value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                    </div>
                    <label>Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required
                        value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
                        <span class="input-group-text bg-primary" id="togglePassword" style="cursor: pointer;">
                          <i class="fa fa-eye" style="color: white;"></i>
                        </span>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="rememberMe">Ingat info Sign In</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 mt-4 mb-0" style="font-weight: bolder; border-color: #ffc107; border-width: 2px;">
                          <i class="fa fa-sign-in" aria-hidden="true"></i> Sign In
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="text-white mb-0">Apabila belum memiliki akun, harap menghubungi PIC.</p>
                <a href="https://wa.me/628119203019" class="btn btn-success mt-2" style="font-family: sans-serif; color: white;"><i class="fa fa-whatsapp me-2" aria-hidden="true"></i><strong>PIC</strong></a>
            </div>
        </div>
    </div>
    
    <div id="popupMessage" 
         class="alert alert-warning shadow-lg rounded text-center position-fixed top-0 start-50 translate-middle-x mt-3 px-4 py-3" 
         role="alert" 
         style="z-index: 1050; display: none; width: auto; max-width: 600px;">
            <i class="fa fa-exclamation-triangle"></i>
            <div><strong>ESS digunakan untuk kepentingan internal Pertamina Drilling.</strong></div>
            <div><strong>Harap gunakan dan jaga akun anda dengan bijak!</strong></div>
            <div>Terima kasih atas kerjasamanya.</div>
            <div>- Asset Management Team -</div>
    </div>
        
    <script>
      window.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('popupMessage');
        popup.style.display = 'block';
        setTimeout(() => {
          popup.style.display = 'none';
        }, 3000);
      });
    </script>

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
    
</body>
</html>

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

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/logo/ess-icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <title>ESS | Create WO - Asset</title>

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
      <a class="navbar-brand text-white">CREATE WO - ASSET</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <div class="container">
    <div class="mb-3 row justify-content-center">
        <div class="card bg-warning mb-3" style="width: 90%; font-weight: bold; border-width: 0px;">
            <span class="text-center mt-3 mb-1">Buat Work Order (WO) dari ASSET MANAGEMENT untuk ditujukan kepada Fungsi lain.</span>
            <span class="text-center mt-0 mb-3" style="font-style: italic;">Pastikan setiap kolom yang bertanda (*) telah diisi.</span>
        </div>
    </div>
    
      <form id="dataForm" method="POST" action="pcs-wo-asset" onsubmit="return delayReload();">
          <input type="hidden" value="<?php echo $id_woass; ?>" name="id_woass">
          
          <h5 class="text-center mt-3 mb-3">Identitas WO</h5>
          
          <div class="mb-3 row justify-content-center">
              <label for="tglbuat_woass" class="col-sm-2 col-form-label">Tanggal WO *</label>
              <div class="col-sm-5">
                  <input type="date" name="tglbuat_woass" class="form-control" id="tglbuat_woass" required readonly value="<?php echo date('Y-m-d'); ?>">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="susun_woass" class="col-sm-2 col-form-label">Penyusun *</label>
              <div class="col-sm-5">
                <select class="form-select" id="susun_woass" name="susun_woass" required>
                    <option value="" disabled selected>Pilih Jabatan Penyusun</option>
                    <option value="Koordinator Asset RO I & VII">Koordinator Asset RO I & VII</option>
                    <option value="Koordinator Asset RO II & VI">Koordinator Asset RO II & VI</option>
                    <option value="Koordinator Asset RO III">Koordinator Asset RO III</option>
                    <option value="Koordinator Asset RO IV">Koordinator Asset RO IV</option>
                    <option value="Senior Analyst Asset">Senior Analyst Asset</option>
                    <option value="Admin Technical Asset">Admin Technical Asset</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="nama_susun_woass" class="col-sm-2 col-form-label">Nama Penyusun *</label>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="nama_susun_woass" name="nama_susun_woass" value="">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="asal_woass" class="col-sm-2 col-form-label">Pengirim *</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="asal_woass" name="asal_woass" value="Manager Asset Management" readonly>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="nama_asal_woass" class="col-sm-2 col-form-label">Nama Pengirim *</label>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="nama_asal_woass" name="nama_asal_woass" value="Evin K. Prasetia Adi" readonly>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="costc_woass" class="col-sm-2 col-form-label">Cost Center</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="costc_woass" name="costc_woass">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="wbs_woass" class="col-sm-2 col-form-label">WBS</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="wbs_woass" name="wbs_woass">
              </div>
          </div>
          
          <h5 class="text-center mt-5 mb-3">Rincian Permintaan</h5>
          
          <div class="mb-3 row justify-content-center">
              <label for="jenis_woass" class="col-sm-2 col-form-label">Jenis Permintaan *</label>
              <div class="col-sm-5">
                <select class="form-select" id="jenis_woass" name="jenis_woass" required onchange="setPenerima()">
                    <option value="" disabled selected>Pilih Jenis Permintaan</option>
                    <option value="Permintaan Pengangkutan Peralatan Operasional">Pengangkutan Peralatan</option>
                    <option value="Permintaan Inspeksi Peralatan Operasional">Inspeksi Peralatan</option>
                    <option value="Permintaan Perbaikan Peralatan Operasional">Perbaikan Peralatan</option>
                    <option value="Permintaan Resertifikasi Peralatan Operasional">Resertifikasi Peralatan</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="tujuan_woass" class="col-sm-2 col-form-label">Penerima *</label>
              <div class="col-sm-5">
                 <select class="form-select" id="tujuan_woass" name="tujuan_woass" required disabled>
                    <option value="" disabled selected>Pilih Penerima WO</option>
                    <option value="Manager Moving & Mobilization">Manager Moving & Mobilization</option>
                    <option value="Manager Maintenance">Manager Maintenance</option>
                    <option value="Manager Quality Assurance & Quality Control">Manager Quality Assurance & Quality Control</option>
                </select>
                <input type="hidden" name="tujuan_woass" id="hidden_tujuan_woass">
              </div>
          </div>
          
          <script>
            function setPenerima() {
                const jenis = document.getElementById("jenis_woass").value;
                const tujuanSelect = document.getElementById("tujuan_woass");
                const hiddenInput = document.getElementById("hidden_tujuan_woass");
            
                let tujuanValue = "";
            
                if (jenis === "Permintaan Pengangkutan Peralatan Operasional") {
                    tujuanValue = "Manager Moving & Mobilization";
                } else if (jenis === "Permintaan Inspeksi Peralatan Operasional") {
                    tujuanValue = "Manager Quality Assurance & Quality Control";
                } else if (
                    jenis === "Permintaan Perbaikan Peralatan Operasional" ||
                    jenis === "Permintaan Resertifikasi Peralatan Operasional"
                ) {
                    tujuanValue = "Manager Maintenance";
                }
            
                for (let option of tujuanSelect.options) {
                    if (option.value === tujuanValue) {
                        option.selected = true;
                        break;
                    }
                }
                hiddenInput.value = tujuanValue;
            }
          </script>
          
          <div class="mb-3 row justify-content-center">
              <label for="tglperlu_woass" class="col-sm-2 col-form-label">Tanggal Diperlukan *</label>
              <div class="col-sm-5">
                  <input type="date" class="form-control" id="tglperlu_woass" name="tglperlu_woass" required>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="desc_woass" class="col-sm-2 col-form-label">Deskripsi Permintaan</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="desc_woass" name="desc_woass">
              </div>
          </div>
        
        <h5 class="text-center mt-5 mb-3">Rincian Barang</h5>
        
        <div id="items-container">
            <div class="mb-3 row justify-content-center">
                <div class="col-sm-1 text-end">
                    <span class="item-number">1.</span>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="barang_woass[]" placeholder="Deskripsi Barang *" required>
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="qty_woass[]" placeholder="Jumlah *" required>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="iden_woass[]" placeholder="Identitas Barang *" required>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger remove-item">Hapus</button>
                </div>
            </div>
        </div>
        <div class="mb-3 row justify-content-center item-group">
            <button type="button" id="add-item" class="btn btn-primary" style="width: 30%;"><i class="fa fa-plus-square me-2" aria-hidden="true"></i>Tambah</button>
        </div>

        <script>
        function updateNumbers() {
            let items = document.querySelectorAll("#items-container .row");
            items.forEach((item, index) => {
                let numberLabel = item.querySelector(".item-number");
                if (numberLabel) {
                    numberLabel.textContent = (index + 1) + ".";
                }
            });
        }
        
        document.getElementById("add-item").addEventListener("click", function() {
            let container = document.getElementById("items-container");
            let itemCount = document.querySelectorAll("#items-container .row").length;
        
            if (itemCount < 12) {
                let newItem = document.createElement("div");
                newItem.classList.add("mb-3", "row", "justify-content-center");
                newItem.innerHTML = `
                    <div class="col-sm-1 text-end">
                        <span class="item-number">${itemCount + 1}.</span>
                    </div>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="barang_woass[]" placeholder="Nama Barang *" required>
                    </div>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" name="qty_woass[]" placeholder="Jumlah *" required>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="iden_woass[]" placeholder="Identitas Barang *" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger remove-item">Hapus</button>
                    </div>
                `;
                container.appendChild(newItem);
                updateNumbers();
            }
        
            if (document.querySelectorAll("#items-container .row").length >= 12) {
                document.getElementById("add-item").disabled = true;
            }
        });
        
        // Remove item field
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("remove-item")) {
                event.target.closest(".mb-3").remove();
                updateNumbers();
        
                if (document.querySelectorAll("#items-container .row").length < 12) {
                    document.getElementById("add-item").disabled = false;
                }
            }
        });
        
        // Initial numbering
        updateNumbers();
        </script>
        
          <div class="mb-3 row justify-content-center">
              <label for="note_woass" class="col-sm-2 col-form-label">Catatan</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="note_woass" name="note_woass">
              </div>
          </div>
          
          <h5 class="text-center mt-5 mb-0">Lokasi Permintaan</h5>
          <h6 class="text-center mt-2 mb-3" style="font-style: italic;">Lokasi dapat dipilih atau diketik langsung apabila tidak tersedia pada pilihan.</h6>
          
          <div class="mb-3 row justify-content-center">
              <label for="lokasal_woass" class="col-sm-2 col-form-label">Lokasi Asal *</label>
              <div class="col-sm-5">
                  <select class="form-control" id="lokasal_woass" name="lokasal_woass" required></select>
              </div>
          </div>
          
          <script>
              $(document).ready(function() {
                $('#lokasal_woass').select2({
                  tags: true,
                  data: [
                    { id: '', text: 'Pilih Lokasi Asal' },
                    { id: 'PDSI #01.2/N80B-M', text: 'PDSI #01.2/N80B-M' },
                    { id: 'PDSI #04.3/N110-M', text: 'PDSI #04.3/N110-M' },
                    { id: 'PDSI #05.2/OW760-M', text: 'PDSI #05.2/OW760-M' },
                    { id: 'PDSI #07.1/PD350-M', text: 'PDSI #07.1/PD350-M' },
                    { id: 'PDSI #08.1/H40D-M', text: 'PDSI #08.1/H40D-M' },
                    { id: 'PDSI #09.2/N80UE-E', text: 'PDSI #09.2/N80UE-E' },
                    { id: 'PDSI #10.2/D700-M', text: 'PDSI #10.2/D700-M' },
                    { id: 'PDSI #11.2/N80B-M', text: 'PDSI #11.2/N80B-M' },
                    { id: 'PDSI #12.3/N110-M', text: 'PDSI #12.3/N110-M' },
                    { id: 'PDSI #13.1/H40D-M', text: 'PDSI #13.1/H40D-M' },
                    { id: 'PDSI #15.3/N110-M', text: 'PDSI #15.3/N110-M' },
                    { id: 'PDSI #16.2/NT45-M', text: 'PDSI #16.2/NT45-M' },
                    { id: 'PDSI #17.2/NT45-M', text: 'PDSI #17.2/NT45-M' },
                    { id: 'PDSI #18.2/LTO650-M', text: 'PDSI #18.2/LTO650-M' },
                    { id: 'PDSI #19.1/LTO350-M', text: 'PDSI #19.1/LTO350-M' },
                    { id: 'PDSI #20.2/EMSCOD2-M', text: 'PDSI #20.2/EMSCOD2-M' },
                    { id: 'PDSI #21.2/OW700-M', text: 'PDSI #21.2/OW700-M' },
                    { id: 'PDSI #22.2/OW700-M', text: 'PDSI #22.2/OW700-M' },
                    { id: 'PDSI #23.1/CWKT650-M', text: 'PDSI #23.1/CWKT650-M' },
                    { id: 'PDSI #24.1/CWKT210-M', text: 'PDSI #24.1/CWKT210-M' },
                    { id: 'PDSI #25.2/LTO750-M', text: 'PDSI #25.2/LTO750-M' },
                    { id: 'PDSI #26.1/H25CD-M', text: 'PDSI #26.1/H25CD-M' },
                    { id: 'PDSI #28.2/D1000-E', text: 'PDSI #28.2/D1000-E' },
                    { id: 'PDSI #29.3/D1500-E/53', text: 'PDSI #29.3/D1500-E/53' },
                    { id: 'PDSI #30.2/D1000-E', text: 'PDSI #30.2/D1000-E' },
                    { id: 'PDSI #31.3/D1500-E', text: 'PDSI #31.3/D1500-E' },
                    { id: 'PDSI #32.2/N80UE-E', text: 'PDSI #32.2/N80UE-E' },
                    { id: 'PDSI #33.1/IDECO/H35-M', text: 'PDSI #33.1/IDECO/H35-M' },
                    { id: 'PDSI #34.1/IDECO/H35-M', text: 'PDSI #34.1/IDECO/H35-M' },
                    { id: 'PDSI #35.1/IDECO/H35-M', text: 'PDSI #35.1/IDECO/H35-M' },
                    { id: 'PDSI #36.1/SKYTOP650-M', text: 'PDSI #36.1/SKYTOP650-M' },
                    { id: 'PDSI #38.2/D1000-E', text: 'PDSI #38.2/D1000-E' },
                    { id: 'PDSI #39.3/D1500-E/57', text: 'PDSI #39.3/D1500-E/57' },
                    { id: 'PDSI #40.3/DS1500-E', text: 'PDSI #40.3/DS1500-E' },
                    { id: 'PDSI #41.3/N110UE-E', text: 'PDSI #41.3/N110UE-E' },
                    { id: 'PDSI #42.3/N1500-E', text: 'PDSI #42.3/N1500-E' },
                    { id: 'PDSI #43.3/AB1500-E', text: 'PDSI #43.3/AB1500-E' },
                    { id: 'PDSI #44.1/PD350-M', text: 'PDSI #44.1/PD350-M' },
                    { id: 'PDSI #45.1/PD350-M', text: 'PDSI #45.1/PD350-M' },
                    { id: 'PDSI #46.1/PD350-M', text: 'PDSI #46.1/PD350-M' },
                    { id: 'PDSI #47.2/PD550-M', text: 'PDSI #47.2/PD550-M' },
                    { id: 'PDSI #48.2/PD550-M', text: 'PDSI #48.2/PD550-M' },
                    { id: 'PDSI #49.2/PD550-M', text: 'PDSI #49.2/PD550-M' },
                    { id: 'PDSI #50.2/PD550-M', text: 'PDSI #50.2/PD550-M' },
                    { id: 'PDSI #51.2/PD550-M', text: 'PDSI #51.2/PD550-M' },
                    { id: 'PDSI #52.2/PD550-M', text: 'PDSI #52.2/PD550-M' },
                    { id: 'PDSI #53.2/ZJ750-M', text: 'PDSI #53.2/ZJ750-M' },
                    { id: 'PDSI #54.2/ZJ750-M', text: 'PDSI #54.2/ZJ750-M' },
                    { id: 'PDSI #55.2/XJ550-M', text: 'PDSI #55.2/XJ550-M' },
                    { id: 'PDSI #56.2/XJ550-M', text: 'PDSI #56.2/XJ550-M' },
                    { id: 'WS BOP MUNDU JAWA', text: 'WS BOP MUNDU JAWA' },
                    { id: 'WS BOP PML SBS', text: 'WS BOP PML SBS' },
                    { id: 'BENVORS GN PUTRI', text: 'BENVORS GN PUTRI' },
                    { id: 'JMS GN PUTRI', text: 'JMS GN PUTRI' },
                    { id: 'FUJI CIKARANG', text: 'FUJI CIKARANG' },
                    { id: 'VAN DER HORST TANGERANG', text: 'VAN DER HORST TANGERANG' },
                    { id: 'JMS BALIKPAPAN', text: 'JMS BALIKPAPAN' },
                    { id: 'FUJI BALIKPAPAN', text: 'FUJI BALIKPAPAN' },
                    { id: 'REGIAN BALIKPAPAN', text: 'REGIAN BALIKPAPAN' },
                    { id: 'YARD BONGAS', text: 'YARD BONGAS' },
                    { id: 'YARD KAPETAKAN', text: 'YARD KAPETAKAN' },
                    { id: 'IDTC', text: 'IDTC' },
                    { id: 'SUNTER', text: 'SUNTER' },
                    { id: 'PLB CILINCING', text: 'PLB CILINCING' },
                    { id: 'STAGING AREA TLJ-207', text: 'STAGING AREA TLJ-207' },
                    { id: 'STAGING AREA TLJ-216', text: 'STAGING AREA TLJ-216' },
                    { id: 'YARD DURI', text: 'YARD DURI' },
                    { id: 'YARD KENALI ASAM JAMBI', text: 'YARD KENALI ASAM JAMBI' },
                    { id: 'YARD RANTAU', text: 'YARD RANTAU' }
                  ]
                });
              });
          </script>
          
          <div class="mb-3 row justify-content-center">
              <label for="pic_lokasal_woass" class="col-sm-2 col-form-label">PIC *</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="pic_lokasal_woass" name="pic_lokasal_woass" placeholder="Cth: Sonny (08123456789)" required>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="loktuj_woass" class="col-sm-2 col-form-label">Lokasi Tujuan</label>
              <div class="col-sm-5">
                  <select class="form-control" id="loktuj_woass" name="loktuj_woass"></select>
              </div>
          </div>
          
          <script>
              $(document).ready(function() {
                $('#loktuj_woass').select2({
                  tags: true,
                  data: [
                    { id: '', text: 'Pilih Lokasi Tujuan' },
                    { id: 'PDSI #01.2/N80B-M', text: 'PDSI #01.2/N80B-M' },
                    { id: 'PDSI #04.3/N110-M', text: 'PDSI #04.3/N110-M' },
                    { id: 'PDSI #05.2/OW760-M', text: 'PDSI #05.2/OW760-M' },
                    { id: 'PDSI #07.1/PD350-M', text: 'PDSI #07.1/PD350-M' },
                    { id: 'PDSI #08.1/H40D-M', text: 'PDSI #08.1/H40D-M' },
                    { id: 'PDSI #09.2/N80UE-E', text: 'PDSI #09.2/N80UE-E' },
                    { id: 'PDSI #10.2/D700-M', text: 'PDSI #10.2/D700-M' },
                    { id: 'PDSI #11.2/N80B-M', text: 'PDSI #11.2/N80B-M' },
                    { id: 'PDSI #12.3/N110-M', text: 'PDSI #12.3/N110-M' },
                    { id: 'PDSI #13.1/H40D-M', text: 'PDSI #13.1/H40D-M' },
                    { id: 'PDSI #15.3/N110-M', text: 'PDSI #15.3/N110-M' },
                    { id: 'PDSI #16.2/NT45-M', text: 'PDSI #16.2/NT45-M' },
                    { id: 'PDSI #17.2/NT45-M', text: 'PDSI #17.2/NT45-M' },
                    { id: 'PDSI #18.2/LTO650-M', text: 'PDSI #18.2/LTO650-M' },
                    { id: 'PDSI #19.1/LTO350-M', text: 'PDSI #19.1/LTO350-M' },
                    { id: 'PDSI #20.2/EMSCOD2-M', text: 'PDSI #20.2/EMSCOD2-M' },
                    { id: 'PDSI #21.2/OW700-M', text: 'PDSI #21.2/OW700-M' },
                    { id: 'PDSI #22.2/OW700-M', text: 'PDSI #22.2/OW700-M' },
                    { id: 'PDSI #23.1/CWKT650-M', text: 'PDSI #23.1/CWKT650-M' },
                    { id: 'PDSI #24.1/CWKT210-M', text: 'PDSI #24.1/CWKT210-M' },
                    { id: 'PDSI #25.2/LTO750-M', text: 'PDSI #25.2/LTO750-M' },
                    { id: 'PDSI #26.1/H25CD-M', text: 'PDSI #26.1/H25CD-M' },
                    { id: 'PDSI #28.2/D1000-E', text: 'PDSI #28.2/D1000-E' },
                    { id: 'PDSI #29.3/D1500-E/53', text: 'PDSI #29.3/D1500-E/53' },
                    { id: 'PDSI #30.2/D1000-E', text: 'PDSI #30.2/D1000-E' },
                    { id: 'PDSI #31.3/D1500-E', text: 'PDSI #31.3/D1500-E' },
                    { id: 'PDSI #32.2/N80UE-E', text: 'PDSI #32.2/N80UE-E' },
                    { id: 'PDSI #33.1/IDECO/H35-M', text: 'PDSI #33.1/IDECO/H35-M' },
                    { id: 'PDSI #34.1/IDECO/H35-M', text: 'PDSI #34.1/IDECO/H35-M' },
                    { id: 'PDSI #35.1/IDECO/H35-M', text: 'PDSI #35.1/IDECO/H35-M' },
                    { id: 'PDSI #36.1/SKYTOP650-M', text: 'PDSI #36.1/SKYTOP650-M' },
                    { id: 'PDSI #38.2/D1000-E', text: 'PDSI #38.2/D1000-E' },
                    { id: 'PDSI #39.3/D1500-E/57', text: 'PDSI #39.3/D1500-E/57' },
                    { id: 'PDSI #40.3/DS1500-E', text: 'PDSI #40.3/DS1500-E' },
                    { id: 'PDSI #41.3/N110UE-E', text: 'PDSI #41.3/N110UE-E' },
                    { id: 'PDSI #42.3/N1500-E', text: 'PDSI #42.3/N1500-E' },
                    { id: 'PDSI #43.3/AB1500-E', text: 'PDSI #43.3/AB1500-E' },
                    { id: 'PDSI #44.1/PD350-M', text: 'PDSI #44.1/PD350-M' },
                    { id: 'PDSI #45.1/PD350-M', text: 'PDSI #45.1/PD350-M' },
                    { id: 'PDSI #46.1/PD350-M', text: 'PDSI #46.1/PD350-M' },
                    { id: 'PDSI #47.2/PD550-M', text: 'PDSI #47.2/PD550-M' },
                    { id: 'PDSI #48.2/PD550-M', text: 'PDSI #48.2/PD550-M' },
                    { id: 'PDSI #49.2/PD550-M', text: 'PDSI #49.2/PD550-M' },
                    { id: 'PDSI #50.2/PD550-M', text: 'PDSI #50.2/PD550-M' },
                    { id: 'PDSI #51.2/PD550-M', text: 'PDSI #51.2/PD550-M' },
                    { id: 'PDSI #52.2/PD550-M', text: 'PDSI #52.2/PD550-M' },
                    { id: 'PDSI #53.2/ZJ750-M', text: 'PDSI #53.2/ZJ750-M' },
                    { id: 'PDSI #54.2/ZJ750-M', text: 'PDSI #54.2/ZJ750-M' },
                    { id: 'PDSI #55.2/XJ550-M', text: 'PDSI #55.2/XJ550-M' },
                    { id: 'PDSI #56.2/XJ550-M', text: 'PDSI #56.2/XJ550-M' },
                    { id: 'WS BOP MUNDU JAWA', text: 'WS BOP MUNDU JAWA' },
                    { id: 'WS BOP PML SBS', text: 'WS BOP PML SBS' },
                    { id: 'BENVORS GN PUTRI', text: 'BENVORS GN PUTRI' },
                    { id: 'JMS GN PUTRI', text: 'JMS GN PUTRI' },
                    { id: 'FUJI CIKARANG', text: 'FUJI CIKARANG' },
                    { id: 'VAN DER HORST TANGERANG', text: 'VAN DER HORST TANGERANG' },
                    { id: 'JMS BALIKPAPAN', text: 'JMS BALIKPAPAN' },
                    { id: 'FUJI BALIKPAPAN', text: 'FUJI BALIKPAPAN' },
                    { id: 'REGIAN BALIKPAPAN', text: 'REGIAN BALIKPAPAN' },
                    { id: 'YARD BONGAS', text: 'YARD BONGAS' },
                    { id: 'YARD KAPETAKAN', text: 'YARD KAPETAKAN' },
                    { id: 'IDTC', text: 'IDTC' },
                    { id: 'SUNTER', text: 'SUNTER' },
                    { id: 'PLB CILINCING', text: 'PLB CILINCING' },
                    { id: 'STAGING AREA TLJ-207', text: 'STAGING AREA TLJ-207' },
                    { id: 'STAGING AREA TLJ-216', text: 'STAGING AREA TLJ-216' },
                    { id: 'YARD DURI', text: 'YARD DURI' },
                    { id: 'YARD KENALI ASAM JAMBI', text: 'YARD KENALI ASAM JAMBI' },
                    { id: 'YARD RANTAU', text: 'YARD RANTAU' }
                  ]
                });
              });
          </script>
          
          <div class="mb-3 row justify-content-center">
              <label for="pic_loktuj_woass" class="col-sm-2 col-form-label">PIC</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="pic_loktuj_woass" name="pic_loktuj_woass" placeholder="Cth: Sonny (08123456789)">
              </div>
          </div>
          
            <div class="mb-3 row mt-5 justify-content-center">
                <div class="col-sm-5 d-flex justify-content-center">
                    <button type="submit" name="aksi" value="add" class="btn btn-success me-2">
                        <i class="fa fa-file-text me-2" aria-hidden="true"></i>Cetak WO
                    </button>
                    <a href="page-home.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply me-2" aria-hidden="true"></i>Batal
                    </a>
                </div>
            </div>
      </form>
      
        <script>
        function delayReload() {
            setTimeout(function () {
                history.scrollRestoration = 'manual';
                location.reload();
            }, 2500);
            return true; // Allows form submission to proceed
        }
        </script>
      
  </div>

</body>
</html>
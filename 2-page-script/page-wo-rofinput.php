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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <title>ESS | Create WO - RIG</title>

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
      <a class="navbar-brand text-white">CREATE WO - MRO/RIG</a>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>

  <div class="container">
    <div class="mb-3 row justify-content-center">
        <div class="card bg-warning mb-3" style="width: 90%; font-weight: bold; border-width: 0px;">
            <span class="text-center mt-3 mb-3">Buat Work Order (WO) dari RIG untuk ditujukan kepada Fungsi ASSET MANAGEMENT.</span>
        </div>
    </div>
    
      <form id="dataForm" method="POST" action="pcs-wo-ro" onsubmit="return delayReload();">
          <input type="hidden" value="<?php echo $id_woro; ?>" name="id_woro">
          
          <h5 class="text-center mt-3 mb-3">Identitas WO</h5>
          
          <div class="mb-3 row justify-content-center">
              <label for="no_woro" class="col-sm-2 col-form-label">Nomor WO</label>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="no_woro" name="no_woro" required>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="tglbuat_woro" class="col-sm-2 col-form-label">Tanggal WO</label>
              <div class="col-sm-5">
                  <input type="date" name="tglbuat_woro" class="form-control" id="tglbuat_woro" required readonly value="<?php echo date('Y-m-d'); ?>">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="asal_woro" class="col-sm-2 col-form-label">Pengirim</label>
              <div class="col-sm-5">
                <select class="form-select" id="asal_woro" name="asal_woro" required>
                    <option value="" disabled selected>Pilih Pengirim WO</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="nama_asal_woro" class="col-sm-2 col-form-label">Nama Pengirim</label>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="nama_asal_woro" name="nama_asal_woro" required>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="atasan_woro" class="col-sm-2 col-form-label">Manager RO</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="atasan_woro" name="atasan_woro" readonly>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="nama_atasan_woro" class="col-sm-2 col-form-label">Nama Manager RO</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="nama_atasan_woro" name="nama_atasan_woro" readonly>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="costc_woro" class="col-sm-2 col-form-label">Cost Center</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="costc_woro" name="costc_woro" required>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="wbs_woro" class="col-sm-2 col-form-label">WBS</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="wbs_woro" name="wbs_woro" required>
              </div>
          </div>
          
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                const data = {
                    "RO I": {
                        "atasan_woro": "Manager Rig Operation I",
                        "nama_atasan_woro": "Zainal Arifin",
                        "details": [
                            "Rig Supt. PDSI #42.3/N1500-E",
                            "Rig Supt. PDSI #49.2/PD550-M",
                            "Rig Supt. PDSI #50.2/PD550-M",
                            "Rig Supt. PDSI #51.2/PD550-M",
                            "Rig Supt. PDSI #52.2/PD550-M",
                            "Rig Supt. PDSI #53.2/ZJ750-M",
                            "Rig Supt. PDSI #54.2/ZJ750-M"
                        ]
                    },
                    "RO II": {
                        "atasan_woro": "Manager Rig Operation II",
                        "nama_atasan_woro": "Wisnu Adi Nugroho",
                        "details": [
                            "Rig Supt. PDSI #01.2/N80B-M",
                            "Rig Supt. PDSI #05.2/OW760-M",
                            "Rig Supt. PDSI #16.2/NT45-M",
                            "Rig Supt. PDSI #18.2/LTO650-M",
                            "Rig Supt. PDSI #20.2/EMSCOD2-M",
                            "Rig Supt. PDSI #29.3/D1500-E/53",
                            "Rig Supt. PDSI #30.2/D1000-E",
                            "Rig Supt. PDSI #39.3/D1500-E-(RIG 57)",
                            "Rig Supt. PDSI #41.3/N110UE-E",
                        ]
                    },
                    "RO III": {
                        "atasan_woro": "Manager Rig Operation III",
                        "nama_atasan_woro": "Lutfy Faluthi Firdaus",
                        "details": [
                            "Rig Supt. PDSI #09.2/N80UE-E",
                            "Rig Supt. PDSI #12.3/N110-M",
                            "Rig Supt. PDSI #15.3/N110-M",
                            "Rig Supt. PDSI #25.2/LTO750-M",
                            "Rig Supt. PDSI #28.2/D1000-E",
                            "Rig Supt. PDSI #31.3/D1500-E",
                            "Rig Supt. PDSI #40.3/DS1500-E",
                        ]
                    },
                    "RO IV": {
                        "atasan_woro": "Manager Rig Operation IV",
                        "nama_atasan_woro": "Andri Sulistiono",
                        "details": [
                            "Rig Supt. PDSI #04.3/N110-M",
                            "Rig Supt. PDSI #10.2/D700-M",
                            "Rig Supt. PDSI #11.2/N80B-M",
                            "Rig Supt. PDSI #21.2/OW700-M",
                            "Rig Supt. PDSI #22.2/OW700-M",
                            "Rig Supt. PDSI #32.2/N80UE-E",
                            "Rig Supt. PDSI #38.2/D1000-E",
                            "Rig Supt. PDSI #43.3/AB1500-E",
                        ]
                    },
                    "RO V": {
                        "atasan_woro": "Manager Rig Operation V",
                        "nama_atasan_woro": "Warneri",
                        "details": [
                            "Rig Supt. PDSI#47.2/PD550-M",
                            "Rig Supt. PDSI#48.2/PD550-M",
                        ]
                    },
                    "RO VI": {
                        "atasan_woro": "Manager Rig Operation VI",
                        "nama_atasan_woro": "Arif Hidayat",
                        "details": [
                            "Rig Supt. PDSI #07.1/PD350-M",
                            "Rig Supt. PDSI #23.1/CWKT650-M",
                            "Rig Supt. PDSI #24.1/CWKT210-M",
                            "Rig Supt. PDSI #26.1/H25CD-M",
                            "Rig Supt. PDSI #33.1/IDECO/H35-M",
                            "Rig Supt. PDSI #34.1/IDECO/H35-M",
                            "Rig Supt. PDSI #36.1/SKYTOP/650-M",
                            "Rig Supt. PDSI #45.1/PD350-M",
                        ]
                    },
                    "RO VII": {
                        "atasan_woro": "Manager Rig Operation VII",
                        "nama_atasan_woro": "Ardian Aminuddin",
                        "details": [
                            "Rig Supt. PDSI #08.1/H40D-M",
                            "Rig Supt. PDSI #13.1/H40D-M",
                            "Rig Supt. PDSI #17.2/NT45-M",
                            "Rig Supt. PDSI #19.1/LTO350-M",
                            "Rig Supt. PDSI #35.1/IDECO/H35-M",
                            "Rig Supt. PDSI #44.1/PD350-M",
                            "Rig Supt. PDSI #46.1/PD350-M",
                        ]
                    },
                };
            
                // Extract all "Rig Supt." values and sort them
                let allRigSupt = [];
                for (let ro in data) {
                    allRigSupt = allRigSupt.concat(data[ro].details);
                }
                
                allRigSupt.sort((a, b) => {
                    const numA = parseFloat(a.match(/#(\d+(\.\d+)?)/)[1]);
                    const numB = parseFloat(b.match(/#(\d+(\.\d+)?)/)[1]);
                    return numA - numB;
                });
            
                // Populate dropdown
                const select = document.getElementById("asal_woro");
                allRigSupt.forEach((rigSupt) => {
                    const option = document.createElement("option");
                    option.value = rigSupt;
                    option.textContent = rigSupt;
                    select.appendChild(option);
                });
            
                // Change event listener
                select.addEventListener("change", function () {
                    let selectedValue = this.value;
                    let found = false;
            
                    for (let ro in data) {
                        if (data[ro].details.includes(selectedValue)) {
                            document.getElementById("atasan_woro").value = data[ro].atasan_woro;
                            document.getElementById("nama_atasan_woro").value = data[ro].nama_atasan_woro;
                            found = true;
                            break;
                        }
                    }
            
                    if (!found) {
                        document.getElementById("atasan_woro").value = "";
                        document.getElementById("nama_atasan_woro").value = "";
                    }
                });
            });
            </script>
          
          <div class="mb-3 row justify-content-center">
              <label for="tujuan_woro" class="col-sm-2 col-form-label">Penerima</label>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="tujuan_woro" name="tujuan_woro" value="Manager Asset Management" readonly>
              </div>
          </div>
          
          <h5 class="text-center mt-5 mb-3">Rincian Permintaan</h5>
          
          <div class="mb-3 row justify-content-center">
              <label for="jenis_woro" class="col-sm-2 col-form-label">Jenis Permintaan</label>
              <div class="col-sm-5">
                <select class="form-select" id="jenis_woro" name="jenis_woro" required>
                    <option value="" disabled selected>Pilih Jenis Permintaan</option>
                    <option value="Permintaan Kebutuhan Peralatan Operasional">Kebutuhan Peralatan</option>
                    <option value="Permintaan Inspeksi Peralatan Operasional">Inspeksi Peralatan</option>
                    <option value="Permintaan Perbaikan Peralatan Operasional">Perbaikan Peralatan</option>
                    <option value="Permintaan Resertifikasi Peralatan Operasional">Resertifikasi Peralatan</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="tglperlu_woro" class="col-sm-2 col-form-label">Tanggal Diperlukan</label>
              <div class="col-sm-5">
                  <input type="date" class="form-control" id="tglperlu_woro" name="tglperlu_woro" required>
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="desc_woro" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="desc_woro" name="desc_woro">
              </div>
          </div>
        
        <h5 class="text-center mt-5 mb-3">Barang Permintaan</h5>
        
        <div id="items-container">
            <div class="mb-3 row justify-content-center">
                <div class="col-sm-1 text-end">
                    <span class="item-number">1.</span>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="barang_woro[]" placeholder="Nama Barang" required>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="qty_woro[]" placeholder="Jumlah" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="utk_woro[]" placeholder="Peruntukkan" required>
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
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="barang_woro[]" placeholder="Nama Barang" required>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="qty_woro[]" placeholder="Jumlah" required>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="utk_woro[]" placeholder="Peruntukkan" required>
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
              <label for="note_woro" class="col-sm-2 col-form-label">Catatan</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="note_woro" name="note_woro" placeholder="Kosongkan jika tidak perlu.">
              </div>
          </div>
          
          <h5 class="text-center mt-5 mb-3">Lokasi Permintaan</h5>
          
          <div class="mb-3 row justify-content-center">
              <label for="lokasal_woro" class="col-sm-2 col-form-label">Lokasi Asal</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="lokasal_woro" name="lokasal_woro" placeholder="Kosongkan jika tidak perlu.">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="pic_lokasal_woro" class="col-sm-2 col-form-label">PIC</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="pic_lokasal_woro" name="pic_lokasal_woro" placeholder="Kosongkan jika tidak perlu.">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="loktuj_woro" class="col-sm-2 col-form-label">Lokasi Tujuan</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="loktuj_woro" name="loktuj_woro" placeholder="Kosongkan jika tidak perlu.">
              </div>
          </div>
          
          <div class="mb-3 row justify-content-center">
              <label for="pic_loktuj_woro" class="col-sm-2 col-form-label">PIC</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="pic_loktuj_woro" name="pic_loktuj_woro" placeholder="Kosongkan jika tidak perlu.">
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
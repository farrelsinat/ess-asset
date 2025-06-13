<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: page-signin.php');
}

$user_role = $_SESSION['user_role'];
$no = 0;
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <title>ESS | BOP Status</title>

  <style>
    body {
      padding-top: 160px;
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
      align-items: center;
      flex-direction: row; /* Default: horizontal on desktop */
      gap: 15px;
      flex-wrap: wrap;
    }
    
    /* Responsive: Stack dropdowns vertically on small screens */
    @media (max-width: 768px) {
      .dashboard-section {
        flex-direction: column;
      }
    
      .dashboard-section select {
        width: 100% !important; /* Make dropdowns full-width on mobile */
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
  </style>

</head>

<script type="text/javascript">
  $(document).ready(function () {
    $('#dt').DataTable({
      pageLength: 10,        // Show 10 rows per page
      lengthChange: false,   // Hide "show X entries"
      searching: true,       // Enable search box
      ordering: true,        // Allow column sorting
      language: {
        search: "Cari:"
      }
    });
  });
</script>

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

  <nav class="navbar navbar-second fixed-top" style="background-color: #0dcaf0">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand text-white">STATUS UNIT - BOP</a>
    </div>
  </nav>

    <div class="d-flex justify-content-center">
      <div class="card text-white text-center mb-3" style="background-color: #000; width: 330px; box-shadow: 0px 4px 8px rgba(0,0,0,0.2); border-radius: 15px; border-width: 0px;">
        <div class="card-body p-2">
          <h5 class="mb-2" id="chartTitle" style="font-weight: bold; margin: 0; font-size: 14pt;"></h5>
          <h5 class="mb-2" id="totalCount" style="margin: 0; font-size: 12pt;"></h5>
          <h5 id="currentDate" style="margin: 0; font-size: 12pt;"></h5>
        </div>
      </div>
    </div>
    
    <script>
      function updateDateTime() {
        const dateElement = document.getElementById("currentDate");
        const now = new Date();
    
        const day = String(now.getDate()).padStart(2, '0');
        const month = now.toLocaleString('default', { month: 'short' }); // "May", "Jun", etc.
        const year = now.getFullYear();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
    
        const formattedDateTime = `Date: ${day} ${month} ${year} | Time: ${hours}:${minutes}:${seconds}`;
        dateElement.textContent = formattedDateTime;
      }
    
      updateDateTime();
      setInterval(updateDateTime, 1000);
    </script>
    
    <div class="mb-3" style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
      <!-- Chart 1: Status Validitas COC -->
      <div style="max-width: 400px; box-shadow: 0px 4px 8px rgba(0,0,0,0.2); padding: 20px; border-radius: 15px; background: #fff;">
        <h5 style="text-align:center;">Status Validitas COC</h5>
        <canvas id="statusChart1"></canvas>
        <p id="noDataMessage1" class="text-center text-muted mt-2" style="display:none;">No data available for selected filters.</p>
      </div>
      <!-- Chart 2: Status Unit -->
      <div style="max-width: 400px; box-shadow: 0px 4px 8px rgba(0,0,0,0.2); padding: 20px; border-radius: 15px; background: #fff;">
        <h5 style="text-align:center;">Status Operasional Unit</h5>
        <canvas id="statusChart2"></canvas>
        <p id="noDataMessage2" class="text-center text-muted mt-2" style="display:none;">No data available for selected filters.</p>
      </div>
    </div>

    <div class="container dashboard-section text-center">
      <label for="chartTypeSelect" class="form-label fw-bold">TIPE BAGAN :</label>
    </div>
    <div class="container dashboard-section mb-3 text-center">
      <select id="chartTypeSelect" class="form-select w-auto d-inline-block">
        <option value="doughnut" selected>Doughnut</option>
        <option value="pie">Pie</option>
      </select>
    </div>
    
    <script>
      const lokasiOptions = {
        "JAWA": ["PDSI #08.1/H40D-M", "PDSI #09.2/N80UE-E", "PDSI #12.3/N110-M", "PDSI #13.1/H40D-M", "PDSI #15.3/N110-M", "PDSI #28.2/D1000-E", "PDSI #31.3/D1500-E", "PDSI #38.2/D1000-E", "PDSI #40.3/DS1500-E", "PDSI #55.2/XJ550-M", "PDSI #56.2/XJ550-M", "WS BOP MUNDU JAWA", "YARD BONGAS", "YARD KAPETAKAN", "IDTC", "SUNTER", "PLB CILINCING"],
        "SBS": ["PDSI #01.2/N80B-M", "PDSI #05.2/OW760-M", "PDSI #07.1/PD350-M", "PDSI #16.2/NT45-M", "PDSI #18.2/LTO650-M", "PDSI #20.2/EMSCOD2-M", "PDSI #23.1/CWKT650-M", "PDSI #24.1/CWKT210-M", "PDSI #25.2/LTO750-M", "PDSI #26.1/H25CD-M", "PDSI #29.3/D1500-E/53", "PDSI #30.2/D1000-E", "PDSI #33.1/IDECO/H35-M", "PDSI #34.1/IDECO/H35-M", "PDSI #36.1/SKYTOP650-M", "PDSI #39.3/D1500-E/57", "PDSI #41.3/N110UE-E", "PDSI #44.1/PD350-M", "PDSI #45.1/PD350-M", "WS BOP PML SBS", "STAGING AREA TLJ-207", "STAGING AREA TLJ-216"],
        "JANARO": ["PDSI #17.2/NT45-M", "PDSI #19.1/LTO350-M", "PDSI #35.1/IDECO/H35-M", "PDSI #42.3/N1500-E", "PDSI #46.1/PD350-M", "PDSI #49.2/PD550-M", "PDSI #50.2/PD550-M", "PDSI #51.2/PD550-M", "PDSI #52.2/PD550-M", "PDSI #53.2/ZJ750-M", "PDSI #54.2/ZJ750-M", "YARD DURI", "YARD KENALI ASAM JAMBI", "YARD RANTAU"],
        "KTI": ["PDSI #04.3/N110-M", "PDSI #10.2/D700-M", "PDSI #11.2/N80B-M", "PDSI #21.2/OW700-M", "PDSI #22.2/OW700-M", "PDSI #32.2/N80UE-E", "PDSI #43.3/AB1500-E"],
        "OFF SHORE": ["PDSI #47.2/PD550-M", "PDSI #48.2/PD550-M"],
        "WS VENDOR": ["BENVORS GN PUTRI", "JMS GN PUTRI", "FUJI CIKARANG", "VDHI TANGERANG", "JMS BALIKPAPAN", "FUJI BALIKPAPAN", "REGIAN BALIKPAPAN"]
      };
    
      document.addEventListener("DOMContentLoaded", function () {
        const lokasiSelect = document.getElementById("lokasiBopSelect");
        const letakSelect = document.getElementById("letakBopSelect");
    
        lokasiSelect.addEventListener("change", function () {
          const selectedLokasi = lokasiSelect.value;
          const options = lokasiOptions[selectedLokasi] || [];
    
          // Clear existing options
          letakSelect.innerHTML = "<option value=''>PILIH LETAK</option>";
    
          // Add new options
          options.forEach(function (item) {
            const option = document.createElement("option");
            option.value = item;
            option.textContent = item;
            letakSelect.appendChild(option);
          });
        });
      });
    </script>
    
    <div class="container dashboard-section text-center">
      <label class="form-label fw-bold mb-2">FILTER DATA :</label>
    </div>
    <div class="container dashboard-section mb-2 text-center">
      <button id="refreshChartsBtn" class="btn btn-primary" style="font-weight: bold;"><i class="fa fa-refresh" aria-hidden="true"></i></button>
      <select id="lokasiBopSelect" class="form-select text-center" style="font-weight: bold; border-radius: 10px; width: auto;">
        <option value="">PILIH LOKASI</option>
        <option value="JAWA">JAWA</option>
        <option value="SBS">SBS</option>
        <option value="JANARO">JANARO</option>
        <option value="KTI">KTI</option>
        <option value="OFF SHORE">OFF SHORE</option>
        <option value="WS VENDOR">WS VENDOR</option>
      </select>
      <select id="letakBopSelect" class="form-select text-center" style="font-weight: bold; border-radius: 10px; width: auto;">
        <option value="">PILIH LETAK</option>
      </select>
      <select id="jenisBopSelect" class="form-select text-center" style="font-weight: bold; border-radius: 10px; width: auto;">
        <option value="">PILIH JENIS</option>
        <option value="ANNULAR">ANNULAR</option>
        <option value="SINGLE RAM">SINGLE RAM</option>
        <option value="SINGLE RAM-(SHEAR)">SINGLE RAM-(SHEAR)</option>
        <option value="DOUBLE RAM">DOUBLE RAM</option>
        <option value="DOUBLE RAM-(SHEAR)">DOUBLE RAM-(SHEAR)</option>
      </select>
      <select id="ukuranBopSelect" class="form-select text-center" style="font-weight: bold; border-radius: 10px; width: auto;">
        <option value="">PILIH UKURAN</option>
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
      <select id="tekananBopSelect" class="form-select text-center" style="font-weight: bold; border-radius: 10px; width: auto;">
        <option value="">PILIH TEKANAN</option>
        <option value='500'>500</option>
        <option value='2000'>2000</option>
        <option value='3000'>3000</option>
        <option value='5000'>5000</option>
        <option value='10000'>10000</option>
        <option value='15000'>15000</option>
      </select>
    </div>
    
    <div class="d-flex justify-content-center">
      <div class="card text mb-3" style="padding: 20px; border-radius: 15px; border-width: 0px;">
        <div class="card-body p-2">
            <h5 class="text-center" style="font-size: 10pt;">PERHATIAN!</h5>
            <h5 class="text" style="font-size: 10pt;">1. Harap pilih semua filter untuk melihat jumlah unit secara spesifik.</h5>
            <h5 class="text" style="font-size: 10pt;">2. Harap menuju halaman Dashboard atau Database untuk melihat data unit secara lengkap.</h5>
            <a href="page-astbopdsb.php" type="button" class="btn btn-primary mb-2" style="width: 100%; font-weight: bold;">
              <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            </a>
            <a href="page-astbopdtb.php" type="button" class="btn btn-warning" style="width: 100%; font-weight: bold;">
              <i class="fa fa-database" aria-hidden="true"></i> Database
            </a>
        </div>
      </div>
    </div>
    
    <!-- Bootstrap Styled Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl"> <!-- or modal-xl if you want it even wider -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="modalCloseBtn"></button>
          </div>
          <div class="modal-body">
            <!-- Table Inside Modal -->
            <div class="table-responsive">
              <table id="dt" class="table table-striped table-tertiary-color cell-border hover text-white" style="width: 100%;">
                <thead>
                  <tr class="align-middle text-center" style="font-weight: bold;">
                    <th>No.</th>
                    <th>Lokasi</th>
                    <th>Letak</th>
                    <th>Serial</th>
                    <th>Movable</th>
                    <th>Jenis</th>
                    <th>Ukuran</th>
                    <th>Tekanan</th>
                    <th>Nomor COC</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Rows will be inserted dynamically -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    
    <script>
    let chart1, chart2;
    
    // Modified to accept both filters
    function loadCharts(jenisBop = '', lokasiBop = '', letakBop = '', ukuranBop = '', tekananBop = '') {
      const chartType = document.getElementById('chartTypeSelect')?.value || '';
      // Load Chart 1
      fetch(`fct-astbopstat-coc.php?jenis_bop=${encodeURIComponent(jenisBop)}&rig_operation=${encodeURIComponent(lokasiBop)}&rig_yard=${encodeURIComponent(letakBop)}&size=${encodeURIComponent(ukuranBop)}&pressure=${encodeURIComponent(tekananBop)}`)
        .then(res => res.json())
        .then(data => {
          const chart1Canvas = document.getElementById('statusChart1');
          const noData1 = document.getElementById('noDataMessage1');
    
          if (data.length === 0) {
            chart1Canvas.style.display = 'none';
            noData1.style.display = 'block';
            document.getElementById('totalCount').textContent = `Total: 0 Unit`;
            if (chart1) chart1.destroy();
            return;
          }
    
          chart1Canvas.style.display = 'block';
          noData1.style.display = 'none';
          
          const desiredOrder = ['VALID', 'NEAR EXPIRED', 'EXPIRED', 'COC DATE UNKNOW'];
          const colorMap = {
            'VALID': '#50e991',
            'NEAR EXPIRED': '#fff066',
            'EXPIRED': '#e60049',
            'COC DATE UNKNOW': '#ffa300'
          };
          data.sort((a, b) => desiredOrder.indexOf(a.status) - desiredOrder.indexOf(b.status));
          const labels = data.map(d => d.status);
          const counts = data.map(d => Number(d.count));
          const total = counts.reduce((a, b) => a + b, 0);
          
          document.getElementById('totalCount').textContent = `Total: ${total} Unit`;
    
          if (chart1) chart1.destroy();
          chart1 = new Chart(chart1Canvas, {
            type: chartType,
            data: {
              labels: labels,
              datasets: [{
                label: 'Status Validitas COC',
                data: counts,
                backgroundColor: labels.map(l => colorMap[l]),
                borderWidth: 1
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: { position: 'bottom' },
                tooltip: {
                  callbacks: {
                    label: ctx => `${ctx.label}: ${ctx.raw} (${((ctx.raw / total) * 100).toFixed(1)}%)`
                  }
                },
                datalabels: {
                  color: '#000',
                  formatter: value => ((value / total) * 100).toFixed(1) + '%',
                  font: { weight: 'bold', size: 12 }
                }
              },
              onClick: (evt, elements) => {
              if (elements.length > 0) {
                const chartElement = elements[0];
                const clickedLabel = chart1.data.labels[chartElement.index];
                
                document.getElementById('detailModalLabel').textContent = `DETAIL DATA BOP - STATUS "${clickedLabel}"`;
            
                // get filter values
                const jenis = document.getElementById('jenisBopSelect').value;
                const lokasi = document.getElementById('lokasiBopSelect').value;
                const letak = document.getElementById('letakBopSelect').value;
                const ukuran = document.getElementById('ukuranBopSelect').value;
                const tekanan = document.getElementById('tekananBopSelect').value;
            
                fetch(`fct-astbopstat-coc-detail.php?status=${encodeURIComponent(clickedLabel)}&jenis_bop=${encodeURIComponent(jenisBop)}&rig_operation=${encodeURIComponent(lokasiBop)}&rig_yard=${encodeURIComponent(letakBop)}&size=${encodeURIComponent(ukuranBop)}&pressure=${encodeURIComponent(tekananBop)}`)
                  .then(res => res.json())
                  .then(data => {
                    if ($.fn.DataTable.isDataTable('#dt')) {
                      $('#dt').DataTable().clear().destroy();
                    }
                    const tbody = document.querySelector("#dt tbody");
                    tbody.innerHTML = ""; // Clear old data
                    data.forEach((row, index) => {
                      const tr = document.createElement("tr");
                      tr.innerHTML = `<td class="text-center">${index + 1}</td>
                                      <td class="text-center">${row.rig_operation}</td>
                                      <td class="text-center">${row.rig_yard}</td>
                                      <td class="text-center">${row.sn_bop}</td>
                                      <td class="text-center">${row.no_mov}</td>
                                      <td class="text-center">${row.jenis_bop}</td>
                                      <td class="text-center">${row.size}</td>
                                      <td class="text-center">${row.pressure}</td>
                                      <td class="text-center">${row.no_coc}</td>
                                      <td class="text-center">${row.status}</td>`;
                      tbody.appendChild(tr);
                    });
                    $('#dt').DataTable({
                      pageLength: 10,
                      destroy: true
                    });
                    showDetailModal();
                  });
                }
              }
            },
            plugins: [ChartDataLabels]
          });
        });
    
      // Load Chart 2
      fetch(`fct-astbopstat-unit.php?jenis_bop=${encodeURIComponent(jenisBop)}&rig_operation=${encodeURIComponent(lokasiBop)}&rig_yard=${encodeURIComponent(letakBop)}&size=${encodeURIComponent(ukuranBop)}&pressure=${encodeURIComponent(tekananBop)}`)
        .then(res => res.json())
        .then(data => {
          const chart2Canvas = document.getElementById('statusChart2');
          const noData2 = document.getElementById('noDataMessage2');
    
          if (data.length === 0) {
            chart2Canvas.style.display = 'none';
            noData2.style.display = 'block';
            document.getElementById('totalCount').textContent = `Total: 0 Unit`;
            if (chart2) chart2.destroy();
            return;
          }
    
          chart2Canvas.style.display = 'block';
          noData2.style.display = 'none';
      
          const desiredOrder = ['ON SITE', 'RE-COC/REPAIR', 'OUT OF SERVICE'];
          const colorMap = {
            'ON SITE': '#50e991',
            'RE-COC/REPAIR': '#fff066',
            'OUT OF SERVICE': '#e60049'
          };
          data.sort((a, b) => desiredOrder.indexOf(a.status) - desiredOrder.indexOf(b.status));
          const labels = data.map(d => d.status);
          const counts = data.map(d => Number(d.count));
          const total = counts.reduce((a, b) => a + b, 0);
    
          if (chart2) chart2.destroy();
          chart2 = new Chart(chart2Canvas, {
            type: chartType,
            data: {
              labels: labels,
              datasets: [{
                label: 'Status Unit',
                data: counts,
                backgroundColor: labels.map(l => colorMap[l]),
                borderWidth: 1
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: { position: 'bottom' },
                tooltip: {
                  callbacks: {
                    label: ctx => `${ctx.label}: ${ctx.raw} (${((ctx.raw / total) * 100).toFixed(1)}%)`
                  }
                },
                datalabels: {
                  color: '#000',
                  formatter: value => ((value / total) * 100).toFixed(1) + '%',
                  font: { weight: 'bold', size: 12 }
                }
              },
              onClick: (evt, elements) => {
                if (elements.length > 0) {
                  const chartElement = elements[0];
                  const clickedLabel = chart2.data.labels[chartElement.index];
            
                  document.getElementById('detailModalLabel').textContent = `DETAIL DATA BOP - STATUS "${clickedLabel}"`;
            
                  const jenis = document.getElementById('jenisBopSelect').value;
                  const lokasi = document.getElementById('lokasiBopSelect').value;
                  const letak = document.getElementById('letakBopSelect').value;
                  const ukuran = document.getElementById('ukuranBopSelect').value;
                  const tekanan = document.getElementById('tekananBopSelect').value;
            
                  fetch(`fct-astbopstat-unit-detail.php?status=${encodeURIComponent(clickedLabel)}&jenis_bop=${encodeURIComponent(jenis)}&rig_operation=${encodeURIComponent(lokasi)}&rig_yard=${encodeURIComponent(letakBop)}&size=${encodeURIComponent(ukuran)}&pressure=${encodeURIComponent(tekanan)}`)
                    .then(res => res.json())
                    .then(data => {
                      if ($.fn.DataTable.isDataTable('#dt')) {
                        $('#dt').DataTable().clear().destroy();
                      }
                      const tbody = document.querySelector("#dt tbody");
                      tbody.innerHTML = ""; // Clear old data
                      data.forEach((row, index) => {
                        const tr = document.createElement("tr");
                        tr.innerHTML = `<td class="text-center">${index + 1}</td>
                                        <td class="text-center">${row.rig_operation}</td>
                                        <td class="text-center">${row.rig_yard}</td>
                                        <td class="text-center">${row.sn_bop}</td>
                                        <td class="text-center">${row.no_mov}</td>
                                        <td class="text-center">${row.jenis_bop}</td>
                                        <td class="text-center">${row.size}</td>
                                        <td class="text-center">${row.pressure}</td>
                                        <td class="text-center">${row.no_coc}</td>
                                        <td class="text-center">${row.status}</td>`;
                        tbody.appendChild(tr);
                      });
                      $('#dt').DataTable({
                        pageLength: 10,
                        destroy: true
                      });
                      showDetailModal();
                    });
                }
              }
            },
            plugins: [ChartDataLabels]
          });
        });
    }
    
    document.getElementById('modalCloseBtn').addEventListener('click', function () {
        const modalElement = document.getElementById('detailModal');
        const modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    });

    function showDetailModal() {
      const modal = new bootstrap.Modal(document.getElementById('detailModal'));
      modal.show();
    }
    
    // Update charts on either filter change
    function updateChartsFromDropdowns() {
      const jenis = document.getElementById('jenisBopSelect').value;
      const lokasi = document.getElementById('lokasiBopSelect').value;
      const letak = document.getElementById('letakBopSelect').value;
      const ukuran = document.getElementById('ukuranBopSelect').value;
      const tekanan = document.getElementById('tekananBopSelect').value;
      
      const titleElement = document.getElementById('chartTitle');
    
      if (!jenis && !lokasi && !letak && !ukuran && !tekanan) {
        titleElement.textContent = "DATA KESELURUHAN";
      } else {
        titleElement.textContent = `${lokasi} - ${letak} - ${jenis} - ${ukuran} - ${tekanan}`.replace(/ - $/, '');
      }
    
      loadCharts(jenis, lokasi, letak, ukuran, tekanan);
    }
    
    // Event listeners
    document.getElementById('jenisBopSelect').addEventListener('change', updateChartsFromDropdowns);
    document.getElementById('lokasiBopSelect').addEventListener('change', updateChartsFromDropdowns);
    document.getElementById('letakBopSelect').addEventListener('change', updateChartsFromDropdowns);
    document.getElementById('ukuranBopSelect').addEventListener('change', updateChartsFromDropdowns);
    document.getElementById('tekananBopSelect').addEventListener('change', updateChartsFromDropdowns);
    document.getElementById('chartTypeSelect').addEventListener('change', updateChartsFromDropdowns);
    
    // Initial load
    document.getElementById('chartTitle').textContent = "DATA KESELURUHAN";
    document.getElementById('totalCount').textContent = "Total: 0 Unit";
    loadCharts();
    
    // Refresh button resets filters
    document.getElementById('refreshChartsBtn').addEventListener('click', () => {
      document.getElementById('jenisBopSelect').value = "";
      document.getElementById('lokasiBopSelect').value = "";
      document.getElementById('letakBopSelect').value = "";
      document.getElementById('ukuranBopSelect').value = "";
      document.getElementById('tekananBopSelect').value = "";
      
      loadCharts();
      document.getElementById('chartTitle').textContent = "DATA KESELURUHAN";
      document.getElementById('totalCount').textContent = "Total: 0 Unit";
    });
    </script>
    
    <script>
        setInterval(() => {
            fetch('pcs-akun-heartbeat.php');
        }, 30000); // Sends ping every 1 minute
    </script>

</body>

</html>
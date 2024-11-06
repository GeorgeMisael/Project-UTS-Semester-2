<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Management' }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> --}}
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('skydash-free/dist') }}/assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('skydash-free/dist') }}/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('skydash-free/dist') }}/assets/images/favicon.png" />

    {{-- HTML2PDF --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <!-- Highcharts library -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  </head>

<body>
    <div class="container-scroller">

<!-- partial:partials/_navbar.html -->
<x-navbar/>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_sidebar.html -->
<x-sidebar/>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    @isset($heading)
      <header>
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h2 class="font-weight-bold">{{ $heading }}</h2>
                @isset($description)
                <h4 class="card-description"> {{ $description }} </h4>
                @endisset
              </div>
            </div>
          </div>
        </div>
      </header>
    @endisset
    
    <div class="card">
  
      {{ $slot }}

    </div>
  

  </div>
  <!-- content-wrapper ends -->

<!-- partial:partials/_footer.html -->
<x-footer/>
<!-- partial -->
</div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('skydash-free/dist') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('skydash-free/dist') }}/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="{{ asset('skydash-free/dist') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="{{ asset('skydash-free/dist') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('skydash-free/dist') }}/assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('skydash-free/dist') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('skydash-free/dist') }}/assets/js/template.js"></script>
    <script src="{{ asset('skydash-free/dist') }}/assets/js/settings.js"></script>
    <script src="{{ asset('skydash-free/dist') }}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('skydash-free/dist') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{ asset('skydash-free/dist') }}/assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
        // Fungsi untuk memuat data gempa
        function loadEarthquakes() {
            $.ajax({
                url: 'https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const gempa = data.Infogempa.gempa; // Akses data gempa
                    const tbody = $('#earthquake-table');
                    tbody.empty(); // Kosongkan tabel sebelum mengisi data baru

                    // Buat baris baru untuk data gempa
                    const row = `
                        <tr>
                            <td>${gempa.Tanggal}</td>
                            <td>${gempa.Jam}</td>
                            <td>${gempa.Coordinates}</td>
                            <td>${gempa.Magnitude}</td>
                            <td>${gempa.Kedalaman}</td>
                            <td>${gempa.Wilayah}</td>
                            <td>${gempa.Potensi}</td>
                        </tr>
                    `;
                    tbody.append(row); // Tambahkan baris ke tabel
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        
        // Panggil fungsi loadEarthquakes ketika halaman selesai dimuat
        loadEarthquakes();
      });
      </script>

    <script>
      let  table= new DataTable('#myTable');
    </script>
    
    {{-- datatable --}}
    <script>
      $(document).ready(function() {
        // Inisialisasi DataTables dengan pengaturan gaya agar tetap memakai SkyDash UI
        $('#myTable').DataTable({
          paging: true,
          searching: true,
          ordering: true,
          info: true,
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
          // Tambahkan opsi berikut untuk menonaktifkan gaya DataTables
          "autoWidth": false, // Hapus Auto Width jika bentrok dengan gaya SkyDash
          "bInfo": false, // Hilangkan elemen info jika ingin SkyDash info
        });
      });
    </script>


  </body>
</html>
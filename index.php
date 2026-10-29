<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PT. ACTEM</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
        PT. ACTEM
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php"><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div> Home</a>
                        <a class="nav-link" href="layout-static.php"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> Karyawan</a>
                        <a class="nav-link" href="dept.php"><div class="sb-nav-link-icon"><i class="fas fa-building"></i></div> Departemen</a>
                        <a class="nav-link" href="jabatan.php"><div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div> Jabatan</a>
                        <a class="nav-link" href="logout.php"><div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div> Logout</a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content"> 
            <main>
                <div class="container-fluid">
                    
                    <!-- Profil Data Karyawan -->
                    <h5 class="mt-4">PROFIL DATA KARYAWAN</h5>
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>NIK</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No. Handphone</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilDataKaryawan = mysqli_query($conn, "SELECT * FROM inputkaryawan");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($ambilDataKaryawan)) {
                                            echo "<tr>
                                                <td>{$i}</td>
                                                <td>{$data['namakaryawan']}</td>
                                                <td>{$data['nik']}</td>
                                                <td>{$data['tglmasuk']}</td>
                                                <td>{$data['jnskelamin']}</td>
                                                <td>{$data['alamat']}</td>
                                                <td>{$data['nohp']}</td>
                                                <td>{$data['status']}</td>
                                            </tr>";
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Data Departemen -->
                    <h5 class="mt-4">DATA DEPARTEMEN</h5>
                    <div class="row">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Departemen</th>
                                            <th>Nama Departemen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilDataDepartemen = mysqli_query($conn, "SELECT * FROM departemen");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($ambilDataDepartemen)) {
                                            echo "<tr>
                                                <td>{$i}</td>
                                                <td>{$data['iddepartemen']}</td>
                                                <td>{$data['namadepartemen']}</td>
                                            </tr>";
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--tabel jabatan-->
                    <h5 class="mt-4">DATA JABATAN</h5>
                    <div class="row">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Jabatan</th>
                                            <th>Nama Jabatan</th>
                                            <th>Tunjangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilDataJabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($ambilDataJabatan)) {
                                            echo "<tr>
                                                <td>{$i}</td>
                                                <td>{$data['idjabatan']}</td>
                                                <td>{$data['namajabatan']}</td>
                                                <td>{$data['tunjangan']}</td>
                                            </tr>";
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "dom": 't', // Menghilangkan search bar
            "paging": true, // Tetap ada pagination
            "ordering": true, // Tetap bisa diurutkan
            "info": false // Menghilangkan "Showing X of Y entries"
        });

        $('#dataTable2').DataTable({
            "dom": 't',
            "paging": true,
            "ordering": true,
            "info": false
        });

        $('#dataTable3').DataTable({
            "dom": 't',
            "paging": true,
            "ordering": true,
            "info": false
        });
    });
</script>

</body>
</html>

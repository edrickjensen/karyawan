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
            
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
         
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="index.php"><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div> Home</a>
                        <a class="nav-link" href="layout-static.php"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> Karyawan</a>
                        <a class="nav-link" href="dept.php"><div class="sb-nav-link-icon"><i class="fas fa-building"></i></div> Departemen</a> 
                        <a class="nav-link" href="jabatan.php"><div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div> Jabatan</a>
                        <a class="nav-link" href="logout.php"><div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div> Logout</a>
                </nav>
            </div>
            <div id="layoutSidenav_content"> 
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Departemen</h1>

                        <div class="row">
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                 <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Input Data Departemen
                            </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Departemen</th>
                                                <th>Nama Departemen</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatadepartemen = mysqli_query($conn,"select * from departemen");
                                        $i=1;
                                        while($data = mysqli_fetch_array($ambilsemuadatadepartemen)){
                                           
                                            $iddepartemen = $data['iddepartemen'];
                                            $namadepartemen = $data['namadepartemen'];
                                            $iddpt = $data['iddpt'];
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$iddepartemen;?></td>
                                            <td><?=$namadepartemen;?></td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?=$data['iddpt'];?>">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?=$data['iddpt'];?>">
                                                    Delete
                                                </button>
                                            </td>


                                        </tr>
                                        <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal<?=$data['iddpt'];?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Departemen</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form method="post" action="proses.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="idjbt" value="<?=$data['iddpt'];?>">

                                                                <input type="text" name="iddepartemen" value="<?=$data['iddepartemen'];?>" class="form-control" required>
                                                                <br>
                                                                <input type="text" name="namadepartemen" value="<?=$data['namadepartemen'];?>" class="form-control" required>
                                                                <br>
                                                                <button type="submit" class="btn btn-primary" name="editdepartemen">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <!-- Modal Delete -->
                                            <div class="modal fade" id="deleteModal<?=$data['iddpt'];?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form method="post" action="proses.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="iddpt" value="<?=$data['iddpt'];?>">
                                                                <p>Apakah Anda yakin ingin menghapus data jabatan <b><?=$data['namadepartemen'];?></b>?</p>
                                                                <button type="submit" class="btn btn-danger" name="deletedepartemen">Hapus</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    };

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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>


      <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Input Data Departemen</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
         <form method="post">
        <div class="modal-body">
           
                <?php
                    $ambilsemuadatanya = mysqli_query($conn,"select * from departemen");
                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                        $iddpt = $fetcharray['iddpt'];
                        $iddepartemen = $fetcharray['iddepartemen'];
                        $namadepartemen = $fetcharray['namadepartemen'];
                        
                        
                       

                    }
                    
                    ?>
            
            <input type="text" name="iddepartemen" placeholder="Id Departemen" class="form-control"required>
            <br>
            <input type="text" name="namadepartemen" placeholder="Nama Departemen" class="form-control" required>     
            <br>
            <button type="submit" class="btn btn-primary" name="adddepartemen">Submit</button>
        </div>   
        </form>
      </div>
    </div>
  </div>
</html>
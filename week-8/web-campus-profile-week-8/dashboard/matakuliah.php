<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <?php
    session_start();
    if(empty($_SESSION["user"])) {
      header("location:login_admin.php");
    }
  ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_home.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>

      <?php if($_SESSION["user"] == "admin"):?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Kelola Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin Access</h6>
            <a class="collapse-item" href="dosen.php">Data Dosen</a>
            <a class="collapse-item" href="mahasiswa.php">Data Mahasiswa</a>
            <a class="collapse-item" href="#">Data Mata Kuliah</a>
          </div>
        </div>
      </li>
      <?php endif; ?>
      
      <li class="nav-item">
        <a class="nav-link" href="pilih_matakuliah.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Pilih Mata Kuliah</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php  echo $_SESSION["user"];?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          
          <!--Row-->
          <div class="row">
            <div class="col-lg-12 mb-5 text-center">
              <h3>Hello <?php echo $_SESSION["user"]; ?>, Welcome to the dashboard.</h3>
            </div>
          </div>

          <!-- Alert -->
          <div class="row">
            <div class="col-lg-12 mb-2">
                <?php
                  if(isset($_GET["alert"])){
                    isset($_GET["message"]) ? $message = $_GET["message"] : $message = "";  
                    // $message = $_GET["message"];
                    if($_GET["alert"] == "actionSuccess"){
                    echo
                      '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully ! </strong>'.$message.
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>'; }
                      else if($_GET["alert"] == "actionFailed"){
                      echo
                      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed ! </strong>'.$message.
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    } ?>
            <?php } ?>
            </div>
          </div>

          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List Courses</h6>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                    Add Data +
                  </button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                        $conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
                        $No =1;
                        $data = mysqli_query($conn, "SELECT * FROM mata_kuliah ORDER BY kode_mk ASC");
                        while($row = mysqli_fetch_array($data)){
                      ?>
                          <tr>
                            <td><?php echo $No++; ?></td>
                            <td><?php echo $row["kode_mk"]; ?></td>
                            <td><?php echo $row["nama_mk"]; ?></td>
                            <td><?php echo $row["sks"]; ?></td>
                            <td><?php echo $row["semester"]; ?></td>
                            <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-<?php echo $row["kode_mk"]; ?>">
                                    <i class="fa fa-wrench mr-2"></i>Edit
                                  </button>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?php echo $row["kode_mk"]; ?>">
                                    <i class="fa fa-trash mr-2"></i>Delete
                                  </button>
                              </div>
                            </td>
                          </tr>

                          <!-- Modal Edit -->
                          <div class="modal fade" id="editModal-<?php echo $row["kode_mk"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Update Data Mata Kuliah</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="proses_crud.php" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="action" value="updateMatkul">
                                    <input type="hidden" name="kode_mk" value="<?php echo $row["kode_mk"]; ?>"> 
                                    <div class="form-group mb-2">
                                        <label for="kode_mk">Kode Mata Kuliah</label>
                                        <input type="number" name="kode_mk" class="form-control" id="kode_mk" value="<?php echo $row["kode_mk"]; ?>" disabled>   
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="nama_mk">Nama Mata Kuliah</label>
                                        <input type="text" name="nama_mk" class="form-control" id="nama_mk" value="<?php echo $row["nama_mk"]; ?>" required>   
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="sks">SKS</label>
                                        <input type="number" name="sks" class="form-control" id="sks" value="<?php echo $row["sks"]; ?>" required>   
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="semester">Semester</label>
                                        <input type="number" name="semester" class="form-control" id="semester" value="<?php echo $row["semester"]; ?>" required>   
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                  </form>
                                </div> 
                              </div>
                            </div>
                          </div>


                          <!-- Modal Delete -->
                          <div class="modal fade" id="deleteModal-<?php echo $row["kode_mk"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                              aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Confirmation Action !</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure you want to delete data <?php echo $row["nama_mk"]; ?> ?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <a href="proses_crud.php?kode_mk=<?php echo $row["kode_mk"]; ?>&action=deleteMatkul" class="btn btn-danger">Delete</a>
                                  </div>
                                </div>
                              </div>
                            </div>

                        <?php 
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List Students Has Choosen their Courses</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                        $conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
                        $No =1;
                        $data = mysqli_query($conn, "SELECT * FROM matkul_mhs ORDER BY id ASC");
                        while($row = mysqli_fetch_array($data)){
                      ?>
                          <tr>
                            <td><?php echo $No++; ?></td>
                            <td><?php echo $row["nim"]; ?></td>
                            <td><?php echo $row["kode_mk"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["course"]; ?></td>
                            <td><?php echo $row["sks"]; ?></td>
                            <td><?php echo $row["semester"]; ?></td>
                          </tr>
                        <?php 
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <!-- Modal Create-->
          <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create New Data Mata Kuliah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="proses_crud.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="action" value="createMatkul">
                    <div class="form-group mb-2">
                        <label for="kode_mk">Kode Mata Kuliah</label>
                        <input type="number" name="kode_mk" class="form-control" id="kode_mk" required>   
                    </div>
                    <div class="form-group mb-2">
                        <label for="nama_mk">Nama Mata Kuliah</label>
                        <input type="text" name="nama_mk" class="form-control" id="nama_mk" required>   
                    </div>
                    <div class="form-group mb-2">
                        <label for="sks">SKS</label>
                        <input type="number" name="sks" class="form-control" id="sks" required>   
                    </div>
                    <div class="form-group mb-2">
                        <label for="semester">Semester</label>
                        <input type="number" name="semester" class="form-control" id="semester" required>   
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                  </form>
                </div> 
              </div>
            </div>
          </div>

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="isLogout.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - template admin by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>
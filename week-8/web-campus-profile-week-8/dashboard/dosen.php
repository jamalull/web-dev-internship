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
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Kelola Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin Access</h6>
            <a class="collapse-item" href="#">Data Dosen</a>
            <a class="collapse-item" href="mahasiswa.php">Data Mahasiswa</a>
            <a class="collapse-item" href="matakuliah.php">Data Mata Kuliah</a>
          </div>
        </div>
      </li>
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
                  <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
                  <a href="dosen.php" class="btn btn-primary">Add Data +</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                        $conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
                        $No =1;
                        $data = mysqli_query($conn, "SELECT * FROM dosen ORDER BY id ASC");
                        while($row = mysqli_fetch_array($data)){
                      ?>
                          <tr>
                            <td><?php echo $No++; ?></td>
                            <td><?php echo $row["nip"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["course"]; ?></td>
                            <td>
                              <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-<?php echo $row["id"]; ?>">
                                    <i class="fa fa-wrench mr-2"></i>Edit
                                  </button>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?php echo $row["id"]; ?>">
                                    <i class="fa fa-trash mr-2"></i>Delete
                                  </button>
                              </div>
                            </td>
                          </tr>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="editModal-<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Dosen</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="proses_crud.php" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="action" value="updateDosen">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <div class="form-group mb-2">
                                        <label for="id">ID</label>
                                        <input type="text" name="id" class="form-control" id="id" value="<?php echo $row["id"]; ?>" required disabled>   
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="nip">NIP</label>
                                        <input type="text" name="nip" class="form-control" id="nip" value="<?php echo $row["nip"]; ?>" required>   
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $row["name"]; ?>" required>   
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="course">Course</label>
                                        <input type="text" name="course" class="form-control" id="course" value="<?php echo $row["course"]; ?>" required>   
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                  </form>
                                </div> 
                              </div>
                            </div>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal-<?php echo $row["nim"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
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
                                    <p>Are you sure you want to delete data <?php echo $row["name"]; ?> ?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <a href="proses_crud.php?nim=<?php echo $row["id"]; ?>&action=deleteDosen" class="btn btn-danger">Delete</a>
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


          <!-- Modal Create-->
          <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create New Data Dosen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="proses_crud.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="action" value="createDosen">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <div class="form-group mb-2">
                        <label for="id">ID</label>
                        <input type="text" name="id" class="form-control" id="id" required disabled>   
                    </div>
                    <div class="form-group mb-2">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" required>   
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>   
                    </div>
                    <div class="form-group mb-2">
                        <label for="course">Course</label>
                        <input type="text" name="course" class="form-control" id="course" required>   
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
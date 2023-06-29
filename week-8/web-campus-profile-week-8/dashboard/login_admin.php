<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">

  <?php 
    session_start();
    if(!empty($_SESSION["user"])) {
      header("location:dashboard_home.php");
    }
  ?>

  <?php 
  $conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
          
  // Check connection
  if($conn === false){
      die("ERROR: Could not connect. "
          . mysqli_connect_error());
  }

  //Define the variable for store data from input form
  $email  = $password = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $email = test_input($_POST["email"]);
      $password = test_input($_POST["password"]);
      $userType = test_input($_POST["userType"]);
  }
  //this function for validate that the data is safe from any threat or malicious code
  function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["submit"]))){
    if($userType == "admin") {
      $sql = "SELECT id, name, email FROM account_admin WHERE email = '$email' AND password = '$password'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        session_start();
        header("location:dashboard_home.php");
        $_SESSION["user"]= $userType;

      // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<center>Your Login Successfully with " .
                "id: " . $row["id"]. " - Name: " . $row["name"]. "- Email: " . $row["email"]. "<br>" ."</center>";
        }
        } else { echo "<center>0 results</center>"; }
        $conn->close();
    }
    else if($userType == "students") {
      $sql = "SELECT id, name, email FROM account_mhs WHERE email = '$email' AND password = '$password'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        session_start();
        header("location:dashboard_home.php");
        $_SESSION["user"]= $userType;

      // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<center>Your Login Successfully with " .
                "id: " . $row["id"]. " - Name: " . $row["name"]. "- Email: " . $row["email"]. "<br>" ."</center>";
        }
        } else { echo "<center>0 results</center>"; }
        $conn->close();
    }
    
  }

  ?>
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <select class="form-group form-control mb-3" name="userType" required>
                      <option value="">Select Your Type User</option>
                      <option value="admin">Admin</option>
                      <option value="students">Students</option>
                    </select>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck" required>
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input class="btn btn-primary btn-block" name="submit" required type="submit" value="Submit">
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="../home.html">Back to Homepage !</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>
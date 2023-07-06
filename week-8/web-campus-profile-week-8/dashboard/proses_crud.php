<?php 

// ===========================================
// Section CRUD for mahasiswa from db_mahasiswa
// ===========================================
$conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
$dataMhs = mysqli_query($conn, "SELECT * FROM mahasiswa"); //check for DB Mahasiswa the data is already or empty.
$rowMhs = mysqli_fetch_array($dataMhs);

//Create New Data Mahasiswa
if($rowMhs > 0){
  if($_POST["action"] == "createStudents") {
    if(isset($_POST["nim"]) && isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["birthplace"])
      && isset($_POST["address"])){
      
      $nim = $_POST["nim"];
      $name = $_POST["name"];
      $gender = $_POST["gender"];
      $birthplace = $_POST["birthplace"];
      $address = $_POST["address"];
      
      mysqli_query($conn, "INSERT INTO mahasiswa VALUES('$nim','$name','$gender','$birthplace','$address')");
      
      $message = "Your data successfull stored on the database.";
      header("location:mahasiswa.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Can't create new data.";
      header("location:mahasiswa.php?alert=actionFailed&message=$message");
    }
  }
  else if ($_POST["action"] == "updateStudents") {
    if(isset($_POST["nim"]) && isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["birthplace"]) 
      && isset($_POST["address"])){
      
      $nim = $_POST["nim"];
      $name = $_POST["name"];
      $gender = $_POST["gender"];
      $birthplace = $_POST["birthplace"];
      $address = $_POST["address"];
      
      mysqli_query($conn, "UPDATE mahasiswa SET nama='$name', jenis_kelamin='$gender', ttl='$birthplace', alamat='$address' WHERE nim='$nim'");
      
      $message = "Your data successfull updated on the database.";
      header("location:mahasiswa.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Can't update your data.";
      header("location:mahasiswa.php?alert=actionFailed&message=$message");
    }
  }
  else if ($_GET["action"] == "deleteStudents") {
    if(isset($_GET["nim"]) && $_GET["action"] == "deleteStudents"){
      $get_nim = $_GET["nim"];
      // mysqli_query($conn, "delete from mahasiswa where nim='$get_nim'");
      mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim='$get_nim'");
      $message = "Data success to delete with NIM : ".$get_nim;
      header("location:mahasiswa.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Data NIM is Null";
      header("location:mahasiswa.php?alert=actionFailed&message=$message");
    }
  }
}
else{
  $message = "Error! Your Data is Empty on db_mahasiswa in field mahasiswa";
  header("location:mahasiswa.php?alert=actionFailed&message=$message");
}

//Update Data Mahasiswa
// if($rowMhs > 0){
//   if(isset($_POST["nim"]) && isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["birthplace"]) 
//     && isset($_POST["address"]) && ($_POST["action"] == "updateStudents")){
    
//     $nim = $_POST["nim"];
//     $name = $_POST["name"];
//     $gender = $_POST["gender"];
//     $birthplace = $_POST["birthplace"];
//     $address = $_POST["address"];
    
//     mysqli_query($conn, "UPDATE mahasiswa SET nama='$name', jenis_kelamin='$gender', ttl='$birthplace', alamat='$address' WHERE nim='$nim'");
    
//     $message = "Your data successfull updated on the database.";
//     header("location:mahasiswa.php?alert=actionSuccess&message=$message");
//   }
//   else{
//     $message = "Error! Something Went Wrong. Can't update your data.";
//     header("location:mahasiswa.php?alert=actionFailed&message=$message");
//   }
// } 
// else{
//   $message = "Error! Your Data is Empty on db_mahasiswa in field mahasiswa";
//   header("location:mahasiswa.php?alert=actionFailed&message=$message");
// }

// //Delete Data Mahasiswa Based on ID/NIM
// if($rowMhs > 0){
//   if(isset($_GET["nim"]) && $_GET["action"] == "deleteStudents"){
//     $get_nim = $_GET["nim"];
//     // mysqli_query($conn, "delete from mahasiswa where nim='$get_nim'");
//     mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim='$get_nim'");
//     $message = "Data success to delete with NIM : ".$get_nim;
//     header("location:mahasiswa.php?alert=actionSuccess&message=$message");
//   }
//   else{
//     $message = "Error! Something Went Wrong. Data NIM is Null";
//     header("location:mahasiswa.php?alert=actionFailed&message=$message");
//   }
// } 
// else{
//   $message = "Error! Your Data is Empty on db_mahasiswa in field mahasiswa";
//   header("location:mahasiswa.php?alert=actionFailed&message=$message");
// }

// ===========================================
// Section CRUD for dosen from db_mahasiswa
// ===========================================

$dataDosen = mysqli_query($conn, "SELECT * FROM dosen"); //check for DB Mahasiswa the data is already or empty.
$row = mysqli_fetch_array($dataDosen);







$dataMatkul = mysqli_query($conn, "SELECT * FROM mata_kuliah"); //check for DB Mahasiswa the data is already or empty.
$row = mysqli_fetch_array($dataMatkul);
?>
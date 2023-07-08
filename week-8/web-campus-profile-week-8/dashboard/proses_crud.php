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
  //Update Data Mahasiswa
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
  //Delete Data Mahasiswa
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



// ===========================================
// Section CRUD for dosen from db_mahasiswa
// ===========================================

$dataDosen = mysqli_query($conn, "SELECT * FROM dosen"); //check for DB Mahasiswa the data is already or empty.
$rowDosen = mysqli_fetch_array($dataDosen);

if($rowDosen > 0){
  //Create New Data Dosen
  if($_POST["action"] == "createDosen") {
    if(isset($_POST["nip"]) && isset($_POST["name"]) && isset($_POST["course"])){
      
      $nip = $_POST["nip"];
      $name = $_POST["name"];
      $course = $_POST["course"];
      
      mysqli_query($conn, "INSERT INTO dosen VALUES('','$nip','$name','$course')");
      
      $message = "Your data successfull stored on the database.";
      header("location:dosen.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Can't create new data.";
      header("location:dosen.php?alert=actionFailed&message=$message");
    }
  }
  //Update Data Dosen
  else if ($_POST["action"] == "updateDosen") {
    if(isset($_POST["nip"]) && isset($_POST["name"]) && isset($_POST["course"])){
      
      $id = $_POST["id"];
      $nip = $_POST["nip"];
      $name = $_POST["name"];
      $course = $_POST["course"];
      
      mysqli_query($conn, "UPDATE dosen SET nip='$nip', name='$name', course='$course' WHERE id='$id'");
      
      $message = "Your data successfull updated on the database.";
      header("location:dosen.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Can't update your data.";
      header("location:dosen.php?alert=actionFailed&message=$message");
    }
  }
  //Delete Data Dosen
  else if ($_GET["action"] == "deleteDosen") {
    if(isset($_GET["id"]) && $_GET["action"] == "deleteDosen"){
      $id = $_GET["id"];
      //     // mysqli_query($conn, "delete from mahasiswa where nim='$get_nim'");
      mysqli_query($conn, "DELETE FROM dosen WHERE id='$id'");
      $message = "Data success to delete with ID : ".$id;
      header("location:dosen.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Data NIM is Null";
      header("location:dosen.php?alert=actionFailed&message=$message");
    }
  }
}
else{
  $message = "Error! Your Data is Empty on db_mahasiswa in field mahasiswa";
  header("location:dosen.php?alert=actionFailed&message=$message");
}

// ===============================================
// Section CRUD for mata_kuliah from db_mahasiswa
// ===============================================

$dataMatkul = mysqli_query($conn, "SELECT * FROM mata_kuliah"); //check for DB Mahasiswa the data is already or empty.
$rowMatkul = mysqli_fetch_array($dataMatkul);


if($rowMatkul > 0){
  //Create New Data Mata Kuliah
  if($_POST["action"] == "createMatkul") {
    if(isset($_POST["kode_mk"]) && isset($_POST["nama_mk"]) && isset($_POST["sks"]) && isset($_POST["semester"])){
      
      $kode_mk = $_POST["kode_mk"];
      $nama_mk = $_POST["nama_mk"];
      $sks = $_POST["sks"];
      $semester = $_POST["semester"];
      
      mysqli_query($conn, "INSERT INTO mata_kuliah VALUES('$kode_mk','$nama_mk','$sks','$semester')");
      
      $message = "Your data successfull stored on the database.";
      header("location:matakuliah.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Can't create new data.";
      header("location:matakuliah.php?alert=actionFailed&message=$message");
    }
  }
  //Update Data Mata Kuliah
  else if ($_POST["action"] == "updateMatkul") {
    if(isset($_POST["kode_mk"]) && isset($_POST["nama_mk"]) && isset($_POST["sks"]) && isset($_POST["semester"])){
      
      $kode_mk = $_POST["kode_mk"];
      $nama_mk = $_POST["nama_mk"];
      $sks = $_POST["sks"];
      $semester = $_POST["semester"];
      
      mysqli_query($conn, "UPDATE mata_kuliah SET nama_mk='$nama_mk', sks='$sks', semester='$semester' WHERE kode_mk='$kode_mk'");
      
      $message = "Your data successfull updated on the database.";
      header("location:matakuliah.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Can't update your data.";
      header("location:matakuliah.php?alert=actionFailed&message=$message");
    }
  }
  //Delete Data Mata Kuliah
  else if ($_GET["action"] == "deleteMatkul") {
    if(isset($_GET["kode_mk"]) && $_GET["action"] == "deleteMatkul"){
      $kode_mk = $_GET["kode_mk"];
      //     // mysqli_query($conn, "delete from mahasiswa where nim='$get_nim'");
      mysqli_query($conn, "DELETE FROM mata_kuliah WHERE kode_mk='$kode_mk'");
      $message = "Data success to delete with Kode Mata Kuliah : ".$kode_mk;
      header("location:matakuliah.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Data Kode Mata Kuliah is Null";
      header("location:matakuliah.php?alert=actionFailed&message=$message");
    }
  }
  //Choose Mata Kuliah for students
  else if($_POST["action"] == "pilihMatkul") {
    if(isset($_POST["state"])){

      $email = $_POST["email"];
      $password = $_POST["password"];
      $course = $_POST["state"]; //state is courses get from input form at pilih_matkul.php

      $dataMhs = mysqli_query($conn, "SELECT * FROM account_mhs WHERE email='$email' AND password='$password'");
      while($row = mysqli_fetch_array($dataMhs)){
        $nim = $row["nim"];
        $nama_mhs = $row["name"];
      }

      $dataMatkul = mysqli_query($conn, "SELECT * FROM mata_kuliah WHERE nama_mk='$course'");
      while($row = mysqli_fetch_array($dataMatkul)){
        $kode_mk = $row["kode_mk"];
        $sks = $row["sks"];
        $semester = $row["semester"];
      }

      mysqli_query($conn, "INSERT INTO matkul_mhs VALUES('', '$nim','$kode_mk','$nama_mhs','$course','$sks','$semester')");
      
      $message = "Your data successfull stored on the database.";
      header("location:matakuliah.php?alert=actionSuccess&message=$message");
    }
    else{
      $message = "Error! Something Went Wrong. Can't choose courses.";
      header("location:matakuliah.php?alert=actionFailed&message=$message");
    }
  }
}
else{
  $message = "Error! Your Data is Empty on db_mahasiswa in field mata_kuliah";
  header("location:matakuliah.php?alert=actionFailed&message=$message");
}

// The diffrent from action on delete using GET deleteMatkul and action on another using POST cause,
// on the delete the parameter has send it from url, and then action on another using POST cause the 
//parameter send it from FORM INPUT.

?>
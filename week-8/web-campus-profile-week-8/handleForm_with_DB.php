<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesia University</title>
    <link rel="icon" href="assets/img/Universitas-Indonesia-Logo.png">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style-form.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

    

    <!-- /* ---------- Header Section--------------- */ -->
    <div class="highlight">
        <span>
            <p><b>Create your student ID card here ...</b></p>
            <a href="#">Click here !</a>
        </span>
    </div>
    <section class="header-form">
        <nav>
            <div class="navbar-left">
                <img src="assets/img/Universitas-Indonesia-Logo.png" alt="Logo-navbar" width="35" height="35">
                <h1>Indonesia University</h1>
            </div>
            
            <div class="navbar-right" id="navLinks">
                <i class="bi bi-x-lg" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="news.html">NEWS</a></li>
                    <li><a href="faculty.html">FACULTY</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <li><a href="login_account.php">ACCOUNT</a></li>
                </ul> 
            </div>
            <i class="bi bi-list" onclick="showMenu()"></i>
            
        </nav>

        <div class="banner-home">
            <h1>Form Register Students 2023</h1>

            <p>If you need help for our service, lets to contact on our Email, Phone, or you can visit to our website.</p>

            <!-- <a href="#">Explore More</a> -->
        </div>

    </section>

    <!-- logic for handle input form and store all data  -->
    <!-- resource from https://www.w3schools.com/php/php_form_validation.asp and then https://tryphp.w3schools.com/showphp.php?filename=demo_form_validation_escapechar, For Integrate DB : https://www.geeksforgeeks.org/how-to-insert-form-data-into-database-using-php/ -->
    <?php 
     // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
        
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

    //Define the variable for store data from input form
    $name = $email = $phone = $hobby = $birthplace = $birthdate = $gender = $photo = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = test_input($_POST["name"]); 
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $hobby = test_input($_POST["hobby"]);
        $birthplace = test_input($_POST["birthplace"]);
        $birthdate = test_input($_POST["birthdate"]);
        $gender = test_input($_POST["gender"]);
        // exception rules test input for photo cause this photo will have original data like url slash, :, etc
        $photo = $_POST["photo"];
        
    }
    //this function for validate that the data is safe from any threat or malicious code
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "INSERT INTO idcard_mhs  VALUES ('','$name','$gender','$phone','$email','$birthplace','$birthdate','$hobby','$photo')";
            
            if(mysqli_query($conn, $sql)){
                echo "<center><h3>data stored in a database successfully."
                    . " Please browse your localhost php my admin"
                    . " to view the updated data</h3> </center>";
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
    }
        // Close connection
        mysqli_close($conn);
    ?>

    <!-- Logic for handle output or display data -->
    <?php if($_SERVER["REQUEST_METHOD"] == "POST"):?>
    <section class="output-form">
        <h3>Your ID Card</h3>
        <?php 
            echo $gender=="Male" ? "<style>.box-form{background-color:rgb(67, 152, 243);}</style>" : "<style>.box-form{background: rgba(255, 255, 0, 0.707);} .box-form ul li{color:white;}</style>";
        ?>
        
        <div class="box-form">
            <div>
                <ul>
                    <!-- <li>Name : Jamalul Ikhsan</li>
                    <li>Gender : Male</li>
                    <li>Phone Call : 085156385979</li>
                    <li>Email : jamalulikhsan19@gmail.com</li>
                    <li>Birth Place : DKI Jakarta</li>
                    <li>Birth Date : 19, November 1999</li>
                    <li>Hobby : Coding</li> -->
                    <?php
                    echo "<li>Name : $name</li>";
                    echo "<li>Gender : $gender</li>";
                    echo "<li>Phone Call : $phone</li>";
                    echo "<li>Email : $email</li>";
                    echo "<li>Birth Place : $birthplace</li>";
                    echo "<li>Birth Date : $birthdate</li>";
                    echo "<li>Hobby : $hobby</li>";
                    ?>
                </ul>
            </div>
            <!-- photo uploaded will be display in here  -->
            <?php echo "<img src='$photo' alt='my_photo' width='150px' height='150px'>";?>
        </div>
    </section>
    <?php endif;?>
    
    <!-- The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script. -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <h2>Form Registration IDCard Students</h2>
        <div class="form-group fullname">
            <label for="fullname">Full Name</label>
            <input name="name" required type="text" id="fullname" placeholder="Enter your full name">
        </div>
        <div class="form-group email">
            <label for="email">Email Address</label>
            <input name="email" required type="text" id="email" placeholder="Enter your email address">
        </div>
        <div class="form-group phonecall">
            <label for="phonecall">Phone Call</label>
            <input name="phone" required type="text" id="phonecall" placeholder="Enter your phone call">
        </div>
        <div class="form-group hobby">
            <label for="hobby">My hobby</label>
            <input name="hobby" required type="text" id="hobby" placeholder="Enter your hobby or passion">
        </div>
        <div class="form-group birthplace">
            <label for="birthplace">Birth Place</label>
            <input name="birthplace" required type="text" id="birthplace" placeholder="Enter your birth place (example : Jakarta)">
        </div>
        <div class="form-group date">
            <label for="date">Birth Date</label>
            <input name="birthdate" required type="date" id="date" placeholder="Select your date">
        </div>
        <div class="form-group gender">
            <label for="gender">Gender</label>
            <select id="gender" name="gender">
                <option value="" selected disabled>Select your gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group upload">
            <label for="photo">Upload Link Url Photo</label>
            <input name="photo" required type="text" id="photo" placeholder="Type Url Link your photo here">
        </div>
        
        <div class="form-group submit-btn">
            <input name="submit" required type="submit" value="Submit">
        </div>
    </form>


    <!-- /* ---------- Footer--------------- */ -->
    <footer>
        <div class="footer">
            <img src="assets/img/logo-png.png" alt="">

            <div class="footer-help">
                <h2>Bantuan</h2>
                <ul>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="footer-info">
                <h2>Layanan</h2>
                <ul>
                    <li><a href="#">Unit Layanan Terpadu</a></li> 
                    <li><a href="#">Pusat Pelatihan Kerja </a></li>
                    <li><a href="#">Ikatan Alumni UI</a></li>
                </ul>
            </div>

            <div class="footer-location">
                <h2>Kunjungi Kami</h2>
                <p> <b>Address :</b> <br> Universitas Indonesia Depok <br> Jawa Barat 16424 Indonesia</p>
                <p> <b>Email :</b> sipp@ui.ac.id / humas-ui@ui.ac.id <br> <b>Phone :</b> 021-1500002 / +62 815 15000002</p>

            </div>
        </div>
        <div class="copyright">
            <p><b>2023, Hak Cipta Universitas Indonesia</b></p>
        </div>

    </footer>

    <script src="assets/js/index.js"></script>
    <!-- INSERT INTO idcard_mhs VALUES ('Xavier Mcintyre','Female','+1 (509) 601-4547','wivoliraf@mailinator.com','Impedit voluptas au','2004-09-09','Dolore sit fuga En','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png') -->
</body>
</html>
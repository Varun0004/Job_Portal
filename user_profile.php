<?php
include 'partials/db_connect.php';
$uid = $_GET['uid'];
if (isset($_POST['upload'])) {
    $photo = $_FILES["photo"]["name"];
    $tmpname = $_FILES["photo"]["tmp_name"];
    $folder = "./images/" . $photo;
    $sql = " update  candidate_signup set photo='$photo' WHERE sno=$uid";
    $result = mysqli_query($conn, $sql);
    move_uploaded_file($tmpname, $folder);

}
$sql = "SELECT * FROM `candidate_signup` where sno=$uid;";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $image = $row["photo"];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $phone = $row['phone'];
    $about = $row['about'];
    $dob = $row['dob'];
    $street = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $zipcode= $row['zip'];
    $degreename=$row['degreename'];
    $passingdate = $row['passingyear'];
    $college = $row['university'];
    $grade = $row['grade'];
    $facebook = $row['facebook'];
    $twitter = $row['twitter'];
    $linkedin = $row['linkedin'];
    $instagram=$row['instagram'];
}
if (isset($_POST['updateone'])) {
    $fname = $_POST['fname'];
    $pno = $_POST['phone'];
    $dob=$_POST['dob'];
    $about=$_POST['about'];
    $sql = "update  candidate_signup set fname='$fname',phone='$pno',dob='$dob',about='$about' WHERE sno='$uid'";
    $result = mysqli_query($conn, $sql);
    echo"<meta http-equiv='refresh' content='0'>";
    //echo"<script>window.history.go(-2);</script>";
}
if (isset($_POST['updatetwo'])) {
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zip'];
    $sql = "update  candidate_signup set street='$street',city='$city',state='$state',zip='$zipcode' WHERE sno='$uid'";
    $result = mysqli_query($conn, $sql);
    echo"<meta http-equiv='refresh' content='1'>";
}
if (isset($_POST['updatethree'])) {
    $dgname = $_POST['degreename'];
    $passyear = $_POST['passingyear'];
    $university=$_POST['university'];
    $grade=$_POST['grade'];
    $sql = "update  candidate_signup set degreename='$dgname',passingyear='$passyear',university='$university',grade='$grade' WHERE sno='$uid'";
    $result = mysqli_query($conn, $sql);
    echo"<meta http-equiv='refresh' content='2'>";
    //echo"<script>window.history.go(-2);</script>";
    //header("location:user_profile.php?uid='.$uid.'");
}
if (isset($_POST['updatefour'])) {
    $fb = $_POST['facebook'];
    $tw = $_POST['twitter'];
    $ld=$_POST['linkedin'];
    $insta=$_POST['instagram'];
    $sql = "update  candidate_signup set facebook='$fb',twitter='$tw',linkedin='$ld',instagram='$insta' WHERE sno='$uid'";
    $result = mysqli_query($conn, $sql);
     echo"<meta http-equiv='refresh' content='3'>";
   // echo"<script>window.history.go(-2);</script>";
    //header("location:user_profile.php?uid='.$uid.'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JobPortal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="ftco-32x32.png">
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
  <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/loader.css">

</head>


<body class="">
<?php
   include 'partials/_header.php';
   ?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Profile</h1>
                        <div class="custom-breadcrumbs">
                            <a href="#">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>User profile</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    if (isset($_POST['edit'])) {

       
        echo '
        <div class="container mb-5  mt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row gutters"> 
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile align-items-center text-center">
                                    <div class="user-avatar">
                                    <img src="./images/'.$image.'" alt="Admin" class="rounded-circle" height="100px" width="100px" >                              
    </div>
    <div class="row ">
        <label class="btn-md btn-file ">
            <a href="#"> <span class="icon-camera"></span><span>&nbsp;&nbsp;<u>Browse image</u></span>
                <input type="file" name="photo">
            </a>
        </label>
        <button class=" ml-5 btn btn-dark text-center " name="upload" style="width:90px;height:40px">upload</button>
    </div>

    <h5 class="user-name mt-4" style="color:blue;">'.$fname.'</h5>
    <h6 class="user-email text-success"> '.$email.'</h6>
    </div>
    <div class="about mt-5 text-center">
        <h5 style="color:blue;">About</h5>
        <p >'.$about.'</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100 ">
            <div class="card-body ">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                class="form-control  " name="fname"  value="' . $fname . '">
                        </div>
                      
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="eMail">Email</label>
                            <input type="email" style="font-weight:bold; font-size:1em; color:black;"
                                class="form-control" name="email" value="' . $email . '" disabled>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                class="form-control" name="phone" value="' . $phone . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="dob">Date-of-Birth</label>
                            <input type="text" class="form-control"
                                style="font-weight:bold; font-size:1em; color:black;" name="dob" value="' . $dob . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="about">Write About Your Profession </label>
                            <textarea class="form-control" rows=4 style="font-weight:bold;width:" 100%"; font-size:1em;
                                color:black;" name="about" >'.$about.'</textarea>
                        </div>
                    </div>
                </div>

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button  class="btn btn-success" name="updateone" >Update</button>

                        </div>
                    </div>
                </div>

                <div class="row gutters ">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">Address</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Street">Street</label>
                            <input type="name" class="form-control"
                                style="font-weight:bold; font-size:1em; color:black;" name="street"
                                value="' . $street . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="name" class="form-control"
                                style="font-weight:bold; font-size:1em; color:black;" name="city" value="' . $city . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="sTate">State</label>
                            <input type="text" class="form-control"
                                style="font-weight:bold; font-size:1em; color:black;" name="state"
                                value="' . $state . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="zIp">Zip Code</label>
                            <input type="text" class="form-control" style="font-weight:bold; font-size:1em; color:black"
                                name="zip" value="' . $zipcode . '">
                        </div>
                    </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                        <button  class="btn btn-success" name="updatetwo" >Update</button>
                        </div>
                    </div>
                </div>

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">Education Qualification...</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="degreename">Degree Name</label>
                            <input type="name" style="font-weight:bold; font-size:1em; color:black" name="degreename"
                                class="form-control" value="' . $degreename . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passing">Passing Year</label>
                            <input type="text" class="form-control"
                                style="font-weight:bold; font-size:1em; color:black;" name="passingyear"
                                value="' . $passingdate . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="">College/University</label>
                            <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                class="form-control" name="university" value="' . $college . '">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="grade">Grade/CGPA</label>
                            <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                class="form-control" name="grade" value="' . $grade . '">
                        </div>
                    </div>
                </div>

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                        <button  class="btn btn-success" name="updatethree" >Update</button>
                        </div>
                    </div>
                </div>

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">Social Media Details...</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Facebook"><span class="icon-facebook"></span>&nbsp;&nbsp;Facebook</label>
                            <input style="font-weight:bold; font-size:1em; color:black;" type="link"
                                class="form-control" name="facebook" value="'.$facebook.'">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Twitter"><span class="icon-twitter"></span>&nbsp;&nbsp;Twitter</label>
                            <input type="link" style="font-weight:bold; font-size:1em; color:black;"
                                class="form-control" name="twitter" value="'.$twitter.'">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="linkedin"><span class="icon-linkedin"></span>&nbsp;&nbsp;Linkedin</label>
                            <input type="link" class="form-control"
                                style="font-weight:bold; font-size:1em; color:black;" name="linkedin"
                                value="'.$linkedin.'">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="instagram"><span class="icon-instagram"></span>&nbsp;&nbsp;Instagram</label>
                            <input type="link" style="font-weight:bold; font-size:1em; color:black;"
                                class="form-control" name="instagram" value="'.$instagram.'">
                        </div>
                    </div>

                </div>

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                        <button  class="btn btn-success" name="updatefour" >Update</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </form>
    </div>';

    } else {
    echo '<div class="container mt-5 mb-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row gutters">

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">

                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile text-center">
                                    <div class="user-avatar text-center mb-3">
                                    <img src="./images/'.$image.'" alt="Admin" class="rounded-circle" height="100px" width="100px" >                              

                                    </div>
                                            <button class=" text-light btn-primary rounded" value="edit"
                                                name="edit">Edit Profile</button>
                                    <h5 class="user-name mt-5" style="color:blue">' . $fname . '</h5>
                                    <h6 class="user-email mt-3 " style="text-decoration:underline" >' . $email . '<h6>
                                </div>
                                <div class=" text-center mt-3">
                                    <h5 class="text-success "  >About</h5>
                                    <p>'.$about.'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body ">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                            class="form-control  " name="fname" id="fullName"
                                            value="' . $fname .'" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" style="font-weight:bold; font-size:1em; color:black;"
                                            class="form-control" name="email" value="' . $email . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                            class="form-control" name="phone" value="' . $phone . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Date-of-Birth</label>
                                        <input type="text" class="form-control"
                                            style="font-weight:bold; font-size:1em; color:black;" name="dob"
                                            placeholder="' . $dob . '" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters ">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">Street</label>
                                        <input type="name" class="form-control"
                                            style="font-weight:bold; font-size:1em; color:black;" name="street"
                                            value="' . $street . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="name" class="form-control"
                                            style="font-weight:bold; font-size:1em; color:black;" name="city"
                                            value="' . $city . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="sTate">State</label>
                                        <input type="text" class="form-control"
                                            style="font-weight:bold; font-size:1em; color:black;" name="state"
                                            value="' . $state . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="zIp">Zip Code</label>
                                        <input type="text" class="form-control"
                                            style="font-weight:bold; font-size:1em; color:black" name="zip"
                                            value="' . $zipcode . '" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Education Qualification...</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="degreename">Degree Name</label>
                                        <input type="name" style="font-weight:bold; font-size:1em; color:black"
                                            name="degreename" class="form-control" value="' . $degreename . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passing">Passing Year</label>
                                        <input type="text" class="form-control"
                                            style="font-weight:bold; font-size:1em; color:black;" name="year"
                                            value="' . $passingdate . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="">College/University</label>
                                        <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                            class="form-control" name="college" value="' . $college . '" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="grade">Grade/CGPA</label>
                                        <input type="text" style="font-weight:bold; font-size:1em; color:black;"
                                            class="form-control" name="grade" value="' . $grade . '" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Social Media Details...</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Facebook"><span
                                                class="icon-facebook"></span>&nbsp;&nbsp;Facebook</label>
                                        <input style="font-weight:bold; font-size:1em; color:black;" disabled
                                            type="link" class="form-control" name="facebook" value="'.$facebook.'" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Twitter"><span
                                                class="icon-twitter"></span>&nbsp;&nbsp;Twitter</label>
                                        <input type="link" style="font-weight:bold; font-size:1em; color:black;"
                                            class="form-control" name="twitter" value="'.$twitter.'" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="linkedin"><span
                                                class="icon-linkedin"></span>&nbsp;&nbsp;Linkedin</label>
                                        <input type="link" class="form-control"
                                            style="font-weight:bold; font-size:1em; color:black;" name="linkedin" value="'.$linkedin.'"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="instagram"><span
                                                class="icon-instagram"></span>&nbsp;&nbsp;Instagram</label>
                                        <input type="link" style="font-weight:bold; font-size:1em; color:black;"
                                            class="form-control" name="instagram" value="'.$instagram.'" disabled>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>';
    }
    
    ?>


   <!-- SCRIPTS -->
   <script src="js/loader.js" ></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
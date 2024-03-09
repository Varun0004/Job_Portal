<?php
$showAlert=false;
$showError=false;
$rid=$_GET['rid'];
$jobid=$_GET['job'];
$uid=$_GET['uid'];
$jobtitle=$_GET['jobtitle'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  include("partials/db_connect.php");
  $filename = $_FILES["resume"]["name"];
  $tempname = $_FILES["resume"]["tmp_name"];
  $folder = "./images/" . $filename;
  $fname=$_POST["fname"];
  $gender=$_POST["gender"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $experience=$_POST["experience"];
  $about=$_POST["about"];
  $existsSql="select * from applyjob where email='$email' and jobid='$jobid'";
  $existsResult=mysqli_query($conn, $existsSql);
  if(mysqli_num_rows($existsResult)> 0)
  {
    $showError="Job Already Applied By You...";
  }
  else
  {
    $sql="INSERT INTO applyjob(`aid`,`rid`,`resume`,`name`, `gender`, `email`, `phone`, `experience`, `about`, `jobid`,`jobtitle`)
     VALUES (NULL,'$rid','$filename', '$fname', '$gender', '$email', '$phone', '$experience', '$about','$jobid','$jobtitle');";
      $result=mysqli_query($conn, $sql);
    //  image
        move_uploaded_file($tempname, $folder);
      if($result)
      {
        $showAlert=true;
      }
      else
      {
        $showError="JOB not Applied please try again!";
      }
  }
}
?>
<!doctype html>
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
    <link rel="stylesheet" href="css/loader.css">
</head>

<body id="top">
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <!-- .site-mobile-menu -->
        <?php include'partials/_header.php';?>
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Apply Job</h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                            <a href="#">Job</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Apply Job</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="php py-2">
            <?php
          if($showAlert)
          {
          echo'
            <div class="alert alert-success  fade show" role="alert">
          <strong></strong> Job Applied Sucessfully You will notify soon...
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        if($showError)
          {
          echo'
            <div class="alert alert-danger  fade show" role="alert">
          <strong>Error!---> </strong>'.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }?>
        </div>
        <section class="site-section">
            <div class="container my-0">
                <form class="p-4 p-md-5  border rounded" method="post" enctype="multipart/form-data">

                    <div class="row align-items-center mb-5">
                        <div class="col-lg-8 mb-4 mb-lg-0">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2>Apply Job</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h3 class="text-black mb-5 border-bottom pb-2">Your Details</h3>
                            <div class="form-group">
                                <label for="name">Upload Resume</label><b style="color:red;"> *</b>
                                <input required name="resume" type="file" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="name">Full name</label><b style="color:red;"> *</b>
                                <input required type="text" class="form-control" id="fname" name="fname"
                                    placeholder="dennis ritche">
                            </div>
                            <div class="form-group">
                                <label for="Gender">Gender</label><b style="color:red;"> *</b>
                                <select class="selectpicker border rounded" name="gender" 
                                    data-style="btn-black" data-width="100%" data-live-search="true"
                                    title="Select Gender" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label><b style="color:red;"> *</b>
                                <input required type="email" maxlength="50" class="form-control" id="email" name="email"
                                    placeholder="you@yourdomain.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label><b style="color:red;"> *</b>
                                <input required type="text" maxlength="10" class="form-control"  name="phone"
                                    placeholder="+91">
                            </div>
                            <div class="form-group">
                                <label for="job-type">Years Of Experience</label><b style="color:red;"> *</b>
                                <select class="selectpicker border rounded" name="experience" id="job-type"
                                    data-style="btn-black" data-width="100%" data-live-search="true"
                                    title="Select Experience" required>
                                    <option>Less than a year</option>
                                    <option>1 - 2 years</option>
                                    <option>2 - 4 years</option>
                                    <option>4 - 7 years</option>
                                    <option>7 - 10 years</option>
                                    <option>10+ years</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="about">Tell us more about yourself</label><b style="color:red;"> *</b>
                                <textarea name="about" class="form-control" minlength="20" rows="3"maxlength="200"
                                    placeholder="What motivates you?"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-4 ml-auto">
                            <div class="row">
                                <div class="col-6">
                                    <!-- <input required type="button" value="submit"> -->
                                    <button type="submit" id="btnsave1" class="btn btn-block btn-primary btn-md">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php include"partials/_footer.php"?>
    </div>
    <!-- SCRIPTS -->
    <script src="js/loader.js"></script>
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
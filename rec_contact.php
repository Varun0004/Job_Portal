<?php
$showAlert=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  include("partials/db_connect.php");
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $subject=$_POST['subject'];
  $message = $_POST['message'];
  $existsSql="select * from contact_us where email='$email' and subject='$subject'";
  $existsResult=mysqli_query($conn, $existsSql);
  if(mysqli_num_rows($existsResult)> 0)
  {
    $showError="Message already sent with $email and subject please try another email or subject ....";
  }
  else
  {
    $sql="INSERT INTO contact_us(`sno`, `fname`,`lname`,`email`,`subject`,`message`) VALUES (NULL,'$fname','$lname','$email','$subject','$message')";
      $result=mysqli_query($conn, $sql);
      if($result)
      {
        $showAlert=true;
      }
      else
      {
        $showError="JOB not posted please try again!";
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
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/loader.css">

</head>
<body name="top"> 
    <div class="site-wrap">
    <?php include'partials/rec_header.php';?>
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            name="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Contact Us</h1>
                        <div class="custom-breadcrumbs">
                            <a href="rec_index.php">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Contact Us</strong></span>
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
          <strong></strong> Message Sent Successfully (you will be responded soon)..
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hnameden="true">&times;</span>
          </button>
        </div>';
        }
        if($showError)
          {
          echo'
            <div class="alert alert-danger  fade show" role="alert">
          <strong>Error!---> </strong>'.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hnameden="true">&times;</span>
          </button>
        </div>';
        }?>
        </div>

        <section class="site-section" name="next-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <form action="#" method="post" class="" enctype="multipart/form-data">

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">First Name</label><b style="color:red;"> *</b>
                                    <input required type="text" name="fname" class="form-control" >
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="lname">Last Name</label>
                                    <input required type="text" name="lname" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="email">Email</label><b style="color:red;"> *</b>
                                    <input required type="email" name="email" class="form-control" >
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Subject</label><b style="color:red;"> *</b>
                                    <input required type="subject" name="subject" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Message</label>
                                    <textarea name="message" name="message" cols="30" rows="7" class="form-control"
                                        placeholder="Write your notes or questions here..."></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input required type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 ml-auto">
                        <div class="p-4 mb-3 bg-white">
                            <p class="mb-0 font-weight-bold">Address</p>
                            <p class="mb-4">Pune</p>

                            <p class="mb-0 font-weight-bold">Phone</p>
                            <p class="mb-4"><a href="#">+91 8888 6633 024</a></p>

                            <p class="mb-0 font-weight-bold">Email Address</p>
                            <p class="mb-0"><a href="https://www.jobportal@gmail.com">jobportal@gmail.com</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include'partials/_footer.php';?>
    </div>
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
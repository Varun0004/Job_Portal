<?php
$showAlert=false;
$showError=false;
$click=$_GET['click'];
if($click==1)
{
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("partials/db_connect.php");
    $fname=$_POST["fname"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $cpass=$_POST["cpass"];
    
    $existsSql="select * from candidate_signup where email='$email'";
    $existsResult=mysqli_query($conn, $existsSql);
    if(mysqli_num_rows($existsResult)> 0)
    {
      $showError="Email Already Used....";
    }
    else 
    {
      //$exists=false;
      if(($pass === $cpass))
      {
          $hash= password_hash($pass,PASSWORD_DEFAULT);
          $sql="INSERT INTO `candidate_signup` (`sno`, `fname`,`email`,`password`) VALUES (NULL, '$fname','$email','$hash')";
          $result=mysqli_query($conn,$sql);
          if($result)
          {
            $showAlert=true;
          }
      }
      else
      {
            $showError="password do not match ";
           
      }
    }
  }
}
if($click==2)
{
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
      include("partials/db_connect.php");
      $fname=$_POST["fname"];
      
      $email=$_POST["email"];
    
      $pass=$_POST["pass"];
      $cpass=$_POST["cpass"];
      $existsSql="select * from recruiter_signup where email='$email'";
      $existsResult=mysqli_query($conn, $existsSql);
      if(mysqli_num_rows($existsResult)> 0)
      {
        $showError="Email Already Used....";
      }
      else 
      {
        //$exists=false;
        if(($pass === $cpass))
        {
            $hash= password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `recruiter_signup` (`sno`, `fname`,`lname`,`compname`,`email`,`password`) VALUES (NULL, '$fname','$lname','$cname','$email','$hash')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
              $showAlert=true;
            }
        }
        else
        {
              $showError="password do not match ";
             
        }
      }
    }
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


<body>
    <?php
  if($showAlert)
  {
  echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> Account created You can Login now
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($showError)
  {
  echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!---> </strong>'.$showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
    <form method="post" action="" id="form1">
        <div>
            <!-- Section: Design Block -->
            <section class="text-center">
                <!-- Background image -->
                <div class="p-5 bg-image" style="
                background-image: url('images/hero_1.jpg');
                height: 200px;
                ">
                </div>
                <!-- Background image -->
                <div class="card mx-4 mx-md-5 shadow-5-strong" style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter:blur(20px);">
                    <div class="card-body py-5 px-md-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="fw-bold mb-3">Sign Up as Candidate</h2>
                                <div>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="fname"><?php if($click==1){echo'Full Name';}else{echo'Company Name';}?></label>
                                        <input type="text" " name="fname" class="form-control" required />
                                    </div>
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Email address</label>
                                        <input type="email" id="email" name="email" class="form-control" required />
                                    </div>
                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4">Password</label>
                                        <input type="password" id="pwd" name="pass" class="form-control" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4">Confirm Password</label>
                                        <input type="password" name="cpass" class="form-control" required />
                                    </div>
                                    <!-- Sign-up role -->

                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4" id="Button" ">
              Sign up
            </button>
            <!-- Register buttons -->
            <div class=" text-center">
                                    Already a member? <a href="login.php?click=<?php echo $click;?>">Log in.</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        </section>
        </div>
    </form>
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
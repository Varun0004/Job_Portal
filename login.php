<?php 
$login=false;
$showError=false;
$click=$_GET['click'];
if($click==1)
{
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  
    include 'partials/db_connect.php';
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $sql="select * from candidate_signup where email='$email'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        while($row=mysqli_fetch_assoc($result))
        {
          $uid=$row['sno'];

            if(password_verify($pass,$row["password"]))
            {
                $login=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                header("location:index.php?uid=$uid");
                
            }
            else
            {
                 $showError="Invalid Credentials";
            }
        }
    }
    else
    {
        $showError="Invalid Credentials";
    }
}
}
if($click==2)
{
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'partials/db_connect.php';
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $sql="select * from recruiter_signup where email='$email'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num==1)
    {
        while($row=mysqli_fetch_assoc($result))
        {
          $uid=$row['sno'];
            if(password_verify($pass,$row["password"]))
            {
                $login=true;
                //session_unset();
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                header("location:rec_index.php?uid=$uid");
            }
            else
            {
                 $showError="Invalid Credentials";
            }
        }
    }
    else
    {
        $showError="Invalid Credentials";
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
  if($login)
  {
  echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> you are logged in
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
    <form method="post" action="#" id="form1" >

        <div>
            <!-- Section: Design Block -->
            <section class="text-center">
            <!-- Background image -->
                <div class="p-5 bg-image" style="
                        background-image: url('images/hero_1.jpg');
                        height: 200px;
                        "></div>
                <!-- Background image -->
                <div class="card mx-4 mx-md-5 shadow-5-strong" style="
                        margin-top: -100px;
                        background: hsla(0, 0%, 100%, 0.8);
                        backdrop-filter: blur(30px);
                        ">
                </div>
                    <div class="card-body py-5 px-md-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Login <?php if($click==1){echo'as Candidate';}if($click==2){echo'as Recruiter';}?> </h2>
               
            <!-- Email input -->
            <div class="form-floating mb-3">
              <label for="floatingInput">Email address</label>
                <input type="email" id="txtemail" name="email"  class="form-control" placeholder="name@example.com" required="required" />
            </div>
            <!-- Password input -->
            <div class="form-floating mb-3">
                <label for="floatingInput">Password</label>
                <input type="password" id="txtpwd" name="pass"  class="form-control" placeholder="password" required="required"  />
            </div>
            <!-- Submit button -->
            <div class="form-floating mb-3">
                <button type="submit" class="btn btn-primary mb-3"  id="btnLogin"  style="width: 178px">login</button> 
            </div>
            <!-- Register buttons -->
            <div class="text-center">
              Don't have an account? <a href="signup.php?click=<?php echo $click;?>" target="_self">Sign up.</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Section: Design Block -->
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

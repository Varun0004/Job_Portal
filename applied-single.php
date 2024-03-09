<?php
$aid=$_GET['aid'];
$showAlert=false;
$showError=false;
include'partials/db_connect.php';
if (isset($_POST['accept'])) {
    $sql = " update applyjob set status='Approved' WHERE aid=$aid";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
            $showAlert;
    }
    

}
if (isset($_POST['reject'])) {
    $sql = " update applyjob set status='Rejected' WHERE aid=$aid";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
            $showError="Candidate Rejected Sucessfully ";
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


<body id="top">
    <form action="" method="post">
    <div class="site-wrap">

      
        <!-- .site-mobile-menu -->
        <?php include'partials/rec_header.php';?>
        <!-- HOME -->
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                   
            <?php 
            include'partials/db_connect.php';
            $sql = "SELECT * FROM `applyjob` where aid=$aid;";
            $result = mysqli_query($conn, $sql);
            while($row= mysqli_fetch_assoc($result))
            {
                $rid=$row['rid'];            
                $resume=$row["resume"];
                $name=$row["name"];
                $gender=$row['gender'];
                $email=$row['email'];
                $phone=$row['phone'];
                $experience=$row['experience'];
                $about=$row['about'];
            }
            
            ?>
                        <div class="custom-breadcrumbs">
                            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                            <a href="#">Job</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Job Applied</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
          if($showAlert)
          {
          echo'
            <div class="alert alert-success  fade show" role="alert">
          <strong></strong> Approved Candidate Sucessfully
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        if($showError)
          {
          echo'
            <div class="alert alert-danger  fade show" role="alert">
          <strong> </strong>'.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }?>
        <section class="site-section">
            <div class="container">
                    <div class="col-lg">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Candidate Detials..</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Name: </strong><?php echo $name;?></li>
                                <li class="mb-2"><strong class="text-black">Email: </strong><?php echo $email;?></li>
                                <li class="mb-2"><strong class="text-black">Gender: </strong><?php echo $gender;?></li>
                                <li class="mb-2"><strong class="text-black">Experience: </strong><?php echo $experience;?></li>
                                <li class="mb-2"><strong class="text-black">phone: </strong><?php echo $phone;?></li>
                                <li class="mb-2"><strong class="text-black">Resume: </strong> <a class="btn btn-primary" href="images/<?php echo $resume?>" download="resume">Download</a> </li>
                                <li class="mb-2"><strong class="text-black">About: </strong><?php echo $about;?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <button  name="accept"  class="btn btn-block btn-primary btn-md">Accept</button>
                            </div>
                            <div class="col-6">
                                <button   name="reject" class="btn btn-block btn-danger btn-md">Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include"partials/_footer.php"?>
    </div>
    <!-- SCRIPTS -->
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


    </form>
</body>

</html>
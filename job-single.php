<?php 
$jobid=$_GET['jobno'];
if (isset($_SESSION['loggedin'])) {
    $uid = $_GET['uid']; 
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
    <div class="site-wrap">

      
        <!-- .site-mobile-menu -->
        <?php include'partials/_header.php';?>
        <!-- HOME -->
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
            <?php 
            include'partials/db_connect.php';
            
            $sql = "SELECT * FROM `post_job` where sno=$jobid;";
            $result = mysqli_query($conn, $sql);
            
            while($row= mysqli_fetch_assoc($result))
            {
                $rid=$row['rid'];            
                $image=$row["jobimg"];
                $jobtitle=$row["jobtitle"];
                $logo=$row['logo'];
                $compname=$row['compname'];
                $location=$row['joblocation'];
                $jobtype=$row['jobtype'];
                $jobdesc=$row['jobdesc'];
                $jobresp=$row['jobresp'];
                $qualification=$row['qualification'];
                $experience=$row['experience'];
                $sdate=$row['sdate'];
                $edate=$row['ldate'];
                $vacancy=$row['vacancy'];
                $salary=$row['salary'];
                $gender=$row['gender'];
            }
            ?>
                        <h1 class="text-white font-weight-bold"><?php echo $jobtitle;?></h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                            <a href="#">Job</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong><?php echo $jobtitle;?></strong></span>';

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="site-section">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <div class="border p-2 d-inline-block mr-3 rounded">
                                <img src="./images/<?php echo$logo;?>" height="100px" width="100px" alt="Image">
                            </div>
                            <div>
                                <h2><?php echo $jobtitle;?></h2>
                                <div>
                                    <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?php echo $compname;?></span>
                                    <span class="m-2"><span class="icon-room mr-2"></span><?php echo $location;?></span>
                                    <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $jobtype;?></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <a href="applyjob.php?job=<?php echo $jobid;?>&uid=<?php echo $uid;?>  &rid=<?php echo $rid;?>"   class="btn btn-block btn-primary btn-md">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <figure class="mb-5"><img src="./images/<?php echo $image;?>" alt="Image"
                                    class="img-fluid rounded"></figure>
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-align-left mr-3"></span>Job Description</h3>
                            <p><?php echo $jobdesc;?></p>
                            
                        </div>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-rocket mr-3"></span>Responsibilities</h3>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span>
                                        <span><?php echo $jobresp;?></span>
                                </li>
                                
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-book mr-3"></span>Education + Experience</h3>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span>
                                        <span><?php echo $qualification;?></span>
                                </li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span>
                                        <span><?php echo $experience?></span>
                                </li> 
                            </ul>
                        </div>
                        <div class="row mb-5">
                            <div class="col-6">
                                <a href="applyjob.php?job=<?php echo $jobid;?>&uid=<?php echo $uid;?> &rid=<?php echo $rid;?>" class="btn btn-block btn-primary btn-md">Apply Now</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Published on: </strong><?php echo $sdate;?></li>
                                <li class="mb-2"><strong class="text-black">Vacancy: </strong><?php echo $vacancy;?></li>
                                <li class="mb-2"><strong class="text-black">Employment Status: </strong><?php echo $jobtype;?></li>
                                <li class="mb-2"><strong class="text-black">Experience: </strong><?php echo $experience;?></li>
                                <li class="mb-2"><strong class="text-black">Job Location: </strong><?php echo $location;?></li>
                                <li class="mb-2"><strong class="text-black">Salary: </strong><?php echo $salary;?></li>
                                <li class="mb-2"><strong class="text-black">Gender: </strong><?php echo $gender;?></li>
                                <li class="mb-2"><strong class="text-black">Application Deadline: </strong><?php echo $edate;?></li>
                            </ul>
                        </div>

                        <div class="bg-light p-3 border rounded">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                            <div class="px-3">
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
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



</body>

</html>
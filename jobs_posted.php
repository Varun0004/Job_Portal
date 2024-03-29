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

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="site-wrap">
        <?php include'partials/rec_header.php';?>
        <!-- HOME -->
        <section class="section-hero home-section overlay inner-page bg-image"
            style="background-image: url('images/hero_1.jpg');" id="home-section">
        </section>
        <section class="site-section" id="next">
            <div class="container mt-0">
                <?php 
            include'partials/db_connect.php';
            $uid=$_GET['uid'];
            $sql = "SELECT * FROM post_job where rid='$uid' ";
            $res_data = mysqli_query($conn,$sql);
            $rowcount = mysqli_num_rows( $res_data );
            echo'<div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
            <h2 class="section-title  mb-2">'.$rowcount.' Job Posted</h2>
            </div>
            </div>
            <div class="mb-5">';
                
                    //here goes the data       
                while($row= mysqli_fetch_assoc($res_data))
                {	
                $jobid=$row['sno'];
                $image=$row['jobimg'];
                $logo=$row['logo'];
                $jobtitle=$row['jobtitle'];
                $location=$row['joblocation'];
                $type=$row['jobtype'];
                $desc=$row['jobdesc'];
                $compname=$row['compname'];
                echo'<ul class="job-listings mb-3">
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="rec_jobsingle.php?jobno='.$jobid.'&uid='.$uid.'"></a>
                <div class="job-listing-logo ">
                <img src="./images/'.$logo.'"  alt="" class="img-fluid" height="100px" width="100px">
                </div>
                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>'.$jobtitle.'</h2>
                <strong>'.$compname.'</strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> '.$location.'
                </div>';
                if($type=="Part Time")
                {
                echo'<div class="job-listing-meta">
                <span class="badge badge-danger">'.$type.'</span>
                </div>';
                 }
                else
                {
                echo'<div class="job-listing-meta">
                <span class="badge badge-success">'.$type.'</span>
                </div>
                ';
                }
                 echo' 
                </li>
                </ul>';
        }
                ?>
                <?php
                mysqli_close($conn);
                ?>
            </div>
    </section>
    </div>
    <?php include'partials/_footer.php';?>
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
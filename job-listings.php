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
        <!-- NAVBAR -->
        <?php include'partials/_header.php';?>
        <!-- HOME -->
        <section class="section-hero home-section overlay inner-page bg-image"
            style="background-image: url('images/hero_1.jpg');" id="home-section">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-5 text-center">
                            <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                        </div>
                        <form method="post" class="search-jobs-form">
                            <div class="row mb-5">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="Job title, Company...">
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%"
                                        data-live-search="true" title="Select Region">
                                        <option>Anywhere</option>
                                        <option>Banglore</option>
                                        <option>Chandigarh</option>
                                        <option>Delhi</option>
                                        <option>Gujrat</option>
                                        <option>Jammu</option>
                                        <option>kolkata</option>
                                        <option>Mumbai</option>
                                        <option>Nashik</option>
                                        <option>Noida</option>
                                        <option>Pune</option>
                                        <option>Panipat</option>
                                        <option>Rajasthan</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%"
                                        data-live-search="true" title="Select Job Type">
                                        <option>Part Time</option>
                                        <option>Full Time</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <button type="submit"
                                        class="btn btn-primary animated pulse infinite btn-lg btn-block text-white btn-search"><span
                                            class="icon-search icon mr-2"></span>Search Job</button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>

            <a href="#next" class="scroll-button smoothscroll">
                <span class=" icon-keyboard_arrow_down"></span>
            </a>
        </section>
        <section class="site-section" id="next">
            <div class="container mt-0">
                <?php 
            include'partials/db_connect.php';
            $sql = "SELECT * FROM `post_job` ";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows( $result );
            echo'<div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
            <h2 class="section-title  mb-2">'.$rowcount.' Job Listed</h2>
            </div>
            </div>
            <div class="scroll" style="width:100%; height:800px;overflow:scroll">
            <div class="mb-5">';            
                $sql = "SELECT * FROM post_job ";
                $res_data = mysqli_query($conn,$sql);
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
                <a href="job-single.php?jobno='.$jobid.'';if($loggedin){echo'&uid='.$uid.'';} echo'"></a>
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
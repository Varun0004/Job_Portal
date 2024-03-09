<?php
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
<body id="top " class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
    <?php include 'partials/_header.php' ?>
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');"
        id="home-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                    </div>
                    <form method="post" class="search-jobs-form">
                        <div class="row mb-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <input type="text" name="jobtitle" class="form-control form-control-lg"
                                    placeholder="Job title, Company...">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select class="selectpicker" name="jobregion" data-style="btn-white btn-lg"
                                    data-width="100%" data-live-search="true" title="Select Region">
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
                                <select class="selectpicker" name="jobtype" data-style="btn-white btn-lg"
                                    data-width="100%" data-live-search="true" title="Select Job Type">
                                    <option>Part Time</option>
                                    <option>Full Time</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <button type="submit" name='search'
                                    class="btn btn-primary animated pulse infinite btn-lg btn-block text-white btn-search"><span
                                        class="icon-search icon mr-2"></span>Search Job</button>
                            </div>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
        <a href="#next" class="scroll-button ">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>
    </section>
    <!-- site Stats -->
    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
        style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">JobPortal Site Stats</h2>
                    <p class="lead text-white"></p>
                </div>
            </div>
            <div class="row pb-0 block__19738 section-counter">
                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <?php
                            include 'partials/db_connect.php';
                            $totalcandidate = "SELECT * FROM `candidate_signup`";
                            $resultcand = mysqli_query($conn, $totalcandidate);
                            $rowcountcand = mysqli_num_rows($resultcand);
                            $totaljobs = "SELECT * FROM `post_job`";
                            $resultjob = mysqli_query($conn, $totaljobs);
                            $rowcountjob = mysqli_num_rows($resultjob);
                            $totalcomp = "SELECT * FROM `recruiter_signup`";
                            $resultcomp = mysqli_query($conn, $totalcomp);
                            $rowcountcomp = mysqli_num_rows($resultcomp);
                            $totalapply = "SELECT * FROM `applyjob`";
                            $resultapply = mysqli_query($conn, $totalapply);
                            $rowcountapply = mysqli_num_rows($resultapply);
                            
                            echo '
                             <strong class="number" data-number="' . $rowcountcand . '"></strong>
                        </div>
                        <span class="caption">Candidates</span>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="' . $rowcountjob . '">0</strong>
                        </div>
                        <span class="caption">Jobs Posted</span>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="'.$rowcountapply.'">0</strong>
                        </div>
                        <span class="caption">Jobs Filled</span>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="'.$rowcountcomp.'">0</strong>
                        </div>
                        <span class="caption">Companies</span>
                    </div>';
                            ?>
                    </div>
                </div>
    </section>
    <!-- job section -->
    <section class="site-section" id="next">
            <?php
            include 'partials/db_connect.php';        
            if (isset($_POST['search']))
             {
                $jobtitle = $_POST['jobtitle'];
                $jobregion = $_POST['jobregion'];
                $jobtype = $_POST['jobtype'];
                $sql = "SELECT * FROM `post_job` where jobtitle like '%$jobtitle%'
                 and joblocation like '%$jobregion%' and jobtype like'%$jobtype%'";
                $result = mysqli_query($conn, $sql);
                $rowcount = mysqli_num_rows($result);
                echo '<div class="container mt-0">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="section-title  mb-2">' . $rowcount . ' Jobs Found </h2>
                    </div>
                </div>
    <div class="scroll" style="width:100%; height:400px;overflow:scroll">
                <div class="mb-5">';
                //here goes the data       
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $jobid = $row['sno'];
                    $image = $row['jobimg'];
                    $logo = $row['logo'];
                    $jobtitle = $row['jobtitle'];
                    $location = $row['joblocation'];
                    $type = $row['jobtype'];
                    $desc = $row['jobdesc'];
                    $compname = $row['compname'];
                    echo '<ul class="job-listings mb-3">
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="./job-single.php?uid' . $uid . '&jobno='.$jobno.' "></a>
                <div class="job-listing-logo ">
                <img src="./images/' . $logo . '"  alt="" class="img-fluid" height="100px" width="100px">
                </div>
                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>' . $jobtitle . '</h2>
                <strong>' . $compname . '</strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> ' . $location . '
                </div>';
                    if ($type == "Part Time") {
                        echo '<div class="job-listing-meta">
                <span class="badge badge-danger">' . $type . '</span>
                </div>';
                    } else {
                        echo '<div class="job-listing-meta">
                <span class="badge badge-success">' . $type . '</span>
                </div>
                ';
                    }
                    echo ' 
                </li>
                </ul>';
                }

                ?>
        </div>
            </div>
            </div>
        <?php
            } else {
                echo '                
                <div class="container mt-0">
                        <div class="row mb-5 justify-content-center">
                            <div class="col-md-7 text-center">
                                <h2 class="section-title  mb-2">Jobs Listed Below</h2>
                            </div>
                        </div>
    <div class="scroll" style="width:100%; height:400px;overflow:scroll">
                        <div class="mb-5">';
                include 'partials/db_connect.php';
                $sql = "SELECT * FROM `post_job` ";
                $result = mysqli_query($conn, $sql);
                $rowcount = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $jobid = $row['sno'];
                    $image = $row['jobimg'];
                    $logo = $row['logo'];
                    $jobtitle = $row['jobtitle'];
                    $location = $row['joblocation'];
                    $type = $row['jobtype'];
                    $desc = $row['jobdesc'];
                    $compname = $row['compname'];
                    echo '<ul class="job-listings mb-3">
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="job-single.php?jobno='.$jobid.'';if($loggedin){echo'&uid='.$uid.'';} echo'"></a>                <div class="job-listing-logo ">
                <img src="./images/' . $logo . '"  alt="" class="img-fluid" height="100px" width="100px">
                </div>
                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>' . $jobtitle . '</h2>
                <strong>' . $compname . '</strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> ' . $location . '
                </div>';
                    if ($type == "Part Time") {
                        echo '<div class="job-listing-meta">
                <span class="badge badge-danger">' . $type . '</span>
                </div>';
                    } else {
                        echo '<div class="job-listing-meta">
                <span class="badge badge-success">' . $type . '</span>
                </div>
                ';
                    }
                    echo ' 
                </li>
                </ul>';
                }
                ?>

</div>
    </section>
    <?php
        mysqli_close($conn);
            }
            ?>
    <?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) 
{
echo '
    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url(\'images/hero_1.jpg\');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Looking For A Job?</h2>
                    <p class="mb-0 text-white lead">The customer service is very difficult to achieve due to the
                        fact that the customers time is limited.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="cand_login.php" class="btn btn-warning btn-block btn-lg">Sign Up</a>
                </div>
            </div>
        </div>
    </section>';
}
?>
    <section class="site-section py-4">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-12 text-center mt-4 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <h2 class="section-title mb-2">Company We've Helped</h2>
                            <p class="lead">Here are some Companies....</p>
                        </div>
                    </div>

                </div>
                <div class="col-6 col-lg-3 col-md-6  text-center">
                    <a href="https://www.mailchimp.com"><img src="images/logo_mailchimp.svg" alt="Image"
                            class="img-fluid logo-1"></a>
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <a href="https://www.paypal.com"><img src="images/logo_paypal.svg" alt="Image"
                            class="img-fluid logo-2"></a>
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <a href="https://www.stripe.com"><img src="images/logo_stripe.svg" alt="Image"
                            class="img-fluid logo-3"></a>
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <a href="https://www.visa.com"><img src="images/logo_visa.svg" alt="Image"
                            class="img-fluid logo-4"></a>
                </div>

                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <a href="https://www.appple.in"><img src="images/logo_apple.svg" alt="Image"
                            class="img-fluid logo-5"></a>
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <a href="https://www.tinder.com"><img src="images/logo_tinder.svg" alt="Image"
                            class="img-fluid logo-6"></a>
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <a href="https://www.sony.com"><img src="images/logo_sony.svg" alt="Image"
                            class="img-fluid logo-7"></a>
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <a href="https://www.airbnb.com"> <img src="images/logo_airbnb.svg" alt="Image"
                            class="img-fluid logo-8"></a>
                </div>
            </div>
        </div>

        <?php include("partials/_footer.php") ?>
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
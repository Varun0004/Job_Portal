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

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->


        <!-- NAVBAR -->
        <?php
   include 'partials/rec_header.php';
   ?>

        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">About Us</h1>
                        <div class="custom-breadcrumbs">
                            <a href="#">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>About Us</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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
                            include'partials/db_connect.php';
                            $totalcandidate = "SELECT * FROM `candidate_signup`";
                            $resultcand = mysqli_query($conn, $totalcandidate);
                            $rowcountcand = mysqli_num_rows( $resultcand );
                            $totaljobs = "SELECT * FROM `post_job`";
                            $resultjob = mysqli_query($conn, $totaljobs);
                            $rowcountjob = mysqli_num_rows( $resultjob );

                            echo' <strong class="number" data-number="'.$rowcountcand.'"></strong>
                        
                        </div>
                        <span class="caption">Candidates</span>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="'.$rowcountjob.'">0</strong>
                        </div>
                        <span class="caption">Jobs Posted</span>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="120">0</strong>
                        </div>
                        <span class="caption">Jobs Filled</span>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="550">0</strong>
                        </div>
                        <span class="caption">Companies</span>
                    </div>';
                    ?>


                        </div>
                    </div>
        </section>


        <section class="site-section pb-0">
            <div class="container ">
                <div class="row align-items-center">
                    <div class="col-lg-6  mb-lg-0">
                        <img src="images/sq_img_6.jpg" height="400px" width="400px" alt="Image" class="img-fluid img-shadow">

                    </div>
                    <div class="col-lg-5 ml-auto text-center">
                        <h2 class="section-title mb-3">JobPortal For Freelancers, Web Developers</h2>
                        <p class="lead"></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="site-section pt-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb mb-lg-0 order-md-2">
                        <img src="images/sq_img_8.jpg" alt="Image" height="400px" width="400px" class="img-fluid img-shadow">


                    </div>
                    <div class="col-lg-5 mr-auto order-md-1 text-center mb mb-lg-0">
                        <h2 class="section-title mb-3">JobPortal For Workers</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">Our Team</h2>
                    </div>
                </div>
                <div class="row align-items-center block__69944 border">
                    <div class="col-md-6 ">
                        <img src="images/one.jpg" height="300px" alt="Image" class="img-fluid mb-4 rounded">
                    </div>

                    <div class="col-md-6 text-center">
                        <h3 >Varun Singh</h3>
                        <p class="text-muted">Web Developer</p>

                        <div class="social mt-4">
                            <a href="#"><span class="icon-facebook"></span></a>
                            <a href="#"><span class="icon-twitter"></span></a>
                            <a href="#"><span class="icon-instagram"></span></a>
                            <a href="#"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>

                    <div class="col-md-6 order-md-2 ml-md-auto">
                        <img src="images/two.jpg" alt="Image" class="img-fluid mb-4 rounded">
                    </div>

                    <div class="col-md-6 text-center">
                        <h3>Shubham Umbarkar</h3>
                        <p class="text-muted">Web Developer</p>
                        <div class="social mt-4">
                            <a href="#"><span class="icon-facebook"></span></a>
                            <a href="#"><span class="icon-twitter"></span></a>
                            <a href="#"><span class="icon-instagram"></span></a>
                            <a href="#"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                </div>
        </section>

        <?php
    include 'partials/_footer.php';
    ?>

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
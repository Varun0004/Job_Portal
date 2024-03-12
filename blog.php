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
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Our Blog</h1>
                        <div class="custom-breadcrumbs">
                            <a href="#">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Blog</strong></span>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <div class="text-center mt-3 "><a href="add-blog.php<?php if($loggedin){echo'?uid='. $uid;}?>"
                class="  btn btn-outline-dark border-width-2 d-none d-lg-inline-block"><span
                    class="mr-2 icon-add"></span>Add Blog</a>
        </div>
        <div class="container">
            <section class="site-section">

                <div class="row mb-5">
                    <?php 
            include'partials/db_connect.php';
            $sql = "SELECT * FROM `blog`";
            $result = mysqli_query($conn, $sql);
            while($row= mysqli_fetch_assoc($result))
            {
                $id= $row['bid'];
                $image = $row["blogimg"];
                $title=$row['title'];
                $date=$row['date'];
                $image=$row['blogimg'];
                echo'<div class="col-md-6 col-lg-4">
                        <a href="blog-single.php?bid='.$id.'&'; if($loggedin){echo'uid='. $uid;}
                        echo'"><img src="images/'.$image.'" alt="Image" class="rounded mb-2"
                                width="350px"></a>
                        <h3><a href="blog-single.php?bid='.$id.'&'; if($loggedin){echo'uid='. $uid;}
                        echo'" class="text-black">'.$title.'</a>
                        </h3>
                        <div>'.$date.' <span class="mx-2">|</span> <a href="#"> Comments</a></div>
                    </div>';
            }
            ?>
                </div>
            </section>
        </div>
        <?php include'partials/_footer.php';?>

    </div>

    <!-- SCRIPTS -->
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
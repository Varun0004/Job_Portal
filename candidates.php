<?php
include'partials/db_connect.php';
$uid=$_GET['uid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT</title>
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
    <link rel="stylesheet" href="css/loader.css">
</head>

<body>

    <form action="" method="post">
    <div class="site-wrap">
        <?php include'partials/rec_header.php'?>
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">REPORT</h1>
                        <div class="custom-breadcrumbs">
                            <a href="#">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Candidate</strong></span>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class=" mt-5 container ">
            <div class="scroll" style="width:100%; height:400px;overflow:scroll">
                <table class="table border  ">
                    <thead>
                        <tr>
                            <th scope="col">Sno.</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Experience</th>
                            <th scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'partials/db_connect.php';
                        $sql = "SELECT * FROM `applyjob` where rid='$uid'";
                        $result = mysqli_query($conn, $sql);
                        $i=1;
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                           
                            $name = $row['name'];
                            $email = $row['email'];
                            $exp = $row['experience'];
                            $status = $row['status'];

                            echo'<tr>
                                    
                                    <td>'.$i.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$exp.'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                                $i++;
                        }

                        ?>

                    </tbody>
                </table>
                &nbsp;
            </div>
            <button  class="btn btn-danger mt-5"><a href="print.php?report=candidate&rid=<?php echo $uid;?>">Download pdf</a></button>
        </section>
        </form>
        <?php include'partials/rec_footer.php'?>
    </div>
   
    
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
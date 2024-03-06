<?php
$showAlert=false;
$showError=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
   {
      if(isset($_POST['comment']))
      {
        include'partials/db_connect.php';
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $existsSql="select * from faq where title='$title'";
        $existsResult=mysqli_query($conn, $existsSql);
        if(mysqli_num_rows($existsResult)> 0)
        {
          $showError="Question Already asked.. please ask another question";
        }
        else
        {
          $sql = "insert into  `faq`(`fid`,`description`,`title`) values(null,'$desc','$title')";
          $result = mysqli_query($conn, $sql);
          if($result)
          {
            $showAlert=true;
          }
          else
          {
            $showError="Question not Posted Please try again later..!";
          }
        }
      }
    }
    else{
      header("location:login.php?click=1");
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
        <?php  include'partials/_header.php';?>

        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Frequently Ask Questions</h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.html">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>FAQ</strong></span>
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
        <strong></strong>Question Posted Successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        }
        if($showError)
          {
          echo'
            <div class="alert alert-danger  fade show" role="alert">
          <strong>Error!---> </strong>'.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }?>

        <section class="site-section" id="accordion">
            <div class="container">

                <div class="row accordion justify-content-center block__76208">
                    <div class="col-lg-6">
                        <img src="images/sq_img_8.jpg" alt="Image" class="img-fluid rounded">
                    </div>

                    <div class="col-lg-5 ml-auto">
                        <div class="accordion-item">
                            <?php
        include'partials/db_connect.php';
        $sqls = "SELECT * FROM `faq`";
            $results = mysqli_query($conn, $sqls);
            while($row= mysqli_fetch_assoc($results))
            {
              $heading= $row['title'];
              $message= $row['description'];
             
                    echo'
                            <h3 class="mb-0 heading">
                                <a class="btn-block h4" data-toggle="collapse" href="#collapseFive" role="button"
                                    aria-expanded="true" aria-controls="collapseFive">'. $heading.'<span class="icon"></span></a>
                            </h3>
                            <div id="collapseFive" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="body-text">
                                    <p>'. $message.'<p>
                                </div>
                                </div> ';
                  }
                  ?>

                        </div>
                    </div>
                </div>
                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5  " style="color:green;">Ask Your Question</h3>
                    <form action="#" method="post">
                        <div class="form-group ">
                            <label for="name">Title <b style="color:red;">*</b></label>
                            <input type="text" style="width:50%;" name="title" minlength="20" maxlength="100"
                                class="form-control" placeholder="Enter title/subject of your Question" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Description</label>
                            <textarea name="desc" style="width:50%;" cols="30" minlength="100" rows="5"
                                class="form-control" placeholder="Explain in Brief" required></textarea>
                        </div>
                        <div class="form-group  ">
                            <input type="submit" style="width:20%;" name="comment" value="Post "
                                class="btn btn-primary btn-md">
                        </div>
                    </form>
                </div>
            </div>
        </section>

    
        <?php  include'partials/_footer.php';?>

    </div>

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
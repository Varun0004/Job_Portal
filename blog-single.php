<?php

$showAlert=false;
$showError=false;
 $id=$_GET['bid'];
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(isset($_POST['comment']))
include'partials/db_connect.php';
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$existsSql="select * from comments where email='$email' and message='$message'";
$existsResult=mysqli_query($conn, $existsSql);
if(mysqli_num_rows($existsResult)> 0)
{
  $showError="Message already Posted  please sent another message";
}
else
{
$sql = "insert into  `comments`(`c_id`,`name`,`email`,`message`,`bid`) values(null,'$name','$email','$message','$id')";
$result = mysqli_query($conn, $sql);
if($result)
{
  $showAlert=true;
}
else
{
  $showError="Comment not Posted Please try again later..!";
}
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
        <!-- NAVBAR -->
        <?php include'partials/_header.php';?>
        <?php 
            include'partials/db_connect.php';
           
            $sql = "SELECT * FROM `blog` where bid='$id'";
            $result = mysqli_query($conn, $sql);
            while($row= mysqli_fetch_assoc($result))
            {
                $image=$row['blogimg'];
                $name= $row['a_name'];
                $title=$row['title'];
                $date=$row['date'];
                $desc=$row['des'];
                $image=$row['blogimg'];
                $a_img=$row['a_img'];
                $about=$row['a_about'];
            }
            $sqls = "SELECT * FROM `comments`";
            $results = mysqli_query($conn, $sqls);
            while($row= mysqli_fetch_assoc($results))
            {
              $fname= $row['name'];
              $message= $row['message'];
              $datetime= $row['date'];
                
            }
            ?>
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom-breadcrumbs mb-0">
                            <span class="slash text-white">Posted by <?php echo $name;?></span>
                            <span class="mx-2 slash">&bullet;</span>
                            <span class="text-white"><strong><?php echo $date;?></strong></span>
                        </div>
                        <h1 class="text-white"><?php echo $title;?></h1>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if($showAlert)
        {
        echo'
          <div class="alert alert-success  fade show" role="alert">
        <strong></strong>Comment Posted Successfully
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
        <section class="site-section" id="next-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 blog-content">
                        <p class="lead"><?php echo substr($desc,0,200).'....';?></p>
                        <p><img src="images/<?php echo $image;?>" alt="Image" width="750px" class=""></p>
                        <p><?php echo substr($desc,200);?></p>
                        <div class="pt-5">

                            <?php
               include'partials/db_connect.php';
              $sqls = "SELECT * FROM `comments` where bid='$id'";
              $results = mysqli_query($conn, $sqls);
              $count=mysqli_num_rows($results);
             echo' <h3 class="mb-5">'.$count.' Comments</h3>';

              while($row= mysqli_fetch_assoc($results))
              {
                $fname= $row['name'];
                $message= $row['message'];
                $datetime= $row['date']; 
               echo' <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio " >
                    <img  src="images/img1.png" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>'. $fname.'</h3>
                    <div class="meta">'. $datetime.'</div>
                    <p>'. $message.'</p>
                  </div>
                </li>
                
              </ul>';   
              }
            ?>



                            <!-- END comment-list -->
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5  " style="color:green;">Leave a comment</h3>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="name">Name <b style="color:red;">*</b></label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <b style="color:red;">*</b></label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" cols="30" rows="5" class="form-control"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="comment" value="Post Comment"
                                            class="btn btn-primary btn-md">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 sidebar pl-lg-5">

                        <div class="sidebar-box">
                            <img src="images/img1.png" alt="Image placeholder"
                                class="img-fluid mb-4 w-50 rounded-circle">
                            <h3>About The Author</h3>
                            <p><?php echo $about;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include'partials/_footer.php';?>
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
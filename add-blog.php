<?php
$showAlert=false;
$showError=false;
$techError=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  include("partials/db_connect.php");
  $filename = $_FILES["fimage"]["name"];
  $tempname = $_FILES["fimage"]["tmp_name"];
  $folder = "./images/" . $filename;
  $aname=$_POST["aname"];
  $title=$_POST["title"];
  $desc=$_POST["blogdesc"];
  $about=$_POST["about"];
 $filename1 = $_FILES["aimage"]["name"];
  $tmpname = $_FILES["aimage"]["tmp_name"];
  $folder1 = "./images/" . $filename1;
  $existsSql="select * from blog where title='$title' and a_name='$aname'";
  $existsResult=mysqli_query($conn, $existsSql);
  if(mysqli_num_rows($existsResult)> 0)
  {
    $showError="$jobtitle Blog already Posted ....";
  }
  else
  {
    $sql="INSERT INTO `blog` (`bid`,`title`, `date`,`blogimg`, `des`, `a_name`,`a_img`, `a_about`) 
    VALUES (NULL,'$title', current_timestamp(),'$filename', '$desc', '$aname','$filename1', '$about');";
      $result=mysqli_query($conn, $sql);
    //  image
        move_uploaded_file($tempname, $folder);
    // logo
        move_uploaded_file($tmpname, $folder1);
      if($result)
      {
        $showAlert=true;
      }
      else
      {
        $showError="Blog not posted please try again!";
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


<body id="top " class="">
        <!-- .site-mobile-menu -->
        <?php include'partials/_header.php';?>
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Add Blog</h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                            <a href="#">Blog</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Add a Blog</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="php py-2">
            <?php
          if($showAlert)
          {
          echo'
            <div class="alert alert-success  fade show" role="alert">
          <strong></strong> Blog posted sucessfully
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
        </div>
        <section class="site-section">
            <div class="container my-0">
                <form class="p-4 p-md-5  border rounded" method="post" enctype="multipart/form-data">
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h3 class="text-black mb-5 border-bottom pb-2">Blog Details</h3>

                            <div class="form-group">
                                <label for="company-website-tw d-block">Upload front Image</label> <br>
                                <label class="btn btn-primary btn-md btn-file">
                                    Browse File<input required type="file" name="fimage" hidden>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="job-title">Blog Title</label>
                                <input required type="text" class="form-control" name="title" >
                            </div>


                            <div class="form-group">
                                <label for="job-description">Blog Description</label>

                                <!-- <p name="jobdesc">Write Job Description!</p> -->
                                <textarea name="blogdesc" rows="6" class="form-control"
                                    placeholder="Write Job Description here...."></textarea>

                            </div>

                            <!-- company details -->
                            <div class="company">
                                <h3 class="text-black my-5 border-bottom   pb-2">Author Details</h3>
                                <div class="form-group">
                                    <label for="company-name">Author Name</label>
                                    <input required type="text" name="aname" class="form-control" id="company-name"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="company-website-tw d-block">Upload Author Image</label> <br>
                                    <label class="btn btn-primary btn-md btn-file">
                                        Browse File<input required type="file" name="aimage" hidden>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="job-description">About Author</label>

                                    <!-- <p name="compdesc" >Description</p> -->
                                    <textarea name="about" rows="8" class="form-control" placeholder=""></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-4 ml-auto">
                            <div class="row">
                                <div class="col-6">
                                    <!-- <input required type="button" value="submit"> -->
                                    <button type="submit" id="btnsave1" class="btn btn-block btn-primary btn-md">post BLog</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </section>

        <?php include"partials/_footer.php"?>

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
<?php
$showAlert=false;
$showError=false;
$techError=false;
$rid=$_GET['uid'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  include("partials/db_connect.php");
  $filename = $_FILES["fimage"]["name"];
  $tempname = $_FILES["fimage"]["tmp_name"];
  $folder = "./images/" . $filename;
  $email=$_POST["email"];
  $jobtitle=$_POST["jobtitle"];
  $sdate=$_POST["startdate"];
  $ldate=$_POST["enddate"];
  $location=$_POST["location"];
  $jobtype=$_POST["type"];
  $gender=$_POST["gender"];
  $qualification=$_POST["education"];
  $experience=$_POST["experience"];
  $salary=$_POST["salary"];
  $vacancy=$_POST["vacancy"];
  $jobdesc=$_POST["jobdesc"];
  $jobresp=$_POST["jobresp"];
  $cname=$_POST["cname"];
  $tagline=$_POST["tagline"]; 
  $cdesc=$_POST["compdesc"];
  $web=$_POST["cweb"];
  $webfb=$_POST["webfb"];
  $webtw=$_POST["webtw"];
  $webld=$_POST["webld"];
  $filename1 = $_FILES["limage"]["name"];
  $tmpname = $_FILES["limage"]["tmp_name"];
  $folder1 = "./images/" . $filename1;
  $existsSql="select * from post_job where email='$email' and jobtitle='$jobtitle'";
  $existsResult=mysqli_query($conn, $existsSql);
  if(mysqli_num_rows($existsResult)> 0)
  {
    $showError="$jobtitle job already Posted with $email please use another email....";
  }
  else
  {
    $sql="INSERT INTO post_job(`sno`,`rid`,`jobimg`, `email`, `jobtitle`, `sdate`, `ldate`, 
    `joblocation`, `jobtype`, `gender`, `qualification`, `experience`,
     `salary`, `jobdesc`, `jobresp`,`compname`, `tagline`, `compdesc`, `website`,
      `webfb`, `webtw`, `webld`, `logo`) VALUES (NULL,'$rid','$filename','$email','$jobtitle',
      '$sdate','$ldate','$location','$jobtype','$gender','$qualification','$experience',
      '$salary','$jobdesc','$jobresp','$cname','$tagline','$cdesc','$web','$webfb','$webtw',
      '$webld','$filename1')";
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
        $showError="JOB not posted please try again!";
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
    

    <div class="site-wrap">

        
        <!-- .site-mobile-menu -->
        <?php include'partials/rec_header.php';?>
        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Post A Job</h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                            <a href="#">Job</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Post a Job</strong></span>
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
          <strong>Congratulations!</strong> job posted sucessfully
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        if($techError)
          {
          echo'
            <div class="alert alert-danger  fade show" role="alert">
          <strong>Error!---> </strong>'.$techError.'
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

                    <div class="row align-items-center mb-5">
                        <div class="col-lg-8 mb-4 mb-lg-0">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2>Post A Job</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                               
                                <div class="col-6">
                                    <!-- <a href="" class="btn btn-block btn-primary btn-md">Save Job</a> -->
                                    <button type="submit" id="btnsave" class="btn btn-block btn-primary btn-md">Save
                                        Job</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>

                            <div class="form-group">
                                <label for="company-website-tw d-block">Upload Featured Image</label> <br>
                                <label class="btn btn-primary btn-md btn-file">
                                    Browse File<input required type="file" name="fimage" hidden>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label><b style="color:red;"> *</b>
                                <input required type="email" class="form-control" id="email" name="email"
                                    placeholder="you@yourdomain.com">
                            </div>
                            <div class="form-group">
                                <label for="job-title">Job Title</label><b style="color:red;"> *</b>
                                <input required type="text" class="form-control" name="jobtitle" id="job-title"
                                    placeholder="Product Designer">
                            </div>
                            <div class="form-group">
                                <label for="startdate">Start Date</label><b style="color:red;"> *</b>
                                <input required type="date" class="form-control" name="startdate" >
                            </div>
                            <div class="form-group">
                                <label for="enddate">End Date</label><b style="color:red;"> *</b>
                                <input required type="date" class="form-control" name="enddate" >
                            </div>

                            <div class="form-group">
                                <label for="job-location">Location</label><b style="color:red;"> *</b>
                                <input required type="text" class="form-control" name="location" id="job-location"
                                    placeholder="e.g.pune">
                            </div>

                            <div class="form-group">
                                <label for="job-type">Job Type</label><b style="color:red;"> *</b>
                                <select class="selectpicker border rounded" name="type" id="job-type"
                                    data-style="btn-black" data-width="100%" data-live-search="true"
                                    title="Select Job Type" required>
                                    <option>Part Time</option>
                                    <option>Full Time</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label><b style="color:red;"> *</b>
                                <select class="selectpicker border rounded" name="gender" id="gender"
                                    data-style="btn-black" data-width="100%" data-live-search="true"
                                    title="Select Gender" required>
                                    <option>Any</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="education">Education Qualification</label><b style="color:red;"> *</b>
                                <select class="selectpicker border rounded" name="education" id=""
                                    data-style="btn-black" data-width="100%" data-live-search="true"
                                    title="Select Qualification" required>
                                    <option>POST-GRADUATE</option>
                                    <option>UNDER_GRADUATE</option>
                                    <option>DIPLOMA</option>
                                    <option>HSC</option>
                                    <option>SSC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label><b style="color:red;"> *</b>
                                <input required type="text" class="form-control" name="experience" id=""
                                    placeholder="eg.fresher">
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label><b style="color:red;"> *</b>
                                <input required type="text" class="form-control" name="salary" id=""
                                    placeholder="eg.30k">
                            </div>
                            <div class="form-group">
                                <label for="vacancy">Vacancy</label><b style="color:red;"> *</b>
                                <input required type="text" class="form-control" name="vacancy" id=""
                                    placeholder="eg.10-20">
                            </div>
                            <div class="form-group">
                                <label for="job-description">Job Description</label><b style="color:red;"> *</b>

                                <!-- <p name="jobdesc">Write Job Description!</p> -->
                                <textarea required name="jobdesc" rows="6" class="form-control" placeholder="Write Job Description here...."></textarea>

                            </div>
                            <div class="form-group">
                                <label  for="job-responsiblites">Job Responsiblities</label><b style="color:red;"> *</b>
                                <textarea required  name="jobresp" rows="6" class="form-control" placeholder="Write Responsiblities here..."></textarea>

                            </div>
                            <!-- company details -->
                            <div class="company">
                            <h3 class="text-black my-5 border-bottom   pb-2">Company Details</h3>
                            <div class="form-group">
                                <label for="company-name">Company Name</label><b style="color:red;"> *</b>
                                <input required type="text" name="cname" class="form-control" id="company-name"
                                    placeholder="e.g.abc company name">
                            </div>

                            <div class="form-group">
                                <label for="company-tagline">Tagline</label>
                                <input  type="text" name="tagline" class="form-control" id="company-tagline"
                                    placeholder="company tagline">
                            </div>

                            <div class="form-group">
                                <label for="job-description">Company Description</label>

                                <!-- <p name="compdesc" >Description</p> -->
                                <textarea name="compdesc" rows="8" class="form-control"
                                    placeholder="write Description here"></textarea>

                            </div>

                            <div class="form-group">
                                <label for="company-website">Website</label><b style="color:red;"> *</b>
                                <input required type="text" class="form-control" name="cweb" id="company-website"
                                    placeholder="https://">
                            </div>

                            <div class="form-group">
                                <label for="company-website-fb">Facebook Username </label>
                                <input  type="text" class="form-control" name="webfb" id="company-website-fb"
                                    placeholder="@username">
                            </div>

                            <div class="form-group">
                                <label for="company-website-tw">Twitter Username</label>
                                <input  type="text" class="form-control" name="webtw" id="company-website-tw"
                                    placeholder="@companyname">
                            </div>
                            <div class="form-group">
                                <label for="company-website-tw">Linkedin Username </label>
                                <input  type="text" class="form-control" name="webld" id="company-website-tw"
                                    placeholder="@companyname">
                            </div>

                            <div class="form-group">
                                <label for="company-website-tw d-block">Upload Logo</label><b style="color:red;"> *</b> <br>
                                <label class="btn btn-primary btn-md btn-file">
                                    Browse File<input required type="file" name="limage" hidden>
                                </label>
                            </div>
                            </div>



                        </div>


                    </div>
                    <div class="row align-items-center mb-5">

                        <div class="col-lg-4 ml-auto">
                            <div class="row">
                                <div class="col-6">
                                    <!-- <input required type="button" value="submit"> -->
                                    <button type="submit" id="btnsave1" class="btn btn-block btn-primary btn-md">Save
                                        Job</button>
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
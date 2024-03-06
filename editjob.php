<?php
$showAlert=false;
$showError=false;
$techError=false;
$rid=$_GET['uid'];
$jobid=$_GET['job'];
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
    $sql="UPDATE `post_job` SET `rid`='$rid',`jobimg`='$filename',`email`='$email'
    ,`jobtitle`='$jobtitle',`sdate`='$sdate',`ldate`='$ldate',`joblocation`='$location',
    `jobtype`='$jobtype',`gender`='$gender',`qualification`='$qualification',`experience`='$experience',
    `salary`='$salary',`vacancy`='$vacancy',`jobdesc`='$jobdesc',`jobresp`='$jobresp',
    `compname`='$cname',`tagline`='$tagline',`compdesc`='$cdesc',`website`='$web',
    `webfb`='$webfb',`webtw`='$webtw',`webld`='$webld',`logo`='$filename1' WHERE  `sno`= '$jobid'";
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
        $showError="Something went wrong please try again!";
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
        <div class=" py-2">
            <?php
  if($showAlert)
  {
  echo'
    <div class="alert alert-success  fade show" role="alert">
  <strong></strong> Job Updated Sucessfully
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
 <?php
        include'partials/db_connect.php';
        $sql="SELECT * FROM `post_job` WHERE sno=$jobid";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $image=$row['jobimg'];
            $email=$row["email"];
            $jobtitle=$row["jobtitle"];
            $sdate=$row["sdate"];
            $ldate=$row["ldate"];
            $location=$row["joblocation"];
            $jobtype=$row["jobtype"];
            $gender=$row["gender"];
            $qualification=$row["qualification"];
            $experience=$row["experience"];
            $salary=$row["salary"];
            $vacancy=$row["vacancy"];
            $jobdesc=$row["jobdesc"];
            $jobresp=$row["jobresp"];
            $cname=$row["compname"];
            $tagline=$row["tagline"]; 
            $cdesc=$row["compdesc"];
            $web=$row["website"];
            $webfb=$row["webfb"];
            $webtw=$row["webtw"];
            $webld=$row["webld"];
           $logo=$row['logo'];      
          }
    echo' 
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
                                <button type="submit" id="btnsave" class="btn btn-block btn-primary btn-md">Update</button>
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
                                     Browse File<input   type="file" name="fimage" hidden >
                                 </label>
                             </div>
     
                             <div class="form-group">
                                 <label for="email">Email</label><b style="color:red;"> *</b>
                                 <input required  type="email" class="form-control" id="email" name="email" value='.$email.'
                                     >
                             </div>
                             <div class="form-group">
                                 <label for="job-title">Job Title</label><b style="color:red;"> *</b>
                                 <input required  type="text" class="form-control" name="jobtitle" id="job-title"
                                      value='.$jobtitle.' >
                             </div>
                             <div class="form-group">
                                 <label for="startdate">Start Date</label><b style="color:red;"> *</b>
                                 <input required  type="date" class="form-control" name="startdate" value='.$sdate.'  >
                             </div>
                             <div class="form-group">
                                 <label for="enddate">End Date</label><b style="color:red;"> *</b>
                                 <input required  type="date" class="form-control" name="enddate" value='.$ldate.'  >
                             </div>
     
                             <div class="form-group">
                                 <label for="job-location">Location</label><b style="color:red;"> *</b>
                                 <input required  type="text" class="form-control" name="location" id="job-location"
                                 value='.$location.' >
                             </div>
     
                             <div class="form-group">
                                 <label for="job-type">Job Type</label><b style="color:red;"> *</b>
                                 <select class="selectpicker border rounded" name="type" id="job-type"
                                     data-style="btn-black" data-width="100%" data-live-search="true"
                                     title="'.$jobtype.'"   >
                                     <option>Part Time</option>
                                     <option>Full Time</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="gender">Gender</label><b style="color:red;"> *</b>
                                 <select class="selectpicker border rounded" name="gender" id="gender"
                                     data-style="btn-black" data-width="100%" data-live-search="true"
                                     title="'.$gender.'"  >
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
                                     title="'.$qualification.'" >
                                     <option>POST-GRADUATE</option>
                                     <option>UNDER_GRADUATE</option>
                                     <option>DIPLOMA</option>
                                     <option>HSC</option>
                                     <option>SSC</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="experience">Experience</label><b style="color:red;"> *</b>
                                 <input required  type="text" class="form-control" name="experience" id=""
                                     value="'.$experience.'" >
                             </div>
                             <div class="form-group">
                                 <label for="salary">Salary</label><b style="color:red;"> *</b>
                                 <input required  type="text" class="form-control" name="salary" id=""
                                     value="'.$salary.'" >
                             </div>
                             <div class="form-group">
                                 <label for="vacancy">Vacancy</label><b style="color:red;"> *</b>
                                 <input required  type="text" class="form-control" name="vacancy" id=""
                                 value="'.$vacancy.'" >
                             </div>
                             <div class="form-group">
                                 <label for="job-description">Job Description</label><b style="color:red;"> *</b>
     
                                 <!-- <p name="jobdesc">Write Job Description!</p> -->
                                 <textarea  name="jobdesc" rows="6" class="form-control"  " >'.$jobdesc.'</textarea>
     
                             </div>
                             <div class="form-group">
                                 <label  for="job-responsiblites">Job Responsiblities</label><b style="color:red;"> *</b>
                                 <textarea   name="jobresp" rows="6" class="form-control"  >'.$jobresp.'</textarea>
     
                             </div>
                             <!-- company details -->
                             <div class="company">
                             <h3 class="text-black my-5 border-bottom   pb-2">Company Details</h3>
                             <div class="form-group">
                                 <label for="company-name">Company Name</label><b style="color:red;"> *</b>
                                 <input required  type="text" name="cname" class="form-control" id="company-name" value="'.$cname.'" >
                             </div>
     
                             <div class="form-group">
                                 <label for="company-tagline">Tagline</label>
                                 <input required  type="text" name="tagline" class="form-control" id="company-tagline"
                                 value="'.$tagline.'" >
                             </div>
     
                             <div class="form-group">
                                 <label for="comp-description">Company Description</label>
     
                                 <!-- <p name="compdesc" >Description</p> -->
                                 <textarea name="compdesc" rows="8" class="form-control"  >'.$cdesc.'</textarea>
     
                             </div>
     
                             <div class="form-group">
                                 <label for="company-website">Website</label><b style="color:red;"> *</b>
                                 <input required  type="text" class="form-control" name="cweb" id="company-website"
                                 value="'.$web.'" placeholder="https://" >
                             </div>
     
                             <div class="form-group">
                                 <label for="company-website-fb">Facebook Username </label>
                                 <input   type="text" class="form-control" name="webfb" id="company-website-fb"
                                 value="'.$webfb.'" >
                             </div>
     
                             <div class="form-group">
                                 <label for="company-website-tw">Twitter Username</label>
                                 <input  type="text" class="form-control" name="webtw" id="company-website-tw"
                                 value="'.$webtw.'" >
                             </div>
                             <div class="form-group">
                                 <label for="company-website-ld">Linkedin Username </label>
                                 <input  type="text" class="form-control" name="webld" id="company-website-tw"
                                 value="'.$webld.'" >
                             </div>
     
                             <div class="form-group">
                                 <label for="company-website-tw d-block">Upload Logo</label><b style="color:red;"> *</b> <br>
                                 <label class="btn btn-primary btn-md btn-file">
                                     Browse File<input   type="file" name="limage" value="'.$logo.'" hidden >
                                 </label>
                             </div>
                             </div>
                         </div>
                     </div>
                <div class="row align-items-center mb-5">

                    <div class="col-lg-4 ml-auto">
                        <div class="row">
                            <div class="col-6">
                                <!-- <input   type="button" value="submit"> -->
                                <button type="submit" id="btnsave1" class="btn btn-block btn-primary btn-md">update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </section>';
        ?>
        <?php include"partials/_footer.php"?>

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
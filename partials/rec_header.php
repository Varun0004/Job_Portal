<?php  
$uid=$_GET['uid'];
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
    $recloggedin = true;
   
} else {
    
    $recloggedin = false;
}
if($recloggedin==false)
{
    header("location:index.php");
}
?>

<header id="header" class="header fixed-top d-flex align-items-center bg-transparent">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1  class="text-light animated bounce infinite" alt="Transparent MDB Logo" id="animated-img1">JOBPORTAL</h1>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
      <ul>
                <li class="text-light">
                    <a class=" text-light" href="rec_index.php<?php if($recloggedin){echo'?uid='. $uid;} ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="text-light" href="rec_about.php<?php if($recloggedin){echo'?uid='. $uid;} ?>">About Us</a>
                </li>
                <li >
                    <a class="text-light"
                        href="jobs_posted.php<?php if($recloggedin){echo'?uid='. $uid;} ?>">Job-Posted</a>
                </li>
                <li >
                    <a class="text-light"
                        href="applied.php<?php if($recloggedin){echo'?uid='. $uid;} ?>">Applied-Candidates</a>
                </li>
               
                <li class="dropdown has-dropdown"><a class="text-light" href="#"><span>Reports</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="dd-box-shadow">
                        <li><a class="text-light"
                                href="candidates.php<?php if($recloggedin){echo'?uid='. $uid;} ?>">Candidates</a></li>
                        <li><a class="text-light"
                                href="jobs.php<?php if($recloggedin){echo'?uid='. $uid;} ?>">Jobs</a></li>
                    </ul>
                </li>
                <li>
                    <a class="text-light" href="rec_contact.php<?php if($recloggedin){echo'?uid='. $uid;} ?>">Contact Us</a>
                </li>
                <li>
                    <a class="text-light btn " href="logout.php">Log Out</a>
                </li>
            </ul>
        <i class="mobile-nav-toggle text-light d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <a class="btn-getstarted btn btn-outline-light text-light" href="post-job.php?uid=<?php echo $uid?>"><span class="icon-add"></span> Post-job</a>
      

    </div>
</header>
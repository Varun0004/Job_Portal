<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
    $uid = $_GET['uid'];
    include 'partials/db_connect.php';
    $sql = "SELECT * FROM `candidate_signup` where sno=$uid";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['fname'];
    }
} else {
    $loggedin = false;

}
?>
<header id="header" class=" header fixed-top d-flex align-items-center  ">
    <div class="container-fluid  d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <h3 class="text-light animated bounce infinite" alt="Transparent MDB Logo" id="animated-img1">JOBPORTAL</h3>
        </a>
        <!-- Nav Menu -->
        <nav id="navmenu" class="navmenu ">
            <ul>
                <li class="text-light">
                    <a class=" text-light" href="index.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li >
                    <a class="text-light" href="about.php<?php if($loggedin){echo'?uid='. $uid;} ?>">About Us</a>
                </li>
                <li class="">
                    <a class="text-white"
                        href="job-listings.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Job-Listings</a>
                </li>
                <li class="dropdown has-dropdown"><a class="text-light"  href="#"><span>Pages</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dd-box-shadow">
                        <li><a class="text-white" href="services.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Services</a></li>
                        <li><a class="text-white" href="portfolio.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Portfolio</a></li>
                        <li><a class="text-white" class="dropdown-item" href="faq.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Frequently
                                Ask Questions</a></li>
                        <li><a class="text-white" href="gallery.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Gallery</a></li>
                    </ul>
                </li>
                <li>
                    <a class="text-light" href="blog.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Blog</a>
                </li>
                <li>
                    <a class="text-light" href="contact-us.php<?php if($loggedin){echo'?uid='. $uid;} ?>">Contact Us</a>
                </li>
                
            <?php
                if (!$loggedin) {
                echo '
                <li class="dropdown has-dropdown d-lg-none ">
                    <a href="#" class="text-white"><span>Login As</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="dd-box-shadow">
                            <li><a class="text-white" href="login.php?click=1">Candidate <span class="icon-person"></span></a></li>
                            <li><a class="text-white" href="login.php?click=2">Recruiter <img src="images/recruit.png" alt=""></a></li>
                        </ul>
                    </li>';
                }
                if ($loggedin) {
                echo '
                <li class=" d-lg-none dropdown has-dropdown"><a class="text-light"  href="#"><span>Hi '; if($loggedin){echo $fname;}else{echo' User' ;} echo' </span> <i class="bi bi-chevron-down"></i></a>
                <ul class="dd-box-shadow">
                <li><a class="text-white"  href="user_profile.php">Edit Profile <span class="icon-person"></span></a></li>
                        <li><a class="text-white"  href="logout.php">Sign Out <span class=" icon-unlock"></span></a></li>
                </ul>
            </li>
                ';
                }
                
                ?>
            </ul>
            <i class="mobile-nav-toggle text-light d-xl-none bi bi-list"></i>
        </nav>
        <?php
        if ($loggedin) {
            echo '
            <a href="#" class="btn-getstarted animated tada infinite ml-5 text-white"><span class=" icon-bell"></span> </a>
            ';
        }
        if (!$loggedin) {
        echo '
        <div class="dropdown show animated pulse infinite  rounded d-none d-lg-inline-block">
            <a class="btn  btn-primary dropdown-toggle text-light" href="#" role="button"
                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class=" icon-lock_outline"></span>LogIn As</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="login.php?click=1"><span class="icon-person"></span>&nbsp;&nbsp;Candidate</a>
                <a class="dropdown-item" href="login.php?click=2"><img src="images/recruit.png" alt="">&nbsp;&nbsp;Recruiter </a>
            </div>
        </div>';
        }
        if ($loggedin) {
        echo '
        <div class="dropdown border rounded bg-dark d-none d-lg-inline-block">
            <a class="btn   dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class=" icon-person_outline"></span> Hi ';if($loggedin){echo $fname;}else{echo' User' ;}    echo'</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="user_profile.php?uid=' . $uid . '"><span
                        class="icon-person"></span>&nbsp;&nbsp;Edit Profile</a>
               
                <a class="dropdown-item" href="logout.php"><span class=" icon-unlock"></span>&nbsp;&nbsp;Sign
                    Out</a>
            </div>
        </div>
        ';
        }
        ?>
        <!-- End Nav Menu -->
    </div>
</header>
<!-- End Header -->

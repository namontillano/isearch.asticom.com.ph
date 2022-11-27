<?php
$pagetitle="Project Vega: Policies, Procedures and Guidelines";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
require ("functions/userlevel.php");
?>
<?php
if (empty($_GET['view'])) {
    header("Location: project-vega.php"); 
    die("Redirecting to: project-vega.php");
} else {
    switch ($_GET['view']) {
        case "access-control-policy-and-guidelines":
        $viewpagetitle = "Access Control Policy and Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1BCK7jch5OsaojuLRaI5fPrXf7QQqChvf/preview?authuser=0";
        break;
        case "byod-mobile-device-acceptable-use-policy":
        $viewpagetitle = "BYOD Mobile Device Acceptable Use Policy";
        $viewpagetitleurl = "https://drive.google.com/file/d/1g5sIEpgSgHGvnSM4RzaN66qqX9NWd_jf/preview?authuser=0";
        break;
        case "change-management-procedure":
        $viewpagetitle = "Change Management Procedure";
        $viewpagetitleurl = "https://drive.google.com/file/d/1nt70mLbInhT5Hq-bGVmx9IwrOR9uil_B/preview?authuser=0";
        break;
        case "clear-desk-and-clear-screen-guidelines":
        $viewpagetitle = "Clear Desk and Clear Screen Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1VZ5c7OvIhi8qkjam4tqGH0c304aia_3W/preview?authuser=0";
        break;
        case "code-of-discipline-guidelines":
        $viewpagetitle = "Code Of Discipline Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1-sceNoieTQyZYXfFde6Nat8rAerwzHkT/preview?authuser=0";
        break;
        case "compliance-with-legal-requirements-guidelines":
        $viewpagetitle = "Compliance With Legal Requirements Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1_lbCcAwW66rM28_sTgt5lI61oR-ka3d9/preview?authuser=0";
        break;
        case "employee-off-boarding-procedure":
        $viewpagetitle = "Employee Off-Boarding Procedure";
        $viewpagetitleurl = "https://drive.google.com/file/d/1XoG6iUW5AQ16CdzYnBkw_7GJtUjkxK1O/preview?authuser=0";
        break;
        case "employee-on-boarding-and-movement-procedure":
        $viewpagetitle = "Employee On-Boarding and Movement Procedure";
        $viewpagetitleurl = "https://drive.google.com/file/d/1_-6nZHaTByW8d_NWHCQm8lNZlJCqz82c/preview?authuser=0";
        break;
        case "ims-acceptable-use-guidelines":
        $viewpagetitle = "IMS Acceptable Use Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1_-6nZHaTByW8d_NWHCQm8lNZlJCqz82c/preview?authuser=0";
        break;
        case "ims-control-of-documents-and-records":
        $viewpagetitle = "IMS Control Of Documents and Records";
        $viewpagetitleurl = "https://drive.google.com/file/d/1R9MDftRf1WOjFh_XtHgE9K45MIngOZay/preview?authuser=0";
        break;
        case "ims-internal-and-external-communication":
        $viewpagetitle = "IMS Internal and External Communication";
        $viewpagetitleurl = "https://drive.google.com/file/d/1AtOOhAPMjpT4En6XQTLiI8HJaG5fbdPX/preview?authuser=0";
        break;
        case "ims-internal-audit-management-review-and-nonconformity-corrective-action":
        $viewpagetitle = "IMS Internal Audit, Management Review and Nonconformity & Corrective Action Procedure";
        $viewpagetitleurl = "https://drive.google.com/file/d/1hCi2SigNd_lLBX-btVnq81OF-JRjsqMa/preview?authuser=0";
        break;
        case "ims-training-and-awareness-guidelines":
        $viewpagetitle = "IMS Training and Awareness Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1gI6b-oLAC1KAZcKIFpmbzs7QmLQDOi8E/preview?authuser=0";
        break;
        case "incident-management-procedure":
        $viewpagetitle = "Incident Management Procedure";
        $viewpagetitleurl = "https://drive.google.com/file/d/1xe51sKjo2POe5ugj2au2dsmBeQkX7_AU/preview?authuser=0";
        break;
        case "incident-management-procedure":
        $viewpagetitle = "Information Classification Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1xe51sKjo2POe5ugj2au2dsmBeQkX7_AU/preview?authuser=0";
        break;
        case "integrated-management-system-manual":
        $viewpagetitle = "Integrated Management System Manual";
        $viewpagetitleurl = "https://drive.google.com/file/d/1dkvWmbpE87IHLdxH23narY-5zKoK9Tqz/preview?authuser=0";
        break;
        case "integrated-management-system-policy":
        $viewpagetitle = "Integrated Management System Policy";
        $viewpagetitleurl = "https://drive.google.com/file/d/1QfKlRytla-K6uRLMfg3cBjBhs7vINj2B/preview?authuser=0";
        break;
        case "physical-and-environmental-security-guidelines":
        $viewpagetitle = "Physical and Environmental Security Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1wHqfD6sw9U0h9e1mDzQvyLz9Kq60nv4g/preview?authuser=0";
        break;  
        case "ctg-service-catalogue":
        $viewpagetitle = "Service Catalogue";
        $viewpagetitleurl = "https://drive.google.com/file/d/15Rq41wJJMaoCXHa9ZJ2DjjpIRLvATLab/preview?authuser=0";
        break;     
        default: header("Location: project-vega.php"); die("Redirecting to: project-vega.php");;
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title><?=APP_NAME." | ".$pagetitle." > ".$viewpagetitle;?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=ASSETS;?>custom/img/favicon.png" title="Favicon" sizes="16x16" />

    <!-- ====== bootstrap icons cdn ====== -->
    <link rel="stylesheet" href="<?=ASSETS;?>vendor/bootstrap-icons%401.7.2/font/bootstrap-icons.css">

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="<?=ASSETS;?>css/lib/bootstrap.min.css">

    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=ASSETS;?>css/lib/all.min.css" />
    <link rel="stylesheet" href="<?=ASSETS;?>css/lib/animate.css" />
    <link rel="stylesheet" href="<?=ASSETS;?>css/lib/jquery.fancybox.css" />
    <link rel="stylesheet" href="<?=ASSETS;?>css/lib/lity.css" />
    <link rel="stylesheet" href="<?=ASSETS;?>css/lib/swiper.min.css" />

    <!-- ====== global style ====== -->
    <link rel="stylesheet" href="<?=ASSETS;?>css/style.css" />

    <!-- ====== custom style ====== -->
    <link rel="stylesheet" href="<?=ASSETS;?>custom/css/style.css" />
</head>

<body>

    <!-- ====== start loading page ====== -->
    <div id="preloader"></div>
    <!-- ====== end loading page ====== -->

    <!-- ====== start top navbar ====== -->
    <?php include "top-navbar.php"; ?>
    <!-- ====== end top navbar ====== -->

    <!-- ====== start navbar ====== -->
    <?php include "navbar.php"; ?>
    <!-- ====== end navbar ====== -->

    <!-- ====== start content ====== -->
    <main>
        <section class="about section-padding style-4 pt-0">
            <div class="content frs-content">
                <div class="container">

                    <div class="section-head text-center mb-80 style-5">
                        <div class="page-links color-999">
                            <a href="<?=URL_ROOT;?>index.php" class="me-2">
                                Home
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>project-vega.php" class="me-2">
                                <?php echo $pagetitle; ?>
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>project-vega-details.php?view=<?php echo $_GET['view']?>" class="color-000">
                                <?php echo $viewpagetitle; ?>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-50">
                            <img src="<?=ASSETS;?>custom/img/ISO3.png" class="rounded img-fluid">
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mt-20 mb-20">
                        <h2 class="mb-10"><span> <?php echo $viewpagetitle; ?> </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-10">
                            <iframe sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads allow-modals" frameborder="0" aria-label="" allowfullscreen="" src="<?php echo $viewpagetitleurl;?>" width="100%" height="1000px"></iframe>
                        </div>
                    </div>


                </div>

                <img src="<?=ASSETS;?>img/about/about_s4_lines.png" alt="" class="lines">
                <img src="<?=ASSETS;?>img/about/about_s4_bubble.png" alt="" class="bubble">

            </div>




        </section>






    </main>
    <!-- ====== end content ====== -->

    <!-- ====== start footer ====== -->
    <?php include "footer.php"; ?>
    <!-- ====== end footer ====== -->


    <!-- ====== widgets ====== -->
    <?php include "widgets.php"; ?>
    <!-- ====== chat-support  ====== -->

    <!-- ====== start to top button ====== -->
    <a href="#" class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up fs-6 text-dark"></i>
    </a>
    <!-- ====== end to top button ====== -->

    <!-- ====== request ====== -->
    <script src="<?=ASSETS;?>js/lib/jquery-3.0.0.min.js"></script>
    <script src="<?=ASSETS;?>js/lib/jquery-migrate-3.0.0.min.js"></script>
    <script src="<?=ASSETS;?>js/lib/bootstrap.bundle.min.js"></script>
    <script src="<?=ASSETS;?>js/lib/wow.min.js"></script>
    <script src="<?=ASSETS;?>js/lib/jquery.fancybox.js"></script>
    <script src="<?=ASSETS;?>js/lib/lity.js"></script>
    <script src="<?=ASSETS;?>js/lib/swiper.min.js"></script>
    <script src="<?=ASSETS;?>js/lib/jquery.waypoints.min.js"></script>
    <script src="<?=ASSETS;?>js/lib/jquery.counterup.js"></script>
    <script src="<?=ASSETS;?>js/lib/pace.js"></script>
    <script src="<?=ASSETS;?>js/lib/scrollIt.min.js"></script>
    <script src="<?=ASSETS;?>js/main.js"></script>
    
    <?php include "functions/searchscript.php"; ?>
    <?php include "functions/digiofficereminders.php"?>
</body>

</html>
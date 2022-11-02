<?php
$pagetitle="Home";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
require ("functions/userlevel.php");
?>
<?php
if (empty($_GET['view'])) {
    header("Location: index.php"); 
    die("Redirecting to: index.php");
} else {
    switch ($_GET['view']) {
        case "mars":
        $viewpagetitle = "MARS Chatbot";
        $viewpagetitleurl = "https://drive.google.com/file/d/1rumwY-Y1rwpgzeXNUzVj6jxB1SDHFwFE/preview?authuser=0";
        break;
        case "ava":
        $viewpagetitle = "AVA Chatbot";
        $viewpagetitleurl = "https://drive.google.com/file/d/1rumwY-Y1rwpgzeXNUzVj6jxB1SDHFwFE/preview?authuser=0";
        break;
        case "fred":
        $viewpagetitle = "FRED Chatbot";
        $viewpagetitleurl = "https://drive.google.com/file/d/1VQxTVkh4HWcDnZqeFf4jRnyFuBpKhVnt/preview?authuser=0";
        case "our-mission":
        $viewpagetitle = "Our Mission";
        $viewpagetitleurl = "https://drive.google.com/file/d/11KymozQd6DHQR41cNWD1ZjMH1PGnXlrd/preview?authuser=0";
        break;
        case "our-vision":
        $viewpagetitle = "Our Vision";
        $viewpagetitleurl = "https://drive.google.com/file/d/160eFNaV77Nia1WIk9_qUiEunEsPHKL7W/preview?authuser=0";
        break;
        case "our-company":
        $viewpagetitle = "Our Company";
        $viewpagetitleurl = "https://drive.google.com/file/d/19qmN3eLBOmH_qXh-6h4hOgdZFeAAF-_u/preview?authuser=0";
        break;
        case "our-promise":
        $viewpagetitle = "Our Promise";
        $viewpagetitleurl = "https://drive.google.com/file/d/1IiEk_UbOKJ_N_5P0qxamQiPyInOdfBLv/preview?authuser=0";
        break;

        case "asticom-group-of-companies":
        $viewpagetitle = "Asticom Group Of Companies";
        $viewpagetitleurl = "https://drive.google.com/file/d/1vfrt2dyAUqkIN_w_3JIOC-kvOzc3SSb8/preview?authuser=0";
        break;

        case "employee-engagement":
        $viewpagetitle = "Employee Engagement";
        $viewpagetitleurl = "https://drive.google.com/file/d/14myn3a0Ne9QV1yvxGU-t6r4ZYJyo3u2e/preview?authuser=0";
        break;

        case "how-to-get-verified-with-gcash":
        $viewpagetitle = "How to get verified with GCash";
        $viewpagetitleurl = "https://drive.google.com/file/d/1xRhOubjYmdhaoSzFHX_ECbeD1lKDin4C/preview?authuser=0";
        break;

        case "call-konsulta-md":
        $viewpagetitle = "Call Konsulta MD";
        $viewpagetitleurl = "https://drive.google.com/file/d/1oPS4pkgR4-kRdTPEwh0smBrKtvbC5Nnv/preview?authuser=0";
        break;

        case "core-values":
        $viewpagetitle = "Core Values";
        $viewpagetitleurl = "https://drive.google.com/file/d/1fomgnM3JGzJ-idH5X-E8qfL7T3zeSRzq/preview?authuser=0";
        break;

        case "modical-consultation":
        $viewpagetitle = "Medical Consultation";
        $viewpagetitleurl = "https://drive.google.com/file/d/12eFAM22-wVwcG8yv9OTfsPB0OCVaDE66/preview?authuser=0";
        break;

        case "covid-19-guidelines-mission":
        $viewpagetitle = "COVID-19 Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1sNKc84fzkQyjtRxpLzzqiZPQyon2TtTm/preview?authuser=0";
        break;

        case "talent-segment":
        $viewpagetitle = "Talent Segment";
        $viewpagetitleurl = "https://drive.google.com/file/d/1uoBZu33syP0V1wcFwrVtkxyFzz1OamX2/preview?authuser=0";
        break;

        case "daily-check":
        $viewpagetitle = "Daily Check";
        $viewpagetitleurl = "https://drive.google.com/file/d/1OET9mOmXKBqpAYPbeRAlHAuPWCrHIPBX/preview?authuser=0";
        break;
        default: header("Location: index.php"); die("Redirecting to: index.php");;
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
                            <a href="<?=URL_ROOT;?>index.php" class="me-2">
                                <?php echo $viewpagetitle; ?>
                            </a>
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mt-20 mb-20">
                        <h2 class="mb-10"><span> <?php echo $viewpagetitle; ?> </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-10">
                            <iframe sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads allow-modals" frameborder="0" aria-label="" allowfullscreen="" src="<?php echo $viewpagetitleurl;?>" width="100%" height="600"></iframe>
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


    <!-- ====== chat-support ====== -->
    <?php include "chat-support.php"; ?>
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
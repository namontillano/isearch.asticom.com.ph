<?php
$pagetitle="About";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
include_once "functions/token.php";
require ("functions/userlevel.php");

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
    <title><?=APP_NAME." | ".$pagetitle;?></title>

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

    <link rel="stylesheet" href="<?=ASSETS;?>vendor/sweetalert2/sweetalert2.min.css" />


</head>

<body id="body-id" data-userid="<?php if(!empty($_SESSION['google_id'])){ echo $_SESSION['google_id'];} else { echo '';} ?>">

    <!-- ====== start loading page ====== -->
    <div id="preloader"></div>
    <!-- ====== end loading page ====== -->

    <!-- ====== start top navbar ====== -->
    <?php include "top-navbar.php"; ?>
    <!-- ====== end top navbar ====== -->

    <!-- ====== start navbar ====== -->
    <?php include "navbar.php"; ?>
    <!-- ====== end navbar ====== -->

    <main >


        <header class="style-4">
            <div class="content" style="margin-bottom:150px">
                <div class="content frs-content" style="padding:0px">

                    <div class="container">
                        <div class="section-head text-center mb-80 style-5">
                        <div class="page-links color-999">
                            <a href="<?=URL_ROOT;?>index.php" class="me-2">
                                Home
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>about.php" class="color-000">
                                About
                            </a>
                        </div>
                    </div>

                       <div class="container">
                <div class="section-head text-center style-4 mb-20">
                    <h2 class="mb-10"> Mission &amp; <span> Vision </span></h2>
                </div>
                <div class="row mb-20">
                    <div class="col-md-6 mb-10">
                        <a href="<?=URL_ROOT;?>details.php?view=our-mission">
                            <img src="<?=ASSETS;?>custom/img/our-mission.png" class="rounded img-fluid">
                        </a>
                    </div>
                    <div class="col-md-6 mb-10">
                        <a href="<?=URL_ROOT;?>details.php?view=our-vision">
                            <img src="<?=ASSETS;?>custom/img/our-vision.png" class="rounded img-fluid">
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-10">
                        <a href="<?=URL_ROOT;?>details.php?view=our-company">
                            <img src="<?=ASSETS;?>custom/img/our-company.png" class="rounded img-fluid">
                        </a>
                    </div>
                    <div class="col-md-6 mb-10">
                        <a href="<?=URL_ROOT;?>details.php?view=our-promise">
                            <img src="<?=ASSETS;?>custom/img/our-promise.png" class="rounded img-fluid">
                        </a>
                    </div>
                </div>

            </div>
                </div>
            </div>
            <img src="assets/img/header/header_4_bubble.png" class="bubble">
        </div>
        <img src="assets/img/header/header_4_wave.png" class="wave">
    </header>



    <section class="features pt-70 pb-70 style-4" style="margin-top: -10px;">
        <div class="container">
            <div class="section-head text-center style-4">
                <h2 class="mb-70">Our <span> Services </span> </h2>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mb-30"><span style="font-variant: normal;">GROUP OF COMPANIES</span></h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="features-card text-center">
                                <a href="https://asticom.com.ph/" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-asticom.png">
                                    <h6 class="pt-10 pb-10">Asticom</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-card text-center">
                                <a href="https://absi.ph/" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-absi.png">
                                    <h6 class="pt-10 pb-10">ABSI</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-card text-center">
                                <a href="https://finsi.com.ph/" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-finsi.png">
                                    <h6 class="pt-10 pb-10">FINSI</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="features-card text-center">
                                <a href="https://hcx.com.ph/" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-hcx.png">
                                    <h6 class="pt-10 pb-10">HCX</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-card text-center">
                                <a href="<?=URL_ROOT;?>maintenance.php">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-acquiro.png">
                                    <h6 class="pt-10 pb-10">Acquiro</h6>
                                </a>
                            </div>
                        </div>
                        
                    </div>

                </div>

            </div>

            <div class="row mt-40">

                <div class="col-md-4">
                    <h4 class="text-center mb-30"><span style="font-variant: normal;">SOCIAL MEDIA</span></h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="features-card text-center">
                                <a href="https://currents.google.com/" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-currents.png">
                                    <h6 class="pt-10 pb-10">Currents</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features-card text-center">
                                <a href="https://asticomtechnologyinc.workplace.com/work/landing/input/" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-workplace.png">
                                    <h6 class="pt-10 pb-10">Worksplace</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4 class="text-center mb-30"><span style="font-variant: normal;">SYSTEMS & APPLICATIONS</span></h4>
                    <div class=" d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="features-card text-center">
                                <a href="https://asticom.atlassian.net/servicedesk/customer/portals" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-i-serve.png">
                                    <h6 class="pt-10 pb-10">i-Serve</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features-card text-center">
                                <a href="https://asticom.atlassian.net/servicedesk/customer/portal/30" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-employee-care.png">
                                    <h6 class="pt-10 pb-10">Employee Care</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4 class="text-center mb-30"><span style="font-variant: normal;">TIMEKEEPING</span></h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="features-card text-center">
                                <a href="https://script.google.com/a/asticom.com.ph/macros/s/AKfycbxiDYLD5-zlm_sHEsgKTRGri9KQu473oddW1VHYUpM/exec" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-rtwfm.png">
                                    <h6 class="pt-10 pb-10">RTWFM</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features-card text-center">
                                <a href="https://asticom.digiofficeapp.com/#/Login" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-digioffice.png">
                                    <h6 class="pt-10 pb-10">DigiOffice</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-40">
                <div class="col-md-12">
                    <h4 class="text-center mb-30"><span style="font-variant: normal;">HEALTH & BROADCASTING</span></h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-3">
                            <div class="features-card text-center">
                                <a href="<?=URL_ROOT;?>details.php?view=mars" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-mars.png">
                                    <h6 class="pt-10 pb-10">MARS Chatbot</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="features-card text-center">
                                <a href="<?=URL_ROOT;?>details.php?view=ava" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-ava.png">
                                    <h6 class="pt-10 pb-10">AVA Chatbot</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="features-card text-center">
                                <a href="<?=URL_ROOT;?>details.php?view=fred" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-fred.png">
                                    <h6 class="pt-10 pb-10">FRED Chatbot</h6>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="features-card text-center">
                                <a href="https://konsulta.md/" target="_blank">
                                    <img class="icons-services" src="<?=ASSETS;?>custom/img/icons/icon-konsulta-md.png">
                                    <h6 class="pt-10 pb-10">Konsulta MD</h6>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <img src="assets/img/feat_circle.png" alt='' class="img-circle">
    </section>


    <section class="about section-padding style-4">


        <div class="content frs-content">
            <div class="container">
                <div class="row  justify-content-center mb-20">

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=asticom-group-of-companies">
                            <img src="<?=ASSETS;?>custom/img/asticom-group-of-companies.jpg" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Asticom Group Of Companies</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=employee-engagement">
                            <img src="<?=ASSETS;?>custom/img/employee-engagement.jpg" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Employee Engagement</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=how-to-get-verified-with-gcash">
                            <img src="<?=ASSETS;?>custom/img/how-to-get-verified-with-gcash.jpg" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">How to get verified with GCash</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=call-konsulta-md">
                            <img src="<?=ASSETS;?>custom/img/call-konsulta-md.jpg" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Call Konsulta MD</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=core-values">
                            <img src="<?=ASSETS;?>custom/img/core-values.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Core Values</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=modical-consultation">
                            <img src="<?=ASSETS;?>custom/img/medical-consultation.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Medical Consultation</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=covid-19-guidelines-mission">
                            <img src="<?=ASSETS;?>custom/img/covid-19-guidelines.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">COVID-19 Guidelines</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=talent-segment">
                            <img src="<?=ASSETS;?>custom/img/talent-segment.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Talent Segment</span>
                            </h5>
                        </a>
                    </div>

                    <div class="col-md-6 mb-30">
                        <a href="<?=URL_ROOT;?>details.php?view=daily-check">
                            <img src="<?=ASSETS;?>custom/img/daily-check.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Daily Check</span>
                            </h5>
                        </a>
                    </div>

                </div>



            </div>

            <img src="assets/img/about/about_s4_lines.png" alt="" class="lines">
            <img src="assets/img/about/about_s4_bubble.png" alt="" class="bubble">
        </div>

        <img src="assets/img/about/about_s4_wave.png" alt="" class="top-wave">
    </section>


</main>
<!--End-Contents-->



<!-- ====== start footer ====== -->
<?php include "footer.php"; ?>
<!-- ====== end footer ====== -->

<!-- ====== widgets ====== -->
<?php include "widgets.php"; ?>
<!-- ====== chat-support  ====== -->

<!-- ====== start to top button ====== -->
<a class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
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
<script src="<?=ASSETS;?>js/lib/mixitup.min.js"></script>
<script src="<?=ASSETS;?>js/lib/scrollIt.min.js"></script>
<script src="<?=ASSETS;?>js/main.js"></script>
<script src="<?=ASSETS;?>vendor/sweetalert2/sweetalert2.min.js"></script>

<?php include "functions/searchscript.php"; ?>
<?php include "functions/digiofficereminders.php"?>
</body>
</html>
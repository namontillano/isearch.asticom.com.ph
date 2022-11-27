<?php
$pagetitle="Management";
$pageuserlevel=array("5");
require 'core/dbcon.php';
require "functions/session.php";
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
                            <a href="<?=URL_ROOT;?>management.php" class="color-000">
                                <?php echo $pagetitle; ?>
                            </a>
                        </div>
                    </div>
                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> AGC <span> Management </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-10">

                            <h3>
                                <span style="font-variant: normal;">Inquire</span>
                            </h3>

                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="https://www.google.com/url?q=https%3A%2F%2Fasticom.atlassian.net%2Fservicedesk%2Fcustomer%2Fportal%2F37&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw0-6MjoeUVdnkOo_W31mCQS" target="_blank">Request a Management Service: FARM, CTG, Marketing, IA</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="https://www.google.com/url?q=https%3A%2F%2Fasticom.atlassian.net%2Fservicedesk%2Fcustomer%2Fportal%2F12&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw08wDxewQc3H4a3jwflQYFt" target="_blank">Request a Management Service: Recruitment</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="https://www.google.com/url?q=https%3A%2F%2Fsites.google.com%2Fasticom.com.ph%2Fess%2Fmarketing-asti-ssc-ppm%3Fpli%3D1%26authuser%3D1&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw0XdEJbQkRUVrGaYaJao-Me" target="_blank">Marketing Policies and Procedures Manual</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="https://drive.google.com/file/d/16aPoXG0-1bEeBUg_XegZieCvxi3Lv59l/view?usp=sharing" target="_blank">How to process your request</a>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-6 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Dashboards</span>
                            </h3>
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="https://www.google.com/url?q=https%3A%2F%2Fasticom.atlassian.net%2Fsecure%2FDashboard.jspa%3FselectPageId%3D10036&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw0-zAQGSzefVglSEce4-4Jr" target="_blank">Management Services Dashboard</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="https://www.google.com/url?q=https%3A%2F%2Fasticom.atlassian.net%2Fsecure%2FDashboard.jspa%3FselectPageId%3D10041&amp;sa=D&amp;sntz=1&amp;usg=AOvVaw1g2OZB2irFC_oiJZPrhrGM" target="_blank">My Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </div>

                <img src="<?=ASSETS;?>img/about/about_s4_lines.png" alt="" class="lines">
                <img src="<?=ASSETS;?>img/about/about_s4_bubble.png" alt="" class="bubble">

            </div>

            <div class="content trd-content">
                <div class="container">
                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> Management <span> Services </span></h2>
                        <p>( SLA response time - 24 hours )</p>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-10">


                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Recruitment</button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse rounded-0" aria-labelledby="heading1" >
                                    <div class="accordion-body">
                                        <iframe src="https://drive.google.com/file/d/106pmb7qQA3cYn_0BhF2sXgvWUhlYEa33/preview" width="100%" height="480" allow="autoplay"></iframe>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">CyberTech</button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse rounded-0" aria-labelledby="heading2" >
                                    <div class="accordion-body">
                                        <iframe src="https://drive.google.com/file/d/1Om-4xWwLYEhy3nc2PI9UswMClzDSwh9v/preview" width="100%" height="480" allow="autoplay"></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">Marketing</button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse rounded-0" aria-labelledby="heading3" >
                                    <div class="accordion-body">
                                        <iframe src="https://drive.google.com/file/d/1Zb-dBXBNsam9sDSKriGaouYWPJq-EwVT/preview" width="100%" height="480" allow="autoplay"></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">Internal Audit</button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse rounded-0" aria-labelledby="heading4" >
                                    <div class="accordion-body">
                                        <iframe src="https://drive.google.com/file/d/1MxMSPne2er2qJMLGOQX0-or4_VYOHMHH/preview" width="100%" height="480" allow="autoplay"></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">Finance</button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse rounded-0" aria-labelledby="heading5" >
                                    <div class="accordion-body">
                                        <iframe src="https://drive.google.com/file/d/1_gfeu_VsuynriATsl52eszAm4Ae0xdcT/preview" width="100%" height="480" allow="autoplay"></iframe>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
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
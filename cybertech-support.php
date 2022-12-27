<?php
$pagetitle="CyberTech";
$viewpagetitle="iServe CTG Live Chat Support";
$viewpagetitlecat = "Troubleshooting";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
require "functions/userlevel.php";
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
                            <a href="<?=URL_ROOT;?>cybertech.php" class="me-2">
                                <?php echo $pagetitle; ?>
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>cybertech-support.php" class="color-000">
                                <?php echo $viewpagetitlecat." - ".$viewpagetitle; ?>
                            </a>
                        </div>
                    </div>



                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-5">
                            <div class="info">
                                <div class="section-head style-4">

                                    <h2 class="mb-30">iServe CTG <span> Live Chat Support </span> </h2>
                                </div>
                                <p class="text mb-20">
                                    Need help filling out forms? Don't know which form to fill out? Don't know where to go?
                                </p>

                                <p class="text mb-20">
                                    Let us help you! Now we can help right away! We'll help to  answer any questions you may have on iServe forms. Searching/finding the proper iServe form for your concern, to make your iServe experience better.
                                </p>

                                <button onclick="$('.pingpilot-button').click()" class="btn rounded-pill bg-blue4 fw-bold text-white mt-50">
                                    <small> Chat with us now! </small>
                                </button>
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="img mb-30 mb-lg-0">
                                <img src="<?=ASSETS;?>custom/img/about_s4_img3.png" alt="">
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
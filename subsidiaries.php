<?php
$pagetitle="Subsidiaries";
$pageuserlevel=array("0");
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
                            <a href="<?=URL_ROOT;?>subsidiaries.php" class="color-000">
                                <?php echo $pagetitle; ?>
                            </a>
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"><span> Subsidiaries </span></h2>
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-md-12 mb-20 mt-20 text-center">
                            <a href="<?=URL_ROOT;?>acquiro.php">
                                <img src="<?=ASSETS;?>custom/img/subsidiaries/acquiro-white.png" class="rounded img-fluid" style="max-height: 100px">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">Acquiro</span>
                                </h5>
                            </a>                            
                        </div>
                        <div class="col-md-12 mb-20 mt-20 text-center">
                            <a href="<?=URL_ROOT;?>absi.php">
                                <img src="<?=ASSETS;?>custom/img/subsidiaries/absi.png" class="rounded img-fluid" style="max-height: 100px">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">ABSI</span>
                                </h5>
                            </a>                            
                        </div>
                        <div class="col-md-12 mb-20 mt-20 text-center">
                            <a href="<?=URL_ROOT;?>finsi.php">
                                <img src="<?=ASSETS;?>custom/img/subsidiaries/finsi.png" class="rounded img-fluid" style="max-height: 100px">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">FINSI</span>
                                </h5>
                            </a>                            
                        </div>
                        <div class="col-md-12 mb-20 mt-20 text-center">
                            <a href="<?=URL_ROOT;?>hcx.php">
                                <img src="<?=ASSETS;?>custom/img/subsidiaries/hcx.png" class="rounded img-fluid" style="max-height: 100px">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">HCX</span>
                                </h5>
                            </a>                            
                        </div>
                        
                        

                    </div> 




                </div>

                <!-- <img src="<?=ASSETS;?>img/about/about_s4_lines.png" alt="" class="lines">
                <img src="<?=ASSETS;?>img/about/about_s4_bubble.png" alt="" class="bubble"> -->

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
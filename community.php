<?php
$pagetitle="Community";
$pageuserlevel=array("0");

// Temp
header('Location: error.php?code=401');
exit;

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

<body id="body-id">

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

        <header class="style-4">
            <div class="content">
                <div class="content frs-content" style="padding:0px">

                    <div class="container">
                        <div class="portfolio-page style-1">
                            <div class="portfolio-projects style-1">
                                <div class="container mb-10">
                                    <div class="portfolio style-1">
                                        <div class="content pb-0">
                                            <div class="row mb-150 justify-content-center">
                                                <div class="col-md-8">

                                                    <div class="row mb-50">
                                                        <div class="col-lg-12">
                                                            <div class="portfolio-card" class="p-1">

                                                                <h6 class="text-center mt-3 fw-bold">What's on your mind, <?php echo $_SESSION['google_first_name'];?>?</h6>
                                                                <div class="d-flex p-3" data-bs-toggle="modal" data-bs-target="#addcommunitypostmodal">
                                                                    <div class="l_side">
                                                                        <img class="icon-40 rounded-circle mg-woym" style="" src="<?php echo $_SESSION['google_image']; ?>">
                                                                    </div>
                                                                    <div class="r-side flex-fill">
                                                                        <span class="text-woym">Your message here...</span>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex p-3  border-top brd-gray border-1 attachphotobutton">
                                                                    <div class="text-center flex-fill">
                                                                        <span class="btn-woym fw-bold"><i class="bi bi-image  me-1"></i>Attach Photo</span>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="row community-div"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



    </main>
    <!-- ====== end content ====== -->

    <?php include "modal-community.php"; ?>

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
    <script src="<?=ASSETS;?>js/lib/scrollIt.min.js"></script>
    <script src="<?=ASSETS;?>js/main.js"></script>
    <script src="<?=ASSETS;?>vendor/sweetalert2/sweetalert2.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function(){
            fetchcommunitypost();
        });

        $('.attachphotobutton').click(function(){
            $("#communitypostattach").click();
            $('#addcommunitypostmodal').modal('show');
        })

    </script>

    <?php include "functions/searchscript.php"; ?>
    <?php include "functions/postscript.php"; ?>
    <?php include "functions/digiofficereminders.php"?>

</body>

</html>
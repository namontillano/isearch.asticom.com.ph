<?php
$pagetitle="Project Vega: Policies, Procedures and Guidelines";
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
                            <a href="<?=URL_ROOT;?>project-vega.php" class="color-000">
                                <?php echo $pagetitle; ?>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-50">
                            <img src="<?=ASSETS;?>custom/img/ISO3.png" class="rounded img-fluid">
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> Project Vega: <span> Policies, Procedures and Guidelines </span></h2>
                        <p>( For Internal Use Only )</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-10">
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=access-control-policy-and-guidelines">Access Control Policy and Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=byod-mobile-device-acceptable-use-policy">BYOD Mobile Device Acceptable Use Policy</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=change-management-procedure">Change Management Procedure</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=clear-desk-and-clear-screen-guidelines">Clear Desk and Clear Screen Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=code-of-discipline-guidelines">Code Of Discipline Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=compliance-with-legal-requirements-guidelines">Compliance With Legal Requirements Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=employee-off-boarding-procedure">Employee Off-Boarding Procedure</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=employee-on-boarding-and-movement-procedure">Employee On-Boarding and Movement Procedure</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=ims-acceptable-use-guidelines">IMS Acceptable Use Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=ims-control-of-documents-and-records">IMS Control Of Documents and Records</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-10">
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=ims-internal-and-external-communication">IMS Internal and External Communication</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=ims-internal-audit-management-review-and-nonconformity-corrective-action">IMS Internal Audit, Management Review and Nonconformity & Corrective Action Procedure</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=ims-training-and-awareness-guidelines">IMS Training and Awareness Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=incident-management-procedure">Incident Management Procedure</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=incident-management-procedure">Information Classification Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=integrated-management-system-manual">Integrated Management System Manual</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=integrated-management-system-policy">Integrated Management System Policy</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=physical-and-environmental-security-guidelines">Physical and Environmental Security Guidelines</a>
                                </li>
                                <li style="margin-left: 20pt;">
                                    <a href="<?=URL_ROOT;?>project-vega-details.php?view=ctg-service-catalogue">Service Catalogue</a>
                                </li>
                            </ul>
                        </div>
                    </div> 

                    <div class="section-head text-center style-4 mt-100 mb-20">
                        <h2 class="mb-10"> ISO <span> Acknowledgement Form </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-10">
                            <iframe sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads allow-modals" frameborder="0" aria-label="Google Forms, ISO Acknowledgement Form" src="https://docs.google.com/forms/d/e/1FAIpQLScNMyuuL9VMLMNIPXM6iUgx9lHN0bQhM8wGbmv5bwEIxA_zyg/viewform?embedded=true" height="880px" allowfullscreen="" width="100%"></iframe>
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
<?php
$pagetitle="Finance";
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
                            <a href="<?=URL_ROOT;?>finance.php" class="color-000">
                                <?php echo $pagetitle; ?>
                            </a>
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> What you need to  <span> know about Finance </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Policies and Procedures</span>
                            </h3>
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=employee-payables">Employee Payables</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=procure-to-pay">Procure to Pay</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=record-to-report">Record to Report</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=tax-to-file">Tax to File</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=treasury-services">Treasury Services</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=bill-to-collect">Bill to Collect</a>
                                </li>
                            </ul>

                        
                        </div>
                        
                        <div class="col-md-4 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Finance Downloadable Process Forms</span>
                            </h3>
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=asticom-reimbursement-form">Asticom Reimbursement Form</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>finance-details.php?view=rf-attestation-form">RF Attestation Form</a>
                                </li>
                            </ul>

                        
                        </div>

                        <div class="col-md-4 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Finance Services</span>
                            </h3>
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    Employee Reimbursement
                                </li>
                                <li style="margin-left: 15pt;">
                                    Cash Advance
                                </li>
                                 <li style="margin-left: 15pt;">
                                    CA Liquidation
                                </li>
                                 <li style="margin-left: 15pt;">
                                    Revolving Fund
                                </li>
                                 <li style="margin-left: 15pt;">
                                    RF Replenishment
                                </li>
                                 <li style="margin-left: 15pt;">
                                    Request for Payment
                                </li>
                            </ul>

                        
                        </div>

                    </div> 



                    <div class="row mb-20 mt-30">
                        <div class="col-md-6 mb-10">
                            <a href="<?=URL_ROOT;?>finance-details.php?view=finance-services">
                                <img src="<?=ASSETS;?>custom/img/finance-services.png" class="img-fluid rounded">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">FINANCE SERVICES</span>
                                </h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-10">
                            <a href="<?=URL_ROOT;?>finance-details.php?view=log-expense-report">
                                <img src="<?=ASSETS;?>custom/img/log-expense-report.png" class="img-fluid rounded">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">HOW TO LOG EXPENSE REPORT</span>
                                </h5>
                            </a>
                        </div>
                    </div>


                    <div class="section-head text-center style-4 mt-30 mb-20">
                        <h2 class="mb-10"> Expense <span> Reporting </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-10">
                            <a href="<?=ASSETS;?>custom/img/expense-reporting-1.png" class="culture-card d-block" data-fancybox="gallery">
                                <img src="<?=ASSETS;?>custom/img/expense-reporting-1.png" class="rounded img-fluid">
                            </a>
                        </div>
                        <div class="col-md-6 mb-10">
                            <a href="<?=ASSETS;?>custom/img/expense-reporting-2.png" class="culture-card d-block" data-fancybox="gallery">
                                <img src="<?=ASSETS;?>custom/img/expense-reporting-2.png" class="rounded img-fluid">
                            </a>
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
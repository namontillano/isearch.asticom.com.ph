<?php
$pagetitle="CyberTech";
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
    <title>i-Search | <?php echo $pagetitle; ?></title>

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
                            <a href="<?=URL_ROOT;?>cybertech.php" class="color-000">
                                <?php echo $pagetitle; ?>
                            </a>
                        </div>
                    </div>


                    <div class="culture style-5">

                        <div class="content pt-0">
                            <div class="culture-slider position-relative style-5">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a href="<?=ASSETS;?>custom/img/zoom.jpg" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/zoom.jpg" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <center><a href="<?=URL_ROOT;?>cybertech-details.php?view=zoom" class="btn rounded-pill bg-blue4 fw-bold mt-10 text-white"><small>Read More Details</small></a></center>
                                        </div>
                                        <div class="swiper-slide">
                                            <a href="<?=ASSETS;?>custom/img/no-downtime.png" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/no-downtime.png" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a href="<?=ASSETS;?>custom/img/daily-awareness.png" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/daily-awareness.png" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination mb-20" style="bottom:-50px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> What you need to  <span> know about CTG </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Policies and Procedures</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-change-request-management-policy">Change Request Management Policy</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-data-retention-standard">Data Retention Standard</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-data-privacy-policy">Data Privacy Policy</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-email-usage-policy">Email Usage Policy</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-exercise-your-data-privacy-rights-here">Exercise your Data Privacy Rights here!</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-information-classification-standard">Information Classification Standard</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-incident-management-policy">Incident Management Policy</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-it-asset-management">IT Asset Management</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-privacy-incident-and-data-breach-handling-guide">Privacy Incident and Data Breach Handling Guide</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-prohibited-it-practices-in-company-assets">Prohibited IT practices in Company Assets</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=policies-social-media-policy">Social Media Policy</a>
                                </li>
                            </ul>

                            <h3>
                                <span style="font-variant: normal;">IT Downloadable Process Forms</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-ati-data-sharing-agreement-template">ATI Data Sharing Agreement Template</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-absi-data-sharing-agreement-template">ABSI - Data Sharing Agreement Template</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-pii-consent-and-process-checklist">PII Consent and Process Checklist</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-non-compliance-form-and-nc-monitoring">Non Compliance Form and NC Monitoring</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-remote-access-user-agreement-">Remote Access User Agreement </a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-non-disclosure-agreement-ati-template">Non-Disclosure Agreement - ATI Template</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-non-disclosure-agreement-absi-template">Non-Disclosure Agreement - ABSI Template</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-business-requirement-form-template">Business Requirement Form Template</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=forms-data-processing-agreement-for-clients-controller-template">Data Processing Agreement For Clients-Controller Template</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Laptop and Desktop Issuance</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=issuance-how-to-request-for-software-installation-on-my-laptop">How to request for software installation on my laptop?</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=issuance-laptop-policies-and-procedures">Laptop Policies and Procedures</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=issuance-app-and-software-installation-policy-and-procedures">App & Software Installation Policy and Procedures</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=issuance-how-to-first-login-to-your-work-laptop">How to first login to your work laptop?</a>
                                </li>
                            </ul>

                            <h3>
                                <span style="font-variant: normal;">Troubleshooting</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=troubleshooting-google-2-step-verification">Google 2 Step-Verification</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=troubleshooting-how-to-access-email-to-your-phone">How to Access Email to your phone </a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=troubleshooting-how-to-sign-up-to-i-serve-ticketing-and-workflow-system">How to Sign up to i-Serve Ticketing and Workflow System</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=troubleshooting-how-to-turn-on-notification-in-google-currents">How to Turn on Notification in Google Currents</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=troubleshooting-how-to-upload-a-page-in-i-search">How to upload a page in i-Search</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="cybertech-support.php">Talk to a CTG Support</a>
                                </li>
                            </ul>

                            <h3>
                                <span style="font-variant: normal;">Training Learning Center</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="https://support.google.com/a/users#topic=11499463" target="_blank">Google Workspace Learning Center</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=training-how-to-access-email-to-your-phone">How to Access Email to your phone </a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=training-how-to-sign-up-to-i-serve-ticketing-and-workflow-system-">How to Sign up to i-Serve Ticketing and Workflow System</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=training-how-to-turn-on-notification-in-google-currents">How to Turn on Notification in Google Currents</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>cybertech-details.php?view=training-how-to-upload-a-page-in-i-search">How to upload a page in i-Search</a>
                                </li>
                            </ul>
                        </div>

                    </div> 


                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> Google  <span> Currents </span></h2>
                    </div>

                    <div class="row mb-20">
                        <div class="col-md-6 mb-10">

                            <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselHero" class="active" aria-current="true" data-bs-slide-to="0" aria-label="Slide 1" ></button>
                                    <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="1" aria-label="Slide 2" ></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?=ASSETS;?>custom/img/asti-way-of-life.png" class="img-fluid rounded">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?=ASSETS;?>custom/img/google-currents.png" class="img-fluid rounded">
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHero" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>

                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselHero" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">GOOGLE CURRENTS IS NOW THE PLACE TO BE!</span>
                            </h5>

                        </div>
                        <div class="col-md-6 mb-10">
                            <a href="<?=URL_ROOT;?>cybertech-details.php?view=google-currents-how-to-turn-on-notifications">
                                <img src="<?=ASSETS;?>custom/img/how-to-notif.png" class="img-fluid rounded">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">HOW TO TURN ON NOTIFICATION</span>
                                </h5>
                            </a>
                        </div>

                        <div class="col-md-12 mb-20 text-center">
                            <a href="https://currents.google.com/" class="btn rounded-pill bg-blue4 fw-bold text-white ">
                                <small> CHECK IT OUT! </small>
                            </a>
                        </div>

                        
                    </div>


                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> Training  <span> Program </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-10">
                            <a href="<?=URL_ROOT;?>cybertech-details.php?view=training-program-absi-ctg-neo-equip-session">
                                <img src="<?=ASSETS;?>custom/img/ABSI_Equip_Session.png" class="rounded img-fluid">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">ABSI CTG NEO - EQUIP SESSION</span>
                                </h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-10">
                            <a href="<?=URL_ROOT;?>cybertech-details.php?view=training-program-asticom-ctg-neo-equip-session">
                                <img src="<?=ASSETS;?>custom/img/ASTICOM_CTG_NEO.png" class="rounded img-fluid">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">ASTICOM CTG NEO - EQUIP SESSION</span>
                                </h5>
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
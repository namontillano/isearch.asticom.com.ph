<?php
$pagetitle="Recruitment";
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
            <div class="content frs-content pb-0">
                <div class="container">
                    <div class="section-head text-center mb-80 style-5">
                        <div class="page-links color-999">
                            <a href="<?=URL_ROOT;?>index.php" class="me-2">
                                Home
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>recruitment.php" class="color-000">
                                <?php echo $pagetitle; ?>
                            </a>
                        </div>
                    </div>
                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> Welcome to <span> Recruitment Operations </span></h2>
                        <p>Kindly scroll down at the bottom of the page for our current open positions and for our Career Section.<br>Feel free to share the link and details with your friends! <br>Thank You!</p>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-10 text-center">
                            <h3>
                                <span style="font-variant: normal;">Quick Links</span>
                            </h3>
                        </div>
                        <div class="col-md-3 mb-10">
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="https://asticom.atlassian.net/servicedesk/customer/portal/12/user/login?destination=portal%2F12" target="_blank">Inquire</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 mb-10">
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="https://asticom.atlassian.net/servicedesk/customer/portal/12/user/login?destination=portal%2F12%2Fgroup%2F38%2Fcreate%2F113" target="_blank">Personnel Requisition Form</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 mb-10">
                            <ul style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="https://asticom.atlassian.net/servicedesk/customer/portal/12/user/login?destination=portal%2F12%2Fgroup%2F38%2Fcreate%2F333" target="_blank">Manpower Request Form</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-30">
                        <div class="col-md-12 mb-10 text-center">
                            <h3>
                                <span style="font-variant: normal;">Career Opportunities</span>
                            </h3>
                        </div>
                        <div class="col-md-12 mb-10">
                            <center>
                             <a href="https://asticom.com.ph/careers-and-culture/" class="btn rounded-pill bg-blue4 fw-bold text-white mt-10 mb-50" target="_blank">
                                <small> WE ARE HIRING!</small>
                            </a>
                            </center>
                        </div>
                    </div>

                </div>

                <img src="<?=ASSETS;?>img/about/about_s4_lines.png" alt="" class="lines">
                <img src="<?=ASSETS;?>img/about/about_s4_bubble.png" alt="" class="bubble">

            </div>

            <div class="content trd-content">
                <div class="container">
                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"> What you need to know about <span> Recruitment </span></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-10">
                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Internal Hiring</button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse rounded-0" aria-labelledby="heading1" >
                                    <div class="accordion-body">
                                        <a href="<?=URL_ROOT;?>recruitment-details.php?view=internal-recruitment">
                                            <img src="<?=ASSETS;?>custom/img/internal-recruitment.jpg" class="img-fluid rounded">
                                            <h5 class="text-center mt-3">
                                                <span style="font-variant: normal;">Internal Hiring</span>
                                            </h5>
                                        </a>
                                        <center>
                                            <a href="<?=URL_ROOT;?>recruitment-details.php?view=internal-application-checklist" class="btn rounded-pill bg-blue4 fw-bold text-white mt-10 mb-50">
                                                <small> Click here for the Internal Application Checklist! </small>
                                            </a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Employee Referrals</button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse rounded-0" aria-labelledby="heading2" >
                                    <div class="accordion-body">
                                        <p>
                                            <b>Employee Referral Program Policy</b>
                                            <br> 
                                            Only active none-core Asticom employees are eligible to participate with the exception of immediate supervisors that refer for a position for which they are directly or indirectly responsible.
                                            <br><br> 
                                            To qualify as a valid referral, candidates must be endorsed via the designated channel and be a part of the cascaded list of roles
                                            <br><br> 
                                            Candidates that are already a part of the current talent database, rehires, previous candidates, and candidates in the Asticom sourcing channels do not qualify as valid referral 
                                            <br><br> 
                                            A referral shall remain valid for the duration of one year after which it shall be considered as a part of the Asticom talent bank
                                            <br><br> 
                                            The referral fee shall be paid after only after the hired candidate reaches a tenure of 1 month with the company
                                            <br><br> 
                                            For candidates that are endorsed by multiple employees, the merit shall go the employee that referred first.
                                            <br><br> 

                                            <b>Line Referrals and Transitioned Employees:</b>
                                            <br>
                                            Line Referrals must undergo the standard screening process and must be processed 24 hours upon receipt of the endorsement
                                            <br><br> 
                                            Transitioned employees must undergo the standard screening process and should comply with the standard pre-employment requirements prior to onboarding. Should the employee require more time to complete the requirements, an independent contractor agreement may be issued for a maximum of 1 month.
                                            <br><br> 

                                            <b>Rehires Policy:</b>
                                            <br>
                                            Asticom will only consider former employees for rehire opportunities under the guidelines and conditions outlined in this policy.
                                            <br><br> 
                                            Persons separated from Asticom under the conditions described in the Table of Eligibility for Rehire shall not be qualified for rehire unless an exception (based on all of the facts and circumstances associated with the termination) is made by President/ CEO or his/her designated representative.
                                            <br><br> 
                                            Persons separated from Asticom may be considered for rehire if separation from prior employment was voluntary, due to retirement, or assignment/ project has ended and the employee left in good standing as described in the Table for Eligibility for Rehire.
                                            <br><br> 
                                            It is the responsibility of the employing department to work with Human Resource Division to properly document any separation for cause, gross misconduct, and/or resignation instead of dismissal (this includes all employment types, e.g., Permanent, Adjunct, Student, and/or Temporary)
                                            <br><br> 
                                            Due to potential conflicts of interest and confidentiality concerns, information gathered in the course of determining eligibility for re-hire will not be disclosed to search committees or employees assigned to the department, college or unit conducting the search. Human Resource Services will only inform hiring managers whether, based on the results of the re-hire eligibility review, an offer of employment may be extended.
                                            <br><br> 
                                            Acceptable Term for Rehire: 6 months
                                        </p>
                                        <iframe src="https://drive.google.com/file/u/0/d/1wWJwIDdY2Yn20f5yTH5S-yJuUtDMtrlF/preview" width="100%" height="480" allow="autoplay" class="mt-20"></iframe>


                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" onClick="document.location.href='<?=URL_ROOT;?>recruitment-details.php?view=employee-referrals-line-referrals-transitioned-employees-rehires'" >Employee Referrals, Line Referrals, Transitioned Employees, Rehires</button>
                                </h2>
                            </div>
                            <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">Pre-Employment Requirements for New Hires</button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse rounded-0" aria-labelledby="heading4" >
                                    <div class="accordion-body">
                                        <p>
                                            <b>Here are the list of the Pre-employment requirements required for new hires:</b>
                                            <br>
                                            <ul style="list-style-type: square; ">
                                                <li style="margin-left: 15pt;">
                                                    Signed data Privacy Form
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    Medical Exam results certifying you are fit to work
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    Birth certificate
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    Marriage Certificate (If married)
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    TOR/Diploma (all applicants must be 4 yr course/bachelor’s degree graduates)
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    NBI clearance (Receipt will suffice as long as it includes the date of release)
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    Residence Sketch (Google Maps screenshot is acceptable)
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    A valid Gov’t ID
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    SSS ID/ E1 form/ Online SSS verification (Please note that we do not accept the UMID)
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    PAGIBIG ID or HMDF Online registration form
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    PHILHEALTH ID or MEMBER DATA RECORD
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    TIN ID/ TIN Verification/ Form 2316 (From your previous employer)
                                                </li>
                                                <li style="margin-left: 30pt;">
                                                    For those with no TIN, download and fill out a 1902 form from the BIR website
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    BPI Account (Open an account at the BPI Globe Telecom Plaza branch)
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    GCash Account (Provided during the first few weeks of onboarding)
                                                </li>
                                                <li style="margin-left: 15pt;">
                                                    Certificate of clearance (can follow after orientation)
                                                </li>                               
                                            </ul>

                                            <iframe src="https://drive.google.com/file/d/1MxMSPne2er2qJMLGOQX0-or4_VYOHMHH/preview" width="100%" height="480" allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-bottom rounded-0">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed rounded-0 py-4" type="button" onClick="document.location.href='<?=URL_ROOT;?>recruitment-details.php?view=data-policy-form'" >Data Policy Form</button>
                                </h2>
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
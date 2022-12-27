<?php
$pagetitle="HR Offboarding";
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
                            <a href="<?=URL_ROOT;?>hr.php" class="color-000">
                                HR
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>hr-offboarding.php" class="color-000">
                                HR Offboarding
                            </a>
                        </div>
                    </div>


                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"><span>Offboarding Services</span></h2>
                    </div>


                    <div class="row mb-100">
                        <div class="col-md-12">

                            <div class="row nav justify-content-center" id="nav-tab" role="tablist">

                                <img src="<?=ASSETS;?>custom/img/offboard-asticom.png" style="max-height: 150px;" class="nav-link col-md-3 rounded img-fluid" id="nav-asticom-tab" data-bs-toggle="tab" data-bs-target="#nav-asticom" type="button" role="tab" aria-controls="nav-asticom" aria-selected="true">
                                <img src="<?=ASSETS;?>custom/img/offboard-absi.png" style="max-height: 150px;" class="nav-link col-md-3 rounded img-fluid" id="nav-absi-tab" data-bs-toggle="tab" data-bs-target="#nav-absi" type="button" role="tab" aria-controls="nav-absi" aria-selected="false">
                                <img src="<?=ASSETS;?>custom/img/offboard-finsi.png" style="max-height: 150px;" class="nav-link col-md-3 rounded img-fluid" id="nav-finsi-tab" data-bs-toggle="tab" data-bs-target="#nav-finsi" type="button" role="tab" aria-controls="nav-finsi" aria-selected="false">

                            </div>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-asticom" role="tabpanel" aria-labelledby="nav-asticom-tab">
                                    <div class="row justify-content-center mt-20">
                                        <div class="col-lg-3">
                                            <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=asti-manual-dtr" class="features-card mb-30 style-5">
                                                <center>
                                                    <img src="<?=ASSETS;?>custom/img/asti-manual-dtr.jpg"class="mb-20" style="min-width:200px">
                                                </center>
                                                <div class="info">
                                                    <h5 class="card-title">
                                                        Manual DTR
                                                    </h5>
                                                    <p class="text">
                                                        Attendance filing for Final Pay inclusion.
                                                    </p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=asti-2316" class="features-card mb-30 style-5">
                                                <center>
                                                    <img src="<?=ASSETS;?>custom/img/asti-2316.jpg" class="mb-20" style="min-width:200px">
                                                </center>
                                                <div class="info">
                                                    <h5 class="card-title">
                                                        2316
                                                    </h5>
                                                    <p class="text">
                                                        BIR 2316 request for separated employees.
                                                    </p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=asti-coe" class="features-card mb-30 style-5">
                                                <center>
                                                    <img src="<?=ASSETS;?>custom/img/asti-coe.jpg" class="mb-20" style="min-width:200px">
                                                </center>
                                                <div class="info">
                                                    <h5 class="card-title">
                                                        COE
                                                    </h5>
                                                    <p class="text">
                                                        COE request for separated employees.
                                                    </p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=asti-quitclaim" class="features-card mb-30 style-5">
                                                <center>
                                                    <img src="<?=ASSETS;?>custom/img/asti-quitclaim.jpg" class="mb-20" style="min-width:200px">
                                                </center>
                                                <div class="info">
                                                    <h5 class="card-title">
                                                        Quitclaim
                                                    </h5>
                                                    <p class="text">
                                                        Submit Quitclaim for Final Pay releasing. 

                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="text-center"><b>Reminder:</b> Quitclaim is being accomplished once Final Pay is already available.</p>

                                </div>
                                <div class="tab-pane fade" id="nav-absi" role="tabpanel" aria-labelledby="nav-absi-tab">
                                 <div class="row justify-content-center mt-20">
                                    <div class="col-lg-3">
                                        <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=absi-manual-dtr" class="features-card mb-30 style-5">
                                            <center>
                                                <img src="<?=ASSETS;?>custom/img/absi-manual-dtr.jpg"class="mb-20" style="min-width:200px">
                                            </center>
                                            <div class="info">
                                                <h5 class="card-title">
                                                    Manual DTR
                                                </h5>
                                                <p class="text">
                                                    Attendance filing for Final Pay inclusion.
                                                </p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3">
                                        <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=absi-2316" class="features-card mb-30 style-5">
                                            <center>
                                                <img src="<?=ASSETS;?>custom/img/absi-2316.jpg" class="mb-20" style="min-width:200px">
                                            </center>
                                            <div class="info">
                                                <h5 class="card-title">
                                                    2316
                                                </h5>
                                                <p class="text">
                                                    BIR 2316 request for separated employees.
                                                </p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3">
                                        <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=absi-coe" class="features-card mb-30 style-5">
                                            <center>
                                                <img src="<?=ASSETS;?>custom/img/absi-coe.jpg" class="mb-20" style="min-width:200px">
                                            </center>
                                            <div class="info">
                                                <h5 class="card-title">
                                                    COE
                                                </h5>
                                                <p class="text">
                                                    COE request for separated employees.
                                                </p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3">
                                        <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=absi-quitclaim" class="features-card mb-30 style-5">
                                            <center>
                                                <img src="<?=ASSETS;?>custom/img/absi-quitclaim.jpg" class="mb-20" style="min-width:200px">
                                            </center>
                                            <div class="info">
                                                <h5 class="card-title">
                                                    Quitclaim
                                                </h5>
                                                <p class="text">
                                                    Submit Quitclaim for Final Pay releasing. 

                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <p class="text-center"><b>Reminder:</b> Quitclaim is being accomplished once Final Pay is already available.</p>

                            </div>
                            <div class="tab-pane fade" id="nav-finsi" role="tabpanel" aria-labelledby="nav-finsi-tab">
                              <div class="row justify-content-center mt-20">
                                <div class="col-lg-3">
                                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=finsi-manual-dtr" class="features-card mb-30 style-5">
                                        <center>
                                            <img src="<?=ASSETS;?>custom/img/finsi-manual-dtr.jpg" class="mb-20" style="min-width:200px">
                                        </center>
                                        <div class="info">
                                            <h5 class="card-title">
                                                Manual DTR
                                            </h5>
                                            <p class="text">
                                                Attendance filing for Final Pay inclusion.
                                            </p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-3">
                                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=finsi-2316" class="features-card mb-30 style-5">
                                        <center>
                                            <img src="<?=ASSETS;?>custom/img/finsi-2316.jpg" class="mb-20" style="min-width:200px">
                                        </center>
                                        <div class="info">
                                            <h5 class="card-title">
                                                2316
                                            </h5>
                                            <p class="text">
                                                BIR 2316 request for separated employees.
                                            </p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-3">
                                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=finsi-coe" class="features-card mb-30 style-5">
                                        <center>
                                            <img src="<?=ASSETS;?>custom/img/finsi-coe.jpg" class="mb-20" style="min-width:200px">
                                        </center>
                                        <div class="info">
                                            <h5 class="card-title">
                                                COE
                                            </h5>
                                            <p class="text">
                                                COE request for separated employees.
                                            </p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-3">
                                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=finsi-quitclaim" class="features-card mb-30 style-5">
                                        <center>
                                            <img src="<?=ASSETS;?>custom/img/finsi-quitclaim.jpg" class="mb-20" style="min-width:200px">
                                        </center>
                                        <div class="info">
                                            <h5 class="card-title">
                                                Quitclaim
                                            </h5>
                                            <p class="text">
                                                Submit Quitclaim for Final Pay releasing. 

                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <p class="text-center"><b>Reminder:</b> Quitclaim is being accomplished once Final Pay is already available.</p>

                        </div>

                    </div>

                </div>
            </div>






            <div class="section-head text-center style-4 mb-20 mt-20">
                <h2 class="mb-10"><span>Exit Guide and Reminders</span></h2>
            </div>



            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=exit-reminders" class="features-card mb-30 style-5">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/exit-reminders.png" alt="">
                        </div>
                        <div class="info">
                            <h5 class="card-title">
                                Exit<br>Reminders
                            </h5>
                            <p class="text">
                                Items need to be submitted and accomplished.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=resignation-submission" class="features-card mb-30 style-5">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/resignation-reminders.png" alt="">
                        </div>
                        <div class="info">
                            <h5 class="card-title">
                                Resignation<br>Submission
                            </h5>
                            <p class="text">
                                Process of<br>RL submission.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=clearance-submission" class="features-card mb-30 style-5">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/clearance-submission.png" alt="">
                        </div>
                        <div class="info">
                            <h5 class="card-title">
                                Clearance<br>Submission
                            </h5>
                            <p class="text">
                                Guide for accomplishing the clearance form.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=manual-dtr-guide" class="features-card mb-30 style-5">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/manual-dtr.png" alt="">
                        </div>
                        <div class="info">
                            <h5 class="card-title">
                                Manual DTR<br>Guide
                            </h5>
                            <p class="text">
                                Manual filing once Sunfish is deactivated.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=quitclaim-and-final-pay-guide" class="features-card mb-30 mb-lg-0 style-5">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/quit-claim.png" alt="">
                        </div>
                        <div class="info">
                            <h5 class="card-title">
                                Quitclaim and<br>Final Pay Guide
                            </h5>
                            <p class="text">
                                Final pay components and claiming of amount.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=coe-and-2316-request" class="features-card mb-30 mb-lg-0 style-5">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/coe-request.png" alt="">
                        </div>
                        <div class="info">
                            <h5 class="card-title">
                                COE & 2316<br>Request
                            </h5>
                            <p class="text">
                                Request for inactive/separated employees.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?=URL_ROOT;?>hr-offboarding-details.php?view=exit-approval" class="features-card mb-30 mb-lg-0 style-5">
                        <div class="icon">
                            <img src="<?=ASSETS;?>custom/img/exit-approval.png" alt="">
                        </div>
                        <div class="info">
                            <h5 class="card-title">
                                Exit<br>Approval
                            </h5>
                            <p class="text">
                                Approval process<br>of clearance.
                            </p>
                        </div>
                    </a>
                </div>

            </div>







        </div>



    </div>

    <div class="content trd-content">
        <div class="container">
            <div class="section-head text-center style-4 mb-20">
                <h2 class="mb-10"><span>Frequently Asked Questions (FAQ)</span></h2>
            </div>
            <div class="row">
                <div class="col-md-6 mb-10">


                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading1">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">1. What is the maximum days of processing exit and final pay?</button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse rounded-0" aria-labelledby="heading1" >
                            <div class="accordion-body">
                                30 days from the submission of clearance.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading2">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">2. How to file attendance due to access is deactivated already?</button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse rounded-0" aria-labelledby="heading2" >
                            <div class="accordion-body">
                                You may use manual DTR and should be approved by your immediate superior.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading3">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">3. Where can I request COE and 2316?</button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse rounded-0" aria-labelledby="heading3" >
                            <div class="accordion-body">
                                Simply send an email to employeecare@asticom.com.ph or directly to Offboarding Team. You may also send a request by going to Employee Request&gt; Click Request for COE or 2316.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading4">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">4. How do I know if I am already cleared?</button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse rounded-0" aria-labelledby="heading4" >
                            <div class="accordion-body">
                                Offboarding PoC will be sending a notification once exit is complete and final pay is already available. That means you are already cleared to all proper validators.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading5">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">5. When should I send my Exit Documents?</button>
                        </h2>
                        <div id="collapse5" class="accordion-collapse collapse rounded-0" aria-labelledby="heading5" >
                            <div class="accordion-body">
                                Advisable to send it on your last day of work.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading6">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">6. What does it mean by overpayment?</button>
                        </h2>
                        <div id="collapse6" class="accordion-collapse collapse rounded-0" aria-labelledby="heading6" >
                            <div class="accordion-body">
                                <p>Overpayment incurred due to the following reasons;<br><br>
                                    1. Salary was not put on hold because of late endorsement of inactivity and tagging,<br><br>
                                    2. Earnings did not suffice the deductions reflected,<br><br>
                                    3. Tax Payable is higher than earnings and/or <br><br>
                                4. Open CA and RF is higher than earnings.&lt;</p>
                            </div>
                        </div>
                    </div>



                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading7">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">7. Do I have to settle the overpayment first in order to be cleared?</button>
                        </h2>
                        <div id="collapse7" class="accordion-collapse collapse rounded-0" aria-labelledby="heading7" >
                            <div class="accordion-body">
                                Yes. Amount of overpayment should be settled first in order to be cleared, this also determines rehire eligibility.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading8">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="true" aria-controls="collapse8">8. How to compute pro rated 13th Month Pay?</button>
                        </h2>
                        <div id="collapse8" class="accordion-collapse collapse rounded-0" aria-labelledby="heading8" >
                            <div class="accordion-body">
                                <p>13th month is computed as follow;<br><br>
                                Total Monthly Basic less Total LWOP/12</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 mb-10">

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading9">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="true" aria-controls="collapse9">9. Will my Service Incentive Leave be included in Final Pay?</button>
                        </h2>
                        <div id="collapse9" class="accordion-collapse collapse rounded-0" aria-labelledby="heading9" >
                            <div class="accordion-body">
                                Yes, SIL is being included in Final Pay computation. However, if end date is mid-year, SIL will be computed as prorated.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading10">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">10. Will I receive tax refund on final pay?</button>
                        </h2>
                        <div id="collapse10" class="accordion-collapse collapse rounded-0" aria-labelledby="heading10" >
                            <div class="accordion-body">
                                Tax Refund or Payable will depend on annualization. If the Tax Due is higher than the Tax Withheld, tax will be payable else it will be a refund.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading11">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="true" aria-controls="collapse11">11. What to do with my Open Cash Advance and Revolving Fund?</button>
                        </h2>
                        <div id="collapse11" class="accordion-collapse collapse rounded-0" aria-labelledby="heading11" >
                            <div class="accordion-body">
                                Open CA and RF shall be cleared first with Finance Team before they clear. You may always send an email to Employee Payable Team to close.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading12">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="true" aria-controls="collapse12">12. Will the Final Pay amount be given in a check?</button>
                        </h2>
                        <div id="collapse12" class="accordion-collapse collapse rounded-0" aria-labelledby="heading12" >
                            <div class="accordion-body">
                                No. Final Pay is being seeded via Asticom issued GCASH.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading13">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="true" aria-controls="collapse13">13. What if my Asticom issued GCASH was lost can I use my personal GCASH?</button>
                        </h2>
                        <div id="collapse13" class="accordion-collapse collapse rounded-0" aria-labelledby="heading13" >
                            <div class="accordion-body">
                                Yes, however, preferable to use is the Asticom issued as it is the one that is enrolled in our GCASH portal.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading14">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="true" aria-controls="collapse14">14. What time is the seeding of the amount?</button>
                        </h2>
                        <div id="collapse14" class="accordion-collapse collapse rounded-0" aria-labelledby="heading14" >
                            <div class="accordion-body">
                                There is no definite time for the seeding as it will depend on our approver's time of approval on the portal.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom rounded-0">
                        <h2 class="accordion-header" id="heading15">
                            <button class="accordion-button collapsed rounded-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="true" aria-controls="collapse15">15. How to turn over tools of work (Laptop, ID & HMO card)?</button>
                        </h2>
                        <div id="collapse15" class="accordion-collapse collapse rounded-0" aria-labelledby="heading15" >
                            <div class="accordion-body">
                                <p>This will be the temporary process during this pandemic to set the proper turn over of the laptop for those resigned employees within Metro Manila and Provincial. <br><br>
                                    For employees who will need to return the <b>laptop, ID and HMO,</b> you can deliver the laptop via LBC or other courier since we are in a new normal setup. <br><br>
                                    Before sending your Tools of Work, make sure that you sent an email to notify us together with the following items: <br><br>
                                    Take a video of the laptop that will see if this is functioning properly. <br><br>
                                    Capture an image of the laptop and its accessories to make sure that it is complete and no damage. <br><br>
                                    Capture an image of Employee ID and HMO ( Cocolife Card)  <br><br>
                                    <br><br>
                                    Our vendor support will be the one who receives and checks the unit if its functioning properly and to confirm the condition of the laptop. <br><br>
                                    The delivery address will be at 234 Roosevelt Bayantel HUB Quezon City and the contact person will be Tessa Mae Sumande. <br><br>
                                    The cost for the laptop delivery will be shouldered by the employee.  <br><br>
                                    You will be accountable for the laptop that you will send it via LBC. <br><br>
                                Surrender the tools of work for the  proper condition and documentation. </p>
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
<?php
$pagetitle="HR";
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
                                <?php echo $pagetitle; ?>
                            </a>
                        </div>
                    </div>


                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"><span>Timekeeping</span></h2>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-10">
                            <iframe src="https://drive.google.com/file/d/1pbmsJMh9q7q435of53Awd8HjEjJA0zTI/preview" height="300" class="w-100" allow="autoplay"></iframe>
                        </div>
                    </div>


                    <div class="section-head text-center style-4 mt-30 mb-20">
                        <h2 class="mb-10"> HR <span>Downloadable Forms </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Ayala Coop</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=membership-form">Membership Form</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=ayala-coop-loan">Ayala Coop Loan</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=ayala-coop-salary-atd">Ayala Coop Salary - ATD</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=ayala-coop-termination-form">Ayala Coop Termination Form</a>
                                </li>

                            </ul>

                            <h3>
                                <span style="font-variant: normal;">ETIQA</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=hospitalization-claim-form">Hospitalization Claim Form</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=out-patient-claim-form">Out-Patient Claim Form</a>
                                </li>

                            </ul>

                            <h3>
                                <span style="font-variant: normal;">Pag-Ibig</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=consolidation-form">Consolidation Form</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=pagibig-provident-claim">Pagibig Provident Claim</a>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-4 mb-10">
                            <h3>
                                <span style="font-variant: normal;">SSS</span>
                            </h3>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=maternity-notification-mat-1">Maternity Notification (MAT 1)</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=maternity-reimbursement-mat-2">Maternity Reimbursement (MAT 2)</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=allocation-of-maternity-leave-credits">Allocation of Maternity Leave Credits</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=ob-history-form">OB History Form</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=sss-maternity-guidelines-faqs">SSS Maternity Guidelines FAQs</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=sickness-notification">Sickness Notification</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=sickness-reimbursement">Sickness Reimbursement</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=sss-sickness-guidelines-faqs">SSS Sickness Guidelines FAQs</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=sss-e4">SSS E4</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=sss-death-claim">SSS Death Claim</a>
                                </li>


                            </ul>
                        </div>
                        <div class="col-md-4 mb-10">
                            <h3>
                                <span style="font-variant: normal;">Philhealth</span>
                            </h3>
                            <ul class="mb-15" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=philhealth-member-registration-form">Philhealth Member Registration Form</a>
                                </li>
                            </ul>

                            <h5>
                                <span style="font-variant: normal;">Asticom</span>
                            </h5>
                            <ul class="mb-15" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=asticom-cf1">CF1</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=asticom-csf">CSF</a>
                                </li>
                            </ul>

                            <h5>
                                <span style="font-variant: normal;">ABSI</span>
                            </h5>
                            <ul class="mb-15" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=absi-cf1">CF1</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=absi-csf">CSF</a>
                                </li>
                            </ul>

                            <h5>
                                <span style="font-variant: normal;">FINSI</span>
                            </h5>
                            <ul class="mb-30" style="list-style-type: square; ">
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=finsi-cf1">CF1</a>
                                </li>
                                <li style="margin-left: 15pt;">
                                    <a href="<?=URL_ROOT;?>hr-details.php?view=finsi-csf">CSF</a>
                                </li>
                            </ul>

                        </div>



                    </div> 

                    <div class="section-head text-center style-4 mb-20">
                        <h2 class="mb-10"><span> Payroll </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-10">
                            <a href="<?=URL_ROOT;?>hr-details.php?view=payroll-101">
                                <img src="<?=ASSETS;?>custom/img/payroll-101.png" class="rounded img-fluid">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">Payroll 101</span>
                                </h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-10">
                            <a href="<?=URL_ROOT;?>hr-details.php?view=2022-payroll-calendar">
                                <img src="<?=ASSETS;?>custom/img/2022-payroll-calendar.png" class="rounded img-fluid">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">2022 Payroll Calendar</span>
                                </h5>
                            </a>
                        </div>
                    </div>









                    <div class="section-head text-center style-4 mt-30  mb-20">
                        <h2 class="mb-10"><span> Benefits </span></h2>
                    </div>
                    <div class="culture style-5">
                        <h3 class="text-center mb-10">
                            <span style="font-variant: normal;">Benefits offered by SSS</span>
                        </h3>
                        <div class="content pt-0">
                            <div class="culture-slider position-relative style-5">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide text-center">
                                            <a href="<?=ASSETS;?>custom/img/sss-benefits.jpg" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/sss-benefits.jpg" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <h5 class="text-center mt-3">
                                                <strong style="font-variant: normal;">SSS BENEFITS</strong>
                                            </h5>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="<?=ASSETS;?>custom/img/update-personal-information-with-sss.jpg" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/update-personal-information-with-sss.jpg" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <h5 class="text-center mt-3">
                                                <strong style="font-variant: normal;">Update personal information with SSS</strong>
                                            </h5>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="<?=ASSETS;?>custom/img/sss-salary-loan.jpg" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/sss-salary-loan.jpg" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <h5 class="text-center mt-3">
                                                <strong style="font-variant: normal;">SSS Salary Loan</strong>
                                            </h5>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="<?=ASSETS;?>custom/img/sss-sickness-benefits.jpg" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/sss-sickness-benefits.jpg" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <h5 class="text-center mt-3">
                                                <strong style="font-variant: normal;">SSS Sickness Benefits</strong>
                                            </h5>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="<?=ASSETS;?>custom/img/maternity-leave-process-and-benefits.jpg" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/maternity-leave-process-and-benefits.jpg" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <h5 class="text-center mt-3">
                                                <strong style="font-variant: normal;">Maternity Leave Process and Benefits</strong>
                                            </h5>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="<?=ASSETS;?>custom/img/expanded-maternity-leave.jpg" class="culture-card d-block" data-fancybox="gallery">
                                                <img src="<?=ASSETS;?>custom/img/expanded-maternity-leave.jpg" alt="">
                                                <span class="overlay"></span>
                                            </a>
                                            <h5 class="text-center mt-3">
                                                <strong style="font-variant: normal;">Expanded Maternity Leave</strong>
                                            </h5>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="swiper-pagination mb-20" style="bottom:-50px;"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-30 mb-30">
                        <h3 class="text-center mb-20">
                            <span style="font-variant: normal;">Total Employee Reward</span>
                        </h3>

                        <div class="col-md-4 mb-10 text-center ">
                            <iframe src="https://drive.google.com/file/d/1oOX4-8BkjispQfrURpITviR666PpmeBl/preview" height="380" allow="autoplay"></iframe>
                            <a href="<?=URL_ROOT;?>hr-details.php?view=benefits-digest">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">Benefits Digest</span>
                                </h5>
                            </a>
                        </div>

                        <div class="col-md-4 mb-10 text-center ">
                            <iframe src="https://drive.google.com/file/d/1JUhy6fP7Aw0YpVF_39BATmBwmGHVp6aJ/preview" height="380" allow="autoplay"></iframe>
                            <a href="<?=URL_ROOT;?>hr-details.php?view=benefits-101">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">Benefits 101</span>
                                </h5>
                            </a>
                        </div>

                        <div class="col-md-4 mb-10 text-center ">
                            <iframe src="https://drive.google.com/file/d/1rFVIxH7o1y-vdIvH27KbwmTfuPkbSsxg/preview" height="380" allow="autoplay"></iframe>
                            <a href="<?=URL_ROOT;?>hr-details.php?view=ayala-coop">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">Ayala Coop</span>
                                </h5>
                            </a>
                        </div>

                    </div>
                    <div class="row mt-30 mb-30">

                        <div class="col-md-4 mb-10 text-center ">
                            <iframe src="https://drive.google.com/file/d/1Ecr83Ylnc042GwWfXluaFLNoRqlx86NW/preview" height="380" allow="autoplay"></iframe>
                            <a href="<?=URL_ROOT;?>hr-details.php?view=philhealth-benefits">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">Philhealth Benefits</span>
                                </h5>
                            </a>
                        </div>

                        <div class="col-md-4 mb-10 text-center ">
                            <iframe src="https://drive.google.com/file/d/1ktlOAl2tZ-_2IwixaP_QIen9MPKWKHjv/preview" height="380" allow="autoplay"></iframe>
                            <a href="<?=URL_ROOT;?>hr-details.php?view=pagibig-virtual">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">PAGIBIG Virtual</span>
                                </h5>
                            </a>
                        </div>

                        <div class="col-md-4 mb-10 text-center ">
                            <iframe src="https://drive.google.com/file/d/1GSuwnzvYK68ufGS_DunNyfMtbOvOMePN/preview" height="380" allow="autoplay"></iframe>
                            <a href="<?=URL_ROOT;?>hr-details.php?view=process-pagibig-loan">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">Process PAGIBIG Loan</span>
                                </h5>
                            </a>
                        </div>

                    </div> 



                    <div class="row mt-30 mb-30 justify-content-center">

                        <div class="col-md-4 mb-10 text-center">
                            <a href="<?=URL_ROOT;?>hr-details.php?view=etiqa-hmo-id-number">
                                <img src="<?=ASSETS;?>custom/img/etiqa.jpg" class="rounded img-fluid">
                                <h5 class="text-center mt-3">
                                    <span style="font-variant: normal;">ETIQA HMO ID Number</span>
                                </h5>
                            </a>
                        </div>

                        <div class="col-md-4 mb-10">
                           <ul class="mb-30 mt-20" style="list-style-type: square; ">
                            <li style="margin-left: 15pt;">
                                <a href="https://www.etiqa.com.ph/partners.aspx" target="_blank">Etiqa Accredited Hospital/Clinic</a>
                            </li>
                            <li style="margin-left: 15pt;">
                                <a href="https://www.healthpartnersdental.com/" target="_blank">Etiqa Dental Health Partners</a>
                            </li>
                            <li style="margin-left: 15pt;">
                                <a href="<?=URL_ROOT;?>hr-details.php?view=etiqa-requirements">Etiqa Requirements</a>
                            </li>
                            <li style="margin-left: 15pt;">
                                <a href="<?=URL_ROOT;?>hr-details.php?view=etiqa-brochure">Etiqa Brochure</a>
                            </li>
                            <li style="margin-left: 15pt;">
                                <a href="<?=URL_ROOT;?>hr-details.php?view=etiqa-x-covid-19-faqs">Etiqa X Covid 19 FAQs</a>
                            </li>
                        </ul>
                    </div>



                </div> 


                <div class="section-head text-center style-4 mt-30  mb-20">
                    <h2 class="mb-10"> Employee <span> Exit Management </span></h2>
                </div>

                <div class="row">
                    <div class="col-md-7 mb-10">
                        <a href="<?=URL_ROOT;?>hr-details.php?view=online-resignation">
                            <img src="<?=ASSETS;?>custom/img/online-resignation.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Online Resignation</span>
                            </h5>
                        </a>
                    </div>
                    <div class="col-md-5 mb-10">
                        <a href="hr-offboarding.php">
                            <img src="<?=ASSETS;?>custom/img/offboarding-online.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Offboarding Guide &amp; Policy</span>
                            </h5>
                        </a>
                    </div>
                </div>


                <div class="row mt-30">
                    <div class="col-md-6 mb-10">
                        <div class="section-head text-center style-4 mt-30  mb-20">
                            <h2 class="mb-10"> Case <span> Management </span></h2>
                        </div>

                        <a href="<?=URL_ROOT;?>hr-details.php?view=case-management">
                            <img src="<?=ASSETS;?>custom/img/case-management.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Case Management</span>
                            </h5>
                        </a>
                    </div>
                    <div class="col-md-6 mb-10">
                        <div class="section-head text-center style-4 mt-30  mb-20">
                            <h2 class="mb-10"> Whistle <span> Blower </span></h2>
                        </div>
                        <a href="<?=URL_ROOT;?>hr-details.php?view=whistleblower">
                            <img src="<?=ASSETS;?>custom/img/whistle-blower.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Whistleblower Policy</span>
                            </h5>
                        </a>
                    </div>
                </div>

                <div class="row mt-30">
                    <div class="col-md-6 mb-10">
                        <a href="<?=URL_ROOT;?>hr-details.php?view=code-of-discipline">
                            <img src="<?=ASSETS;?>custom/img/code-of-discipline.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Code of Discipline</span>
                            </h5>
                        </a>
                    </div>
                    <div class="col-md-6 mb-10">
                        <a href="<?=URL_ROOT;?>hr-details.php?view=operations-code">
                            <img src="<?=ASSETS;?>custom/img/operations-code.png" class="rounded img-fluid">
                            <h5 class="text-center mt-3">
                                <span style="font-variant: normal;">Operations Code</span>
                            </h5>
                        </a>
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
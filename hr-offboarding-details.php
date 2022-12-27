<?php
$pagetitle="HR Offboarding";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
require "functions/userlevel.php";
?>
<?php
if (empty($_GET['view'])) {
    header("Location: hr-offboarding.php"); 
    die("Redirecting to: hr-offboarding.php");
} else {
    switch ($_GET['view']) {
        case "exit-reminders":
        $viewpagetitle = "Exit Reminders";
        $viewpagetitleurl = "https://drive.google.com/file/d/1X2632a545d8cFRi720H4ZOVS15Ru3hf4/preview?authuser=0";
        $viewpagetitlecat = "Exit Guide and Reminders";
        break;
        case "resignation-submission":
        $viewpagetitle = "Resignation Submission";
        $viewpagetitleurl = "https://drive.google.com/file/d/14EMEG18SUOigQ_4aj2Dya00ymumvycjq/preview?authuser=0";
        $viewpagetitlecat = "Exit Guide and Reminders";
        break;
        case "clearance-submission":
        $viewpagetitle = "Clearance Submission";
        $viewpagetitleurl = "https://drive.google.com/file/d/1Ut221NmENlc2KwY4x7ZxJZ1LMxC_jd-2/preview?authuser=0";
        $viewpagetitlecat = "Exit Guide and Reminders";
        break;
        case "manual-dtr-guide":
        $viewpagetitle = "Manual DTR Guide";
        $viewpagetitleurl = "https://drive.google.com/file/d/13dsnvgznQ_qVB9rTTa8Dx4B83pPa2BYX/preview?authuser=0";
        $viewpagetitlecat = "Exit Guide and Reminders";
        break;
        case "quitclaim-and-final-pay-guide":
        $viewpagetitle = "Quitclaim and Final Pay Guide";
        $viewpagetitleurl = "https://drive.google.com/file/d/1J0M5Oc0tTr00YDHrScGZx9bhnl5Zk2R_/preview?authuser=0";
        $viewpagetitlecat = "Exit Guide and Reminders";
        break;
        case "coe-and-2316-request":
        $viewpagetitle = "COE and 2316 Request";
        $viewpagetitleurl = "https://drive.google.com/file/d/1sfkNfIVjIFJLi0V4ALVQm_6jBqgLY7u9/preview?authuser=0";
        $viewpagetitlecat = "Exit Guide and Reminders";
        break;
        case "exit-approval":
        $viewpagetitle = "Exit Approval";
        $viewpagetitleurl = "https://drive.google.com/file/d/1dToGEv9BBoZViYGBBrp5WZtqCyo-4OQf/preview?authuser=0";
        $viewpagetitlecat = "Exit Guide and Reminders";
        break;
        case "asti-manual-dtr":
        $viewpagetitle = "Asticom - Manual DTR";
        $viewdesccomp = "ASTICOM";
        $viewpagetitleurl = "https://drive.google.com/file/d/1qh2LNEJipYAUg843LTogROOE-0hWv6HG/preview?authuser=0";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "asti-2316":
        $viewpagetitle = "Asticom - 2316";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSdpWOrb7lJtDckhq8mp7Fm9GQlAsDyjof4NVDxW7wzNx1B7iQ/viewform";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "asti-coe":
        $viewpagetitle = "Asticom - COE";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSf0A8a03cu4XF-g2OJkQBXW3kneS99mF4z6pL9Tbhl0gvfAgA/viewform";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "asti-quitclaim":
        $viewpagetitle = "Asticom - Quitclaim";
        $downloadquitclaimform = "https://drive.google.com/file/d/1f8svhDpxEsUtCV-0iPIG_v8C658hr9FO/view?usp=sharing";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSd7-q9dXvnK-zy0_dYkXpXAHNKPcdNr9D-0JTTZ2tHhoSHUcA/viewform?embedded=true";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "absi-manual-dtr":
        $viewpagetitle = "ABSI - Manual DTR";
        $viewdesccomp = "ABSI";
        $viewpagetitleurl = "https://drive.google.com/file/d/1RXJvexJEsylw-H5kt_yyFbxcbP41x9eU/preview?authuser=0";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "absi-2316":
        $viewpagetitle = "ABSI - 2316";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSdpWOrb7lJtDckhq8mp7Fm9GQlAsDyjof4NVDxW7wzNx1B7iQ/viewform";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "absi-coe":
        $viewpagetitle = "ABSI - COE";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSf0A8a03cu4XF-g2OJkQBXW3kneS99mF4z6pL9Tbhl0gvfAgA/viewform";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "absi-quitclaim":
        $viewpagetitle = "ABSI - Quitclaim";
        $downloadquitclaimform = "https://drive.google.com/file/d/16YGatQsoLDPjQIfGpfRqcR0B0zyMuh8D/view?usp=sharing";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSeuuOM1xSF53Pvm08Pqr8Gl5XGEqZKeonZCGbwcBeBBCXWB7g/viewform?embedded=true";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "finsi-manual-dtr":
        $viewpagetitle = "FINSI - Manual DTR";
        $viewdesccomp = "FINSI";
        $viewpagetitleurl = "https://drive.google.com/file/d/1sSyCIkgTYsHcQlMYNzSMMCyo65MsIu4X/preview?authuser=0";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "finsi-2316":
        $viewpagetitle = "FINSI - 2316";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSdpWOrb7lJtDckhq8mp7Fm9GQlAsDyjof4NVDxW7wzNx1B7iQ/viewform";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "finsi-coe":
        $viewpagetitle = "FINSI - COE";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSf0A8a03cu4XF-g2OJkQBXW3kneS99mF4z6pL9Tbhl0gvfAgA/viewform";
        $viewpagetitlecat = "Offboarding Services";
        break;
        case "finsi-quitclaim":
        $viewpagetitle = "FINSI - Quitclaim";
        $downloadquitclaimform = "https://drive.google.com/file/d/1tcHluCClcFSgJWPDUTcDTXecoZxjss8F/view?usp=sharing";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSeUHE2iY_OM-r1s3dHD0s20mDB2pAm11BIdUqXD1_teXQudpw/viewform?embedded=true";
        $viewpagetitlecat = "Offboarding Services";
        break;
        default: header("Location: hr-offboarding.php"); die("Redirecting to: hr-offboarding.php");;
    }

}

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
                            <a href="<?=URL_ROOT;?>hr.php" class="me-2">
                                HR
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>hr-offboarding.php" class="me-2">
                                <?php echo $pagetitle; ?>
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>hr-details.php?view=<?php echo $_GET['view']?>" class="color-000">
                                <?php echo $viewpagetitlecat." - ".$viewpagetitle; ?>
                            </a>
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mt-20 mb-20">
                        <h2 class="mb-10"><span> <?php echo $viewpagetitle; ?> </span></h2>
                    </div>



                    <?php if ($_GET['view'] == 'asti-manual-dtr' || $_GET['view'] == 'absi-manual-dtr' || $_GET['view'] == 'finsi-manual-dtr') { ?>
                        <div class="row">
                            <div class="col-md-12 mb-30 text-center">
                                <p>
                                    <b>Guide:</b><br>
                                    1.  Download the manual DTR template.<br>
                                    2.  Accomplish the form, indicate your <b>attendance logs/overtime/leaves</b>.<br>
                                    3.  Seek approval from your <b><?php echo $viewdesccomp ?> Approver</b>.<br>
                                    4.  Send to <b><a href='mailto:offboarding@asticom.com.ph' target='_blank'>offboarding@asticom.com.ph</a></b>.
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    

                    <?php if ($_GET['view'] == 'asti-quitclaim' || $_GET['view'] == 'absi-quitclaim' || $_GET['view'] == 'finsi-quitclaim') { ?>
                        <div class="row">
                            <div class="col-md-12 mb-30 text-center">
                                <p>
                                    Quitclaim form will be shared by the Offboarding Team together with the Final Pay notification process.
                                </p>
                                <p class="mt-30">
                                    <a href="<?php echo $downloadquitclaimform ?>" target="_blank" class="btn rounded-pill bg-blue4 fw-bold text-white ">
                                        <small> Download Quitclaim Form </small>
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php } ?>



                    <div class="row">
                        <div class="col-md-12 mb-10">
                            <iframe sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads allow-modals" frameborder="0" aria-label="" allowfullscreen="" src="<?php echo $viewpagetitleurl;?>" width="100%" height="1000px"></iframe>
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
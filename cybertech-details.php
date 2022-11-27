<?php
$pagetitle="CyberTech";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
require ("functions/userlevel.php");
?>
<?php
if (empty($_GET['view'])) {
    header("Location: cybertech.php"); 
    die("Redirecting to: cybertech.php");
} else {
    switch ($_GET['view']) {
        case "policies-change-request-management-policy":
        $viewpagetitle = "Change Request Management Policy";
        $viewpagetitleurl = "https://drive.google.com/file/d/15CXWwWBuopIVTExHDhRTo_v1CuqRP-R0/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-data-retention-standard":
        $viewpagetitle = "Data Retention Standard";
        $viewpagetitleurl = "https://drive.google.com/file/d/1SyRFJOk0e1bwAYRCP5HaKpVreZakXLno/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-data-privacy-policy":
        $viewpagetitle = "Data Privacy Policy";
        $viewpagetitleurl = "https://drive.google.com/file/d/1EnZVy_jpgi0_u53awF_FoQb9KutQpBTx/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-email-usage-policy":
        $viewpagetitle = "Email Usage Policy";
        $viewpagetitleurl = "https://drive.google.com/file/d/18oaF-kegtVUPQR-S1GIFbcZaZ5eaC1j3/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-exercise-your-data-privacy-rights-here":
        $viewpagetitle = "Exercise your Data Privacy Rights here";
        $viewpagetitleurl = "https://docs.google.com/document/d/e/2PACX-1vSuG6l9D4_3pL9p3KlDs7mRZKtpaeM81kDSJxXU1g6PbjDZXfBcRV68pcLkOK7M2rb6JXdC0AKtMB34/pub?embedded=true";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-information-classification-standard":
        $viewpagetitle = "Information Classification Standard";
        $viewpagetitleurl = "https://drive.google.com/file/d/1tM6M3nHUGW2bzLflzWPS7RpBBjVezRO2/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-incident-management-policy":
        $viewpagetitle = "Incident Management Policy";
        $viewpagetitleurl = "https://drive.google.com/file/d/11sK8nn5sQylfPDFGcrwnfhYMScQvbhB6/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-it-asset-management":
        $viewpagetitle = "IT Asset Management";
        $viewpagetitleurl = "https://drive.google.com/file/d/1HKTFTO0MIJZ2bibtCsJcOmJPi8o7lkt9/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-privacy-incident-and-data-breach-handling-guide":
        $viewpagetitle = "Privacy Incident and Data Breach Handling Guide";
        $viewpagetitleurl = "https://drive.google.com/file/d/1c6Qx9DsXHVsZ5jgoCTe7_T5vRxNOIwGD/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-prohibited-it-practices-in-company-assets":
        $viewpagetitle = "Prohibited IT practices in Company Assets";
        $viewpagetitleurl = "https://drive.google.com/file/d/10qJJxBLGKikZmWUdZpyYUkwDsEiXUx6s/preview?authuser=0";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "policies-social-media-policy":
        $viewpagetitle = "Social Media Policy";
        $viewpagetitleurl = "https://docs.google.com/forms/d/e/1FAIpQLSdfsOS5HlddzFOKTeBDAUX3b7rXXSZrK_0zsCzs1Ikg6Gxu_A/viewform";
        $viewpagetitlecat = "Policies and Procedures";
        break;
        case "forms-ati-data-sharing-agreement-template":
        $viewpagetitle = "ATI Data Sharing Agreement Template";
        $viewpagetitleurl = "https://drive.google.com/file/d/1gNCwXWjZ0hr5fWyDKLyVWxnz0B6AJgzv/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-absi-data-sharing-agreement-template":
        $viewpagetitle = "ABSI - Data Sharing Agreement Template";
        $viewpagetitleurl = "https://drive.google.com/file/d/1a7Ea-3Jl0PHsR9gEu2oLaoewBVeSof94/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-pii-consent-and-process-checklist":
        $viewpagetitle = "PII Consent and Process Checklist";
        $viewpagetitleurl = "https://drive.google.com/file/d/13nks-i9eOD3JHPAAYLIkg1v8V01mvnMP/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-non-compliance-form-and-nc-monitoring":
        $viewpagetitle = "Non Compliance Form and NC Monitoring";
        $viewpagetitleurl = "https://drive.google.com/file/d/1M2e8YI_fXoyk4B-rLIcwy-kuWnYBWjQj/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-remote-access-user-agreement-":
        $viewpagetitle = "Remote Access User Agreement";
        $viewpagetitleurl = "https://drive.google.com/file/d/1LDfZAasxHPQCJkZseqfstWUxBt9TxMFz/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-non-disclosure-agreement-ati-template":
        $viewpagetitle = "Non-Disclosure Agreement - ATI Template";
        $viewpagetitleurl = "https://drive.google.com/file/d/1R2LpHiWEXfsZBcgVXOCRcsWEzCLIOafp/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-non-disclosure-agreement-absi-template":
        $viewpagetitle = "Non-Disclosure Agreement - ABSI Template";
        $viewpagetitleurl = "https://drive.google.com/file/d/1res95JmyJq0FEdmAnIrsOcaWwNletWz9/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-business-requirement-form-template":
        $viewpagetitle = "Business Requirement Form Template";
        $viewpagetitleurl = "https://drive.google.com/file/d/1vGOmcItsOvh73_MwY0-iMVqOZ9Talqbw/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "forms-data-processing-agreement-for-clients-controller-template":
        $viewpagetitle = "Data Processing Agreement For Clients-Controller Template";
        $viewpagetitleurl = "https://drive.google.com/file/d/1xEQVFmdYA2Op3l1gacieyKO2q0IMoVVU/preview?authuser=0";
        $viewpagetitlecat = "IT Downloadable Process Forms";
        break;
        case "issuance-how-to-request-for-software-installation-on-my-laptop":
        $viewpagetitle = "How to request for software installation on my laptop?";
        $viewpagetitleurl = "https://drive.google.com/file/d/1b3c6glxf_3nwk16REc9OY0LbHXSP2FBf/preview?authuser=0";
        $viewpagetitlecat = "Laptop and Desktop Issuance";
        break;
        case "issuance-laptop-policies-and-procedures":
        $viewpagetitle = "Laptop Policies and Procedures";
        $viewpagetitleurl = "https://drive.google.com/file/d/1TMlLz5YsRUGJzpPR6kc_D25OLC4Co99L/preview?authuser=0";
        $viewpagetitlecat = "Laptop and Desktop Issuance";
        break;
        case "issuance-app-and-software-installation-policy-and-procedures":
        $viewpagetitle = "App & Software Installation Policy and Procedures";
        $viewpagetitleurl = "https://drive.google.com/file/d/15byWAMjtw7SLvFqbSQ5-9C6jJ837-HAX/preview?authuser=0";
        $viewpagetitlecat = "Laptop and Desktop Issuance";
        break;
        case "issuance-how-to-first-login-to-your-work-laptop":
        $viewpagetitle = "How to first login to your work laptop?";
        $viewpagetitleurl = "https://drive.google.com/file/d/1FnT2PU0zDzaD_MnkGC5_Vuh-QLljHjEw/preview?authuser=0";
        $viewpagetitlecat = "Laptop and Desktop Issuance";
        break;
        case "troubleshooting-google-2-step-verification":
        $viewpagetitle = "Google 2 Step-Verification";
        $viewpagetitleurl = "https://drive.google.com/file/d/1OteO85E8V0DFjyxdw7AjKAwrIMNZsv6i/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "troubleshooting-how-to-access-email-to-your-phone":
        $viewpagetitle = "How to Access Email to your phone";
        $viewpagetitleurl = "https://drive.google.com/file/d/1oiaXF_Z-ZuYkCDEoidhewmgcJMHAe5cy/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "troubleshooting-how-to-sign-up-to-i-serve-ticketing-and-workflow-system":
        $viewpagetitle = "How to Sign up to i-Serve Ticketing and Workflow System";
        $viewpagetitleurl = "https://drive.google.com/file/d/1lk5poDCtOmRv9ulWr-T3ETglspfgU_Si/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "troubleshooting-how-to-turn-on-notification-in-google-currents":
        $viewpagetitle = "How to Turn on Notification in Google Currents";
        $viewpagetitleurl = "https://drive.google.com/file/d/1nQj7eU8my_o2G1cXulYzzLCnO_I5OoP6/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "troubleshooting-how-to-upload-a-page-in-i-search":
        $viewpagetitle = "How to upload a page in i-Search";
        $viewpagetitleurl = "https://drive.google.com/file/d/16L9b4Q6meexE7NeYbN2JM3_VzcCaYO-E/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "training-how-to-access-email-to-your-phone":
        $viewpagetitle = "How to Access Email to your phone";
        $viewpagetitleurl = "https://drive.google.com/file/d/1oiaXF_Z-ZuYkCDEoidhewmgcJMHAe5cy/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "training-how-to-sign-up-to-i-serve-ticketing-and-workflow-system-":
        $viewpagetitle = "How to Sign up to i-Serve Ticketing and Workflow System";
        $viewpagetitleurl = "https://drive.google.com/file/d/1lk5poDCtOmRv9ulWr-T3ETglspfgU_Si/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "training-how-to-turn-on-notification-in-google-currents":
        $viewpagetitle = "How to Turn on Notification in Google Currents";
        $viewpagetitleurl = "https://drive.google.com/file/d/1nQj7eU8my_o2G1cXulYzzLCnO_I5OoP6/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "training-how-to-upload-a-page-in-i-search":
        $viewpagetitle = "How to upload a page in i-Search";
        $viewpagetitleurl = "https://drive.google.com/file/d/16L9b4Q6meexE7NeYbN2JM3_VzcCaYO-E/preview?authuser=0";
        $viewpagetitlecat = "Troubleshooting";
        break;
        case "training-program-absi-ctg-neo-equip-session":
        $viewpagetitle = "CTG ABSI NEO EQUIP SESSION FOR ABSI NEW EMPLOYEES";
        $viewpagetitleurl = "https://docs.google.com/presentation/d/1MFl99zMKJpThmgb4ZrjE1ZEoJj0mqfZWZSv05iWbCnE/embed?authuser=0";
        $viewpagetitlecat = "Training Program";
        break;
        case "training-program-asticom-ctg-neo-equip-session":
        $viewpagetitle = "CTG NEO EQUIP TOOLS FOR ASTICOM NEW HIRES";
        $viewpagetitleurl = "https://docs.google.com/presentation/d/1dvksw3WuvUFqI8KEVfNYiCrKWs04Kg8uOU28V0zmcqY/embed?slide=id.p";
        $viewpagetitlecat = "Training Program";
        break;
        case "google-currents-how-to-turn-on-notifications":
        $viewpagetitle = "How to Turn On Notifications for Google Currents";
        $viewpagetitleurl = "https://drive.google.com/file/d/1nQj7eU8my_o2G1cXulYzzLCnO_I5OoP6/preview?authuser=0";
        $viewpagetitlecat = "Google Currents";
        break;
        case "zoom":
        $viewpagetitle = "Zoom Audio Updates";
        $viewpagetitleurl = "https://docs.google.com/document/d/1udgDwNIwT9-jgrP2RmMH2oR0VgbgLgVq8iOc7j_PXKU/edit?usp=sharing";
        $viewpagetitlecat = "Zoom";
        break;
        default: header("Location: cybertech.php"); die("Redirecting to: cybertech.php");;
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
                            <a href="<?=URL_ROOT;?>cybertech.php" class="me-2">
                                <?php echo $pagetitle; ?>
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>cybertech-details.php?view=<?php echo $_GET['view']?>" class="color-000">
                                <?php echo $viewpagetitlecat." - ".$viewpagetitle; ?>
                            </a>
                        </div>
                    </div>

                    <div class="section-head text-center style-4 mt-20 mb-20">
                        <h2 class="mb-10"><span> <?php echo $viewpagetitle; ?> </span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-10">
                            <iframe sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads allow-modals" frameborder="0" aria-label="" allowfullscreen="" src="<?php echo $viewpagetitleurl;?>" width="100%" height="1000px"></iframe>
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
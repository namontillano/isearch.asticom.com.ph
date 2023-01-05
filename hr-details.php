<?php
$pagetitle="HR";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
require "functions/userlevel.php";
?>
<?php
if (empty($_GET['view'])) {
    header("Location: hr.php"); 
    die("Redirecting to: hr.php");
} else {
    switch ($_GET['view']) {

        case "membership-form":
        $viewpagetitle = "Membership Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1MPxi_u8Rx7bHWZSXF-nI4MMZgsWTSXyk/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "ayala-coop-loan":
        $viewpagetitle = "Ayala Coop Loan";
        $viewpagetitleurl = "https://drive.google.com/file/d/1dtY9itAZjNGCytKNJ1MbiIsuJUYXbP7x/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "ayala-coop-salary-atd":
        $viewpagetitle = "Ayala Coop Salary - ATD";
        $viewpagetitleurl = "https://drive.google.com/file/d/1Grm-4W96KHCkpYfeziUq1uBjkh_AFzj2/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "ayala-coop-termination-form":
        $viewpagetitle = "Ayala Coop Termination Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1ej3Jucv4XgVDKPuuXyCVrjgpd5B3FRM2/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "hospitalization-claim-form":
        $viewpagetitle = "Hospitalization Claim Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1yt4fKeNbXVATnxDr_PfMyZybVhZoM5qg/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "out-patient-claim-form":
        $viewpagetitle = "Out-Patient Claim Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1bGO2AF_BW9-zWn6Os7nnLnatQhtjkWBs/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "consolidation-form":
        $viewpagetitle = "Consolidation Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1_s4DheFEwAdd5dENO-7obx9GXO0zN-6N/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "pagibig-provident-claim":
        $viewpagetitle = "Pagibig Provident Claim";
        $viewpagetitleurl = "https://drive.google.com/file/d/1uheStoFXhBF708fUpPzqMLebAxXamtOP/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "maternity-notification-mat-1":
        $viewpagetitle = "Maternity Notification (MAT 1)";
        $viewpagetitleurl = "https://drive.google.com/file/d/1WLYsSBKRdkdvSgXHt546OiKS3BKXDIE0/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "maternity-reimbursement-mat-2":
        $viewpagetitle = "Maternity Reimbursement (MAT 2)";
        $viewpagetitleurl = "https://drive.google.com/file/d/1TSXqEZBcwseG5hiKUmjeDKYXwoFehHiN/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "allocation-of-maternity-leave-credits":
        $viewpagetitle = "Allocation of Maternity Leave Credits";
        $viewpagetitleurl = "https://drive.google.com/file/d/1QE-vFpHgkMKq0QzxUxMdbYGNM-PtxgJb/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "ob-history-form":
        $viewpagetitle = "OB History Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1AeLJV7nu_bhuStBBsQ9M39epI85PP6dN/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "sss-maternity-guidelines-faqs":
        $viewpagetitle = "SSS Maternity Guidelines FAQs";
        $viewpagetitleurl = "https://drive.google.com/file/d/1BHYwVUnsaLtqVHI5wR_ZtsVIzagiMwkf/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "sickness-notification":
        $viewpagetitle = "Sickness Notification";
        $viewpagetitleurl = "https://drive.google.com/file/d/1JafEmPV1I3XPVUGUjemeMzO0-v1Jycaq/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "sickness-reimbursement":
        $viewpagetitle = "Sickness Reimbursement";
        $viewpagetitleurl = "https://drive.google.com/file/d/1S9FbcaF7CLa-MRk0W2KTQFHPINOx5P2P/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "sss-sickness-guidelines-faqs":
        $viewpagetitle = "SSS Sickness Guidelines FAQs";
        $viewpagetitleurl = "https://drive.google.com/file/d/1X168uAZ0_i3BlNctbPam56Pdid1V3PiV/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "sss-e4":
        $viewpagetitle = "SSS E4";
        $viewpagetitleurl = "https://drive.google.com/file/d/1b48Uz8GVbZ_NRrCpQyqpLMDMX3AgnFtw/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "sss-death-claim":
        $viewpagetitle = "SSS Death Claim";
        $viewpagetitleurl = "https://drive.google.com/file/d/1Vfn-HgkIRUYqUPIOT3gEoqaQSnAFAtt5/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "philhealth-member-registration-form":
        $viewpagetitle = "Philhealth Member Registration Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1PFTHTQORukTU2PYPDV1LoJCVvjE08ydg/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "asticom-cf1":
        $viewpagetitle = "Asticom-CF1";
        $viewpagetitleurl = "https://drive.google.com/file/d/1ZTP05ZV63yag5SvCuF0qv1FXfJ0QETDv/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "asticom-csf":
        $viewpagetitle = "Asticom-CSF";
        $viewpagetitleurl = "https://drive.google.com/file/d/1B38mfvrE7YTOSi2tgVjnlOf4GWgcYaNL/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "absi-cf1":
        $viewpagetitle = "Absi - CF1";
        $viewpagetitleurl = "https://drive.google.com/file/d/18D8YYhOANwkk2D1yVJvtaFyLKGdomz4J/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "absi-csf":
        $viewpagetitle = "Absi - CSF";
        $viewpagetitleurl = "https://drive.google.com/file/d/1yIGYwTrmdNyojei4fSrj0Ux4aQEKE89u/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "finsi-cf1":
        $viewpagetitle = "Finsi - CF1";
        $viewpagetitleurl = "https://drive.google.com/file/d/1yIGYwTrmdNyojei4fSrj0Ux4aQEKE89u/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "finsi-csf":
        $viewpagetitle = "Finsi - CSF";
        $viewpagetitleurl = "https://drive.google.com/file/d/1A9NHHWj8D_bh_k3QZcx7VMwT6WOGeLOQ/preview?authuser=0";
        $viewpagetitlecat = "HR Downloadable Forms";
        break;

        case "online-resignation":
        $viewpagetitle = "Online Resignation";
        $viewpagetitleurl = "https://drive.google.com/file/d/1UmX03dRrCM3W3obw10b1Kaev33LqjMSg/preview?authuser=0";
        $viewpagetitlecat = "Employee Exit Management";
        break;

        case "payroll-101":
        $viewpagetitle = "Payroll 101";
        $viewpagetitleurl = "https://drive.google.com/file/d/1l7SXUcdHXj_P5jJefbTwnpPFuZhmdqfd/preview?authuser=0";
        $viewpagetitlecat = "Payroll";
        break;

        case "2022-payroll-calendar":
        $viewpagetitle = "2022 Payroll Calendar";
        $viewpagetitleurl = "https://drive.google.com/file/d/122ULuW3iQAPPlzUqxycKgP2H1yb8M7Ce/preview?authuser=0";
        $viewpagetitlecat = "Payroll";
        break;

        case "case-management":
        $viewpagetitle = "Disciplinary Procedure for Minor Offenses";
        $viewpagetitleurl = "https://drive.google.com/file/d/1UD5QSGV88-MWH8dtEmu5jsptqIhhphwt/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "whistleblower":
        $viewpagetitle = "Whistleblower Policy";
        $viewpagetitleurl = "https://drive.google.com/file/d/1JdEczmsv8DVMV4Oaanm4No_67Ai54vyM/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "code-of-discipline":
        $viewpagetitle = "Code of Discipline";
        $viewpagetitleurl = "https://drive.google.com/file/d/1T5ylybXV4W0q1uHVWrM--yuwCrhImIRo/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "operations-code":
        $viewpagetitle = "Operations Code";
        $viewpagetitleurl = "https://drive.google.com/file/d/1FRDv1shrgGYew8I0P03QMellOt06We2x/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "benefits-digest":
        $viewpagetitle = "Benefits Digest";
        $viewpagetitleurl = "https://drive.google.com/file/d/1oOX4-8BkjispQfrURpITviR666PpmeBl/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "benefits-101":
        $viewpagetitle = "Benefits 101";
        $viewpagetitleurl = "https://drive.google.com/file/d/1JUhy6fP7Aw0YpVF_39BATmBwmGHVp6aJ/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "ayala-coop":
        $viewpagetitle = "Ayala Coop";
        $viewpagetitleurl = "https://drive.google.com/file/d/1rFVIxH7o1y-vdIvH27KbwmTfuPkbSsxg/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "philhealth-benefits":
        $viewpagetitle = "Philhealth Benefits";
        $viewpagetitleurl = "https://drive.google.com/file/d/1Ecr83Ylnc042GwWfXluaFLNoRqlx86NW/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "pagibig-virtual":
        $viewpagetitle = "PAGIBIG Virtual";
        $viewpagetitleurl = "https://drive.google.com/file/d/1ktlOAl2tZ-_2IwixaP_QIen9MPKWKHjv/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "process-pagibig-loan":
        $viewpagetitle = "Process PAGIBIG Loan";
        $viewpagetitleurl = "https://drive.google.com/file/d/1GSuwnzvYK68ufGS_DunNyfMtbOvOMePN/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "etiqa-hmo-id-number":
        $viewpagetitle = "HMO ID Number Portal";
        $viewpagetitleurl = "https://script.google.com/a/macros/asticom.com.ph/s/AKfycby-QLuBzGpc_1JPAaTB6olCX9UtqytPuVQfgYuSawqx_S0OoHAD_4vQWI_Rd4g1gGj5Ew/exec";
        $viewpagetitlecat = "HR";
        break;

        case "etiqa-requirement":
        $viewpagetitle = "Etiqa Requirements";
        $viewpagetitleurl = "https://drive.google.com/file/d/16cDdvqOIoXgR4lJKoDSXYXObCWqLvSfd/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "etiqa-brochure":
        $viewpagetitle = "Etiqa Brochure";
        $viewpagetitleurl = "https://drive.google.com/file/d/1hexb9-4xZZ4-dgrnf8FvLHpvmCCW4Vqb/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;

        case "etiqa-x-covid-19-faqs":
        $viewpagetitle = "Etiqa X Covid 19 FAQs";
        $viewpagetitleurl = "https://drive.google.com/file/d/12w8eL2Eom8czSGn8C_jFUJFVSCYGavsx/preview?authuser=0";
        $viewpagetitlecat = "HR";
        break;


        case "employee-user":
        $viewpagetitle = "Employee User";
        $viewpagetitleurl = "https://drive.google.com/file/d/1oRNFxOKiCJc5zD7REF37uA2iGcg0nLuQ/preview";
        $viewpagetitlecat = "HR";
        break;

        case "manager-user":
        $viewpagetitle = "Manager User";
        $viewpagetitleurl = "https://drive.google.com/file/d/15o4FZY7Z-_fjt3g4GOMttwH-bXWdhUg-/preview";
        $viewpagetitlecat = "HR";
        break;


        case "how-to-use-konsulta-md":
        $viewpagetitle = "How to use Konsulta MD?";
        $viewpagetitleurl = "https://drive.google.com/file/d/1WLDYp5BZIWj013j4s2QdcMmpyMwE3JtM/preview";
        $viewpagetitlecat = "HR";
        break;



        case "service-level-agreement":
        $viewpagetitle = "Service Level Agreement";
        $viewpagetitleurl = "https://drive.google.com/file/d/1_YBM9ysxDDXmvEVjyp4Jbsm5s9rLdxAN/preview";
        $viewpagetitlecat = "HR";
        break;


        case "bir-1902-guidelines":
        $viewpagetitle = "BIR 1902 Guidelines";
        $viewpagetitleurl = "https://drive.google.com/file/d/1dOm56ZDE37iSssnCTRck2STtPgq1ErKE/preview";
        $viewpagetitlecat = "HR";
        break;

        case "bir-1902-form":
        $viewpagetitle = "BIR 1902 Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/15P6PvqgJADaKp2LlAb43hhI9Jpo90B51/preview";
        $viewpagetitlecat = "HR";
        break;


        case "authorization-letter-template":
        $viewpagetitle = "Authorization Letter Template";
        $viewpagetitleurl = "https://drive.google.com/file/d/1ePksn9I_DZwgpOLLmCcRH-f42G6Il5RD/preview";
        $viewpagetitlecat = "HR";
        break;

        


        default: header("Location: hr.php"); die("Redirecting to: hr.php");;
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
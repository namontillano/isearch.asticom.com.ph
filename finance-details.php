<?php
$pagetitle="Finance";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
require ("functions/userlevel.php");
?>

<?php
if (empty($_GET['view'])) {
    header("Location: finance.php"); 
    die("Redirecting to: finance.php");
} else {
    switch ($_GET['view']) {
        case "employee-payables":
        $viewpagetitle = "Employee Payables";
        $viewpagetitleurl = "https://drive.google.com/file/d/1VwuGXpk7CKvJYchA4Pn5Mat6StQEp5bM/preview?authuser=0";
        $viewpagetitlecat = "Finance Policies and Procedures";
        break;
        case "procure-to-pay":
        $viewpagetitle = "Procure to Pay";
        $viewpagetitleurl = "https://drive.google.com/file/d/15EZv1iS72tI5m49NOSH0EYU2qGLS68KS/preview?authuser=0";
        $viewpagetitlecat = "Finance Policies and Procedures";
        break;
        case "record-to-report":
        $viewpagetitle = "Record to Report";
        $viewpagetitleurl = "https://drive.google.com/file/d/1GMWpd6onWvuV6R4JEzwgBT4n7v1Ac3i1/preview?authuser=0";
        $viewpagetitlecat = "Finance Policies and Procedures";
        break;
        case "tax-to-file":
        $viewpagetitle = "Tax to File";
        $viewpagetitleurl = "https://drive.google.com/file/d/1tRtXwhT3Vhgxk3jUSE8k0gfluAws5fgU/preview?authuser=0";
        $viewpagetitlecat = "Finance Policies and Procedures";
        break;
        case "treasury-services":
        $viewpagetitle = "Treasury Services";
        $viewpagetitleurl = "https://drive.google.com/file/d/1dLgOVtYkQ6bVHSmpLQB_85b1TnvOtPpV/preview?authuser=0";
        $viewpagetitlecat = "Finance Policies and Procedures";
        break;
        case "bill-to-collect":
        $viewpagetitle = "Bill to Collect";
        $viewpagetitleurl = "https://drive.google.com/file/d/1UCkzdA5hz9YZSUz09kONvYP3JzJPQAfv/preview?authuser=0";
        $viewpagetitlecat = "Finance Policies and Procedures";
        break;
        case "asticom-reimbursement-form":
        $viewpagetitle = "Asticom Reimbursement Form";
        $viewpagetitleurl = "https://drive.google.com/file/d/1PfmVGYaLNK1ZMvpIYYF_pGXt-X9okLr0/preview?authuser=0";
        $viewpagetitlecat = "Finance Downloadable Process Forms";
        break;
        case "rf-attestation-form":
        $viewpagetitle = "RF Attestation Form";
        $viewpagetitleurl = "404.php";
        $viewpagetitlecat = "Finance Downloadable Process Forms";
        break;
        case "finance-services":
        $viewpagetitle = "FINANCE SERVICES";
        $viewpagetitleurl = "https://drive.google.com/file/d/13YoF1sOAsVZLcEg0Nm2TlgxjIfuZsrIb/preview?authuser=0";
        $viewpagetitlecat = "How To";
        break;
        case "log-expense-report":
        $viewpagetitle = "HOW TO LOG EXPENSE REPORT";
        $viewpagetitleurl = "https://drive.google.com/file/d/13XABdL3Zy5OIJm7nx7pKG4qIepp1K9a_/preview?authuser=0";
        $viewpagetitlecat = "How To";
        break;
        default: header("Location: finance.php"); die("Redirecting to: finance.php");;
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
                            <a href="<?=URL_ROOT;?>finance.php" class="me-2">
                                <?php echo $pagetitle; ?>
                            </a>
                            <span class="me-2">/</span>
                            <a href="<?=URL_ROOT;?>finance-details.php?view=<?php echo $_GET['view']?>" class="color-000">
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
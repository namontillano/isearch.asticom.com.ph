<?php
$pagetitle="Search Result";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
include_once "functions/token.php";
require ("functions/userlevel.php");

if (empty($_GET['keyword'])) {
    header("Location: index.php"); 
    die("Redirecting to: index.php");
} else {
    $keyword = $_GET['keyword'];

    $stmt = $db->query('SELECT posts.* ,  accounts.* FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE (posts.post_title like "%'.$keyword.'%" OR posts.post_content like "%'.$keyword.'%" OR accounts.google_first_name like "%'.$keyword.'%" OR accounts.google_last_name like "%'.$keyword.'%") AND posts.display_status="1" AND posts.deleted_status = "0"');
    $checkpost = $stmt->rowCount();


    $stmt = $db->query('SELECT * FROM pages where (title like "%'.$keyword.'%" OR content like "%'.$keyword.'%")');
    $checkpages = $stmt->rowCount();

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

    <link rel="stylesheet" href="<?=ASSETS;?>vendor/sweetalert2/sweetalert2.min.css" />
</head>

<body id="body-id">

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
                            <a href="<?=URL_ROOT;?>search.php?keyword=<?php echo $keyword?>" class="color-000">
                                Search Results
                            </a>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="portfolio-page style-1">
                        <div class="portfolio-projects style-1">
                            <div class="container mb-10">
                                <div class="section-head text-center style-4">
                                    <h2 class="mb-10"><span> Search Results </span> </h2>
                                    <p><?php $totalresults = $checkpost+$checkpages; if ($totalresults == 0) {echo "No"; } else {echo "Showing ".$totalresults; } ?> result(s) found for <b>"<?php echo $keyword; ?>"</b></p>
                                </div>
                                <div class="portfolio style-1">
                                    <div class="content pb-0">
                                        <div class="row mb-150 justify-content-center">
                                            <div class="col-md-8">

                                                <?php
                                                if ($checkpost != 0) {
                                                    ?>
                                                    <h3 class="text-center">Post</h3>
                                                    <p class="text-center mb-10"><?php echo $checkpost?> result(s)</p>
                                                    <div class="card w-100">
                                                      <ul class="list-group list-group-flush">
                                                        <?php
                                                        $sql = 'SELECT posts.id as id , posts.post_type as post_type , posts.post_category as post_category , posts.post_embed as post_embed , posts.post_thumb as post_thumb , posts.post_title as post_title , posts.post_content as post_content , posts.post_postedby as post_postedby , posts.post_postedon as post_postedon , posts.post_pin as post_pin , posts.post_views as post_views , posts.display_status as display_status , posts.deleted_status as deleted_status ,  accounts.google_first_name,  accounts.google_last_name, accounts.google_image FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE (posts.post_title like "%'.$keyword.'%" OR posts.post_content like "%'.$keyword.'%" OR accounts.google_first_name like "%'.$keyword.'%" OR accounts.google_last_name like "%'.$keyword.'%") AND posts.display_status="1" AND posts.deleted_status = "0"';
                                                        foreach ($db->query($sql) as $row) {
                                                            if ($row['post_type'] == "Community") {
                                                                echo '<li class="list-group-item"><a style="margin:5px" class="w-100" href=post.php?view='.$row['id'].'>'.substr_replace(strip_tags($row['post_content']), "...", 35)."</a></li>";   
                                                            } else {
                                                                echo '<li class="list-group-item"><a style="margin:5px" class="w-100" href=post.php?view='.$row['id'].'>'.$row['post_title']."</a></li>";   
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <?php      
                                            }
                                            ?>

                                            <?php
                                            if ($checkpages != 0) {
                                                ?>
                                                <h3 class="text-center mt-30">Pages</h3>
                                                <p class="text-center mb-10"><?php echo $checkpages?> result(s)</p>
                                                <div class="card w-100">
                                                  <ul class="list-group list-group-flush">
                                                    <?php
                                                    $sql = 'SELECT * FROM pages where (title like "%'.$keyword.'%" OR content like "%'.$keyword.'%")';
                                                    foreach ($db->query($sql) as $row) {
                                                        echo '<li class="list-group-item"><a style="margin:5px" class="w-100" href='.$row['url'].'>'.$row['title']."</a></li>"; 
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <?php      
                                        }
                                        ?>




                                    </div>
                                </div>
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

<?php include "modal-community.php"; ?>

<!-- ====== start footer ====== -->
<?php include "footer.php"; ?>
<!-- ====== end footer ====== -->

<!-- ====== widgets ====== -->
<?php include "widgets.php"; ?>
<!-- ====== chat-support  ====== -->

<!-- ====== start to top button ====== -->
<a class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
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
<script src="<?=ASSETS;?>vendor/sweetalert2/sweetalert2.min.js"></script>


<?php include "functions/searchscript.php"; ?>
<?php include "functions/digiofficereminders.php"?>

</body>

</html>
<?php
$pagetitle="Home";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
include_once "functions/token.php";
require ("functions/timeago.php");
require ("functions/userlevel.php");
$database = new Connection();
$db = $database->open();
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

    <main>





        <header class="style-4">
            <div class="content">
                <div class="content frs-content" style="padding:0px">


                    <div class="container">
                        <div class="portfolio-page style-1">
                            <div class="portfolio-projects style-1">
                                <div class="container mb-10">
                                    <div class="section-head text-center style-4">
                                        <h2 class="mb-10">News &amp; <span> Announcements </span> </h2>
                                        <p> We have an experienced team of production and inspection personnel to ensure quality. </p>
                                    </div>
                                    <div class="controls mt-20 mb-20" id="fetchnewscategories" style="z-index: 999999;">
                                        <?php
                                        $stmt = $db->query('SELECT * FROM posts WHERE (post_type="News" OR post_type="Announcements") AND display_status="1" AND deleted_status = "0" AND post_pin="1"');
                                        $post_pin_count = $stmt->rowCount();
                                        ?>


                                        <button type="button" class="control mixitup-control-active" data-filter=".pinnedpost" id="pinnedpost">Latest (<?php echo $post_pin_count?>)</button>
                                        <?php
                                        
                                        try{    
                                            $sql = 'SELECT * FROM categories WHERE display_status="1" AND deleted_status = "0"';
                                            foreach ($db->query($sql) as $row) {
                                                $stmt = $db->query('SELECT * FROM posts WHERE (post_type="News" OR post_type="Announcements") AND display_status="1" AND deleted_status = "0" AND post_category="'.$row['categories_code'].'"');
                                                $post_count = $stmt->rowCount();
                                                ?>
                                                <button type="button" class="control" data-filter=".<?php echo htmlentities($row['categories_code'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($row['categories_name'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo $post_count?>)</button>
                                                <?php 
                                            }
                                        }
                                        catch(PDOException $e){
                                            $e->getMessage();
                                        }
                                        $stmt = $db->query('SELECT * FROM posts WHERE (post_type="News" OR post_type="Announcements") AND display_status="1" AND deleted_status = "0"');
                                        $post_all_count = $stmt->rowCount();
                                        ?>
                                        <button type="button" class="control" data-filter="all">All (<?php echo $post_all_count?>)</button>
                                    </div>
                                    <div class="portfolio style-1">
                                        <div class="content pb-0">
                                            <div class="row mix-container mb-150" id="MixItUpBEBED3">
                                                <?php
                                                
                                                try{    
                                                    $sql = 'SELECT posts.id as id , posts.post_type as post_type , posts.post_category as post_category , posts.post_embed as post_embed , posts.post_thumb as post_thumb , posts.post_title as post_title , posts.post_content as post_content , posts.post_postedby as post_postedby , posts.post_postedon as post_postedon , posts.post_pin as post_pin , posts.post_views as post_views , posts.display_status as display_status , posts.deleted_status as deleted_status ,  accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE (posts.post_type="News" OR posts.post_type="Announcements" OR posts.post_type="Broadcast") AND posts.display_status="1" AND posts.deleted_status = "0" ORDER BY posts.id desc';
                                                    foreach ($db->query($sql) as $row) {

                                                        if ($row['post_type'] == "Broadcast") {
                                                            $posttype = "img";
                                                            $postthumb = $row['post_embed'];  
                                                            $postsrc = $row['post_embed']; 
                                                        } else {
                                                            if ($row['post_embed'] == '0') {
                                                                $posttype = "img";
                                                                $postthumb = UPLOADS."default-thumbnail.jpg";
                                                                $postsrc = UPLOADS."default-thumbnail.jpg";
                                                            } else { 
                                                                $ext = array("gif", "jpeg", "png", "jpg");
                                                                if (in_array(pathinfo($row['post_embed'], PATHINFO_EXTENSION), $ext)) {
                                                                    $posttype = "img";
                                                                    $postthumb = UPLOADS."posts/".$row['post_embed'];  
                                                                    $postsrc = UPLOADS."posts/".$row['post_embed'];  
                                                                } else {
                                                                    $posttype = "iframe";
                                                                    $postsrc = $row['post_embed'];

                                                                    if ($row['post_thumb'] == "0") {
                                                                        $postthumb = UPLOADS."default-thumbnail.jpg";
                                                                    } else {
                                                                        $postthumb = UPLOADS."posts/".$row['post_thumb'];
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        
                                                        
                                                        ?>
                                                        <?php
                                                        $dateinwords = new DateTime($row['post_postedon']);
                                                        ?>
                                                        <div class="col-lg-4 mix <?php echo htmlentities($row['post_category'], ENT_QUOTES, 'UTF-8'); ?> <?php echo lateststatus($row['post_pin']); ?> view-post-details" data-postid="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8') ?>" data-posttitle="<?php echo htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8'); ?>" data-posttype="<?php echo $posttype?>" data-postsrc="<?php echo $postsrc?>" data-postannounce="<?php echo htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8'); ?>" data-postcontent="<?php echo htmlentities($row['post_content'], ENT_QUOTES, 'UTF-8'); ?>" data-postpostedby="<?php echo htmlentities($row['post_postedby'], ENT_QUOTES, 'UTF-8'); ?>" data-postpostedon="<?php echo strtoupper(date_format($dateinwords, "F d, Y")); ?>" data-postviews="<?php echo htmlentities($row['post_views'], ENT_QUOTES, 'UTF-8'); ?>"  data-googlepic="<?php echo htmlentities($row['google_image'], ENT_QUOTES, 'UTF-8'); ?>"  data-firstname="<?php echo htmlentities($row['google_first_name'], ENT_QUOTES, 'UTF-8'); ?>"  data-lastname="<?php echo htmlentities($row['google_last_name'], ENT_QUOTES, 'UTF-8'); ?>"  data-postembed="<?php echo htmlentities($row['post_embed'], ENT_QUOTES, 'UTF-8'); ?>">
                                                            <div class="portfolio-card mb-50">
                                                                <?php echo latestbadge($row['post_pin']); ?>
                                                                <div class="img ratio ratio-4x3">
                                                                    <?php
                                                                    echo "<img src='".$postthumb."' title='".htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8')."' style='object-fit: fit;object-position: center;'>";
                                                                    ?>
                                                                </div>

                                                                <div class="info">
                                                                    <div class="d-flex">

                                                                        <div>
                                                                            <small>
                                                                               <a class="text-uppercase border-end brd-gray pe-3 me-3 color-blue5"><?php echo htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8'); ?></a>
                                                                           </small>
                                                                       </div>
                                                                       <div>
                                                                        <small class="w-100 text-right">
                                                                            <i class="bi bi-calendar me-1"></i>
                                                                            <a class="op-8"><?php echo strtoupper(date_format($dateinwords, "F d, Y"));?></a>
                                                                        </small>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <h5 class="fw-bold mt-10 title" id="post-title">
                                                                    <div class="limit-title" style="width: 290px">
                                                                        <?php echo htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8'); ?>
                                                                            
                                                                        </div></h5>
                                                                <div class="text mt-0" style="min-height: 50px;">
                                                                    <?php
                                                                    if ($row['post_content'] != "0") {
                                                                        echo "<p>".substr_replace(strip_tags($row['post_content']), "...", 75)."</p>";
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="d-flex small mt-20 align-items-center justify-content-between op-9">
                                                                    <div class="l_side d-flex align-items-center">
                                                                      <img class="icon-25 rounded-circle d-inline-flex" style="margin-right:10px" src="<?php echo $row['google_image']; ?>">
                                                                      <?php echo $row['google_first_name']; ?>
                                                                  </div>

                                                                  <?php

                                                                  $stmt = $db->query("SELECT * FROM comments WHERE comment_post_id = '".$row['id']."'");
                                                                  $post_comments = $stmt->rowCount();

                                                                  $stmt = $db->query("SELECT * FROM reacts WHERE react_post = '".$row['id']."'");
                                                                  $post_reacts = $stmt->rowCount();

                                                                  $stmt = $db->query("SELECT * FROM views WHERE post_id = '".$row['id']."'");
                                                                  $post_views = $stmt->rowCount();

                                                                  ?>

                                                                  <a class='view-reactors-list'  data-bs-toggle='modal' data-bs-target='#modalreactors' data-postid='<?php echo $row['id']?>' style='cursor:pointer'>
                                                                  <div class="align-items-center">
                                                                      <?php
                                                                      $sql = "SELECT react_type FROM reacts WHERE react_post = '".$row['id']."' GROUP BY react_type";
                                                                      foreach ($db->query($sql) as $reacts) {
                                                                        echo "<img src='".ASSETS."custom/img/reactions/reactions_".$reacts['react_type'].".png' style='height:16px;width:16px;margin-top:-3px'>";
                                                                    }
                                                                    if ($post_reacts != "0") {
                                                                     echo " ".$post_reacts;
                                                                 } else {
                                                                    echo "<img src='".ASSETS."custom/img/reactions/noreactions.png' style='height:16px;width:16px;margin-top:-3px'> 0";
                                                                }
                                                                ?>
                                                            </div>
                                                            </a>

                                                            <div class="align-items-center">
                                                               <i class="bi bi-chat-left-text ms-4 me-1"></i> <?php echo $post_comments; ?>
                                                           </div>
                                                           <a class='view-viewers-list'  data-bs-toggle='modal' data-bs-target='#modalviewers' data-postid='<?php echo $row['id']?>' style='cursor:pointer'>
                                                           <div class="align-items-center">
                                                            <i class="bi bi-eye ms-4 me-1"></i> <?php echo $post_views;?>
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    }
                                }
                                catch(PDOException $e){
                                    $e->getMessage();
                                }
                                ?>
                            </div>

                            
                            <?php if ($post_all_count == "0") {
                             ?>
                             <div class="row">

                                <div class="col-md-12">
                                    <div class='text-center'>
                                        <h5 class='text-muted mb-0'>No Post Found</h5>
                                        <p class='text-muted mb-0'>We did not find any post for you.</p>
                                    </div>
                                </div>

                            </div>
                            <?php
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</header>


</main>
<!--End-Contents-->

<?php include "modal-post.php"; ?>

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

<?php $database->close();?>



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
<script src="<?=ASSETS;?>js/lib/mixitup.min.js"></script>
<script src="<?=ASSETS;?>js/lib/scrollIt.min.js"></script>
<script src="<?=ASSETS;?>js/main.js"></script>
<script src="<?=ASSETS;?>vendor/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
    var containerEl = document.querySelector('.mix-container');
    var mixer = mixitup(containerEl);

    $(document).ready(function(){
        var posttitle = $("#post-title").width();
        document.getElementById("post-title").style.width = posttitle+"px";
    });

    window.onload = function(){
        document.getElementById('pinnedpost').click();
    }  
</script>
<?php include "functions/searchscript.php"; ?>
<?php include "functions/postscript.php"; ?>
<?php include "functions/digiofficereminders.php"?>
</body>
</html>

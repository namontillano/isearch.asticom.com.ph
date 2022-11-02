<?php
$pagetitle="Community";
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
include_once "functions/token.php";
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

        <header class="style-4">
            <div class="content">
                <div class="content frs-content" style="padding:0px">

                    <div class="container">
                        <div class="portfolio-page style-1">
                            <div class="portfolio-projects style-1">
                                <div class="container mb-10">
                                    <div class="portfolio style-1">
                                        <div class="content pb-0">
                                         <div class="row mb-150 justify-content-center">
                                            <div class="col-md-8">

                                                <div class="row ">
                                                    <?php
                                                    require ("functions/timeago.php");
                                                    $database = new Connection();
                                                    $db = $database->open();
                                                    
                                                    $postrowperpage = 5;

                                                    $sql = $db->query('SELECT * FROM posts WHERE post_type="Community" AND display_status="1" AND deleted_status = "0"');
                                                    $postallcount = $sql->rowCount();

                                                    try{    
                                                        $sql = 'SELECT * FROM posts WHERE post_type="Community" AND display_status="1" AND deleted_status = "0" ORDER BY id desc limit 0,'.$postrowperpage;
                                                        foreach ($db->query($sql) as $row) {

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

                                                            ?>                
                                                            <?php
                                                            $dateinwords = new DateTime($row['post_postedon']);
                                                            ?>
                                                            <div class="col-lg-12 postlist view-post-details" data-postid="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8') ?>" data-posttitle="<?php echo htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8'); ?>" data-posttype="<?php echo $posttype?>" data-postsrc="<?php echo $postsrc?>" data-postannounce="<?php echo htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8'); ?>" data-postcontent="<?php echo htmlentities($row['post_content'], ENT_QUOTES, 'UTF-8'); ?>" data-postpostedby="<?php echo htmlentities($row['post_postedby'], ENT_QUOTES, 'UTF-8'); ?>" data-postpostedon="<?php echo strtoupper(date_format($dateinwords, "F d, Y"));?>" data-postviews="<?php echo htmlentities($row['post_views'], ENT_QUOTES, 'UTF-8'); ?>">
                                                                <div class="portfolio-card mb-50">
                                                                    <div class="img ratio ratio-4x3">
                                                                        <?php
                                                                        if ($posttype == "img") {
                                                                            echo "<img src='".$postthumb."' title='".htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8')."' style='object-fit: cover;object-position: center;'>";
                                                                        } else {
                                                                            echo "<img src='".$postthumb."' title='".htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8')."' style='object-fit: cover;object-position: center;'>";
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                    <div class="info">
                                                                        <small class="d-block date mt-10 fs-10px fw-bold">
                                                                            <a class="text-uppercase border-end brd-gray pe-3 me-3 color-blue5"><?php echo htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8'); ?></a>
                                                                            <i class="bi bi-calendar me-1"></i>
                                                                            <a class="op-8"><?php echo strtoupper(date_format($dateinwords, "F d, Y"));?></a>
                                                                        </small>
                                                                        <h5 class="fw-bold mt-10 title" id="post-title"><a href="post.php?view=<?php echo $row['id']; ?>" title="<?php echo htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8'); ?></a></h5>
                                                                        <div class="text mt-0">
                                                                            <?php
                                                                            if ($row['post_content'] != "0") {
                                                                                echo "<p>".$row['post_content']."</p>";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <div class="d-flex small mt-20 align-items-center justify-content-between op-9">
                                                                            <div class="l_side d-flex align-items-center">
                                                                                <span class="mt-1">By <?php echo htmlentities($row['post_postedby'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                                            </div>
                                                                            <?php

                                                                            $stmt = $db->query("SELECT * FROM comments WHERE comment_post_id = '".$row['id']."'");
                                                                            $post_comments = $stmt->rowCount();

                                                                            $stmt = $db->query("SELECT * FROM reacts WHERE react_post = '".$row['id']."'");
                                                                            $post_reacts = $stmt->rowCount();

                                                                            ?>
                                                                            <div class="r-side mt-1">
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
                                                                            <i class="bi bi-chat-left-text ms-4 me-1"></i> <?php echo $post_comments; ?>
                                                                            <i class="bi bi-eye ms-4 me-1"></i> <?php echo htmlentities($row['post_views'], ENT_QUOTES, 'UTF-8'); ?>
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

                                                $database->close();
                                                ?>

                                                <button class="load-more btn rounded-pill hover-blue4 fw-bold mt-50 px-5 border-blue4 load-more">View more posts</button>
                                                <input type="hidden" id="postrow" value="0">
                                                <input type="hidden" id="postall" value="<?php echo $postallcount; ?>">

                                            </div>
                                        </div>
                                    </div>
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
<!-- ====== end content ====== -->



<?php include "modal.php"; ?>




<!-- ====== start footer ====== -->
<?php include "footer.php"; ?>
<!-- ====== end footer ====== -->


<!-- ====== chat-support ====== -->
<?php include "chat-support.php"; ?>
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

<script type="text/javascript">
    $(document).ready(function(){

        $('.load-more').click(function(){
            var postrow = Number($('#postrow').val());
            var postallcount = Number($('#postall').val());
            postrow = postrow + 5;

            if(postrow <= postallcount){
                $("#postrow").val(postrow);

                $.ajax({
                    url: 'functions/loadmorepost.php',
                    type: 'post',
                    data: {postrow:postrow},
                    beforeSend:function(){
                        $(".load-more").text("Loading...");
                    },
                    success: function(response){

                        setTimeout(function() {
                            $(".postlist:last").after(response).show().fadeIn("slow");

                            var postrowno = postrow + 5;

                            if(postrowno > postallcount){

                                $('.load-more').text("Hide posts");
                            }else{
                                $(".load-more").text("View more posts");
                            }
                        }, 2000);


                    }
                });
            } else {
                $('.load-more').text("Loading...");

                setTimeout(function() {

                    $('.postlist:nth-child(5)').nextAll('.postlist').remove().fadeIn("slow");

                    $("#postrow").val(0);

                    $('.load-more').text("View more posts");

                }, 2000);


            }

        });

    });
</script>

<?php include "functions/searchscript.php"; ?>
<?php include "functions/postscript.php"; ?>
<?php include "functions/digiofficereminders.php"?>
</body>

</html>
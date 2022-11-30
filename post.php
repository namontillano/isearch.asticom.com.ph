<?php
$pageuserlevel=array("0");
require 'core/dbcon.php';
require "functions/session.php";
include_once "functions/token.php";
require ("functions/timeago.php");
require ("functions/userlevel.php");

if(!empty($_GET['view'])){

    $stmt = $db->query("SELECT * FROM posts WHERE id = '".$_GET['view']."'");
    $checkpost = $stmt->rowCount();

    if ($checkpost != '0') {
        $query = "SELECT posts.id as id , posts.post_type as post_type , posts.post_category as post_category , posts.post_embed as post_embed , posts.post_thumb as post_thumb , posts.post_title as post_title , posts.post_content as post_content , posts.post_postedby as post_postedby , posts.post_postedon as post_postedon , posts.post_pin as post_pin , posts.post_views as post_views , posts.display_status as display_status , posts.deleted_status as deleted_status ,  accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE posts.id = '".$_GET['view']."'";
        $res=$db->prepare($query);
        $res->execute();    
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $view_id = $row['id'];
            $view_post_title = $row['post_title'];
            $view_post_type = $row['post_type'];
            $view_post_content = $row['post_content'];
            $view_post_postedby = $row['post_postedby'];
            $view_post_views = $row['post_views'];
            $view_post_embed = $row['post_embed'];
            $view_post_thumb = $row['post_thumb'];
            $view_post_postedon = $row['post_postedon'];
            $view_deleted_status = $row['deleted_status'];
            $view_display_status = $row['display_status']; 
            $view_google_first_name = $row['google_first_name']; 
            $view_google_last_name = $row['google_last_name']; 
            $view_google_image = $row['google_image']; 

        }

        

        if ($view_deleted_status == "1" ) {
            header('Location: error.php?code=404');
            exit;
        }

        if ($view_post_type == "Broadcast") {
            $posttype = "img";
            $postthumb = $view_post_embed;  
            $postsrc = $view_post_embed; 
        } else {
            if ($view_post_embed == '0') {
                $posttype = "img";
                $postthumb = UPLOADS."default-thumbnail.jpg";
                $postsrc = UPLOADS."default-thumbnail.jpg";
            } else { 
                $ext = array("gif", "jpeg", "png", "jpg");
                if (in_array(pathinfo($view_post_embed, PATHINFO_EXTENSION), $ext)) {
                    $posttype = "img";
                    $postthumb = UPLOADS."posts/".$view_post_embed;  
                    $postsrc = UPLOADS."posts/".$view_post_embed;  
                } else {
                    $posttype = "iframe";
                    $postsrc = $view_post_embed;

                    if ($view_post_thumb == "0") {
                        $postthumb = UPLOADS."default-thumbnail.jpg";
                    } else {
                        $postthumb = UPLOADS."posts/".$view_post_thumb;
                    }
                }
            }
        }
        $dateinwords = new DateTime($view_post_postedon);
    } else {
        header('Location: error.php?code=404');
        exit;
    }
} else {
    header('Location: error.php?code=404');
    exit;
}
?>
<?php
if ($view_post_type == "Community") {
    $pagetitle = "Community";
} else {
    $pagetitle=$view_post_title;
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



        <div id='loadpostcontent' class='view-post-details' data-postid="<?php echo htmlentities($view_id, ENT_QUOTES, 'UTF-8') ?>" data-posttitle="<?php echo htmlentities($view_post_title, ENT_QUOTES, 'UTF-8'); ?>" data-posttype="<?php echo $posttype?>" data-postsrc="<?php echo $postsrc?>" data-postannounce="<?php echo htmlentities($view_post_type, ENT_QUOTES, 'UTF-8'); ?>" data-postcontent="<?php echo htmlentities($view_post_content, ENT_QUOTES, 'UTF-8'); ?>" data-postpostedby="<?php echo htmlentities($view_post_postedby, ENT_QUOTES, 'UTF-8'); ?>" data-postpostedon="<?php echo strtoupper(date_format($dateinwords, "F d, Y")); ?>" data-postviews="<?php echo htmlentities($view_post_views, ENT_QUOTES, 'UTF-8'); ?>"  data-googlepic="<?php echo htmlentities($view_google_image, ENT_QUOTES, 'UTF-8'); ?>"  data-firstname="<?php echo htmlentities($view_google_first_name, ENT_QUOTES, 'UTF-8'); ?>"  data-lastname="<?php echo htmlentities($view_google_last_name, ENT_QUOTES, 'UTF-8'); ?>"  data-postembed="<?php echo htmlentities($view_post_embed, ENT_QUOTES, 'UTF-8'); ?>"></div>

        <section class="all-news section-padding pt-50 blog bg-transparent style-3">
            <div class="container">

                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">


                        <?php
                        if ($view_post_type == "Community") {
                            ?>
                            <div class="blog-details-slider">


                                <div class="d-flex align-items-center justify-content-between op-9">
                                    <div class="d-flex">
                                        <span class="info-group modal-span-googlepic"></span>
                                        <h6 class="fw-bold" style="color: #000;"><span class="info-group modal-span-firstname"></span> <span class="info-group modal-span-lastname"></span></h6>
                                    </div>
                                    <div class="d-flex">
                                        <small><span class="text-muted"><i class="bi bi-calendar me-1"></i> <span class="info-group modal-span-postedon"></span></span></small>
                                    </div>

                                </div>


                                <div class="text mt-10 mb-10 color-666">
                                    <span class="info-group text-justify modal-span-contenttype"></span>
                                </div>

                                <div class="community-leftpanel">
                                    <div class="info-group modal-span-content"></div>
                                    <div class="info-group modal-div-photos"></div>
                                </div>

                            </div>
                            <?php
                        } else {
                            ?> 

                            <div class="blog-details-slider">
                                <div class="section-head text-center mb-10 style-5">
                                    <small class="d-block date text">
                                        <a href="#" class="text-uppercase border-end brd-gray pe-3 me-3 color-blue5 fw-bold"> <span class="info-group modal-span-announce"></span> </a>
                                        <i class="bi bi-clock me-1"></i>
                                        <span class="op-8"><span class="info-group modal-span-postedon"></span></span>
                                    </small>
                                    <h4 class="mt-20 color-000"><span class="info-group modal-span-title"></span></h4>
                                </div>

                                <div class="text mt-10 mb-10 color-666">
                                    <span class="info-group text-justify modal-span-contenttype"></span>
                                </div>

                                <div class="info-group modal-span-content"></div>
                                <div class="info-group modal-div-photos"></div>

                            </div>

                            <?php
                        }
                        ?>
                        

                        

                        <div class="row text-center mt-20 mb-10 pt-10 pb-10 border-top border-bottom brd-gray" style="margin:0">

                            <div class="col-md-6">
                                <div class="info-group modal-div-reacts"></div>
                            </div>
                            <div class="col-md-3 d-none">
                                <div class="info-group"><i class='bi bi-chat-left-text'></i> <span class="modal-div-comments"></span></div>
                            </div>
                            <div class="col-md-6">
                                    <div class="info-group modal-div-views"></div>
                            </div>
                        </div>

                        <div class="blog-content-info d-none">
                            <?php if(isset($_SESSION['google_id'])){ ?>
                                <form id="addcommentform" class="pb-20 pt-20" novalidate>
                                    <textarea placeholder="Leave your comments here..." id="comment" name="comment" rows="3" class="form-control radius-4 textarea resize-ta w-100" style="resize: none;overflow: hidden;" required></textarea>
                                    <input type="hidden" id="postid" class="postid" name="postid">
                                    <input type="hidden" id="userid" class="userid" name="userid" value="<?php echo $_SESSION['google_id'];?>">
                                    <input type="hidden" class="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]);?>">
                                    <button type="submit" class="btn btn-sm w-100 mt-10 mb-10 btn-danger btn-label ms-auto" name="submit">Post Comment</button>
                                </form>
                            <?php } else { ?>
                                <div class=" pt-20 border-top border-1 brd-gray">
                                    <div class="alert alert-danger text-center" role="alert">
                                     You must be <strong>logged in</strong> to post a comment.
                                 </div>
                             </div>
                         <?php }?>
                         <div class="info-group modal-div-usercomments comments-content">
                         </div>
                         <center><a class="load-morecomments text-center mb-10">View more comments</a></center>
                         <input type="hidden" id="commentrow" value="0">
                         <input type="hidden" id="commentall" class="modal-div-comments">
                     </div>
                 </div>
             </div>
         </div>
     </section>






 </main>
 <!--End-Contents-->
 <!-- ====== end content ====== -->





 <!-- Modals -->


 <div class="modal fade zoomIn" id="Modaldeletecomments" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="float-end btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to delete your comment ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <form id="deletecommentform" novalidate>
                        <input type="hidden" class="deletecommentid" id="deletecommentid" name="deletecommentid">
                        <input type="hidden"  class="deleteuserid" id="deleteuserid" name="deleteuserid" value="<?php echo $_SESSION['google_id'];?>">
                        <input type="hidden" class="deletepostid" id="deletepostid" name="deletepostid">
                        <input type="hidden" class="csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]);?>">
                        <button type="submit" class="btn btn-danger">Yes, Delete It!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade zoomIn" id="modalviewers" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-bg">
                <h5 class="modal-title" id="exampleModalLabel">Viewer(s)</h5>
                <button type="button" class="btn-close close-modal-viewers" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="div-viewers-list"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade zoomIn" id="modalreactors" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-bg">
                <h5 class="modal-title" id="exampleModalLabel">Reactor(s)</h5>
                <button type="button" class="btn-close close-modal-reactors" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="div-reactors-list"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->

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
<script src="<?=ASSETS;?>vendor/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
    window.onload = function(){
        document.getElementById('loadpostcontent').click();
    }
</script>

<?php include "functions/searchscript.php"; ?>
<?php include "functions/postscript.php"; ?>
<?php include "functions/digiofficereminders.php"?>



</body>

</html>
<?php
include_once("xmlhttprequest.php");
require '../core/dbcon.php';

$database = new Connection();
$db = $database->open();


$postrow = $_POST['postrow'];
$postrowperpage = 5;

$sql = $db->query('SELECT * FROM posts WHERE post_type="Community" AND display_status="1" AND deleted_status = "0"');
$allcount = $sql->rowCount();
$additionalpost = '';

try{    
    $sql = 'SELECT * FROM posts WHERE post_type="Community" AND display_status="1" AND deleted_status = "0" ORDER BY id desc limit '.$postrow.','.$postrowperpage;
    foreach ($db->query($sql) as $row) {

        if ($row['post_embed'] == '0') {
            $posttype = "img";
            $postthumb = "uploads/default-thumbnail.jpg";
            $postsrc = "uploads/default-thumbnail.jpg";
        } else {
            $ext = array("gif", "jpeg", "png", "jpg");
            if (in_array(pathinfo($row['post_embed'], PATHINFO_EXTENSION), $ext)) {
                $posttype = "img";
                $postthumb = "uploads/posts/".$row['post_embed'];  
                $postsrc = "uploads/posts/".$row['post_embed'];                                                                           
            } else {
                $posttype = "iframe";
                $postsrc = $row['post_embed'];
                if ($row['post_thumb'] == "0") {
                    $postthumb = "uploads/default-thumbnail.jpg";
                } else {
                    $postthumb = "uploads/posts/".$row['post_thumb'];
                }
            }
        }

        $dateinwords = new DateTime($row['post_postedon']);

        $additionalpost .= '<div class="col-lg-12 postlist view-post-details" data-postid="'.htmlentities($row['id'], ENT_QUOTES, 'UTF-8').'" data-posttitle="'.htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8').'" data-posttype="'.$posttype.'" data-postsrc="'.$postsrc.'" data-postannounce="'.htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8').'" data-postcontent="'.htmlentities($row['post_content'], ENT_QUOTES, 'UTF-8').'" data-postpostedby="'.htmlentities($row['post_postedby'], ENT_QUOTES, 'UTF-8').'" data-postpostedon="'.htmlentities($row['post_postedon'], ENT_QUOTES, 'UTF-8').'" data-postviews="'.htmlentities($row['post_views'], ENT_QUOTES, 'UTF-8').'">';
        $additionalpost .= '<div class="portfolio-card mb-50">';
        $additionalpost .= '<div class="img ratio ratio-4x3">';

        if ($posttype == "img") {
            $additionalpost .= "<img src='".$postthumb."' title='".htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8')."'>";
        } else {
            $additionalpost .= "<img src='".$postthumb."' title='".htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8')."'>";
        }

        $additionalpost .= '</div>';
        $additionalpost .= '<div class="info">';
        $additionalpost .= '<small class="d-block date mt-10 fs-10px fw-bold">';
        $additionalpost .= '<a class="text-uppercase border-end brd-gray pe-3 me-3 color-blue5">'.htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8').'</a>';
        $additionalpost .= '<i class="bi bi-calendar me-1"></i>';
        $additionalpost .= '<a class="op-8">'.strtoupper(date_format($dateinwords, "F d, Y")).'</a>';
        $additionalpost .= '</small>';
        $additionalpost .= '<h5 class="fw-bold mt-10 title" id="post-title"><a title="'.htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8').'">'.htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8').'</a></h5>';
        $additionalpost .= '<div class="text mt-0">';
        if ($row['post_content'] != "0") {
            $additionalpost .= "<p>".$row['post_content']."</p>";
        }

        $additionalpost .= '</div>';
        $additionalpost .= '<div class="d-flex small mt-20 align-items-center justify-content-between op-9">';
        $additionalpost .= '<div class="l_side d-flex align-items-center">';
        $additionalpost .= '<span class="mt-1">By '.htmlentities($row['post_postedby'], ENT_QUOTES, 'UTF-8').'</span>';
        $additionalpost .= '</div>';

        $stmt = $db->query("SELECT * FROM comments WHERE comment_post_id = '".$row['id']."'");
        $post_comments = $stmt->rowCount();
        $stmt = $db->query("SELECT * FROM reacts WHERE react_post = '".$row['id']."'");
        $post_reacts = $stmt->rowCount();

        $additionalpost .= '<div class="r-side mt-1">';

        $sql = "SELECT react_type FROM reacts WHERE react_post = '".$row['id']."' GROUP BY react_type";
        foreach ($db->query($sql) as $reacts) {
            $additionalpost .= "<img src='assets/custom/img/reactions/reactions_".$reacts['react_type'].".png' style='height:16px;width:16px;margin-top:-3px'>";
        }
        if ($post_reacts != "0") {
            $additionalpost .= " ".$post_reacts;
        } else {
            $additionalpost .= "<img src='assets/custom/img/reactions/noreactions.png' style='height:16px;width:16px;margin-top:-3px'> 0";
        }

        $additionalpost .= '<i class="bi bi-chat-left-text ms-4 me-1"></i> '.$post_comments.'';
        $additionalpost .= '<i class="bi bi-eye ms-4 me-1"></i> '.htmlentities($row['post_views'], ENT_QUOTES, 'UTF-8').'';
        $additionalpost .= '</div>';
        $additionalpost .= '</div>';
        $additionalpost .= '</div>';
        $additionalpost .= '</div>';
        $additionalpost .= '</div>';


    }
}

catch(PDOException $e){
    $e->getMessage();
}

echo $additionalpost;

$database->close();
?>
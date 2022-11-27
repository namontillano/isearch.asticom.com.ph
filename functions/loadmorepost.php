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
    $sql = 'SELECT posts.id as id , posts.post_type as post_type , posts.post_category as post_category , posts.post_embed as post_embed , posts.post_thumb as post_thumb , posts.post_title as post_title , posts.post_content as post_content , posts.post_postedby as post_postedby , posts.post_postedon as post_postedon , posts.post_pin as post_pin , posts.post_views as post_views , posts.display_status as display_status , posts.deleted_status as deleted_status ,  accounts.google_first_name,  accounts.google_last_name, accounts.google_image FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE posts.post_type="Community" AND posts.display_status="1" AND posts.deleted_status = "0" ORDER BY posts.id desc limit '.$postrow.','.$postrowperpage;
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

        $additionalpost .= '<div class="col-lg-12 postlist view-post-details" data-postid="'.htmlentities($row['id'], ENT_QUOTES, 'UTF-8').'" data-posttitle="'.htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8').'" data-posttype="'.$posttype.'" data-postsrc="'.$postsrc.'" data-postannounce="'.htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8').'" data-postcontent="'.htmlentities($row['post_content'], ENT_QUOTES, 'UTF-8').'" data-postpostedby="'.htmlentities($row['post_postedby'], ENT_QUOTES, 'UTF-8').'" data-postpostedon="'.htmlentities($row['post_postedon'], ENT_QUOTES, 'UTF-8').'" data-postviews="'.htmlentities($row['post_views'], ENT_QUOTES, 'UTF-8').'"  data-googlepic="'.htmlentities($row['google_image'], ENT_QUOTES, 'UTF-8').' data-firstname="'.htmlentities($row['google_first_name'], ENT_QUOTES, 'UTF-8').'"  data-lastname="'.htmlentities($row['google_last_name'], ENT_QUOTES, 'UTF-8').'"  data-postembed="'.htmlentities($row['post_embed'], ENT_QUOTES, 'UTF-8').'">';
        $additionalpost .= '<div class="portfolio-card mb-50">';
        $additionalpost .= '<div class="info">';
        $additionalpost .= '<div class="d-flex align-items-center justify-content-between op-9">';
        $additionalpost .= '<div class="d-flex">';
        $additionalpost .= '<img class="icon-25 rounded-circle d-inline-flex" style="margin-right:10px" src="'.$row['google_image'].'">';
        $additionalpost .= '<h6 class="fw-bold" style="color: #000;">'.$row['google_first_name'].' '.$row['google_last_name'].'</h6>';
        $additionalpost .= '</div>';
        $additionalpost .= '<div class="d-flex">';
        $additionalpost .= '<span class="text-muted"><i class="bi bi-calendar me-1"></i> '.strtoupper(date_format($dateinwords, "F d, Y")).'</span>';
        $additionalpost .= '</div>';
        $additionalpost .= '</div>';
        $additionalpost .= '<div class="text mt-3 mb-0">';

        if ($row['post_content'] != "0") {
            $additionalpost .= "<p>".$row['post_content']."</p>";
        }
        $additionalpost .= '</div>';
        $additionalpost .= '</div>';

        if ($row['post_embed'] != '0') {
            $additionalpost .= "<div class='img ratio ratio-4x3'>";
            if ($posttype == "img") {
                $additionalpost .= "<img src='".$postthumb."' title='".htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8')."' style='object-fit: cover;object-position: center;'>";
            } else {
                $additionalpost .= "<img src='".$postthumb."' title='".htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8')."' style='object-fit: cover;object-position: center;'>";
            }
            $additionalpost .= "</div>";
        }


        if ($row['post_embed'] == "0") {
         $reactdisplay = "border-top border-1 brd-gray";
     } else {
        $reactdisplay = "";
    }


    $additionalpost .= '<div class="d-flex align-items-center justify-content-between pt-10 '.$reactdisplay.'" style="margin-left: 20px;margin-right: 20px;margin-bottom: 20px;">';

    $stmt = $db->query("SELECT * FROM comments WHERE comment_post_id = '".$row['id']."'");
    $post_comments = $stmt->rowCount();

    $stmt = $db->query("SELECT * FROM reacts WHERE react_post = '".$row['id']."'");
    $post_reacts = $stmt->rowCount();

     $stmt = $db->query("SELECT * FROM views WHERE post_id = '".$row['id']."'");
                    $post_views = $stmt->rowCount();
                    

    $additionalpost .= '<a class="view-reactors-list"  data-bs-toggle="modal" data-bs-target="#modalreactors" data-postid="'.$row["id"].'" style="cursor:pointer"><div>';

    $sql = "SELECT react_type FROM reacts WHERE react_post = '".$row['id']."' GROUP BY react_type";
    foreach ($db->query($sql) as $reacts) {
        $additionalpost .= "<img src='assets/custom/img/reactions/reactions_".$reacts['react_type'].".png' style='height:16px;width:16px;margin-top:-3px'>";
    }
    if ($post_reacts != "0") {
        $additionalpost .= " ".$post_reacts;
    } else {
        $additionalpost .= "<img src='assets/custom/img/reactions/noreactions.png' style='height:16px;width:16px;margin-top:-3px'> 0";
    }

    $additionalpost .= '</div></a>';
    $additionalpost .= '<div>';
    $additionalpost .= '<i class="bi bi-chat-left-text ms-4 me-1"></i>'.$post_comments;
    $additionalpost .= '</div>';
    $additionalpost .= '<a class="view-viewers-list"  data-bs-toggle="modal" data-bs-target="#modalviewers" data-postid="'.$row["id"].'" style="cursor:pointer"><div>';
    $additionalpost .= '<i class="bi bi-eye ms-4 me-1"></i>'.$post_views;
    $additionalpost .= '</div></a>';
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
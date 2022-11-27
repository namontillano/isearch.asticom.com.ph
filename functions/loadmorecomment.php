<?php
include_once("xmlhttprequest.php");
require '../core/dbcon.php';
require ("timeago.php");
$database = new Connection();
$db = $database->open();


$commentrow = $_POST['commentrow'];
$commentpostid = $_POST['commentpostid'];
$commentrowperpage = 5;

$sql = $db->query('SELECT comments.comment_post_id,comments.id,comments.comment_user_id, comments.comment_message, comments.comment_date_posted,  accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM comments INNER JOIN accounts ON comments.comment_user_id = accounts.google_id WHERE comments.comment_post_id = "'.$commentpostid.'" ORDER BY comments.comment_date_posted DESC');
$allcount = $sql->rowCount();
$additionalcomment = '';

try{    
    $sql = 'SELECT comments.comment_post_id,comments.id,comments.comment_user_id, comments.comment_message, comments.comment_date_posted,  accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM comments INNER JOIN accounts ON comments.comment_user_id = accounts.google_id WHERE comments.comment_post_id = "'.$commentpostid.'" ORDER BY comments.comment_date_posted DESC LIMIT '.$commentrow.','.$commentrowperpage;
    foreach ($db->query($sql) as $row) {



        $additionalcomment .= '<div class="comment-replay-cont commentlist pb-20 pt-20 border-top border-1 brd-gray">';
        if (isset($_SESSION['google_id'])) {
            if ($_SESSION['google_id'] == $row['comment_user_id']) {
                $additionalcomment .= '<div class="dropdown" style="float: right;position: relative;right: 5px;">';
                $additionalcomment .= '<a class="" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-gear"></i></a>';
                $additionalcomment .= '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                $additionalcomment .= '<li><a class="dropdown-item editcomment" id="editcomment" data-editpostid="'.$row['comment_post_id'].'" data-editcommentid="'.$row['id'].'" data-editmessage="'.strip_tags($row['comment_message']).'">Edit</a></li>';
                $additionalcomment .= '<li><a class="dropdown-item deletecomment" id="deletecomment" data-bs-toggle="modal" data-bs-target="#Modaldeletecomments" data-deletepostid="'.$row['comment_post_id'].'" data-deletecommentid="'.$row['id'].'">Delete</a></li>';
                $additionalcomment .= '</ul>';
                $additionalcomment .= '</div>';
            }
        }
        $additionalcomment .= '<div class="d-flex comment-cont">';
        $additionalcomment .= '<div class="inf">';
        $additionalcomment .= '<div class="title d-flex">';
        $additionalcomment .= '<div class="icon-35 rounded-circle img-cover overflow-hidden me-3 flex-shrink-0">';
        $additionalcomment .= '<img src="'.$row['google_image'].'" alt="">';
        $additionalcomment .= '</div>';
        $additionalcomment .= '<h6 style="line-height: 1;">';
        $additionalcomment .= '<span class="fw-bold fs-14px">'.htmlentities($row['google_first_name'], ENT_QUOTES, 'UTF-8').' '.htmlentities($row['google_last_name'], ENT_QUOTES, 'UTF-8').'</span>';
        $additionalcomment .= '<br>';
        $additionalcomment .= '<small><span class="time fs-12px text-muted">'.timeago($row['comment_date_posted']).'</span></small>';
        $additionalcomment .= '</h6>';
        $additionalcomment .= '</div>';
        $additionalcomment .= '<div class="text  mt-10" style="line-height: 1.5;">';
        $additionalcomment .= '<div id="commentcontainer'.$row['id'].'">';
        $additionalcomment .= nl2br(htmlentities($row['comment_message'], ENT_QUOTES, 'UTF-8'));
        $additionalcomment .= '</div>';
        $additionalcomment .= '</div>';
        $additionalcomment .= '</div>';
        $additionalcomment .= '</div>';
        $additionalcomment .= '</div>';
    }
}

catch(PDOException $e){
    $e->getMessage();
}

echo $additionalcomment;

$database->close();
?>
<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

$database = new Connection();
$db = $database->open();

$stmt = $db->query("SELECT * FROM comments WHERE comment_post_id = '".$_POST['postid']."'");
$countcomments = $stmt->rowCount();


echo $countcomments;
$database->close();
?>
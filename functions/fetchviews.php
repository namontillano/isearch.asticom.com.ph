<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

$database = new Connection();
$db = $database->open();


$sql = "UPDATE posts SET post_views = post_views+1 WHERE id = '".$_POST['postid']."'";
$db->exec($sql);


$sql="SELECT post_views FROM posts WHERE id = '".$_POST['postid']."'";
$res=$db->prepare($sql);
$res->execute();    
while($rows = $res->fetch(PDO::FETCH_ASSOC)){
	$countviews = htmlentities($rows['post_views'], ENT_QUOTES, 'UTF-8');
}

echo $countviews;
$database->close();
?>
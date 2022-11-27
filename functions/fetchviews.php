<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

$database = new Connection();
$db = $database->open();


$stmt = $db->query("SELECT * FROM views WHERE post_id = '".$_POST['postid']."'");
$post_views = $stmt->rowCount();



$stmt = $db->query("SELECT * FROM views WHERE post_id = '".$_POST['postid']."' AND google_id = '".$_SESSION['google_id']."'");
$viewstatus = $stmt->rowCount();

if ($viewstatus == "0") {
	$sql="INSERT INTO views (post_id, google_id)
				values (:post_id, :google_id)";
				$qry=$db->prepare($sql);
				$qry->execute(array(
					':post_id' => $_POST['postid'],
					':google_id' => $_SESSION['google_id']
				));

	$sql = "UPDATE posts SET post_views = post_views+1 WHERE id = '".$_POST['postid']."'";
	$db->exec($sql);
}




echo "<a class='view-viewers-list'  data-bs-toggle='modal' data-bs-target='#modalviewers' data-postid='".$_POST['postid']."' style='cursor:pointer'><i class='bi bi-eye'></i> ".$post_views."</a>";
$database->close();
?>
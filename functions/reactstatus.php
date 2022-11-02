<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");
require "session.php";

$database = new Connection();
$db = $database->open();


if ($_POST['action']=="add") {
	$stmt = $db->prepare("INSERT INTO reacts (react_post,react_type, react_user_id,react_date) VALUES
		(:react_post,:react_type, :react_user_id,:react_date)");
	$stmt->execute(array(
		':react_post' => $_POST['postid'],
		':react_type' => $_POST['type'],
		':react_user_id' => $_SESSION['google_id'],
		':react_date' => date("Y-m-d H:i:s")
	));

} elseif ($_POST['action']=="change") {

	$sql="UPDATE reacts SET react_type = :react_type, react_date = :react_date WHERE react_post = :postid AND react_user_id = :userid";
	$qry = $db->prepare($sql);
	$qry->execute(array(
		':react_type' => $_POST['type'],
		':userid' => $_SESSION['google_id'],
		':postid' => $_POST['postid'],
		':react_date' => date("Y-m-d H:i:s")));

} else {

	$sql="DELETE FROM reacts WHERE react_post = :postid AND react_user_id = :userid";
	$qry = $db->prepare($sql);
	$qry->execute(array(':postid' => $_POST['postid'], ':userid' => $_SESSION['google_id']));

}

echo "true";

$database->close();
?>
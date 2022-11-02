<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

$output = array('error' => false);

$database = new Connection();
$db = $database->open();

try{

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
		$REQUEST_METHOD = true;	
	} else {
		$REQUEST_METHOD = false;	
	}

	if (isset($_SESSION['csrf_token']) && isset($_POST['csrf_token']) && $_SESSION["csrf_token"] == $_POST["csrf_token"]){
		$CSRF_TOKEN = true;
	} else {
		$CSRF_TOKEN = false;
	}

	if ($REQUEST_METHOD == true && $CSRF_TOKEN == true) {

		if ($_POST['remindmecheckbox'] == "0") {
			$output['status'] = "reminders-close";
			$output['popupstatus'] = $_POST['remindmecheckbox'];
		} else {
			$output['status'] = "reminders-success";
			$output['popupstatus'] = $_POST['remindmecheckbox'];
			setcookie('broadcastdigioffice', 'remindmetomorrow', time() + (36000), "/");
		}
	} else {
		$output['status'] = "request-invalid";
	}
}
catch(PDOException $e){
	$output['error'] = true;
	$output['status'] = "request-error";
	$output['errormessage'] = $e->getMessage();
}

$database->close();

echo json_encode($output);

?>
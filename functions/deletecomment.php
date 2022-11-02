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
		
		if ($_POST['deletecommentid'] == '' || $_POST['deleteuserid'] == '') {
			$output['status'] = "request-error";
		} else {
			
			$sql="DELETE FROM comments WHERE id = :id";
			$qry = $db->prepare($sql);
			$qry->execute(array(':id' => $_POST['deletecommentid']));

			$output['status'] = "deletecomment-success";
			$output['postid'] = $_POST['deletepostid'];

	
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
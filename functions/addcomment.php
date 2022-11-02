<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");
include_once("../functions/profanity.php");

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
		// No backend form validation and sanitation yet
		if ($_POST['comment'] == '') {
			$output['status'] = "request-errorfields";
		} else {

			$query = "SELECT * FROM profanity WHERE id = '1'";
			$res=$db->prepare($query);
			$res->execute();    
			while($row = $res->fetch(PDO::FETCH_ASSOC)){
				$wordlist = $row['badwords'];
			}

			$filteredcomment = "";
			
			if (strpos(ReplaceBadWords($_POST['comment'],$wordlist), '**') === false) {

				$sql="INSERT INTO comments (comment_post_id, comment_user_id, comment_message, comment_date_posted)
				values (:comment_post_id, :comment_user_id, :comment_message, :comment_date_posted)";
				$qry=$db->prepare($sql);
				if ($qry->execute(array(
					':comment_post_id' => $_POST['postid'],
					':comment_user_id' => $_POST['userid'],
					':comment_message' => $_POST['comment'],
					':comment_date_posted' => date("Y-m-d H:i:s")
				))){
					$output['postid'] = $_POST['postid'];
					$output['status'] = "addcomment-success";
				} else{
					$output['error'] = true;
					$output['status'] = "request-error";
				} 

			}
			else {
				$output['status'] = "badwords-exist";
				$output['comment'] = ReplaceBadWords($_POST['comment'],$wordlist);
			}

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
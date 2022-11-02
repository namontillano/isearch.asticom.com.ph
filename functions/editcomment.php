<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");
include_once("../functions/profanity.php");

$output = array('error' => false);

$database = new Connection();
$db = $database->open();

try{
	// editcomment
	// editcommentid
	
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
		if ($_POST['editcommentarea'] == '') {
			$output['status'] = "request-errorfields";
		} else {

			$query = "SELECT * FROM profanity WHERE id = '1'";
			$res=$db->prepare($query);
			$res->execute();    
			while($row = $res->fetch(PDO::FETCH_ASSOC)){
				$wordlist = $row['badwords'];
			}

			$filteredcomment = "";
			
			if (strpos(ReplaceBadWords($_POST['editcommentarea'],$wordlist), '**') === false) {

				$sql="UPDATE comments SET comment_message = :comment_message WHERE id = :id";
					$qry = $db->prepare($sql);
					if ($qry->execute(array(
						':comment_message' => $_POST['editcommentarea'],
						':id' => $_POST['editcommentid']
					))){
					$output['postid'] = $_POST['editpostid'];
					$output['status'] = "editcomment-success";
				} else{
					$output['error'] = true;
					$output['status'] = "request-error";
				} 

				$output['status'] = "editcomment-success";
			}
			else {
				$output['status'] = "badwords-exist";
				$output['editcommentarea'] = ReplaceBadWords($_POST['editcommentarea'],$wordlist);
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
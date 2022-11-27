<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");
include_once("../functions/profanity.php");

$database = new Connection();
$db = $database->open();

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

if ($REQUEST_METHOD == true && $CSRF_TOKEN == true ) {

	if ($_POST['communitypostmessage'] == '') {
		$output = "request-errorfields";
	} else {

		$query = "SELECT * FROM profanity WHERE id = '1'";
		$res=$db->prepare($query);
		$res->execute();    
		while($row = $res->fetch(PDO::FETCH_ASSOC)){
			$wordlist = $row['badwords'];
		}
		if (strpos(ReplaceBadWords($_POST['communitypostmessage'],$wordlist), '**') === false) {
			$upload_destination = '../uploads/posts/';
			$image_temp = $_FILES['communitypostattach']['tmp_name'];
			$image_type = $_FILES['communitypostattach']['type'];
			$image_size = $_FILES['communitypostattach']['size'];

			if ($image_size != 0) {
				if ($image_type == "image/jpeg" || $image_type == "image/jpg") {
					if ($image_size <= "5000000") {
						$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'0123456789');
						shuffle($seed);
						$rand = '';
						foreach (array_rand($seed, 30) as $k) $rand .= $seed[$k];
						$upload_name = $rand.'.jpg';
						$targetPath = $upload_destination . $upload_name;
						if(move_uploaded_file($image_temp, $targetPath)) {


							$sql="INSERT INTO posts (post_type, post_embed, post_postedby, post_postedon, display_status,post_content)
							values (:post_type, :post_embed, :post_postedby, :post_postedon, :display_status,:post_content)";
							$qry=$db->prepare($sql);
							if ($qry->execute(array(
								':post_type' => "Community",
								':post_embed' => $upload_name,
								':post_postedby' => $_SESSION['google_id'],
								':post_postedon' => date("Y-m-d H:i:s"),
								':display_status' => '1',
								':post_content' => $_POST['communitypostmessage']
							))){

								$output = "post-success";
							} else{

								$output = "request-error";
							} 



						} else {
							$output = "request-error";
						}
					} else {
						$output = "invalid-size";
					}
				} else {
					$output = "invalid-file";
				}
			} else {
				$sql="INSERT INTO posts (post_type, post_embed, post_postedby, post_postedon, display_status,post_content)
				values (:post_type, :post_embed, :post_postedby, :post_postedon, :display_status,:post_content)";
				$qry=$db->prepare($sql);
				if ($qry->execute(array(
					':post_type' => "Community",
					':post_embed' => "0",
					':post_postedby' => $_SESSION['google_id'],
					':post_postedon' => date("Y-m-d H:i:s"),
					':display_status' => "1",
					':post_content' => $_POST['communitypostmessage']
				))){

					$output = "post-success";
				} else{

					$output = "request-error";
				} 
			}
		}
		else {
			$output = ReplaceBadWords($_POST['communitypostmessage'],$wordlist);
			
		}


		













	}

} else {
	$output = "request-invalid";
}

$database->close();


echo $output;

?>
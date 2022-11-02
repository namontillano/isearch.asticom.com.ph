<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");
require "session.php";
$database = new Connection();
$db = $database->open();

$stmt = $db->query("SELECT * FROM reacts WHERE react_post = '".$_POST['postid']."'");
$countreacts = $stmt->rowCount();

$stmt = $db->query("SELECT * FROM reacts WHERE react_post = '".$_POST['postid']."' AND react_user_id = '".$_SESSION['google_id']."'");
$checkme = $stmt->rowCount();

function react_type($type) {
	switch ($type) {
		case "0": return "Like"; break;
		case "1": return "Love"; break;
		case "2": return "HaHa"; break;
		case "3": return "Wow"; break;
		case "4": return "Sad"; break;
		case "5": return "Angry"; break;

	}
}

if ($_SESSION['google_id'] != '') {
	if ($checkme == 0) {
		echo "
		<span class='reaction-btn'>
		<span class='reactstatus' data-reaction='Like' data-type='0' data-action='add' data-postid='".$_POST['postid']."'><img src='assets/custom/img/reactions/noreactions.png' style='height:16px;width:16px;margin-top:-3px;'> <b style='margin-right:20px'>Like</b></span> 
		<ul class='emojies-box'>
		<li class='emoji emo-like reactstatus' data-reaction='Like' data-type='0' data-action='add' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-love reactstatus' data-reaction='Love' data-type='1' data-action='add' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-haha reactstatus' data-reaction='HaHa' data-type='2' data-action='add' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-wow reactstatus' data-reaction='Wow' data-type='3' data-action='add' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-sad reactstatus' data-reaction='Sad' data-type='4' data-action='add' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-angry reactstatus' data-reaction='Angry' data-type='5' data-action='add' data-postid='".$_POST['postid']."'></li>
		</ul>
		</span>
		";
	} else {
		
		$sql="SELECT * FROM reacts WHERE react_post = '".$_POST['postid']."' AND react_user_id = '".$_SESSION['google_id']."'";
		$res=$db->prepare($sql);
		$res->execute();    
		while($rows = $res->fetch(PDO::FETCH_ASSOC)){
			$react_type = htmlentities($rows['react_type'], ENT_QUOTES, 'UTF-8');
		}

		echo "
		<span class='reaction-btn'>
		<span class='reactstatus' data-reaction='Like' data-type='0' data-action='remove' data-postid='".$_POST['postid']."'><img src='assets/custom/img/reactions/reactions_".$react_type.".png' style='height:16px;width:16px;margin-top:-3px;'> <b style='margin-right:20px'>".react_type($react_type)."</b></span> 
		<ul class='emojies-box'>
		<li class='emoji emo-like reactstatus' data-reaction='Like' data-type='0' data-action='change' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-love reactstatus' data-reaction='Love' data-type='1' data-action='change' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-haha reactstatus' data-reaction='HaHa' data-type='2' data-action='change' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-wow reactstatus' data-reaction='Wow' data-type='3' data-action='change' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-sad reactstatus' data-reaction='Sad' data-type='4' data-action='change' data-postid='".$_POST['postid']."'></li>
		<li class='emoji emo-angry reactstatus' data-reaction='Angry' data-type='5' data-action='change' data-postid='".$_POST['postid']."'></li>
		</ul>
		</span>
		";
	}

}

if ($countreacts == "0") {
	echo "<a class='signinrequired' style='cursor:pointer'><img src='assets/custom/img/reactions/noreactions.png' style='height:16px;width:16px;margin-top:-3px'> 0</a>";
} else {
	$sql = "SELECT react_type, count(*) as react_count FROM reacts WHERE react_post = '".$_POST['postid']."' GROUP BY react_type";
	foreach ($db->query($sql) as $contentreacts) {
		echo "<img src='assets/custom/img/reactions/reactions_".$contentreacts['react_type'].".png' style='height:16px;width:16px;margin-top:-3px' title='".react_type($contentreacts['react_type'])." : ".$contentreacts['react_count']."'>";
	}

	echo " ".$countreacts;
}




$database->close();
?>
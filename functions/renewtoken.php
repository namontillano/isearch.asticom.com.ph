<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	$_SESSION["csrf_token"] = md5(rand(0,10000000));
	echo $_SESSION["csrf_token"];
} else {
	echo "false";	
}
?>
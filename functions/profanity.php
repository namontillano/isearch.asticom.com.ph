<?php
function ReplaceBadWords($comment,$wordlist){
	$badword = array();
	$replacementword = array();
	$words = explode(",", $wordlist);
	foreach ($words as $key => $word) {
		$badword[$key] = $word;
		$replacementword[$key] = addStars($word);
		$badword[$key] = "/\b{$badword[$key]}\b/i";
	}
	$comment = preg_replace($badword, $replacementword, $comment);
	return $comment;
}

function addStars($word) {
	$length = strlen($word);
	return str_repeat("*", $length);
}

?>
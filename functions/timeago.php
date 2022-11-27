<?php
function timeago($date) {
	$timestamp = strtotime($date);	
	
	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");

	$currentTime = time();
	if($currentTime >= $timestamp) {
		$diff     = time()- $timestamp;
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
		}

		$diff = round($diff);

		if ($diff == 0) {
			return "Now";
		} else {
		return $diff . " " . $strTime[$i] . "'s ago";
		}
	}
}


function lateststatus($date) {
	if ($date == 1) {
		return "pinnedpost";
	}
}

function latestbadge($date) {
	if ($date == 1) {
		return "<div class='latest-badge'><b>Latest</b></div>";
	}
}


function thousandsCurrencyFormat($num) {
  if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

  }

  return $num;
}

?>

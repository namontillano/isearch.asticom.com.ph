<?php
require '../core/dbcon.php';
if(isset($_REQUEST['keyword']))
{	

	echo "<div style='padding: 10px 0px; width:100%'>";
	$search = $_REQUEST['keyword'];

	$database = new Connection();
	$db = $database->open();

	try{    
		$sql = 'SELECT * FROM posts where (post_title like "%'.$search.'%" OR post_content like "%'.$search.'%") AND display_status="1" AND deleted_status = "0" limit 5';
		foreach ($db->query($sql) as $row) {
			echo '<a href=post.php?view=' . $row['id'] . '>' . $row['post_title'] . "</a>\n";	
		}
	}
	catch(PDOException $e){
		$e->getMessage();
	}
	

	try{    
		$sql = 'SELECT * FROM pages where (title like "%'.$search.'%" OR content like "%'.$search.'%") limit 5';
		foreach ($db->query($sql) as $row) {
			echo '<a href=' . $row['url'] . '>' . $row['title'] . "</a>\n";	
		}
		if(empty($row))
		{
			echo "<div class='noresult'>No Results Found</div>";
		}
	}
	catch(PDOException $e){
		$e->getMessage();
	}

	$database->close();

	echo "<a href='search.php?keyword=".$search."' style='color: #4e1c98;'><b><i class='bi bi-search'></i></b> Search for <b>".$search."</b></a>\n";
	echo "</div>";




}
?>

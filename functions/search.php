<?php
require '../core/dbcon.php';
if(isset($_REQUEST['keyword']))
{	

	echo "<div style='padding: 10px 0px; width:100%'>";
	$search = $_REQUEST['keyword'];

	$database = new Connection();
	$db = $database->open();

	try{    
		$sql = 'SELECT posts.id as id , posts.post_type as post_type , posts.post_category as post_category , posts.post_embed as post_embed , posts.post_thumb as post_thumb , posts.post_title as post_title , posts.post_content as post_content , posts.post_postedby as post_postedby , posts.post_postedon as post_postedon , posts.post_pin as post_pin , posts.post_views as post_views , posts.display_status as display_status , posts.deleted_status as deleted_status ,  accounts.google_first_name,  accounts.google_last_name, accounts.google_image FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE (posts.post_title like "%'.$search.'%" OR posts.post_content like "%'.$search.'%" OR accounts.google_first_name like "%'.$search.'%" OR accounts.google_last_name like "%'.$search.'%") AND posts.display_status="1" AND posts.deleted_status = "0"';
		foreach ($db->query($sql) as $row) {
			if ($row['post_type'] == "Community") {
				echo '<a href=post.php?view='.$row['id'].'>'.substr_replace(strip_tags($row['post_content']), "...", 35)."</a>\n";	 
			} else {
				echo '<a href=post.php?view='.$row['id'].'>'.$row['post_title']."</a>\n";	
			}
		}
	}
	catch(PDOException $e){
		$e->getMessage();
	}
	

	try{    
		$sql = 'SELECT * FROM pages where (title like "%'.$search.'%" OR content like "%'.$search.'%") limit 5';
		foreach ($db->query($sql) as $row) {
			echo '<a href='.$row['url'].'>'.$row['title']."</a>\n";	
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

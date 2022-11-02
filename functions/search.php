
<?php
require '../core/dbcon.php';
if(isset($_REQUEST['keyword']))
{
	echo "<div style='padding: 10px 0px; width:100%'>";
	$search = $_REQUEST['keyword'];
	$database = new Connection();
	$db = $database->open();
	try{    
		$sql = 'SELECT * FROM pages where (title like "%'.$search.'%" OR content like "%'.$search.'%")';
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
		echo "</div>";
	}
?>
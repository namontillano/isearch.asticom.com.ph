<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

$database = new Connection();
$db = $database->open();

$sql = $db->query('SELECT * FROM photos WHERE post_id = "'.$_POST['postid'].'"');
$countgallery = $sql->rowCount();

if ($countgallery != '0') {

	echo "<div class='row mt-10 justify-content-center'>";
	$sql = 'SELECT * FROM photos WHERE post_id = "'.$_POST['postid'].'"';
	foreach ($db->query($sql) as $row) {
		?>
		<div class="col-md-2">
			<a href="uploads/photos/<?php echo $row['photo']?>" data-fancybox="gallery" title="<?php echo $row['title']?>">
				<img style="height:100px; width:100px; border-radius:5px" src="uploads/photos/<?php echo $row['photo']?>">
				<span class="overlay"></span>
			</a>
		</div>
		<?php 
	}
	echo "</div>";
}
$database->close();
?>

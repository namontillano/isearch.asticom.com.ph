<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

$database = new Connection();
$db = $database->open();

$sql = $db->query('SELECT * FROM views WHERE post_id = "'.$_POST['postid'].'"');
$viewcount = $sql->rowCount();

if ($viewcount != '0') {

	
	$sql = 'SELECT views.post_id, views.google_id, views.date_created, accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM views INNER JOIN accounts ON views.google_id = accounts.google_id WHERE views.post_id = "'.$_POST['postid'].'" ORDER BY views.date_created DESC';
	foreach ($db->query($sql) as $row) {
		?>
		<div class="d-flex mb-3">
			<div class="icon-25 rounded-circle img-cover overflow-hidden me-3 flex-shrink-0">
				<img src="<?php echo $row['google_image']?>" alt="">
			</div>
			<h6 style="line-height: 1;">
				<span class="fw-bold fs-14px" style="padding-top: 5px;"><?php echo htmlentities($row['google_first_name'], ENT_QUOTES, 'UTF-8')." ".htmlentities($row['google_last_name'], ENT_QUOTES, 'UTF-8')?></span>

			</h6>
		</div>
		
		<?php 
	}
	
} else {
	?>
	<div class="row">

                                <div class="col-md-12">
                                    <div class='text-center'>
                                        <h5 class='text-muted mb-0'>No Viewers Found</h5>
                                        <p class='text-muted mb-0'>We did not find any viewers for this post.</p>
                                    </div>
                                </div>

                            </div>
	<?php
}
$database->close();
?>

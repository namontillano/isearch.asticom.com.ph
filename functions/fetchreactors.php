<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");

$database = new Connection();
$db = $database->open();

$sql = $db->query('SELECT * FROM reacts WHERE react_post = "'.$_POST['postid'].'"');
$viewcount = $sql->rowCount();

if ($viewcount != '0') {

	
	$sql = 'SELECT reacts.react_post, reacts.react_user_id, reacts.react_date,reacts.react_type, accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM reacts INNER JOIN accounts ON reacts.react_user_id = accounts.google_id WHERE reacts.react_post = "'.$_POST['postid'].'" ORDER BY reacts.react_type ASC';
	foreach ($db->query($sql) as $row) {
		?>
		<div class="d-flex mb-3">
			<div>
				<?php echo "<img src='assets/custom/img/reactions/reactions_".$row['react_type'].".png' style='height:25px;width:25px;margin-right:10px'>";?>
			</div>
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
                                        <h5 class='text-muted mb-0'>No Reactors Found</h5>
                                        <p class='text-muted mb-0'>We did not find any reactors for this post.</p>
                                    </div>
                                </div>

                            </div>
	<?php
}
$database->close();
?>

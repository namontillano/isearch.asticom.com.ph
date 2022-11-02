<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");
include_once("../functions/timeago.php");

$database = new Connection();
$db = $database->open();

try{

	$commentrowperpage = 5;

	$sql = $db->query('SELECT comments.comment_post_id,comments.id,comments.comment_user_id, comments.comment_message, comments.comment_date_posted,  accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM comments INNER JOIN accounts ON comments.comment_user_id = accounts.google_id WHERE comments.comment_post_id = "'.$_POST['postid'].'" ORDER BY comments.comment_date_posted DESC');
	$commentallcount = $sql->rowCount();

	$sql = 'SELECT comments.comment_post_id,comments.id,comments.comment_user_id, comments.comment_message, comments.comment_date_posted,  accounts.google_first_name, accounts.google_last_name, accounts.google_image FROM comments INNER JOIN accounts ON comments.comment_user_id = accounts.google_id WHERE comments.comment_post_id = "'.$_POST['postid'].'" ORDER BY comments.comment_date_posted DESC LIMIT 0,'.$commentrowperpage;
	foreach ($db->query($sql) as $row) {
		?>
		<div class="comment-replay-cont commentlist pb-20 pt-20 border-top border-1 brd-gray">

			<?php
			if (isset($_SESSION['google_id'])) {
				if ($_SESSION['google_id'] == $row['comment_user_id']) {
					?>
					<div class="dropdown" style="float: right;position: relative;right: 5px;">
						<a class="" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-gear"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<li><a class="dropdown-item editcomment" id="editcomment" data-editpostid="<?php echo $row['comment_post_id'] ?>" data-editcommentid="<?php echo $row['id'] ?>" data-editmessage="<?php echo strip_tags($row['comment_message']);?>">Edit</a></li>
							<li><a class="dropdown-item deletecomment" id="deletecomment" data-bs-toggle="modal" data-bs-target="#Modaldeletecomments" data-deletepostid="<?php echo $row['comment_post_id'] ?>" data-deletecommentid="<?php echo $row['id'] ?>">Delete</a></li>
						</ul>
					</div>
					<?php
				}
			}
			?>

			<div class="d-flex comment-cont">
				<div class="inf" style="width:100%">
					<div class="title d-flex">
						<div class="icon-35 rounded-circle img-cover overflow-hidden me-3 flex-shrink-0">
							<img src="<?php echo $row['google_image']?>" alt="">
						</div>
						<h6 style="line-height: 1;">
							<span class="fw-bold fs-14px"><?php echo htmlentities($row['google_first_name'], ENT_QUOTES, 'UTF-8')." ".htmlentities($row['google_last_name'], ENT_QUOTES, 'UTF-8')?></span>
							<br>
							<small><span class="time fs-12px text-muted"><?php echo timeago($row['comment_date_posted']); ?></span></small>
						</h6>
					</div>
					<div class="mt-10" style="line-height: 1.5;">
						<div id="commentcontainer<?php echo $row['id'] ?>">
							<?php echo nl2br(htmlentities($row['comment_message'], ENT_QUOTES, 'UTF-8'));?>
						</div>
					</div>
				</div>
			</div>
		</div>



		<?php 
	}
	?>
	
	<?php
	if(empty($row)){
		?>
		<div class="comment-replay-cont pb-50 pt-50 border-top border-1 brd-gray">
			<div class='text-center'>
				<h5 class='text-muted mb-0'>No Comments Found</h5>
				<p class='text-muted mb-0'>We did not find any comments for you.</p>
			</div>
		</div>
		<?php
	} else {
		?>
		<!-- asd -->
		<?php
	}
}
catch(PDOException $e){
	?>
	<div class="comment-replay-cont pb-50 pt-50 border-top border-1 brd-gray">
		<div class='text-center'>
			<p class='text-muted mb-0'>There is some problem in connection: <?=$e->getMessage()?></p>
		</div>
	</div>

	<?php
}

$database->close();
?>


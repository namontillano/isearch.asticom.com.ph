<?php
include_once("xmlhttprequest.php");
include_once("../core/dbcon.php");
include_once("../functions/timeago.php");



$database = new Connection();
$db = $database->open();

$sql = $db->query('SELECT * FROM posts WHERE post_type="Community" AND display_status="1" AND deleted_status = "0"');
$postallcount = $sql->rowCount();

$postrowperpage = 5;



try{
	$sql = 'SELECT posts.id as id , posts.post_type as post_type , posts.post_category as post_category , posts.post_embed as post_embed , posts.post_thumb as post_thumb , posts.post_title as post_title , posts.post_content as post_content , posts.post_postedby as post_postedby , posts.post_postedon as post_postedon , posts.post_pin as post_pin , posts.post_views as post_views , posts.display_status as display_status , posts.deleted_status as deleted_status ,  accounts.google_first_name,  accounts.google_last_name, accounts.google_image FROM posts INNER JOIN accounts ON posts.post_postedby = accounts.google_id WHERE posts.post_type="Community" AND posts.display_status="1" AND posts.deleted_status = "0" ORDER BY posts.id desc limit 0,'.$postrowperpage;
	foreach ($db->query($sql) as $row) {

		if ($row['post_embed'] == '0') {
			$posttype = "img";
			$postthumb = "uploads/default-thumbnail.jpg";
			$postsrc = "uploads/default-thumbnail.jpg";
		} else {
			$ext = array("gif", "jpeg", "png", "jpg");
			if (in_array(pathinfo($row['post_embed'], PATHINFO_EXTENSION), $ext)) {
				$posttype = "img";
				$postthumb = "uploads/posts/".$row['post_embed'];  
				$postsrc = "uploads/posts/".$row['post_embed'];                                                                           
			} else {
				$posttype = "iframe";
				$postsrc = $row['post_embed'];

				if ($row['post_thumb'] == "0") {
					$postthumb = "uploads/default-thumbnail.jpg";
				} else {
					$postthumb = "uploads/posts/".$row['post_thumb'];
				}

			}
		}

		?>                
		<?php
		$dateinwords = new DateTime($row['post_postedon']);
		?>
		<div class="col-lg-12 postlist view-post-details" data-postid="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8') ?>" data-posttitle="<?php echo htmlentities($row['post_title'], ENT_QUOTES, 'UTF-8'); ?>" data-posttype="<?php echo $posttype?>" data-postsrc="<?php echo $postsrc?>" data-postannounce="<?php echo htmlentities($row['post_type'], ENT_QUOTES, 'UTF-8'); ?>" data-postcontent="<?php echo htmlentities($row['post_content'], ENT_QUOTES, 'UTF-8'); ?>" data-postpostedby="<?php echo htmlentities($row['post_postedby'], ENT_QUOTES, 'UTF-8'); ?>" data-postpostedon="<?php echo strtoupper(date_format($dateinwords, "F d, Y"));?>" data-postviews="<?php echo htmlentities($row['post_views'], ENT_QUOTES, 'UTF-8'); ?>" data-googlepic="<?php echo htmlentities($row['google_image'], ENT_QUOTES, 'UTF-8'); ?>"  data-firstname="<?php echo htmlentities($row['google_first_name'], ENT_QUOTES, 'UTF-8'); ?>"  data-lastname="<?php echo htmlentities($row['google_last_name'], ENT_QUOTES, 'UTF-8'); ?>" data-postembed="<?php echo htmlentities($row['post_embed'], ENT_QUOTES, 'UTF-8'); ?>">
			<div class="portfolio-card mb-50">

				<div class="info">
					<div class="d-flex align-items-center justify-content-between op-9">
						<div class="d-flex">
							<img class="icon-25 rounded-circle d-inline-flex" style="margin-right:10px" src="<?php echo $row['google_image']; ?>">
							<h6 class="fw-bold" style="color: #000;"><?php echo $row['google_first_name']; ?> <?php echo $row['google_last_name']; ?></h6>
						</div>
						<div class="d-flex">
							<small><span class="text-muted"><i class="bi bi-calendar me-1"></i> <?php echo strtoupper(date_format($dateinwords, "F d, Y"));?></span></small>
						</div>

					</div>
					<div class="text mt-3 mb-0">
						<?php
						if ($row['post_content'] != "0") {
							echo "<p>".$row['post_content']."</p>";
						}
						?>
					</div>

				</div>

				<?php
				if ($row['post_embed'] != '0') {
					echo "<div class='img ratio ratio-4x3'>";
					if ($posttype == "img") {
						echo "<img src='".$postthumb."' style='object-fit: cover;object-position: center;'>";
					} else {
						echo "<img src='".$postthumb."' style='object-fit: cover;object-position: center;'>";
					}
					echo "</div>";
				}
				?>
				<?php

				if ($row['post_embed'] == "0") {
					$reactdisplay = "border-top border-1 brd-gray";
				} else {
					$reactdisplay = "";
				}

				?>
				<div class="d-flex align-items-center justify-content-between pt-10 <?php echo $reactdisplay;?>" style="margin-left: 20px;margin-right: 20px;margin-bottom: 20px;">

					<?php
					$stmt = $db->query("SELECT * FROM comments WHERE comment_post_id = '".$row['id']."'");
					$post_comments = $stmt->rowCount();

					$stmt = $db->query("SELECT * FROM reacts WHERE react_post = '".$row['id']."'");
					$post_reacts = $stmt->rowCount();

					 $stmt = $db->query("SELECT * FROM views WHERE post_id = '".$row['id']."'");
					$post_views = $stmt->rowCount();

					?>
					<a class='view-reactors-list'  data-bs-toggle='modal' data-bs-target='#modalreactors' data-postid='<?php echo $row['id']?>' style='cursor:pointer'>
					<div>
						<?php
						$sql = "SELECT react_type FROM reacts WHERE react_post = '".$row['id']."' GROUP BY react_type";
						foreach ($db->query($sql) as $reacts) {
							echo "<img src='assets/custom/img/reactions/reactions_".$reacts['react_type'].".png' style='height:16px;width:16px;margin-top:-3px'>";
						}
						if ($post_reacts != "0") {
							echo " ".$post_reacts;
						} else {
							echo "<img src='assets/custom/img/reactions/noreactions.png' style='height:16px;width:16px;margin-top:-3px'> 0";
						}
						?>
					</div>
				</a>
					<div>
						<i class="bi bi-chat-left-text ms-4 me-1"></i> <?php echo $post_comments; ?>
					</div>
					<a class='view-viewers-list'  data-bs-toggle='modal' data-bs-target='#modalviewers' data-postid='<?php echo $row['id']?>' style='cursor:pointer'>
					<div>
						<i class="bi bi-eye ms-4 me-1"></i> <?php echo $post_views; ?>
					</div>
					</a>
				</div>


			</div>
		</div>

		<?php 
	}
}
catch(PDOException $e){
	$e->getMessage();
}


$database->close();
?>

<?php 
if ($postallcount != "0") {
?>
<center><button class="load-more btn rounded-pill hover-blue4 fw-bold mt-50 px-5 border-blue4 load-more">View more posts</button></center>
<input type="hidden" id="postrow" value="0">
<input type="hidden" id="postall" value="<?php echo $postallcount; ?>">
<?php
} else {
?>
<div class='text-center'>
				<h5 class='text-muted mb-0'>No Post Found</h5>
				<p class='text-muted mb-0'>We did not find any post for you.</p>
			</div>
<?php
}
?>




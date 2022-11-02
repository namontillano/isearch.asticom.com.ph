<?php
$pagetitle = "Dropdown Link 1";
$pageuserlevel=array("1","2","3","4","5");
require '../core/dbcon.php';
require "../functions/session.php";
require ("../functions/userlevel.php");
?>

<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="">
	<meta name="description" content="">
	<link rel="shortcut icon" href="images/favicon.png">
	<title><?=APP_NAME." | ".$pagetitle;?></title>
	<link rel="stylesheet" href="assets/css/dashlite.css">
	<link id="skin-default" rel="stylesheet" href="assets/css/theme.css">
</head>

<body class="nk-body npc-default has-sidebar ">
	<div class="nk-app-root">
		<div class="nk-main ">
			<div class="nk-wrap ">
				<?php include "includes/menu-header-sidebar.php"; ?>
				
				<div class="nk-content ">
					<div class="container-fluid">
						<div class="nk-content-inner">
							<div class="nk-content-body">
								<div class="nk-block-head nk-block-head-sm">
									<div class="nk-block-between">
										<div class="nk-block-head-content">
											<h3 class="nk-block-title page-title">Under Development</h3>
											<div class="nk-block-des text-soft">
												<p>Sorry! This page is under development.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="nk-block">
									<!-- Content Here -->

									<!-- Content Here -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/bundle.js"></script>
	<script src="assets/js/scripts.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/js/custom.js"></script>
	
</body>
</html>
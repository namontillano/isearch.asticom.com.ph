<div class="nk-header nk-header-fixed is-light">
	<div class="container-fluid">
		<div class="nk-header-wrap">
			<div class="nk-menu-trigger d-xl-none ms-n1">
				<a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
					<em class="icon ni ni-menu"></em>
				</a>
			</div>
			<div class="nk-header-app-name">
				<img class="logo-dark logo-img" src="../assets/custom/img/asticom-group-of-companies.png" alt="logo">
			</div>

			<div class="nk-header-tools">
				<ul class="nk-quick-nav">
					<li class="dropdown user-dropdown">
						<a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
							<div class="user-toggle">
								<div class="user-avatar sm">
									<em class="icon ni ni-user-alt"></em>
								</div>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
							<div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
								<div class="user-card">
									<div class="user-avatar">
										<img src="<?php echo $_SESSION['google_image'] ?>">
									</div>
									<div class="user-info">
										<span class="lead-text"><?php echo $_SESSION['google_first_name'] ?> <?php echo $_SESSION['google_last_name'] ?></span>
										<span class="sub-text"><?php echo $_SESSION['google_email_address'] ?></span>
									</div>
								</div>
							</div>
							<div class="dropdown-inner">
								<ul class="link-list">
									<li><a href="../index.php"><em class="icon ni ni-search"></em><span>i-Search</span></a></li>
									<li><a href="../logout.php"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="nk-sidebar" data-content="sidebarMenu">
	<div class="nk-sidebar-inner" data-simplebar>
		<ul class="nk-menu nk-menu-md">
			<li class="nk-menu-heading">
				<h6 class="overline-title text-primary-alt">Navigations</h6>
			</li>
			<li class="nk-menu-item">
				<a href="news-and-announcement.php" class="nk-menu-link">
					<span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
					<span class="nk-menu-text">News & Announcements</span>
				</a>
			</li>
			<li class="nk-menu-item has-sub">
				<a href="#" class="nk-menu-link nk-menu-toggle">
					<span class="nk-menu-icon"><em class="icon ni ni-alarm-alt"></em></span>
					<span class="nk-menu-text">Link Dropdown</span>
				</a>
				<ul class="nk-menu-sub">
					<li class="nk-menu-item">
						<a href="dropdown-link-1.php" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Dropdown Link 1</span></a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
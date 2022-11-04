<div class="nk-header nk-header-fixed is-light" style="background-image: url('../assets/img/top_nav_s4.png'); background-size: cover; background-position: top; color: white;">
	<div class="container-fluid" >
		<div class="nk-header-wrap" >
			<div class="nk-menu-trigger d-xl-none ms-n1">
				<a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
					<em class="icon ni ni-menu"></em>
				</a>
			</div>
			<div class="nk-header-app-name">
				<img class="logo-dark logo-img" src="../assets/custom/img/asticom-white.png" alt="logo" style="max-height: 60px;">
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
				<h6 class="overline-title text-primary-alt">i-Search Navigations</h6>
			</li>
			<li class="nk-menu-item">
				<a href="news-and-announcement.php" class="nk-menu-link">
					<span class="nk-menu-icon"><em class="icon ni ni-bell"></em></span>
					<span class="nk-menu-text">News & Announcements</span>
				</a>
			</li>

			<li class="nk-menu-item">
				<a href="profanity-list.php" class="nk-menu-link">
					<span class="nk-menu-icon"><em class="icon ni ni-na"></em></span>
					<span class="nk-menu-text">Profanity List</span>
				</a>
			</li> 
			<li class="nk-menu-item">
				<a href="user-management.php" class="nk-menu-link">
					<span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
					<span class="nk-menu-text">User Management</span>
				</a>
			</li> 
			<?php if (array_intersect(array(99), preg_split ("/\,/", trim($_SESSION['user_level'])))){ ?>
				<li class="nk-menu-heading">
					<h6 class="overline-title text-primary-alt">AstiGo Navigations</h6>
				</li>


					<li class="nk-menu-item">
						<a href="management-account.php" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
							<span class="nk-menu-text">Management Account</span>
						</a>
					</li>

					<li class="nk-menu-item">
						<a href="contact-tracer-account.php" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-contact"></em></span>
							<span class="nk-menu-text">Contact Tracer Account</span>
						</a>
					</li>

					<li class="nk-menu-item">
						<a href="calltree.php" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-call"></em></span>
							<span class="nk-menu-text">Call Tree</span>
						</a>
					</li>

					<li class="nk-menu-item">
						<a href="quotes.php" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
							<span class="nk-menu-text">List of Quotes</span>
						</a>
					</li>

					<li class="nk-menu-item">
						<a href="dailytips.php" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span>
							<span class="nk-menu-text">Daily Tips</span>
						</a>
					</li>







				<?php } ?>
			</ul>
		</div>
</div>

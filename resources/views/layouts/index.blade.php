<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard | Fuse - Admin &amp; Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
	<meta content="BullTheme" name="author">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="{{ url(mix('assets/css/app.min.css')) }}">
</head>

<body data-sidebar="dark">
	<div id="layout-wrapper">
		<header id="page-topbar">
			<div class="navbar-header">
				<div class="d-flex">
					<!-- LOGO -->
					<div class="navbar-brand-box text-center">
						<a href="index.html" class="logo logo-dark">
							<span class="logo-sm">
								<img src="images/logo-sm.png" alt="logo-sm-dark" height="22">
							</span>
							<span class="logo-lg">
								<img src="images/logo-dark.png" alt="logo-dark" height="24">
							</span>
						</a>

						<a href="index.html" class="logo logo-light">
							<span class="logo-sm">
								<img src="images/logo-sm.png" alt="logo" height="22">
							</span>
							<span class="logo-lg">
								<img src="images/logo-light.png" alt="logo" height="24">
							</span>
						</a>
					</div>

					<button type="button" class="btn btn-sm px-3 font-size-24 header-item" id="vertical-menu-btn">
						<i class='bx bx-menu align-middle'></i>
					</button>

					<!-- App Search-->
					<form class="app-search d-none d-lg-block">
						<div class="position-relative">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="ri-search-line"></span>
						</div>
					</form>
				</div>

				<div class="d-flex">

					<div class="dropdown d-inline-block d-lg-none ms-2">
						<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ri-search-line"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

							<form class="p-3">
								<div class="mb-3 m-0">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search ...">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="dropdown d-none d-sm-inline-block">
						<button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="" src="images/us.jpg" alt="Header Language" height="16">
						</button>
						<div class="dropdown-menu dropdown-menu-end">

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<img src="images/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<img src="images/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<img src="images/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<img src="images/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
							</a>
						</div>
					</div>

					<div class="dropdown d-none d-lg-inline-block ms-1">
						<button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ri-apps-2-line"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<div class="px-lg-2">
								<div class="row g-0">
									<div class="col">
										<a class="dropdown-icon-item" href="#">
											<img src="images/github.png" alt="Github">
											<span>GitHub</span>
										</a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#">
											<img src="images/bitbucket.png" alt="bitbucket">
											<span>Bitbucket</span>
										</a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#">
											<img src="images/dribbble.png" alt="dribbble">
											<span>Dribbble</span>
										</a>
									</div>
								</div>

								<div class="row g-0">
									<div class="col">
										<a class="dropdown-icon-item" href="#">
											<img src="images/dropbox.png" alt="dropbox">
											<span>Dropbox</span>
										</a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#">
											<img src="images/mail_chimp.png" alt="mail_chimp">
											<span>Mail Chimp</span>
										</a>
									</div>
									<div class="col">
										<a class="dropdown-icon-item" href="#">
											<img src="images/slack.png" alt="slack">
											<span>Slack</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="dropdown d-none d-lg-inline-block ms-1">
						<button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
							<i class="ri-fullscreen-line"></i>
						</button>
					</div>

					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="ri-notification-3-line"></i>
							<span class="noti-dot"></span>
						</button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
							<div class="p-3">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="m-0"> Notifications </h6>
									</div>
									<div class="col-auto">
										<a href="#!" class="small"> View All</a>
									</div>
								</div>
							</div>
							<div data-simplebar="" style="max-height: 230px;">
								<a href="" class="text-reset notification-item">
									<div class="d-flex">
										<div class="flex-shrink-0 me-3">
											<div class="avatar-xs">
												<span class="avatar-title bg-primary rounded-circle font-size-16">
													<i class="ri-shopping-cart-line"></i>
												</span>
											</div>
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-1">Your order is placed</h6>
											<div class="font-size-12 text-muted">
												<p class="mb-1">If several languages coalesce the grammar</p>
												<p class="mb-0"><i class="bx bx-clock-outline"></i> 3 min ago</p>
											</div>
										</div>
									</div>
								</a>
								<a href="" class="text-reset notification-item">
									<div class="d-flex">
										<div class="flex-shrink-0 me-3">
											<img src="images/avatar-3.jpg" class="rounded-circle avatar-xs" alt="user-pic">
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-1">James Lemire</h6>
											<div class="font-size-12 text-muted">
												<p class="mb-1">It will seem like simplified English.</p>
												<p class="mb-0"><i class="bx bx-clock-outline"></i> 1 hours ago</p>
											</div>
										</div>
									</div>
								</a>
								<a href="" class="text-reset notification-item">
									<div class="d-flex">
										<div class="flex-shrink-0 me-3">
											<div class="avatar-xs">
												<span class="avatar-title bg-success rounded-circle font-size-16">
													<i class="ri-checkbox-circle-line"></i>
												</span>
											</div>
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-1">Your item is shipped</h6>
											<div class="font-size-12 text-muted">
												<p class="mb-1">If several languages coalesce the grammar</p>
												<p class="mb-0"><i class="bx bx-clock-outline"></i> 3 min ago</p>
											</div>
										</div>
									</div>
								</a>

								<a href="" class="text-reset notification-item">
									<div class="d-flex">
										<div class="flex-shrink-0 me-3">
											<img src="images/avatar-4.jpg" class="rounded-circle avatar-xs" alt="user-pic">
										</div>
										<div class="flex-grow-1">
											<h6 class="mb-1">Salena Layfield</h6>
											<div class="font-size-12 text-muted">
												<p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
												<p class="mb-0"><i class="bx bx-clock-outline"></i> 1 hours ago</p>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="p-2 border-top">
								<div class="d-grid">
									<a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
										<i class="bx bx-arrow-right-circle me-1"></i> View More..
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="dropdown d-inline-block user-dropdown">
						<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="rounded-circle header-profile-user" src="images/avatar-2.jpg" alt="Header Avatar">
							<span class="d-none d-xl-inline-block ms-1">Kevin</span>
							<i class="bx bx-chevron-down d-none d-xl-inline-block"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
							<a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
							<a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
							<a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
						</div>
					</div>

					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
							<i class="bx bx-cog"></i>
						</button>
					</div>

				</div>
			</div>
		</header>

		@include('layouts.sidebar')

		<div class="main-content">
			<div class="page-content">
				@yield('content')
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<script>
								document.write(new Date().getFullYear())
							</script>2024 © Fuse.
						</div>
						<div class="col-sm-6">
							<div class="text-sm-end d-none d-sm-block">
								Crafted with <i class="bx bx-heart text-danger"></i> by BullTheme
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>

	</div>
	<!-- END layout-wrapper -->

	<!-- Right Sidebar -->
	<div class="right-bar">
		<div data-simplebar="" class="h-100">
			<div class="rightbar-title d-flex align-items-center px-3 py-4">

				<h5 class="m-0 me-2">Settings</h5>

				<a href="javascript:void(0);" class="right-bar-toggle ms-auto">
					<i class="bx bx-close noti-icon"></i>
				</a>
			</div>

			<!-- Settings -->
			<hr class="mt-0">
			<h6 class="text-center mb-0">Choose Layouts</h6>

			<div class="p-4">
				<div class="mb-2">
					<img src="images/layout-1.png" class="img-thumbnail" alt="layout-1">
				</div>

				<div class="form-check form-switch mb-3">
					<input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked="">
					<label class="form-check-label" for="light-mode-switch">Light Mode</label>
				</div>

				<div class="mb-2">
					<img src="images/layout-2.png" class="img-thumbnail" alt="layout-2">
				</div>
				<div class="form-check form-switch mb-3">
					<input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsstyle="css/bootstrap-dark.min.css" data-appstyle="css/app-dark.min.css">
					<label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
				</div>

				<div class="mb-2">
					<img src="images/layout-3.png" class="img-thumbnail" alt="layout-3">
				</div>
				<div class="form-check form-switch mb-5">
					<input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appstyle="css/app-rtl.min.css">
					<label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
				</div>


			</div>

		</div> <!-- end slimscroll-menu-->
	</div>
	<div class="rightbar-overlay"></div>
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/simplebar.min.js') }}"></script> -->
	<script src="{{ asset('assets/js/waves.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.vmap.usa.js') }}"></script> -->
	<script src="{{ asset('assets/js/main.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages.min.js') }}"></script>
	@yield('script')



</body>

</html>
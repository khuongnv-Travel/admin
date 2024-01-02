<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlstream.com/preview/front-dashboard-v2.1.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:10:38 GMT -->

<head>
	<!-- Required Meta Tags Always Come First -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title -->
	<title>Dashboard | Front - Admin &amp; Dashboard Template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/vendor.min.css') }}">

	<!-- CSS Front Template -->
	<link rel="preload" href="{{ URL::asset('assets/css/theme.min.css') }}" data-hs-appearance="default" as="style">

	<style data-hs-appearance-onload-styles>
		* {
			transition: unset !important;
		}

	</style>

	<!-- ONLY DEV -->

	<!-- END ONLY DEV -->

	<script>
		window.hs_config = {
			"themeAppearance": {
				"layoutSkin": "default",
				"sidebarSkin": "default",
			},
		}
	</script>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

	<script src="{{ URL::asset('assets/js/hs.theme-appearance.js') }}"></script>
	<script src="{{ URL::asset('assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}"></script>
	@include('layouts.header')
	@include('layouts.sidebar')
	<main id="content" role="main" class="main">
		@yield('content')
		@include('layouts.footer')
	</main>
	<script src="{{ URL::asset('assets/js/vendor.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/theme.min.js') }}"></script>
	<script>
		(function() {
			window.onload = function() {
				new HSSideNav('.js-navbar-vertical-aside').init()
				// const HSFormSearchInstance = new HSFormSearch('.js-form-search')
			}
		})()
	</script>

	<!-- Style Switcher JS -->


	<!-- End Style Switcher JS -->
</body>

<!-- Mirrored from htmlstream.com/preview/front-dashboard-v2.1.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:10:38 GMT -->

</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard | Travel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
	<meta content="BullTheme" name="author">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="{{ url(mix('assets/css/app.min.css')) }}">
</head>

<body data-sidebar="dark">
	<div class="main_loadding"></div>
	<div id="layout-wrapper">
		@include('layouts.header')
		@include('layouts.sidebar')
		<div class="main-content">
			<div class="page-content">
				@yield('content')
			</div>
			@include('layouts.footer')
		</div>
	</div>
	<script src="{{ asset('assets/js/app.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages.min.js') }}"></script>
	@yield('script')
</body>

</html>
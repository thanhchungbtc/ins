<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin panel</title>
	@include('admins/shared/partials/_head')
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/libs.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		@include('admins.shared.partials._top_navigation')
		<!-- Left side column. contains the logo and sidebar -->
		@include('admins.shared.partials._sidebar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				@yield('content-header')
				@include('admins.shared.breadcrum')
			</section>

			<!-- Main content -->
			<section class="content">
				@yield('content')
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
	</div>
	<!-- ./wrapper -->

	@include('admins.shared.partials._scripts')

	@include('admins.shared.flash')

	@yield('scripts.footer')
</body>
</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title', 'Zp Grand Hotels')</title>

	<!-- App favicon -->
	<link rel="shortcut icon" href="{{ url('assets/img/logo/favicon.png')}}">

	<!-- Icon CSS -->
	<link href="{{ url('backend/assets/css/vendor/materialdesignicons.min.css')}}" rel="stylesheet">
	<link href="{{ url('backend/assets/css/vendor/remixicon.css')}}" rel="stylesheet">

	<!-- Vendor -->
	<link href='{{ url('backend/assets/css/vendor/datatables.bootstrap5.min.css')}}' rel='stylesheet'>
	<link href='{{ url('backend/assets/css/vendor/responsive.datatables.min.css')}}' rel='stylesheet'>
	<link href='{{ url('backend/assets/css/vendor/daterangepicker.css')}}' rel='stylesheet'>
	<link href="{{ url('backend/assets/css/vendor/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ url('backend/assets/css/vendor/apexcharts.css')}}" rel="stylesheet">
	<link href="{{ url('backend/assets/css/vendor/simplebar.css')}}" rel="stylesheet">
	<link href="{{ url('backend/assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">

	<!-- Main CSS -->
	<link id="mainCss" href="{{ url('backend/assets/css/style.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
	 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

</head>



<body data-lh-mode="light">


	@include('backend.components.top-bar')
	@include('backend.components.sidebar')
	@yield('content')
	@include('backend.components.copyright')

	<!-- Vendor Custom -->
	<script src="{{ url('backend/assets/js/vendor/jquery-3.6.4.min.js')}}"></script>
	<script src="{{ url('backend/assets/js/vendor/simplebar.min.js')}}"></script>
	<script src="{{ url('backend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ url('backend/assets/js/vendor/apexcharts.min.js')}}"></script>
	<script src="{{ url('backend/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
	<script src="{{ url('backend/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
	<!-- Data Tables -->
	<script src='{{ url('backend/assets/js/vendor/jquery.datatables.min.js')}}'></script>
	<script src='{{ url('backend/assets/js/vendor/datatables.bootstrap5.min.js')}}'></script>
	<script src='{{ url('backend/assets/js/vendor/datatables.responsive.min.js')}}'></script>
	<!-- Caleddar -->
	<script src="{{ url('backend/assets/js/vendor/jquery.simple-calendar.js')}}"></script>
	<!-- Date Range Picker -->
	<script src="{{ url('backend/assets/js/vendor/moment.min.js')}}"></script>
	<script src="{{ url('backend/assets/js/vendor/daterangepicker.js')}}"></script>
	<script src="{{ url('backend/assets/js/vendor/date-range.js')}}"></script>

	<!-- Main Custom -->
	<script src="{{ url('backend/assets/js/main.js')}}"></script>
	<script src="{{ url('backend/assets/js/data/dashboard-chart-data.js')}}"></script>
	<script>
		document.querySelectorAll('.description').forEach(el => {
			el.style.wordWrap = 'break-word';
			el.style.overflowWrap = 'break-word';
			el.style.wordBreak = 'break-word';
		});
	</script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	@stack('scripts')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/anchor.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RTC NAVY</title>
	<link href="{{ asset('/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/bootstrap-select-1.12.2/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/home.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/search_position.css') }}" rel="stylesheet">

</head>
<body>
	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/bootstrap-select-1.12.2/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('/js/nav.js') }}"></script>
	<script src="{{ asset('/js/personal.js') }}"></script>
	<script src="{{ asset('/js/position.js') }}"></script>
	<script src="{{ asset('/js/search_position.js') }}"></script>
	<script src="{{ asset('/js/report.js') }}"></script>
	<script src="{{ asset('/js/import.js') }}"></script>
	<script src="{{ asset('/js/houseRegistration.js') }}"></script>
	<script src="{{ asset('/floatThead/dist/jquery.floatThead.min.js') }}"></script>
</body>
</html>

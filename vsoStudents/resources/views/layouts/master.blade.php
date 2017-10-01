<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@yield('title')
	</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	@yield('style')
</head>
<body>	

	@include('includes.menu')

	@yield('content')

</body>
</html>
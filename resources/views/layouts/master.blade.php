<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Furbook</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
    dateFormat:'yy/mm/dd'
	  });
	});
  </script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			@yield('header')
		</div>
		@if(Session::has('success'))
		<div class="alert alert-sucess">
			{{Session::get('success')}}
		</div>
		@endif
		@yield('content')
	</div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>URL Shortener by Niall Kelly</title>
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
</head>
<body>

	<div class="container">

		<h1>URL Shortener</h1>
		
		<div id="main">
			@yield('content')
		</div>

		<div id="footer">
			<p>Created with {{ HTML::link('http://laravel.com', 'Laravel 4')}} </p>
			<p>Source Code: {{ HTML::link('http://github.com/NiallMKelly', 'GitHub')}}</p>
			<p>Copyright &copy; 2013 - {{ HTML::link('http://niallkelly.im', 'Niall Kelly')}}</p>
		</div>

	</div>

</body>
</html>
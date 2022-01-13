<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<h1>Detail</h1>

	<label>Name: <?php echo $name; ?></label><br>
	<!-- view=>blade.php -->
	<!-- output for laravel -->
	<label>Position: {{$position}}</label><br>
	<!-- output for html tag => store h1 tag in database (output affect h1 tag) -->
	<label>City: {!!$city!!}</label>
</body>
</html>
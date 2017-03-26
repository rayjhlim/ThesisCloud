<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
	<meta charset="utf-8">
	<meta http-equiz="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
	
	<style>
		body {
			background-color: white;
			margin-top: 21%;
			margin-right: auto;
			margin-left: auto;
			margin-bottom: auto;
			text-align: center;
		}

		h1 {
			font-weight: bold;
			color: #6495ed;
			font-size: 25px;
			margin-bottom: 2%
		}

		h2 {
			font-weight: bold;
			color: #6495ed;
			font-size: 16px;
		}

		input[type=text] {
			font-size: 16px;
			width: 38%;
			margin-right: 20%;
			margin-left: 20%;
			margin-bottom: 3%;
			border: 3px solid #6495ed;
			font-family: serif;
		}

		input[type=submit] {
			background-color: #6495ed;
			width: 38%;
			margin-right: 38%;
			margin-left: 38%;
		}

		p {
			font-size: 16px;
			width: auto;
			margin: 0 1%;
			text-align: center;
		}
	</style>
</head>

<body>
	<h1> Welcome to ACM and IEEE word cloud generator! <br> </h1>

	{!! Form::open([]) !!}

	<div class="form">
		<p>Type in a researcher's surname </p>

		{!! Form::text('textfield', null, []) !!}
	</div>

	{!! Form::close() !!}
</body>

</html>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
	<meta charset="utf-8">
	<meta http-equiz="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
	
	<style>
		body {
			background-color: #6495ed;
			margin-top: 23%;
			margin-right: auto;
			margin-left: auto;
			margin-bottom: auto;
			text-align: center;
		}

		h1 {
			font-weight: bold;
			color: white;
			font-size: 25px;
			margin-bottom: 2%
		}

		input[type=text] {
			font-size: 14px;
			width: 38%;
			margin-bottom: 1%;
			border: 3px solid #6495ed;
		}

		input[type=submit] {
			color: black;
			background-color: white;
			font-size: 14px;
			width: 18%;
			margin-top: 0%;
			text-align: center;
		}

		.form {
			margin-right: auto;
			margin-left: auto;
			font-family: serif;
		}
	</style>

</head>

<body>
	<div id="outerlayer">
		<h1> Welcome to ACM and IEEE word cloud generator! <br> </h1>

		{!! Form::open([]) !!}

			{!! Form::text('textfield', null, ['class'=>'form', 'placeholder'=>"Type in a researcher's surname"]) !!}
			{!! Form::submit('Generate word cloud',['class'=>'form']) !!}

		{!! Form::close() !!}

	</div>x

</body>

</html>
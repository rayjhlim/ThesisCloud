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
			margin-top: 20%;
			margin-right: auto;
			margin-left: auto;
			margin-bottom: auto;
			text-align: center;
			font-family: serif;
		}

		h1 {
			font-weight: bold;
			color: white;
			font-size: 25px;
			margin-bottom: 3%
		}

		h2 {
			font-weight: bold;
			color: #6495ed;
			font-size: 16px;
		}

		h2 {
			font-weight: bold;
			color: #6495ed;
			font-size: 16px;
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
			width: 20%;
			margin-top: 0%;
			text-align: center;
		}

		.form {
			margin-right: auto;
			margin-left: auto;
		}

		.slider {
			margin-right: auto;
			margin-left: auto;
			margin-top: 1%;
			color: white;
			font-size: 16px;
		}


	</style>

</head>

<body>
	<h1> Welcome to ACM and IEEE word cloud generator! <br> </h1>

	{{ Form::open(array('route' => 'goToCloud', 'method'=>'post', 'id'=>'myArr')) }}

		{!! Form::text('search_term', null, ['id' => 'search_term', 'name'=>'search_term']) !!}
		
		{!! Form::submit('Generate word cloud', ['id'=>'submitButton', 'name'=>'submitButton']) !!}
		
		{!! Form::selectRange('numPapers', 1, 10, 5, ['id'=>'dropdown']) !!} <br>
		
		<div style="color:white"> <h4> Pick search criteria </h4> </div>		

		{{ Form::radio('toggle','Username', true) }}

		<div style="color:white"> Username </div>
		
		{{ Form::radio('toggle','Keyword') }}

		<div style="color:white"> Keyword </div>
		
	{{ Form::close() }}

		
	<script type="text/javascript">

	function showSliderValue(newValue) {
		document.getElementById("sliderValue").innerHTML = newValue;
	}

	</script>
</body>

</html>
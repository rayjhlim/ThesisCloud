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
			font-family: serif;
		}

		h1 {
			font-weight: bold;
			color: white;
			font-size: 25px;
			margin-bottom: 2%
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

		$sliderWidth: 50% !default;
		$sliderHandleDefaultColor: white !default;
		$sliderHandlerHoverColor: black !default; 
		$sliderHandlerSize: 10px !default;
		$sliderTrackColor: #d7dcdf !default;
		$sliderTrackHeight: 5px !default;
		$sliderLabelColor: white !default;
		$sliderLabelWidth: 16px !default;

		.adjustSliderInfo {
			color: white;
			font-size: 14px;
			width: 58%;
		}

		.slider {
			margin: 38px 0 0 0%;
			width: $sliderWidth;

		}

	


	</style>

</head>

<body>
	<h1> Welcome to ACM and IEEE word cloud generator! <br> </h1>

	{!! Form::open([]) !!}

		{!! Form::text('textfield', null, ['class'=>'form', 'placeholder'=>"Type in a researcher's surname"]) !!}
		{!! Form::submit('Generate word cloud',['id'=>'submitButtom', 'class'=>'form']) !!}

		<span class="adjustSliderInfo"> <br> Set how many papers to include in the word cloud <br> </span>
		
		<div class="slider">
			<input class="sliderTrack" type="range" min="0" max="50" value="10" step="1" onchange="showSliderValue(this.value)"/>
			<span class="sliderLabel"> <br> 10 </span>
		<


	{!! Form::close() !!}

	<script type="text/javascript">

		function showSliderValue(newValue) {
			document.getElementById("sliderValue").innerHTML = newValue;
		}

	</script>
</body>

</html>
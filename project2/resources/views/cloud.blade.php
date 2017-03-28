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
			margin-top: auto;
			margin-right: auto;
			margin-left: auto;
			margin-bottom: auto;
			text-align: center;
		}

		h2 {
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
			font-weight: bold;
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

		<div id="wordcloud"> 

		</div>

		<h2> The researcher's surname <br> </h2>

		<h1>
		{{$researcher_name}}
		<h1>

		<div id="wordcloud"></div>

		{!! Form::open(['method'=>'post']) !!}
			{{ $name = Form::input('artist_name', 'artist_name', null, ['class' => 'tags']) }}
			
			{!! Form::submit('Generate word cloud',['class'=>'form']) !!}

			{{ Form::selectRange('number', 10, 15) }}

			<!--<div class="slider">
				<span> <br> Set how many papers to include in the word cloud <br> </span>
				<input class="sliderTrack" type="range" min="0" max="50" value="10" step="1" onchange="showSliderValue(this.value)"/>
				<span id="sliderValue"> 10 </span>
			</div>-->

		{!! Form::close() !!}
	</div>


	<script type="text/javascript" src="{{ URL::asset('js/lib/d3/d3.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/lib/d3/d3.layout.cloud.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/d3.wordcloud.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/example/example.words.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/html2canvas.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script>

	var myString = 'Come away with me in the night Come away with me And I will write you a song Come away with me on a bus Come away where they tempt us, with their lies And I want to walk with you On a cloudy day In fields where the yellow grass grows knee-high So you try to come Come away with me and we will kiss On a mountaintop Come away with me And I will never stop loving you And I want to wake up with the rain Falling on a tin roof While I am safe there in your arms So all I ask is for you To come away with me in the night Come away with me';

	var newArray = [], wordObj;

	wordFrequency(myString);

	// function that calculates word frequency
	function wordFrequency(txt){
		txt = txt.toLowerCase();

		var wordArray = txt.split(/[ .?!,*'"]/);

		wordArray.forEach(function (word) {
			wordObj = newArray.filter(function (w){
				return w.text == word;
			});

			if (wordObj.length) {
				wordObj[0].size += 1;
			} else {
				newArray.push({text: word, size: 1});	
			}
		});

		for (i = 0; i < newArray.length; i++) {
			//console.log(newArray[i].text);
			if (newArray[i].text == 'with' || newArray[i].text == 'the' || newArray[i].text == 'is' || newArray[i].text == 'are'
				|| newArray[i].text == 'and' || newArray[i].text == 'a' || newArray[i].text == 'was' || newArray[i].text == 'were'
				|| newArray[i].text == 'in' || newArray[i].text == 'to') {
				//console.log('found filler');
				newArray.splice(i,1);
			}
		}

		console.log(newArray);
		return newArray;
	}

	d3.wordcloud()
		.size([500, 300])
		.words(newArray)
		.spiral("rectangular")
		.start();


	function showSliderValue(newValue) {
		document.getElementById("sliderValue").innerHTML = newValue;
	}
	
	</script>

</body>

</html>
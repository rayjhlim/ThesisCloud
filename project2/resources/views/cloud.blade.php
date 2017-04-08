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

		<h2> Search term: {{$author}} <br> </h2>

		<div id="wordcloud"></div>

		{{ Form::open(array('route' => 'refreshCloud', 'method'=>'post', 'id'=>'myArr')) }}

		{!! Form::text('search_term', null, ['id' => 'search_term', 'name'=>'search_term']) !!}
		{!! Form::submit('Generate word cloud', ['id'=>'submitButton', 'name'=>'submitButton']) !!}
		{!! Form::selectRange('numPapers', 1, 10) !!}

		{{ Form::close() }}
	</div>


	</div>

	<script type="text/javascript" src="{{ URL::asset('js/lib/d3/d3.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/lib/d3/d3.layout.cloud.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/d3.wordcloud.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/example/example.words.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/html2canvas.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script>

	var myString = {!! json_encode($search_data) !!};

	var author = {!! json_encode($author) !!};

	var numPapers = {!! json_encode($numPapers) !!};

	var newArray = [], wordObj;

	generateHash(myString);
	filterArray();
	generateWordCloud();

	// function that calculates word frequency
	function generateHash(txt){
		txt = txt.toLowerCase();

		var wordArray = txt.split(/[ .?!,*'"]/);

		wordArray.forEach(function (word) {
			wordObj = newArray.filter(function (w){
				return w.text == word;
			});

			if (wordObj.length) {
				wordObj[0].size += 1;
			} else {
				newArray.push({text: word, size: 1, href:'http://localhost:8000/'+ author +'/'+ numPapers + '/'+ word});	
			}
		});
		
		return newArray;
	}

	function filterArray() {
		// sort by value
		newArray.sort(function (a, b) {
		  return a.size - b.size;
		});

		for (var i = 0; i < newArray.length; i++) {
			
			// this algorithm assumes that all filler words have a frequency greater than
			if (newArray[i].size > 5) {
				newArray.splice(i, 1);
				i--;
			}
		}

		// now only return the top 100 so that the api is not slow
		newArray.splice(0, 150);
	}

	function generateWordCloud() {
		d3.wordcloud()
		.size([500, 300])
		.words(newArray)
		.spiral("rectangular")
		.start();
	}
	

	function showSliderValue(newValue) {
		document.getElementById("sliderValue").innerHTML = newValue;
	}
	
	</script>

</body>

</html>
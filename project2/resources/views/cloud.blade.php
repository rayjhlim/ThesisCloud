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

		a {
			color: blue;
			text-decoration: underline;
		}

		#myProgress {
		    width: 40%;
		    background-color: #ddd;
		    margin-left: 30%;
		    margin-top: 2%;
		    display: none;
		}

		#myBar {
		    width: 10%;
		    height: 30px;
		    background-color: #4CAF50;
		    text-align: center; 
		    line-height: 30px; 
		    color: white; 
		}


	</style>

</head>

<body>
	<div id="outerlayer">

		<div id = "screenshotTarget">
			<div id="wordcloud"></div>

			<h2> Search term: {{$author}} <br> </h2>

			<div id="wordcloud"></div>
		</div>

		<a id="download">Download as Image</a>

		{{ Form::open(array('route' => 'refreshCloud', 'method'=>'post', 'id'=>'myArr')) }}

		{!! Form::text('search_term', null, ['id' => 'search_term', 'name'=>'search_term']) !!}

		{!! Form::submit('Generate word cloud', ['id'=>'submitButton', 'name'=>'submitButton', 'onclick'=>'calculateProgress()']) !!}
		{!! Form::selectRange('numPapers', 1, 10, 5, ['id'=>'dropdown']) !!}

		{{ Form::close() }}

		



		<div style="color:white"> <h4> Pick search criteria </h4> </div>		

		{{ Form::radio('toggle','Username', true) }}

		<div style="color:white"> Username </div>
		
		{{ Form::radio('toggle','Keyword') }}

		<div style="color:white"> Keyword </div>

		{{ Form::close() }}

		<div id="myProgress">
	  		<div id="myBar">10%</div>
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

	// console.log(myString);

	var isAuthor = {!! json_encode($isAuthor) !!};	

	var author = {!! json_encode($author) !!};	

	var numPapers = {!! json_encode($numPapers) !!};

	var newArray = [], wordObj;

	generateHash(myString);
	filterArray();
	generateWordCloud();

	// function that calculates word frequency
	function generateHash(txt){
		txt = txt.toLowerCase();

		txt = txt.replace(/[^a-z0-9+]+/gi, ' ');

		var wordArray = txt.split(/[ .?!,*'"]/);

		wordArray.forEach(function (word) {
			wordObj = newArray.filter(function (w){
				return w.text == word;
			});

			if (wordObj.length) {
				wordObj[0].size += 1;
			} else {
				newArray.push({text: word, size: 1, href:'http://localhost:8000/'+ isAuthor + '/' + author +'/'+ numPapers + '/'+ word});	
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
	
	function convertToCanvas() {
		html2canvas(document.getElementById("screenshotTarget"), {
            onrendered: function(canvas) {
                // Canvas
                console.log("rendered");
                canvas.id = "cloudCanvas";
                var canvasBuffer = document.createElement('canvas');
                canvasBuffer.id = 'buffer';
                canvasBuffer.width = 10;
                canvasBuffer.height = 800;
                document.body.appendChild(canvasBuffer);
                document.body.appendChild(canvas);
	        },
            width: document.getElementById("screenshotTarget").offsetWidth,
            height: document.getElementById("screenshotTarget").offsetHeight
        });
	}
	function removeCanvas(canvasID) {
		var element = document.getElementById(canvasID);
        document.body.removeChild(element);
        var element2 = document.getElementById('buffer');
        document.body.removeChild(element2);
	}
	function downloadAsImage() {
		document.getElementById('download').href = document.getElementById('cloudCanvas').toDataURL("image/jpeg");
	    document.getElementById('download').download = 'cloud.jpeg';
	}
	setTimeout(function() {
		convertToCanvas();
		setTimeout(function() {
			downloadAsImage();
			removeCanvas('cloudCanvas');
		}, 600);
	}, 4500);

	var width = 0;

	function calculateProgress() {
	    var prog = document.getElementById("myProgress"); 
	    prog.style.display = "block";
	    var elem = document.getElementById("myBar"); 
	    width += 1;
	    elem.style.width = width + '%'; 
	    elem.innerHTML = width * 1 + '%';
	    var multiplier = Math.random() % 3 + 1;
	     
	    if (width == 60 || width == 66 || width == 80 || width == 90 || width == 95 || width == 97 || width == 99) { 
	        return setTimeout(calculateProgress, 30 * multiplier); 
	    }
	    return width >= 100 || setTimeout(calculateProgress, 5);
	}
	
	</script>

</body>

</html>
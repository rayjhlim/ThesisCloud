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

		table.sortable thead {
		    background-color:#333;
		    color:#fff;
		    font-weight: bold;
		    cursor: default;

		}

		#tableDiv {
			margin: auto;
			align-self:  center;
		}

		td {
			color:#000;
			background-color:#eee;
		}


	</style>

</head>

<body>
	<div id="outerlayer">


		<h2> List Page <br> </h2>

		
	</div>

	<script type="text/javascript" src="{{ URL::asset('js/sorttable.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/html2canvas.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<div class="tableDiv">
		<table class="sortable">
			<thead>
			  	<tr>
			  		<th>Title</th>
			  		<th>Authors</th>
			  		<th>Conference Name</th>
			  		<th>Word Frequency</th>
			  		<th class="sorttable_nosort">Download Link</th>
			  	</tr>
			</thead>
			<tbody>
			  <tr><td>Jan Molby</td><td>£12,000</td><td>Jan Molby</td><td>£12,000</td><td>£12</td</tr>
			  <tr><td>Steve Nicol</td><td>£8,500</td><td>Jan Molby</td><td>£1200</td><td>£120</td</tr>
			  <tr><td>Steve McMahon</td><td>£9,200</td><td>Jan Molby</td><td>£120</td><td>£1200</td</tr>
			  <tr><td>John Barnes</td><td>£15,300</td><td>Jan Molby</td><td>£12</td><td>£12,000</td</tr>
			</tbody>
		</table>
	</div>

</body>

</html>
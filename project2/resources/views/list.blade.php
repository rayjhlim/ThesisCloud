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

		<h4> Word: {{$word}} <br> </h4>

		
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
			<tbody id="tableContents">
			  <!--tr><td>Jan Molby</td><td>£12,000</td><td>Jan Molby</td><td>£12,000</td><td>£12</td</tr>
			  <tr><td>Steve Nicol</td><td>£8,500</td><td>Jan Molby</td><td>£1200</td><td>£120</td</tr>
			  <tr><td>Steve McMahon</td><td>£9,200</td><td>Jan Molby</td><td>£120</td><td>£1200</td</tr>
			  <tr><td>John Barnes</td><td>£15,300</td><td>Jan Molby</td><td>£12</td><td>£12,000</td</tr-->
			</tbody>
		</table>
	</div>

</body>

<script>

	var infoTitle = {!! json_encode($search_data['document'][0]['title']) !!};
	var infoAuthors = {!! json_encode($search_data['document'][0]['authors']) !!};
	var infoDownload = {!! json_encode($search_data['document'][0]['pdf']) !!};
	var infoConference = {!! json_encode($search_data['document'][0]['pubtitle']) !!};

	// function to create a new row in the table
	function addTableEntry() {

		var row = document.createElement("tr");

		// Title cell
		var title = document.createElement("td");
		var node0 = document.createTextNode(infoTitle);
		title.appendChild(node0);
		row.appendChild(title);

		// Author cell
		var authors = document.createElement("td");
		var node1 = document.createTextNode(infoAuthors);
		authors.appendChild(node1);
		row.appendChild(authors);

		// Conference name cell
		var conf = document.createElement("td");
		var node2 = document.createTextNode(infoConference);
		conf.appendChild(node2);
		row.appendChild(conf);

		// Word frequency cell
		var freq = document.createElement("td");
		var node3 = document.createTextNode("Frequency yay");
		freq.appendChild(node3);
		row.appendChild(freq);

		// Download link cell
		var dl = document.createElement("td");
		dl.className = "sorttable_nosort";
		var link = document.createElement("a");
		link.href = infoDownload;
		var node4 = document.createTextNode(infoDownload);
		link.appendChild(node4);
		dl.appendChild(link);
		row.appendChild(dl);

		var element = document.getElementById("tableContents");
		element.appendChild(row);
	}

	addTableEntry();

</script>

</html>
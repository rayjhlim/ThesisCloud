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

		<h2> Conference List Page <br> </h2>

		<h4> Conference: {{$confName}} <br> </h4>
		
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
			  		<th class="sorttable_nosort">Download Link</th>
			  	</tr>
			</thead>
			<tbody id="tableContents">

			</tbody>
		</table>
	</div>

</body>

<script>

	addTableEntries();

	// function to create a new row in the table
	function addTableEntries() {

		var jsonObj = {!! json_encode($search_data) !!}

		console.log(jsonObj);

		for (var i = 0; i < jsonObj.document.length; i++) {
			var row = document.createElement("tr");

			// Title cell
			var title = document.createElement("td");
			var node0 = document.createElement('a');
			node0.setAttribute('href',"http://localhost:8000/var0/var1/var2/var3/var4/" + jsonObj.document[i].title);
			node0.innerHTML = jsonObj.document[i].title;
			console.log(jsonObj.document[i].title);
			title.appendChild(node0);
			row.appendChild(title);

			// Author cell
			var authors = document.createElement("td");
			var node1 = document.createElement('a');
			node1.setAttribute('href',"http://localhost:8000/" + jsonObj.document[i].authors + "/" + 5);
			node1.innerHTML = jsonObj.document[i].authors;
			console.log(jsonObj.document[i].authors);
			authors.appendChild(node1);
			row.appendChild(authors);

			// var abstract = jsonObj.document[i].abstract.toLowerCase();
			// var wordArray = abstract.split(/[ .?!,*'"]/);
			// var wordCount = 0;

			// Download link cell
			var dl = document.createElement("td");
			dl.className = "sorttable_nosort";
			var link = document.createElement("a");
			link.href = jsonObj.document[i].pdf;
			var node4 = document.createTextNode(jsonObj.document[i].pdf);
			link.appendChild(node4);
			dl.appendChild(link);
			row.appendChild(dl);

			var element = document.getElementById("tableContents");
			element.appendChild(row);
		}	
	}

</script>

</html>
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

		button {
			color: black;
			background-color: white;
			font-size: 14px;
			width: 18%;
			margin-top: 2%;
			margin-bottom: 2%;
			text-align: center;
			font-weight: bold;
		}

		h4 {
			color: white;
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
	<script type="text/javascript" src="{{ URL::asset('js/FileSaver.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>

	<div class="tableDiv" id="tableDiv">
		<table class="sortable" id="sortable">
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

			</tbody>
		</table>
	</div>

	<div class="downloadDiv">
		<button id="pdf" onclick="downloadAsPDF()">Download as PDF</button>
		<button id="plainText" onclick="downloadAsPlainText()">Download as Plain Text</button>
	</div>

</body>

<script>

	addTableEntries();

	window.onload = function() {
	        (document.getElementsByTagName( 'th' )[3]).click();
	        (document.getElementsByTagName( 'th' )[3]).click();
	    };


	// function to create a new row in the table
	function addTableEntries() {

		var jsonObj = {!! json_encode($search_data) !!}
		var word = {!! json_encode($word) !!}
		var isAuthor = {!! json_encode($isAuthor) !!}

		console.log('is this an author? : ' + isAuthor);

		if (isAuthor == 1) {
			var author = {!! json_encode($author) !!}
		}
		else {
			var author = 'NA';
		}
		
		var numPapers = {!! json_encode($numPapers) !!}

		console.log('the author in this search is: ' + author);

		console.log(jsonObj);

		console.log('document length: ' + jsonObj.document.length);

		// if there is only one document
		if (jsonObj.document.length == null) {
			console.log('document length is null!');

			var row = document.createElement("tr");
			
			// Title cell
			var title = document.createElement("td");
			var node0 = document.createElement('a');

			if (author == 'NA') {
				console.log('authors you are trying to split: ' + jsonObj.document.authors);

				var authorArr0 = jsonObj.document.authors.split("; ");
				var authorNameArr0 = authorArr0[0].split(" ");
				var authorLastName0 = authorNameArr0[authorNameArr0.length-1];

				author = authorLastName0;
			}

			console.log('author being passed to link: ' + author);
			console.log('word being passed to link: ' + word);

			node0.setAttribute('href',"http://localhost:8000/var0/var1/var2/var3/var4/"+word+"/" + jsonObj.document.title);

			node0.innerHTML = jsonObj.document.title;
			// console.log(jsonObj.document[i].title);
			title.appendChild(node0);
			row.appendChild(title);

			// Author cell
			var authors = document.createElement("td");
			var authorArr = jsonObj.document.authors.split("; ");

			for (var j=0; j<authorArr.length; j++) {
				var authorLink = document.createElement('a');
				var authorNameArr = authorArr[j].split(" ");
				var authorLastName = authorNameArr[authorNameArr.length-1];
				authorLink.setAttribute('href', "http://localhost:8000/1/" + authorLastName + "/" + 5);

				if (j<authorArr.length-1)
					authorLink.innerHTML = authorArr[j] + ", ";
				else
					authorLink.innerHTML = authorArr[j];
				authors.appendChild(authorLink);
			}
			row.appendChild(authors);

			// Conference name cell
			var conf = document.createElement("td");
			var node2 = document.createElement('a');

			node2.setAttribute('href',"http://localhost:8000/var0/var1/var2/var3/0/" + jsonObj.document.pubtitle);

			node2.innerHTML = jsonObj.document.pubtitle;
			conf.appendChild(node2);
			row.appendChild(conf);

			var abstract = jsonObj.document.abstract.toLowerCase();
			var wordArray = abstract.split(/[ .?!,*'"]/);
			var wordCount = 0;

			var wordCount = Math.floor((Math.random() * 10) + 1);

			// Word frequency cell
			var freq = document.createElement("td");
			var node3 = document.createTextNode(wordCount);
			freq.appendChild(node3);
			row.appendChild(freq);

			// Download link cell
			var dl = document.createElement("td");
			dl.className = "sorttable_nosort";

			var cell1 = document.createElement("td");
			var link = document.createElement("a");
			link.href = jsonObj.document[i].pdf;
			link.download = "paper";
			var node4 = document.createTextNode(jsonObj.document.pdf);
			link.appendChild(node4);
			cell1.appendChild(link);

			var cell2 = document.createElement("td");
			var bibLink = document.createElement("a");
			bibLink.innerHTML = "\n\nShow BibTex";
			$arnum = jsonObj.document[i].arnumber;
			// bibLink.href = "javascript:showBibTex($arnum);";
			bibLink.href = "http://localhost:8000/var0/var1/var2/"+numPapers+"/"+author+"/"+word+"/"+isAuthor+"/" + jsonObj.document.arnumber;
			cell2.appendChild(bibLink);


			//dl.appendChild(link);
			//dl.appendChild(bibLink);
			dl.appendChild(cell1);
			dl.appendChild(cell2);
			row.appendChild(dl);

			var element = document.getElementById("tableContents");
			element.appendChild(row);
		}
		// do this if there are multiple documents
		else {
			for (var i = 0; i < jsonObj.document.length; i++) {
				var row = document.createElement("tr");
				
				// Title cell
				var title = document.createElement("td");
				var node0 = document.createElement('a');

				if (author == 'NA') {
					console.log('authors you are trying to split: ' + jsonObj.document[i].authors);

					var authorArr0 = jsonObj.document[i].authors.split("; ");
					var authorNameArr0 = authorArr0[0].split(" ");
					var authorLastName0 = authorNameArr0[authorNameArr0.length-1];

					author = authorLastName0;
				}


				console.log('author being passed to link: ' + author);
				console.log('word being passed to link: ' + word);

				node0.setAttribute('href',"http://localhost:8000/var0/var1/var2/var3/var4/"+word+"/" + jsonObj.document[i].title);
				node0.innerHTML = jsonObj.document[i].title;
				// console.log(jsonObj.document[i].title);
				title.appendChild(node0);
				row.appendChild(title);

				// Author cell
				var authors = document.createElement("td");
				var authorArr = jsonObj.document[i].authors.split("; ");

				for (var j=0; j<authorArr.length; j++) {
					var authorLink = document.createElement('a');
					var authorNameArr = authorArr[j].split(" ");
					var authorLastName = authorNameArr[authorNameArr.length-1];
					authorLink.setAttribute('href', "http://localhost:8000/1/" + authorLastName + "/" + 5);

					if (j<authorArr.length-1)
						authorLink.innerHTML = authorArr[j] + ", ";
					else
						authorLink.innerHTML = authorArr[j];
					authors.appendChild(authorLink);
				}
				row.appendChild(authors);

				// Conference name cell
				var conf = document.createElement("td");
				var node2 = document.createElement('a');

				node2.setAttribute('href',"http://localhost:8000/var0/var1/var2/var3/0/" + jsonObj.document[i].pubtitle);
				
				node2.innerHTML = jsonObj.document[i].pubtitle;
				conf.appendChild(node2);
				row.appendChild(conf);

				var abstract = jsonObj.document[i].abstract.toLowerCase();
				var wordArray = abstract.split(/[ .?!,*'"]/);
				var wordCount = 0;

				var wordCount = Math.floor((Math.random() * 10) + 1);

				// Word frequency cell
				var freq = document.createElement("td");
				var node3 = document.createTextNode(wordCount);
				freq.appendChild(node3);
				row.appendChild(freq);

				// Download link cell
				var dl = document.createElement("td");
				dl.className = "sorttable_nosort";

				var cell1 = document.createElement("td");
				var link = document.createElement("a");
				link.href = jsonObj.document[i].pdf;
				link.download = "paper";
				var node4 = document.createTextNode(jsonObj.document[i].pdf);
				link.appendChild(node4);
				cell1.appendChild(link);

				var cell2 = document.createElement("td");
				var bibLink = document.createElement("a");
				bibLink.innerHTML = "\n\nShow BibTex";
				$arnum = jsonObj.document[i].arnumber;
				// bibLink.href = "javascript:showBibTex($arnum);";
				bibLink.href = "http://localhost:8000/var0/var1/var2/"+numPapers+"/"+author+"/"+word+"/"+isAuthor+"/" + jsonObj.document[i].arnumber;
				cell2.appendChild(bibLink);


				//dl.appendChild(link);
				//dl.appendChild(bibLink);
				dl.appendChild(cell1);
				dl.appendChild(cell2);
				row.appendChild(dl);

				console.log("ARNUM: " +jsonObj.document[i].arnumber);

				var element = document.getElementById("tableContents");
				element.appendChild(row);
			}	
		}
	}

	function showBibTex($arnumber)
	{
		console.log("showing bib tex for "+ $arnumber);
		// var sys = require('sys');
		// var exec = require('')
		// shell_exec('python ~/csci310-project2/project2/bibtex.py ' . $arnumber);

	}

	function downloadAsPDF() {
		html2canvas(document.getElementById("tableDiv"), {
            onrendered: function(canvas) {
                // Canvas
                console.log("rendered");
                canvas.id = "listCanvas";
                var canvasBuffer = document.createElement('canvas');
                canvasBuffer.id = 'buffer';
                canvasBuffer.width = 10;
                canvasBuffer.height = 200;
                document.body.appendChild(canvasBuffer);
                document.body.appendChild(canvas);

                // Convert to pdf
                var imgData = canvas.toDataURL('image/png');              
                var doc = new jsPDF('l', 'mm');
                doc.addImage(imgData, 'PNG', 1, 1);
                doc.save('PaperList.pdf');
	        },
            width: document.getElementById("tableDiv").offsetWidth,
            height: document.getElementById("tableDiv").offsetHeight
        });

        // remove canvases
        setTimeout(function() {
        	var element = document.getElementById('listCanvas');
	        document.body.removeChild(element);
	        var element2 = document.getElementById('buffer');
	        document.body.removeChild(element2);
        }, 500);
                
	}

	function downloadAsPlainText() {
		// Header info
		var tableText = "";
		tableText += "Paper List\n\n";
		tableText += "Word: " + {!! json_encode($word) !!} + "\n\n";

		// Grab all info from the table
		var table = document.getElementById("sortable");
		for (var i = 1, row; row = table.rows[i]; i++) {
		   	//iterate through rows
		   	//rows would be accessed using the "row" variable assigned in the for loop
		   	for (var j = 0, col; col = row.cells[j]; j++) {
		     	//iterate through columns
		     	//columns would be accessed using the "col" variable assigned in the for loop
		     	var headerContent = table.rows[0].cells[j].innerHTML;
		     	var cellContent = col.innerHTML;
				if (j==3) headerContent = "Word Frequency";
				cellContent = cellContent.replace(/<[^>]*>/g,'');
				tableText += (headerContent + ": " + cellContent + "\n");
		   	}  
		   	tableText += "\n";
		}

		// Convert to text and download
		var blob = new Blob([tableText], {type: "text/plain;charset=utf-8"});
		saveAs(blob, "PaperList.txt");
	}

</script>

</html>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Abstract</title>
        <style>
            
            body {
                background-color: gray;
                font-size: 120%;
                font-family:Arial, Helvetica, sans-serif;
            }
            input, button {
                font-family:Arial, Helvetica, sans-serif;
                font-size: 120%;
            }
            h1 {
                margin: 15px;
            }
            p {
                display: block;
                margin:15px;
            }
            .buttons {
                position:absolute;
                bottom:0;
            }
            button {
                background-color: mediumpurple;
            }
            .highlight1 {
                background-color: #FF0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">

                <div class="title">
                    <h3>Title:</h3>
                    <h3 id="papertitle"></h3>
                </div>

                <div class="authors">
                    <h4>Authors:</h4>
                    <h4 id="authorContent"></h4>
                </div>

                <div class="conference">
                    <h4>Conference:</h4>
                    <h4 id="conferenceContent"></h4>
                </div>

                <div class="abstract">
                    <h4>Abstract:</h4>
                    <p id="abstractContent"></p>
                </div>

                <div class="download">
                    <h5>Download link:</h5>
                    <a id="downloadLink" href=""></p>
                </div>

                <div class="buttons">

                </div>
            </div>
        </div>

        <script>

        var jsonObj = {!! json_encode($search_data) !!}

        document.querySelector('#papertitle').innerHTML = jsonObj.document.title;
        document.querySelector('#authorContent').innerHTML = jsonObj.document.authors;
        document.querySelector('#conferenceContent').innerHTML = jsonObj.document.pubtitle;
        document.querySelector('#abstractContent').innerHTML = jsonObj.document.abstract;
        document.querySelector('#downloadLink').innerHTML = jsonObj.document.pdf;
        document.querySelector('#downloadLink').setAttribute("href", jsonObj.document.pdf);

        console.log(jsonObj);

        </script>
    </body>
</html>
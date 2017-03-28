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
                <h1 id="papertitle">Paper Title</h1>

                <div class="abstract">
                    <p id="abstractContent">this is where the abstract content goes</p>
                </div>

                <div class="buttons">
                    <!--<button id="backToSongsButton" onclick="window.location='{{ url("list") }}'">Back to List</button>-->
                    <button id="backToCloudButton" onclick="window.location='{{ url("cloud") }}'">Back to Cloud</button>
                </div>
            </div>
        </div>

        <script>

        </script>
    </body>
</html>
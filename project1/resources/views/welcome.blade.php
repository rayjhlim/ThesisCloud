<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to SongCloud!</title>

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
        // Autocomplete functionality
        $( function() {
            var artistMatches = [];

            function getRelatedArtists(artistName){ 
                artistMatches = [];
                var artist_name = artistName;
                // use jquery to make calls to the musixmatch api
                $.ajax({
                    type: "GET",
                    data: {
                        // this is our api key
                        apikey:"2287a48029b846476c13b4768cf55b97",
                        // this is a variable, which is of a String type
                        q_artist: artistName,
                        format:"jsonp",
                        callback:"jsonp_callback"
                    },
                    // search for track in database
                    url: "http://api.musixmatch.com/ws/1.1/artist.search",
                    dataType: "jsonp",
                    jsonpCallback: 'jsonp_callback',
                    contentType: 'application/json',
                    // upon query success, execute this code:
                    success: function(data) {
                        // for debugging
                        //value = artist name
                        //image = twitter link + "/profile_image?size=mini";
                        for (i = 0; i < data.message.body.artist_list.length; i++) {
                            if (i <= 5) {

                                if (!isEmpty(data.message.body.artist_list[i].artist.artist_name)) {
                                    var name =  data.message.body.artist_list[i].artist.artist_name;
                                    var twitter = data.message.body.artist_list[i].artist.artist_twitter_url;


                                    if (isEmpty(twitter)) {
                                        twitter = 'http://capletonmusic.com/news/wp-content/uploads/2015/11/itunes.png';
                                    }
                                    artistMatches.push( {
                                        value: name,
                                        image: twitter
                                        
                                    });
                                    
                                }
                                    
                                else if (!isEmpty(data.message.body.artist_list[i].artist.artist_twitter_url)) {
                                    var name = data.message.body.artist_list[i].artist.artist_name;
                                    var twitter = data.message.body.artist_list[i].artist.artist_twitter_url + "/profile_image?size=mini";

                                    artistMatches.push({
                                        value: name,
                                        image: twitter
                                    });
                                }
                            }
                        }

                    },
                    // this is what happens when the query is invalid
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }    
                });
            }
            function isEmpty(val){
                return (val === undefined || val == null || val.length <= 0) ? true : false;
            }
            $( ".tags" ).autocomplete({
                minLength: 3,
                source: function( request, response ) {
                    var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                    response( $.grep( artistMatches, function( item ){
                        return matcher.test( item.value );
                    }) );
                }
            }).data("uiAutocomplete")._renderItem = function (ul, item) {
                    return $("<li />")
                        .data("item.autocomplete", item)
                        .append("<a><img src='" + item.image + "' />" + item.value + "</a>")
                        .appendTo(ul);
            };
            $( ".tags" ).keyup(function(){
                if($(this).val().length >= 3) {
                    // update autocomplete matches
                    console.log("updating matches");
                    artistMatches = [{value:"John Legend", image:"http://capletonmusic.com/news/wp-content/uploads/2015/11/itunes.png"}];
                    getRelatedArtists($(this).val()); 
                }
            });
        } );
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

            input, button {
                font-family:Arial, Helvetica, sans-serif;
                font-size: 120%;
            }

            body {
                background-color: gray;
                font-size: 120%;
                font-family:Arial, Helvetica, sans-serif;

                margin-top:25%;

                margin-left: auto;
                margin-right: auto;
                margin-bottom:auto;

                text-align: center;
            }

            h1 {
                font-size: 60px;
            }

            input {
                border: 2px solid mediumpurple;
                width: 35%;
                margin-right: 20%;
                margin-left: 20%;
                margin-bottom: 1%;
                color: black;
            }

            input[type="submit"]{
                background-color: mediumpurple;
                width: 10%;
                margin-right: 40%;
                margin-left: 40%;
            }

        </style>
    </head>
    <body>

        <label><h1>SongCloud</h1> <br></label> 

        {{ Form::open(array('route' => 'form', 'method'=>'get', 'id'=>'myArr')) }}
            {{ $name = Form::input('artist_name', 'artist_name', null, ['class' => 'tags']) }}
            {{ Form::submit('Search') }}
        {{ Form::close() }}
       <script>

       </script>

    </body>
</html>

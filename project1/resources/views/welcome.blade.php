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
        <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
            var artistMatches = [

            ];

            function getRelatedArtists(artistName){ 
                artistMatches = [];
                // use jquery to make calls to the musixmatch api
                $.ajax({
                    type: "GET",
                    data: {
                        // this is our api key
                        apikey:"63ee20957db474cd79ff92b17ce0198c",
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
                                    } else {
                                        twitter = twitter.substring(20);
                                        twitter = 'http://avatars.io/twitter/' + twitter + '/small';
                                    }
                                    artistMatches.push( {
                                        value: name,
                                        image: twitter
                                        
                                    });
                                    
console.log(name);
console.log(twitter);

                                }
                                    
                                else if (!isEmpty(data.message.body.artist_list[i].artist.artist_twitter_url)) {
                                    var name = data.message.body.artist_list[i].artist.artist_name;
                                    var twitter = data.message.body.artist_list[i].artist.artist_twitter_url;
                                    twitter = 'http://avatars.io/twitter/' + twitter + '/small';

console.log(name);
console.log(twitter);


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
                    //artistMatches = [{value: "John Legend",image:"http://capletonmusic.com/news/wp-content/uploads/2015/11/itunes.png"}]
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

            .highlight1 {
                background-color: #FF0;
            }

            #searchTextBox {
                border-style: solid;
                border-width: 4px;
                border-color: mediumpurple;

                margin: auto;
            }

            #searchButton {
                background-color: mediumpurple;
                display: block;

                margin-top: 20px;

                margin-left: auto;
                margin-right: auto;
                margin-bottom:auto;
            }

            input {
                border: 2px solid mediumpurple;
                width: 35%;
                margin-right: 20%;
                margin-left: 20%;
                margin-bottom: 1%
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

        {{ Form::open(array('route' => 'form', 'method'=>'post', 'id'=>'myArr')) }}
            {{ $name = Form::input('artist_name', 'artist_name', null, ['class' => 'tags']) }}
            {{ Form::submit('Search') }}
        {{ Form::close() }}

            
        <!-- <form action='/find{$artist}' method='GET'>
            
            <input name='artist' type='text' id='searchTextBox'> <br>
            <input type='submit' class='search' value='Search' id='searchButton'>
        </form>

        <p>
            @if(isset($artist_id))
                {{ $artist_id }}
            @endif
        </p> -->
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

        <h1>WordCloud</h1>

        <div class="controls">
            <input class="tags" id="searchTextBox" type="text">
            <button id="searchButton" onclick="generateTrackArray(document.getElementById('searchTextBox').value)">Search</button>

            
            <input id="wordTextBox" type="text">
            <button id="wordSearchButton" onclick="searchForWordInLyrics(document.getElementById('wordTextBox').value)">Highlight word</button>
        </div>

    <div id="lyrics">

    </div>
        </div>   

    <script>

        // keeping an array of the tracks
        // by the given artist
        var trackArray = [];

        // this function populates the array with all of the songs
        // by the artist inputted in the text box
        function generateTrackArray(artistName){ 

            // create a paragraph element in the "lyrics" div
            // to fill in with the lyrics
            var lyricContentP = document.createElement("p");
            lyricContentP.setAttribute("id", "lyricContentP");
            document.getElementById("lyrics").appendChild(lyricContentP);

            // use jquery to make calls to the musixmatch api
            $.ajax({
                type: "GET",
                data: {
                    // this is our api key
                    apikey:"a97ea319e25d4f8ba70a6119ce2532d2",
                    // this is a variable, which is of a String type
                    q_artist: artistName,
                    format:"jsonp",
                    callback:"jsonp_callback"
                },
                // search for track in database
                url: "http://api.musixmatch.com/ws/1.1/track.search",
                dataType: "jsonp",
                jsonpCallback: 'jsonp_callback',
                contentType: 'application/json',
                // upon query success, execute this code:
                success: function(data) {
                    // for debugging
                    console.log(data); 
                    console.log(data.message.body.track_list[0].track.album_coverart_350x350);
                    console.log(data.message.body.track_list[0].track.lyrics_id);

                    for (var i = 0; i < data.message.body.track_list.length; i++) {
                        var thisTrack = data.message.body.track_list[i].track;
                        trackArray.push(thisTrack);
                        console.log(trackArray[i].track_name);
                        // for each track, get the lyrics
                        getLyricsFromTrack(thisTrack);
                    }
                },
                // this is what happens when the query is invalid
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }    
            });
        };

        function getLyricsFromTrack(track){
            // for debugging
            console.log('this is the track id' + track.track_id);

            $.ajax({
                type: "GET",
                data: {
                    apikey:"445d6196c08dc2b7490929f18149d684",
                    track_id: track.track_id,
                    format:"jsonp",
                    callback:"jsonp_callback"
                },
                url: "http://api.musixmatch.com/ws/1.1/track.lyrics.get",
                dataType: "jsonp",
                jsonpCallback: 'jsonp_callback',
                contentType: 'application/json',
                // upon query success, execute this code:
                success: function(data) {
                    // for debugging
                    console.log(data.message.body.lyrics.lyrics_body); 

                    // append to the paragraph that contains all of the
                    // lyrics in the array of tracks
                    document.querySelector('#lyricContentP').innerHTML += data.message.body.lyrics.lyrics_body;
                },
                // this is what happens when the query is invalid
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }    
            });
        };

        function clearHighlight() {
            var content = document.querySelector('#lyricContentP').innerHTML;

            content = content.replace(/<\/span>/g, '');
            content = content.replace(/<span class="highlight\d">/g, '');

            document.querySelector('#lyricContentP').innerHTML = content;
        }

        function searchForWordInLyrics(word) {
            clearHighlight();
            
            console.log('this is the word you are searching for: ' + word);
            // find matches within the paragraph of all of the lyrics
            var regExpObj = new RegExp(word, 'gi');

            var content = document.querySelector('#lyricContentP').innerHTML;
            var newStr = '<span class="highlight1">' + word + '</span>';
            document.querySelector('#lyricContentP').innerHTML = content.replace(regExpObj, newStr);
        }

    </script> -->

    </body>
</html>

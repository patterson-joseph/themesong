<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TSheets Theme Song</title>
</head>
<body>

<div id="container" style="width: 100%; text-align: center">
	<img id="song_art"/>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
	var player = new Audio();
	
	setInterval(function(){
		if(player.paused) {
			$.ajax({
				url: '/index.php/api/play_next_song'
			}).success(function (response) {
				if(response) {
					var songRequest = JSON.parse(response);
					$.ajax({
						url: 'https://api.spotify.com/v1/search?q=' + songRequest.song_name + '+artist:' + songRequest.artist + '&type=track'
					}).success(function (response) {
						var song = response.tracks.items[0];
						$('#song_art').prop('src', song.album.images[0].url);
						player.src = song.preview_url;
						player.volume = 0;
						player.play();
						$(player).animate({volume: 1}, 2000);

						setTimeout(function () {
							$(player).animate({volume: 0}, 2000, 'swing', function () {
								// really stop the music 
								player.pause();
								$('#song_art').prop('src', '');
							});
						}, 28000);
					});
				}
			});
		}
	}, 3000);
</script>
</body>
</html>
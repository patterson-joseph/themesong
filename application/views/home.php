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
	setInterval(function(){
		$.ajax({
			url: '/index.php/api/play_next_song'
		}).success(function(response) {
			var song = JSON.parse(response);
			$.ajax({
				url: 'https://api.spotify.com/v1/tracks/' + song.song_id
			}).success(function (response) {
				$('#song_art').prop('src', response.album.images[0].url);
				var player = new Audio;
				player.src = response.preview_url;
				player.play();
			});
		});
	}, 3000);
</script>
</body>
</html>
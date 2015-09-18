<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TSheets Theme Song</title>
</head>
<body>

<div id="container">
	<iframe src="https://embed.spotify.com/?uri=spotify%3Atrack%3A64Ret7Tf2M8pDE4aqbW2tX" width="640" height="720" frameborder="0" allowtransparency="true" style="width: 100%;"></iframe>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
	setInterval(function(){
		$.ajax({
			url: '/api/play_next_song'
		}).success(function(response) {
			console.log(response);
//			
//			$.ajax({
//				url: 'https://api.spotify.com/v1/tracks/<?php //echo $songId; ?>//'
//			}).success(function (response) {
//				var player = new Audio;
//				player.src = response.preview_url;
//				player.play();
//			});
		});
	}, 3000);
</script>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>YouTube Deejay</title>
	<script type="text/javascript" src="assets/js/swfobject.js"></script>  
	<script type="text/javascript" src="video_app.js"></script>
	
	<link rel="stylesheet" href="assets/css/ui-lightness/jquery-ui-1.7.2.custom.css" type="text/css" media="all" /> 
	<script type="text/javascript" src="assets/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui-1.7.2.custom.min.js"></script>
 
	<link rel="stylesheet" href="assets/css/style.css" />
  
	<script type="text/javascript">
		var params = { allowScriptAccess: "always" };
		
		var atts = { id: "player1" };
		swfobject.embedSWF("http://www.youtube.com/v/vUGaZpUY4so?enablejsapi=1&playerapiid=ytplayer", 
						   "player1", "300", "250", "8", null, null, params, atts);
		
		var atts = { id: "player2" };
		swfobject.embedSWF("http://www.youtube.com/v/5NFoYvU8MnY?enablejsapi=1&playerapiid=ytplayer", 
						   "player2", "300", "250", "8", null, null, params, atts);
		
		ytplayers = new Array();
		
		function onYouTubePlayerReady(playerId) {
		  ytplayers[0] = document.getElementById("player1");
		  ytplayers[1] = document.getElementById("player2");
		 // alert(ytplayers);
		}
		
		function deckLoad(deckId, videoId) {
			//alert(videoId + ' ' + deckId);
			var startSeconds = 0;
			var suggestedQuality = "small";
			ytplayers[deckId].cueVideoById(videoId, startSeconds, suggestedQuality);
		}
		
		function deckPlay(deckId) {
		  if (ytplayers[deckId]) {
			ytplayers[deckId].playVideo();
			 var needToConfirm = true;
		  }
		}
				
		function deckPause(deckId) {
		  if (ytplayers[deckId]) {
			ytplayers[deckId].pauseVideo();
		  }
		}
		
		function deckStop(deckId) {
		  if (ytplayers[deckId]) {
			ytplayers[deckId].stopVideo();
		  }
		}
		
		function crossFade(deckId1, deckId2, fadeLoc) {
			var volDeck1 = $('#deck1 .volume').slider('option', 'value');
			var volDeck2 = $('#deck2 .volume').slider('option', 'value');
			ytplayers[deckId1].setVolume( ( 100 - fadeLoc ) * ( volDeck1 / 100 ) );
			ytplayers[deckId2].setVolume(fadeLoc * ( volDeck2 / 100 ) );
		}
		
		//onError
			
		needToConfirm = false;
		window.onbeforeunload = askConfirm;
		
		function askConfirm(){
			if (needToConfirm){
				return "ARE YOU SURE!?";
			}    
		}
			
		// jQuery Shizzle
		$(function() {
			$("#crossfader").slider({ 
				//orientation: "vertical",
				//range: "min",
				min: 0,
				max: 100,
				value: 60,
				slide: function(event, ui) {
					//$("#amount").val(ui.value);
					crossFade(0, 1, ui.value);
				}
			});
				
			$("#deck1 .volume").slider({ 
				orientation: "vertical",
				//range: "min",
				min: 0,
				max: 100,
				value: 100,
				slide: function(event, ui) {
					//$("#amount").val(ui.value);
					ytplayers[0].setVolume(ui.value);
				}
			});
				
			$("#deck2 .volume").slider({ 
				orientation: "vertical",
				//range: "min",
				min: 0,
				max: 100,
				value: 100,
				slide: function(event, ui) {
					//$("#amount").val(ui.value);
					ytplayers[1].setVolume(ui.value);
				}
			});
			
			$("#rack1, #rack2, #rack3").sortable({
				connectWith: '.rack'
			});
			
			$('#cfToA').click(function () {
				$('#crossfader').slider('option', 'value', 0);
				crossFade(0, 1, 0);
				//$('#deck1 .volume').slider('option', 'value', 100);
				//$('#deck2 .volume').slider('option', 'value', 0);
			});	
			
			$('#cfToB').click(function () {
				$('#crossfader').slider('option', 'value', 100);
				crossFade(0, 1, 100);
				//$('#deck1 .volume').slider('option', 'value', 0);
				//$('#deck2 .volume').slider('option', 'value', 100);
			});
			
		});

	
	</script>

</head>

<body>
<h1>Stream Video DJ 0.1.2</h1>
<p>Bas van der Lans | <a href="#facebook">Create your YouTube party</a> | Suggest improvements: <a href="http://www.twitter.com/delans">twitter</a> / <a href="http://www.facebook.com/basvanderlans">facebook</a></p>

<div id="booth">

<ul class="rack" id="rack1">
	
	<li id="deck1" class="deck gear">
	
		<h2>Deck 1</h2>
		
		<div id="player1">
			You need Flash player 8+ and JavaScript enabled to view this video.
		</div>
		
		<div class="btns">
			<a href="javascript:void(0);" onclick="deckPlay(0);">Play</a>
			<a href="javascript:void(0);" onclick="deckPause(0);">Pause</a>
			<a class="stop" href="javascript:void(0);" onclick="deckStop(0);">Stop</a>
		</div>
		
		<!--
		<div class="cfSwitch">
			<label for="cfD1A">A</label><input type="radio" name="cfD1" id="cfD1A" value="a" />
			<input type="radio" name="cfD1" id="cfD1T" value="t" />
			<input type="radio" name="cfD1" id="cfD1B" value="b" /><label for="cfD1B">B</label>
		</div>
		-->
		
		<div class="volume"></div>
		
	</li>

</ul>

<ul class="rack" id="rack2">

	<li id="mixer" class="gear">
		<h2>Mixer</h2><small><input type="checkbox" name="cfActive" id="cfActive" /> <label for="cfActive">crossfader active</label></small>
		<div class="btns">
			<a href="#" class="cfBtn" id="cfToA">A</a> <div id="crossfader"></div> <a href="#" class="cfBtn" id="cfToB">B</a> 
		</div>
	</li>

	<li id="search" class="deck gear">
		<h2>Search</h2>
	
		<div class="form">

			<form id="searchForm" onsubmit="ytVideoApp.listVideos(this.queryType.value, this.searchTerm.value, 1); return false;" action="javascript:void();" >
				<select style="" name="queryType" onchange="ytVideoApp.queryTypeChanged(this.value, this.form.searchTerm);" >
					<option value="search_all" selected="selected">All Videos</option>
					<option value="search_top_rated">Top Rated Videos</option>
					<option value="search_most_viewed">Most Viewed Videos</option>
					<option value="search_recently_featured">Recently Featured Videos</option>
					<option value="search_username">Videos from a specific user</option>
				</select>
				<div>
					<input name="searchTerm" type="text" value="Your song" />
					<input type="submit" value="Search" />
				</div>
			</form>
			
		</div>
		
		<div class="clear"></div>
	
			<div id="searchResultsVideoList"></div>
			<div id="searchResultsNavigation">
				<form id="navigationForm" action="javascript:void();">
				<input type="button" id="previousPageButton" onclick="ytVideoApp.listVideos(ytVideoApp.previousQueryType, ytVideoApp.previousSearchTerm, ytVideoApp.previousPage);" value="Back" style="display: none;" />
				<input type="button" id="nextPageButton" onclick="ytVideoApp.listVideos(ytVideoApp.previousQueryType, ytVideoApp.previousSearchTerm, ytVideoApp.nextPage);" value="Next" style="display: none;" />
				</form>
			</div>
	
		 <!-- 
		<div class="btns">
		
			<a href="javascript:void(0);" onclick="deckLoad(1, 'dVP7N9_Q6hs');">Load "Digital Love" in "Deck 2"</a>
			<a href="javascript:void(0);" onclick="deckLoad(0, 'HzpCcNdhy5w');">Load "Lady" in "Deck 1"</a>
			
		</div>
		-->
	</li>
	
</ul>

<ul class="rack" id="rack3">
		
	<li id="deck2" class="deck gear">
	
		<h2>Deck 2</h2>
		
		<div id="player2">
			You need Flash player 8+ and JavaScript enabled to view this video.
		</div>
		
		<div class="btns">
			<a href="javascript:void(0);" onclick="deckPlay(1);">Play</a>
			<a href="javascript:void(0);" onclick="deckPause(1);">Pause</a>
			<a class="stop" href="javascript:void(0);" onclick="deckStop(1);">Stop</a>
		</div>
	
		<!--
		<div class="cfSwitch">
			<label for="cfD2A">A</label><input type="radio" name="cfD2" id="cfD2A" value="a" />
			<input type="radio" name="cfD2" id="cfD2T" value="t" />
			<input type="radio" name="cfD2" id="cfD2B" value="b" /><label for="cfD2B">B</label>
		</div>
		-->
		
		<div class="volume"></div>
		
	</li>
	
</ul>

</body>
</html>

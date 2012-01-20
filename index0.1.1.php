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
		
		var atts = { id: "playerA" };
		swfobject.embedSWF("http://www.youtube.com/v/vUGaZpUY4so?enablejsapi=1&playerapiid=ytplayer", 
						   "playerA", "300", "250", "8", null, null, params, atts);
		
		var atts = { id: "playerB" };
		swfobject.embedSWF("http://www.youtube.com/v/5NFoYvU8MnY?enablejsapi=1&playerapiid=ytplayer", 
						   "playerB", "300", "250", "8", null, null, params, atts);
		
		ytplayers = new Array();
		
		function onYouTubePlayerReady(playerId) {
		  ytplayers[0] = document.getElementById("playerA");
		  ytplayers[1] = document.getElementById("playerB");
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
			ytplayers[deckId1].setVolume(100 - fadeLoc);
			ytplayers[deckId2].setVolume(fadeLoc);
		}
		
		//onError
		
	</script>
	<script language="javascript" type="text/javascript">
    needToConfirm = false;
    window.onbeforeunload = askConfirm;
    
    function askConfirm(){
        if (needToConfirm){
            return "ARE YOU SURE!?";
            }    
        }
	</script>
	<script type="text/javascript">
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
		//var value = $('#crossfader').slider('option', 'value');
		
		//ytplayers[deckId2].setVolume(value);
	});
	
	
	</script>

</head>

<body>
<h1>Stream Video DJ 0.1.1</h1>
<p>Bas van der Lans | <a href="#facebook">Create your YouTube party</a></p>
<div id="wrapper">
<div id="deck-a" class="deck">
	<div id="playerA">
		You need Flash player 8+ and JavaScript enabled to view this video.
	</div>
	
	<div class="btns">
		<a href="javascript:void(0);" onclick="deckPlay(0);">Play</a>
		<a href="javascript:void(0);" onclick="deckPause(0);">Pause</a>
		<a class="stop" href="javascript:void(0);" onclick="deckStop(0);">Stop</a>
	</div>
	
</div>

<div id="deck-b" class="deck">
	<div id="playerB">
		You need Flash player 8+ and JavaScript enabled to view this video.
	</div>
	
	<div class="btns">
		<a href="javascript:void(0);" onclick="deckPlay(1);">Play</a>
		<a href="javascript:void(0);" onclick="deckPause(1);">Pause</a>
		<a class="stop" href="javascript:void(0);" onclick="deckStop(1);">Stop</a>
	</div>

</div>

<div id="search" class="deck">
	 <form id="searchForm" onsubmit="ytVideoApp.listVideos(this.queryType.value, this.searchTerm.value, 1); return false;" action="javascript:void();" >
        <div id="searchBoxTop"><select name="queryType" onchange="ytVideoApp.queryTypeChanged(this.value, this.form.searchTerm);" >
          <option value="search_all" selected="selected">All Videos</option>
          <option value="search_top_rated">Top Rated Videos</option>
          <option value="search_most_viewed">Most Viewed Videos</option>
          <option value="search_recently_featured">Recently Featured Videos</option>
          <option value="search_username">Videos from a specific user</option>
        </select></div>
        <div><input name="searchTerm" type="text" value="YouTube Data API" />
        <input type="submit" value="Search" /></div>
      </form>

		<div id="searchResultsVideoList"></div>
		<div id="searchResultsNavigation">
			<form id="navigationForm" action="javascript:void();">
			<input type="button" id="previousPageButton" onclick="ytVideoApp.listVideos(ytVideoApp.previousQueryType, ytVideoApp.previousSearchTerm, ytVideoApp.previousPage);" value="Back" style="display: none;" />
			<input type="button" id="nextPageButton" onclick="ytVideoApp.listVideos(ytVideoApp.previousQueryType, ytVideoApp.previousSearchTerm, ytVideoApp.nextPage);" value="Next" style="display: none;" />
			</form>
		</div>

	  
	<div class="btns">
	
		<a href="javascript:void(0);" onclick="deckLoad(1, 'dVP7N9_Q6hs');">Load "Digital Love" in "Deck B"</a>
		<a href="javascript:void(0);" onclick="deckLoad(0, 'HzpCcNdhy5w');">Load "Lady" in "Deck A"</a>
		
	</div>
</div>

<div id="mixer">
	<!--
	<p>
	Deck A 
	<a href="#" onclick="crossFade(0,1,0);">0</a>
	<a href="#" onclick="crossFade(0,1,10);">10</a>
	<a href="#" onclick="crossFade(0,1,20);">20</a>
	<a href="#" onclick="crossFade(0,1,30);">30</a>
	<a href="#" onclick="crossFade(0,1,40);">40</a>
	<a href="#" onclick="crossFade(0,1,50);">50</a>
	<a href="#" onclick="crossFade(0,1,60);">60</a>
	<a href="#" onclick="crossFade(0,1,70);">70</a>
	<a href="#" onclick="crossFade(0,1,80);">80</a>
	<a href="#" onclick="crossFade(0,1,90);">90</a>
	<a href="#" onclick="crossFade(0,1,100);">100</a>
	Deck B
	</p>
	-->
	<div id="crossfader"></div>
	
</div>

</div>

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>YouTube Deejay</title>
  <script type="text/javascript" src="assets/js/swfobject.js"></script>  
  <script src="video_app.js" type="text/javascript"></script>
  <style type="text/css">
	body {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 0.8em;
	}
	
  	.deck {
		width: 300px;
		float: left;
		margin: 20px 30px 0 0 ;
	}
	
	.btns a {
		width: 290px;
		padding: 3px 5px;
		background: #3B5998;
		color: #fff;
		display: block;
		margin: 5px 0 0 0;
		text-decoration: none;
	}
	.btns a.stop {
		background: #666;
	}
	
	.btns a:hover {
		background: #627AAD;
	}
	
	.btns a.stop:hover {
		background: #c00;
	}
	
	.videoresult {
		width: 300px;
		float: left;
		padding: 4px 0;
		border-bottom: solid 1px #eee;
	}
	
	.videoresult h5 {
		margin: 2px 0 4px 0;
	}
	
	.videoresult a {
		padding: 3px 5px;
		background: #3B5998;
		color: #fff;
		font-size: 0.8em;
		margin: 1px 0 0 4px;
		text-decoration: none;
	}	
	
	.videoresult a:hover {
		background: #627AAD;
	}
	
	.videoresult img {
		width: 40px;
		height: 30px;
		display: none;
	}
	.videoresult .loadto {
		float: right;
	}
  </style>
  
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
		function deckLoad(deckId, ytMovieId) {			
		  if (ytplayers[deckId]) {	
			if(deckId == 0){
			  var playerId = "playerA";
			} else {
			  var playerId = "playerB";
			}
			var atts = { id: playerId };
			swfobject.embedSWF("http://www.youtube.com/v/" + ytMovieId + "?enablejsapi=1&playerapiid=ytplayer", 
							   playerId, "300", "250", "8", null, null, params, atts);	
		  }
		}
		
		/*
		function deckLoad(deckId, videoId) {
			var startSeconds = 0;
			var suggestedQuality = small;
			ytplayers[deckId].cueVideoById(videoId:String, startSeconds:Number, suggestedQuality:String)
		 
		}
		*/
		
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
		  if (ytplayers[deckId]) {
			ytplayers[deckId].stopVideo();
		  }
		}
		
	</script>
	
	<script language="javascript" type="text/javascript">
    needToConfirm = true;
    window.onbeforeunload = askConfirm;
    
    function askConfirm(){
        if (needToConfirm){
            return "ARE YOU SURE!?";
            }    
        }
	</script>

</head>

<body>
<h1>Stream Video DJ 0.0.1</h1>
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

</div>

</body>
</html>

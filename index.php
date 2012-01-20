<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>YouTube Party Application 0.2 | Public ßeta :)</title>
	<script type="text/javascript" src="assets/js/swfobject.js"></script>  
	<script type="text/javascript" src="video_app.js"></script>
	
	<link rel="stylesheet" href="assets/css/ui-lightness/jquery-ui-1.7.2.custom.css" type="text/css" media="all" /> 
	<script type="text/javascript" src="assets/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/ytdj.js"></script>
	<link rel="stylesheet" href="assets/css/style.css" />
  
</head>

<body>
<h1>YouTube Party Application 0.2</h1>
<p>Bas van der Lans | <a href="#facebook">Create your YouTube party</a> | Suggest improvements: <a href="http://www.twitter.com/delans">twitter</a> / <a href="http://www.facebook.com/basvanderlans">facebook</a></p>

<div id="booth">

<ul class="rack" id="rack0">
	
	<li id="deck0" class="deck gear">
	
		<h2>Deck 1</h2>
		
		<div id="player0">
			You need Flash player 8+ and JavaScript enabled to view this video.
		</div>
		
		<div class="btns">
			<a href="javascript:void(0);" onclick="deckPlay(0);">Play</a>
			<a href="javascript:void(0);" onclick="deckPause(0);">Pause</a>
			<a class="stop" href="javascript:void(0);" onclick="deckStop(0);">Stop</a>
		</div>
				
		<div class="fader">
			<div class="gain"></div>
		</div>
		
	</li>
	
		
	<li id="info" class="gear">
		<h2>Information</h2>
		
		<div class="text">
			
			<ul>
				<li>Loaded in Deck 1: <span id="infoLoadedDeck1">kip</span></li>
				<li>Loaded in Deck 2: <span id="infoLoadedDeck2">hond</span></li>
			</ul>
			
		</div>
	</div>


</ul>

<ul class="rack" id="rack1">

	<li id="mixer" class="gear">
		<h2>Mixer</h2><!--small><input type="checkbox" name="cfActive" id="cfActive" /> <label for="cfActive">crossfader active</label></small-->
		
		<!--
		<div id="controlsDeck0">
		
			<div class="volume"></div>
				
			<div class="cfSwitch">
				<label for="cfD0A">A</label><input type="radio" name="cfD0" id="cfD0A" value="a" />
				<input type="radio" name="cfD0" id="cfD0T" value="t" />
				<input type="radio" name="cfD0" id="cfD0B" value="b" /><label for="cfD0B">B</label>
			</div>
			
		</div>
		
		<div id="controlsDeck1">
			<div class="volume"></div>
							
			<div class="cfSwitch">
				<label for="cfD1A">A</label><input type="radio" name="cfD1" id="cfD1A" value="a" />
				<input type="radio" name="cfD1" id="cfD1T" value="t" />
				<input type="radio" name="cfD1" id="cfD1B" value="b" /><label for="cfD1B">B</label>
			</div>
		</div>
		-->
		
		<div class="faders">
			<a href="#" class="cfBtn" id="cfToA">A</a> <div id="crossfader"></div> <a href="#" class="cfBtn" id="cfToB">B</a> 
		</div>
		<!--p class="btns"><input type="checkbox" id="cfAutostart" /> <label for="cfAutostart">Auto start</label></p-->
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

<ul class="rack" id="rack2">
		
	<li id="deck1" class="deck gear">
	
		<h2>Deck 2</h2>
		
		<div id="player1">
			You need Flash player 8+ and JavaScript enabled to view this video.
		</div>
		
		<div class="btns">
			<a href="javascript:void(0);" onclick="deckPlay(1);">Play</a>
			<a href="javascript:void(0);" onclick="deckPause(1);">Pause</a>
			<a class="stop" href="javascript:void(0);" onclick="deckStop(1);">Stop</a>
		</div>
	
		<!--
		<div class="cfSwitch">
			<label for="cfD1A">A</label><input type="radio" name="cfD1" id="cfD1A" value="a" />
			<input type="radio" name="cfD1" id="cfD1T" value="t" />
			<input type="radio" name="cfD1" id="cfD1B" value="b" /><label for="cfD1B">B</label>
		</div>
		-->
		
		<div class="fader">
			<div class="gain"></div>
		</div>
		
	</li>
	
</ul>

</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12892276-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>

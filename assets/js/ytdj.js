var params = { allowScriptAccess: "always" };
		
		var atts = { id: "player0" };
		swfobject.embedSWF("http://www.youtube.com/v/vUGaZpUY4so?enablejsapi=1&playerapiid=ytplayer", 
						   "player0", "300", "250", "8", null, null, params, atts);
		
		var atts = { id: "player1" };
		swfobject.embedSWF("http://www.youtube.com/v/5NFoYvU8MnY?enablejsapi=1&playerapiid=ytplayer", 
						   "player1", "300", "250", "8", null, null, params, atts);
		
		ytplayers = new Array();
		
		function onYouTubePlayerReady(playerId) {
		  ytplayers[0] = document.getElementById("player0");
		  ytplayers[1] = document.getElementById("player1");
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
			var volDeck1 = $('#deck0 .gain').slider('option', 'value');
			var volDeck2 = $('#deck1 .gain').slider('option', 'value');
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
				
		function getUrlVars()
		{
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for(var i = 0; i < hashes.length; i++)
			{
				hash = hashes[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			//alert (vars[1]);
		}
		
		//getUrlVars();
			
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
				
			$("#deck0 .gain").slider({ 
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
				
			$("#deck1 .gain").slider({ 
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
			
			$(".gear").draggable({ handle: "h2" });
			/*
			//$("#rack1, #rack2, #rack3").sortable({
			$("#rack2").sortable({
				connectWith: '.rack'
			}).disableSelection();
			*/
			
			$('#cfToA').click(function () {
				$('#crossfader').slider('option', 'value', 0);
				crossFade(0, 1, 0);
			});	
			
			$('#cfToB').click(function () {
				$('#crossfader').slider('option', 'value', 100);
				crossFade(0, 1, 100);
			});
			
		});

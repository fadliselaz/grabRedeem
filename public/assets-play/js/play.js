var ruffleTime = 5000; // 10 seconds
var topSpeed = 5; //0.05 second
var lowSpeed = 10; //0.01 second
var lastPhaseTime = ruffleTime * 6 / 100;
var switchPhase = ((ruffleTime / topSpeed) * 6 / 100); //0.01 second
var dataRuffle = null;
var apiUrl = "";
var congUrl = "";
var ruffling = false;

var startSound = new Howl({
	  src: [startSrc],
	  loop: true
	});
var tadaSound = new Howl({
	  src: [tadaSrc]
	});
var tadaGrandSound = new Howl({
	  src: [tadaGrandSrc]
	});

$(function() {
	apiUrl = drawUrl+"/"+ruffle;
	$.get( apiUrl )
	  .done(function(data) {
	    console.log(data);
	  	dataRuffle = data;
	  })
	  .fail(function(e) {
	  	// window.location.href = congUrl;
	   	console.log( e.message );
	  });


	document.body.onkeyup = function(e){
	    if(e.keyCode == 32 || e.keyCode == 13) {
	        //console.log("enter click");
	        //console.log(dataRuffle);
	        //console.log(ruffling);
	    	if(dataRuffle !== null && ruffling === false){
	    		startSound.play();
	    		// console.log(dataRuffle);
  				startRuffle(dataRuffle.prizes.ruffle, ruffleTime, topSpeed, 1);
  			}
  		}
	}


});

var startRuffle = function startRuffle(ruffles, totalTime, speed, phase = 1) {
	var length = ruffles.length;
	ruffling = true;
	// ten second per 0.05 second speed
	var timeleft = totalTime / speed;
	var ruffleTimer = setInterval(function(){
		timeleft - --timeleft;
		var idx = timeleft % length;
		var prize = ruffles[idx].name;
		if (phase == 1 && timeleft <= switchPhase) {
			startSound.fade(1, 0.5, 500);;
			clearInterval(ruffleTimer);
			startRuffle(dataRuffle.prizes.gimmick, lastPhaseTime, lowSpeed, 2);
		} else if(timeleft <= 6) {
			startSound.stop();
			clearInterval(ruffleTimer);
			if (dataRuffle.prizes.last !== null) {
				tadaGrandSound.play();
				var gPrize = dataRuffle.prizes.last;
				$("#ruffle_text").text(gPrize.name);
				$('#fire_decorate').show();
				$("#prize_gradient").addClass("gradient");
				submitPrize(gPrize);
			} else {
				tadaSound.play();
				$("#ruffle_text").text(prize);
				submitPrize(ruffles[idx]);
			}
			ruffling = false;
			dataRuffle = null;
		} else {
			$("#ruffle_text").text(prize);
		}
	},speed);
}

var submitPrize = function submitPrize(prize) {
	var token = $('meta[name="csrf-token"]').attr('content');
	var json_data = {"prize_id": prize.id , '_token': token};
	$.ajax({
	    contentType: 'application/json',
      	// data: {"prize_id": prize.id , '_token': token},
      	data: JSON.stringify(json_data),
      	dataType: 'JSON',
	    success: function(data){
	    	$("#btn_start").hide();
	    	$("#btn_next").show();
	        console.log("Submit succeeded");
	        document.body.onkeyup = function(e){
			    if((e.keyCode == 32 || e.keyCode == 13) && redirectUrl !== null) {
			    	window.location.href = redirectUrl;
			    	console.log("enter space");
		  		}
			}
	    },
	    error: function(){
	        console.log("Submit failed");
	    },
	    type: 'POST',
	    url: apiUrl
	});
}

var sound = function sound(src) {
  this.sound = document.createElement("audio");
  this.sound.src = src;
  this.sound.setAttribute("preload", "auto");
  this.sound.setAttribute("controls", "none");
  this.sound.style.display = "none";
  document.body.appendChild(this.sound);
  this.play = function(){
    this.sound.play();
  }
  this.stop = function(){
    this.sound.pause();
  }
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

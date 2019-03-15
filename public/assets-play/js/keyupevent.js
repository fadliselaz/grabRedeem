$(function() {
	document.body.onkeyup = function(e){
	    if(e.keyCode == 32 || e.keyCode == 13) {
	    	window.location.href = redirectUrl;
	    	console.log("enter space");
  		} 
	}
});
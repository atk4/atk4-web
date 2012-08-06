$(function() {

	$('.bigarrow.blue-w').hover(
		function() {
		$(this).stop().animate({"left": "-15px"},200);
		},
		function() {
		$(this).stop().animate({"left": "-3px"},200);
	});
	
	
	$('.bigarrow.red-e').hover(
		function() {
		$(this).stop().animate({"right": "-15px"},200);
		},
		function() {
		$(this).stop().animate({"right": "-3px"},200);
	});
	
	$('.tron-screen-button.next i').hover(
		function() {
		$(this).stop().animate({"left": "0"},100);
		},
		function() {
		$(this).stop().animate({"left": "-5px"},100);
	});
	
	$('.tron-screen-button.prev i').hover(
		function() {
		$(this).stop().animate({"right": "0"},100);
		},
		function() {
		$(this).stop().animate({"right": "-5px"},100);
	});
	

}); 
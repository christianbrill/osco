$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault;

		refreshStories();
	});
	
	////////// START Filter toggle function to Recent
	$(".filterToggleButton").click(function(e){
		console.log('click');
	});
	////////// END Filter toggle function

});//jQuery END

function refreshStories() {
	var story = $('#ajaxHomeStories');

	$.post({
    	story:story,
		url: 'index.php',
		
}).done(function(response) {
	console.log(response);
	

	});
}//refreshStories function end
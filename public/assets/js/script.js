$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault;

		refreshStories();
	});
	

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
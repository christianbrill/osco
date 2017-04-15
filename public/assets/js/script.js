$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault;

		refreshStories();
	});
	

});//jQuery END

function refreshStories() {

	var $story = $('#ajaxHomeStories');

	$.ajax({  	
		url: '/osco/public/ajax/home/',		
}).done(function(response) {
	console.log(response);
	

    $story.empty().append();

	});
}//refreshStories function end


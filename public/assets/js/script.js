$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault;

		refreshStories();
	});
	

});//jQuery END

function refreshStories() {

	var $story = $('#storyBox');
	//var $storyArray = $.map($story, function(el) { return el });

	$.ajax({  	
		url: '/osco/public/ajax/home/',		
}).done(function(response) {
	console.log(response);
	
	//JSON.stringify(response);
    //$story.empty().load("/osco/public/ajax/home/ #ajaxHomeStories");

		var parsed = JSON.parse(response);



   		$story.empty().load('/osco/public/ajax/home/');

	});
}//refreshStories function end
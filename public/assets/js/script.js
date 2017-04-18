$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault;

		refreshStories();
	});
	
});//jQuery END

function refreshStories() {

	//var $storyArray = $.map($story, function(el) { return el });

	$.ajax({  	
		url: '/osco/public/ajax/home/',	

}).done(function(response) {
	//console.log(response);

	//var array = Array.from(response); 
	//console.log(array);
	//JSON.stringify(response);
    //$story.empty().load("/osco/public/ajax/home/ #ajaxHomeStories");

   	$("#ajaxHomeStories").empty().load("/osco/public/ajax/home/ #storyBox");


   	//var info = '<?php foreach($randomStories as $story) : ?> <article id="storyBox"><a href="#"><div><h1 id="title"><?= \Controller\ContentController::getShortTitle($story["sto_title"]) ?></h1><p><?= \Controller\ContentController::getShortDescription($story["sto_content"])?></p></div></a></article><?php endforeach; ?>';
   	
   	//$("#ajaxHomeStories").append(info);

	});
}//refreshStories function end
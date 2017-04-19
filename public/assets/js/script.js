$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault();

		refreshStories();
	});
	
});//jQuery END

function refreshStories() {

	//var $storyArray = $.map($story, function(el) { return el });

	$.ajax({
		url: '/osco/public/ajax/home/',
		//dataType:'json'	

}).done(function(response) {
	console.log(response);

	var content = "";

	$.each(response, function(key, value){
		content += "<article id='storyBox'>" +
			"<a href=''>" +
				"<div>"+
					"<h1 id='title'>"+ value.sto_title +"</h1>"+
					"<p>"+ value.sto_title +"</p>"+
				"</div>"+
			"</a>"+
		"</article>";
	});

	$("#ajaxHomeStories").html(content);

   	var info = '<?php foreach($randomStories as $story) : ?> <article id="storyBox"><a href="#"><div><h1 id="title"><?= \Controller\ContentController::getShortTitle($story["sto_title"]) ?></h1><p><?= \Controller\ContentController::getShortDescription($story["sto_content"])?></p></div></a></article><?php endforeach; ?>';
   	
	});
}//refreshStories function end
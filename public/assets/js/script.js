$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault;

		refreshStories();
	});

	$(".menuIcon").click(function(e){
		console.log("Show menu");
		$("#mobileMenu").toggle();
	});
	
});//jQuery END

window.addEventListener("resize", function(){

	if($(window).width() > 1000){
		$("#desktopNavigation").show();
		$("#mobileNavigation").hide();
	}
	else if($(window).width() < 1000 && $(window).width() > 700) {
		$("#desktopNavigation").hide();
		$("#mobileNavigation").show();
	}
	else {
		$("#desktopNavigation").hide();
		$("#mobileNavigation").show();
	}
})

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
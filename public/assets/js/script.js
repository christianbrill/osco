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


	$('#deletebutton').click(function(e) {
		e.preventDefault;

		deleteAccount();
	});

});//jQuery END


/**
* Refresh Stories Function
*
*/

function refreshStories() {

	//var $storyArray = $.map($story, function(el) { return el });


	$.ajax({
		url: '/osco/public/ajax/home/',
		}).done(function(response) {
		console.log(response);

		//JSON.stringify(response);
	    //$story.empty().load("/osco/public/ajax/home/ #ajaxHomeStories");

		var parsed = JSON.parse(response);

   		$story.empty().load('/osco/public/ajax/home/');

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


/**
* Delete Account Function
*
*/
function deleteAccount() {

	var deleteUser = confirm("Do you really want to delete your account?");

	if (deleteUser === true) {

		var userEmail = $('#email').val();

		$.ajax({
			type: 'POST',
			url: '/osco/app/Model/UsersModel.php',
			data: {'userEmail' : userEmail}
		}).done(function(response) {
			console.log(response);

		});
	}

}

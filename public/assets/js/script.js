$(document).ready(function(){
	console.log('Loaded');

	/**
	* Stories on homepage are refreshed on button push
	*
	*/
	$("#refreshStories").click(function(e){
		 e.preventDefault();

		refreshStories();
	});

	$("#moreStories").click(function(e){
		 e.preventDefault();

		moreStories().fadein(500);
	});

	/**
	*
	Browse to previous page function
	*
	*/

	$(".goBack").click(function(e){
		window.history.back();
	});


	/**
	* Event Listener for burger menu
	*  Clicking the menu icon will make the nav menu appear
	*/
	$(".menuIcon").click(function(e){
		//console.log("Show menu or hide menu");
		$("#mobileMenu").toggle();
	});

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
	});



	/**
	* Delete account on button push
	*
	*/
	var active = false;

	$('#confirmLink').click(function(e){
		e.preventDefault();

		// This will make the form appear which has the option
		// to delete the user's account from the database
		$('#formToDeleteAccount').show(500);
	});



	/**
	* This executes when the page "Need Help" is loaded
	*
	*/
	if (typeof needGeoloc != 'undefined'){
		if (needGeoloc) {
			geolocation();
		}
	}



	/**
	* Change Username on submit
	*
	*/
	$('#changeUsername').submit(function(e) {
		e.preventDefault();

		changeUsername();
	});


	// This creates the accordion on the about page
	$(".accordion").accordion();

});//jQuery END


/** ==============================================
*
* FUNCTIONS BELOW
*
* ============================================= */


/**
* Refresh Stories Function
*
*/
function refreshStories() {

	$.ajax({
		url: '/osco/public/ajax/home/'

	}).done(function(response) {
		console.log(response);

		var content = "";

		$.each(response, function(key, value){
			content += "<article id='storyBox'>" +
				"<a href=''>" +
					"<div>"+
						"<h1 id='title'>"+ value.sto_title +"</h1>"+
						"<p>"+ value.sto_description +"</p>"+
					"</div>"+
				"</a>"+
			"</article>";
		});//end each

	$("#ajaxHomeStories").html(content);

	});//end ajaxHomeStories

}//refreshStories function end



/**
* Change Username Function
*
*/
function changeUsername() {

	var newUsername = $('#username').val();
	var email = $('#email').val();

	$.ajax({
		type: 'post',
		url: '/osco/app/Controller/UserController.php',
		data: {
			'username' : newUsername,
			'email' : email
		}
	}).done(function(response) {
		console.log(response);
	});
}



/**
* Geolocation Function
*
*/
function geolocation() {

	$.ajax({
  		url: 'http://freegeoip.net/json/',
  		dataType: 'jsonp'

  	}).done(function(response) {
		//console.log(response);

		$.ajax({
			method:'POST',
			url: '/osco/public/ajax/needhelp/',
			data: {'country_name': response.country_name},
			dataType: 'json'
		}).done(function(response2){
			//console.log(response2);

			var content = "";

			$.each(response2, function(object, valueObject){

				if(response.country_name == valueObject.org_country){
					content += "<h1>"+valueObject.org_name+"</h1>"+
	    			"<p>"+valueObject.org_address+"</p>"+
	    			"<p>"+valueObject.org_description+"</p>";
	    		}
			});//end each

			$("#organizationsDiv").html(content);

		});
	});
}



/**
* Confirm Function to redirect to "deleteAccount" in UserController
*
*/
function userConfirm() {

	var userConfirm = confirm('Are you sure you want to delete your account?');

	if (userConfirm) {
		document.getElementById('confirmAnchor').href="<?= $this->url('user_deleteaccount'); ?>";
	}
}

/**
* Load More Stories Function
*
*/
function moreStories() {

	$.ajax({
		url: '/osco/public/ajax/profile/'

	}).done(function(response) {
		console.log(response);

		var content = "";

		$.each(response, function(key, value){
			content += "<article id='profileStoryBox'>" +
				"<a href=''>" +
					"<div>"+
						"<h1 id='title'>"+ value.sto_title +"</h1>"+
					"</div>"+
				"</a>"+
			"</article>";

		});//end each

	$("#ajaxProfileStories").html(content);

	});//end ajaxHomeStories

}//refreshStories function end


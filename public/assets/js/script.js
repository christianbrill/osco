$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault();

		refreshStories();
	});

	$(".menuIcon").click(function(e){
		console.log("Show menu");
		$("#mobileMenu").toggle();
	});


	/**
	* Event Listener for burger menu
	*
	*/
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
	$('#deletebutton').click(function(e) {
		e.preventDefault;

		deleteAccount();
	});


	/**
	* Change Username on submit
	*
	*/
	$('#changeUsername').submit(function(e) {
		e.preventDefault();

		changeUsername();
	});

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
						"<p>"+ value.sto_title +"</p>"+
					"</div>"+
				"</a>"+
			"</article>";
		});//end each

	$("#ajaxHomeStories").html(content);

	});//end ajaxHomeStories

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
			type: 'GET',
			url: '/osco/app/Model/UsersModel.php',
			data: {
				'userEmail' : userEmail
			}
		}).done(function(response) {
			console.log(response);
		});
	}
}


/**
* Change Username Function
*
*/
function changeUsername() {

	var newUsername = $('#username').val();
	var email = $('#email').val();

	$.ajax({
		type: 'GET',
		url: '/osco/app/Controller/UserController.php',
		data: {
			'username' : newUsername,
			'email' : email
		}
	}).done(function(response) {
		console.log(response);
	});
}

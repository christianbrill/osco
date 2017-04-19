$(document).ready(function(){
	console.log('Loaded');

	$("#refreshStories").click(function(e){
		 e.preventDefault;

		refreshStories();
	});


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

$(document).ready(function(){

	$("#refreshStories").click(function(){
		refreshStories();
	});//click end

});//jQuery END

function refreshStories() {
	$.ajax({
		method: 'GET',
		url: '../../index.php',
		dataType: 'json',
		data: {},
		success: function(response) {
			console.log(response);

			$('.homeStory').find('select').append('<option value="5">TOTO</option>');

			// Je réinitialise les options
			$('#form-room').find('select').html('<option value="0">choose</option>');

			// Je parcours le tableau reçu dans "response"
			$.each(response, function(key, value) {
				// Pour chaque élément du tableau, j'ajoute une balise "option" dans la balise "select"
				$('#form-room').find('select').append('<option value="'+value.id+'">'+value.roomName+'</option>');
			});
		}
	});
}//refreshStories function end
$(document).ready(function () {
	'use strict';
	$('#nom_prenom').autocompleter({
		url_list: '/prenom_search',
		url_get: '/prenom_get/'
	});


	/* autocomplete Author on new Book (this is the main feature) */
	(function () {
		var options = {
			url_list: $('#url-list').attr('href'),
			url_get: $('#url-get').attr('href'),
			otherOptions: {
				minimumInputLength: 1,
				theme: 'boostrap',
				formatNoMatches: 'No name found.',
				formatSearching: 'Searching names...',
				formatInputTooShort: 'Insert at least 1 character'
			}
		};
		$('#cherchenom_Prenom').autocompleter(options);
        // // following lines are only for "add new" feature. See README.
        // modalForm('book');
        // var $addNew = $('<a>').text('insert new').attr('class', 'btn btn-xs btn-success ajax-modal').attr('href', $('#url-new').attr('href'));
        // $('label[for="nom_prenom"]').after($addNew).after(' ');
    }());
});
console.log('coucou');



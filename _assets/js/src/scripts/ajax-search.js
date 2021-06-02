jQuery(document).ready( function($) {

	var $searchWrap = $('.header-search'),
		$searchField = $('.header-search .search-field'),
		shieldUp = false,
		desktopSearch = "";
    	termExists = "";

	function matchMediaSupported() {
    	return (typeof window.matchMedia != "undefined" || typeof window.msMatchMedia != "undefined");
	}

    if ( matchMediaSupported() ) {
    	var desktopSearch = window.matchMedia( "(min-width: 61.5em)" );
    }

	// Debounce function from https://davidwalsh.name/javascript-debounce-function
	function debounce(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};

	// Add results container and disable autocomplete on search field
	$searchWrap.append('<div class="results"></div>');
	var $searchResults = $('.header-search .results');
	$searchField.attr('autocomplete', 'off');

	// Perform search on keyup on search field, hide/show loading icon
	$searchField.keyup( function() {
		if ( desktopSearch.matches ) {
			if( $searchField.val() !== "" ) {
				termExists = true;
				if (!shieldUp){
					$searchResults.html('<div class="results-list"></div>');
					var $results = $('.header-search .results .results-list');
					$results.html('<div class="shield red"><svg xmlns="http://www.w3.org/2000/svg" width="18.77" height="21.7" viewBox="0 0 18.77 21.7"><path class="path" d="M1,11.24V1.52a44.9,44.9,0,0,0,8.33,1h.12a44.79,44.79,0,0,0,8.32-1h0v9.72" transform="translate(0.02 -0.28)" fill="none" stroke="#a51417" stroke-miterlimit="10" stroke-width="2"/><path class="path-second" d="M1,11.24v4.64H1a2.52,2.52,0,0,0,.61,1.61,4.54,4.54,0,0,0,1.11.83c.13.08.27.15.43.23l.38.16h0l.56.24,5.29,2h0l5.29-2,.55-.24h0l.38-.16.44-.23a4.48,4.48,0,0,0,1.1-.83,2.52,2.52,0,0,0,.61-1.61h0V11.24" transform="translate(0.02 -0.28)" fill="none" stroke="#a51417" stroke-miterlimit="10" stroke-width="2"/><path class="path-small" d="M14,11.31V6h0a23.85,23.85,0,0,1-4.54.53H9.35A24,24,0,0,1,4.8,6v5.31" transform="translate(0.02 -0.28)" fill="none" stroke="#a51417" stroke-miterlimit="10" stroke-width="2.11"/><path class="path-small-second" d="M13.93,11.31v2.53h0a1.41,1.41,0,0,1-.33.88,2.72,2.72,0,0,1-.61.46l-.24.12-.2.09h0l-.31.12-2.88,1.1h0l-2.89-1.1-.31-.12h0L6,15.3l-.24-.12a3.37,3.37,0,0,1-.61-.46,1.32,1.32,0,0,1-.32-.88h0V11.31" transform="translate(0.02 -0.28)" fill="none" stroke="#a51417" stroke-miterlimit="10" stroke-width="2.11"/></svg></div>');
					shieldUp = true;
				}
				doSearch();
			} else {
				termExists = false;
				shieldUp = false;
				$searchResults.empty();
			}
		}
	});

	// Make AJAX request every 200 milliseconds, output results
	var doSearch = debounce(function() {
		var query = $searchField.val();
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'ajax_search',
				query: query,
			},
			success: function(result) {
				if ( termExists ) {
					$searchResults.html('<div class="results-list">' + result + '</div>');
					shieldUp = false;
				}
			},
			complete: function() {

			}
		});
	}, 200);

});
jQuery( document ).ready(function() {
	( function( jQuery ) {
		if ( typeof wpsap_answer_init_params !== 'undefined' ) {
			jQuery.each( wpsap_answer_init_params, function( key, value ) {
				if ( jQuery( "#wpsap-results-" + key ).length == 0 ) {
					jQuery( ".entry-content" ).prepend( "<span id='wpsap-" + key + "' class='wpsap-container' style='width:100%;'> </span>" );
				}
				if ( typeof value.max == undefined ) {
					value.max = 0;
				}
				jQuery( "#wpsap-results-" + key ).wpsapresults({ "style": value.style, "datas": value.datas });
			})
		}
	})( jQuery );
});
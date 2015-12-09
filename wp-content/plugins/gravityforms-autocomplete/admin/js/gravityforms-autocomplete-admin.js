jQuery(function() {

	jQuery.each( l35.sources, function( key, value ) {
			jQuery('.gform_autocomplete.auto.'+key+'').autoComplete({
                minChars: 1,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var choices = value;
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
            });
	});
	
	jQuery('.gform_autocomplete.manual').focus(function() {
		var el = jQuery(this);
		jQuery(this).autoComplete({
                minChars: 1,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var choices = el.data('choices');
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
          });
	});
	
	jQuery('.gform_autocomplete.ajax').focus(function() {
	
		var el = jQuery(this);
		var ajaxData;
		
		jQuery.getJSON( el.data('ajax'), function( data ) {
			 ajaxData = data;
		});
		
		jQuery(this).autoComplete({
                minChars: 1,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var choices = ajaxData;
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
          });
	});
	
});
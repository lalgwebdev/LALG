// LALG Jquery

jQuery(document).ready(function(){
	console.log("Page Loaded");
	
// Override date popup to advance date by one month on load	
	var lalgInField;

	jQuery( "#edit-field-eventdate-und-0-value-datepicker-popup-0," +
			"#edit-field-eventdate-und-0-value2-datepicker-popup-0" ).focus(function() {
//		console.log( "Handler for .focus() called." );
		
		lalgInField = this;
		var s = jQuery( this ).datepicker( "option", "defaultDate" );
		if (!(s.valueOf() == "+1m")) {
//			console.log("Setting timeout");

			setTimeout(function() {
				jQuery(lalgInField).datepicker( "option", "defaultDate", "+1m" );
			
				setTimeout(function() {
//					console.log("Kicking again");
					jQuery(lalgInField).datepicker("hide");
					jQuery(lalgInField).datepicker("show");
				}, 100);
			}, 100);
		}
	});	 
	
});



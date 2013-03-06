steal(
	// Bootstrap JS ( http://twitter.github.com/bootstrap )
	'/js/libs/bootstrap/bootstrap-transition.js',
	'/js/libs/bootstrap/bootstrap-alert.js',
	'/js/libs/bootstrap/bootstrap-button.js',
	'/js/libs/bootstrap/bootstrap-carousel.js',
	'/js/libs/bootstrap/bootstrap-collapse.js',
	'/js/libs/bootstrap/bootstrap-dropdown.js',
	'/js/libs/bootstrap/bootstrap-modal.js',
	
	'/js/libs/bootstrap/bootstrap-scrollspy.js',
	'/js/libs/bootstrap/bootstrap-tab.js',
	'/js/libs/bootstrap/bootstrap-tooltip.js',
	
	'/js/libs/bootstrap/bootstrap-typeahead.js',
	
	// CanJS ( http://canjs.us )
	'/js/libs/canjs/can.jquery.min.js',
	//'/js/libs/canjs/can.fixture.js',
	//'/js/libs/canjs/can.observe.delegate.js',
	//'/js/libs/canjs/can.observe.setter.js',
	
	// Jquery++ DOM Helpers + drag/drop/resize ( http://jquerypp.com/ )
	'/js/libs/jquerypp/jquerypp.min.js',
	
	// Underscore.js Low Level Jquery additions
	'http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js',
	
	'/js/libs/plugins.js',
	'./utility/utilities.js'
	).then(
		'/js/libs/bootstrap/bootstrap-popover.js',  // Have to load popover after bootstrap tooltip
		
		// Load application resources here:
		
	// Bootstrap load your app
	function(){					
		console.log('Assets Loaded!');
	})
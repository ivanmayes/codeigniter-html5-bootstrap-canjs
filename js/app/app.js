steal(
	'./models/models.js',		// steals all your models
	'./fixtures/fixtures.js',	// sets up fixtures for your models
	'./utility/utilities.js',
	function(){					// configure your application
		console.log('JMVC Loaded!');
	})
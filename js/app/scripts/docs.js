//js app/scripts/doc.js

load('steal/rhino/rhino.js');
steal("documentjs").then(function(){
	DocumentJS('app/app.html', {
		markdown : ['app']
	});
});
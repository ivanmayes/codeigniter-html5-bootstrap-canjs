/* Author: Ivan Mayes
*/
$(function() {
	"use strict";
	
	// Get any URI from a redirect
	 var path =  getUrlVars()["path"];
	 
	/**
	 * Facebook Buttons
	 */
	console.log($('.login'));
	/*$('.login').click(function(ev) 
	{   
		ev.preventDefault();
		fbLogin(); 
	});*/
	
	/**
	 * Facebook Login
	 */
	function fbLogin() {
	
		FB.login(function(response) {
		  	if (response.authResponse) { 

		  		$.ajax({
				  type: "GET",
				  dataType: "json",
				  url: "/user/signup"
				}).done(function( response ) {
					console.log(response);
					if (response.error) {
						$('#loginMessage')
							.html(response.errormsg)
							.fadeIn('fast')
						return false;
					}
					
					if (path) {
			  			//window.location = path;
			  		}else{
			  			//window.location = "/dashboard/";
			  		}
				});

		  	} else {
		    	// user is not logged in
		    	$('#loginMessage').fadeIn('fast');
		  	}
		}, {scope:'read_insights,manage_pages,publish_stream'});
		
	}
	
});


function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
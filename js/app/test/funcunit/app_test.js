steal("funcunit", function(){
	module("app test", { 
		setup: function(){
			S.open("//app/app.html");
		}
	});
	
	test("Copy Test", function(){
		equals(S("h1").text(), "Welcome to JavaScriptMVC 3.2!","welcome text");
	});
})
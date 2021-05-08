(function($) {
    var dir = $("#color").attr('folder');
    "use strict";
		  $("#defualt" ).on('click',function(){
			  $("#color" ).attr("href", dir+"/css/colors/default.css");
			  return false;
		  });
		  
		 
		  $("#red" ).on('click',function(){
			  $("#color" ).attr("href", dir+"/css/colors/red.css");
			  return false;
		  });
		  
		   $("#green" ).on('click',function(){
			  $("#color" ).attr("href", dir+"/css/colors/green.css");
			  return false;
		  });
		  
		  $("#blue" ).on('click',function(){
			  $("#color" ).attr("href", dir+"/css/colors/blue.css");
			  return false;
		  });
		  
		
		   $("#sea-green" ).on('click',function(){
			  $("#color" ).attr("href", dir+"/css/colors/sea-green.css");
			  return false;
		  });
		  
	
		  // picker buttton
		  $(".picker_close").click(function(){
			  	$("#choose_color").toggleClass("position");
			  
		   });
		  
})(jQuery);
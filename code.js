$(document).ready(function(){
    		
	$(".multistep-container .form-box .button-row .next").click(function(){
		$(this).parents(".form-box").fadeOut('fast');
		$(this).parents(".form-box").next().fadeIn('fast');
	});
	$(".multistep-container .form-box .button-row .previous").click(function(){
		$(this).parents(".form-box").fadeOut('fast');
		$(this).parents(".form-box").prev().fadeIn('fast');
	});

});

	
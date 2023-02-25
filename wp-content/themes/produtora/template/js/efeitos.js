$(function(){

	$(window).scroll(function(){
		if($(this).scrollTop()>110){
			$('.wsg-header').each(function(){
				$(this).addClass("wsg-header_fixo")
			}
		)}else{
			$('.wsg-header').each(function(){
				$(this).removeClass("wsg-header_fixo")
			})
		};
	});
	$(window).scroll();

});
$(function(){
	
	var header = $("#header");
	var headerH = $("#header").innerHeight();
	var introH = $("#intro").innerHeight();
	var scrollOffset = $(window).scrollTop();
	checkScroll(scrollOffset);

	$("[data-scroll]").on("click",function(event){
		event.preventDefault();
		var blockId= $(this).data('scroll');
		var blockOffset = $(blockId).offset().top;

		$("html, body").animate({
			scrollTop: blockOffset
		}, 500) // время
	});
	
	$(window).on("scroll",function(){
		scrollOffset= $(this).scrollTop();
		checkScroll(scrollOffset);
	});

	function checkScroll(scrollOffset){		
		//console.log(scrollOffset);

		if (scrollOffset > introH/2) {
			header.addClass("fixed");
		}
		else{
			header.removeClass("fixed");
		}
	}

	$("#reg_btn").on("click",function(){
		event.preventDefault();
		$("#block").toggleClass("blackout");
	});

	$("#nav_toggle").on("click", function(){
		event.preventDefault();
		$("#header_nav").toggleClass("active");
	});

});
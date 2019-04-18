$(document).on('ready',function(){ 
	"use strict";
	
	/*slideshow script code start here*/
	$('.slideshow').owlCarousel({
		items: 1,
		autoPlay: 5000,
		singleItem: true,
		navigation: true,
		navigationText: ['<i class="icofont icofont-bubble-left fa1"></i>', '<i class="icofont icofont-bubble-right fa2"></i>'],
		pagination: true,
	});
	/*slideshow script code end here*/
	
	/*courses script code start here*/
	$('.courses').owlCarousel({
		items: 4,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsMobile : [479, 1],
		navigation : true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="icofont icofont-bubble-left fa1"></i>', '<i class="icofont icofont-bubble-right fa2"></i>'],
		pagination: false,
	});
	/*courses script code end here*/
	
	/*bloggs script code start here*/
	$('.bloggs').owlCarousel({
		items: 1,
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="icofont icofont-bubble-left fa1"></i> Prev', 'Next <i class="icofont icofont-bubble-right fa2"></i>'],
		pagination: false,
	});
	/*bloggs script code end here*/
	
	// collapse
	$('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().removeClass("active").addClass("active");
	$(this).parent().find(".hidelink").remove("SHOW ANSWER").text("HIDE ANSWER");
	}).on('hidden.bs.collapse', function(){
	$(this).parent().find(".hidelink").remove("HIDE ANSWER").text("SHOW ANSWER");
	$(this).parent().removeClass("active").addClass("");
	});
	
	
	// collapse
	$('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().removeClass("active").addClass("active");
	$(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
	}).on('hidden.bs.collapse', function(){
	$(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
	$(this).parent().removeClass("active").addClass("");
	});
		
	//review
	$(".inreview").on("click", function(){
    	$('.outreview').hide();
	
		$(".nav-tabs .active").on("click", function(){
			$('.outreview').show();
		});
	});
	
	// Product Grid
	$('#grid-view').on('click',function(){
		
		$('.mainpage .row > .product-list').attr('class', 'product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12');
		localStorage.setItem('display', 'grid');
	});
	$('#list-view').on('click',function(){
		
		$('.mainpage .row > .product-grid').attr('class', 'product-layout product-list col-xs-12');
		localStorage.setItem('display', 'list');
	});
});

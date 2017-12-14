jQuery(window).on("load", function() {

	/* -----------------------------------------
	 Sliders Init
	 ----------------------------------------- */
	var $homeSlider = $("#home-slider");
	$homeSlider.flexslider();

	$(".slide-prev").on("click", function(e) {
		$homeSlider.flexslider('prev');
		e.preventDefault();
	});

	$(".slide-next").on("click", function(e) {
		$homeSlider.flexslider('next');
		e.preventDefault();
	});

	$('#room-carousel').flexslider({
		animation: "slide",
		animationLoop: true,
		slideshow: false,
		itemWidth: 180,
		asNavFor: '#room-gallery'
	});

	$('#room-gallery').flexslider({
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#room-carousel"
	});

});

jQuery(document).ready(function($) {

	/* -----------------------------------------
	 Main Navigation Init
	 ----------------------------------------- */
	$('ul#navigation').superfish({
		delay:       300,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast',
		dropShadows: false
	});

	/* -----------------------------------------
	 Responsive Menus Init with jPanelMenu
	 ----------------------------------------- */
	var jPM = $.jPanelMenu({
		menu: '#navigation',
		trigger: '.menu-trigger',
		excludedPanelContent: "style, script, #wpadminbar"
	});

	var jRes = jRespond([
		{
			label: 'mobile',
			enter: 0,
			exit: 767
		}
	]);

	jRes.addFunc({
		breakpoint: 'mobile',
		enter: function() {
			jPM.on();
		},
		exit: function() {
			jPM.off();
		}
	});

	/* -----------------------------------------
	 Custom Dropdowns (Dropkick.js)
	 ----------------------------------------- */
	$("#b-room").dropkick({
		change: function(value, label) {
			$(this).change();
		}
	});

	/* -----------------------------------------
	 LightBox Init (prettyPhoto.js)
	 ----------------------------------------- */
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: '',
		deeplinking: false
	});

	$("a[data-rel^='prettyPhoto']").prettyPhoto({
		social_tools: '',
		deeplinking: false
	});

	/* -----------------------------------------
	 Datepicker Init (jQuery UI)
	 ----------------------------------------- */
	$(".datepicker").datepicker();

	/* -----------------------------------------
	 Datepicker Init (jQuery UI)
	 ----------------------------------------- */
	if ( $('#map').length ) {
		map_init();
	}

});


function map_init() {
	var myLatlng = new google.maps.LatLng(33.59,-80);
	var mapOptions = {
		zoom: 8,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var contentString = '<div id="content">Change it to whatever your want! <strong>HTML</strong> too!</div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: 'Hello'
	});
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
}

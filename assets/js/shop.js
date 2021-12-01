$(document).ready(function() {
    $("body").fadeIn(400);

$('#myCarousel').carousel()
$('#newProductCar').carousel()

/* Home page item price animation */
$('.thumbnail').mouseenter(function() {
   $(this).children('.zoomTool').fadeIn();
});

$('.thumbnail').mouseleave(function() {
	$(this).children('.zoomTool').fadeOut();
});

// Show/Hide Sticky "Go to top" button
	$(window).scroll(function(){
		if($(this).scrollTop()>200){
			$(".gotop").fadeIn(200);
		}
		else{
			$(".gotop").fadeOut(200);
		}
	});
// Scroll Page to Top when clicked on "go to top" button
	$(".gotop").click(function(event){
		event.preventDefault();

		$.scrollTo('#gototop', 1500, {
        	easing: 'easeOutCubic'
        });
	});

	$(document).on('click', '#dollar, #euro', function() {
		let val = $(this).text();

		if (val === '\u20AC')
			val = 'euro';
		if (val === '$')
			val = 'dollar';

		$.ajax({
			type:"GET",
			url:"change-money",
			data: "unit=" + val,
			success: function( data ) {
				location.reload();
			}
		});
	});

	const toggle = document.querySelector(".toggle");
	const menu = document.querySelector(".menu");
	let flag = false;

	/* Toggle mobile menu */
	function toggleMenu() {
		if (flag) {
			menu.classList.remove("active");
			flag = false;

			// adds the menu (hamburger) icon
			toggle.innerHTML = '<i class="fa fa-bars"></i>';
		} else {
			menu.classList.add("active");
			flag = true;
			// adds the close (x) icon
			toggle.innerHTML = '<i class="fas fa-times"></i>';
		}
	}

	/* Event Listener */
	toggle.addEventListener("click", toggleMenu, false);


	// const items = document.querySelectorAll(".item");

	/* Activate Submenu */
	// function toggleItem() {
	// 	if (this.classList.contains("submenu-active")) {
	// 		this.classList.remove("submenu-active");
	// 	} else if (menu.querySelector(".submenu-active")) {
	// 		menu.querySelector(".submenu-active").classList.remove("submenu-active");
	// 		this.classList.add("submenu-active");
	// 	} else {
	// 		this.classList.add("submenu-active");
	// 	}
	// }

	/* Event Listeners */
	// for (let item of items) {
	// 	if (item.querySelector(".submenu")) {
	// 		item.addEventListener("click", toggleItem, false);
	// 		item.addEventListener("keypress", toggleItem, false);
	// 	}
	// }
});

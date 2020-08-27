var scroll_pos = window.scrollY;
console.log(scroll_pos)
window.addEventListener('scroll', function() {
	scroll_pos = window.scrollY;
	console.log(scroll_pos)
	add_header_class(scroll_pos)

});

function add_header_class(scrollPos){
	if(scrollPos >= 40){
		$("body").addClass("scrolled")
	}else if (scrollPos<40){
		$("body").removeClass("scrolled")	
	}
}
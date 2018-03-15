$('.accordions').collapse({
	accordion: true,
	open: function() {
		this.slideDown(500);
	},
	close: function() {
		this.slideUp(500);
	}
});
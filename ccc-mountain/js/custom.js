(function() {
	"use strict";

	document.addEventListener('DOMContentLoaded', function() {

		var toggle    = document.querySelector('.offcanvas-toggle'),
		    offcanvas = document.querySelector('.offcanvas');

		if (toggle && offcanvas) {
			toggle.addEventListener('click', function(event) {
				offcanvas.classList.toggle('show');
			});
		}
	});

})();

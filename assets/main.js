// Webpack Imports
import * as bootstrap from 'bootstrap';

(function () {
	'use strict';

	// Focus input if Searchform is empty
	[].forEach.call(document.querySelectorAll('.search-form'), (el) => {
		el.addEventListener('submit', function (e) {
			var search = el.querySelector('input');
			if (search.value.length < 1) {
				e.preventDefault();
				search.focus();
			}
		});
	});

	// Initialize Popovers: https://getbootstrap.com/docs/5.0/components/popovers
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl, {
			trigger: 'focus',
		});
	});
})();


// Scrolling Header States

document.addEventListener('DOMContentLoaded', function() {
var header = document.getElementById('header');

	window.addEventListener('scroll', function() {
		if (window.scrollY >= 50) {
		header.classList.add('scrolled');
		} else {
		header.classList.remove('scrolled');
		}
	});
});


// Getting shareable link for course pages

document.addEventListener('DOMContentLoaded', function() {
    function copyLinkToClipboard() {
        var tempInput = document.createElement("input");
        tempInput.value = window.location.href;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        var copyMessage = document.getElementById("copyMessage");
        copyMessage.style.display = "block";
        setTimeout(function() {
            copyMessage.style.display = "none";
        }, 3000);
    }

    document.getElementById("copyLinkButton").addEventListener("click", copyLinkToClipboard);
});


// Read More Link for Course Archive Pages

document.addEventListener('DOMContentLoaded', function() {
    var readMoreLink = document.querySelector('.read-more');
    var fullDescription = document.querySelector('.full-description');

    // Toggle the full description with a transition effect
    readMoreLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Toggle the 'open' class to expand/collapse
        if (fullDescription.classList.contains('open')) {
            fullDescription.classList.remove('open');
            readMoreLink.textContent = 'Read more';
        } else {
            fullDescription.classList.add('open');
            readMoreLink.textContent = 'Read less';
        }
    });
});


// Read More Link for Store Page

document.addEventListener('DOMContentLoaded', function() {
    var readMoreLink = document.querySelector('.read-more');
    var fullDescription = document.querySelector('.shop-description-remaining');

    readMoreLink.addEventListener('click', function(event) {
        event.preventDefault();

        if (fullDescription.classList.contains('open')) {
            fullDescription.classList.remove('open');
            readMoreLink.textContent = 'Read more';
        } else {
            fullDescription.classList.add('open');
            readMoreLink.textContent = 'Read less';
        }
    });
});



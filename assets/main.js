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

        // Change button text to indicate link copied, including the icon
        var copyButton = document.getElementById("copyLinkButton");
        var originalText = copyButton.innerHTML;
        copyButton.innerHTML = 'Link copied to clipboard! <i class="fa-solid fa-circle-check"></i>';
        
        // Add "copy-confirm" class
        copyButton.classList.add("copy-confirm");

        // Revert back to original text and remove the class after 3 seconds
        setTimeout(function() {
            copyButton.innerHTML = originalText;
            copyButton.classList.remove("copy-confirm");
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


// Making each section fade in when scrolled on

window.addEventListener("load", function() {
    const elementsToObserve = document.querySelectorAll(".wptww-quote, section, article, .service-block, .wp-block-cover__inner-container, .hero > .container, .page-id-14.about-text-section h3, .page-id-14.about-text-section p, .single .hero .hero-overlay, .single .side-card, .page-id-318 .wp-block-cover__inner-container, .page-id-265 .shop-courses-section .wp-block-post");

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.25,
        }
    );

    elementsToObserve.forEach(element => {
        observer.observe(element);
    });
});

// Parallax effect for All Courses page 

let scrollPosition = 0;
let targetPosition = 0;

document.addEventListener('scroll', function() {
    targetPosition = window.pageYOffset * 0.25;
    requestAnimationFrame(smoothParallax);
});

function smoothParallax() {
    // Interpolate between current and target positions to create easing
    scrollPosition += (targetPosition - scrollPosition) * 0.1; // Adjust 0.1 for different easing speeds
    document.body.style.backgroundPositionY = -scrollPosition + 'px';

    // Continue the animation if the target position hasn't been reached
    if (Math.abs(targetPosition - scrollPosition) > 0.1) {
        requestAnimationFrame(smoothParallax);
    }
}


// Contact link automatically dismisses offcanvas menu 

document.addEventListener('DOMContentLoaded', function () {
    const contactLink = document.querySelector('.nav-link[href="#contact"]');
    const offcanvasElement = document.querySelector('.offcanvas');

    contactLink.addEventListener('click', function (e) {
        // Close the offcanvas menu
        const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
        if (bsOffcanvas) {
            bsOffcanvas.hide();
        }
    });
});


// AAutomatically select value from dropdown from CTA's on Services page 

document.addEventListener('DOMContentLoaded', function () {
    const ctaButtons = [
        { selector: '.cta-academic', value: 'Academic Mentoring and Support' },
        { selector: '.cta-past-paper', value: 'Past Paper Marking Service' },
        { selector: '.cta-ucas', value: 'UCAS Application Guidance and Advice' },
        { selector: '.cta-professional', value: 'Professional Report and Reference Services' }
    ];

    ctaButtons.forEach(cta => {
        const button = document.querySelector(cta.selector);
        if (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector('#contact').scrollIntoView({
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    const dropdown = document.querySelector('#contact select#ContactSubjectOption');
                    if (dropdown) {
                        dropdown.value = cta.value;
                    }
                }, 500);
            });
        }
    });
});

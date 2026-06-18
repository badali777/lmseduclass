/**
 * File script.js.
 *
 * Main theme JavaScript functionality.
 */
(function () {
	'use strict';

	// Smooth scroll for anchor links
	const anchorLinks = document.querySelectorAll('a[href^="#"]');

	anchorLinks.forEach(function (link) {
		link.addEventListener('click', function (e) {
			const href = this.getAttribute('href');

			if (href !== '#' && href !== '#0') {
				const target = document.querySelector(href);

				if (target) {
					e.preventDefault();
					target.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
				}
			}
		});
	});

	// Back to top button
	window.addEventListener('scroll', function () {
		const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		const backToTop = document.querySelector('.el-back-to-top');
		if (backToTop) {
			if (scrollTop > 300) {
				backToTop.classList.add('visible');
			} else {
				backToTop.classList.remove('visible');
			}
		}
	});

	document.addEventListener('click', function (e) {
		const t = e.target.closest('.el-back-to-top');
		if (t) {
			e.preventDefault();
			window.scrollTo({ top: 0, behavior: 'smooth' });
			// Move focus to top of page for accessibility
			const primary = document.getElementById('primary');
			if (primary) {
				primary.setAttribute('tabindex', '-1');
				primary.focus();
				setTimeout(function () {
					primary.removeAttribute('tabindex');
				}, 100);
			}
		}
	});

	// Keyboard support for back-to-top button
	document.addEventListener('keydown', function (e) {
		const backToTop = document.querySelector('.el-back-to-top');
		if (backToTop && document.activeElement === backToTop) {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				window.scrollTo({ top: 0, behavior: 'smooth' });
				// Move focus to top of page for accessibility
				const primary = document.getElementById('primary');
				if (primary) {
					primary.setAttribute('tabindex', '-1');
					primary.focus();
					setTimeout(function () {
						primary.removeAttribute('tabindex');
					}, 100);
				}
			}
		}
	});

	// Sticky header functionality
	const header = document.getElementById('masthead');
	if (header) {
		let lastScroll = 0;
		const headerHeight = header.offsetHeight;

		window.addEventListener('scroll', function () {
			const currentScroll = window.pageYOffset;

			if (currentScroll > headerHeight) {
				header.classList.add('scrolled');
			} else {
				header.classList.remove('scrolled');
			}

			lastScroll = currentScroll;
		});
	}

	// Add loaded class to body when page is fully loaded
	window.addEventListener('load', function () {
		document.body.classList.add('loaded');
	});

	// Intersection Observer: reveal elements with .el-wow
	const wowElements = document.querySelectorAll('.el-wow');
	if (wowElements.length && 'IntersectionObserver' in window) {
		const io = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-inview');
					io.unobserve(entry.target);
				}
			});
		}, { rootMargin: '0px 0px -10% 0px' });

		wowElements.forEach((el) => io.observe(el));
	}



	// Blog tabs filtering on front/home
	(function blogTabs() {
		const container = document.querySelector('.el-blog-tabs');
		if (!container) return;
		const tabs = container.querySelectorAll('.el-blog-tab');
		const cards = document.querySelectorAll('.el-blog-card');

		function applyFilter(slug) {
			if (!slug) return;

			let hasVisibleCards = false;

			cards.forEach(function (card) {
				const cats = (card.getAttribute('data-cats') || '').split(/\s+/).filter(function (cat) {
					return cat.length > 0;
				});

				// Normalize slug for comparison (handle uncategorized, post formats, etc.)
				const normalizedSlug = slug.toLowerCase().trim();
				const matches = cats.some(function (cat) {
					return cat.toLowerCase() === normalizedSlug;
				});

				if (matches) {
					card.style.display = '';
					hasVisibleCards = true;
				} else {
					card.style.display = 'none';
				}
			});

			// Show message if no posts found.
			const loopContainer = document.querySelector('.el-blog-loop');
			const liveRegion = document.getElementById('aria-live-region');
			if (loopContainer) {
				let noResultsMsg = loopContainer.querySelector('.el-no-results');
				if (!hasVisibleCards && !noResultsMsg) {
					noResultsMsg = document.createElement('p');
					noResultsMsg.className = 'el-no-results';
					noResultsMsg.setAttribute('role', 'status');
					noResultsMsg.setAttribute('aria-live', 'polite');
					noResultsMsg.textContent = 'No posts found in this category.';
					loopContainer.appendChild(noResultsMsg);
					// Announce to screen readers
					if (liveRegion) {
						liveRegion.textContent = 'No posts found in this category.';
					}
				} else if (hasVisibleCards && noResultsMsg) {
					noResultsMsg.remove();
					// Clear announcement
					if (liveRegion) {
						liveRegion.textContent = '';
					}
				}
			}
		}

		function activateTab(tab) {
			tabs.forEach(function (t) {
				t.classList.remove('is-active');
				t.setAttribute('aria-selected', 'false');
			});
			tab.classList.add('is-active');
			tab.setAttribute('aria-selected', 'true');
			applyFilter(tab.getAttribute('data-filter'));
			// Announce tab change to screen readers
			const liveRegion = document.getElementById('aria-live-region');
			if (liveRegion) {
				liveRegion.textContent = 'Showing posts from ' + tab.textContent.trim() + ' category';
			}
			tab.focus();
		}

		// Set initial filter to first active tab.
		const activeTab = container.querySelector('.el-blog-tab.is-active');
		if (activeTab) {
			applyFilter(activeTab.getAttribute('data-filter'));
		}

		tabs.forEach(function (tab, index) {
			// Click handler
			tab.addEventListener('click', function () {
				activateTab(this);
			});

			// Keyboard navigation: Arrow keys, Home, End
			tab.addEventListener('keydown', function (e) {
				let targetTab = null;
				const currentIndex = Array.from(tabs).indexOf(this);

				switch (e.key) {
					case 'ArrowRight':
					case 'ArrowDown':
						e.preventDefault();
						targetTab = tabs[currentIndex + 1] || tabs[0];
						break;
					case 'ArrowLeft':
					case 'ArrowUp':
						e.preventDefault();
						targetTab = tabs[currentIndex - 1] || tabs[tabs.length - 1];
						break;
					case 'Home':
						e.preventDefault();
						targetTab = tabs[0];
						break;
					case 'End':
						e.preventDefault();
						targetTab = tabs[tabs.length - 1];
						break;
					case 'Enter':
					case ' ':
						e.preventDefault();
						activateTab(this);
						return;
				}

				if (targetTab) {
					activateTab(targetTab);
				}
			});
		});
	})();



	// Mobile menu toggle is handled by navigation.js
	// Removed duplicate handler to prevent conflicts

})();
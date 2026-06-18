/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	const siteNavigation = document.getElementById('site-navigation');

	// Return early if the navigation doesn't exist.
	if (!siteNavigation) {
		return;
	}

	const button = siteNavigation.getElementsByTagName('button')[0];

	// Return early if the button doesn't exist.
	if ('undefined' === typeof button) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof menu) {
		button.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked or Enter key is pressed.
	function toggleMenu() {
		siteNavigation.classList.toggle('toggled');

		if (button.getAttribute('aria-expanded') === 'true') {
			button.setAttribute('aria-expanded', 'false');
		} else {
			button.setAttribute('aria-expanded', 'true');
		}
	}

	button.addEventListener('click', toggleMenu);

	// Handle Enter key on menu toggle button
	button.addEventListener('keydown', function (e) {
		if (e.key === 'Enter' || e.key === ' ') {
			e.preventDefault();
			toggleMenu();
		}
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function (event) {
		const isClickInside = siteNavigation.contains(event.target);

		if (!isClickInside && siteNavigation.classList.contains('toggled')) {
			siteNavigation.classList.remove('toggled');
			button.setAttribute('aria-expanded', 'false');
		}
	});

	// Handle Escape key to close menu and submenus
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape') {
			if (siteNavigation.classList.contains('toggled')) {
				siteNavigation.classList.remove('toggled');
				button.setAttribute('aria-expanded', 'false');
				button.focus();
			}

			// Close any open desktop submenus
			const focusedItems = siteNavigation.querySelectorAll('.focus');
			focusedItems.forEach(item => {
				item.classList.remove('focus');
				const link = item.querySelector('a[aria-expanded="true"]');
				if (link) {
					link.setAttribute('aria-expanded', 'false');
				}
			});

			// Close mobile submenus
			const openSubmenus = siteNavigation.querySelectorAll('.submenu-open');
			openSubmenus.forEach(item => {
				item.classList.remove('submenu-open');
				const subMenu = item.querySelector('.sub-menu, .children');
				if (subMenu) {
					subMenu.style.display = 'none';
				}
				const link = item.querySelector('a[aria-expanded="true"]');
				if (link) {
					link.setAttribute('aria-expanded', 'false');
				}
			});
		}
	});

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName('a');

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of links) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}

	/**
	 * Sets or removes .focus class on an element and toggles aria-expanded.
	 * @param {Event} event - The event object
	 */
	function toggleFocus(event) {
		if (event.type === 'focus') {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (self && !self.classList.contains('nav-menu')) {
				// On li elements add the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.add('focus');

					// Set aria-expanded on the anchor child if it has sub-menus
					const anchor = self.querySelector(':scope > a');
					if (anchor && (self.classList.contains('menu-item-has-children') || self.classList.contains('page_item_has_children'))) {
						anchor.setAttribute('aria-expanded', 'true');
					}
				}
				self = self.parentNode;
				if (!self || !self.classList) {
					break;
				}
			}
		}

		if (event.type === 'blur') {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (self && !self.classList.contains('nav-menu')) {
				// On li elements, only remove .focus if we're not moving to a child element
				if ('li' === self.tagName.toLowerCase()) {
					// Check if the newly focused element is a descendant of this li
					const newFocusedElement = event.relatedTarget;
					const isMovingToChild = newFocusedElement && self.contains(newFocusedElement);

					if (!isMovingToChild) {
						self.classList.remove('focus');

						// Set aria-expanded to false on the anchor child if it has sub-menus
						const anchor = self.querySelector(':scope > a');
						if (anchor && (self.classList.contains('menu-item-has-children') || self.classList.contains('page_item_has_children'))) {
							anchor.setAttribute('aria-expanded', 'false');
						}
					}
				}
				self = self.parentNode;
				if (!self || !self.classList) {
					break;
				}
			}
		}

		if (event.type === 'touchstart') {
			const menuItem = this.parentNode;
			event.preventDefault();
			for (const link of menuItem.parentNode.children) {
				if (menuItem !== link) {
					link.classList.remove('focus');
				}
			}
			menuItem.classList.toggle('focus');
		}
	}
})();

// Toggle view all categories in blog sidebar
(function () {
	document.addEventListener('DOMContentLoaded', function () {
		var btn = document.querySelector('.el-view-all-cats');
		if (!btn) return;

		var collapse = document.querySelector('.el-categories-collapse');
		if (!collapse) return;

		// Ensure button has proper ARIA attributes
		if (!btn.hasAttribute('aria-expanded')) {
			btn.setAttribute('aria-expanded', 'false');
		}
		if (!btn.hasAttribute('aria-controls')) {
			btn.setAttribute('aria-controls', 'el-categories-collapse');
		}
		if (!collapse.hasAttribute('id')) {
			collapse.setAttribute('id', 'el-categories-collapse');
		}
		if (!btn.hasAttribute('role')) {
			btn.setAttribute('role', 'button');
		}

		function toggleCategories() {
			var expanded = btn.getAttribute('aria-expanded') === 'true';
			if (expanded) {
				// hide
				collapse.style.display = 'none';
				collapse.setAttribute('aria-hidden', 'true');
				btn.setAttribute('aria-expanded', 'false');
				btn.textContent = 'View all categories';
			} else {
				// show
				collapse.style.display = 'block';
				collapse.setAttribute('aria-hidden', 'false');
				btn.setAttribute('aria-expanded', 'true');
				btn.textContent = 'Hide categories';
			}
		}

		btn.addEventListener('click', toggleCategories);

		// Keyboard support
		btn.addEventListener('keydown', function (e) {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				toggleCategories();
			}
		});
	});
})();

// Mobile Menu Submenu Toggle for Mobile/Tablet (up to 1024px)
(function () {
	'use strict';

	function initSubmenuToggle() {
		// Handle parent link clicks on mobile - toggle submenu directly
		document.addEventListener('click', function (e) {
			// Only on mobile/tablet (hamburger active up to 1220px)
			if (window.innerWidth > 1220) {
				return;
			}

			// Check if clicked element is a parent menu link
			// First, find if the clicked element or its parent is a link
			let link = e.target;
			if (link.tagName !== 'A') {
				link = link.closest('a');
			}
			if (!link) {
				return;
			}

			// Check if the link's parent is a menu item with children
			const parentLi = link.parentElement;
			if (!parentLi ||
				(!parentLi.classList.contains('menu-item-has-children') &&
					!parentLi.classList.contains('page_item_has_children'))) {
				return;
			}

			// Find submenu (direct child only)
			let subMenu = null;
			for (let i = 0; i < parentLi.children.length; i++) {
				const child = parentLi.children[i];
				if (child.classList.contains('sub-menu') || child.classList.contains('children')) {
					subMenu = child;
					break;
				}
			}
			if (!subMenu) {
				return;
			}

			// Prevent default link behavior
			e.preventDefault();
			e.stopPropagation();

			const isOpen = parentLi.classList.contains('submenu-open');

			if (isOpen) {
				// Close this submenu
				parentLi.classList.remove('submenu-open');
				subMenu.style.display = 'none';
				link.setAttribute('aria-expanded', 'false');

				// Close all child submenus
				const childSubmenus = subMenu.querySelectorAll('.submenu-open');
				childSubmenus.forEach(function (item) {
					item.classList.remove('submenu-open');
					const childLink = item.querySelector('a');
					if (childLink) {
						childLink.setAttribute('aria-expanded', 'false');
					}
				});
				const childSubMenus = subMenu.querySelectorAll('.sub-menu, .children');
				childSubMenus.forEach(function (menu) {
					menu.style.display = 'none';
				});
			} else {
				// Close sibling submenus at the same level
				const siblings = Array.from(parentLi.parentElement.children);
				siblings.forEach(function (sibling) {
					if (sibling !== parentLi && sibling.classList.contains('submenu-open')) {
						sibling.classList.remove('submenu-open');
						// Find direct child submenu
						for (let j = 0; j < sibling.children.length; j++) {
							const child = sibling.children[j];
							if (child.classList.contains('sub-menu') || child.classList.contains('children')) {
								child.style.display = 'none';
								const siblingLink = sibling.querySelector('a');
								if (siblingLink) {
									siblingLink.setAttribute('aria-expanded', 'false');
								}
								break;
							}
						}
					}
				});

				// Open this submenu
				parentLi.classList.add('submenu-open');
				subMenu.style.display = 'block';
				link.setAttribute('aria-expanded', 'true');
			}
		});

		// Close all submenus when mobile menu is closed
		const menuToggle = document.querySelector('.menu-toggle');
		if (menuToggle) {
			menuToggle.addEventListener('click', function () {
				const siteNavigation = document.getElementById('site-navigation');
				if (siteNavigation && !siteNavigation.classList.contains('toggled')) {
					// Menu is being closed
					const openSubmenus = document.querySelectorAll('.submenu-open');
					openSubmenus.forEach(function (item) {
						item.classList.remove('submenu-open');
					});
					const subMenus = document.querySelectorAll('.sub-menu, .children');
					subMenus.forEach(function (menu) {
						menu.style.display = 'none';
					});
				}
			});
		}
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initSubmenuToggle);
	} else {
		initSubmenuToggle();
	}
})();
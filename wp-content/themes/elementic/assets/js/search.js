/**
 * AJAX Search Functionality
 *
 * @package Elementic
 */
(function ($) {
	'use strict';

	let searchTimeout;
	let currentRequest;

	// Initialize search functionality.
	function initSearch() {
		const searchForms = document.querySelectorAll('.search-form');

		searchForms.forEach(function (form) {
			const searchField = form.querySelector('.search-field');
			const searchResults = form.querySelector('#el-ajax-search-results');
			const searchSubmit = form.querySelector('.search-submit');

			if (!searchField || !searchResults) return;

			// Handle input typing for AJAX search.
			searchField.addEventListener('input', function () {
				const searchTerm = this.value.trim();

				// Clear previous timeout.
				if (searchTimeout) {
					clearTimeout(searchTimeout);
				}

				// Cancel previous request if still pending.
				if (currentRequest && currentRequest.readyState !== 4) {
					currentRequest.abort();
				}

				// Hide results if less than 3 characters.
				if (searchTerm.length < 3) {
					searchResults.style.display = 'none';
					searchResults.innerHTML = '';
					searchField.setAttribute('aria-expanded', 'false');
					return;
				}

				// Debounce search request.
				searchTimeout = setTimeout(function () {
					performAjaxSearch(searchTerm, searchResults, searchField);
				}, 300);
			});

			// Handle form submission (button click or Enter key).
			form.addEventListener('submit', function (e) {
				const searchTerm = searchField.value.trim();

				if (searchTerm.length < 1) {
					e.preventDefault();
					return false;
				}

				// Hide AJAX results on form submit.
				searchResults.style.display = 'none';
				searchField.setAttribute('aria-expanded', 'false');
				// Allow normal form submission to proceed.
			});

			// Hide results when clicking outside.
			document.addEventListener('click', function (e) {
				if (!form.contains(e.target)) {
					searchResults.style.display = 'none';
					searchField.setAttribute('aria-expanded', 'false');
				}
			});

			// Hide results on Escape key.
			searchField.addEventListener('keydown', function (e) {
				if (e.key === 'Escape') {
					searchResults.style.display = 'none';
					searchField.focus();
				}
			});

			// Keyboard navigation for search results
			searchField.addEventListener('keydown', function (e) {
				const resultItems = searchResults.querySelectorAll('.el-search-result-item, .el-search-more-link');
				if (resultItems.length === 0) return;

				const currentIndex = Array.from(resultItems).indexOf(document.activeElement);
				let targetIndex = -1;

				switch (e.key) {
					case 'ArrowDown':
						e.preventDefault();
						targetIndex = currentIndex < resultItems.length - 1 ? currentIndex + 1 : 0;
						resultItems[targetIndex].focus();
						break;
					case 'ArrowUp':
						e.preventDefault();
						if (currentIndex === -1) {
							targetIndex = resultItems.length - 1;
						} else {
							targetIndex = currentIndex > 0 ? currentIndex - 1 : resultItems.length - 1;
						}
						resultItems[targetIndex].focus();
						break;
					case 'Escape':
						e.preventDefault();
						searchResults.style.display = 'none';
						searchField.focus();
						break;
				}
			});

			// Handle keyboard navigation within results
			searchResults.addEventListener('keydown', function (e) {
				const resultItems = searchResults.querySelectorAll('.el-search-result-item, .el-search-more-link');
				if (resultItems.length === 0) return;

				const currentIndex = Array.from(resultItems).indexOf(e.target);
				if (currentIndex === -1) return;

				switch (e.key) {
					case 'ArrowDown':
						e.preventDefault();
						const nextIndex = currentIndex < resultItems.length - 1 ? currentIndex + 1 : 0;
						resultItems[nextIndex].focus();
						break;
					case 'ArrowUp':
						e.preventDefault();
						const prevIndex = currentIndex > 0 ? currentIndex - 1 : resultItems.length - 1;
						resultItems[prevIndex].focus();
						break;
					case 'Escape':
						e.preventDefault();
						searchResults.style.display = 'none';
						searchField.focus();
						break;
					case 'Home':
						e.preventDefault();
						resultItems[0].focus();
						break;
					case 'End':
						e.preventDefault();
						resultItems[resultItems.length - 1].focus();
						break;
				}
			});
		});
	}

	// Perform AJAX search.
	function performAjaxSearch(searchTerm, resultsContainer, searchField) {
		// Show loading state.
		resultsContainer.innerHTML = '<div class="el-search-loading"><i class="fas fa-spinner fa-spin"></i> ' + 'Searching...' + '</div>';
		resultsContainer.style.display = 'block';

		// Prepare AJAX request.
		currentRequest = $.ajax({
			url: elementicSearch.ajaxurl,
			type: 'POST',
			data: {
				action: 'elementic_search',
				search: searchTerm,
				nonce: elementicSearch.nonce
			},
			success: function (response) {
				if (response.success && response.data.results.length > 0) {
					displaySearchResults(response.data.results, resultsContainer, response.data.count);
				} else {
					resultsContainer.innerHTML = '<div class="el-search-no-results">' + 'No results found.' + '</div>';
				}
				resultsContainer.style.display = 'block';
				searchField.setAttribute('aria-expanded', 'true');
			},
			error: function (xhr, status, error) {
				if (status !== 'abort') {
					resultsContainer.innerHTML = '<div class="el-search-error">' + 'Search error. Please try again.' + '</div>';
					resultsContainer.style.display = 'block';
				}
			}
		});
	}

	// Display search results.
	function displaySearchResults(results, container, totalCount) {
		const searchField = document.querySelector('.search-field');
		const searchTerm = searchField ? searchField.value : '';

		let html = '<div class="el-search-results-list" role="listbox" aria-label="Search results">';

		results.forEach(function (result, index) {
			// Escape HTML to prevent XSS.
			const title = $('<div>').text(result.title).html();
			const excerpt = result.excerpt ? $('<div>').text(result.excerpt).html() : '';
			const url = result.url;
			const type = $('<div>').text(result.type).html();
			const date = $('<div>').text(result.date).html();
			const thumbnail = result.thumbnail ? '<img src="' + result.thumbnail + '" alt="' + title + '" class="el-search-thumb" />' : '';

			html += '<a href="' + url + '" class="el-search-result-item" role="option" tabindex="' + (index === 0 ? '0' : '-1') + '" aria-label="' + title + '">';
			html += '<div class="el-search-result-content">';
			if (thumbnail) {
				html += '<div class="el-search-result-thumb">' + thumbnail + '</div>';
			}
			html += '<div class="el-search-result-text">';
			html += '<h4 class="el-search-result-title">' + title + '</h4>';
			if (excerpt) {
				html += '<p class="el-search-excerpt">' + excerpt + '</p>';
			}
			html += '<div class="el-search-result-meta">';
			html += '<span class="el-search-result-type">' + type + '</span>';
			html += '<span class="el-search-result-date">' + date + '</span>';
			html += '</div>';
			html += '</div>';
			html += '</div>';
			html += '</a>';
		});

		if (totalCount > results.length) {
			const searchUrl = window.location.origin + '/?s=' + encodeURIComponent(searchTerm);
			html += '<div class="el-search-more">';
			html += '<a href="' + searchUrl + '" class="el-search-more-link" role="option" tabindex="-1" aria-label="View all ' + totalCount + ' results">';
			html += 'View all ' + totalCount + ' results';
			html += '</a>';
			html += '</div>';
		}

		html += '</div>';
		container.innerHTML = html;
		container.setAttribute('aria-live', 'polite');
		container.setAttribute('aria-atomic', 'false');
	}

	// Initialize on DOM ready.
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initSearch);
	} else {
		initSearch();
	}

})(jQuery);


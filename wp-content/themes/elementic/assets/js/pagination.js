/**
 * Magic Line Pagination with AJAX
 */
(function ($) {
    'use strict';

    $(document).ready(function () {
        // Support either the magic-line style or numeric pagination
        const $pagination = $('.magic-line-pagination, .numeric-pagination').first();

        if (!$pagination.length) {
            return;
        }

        const $container = $pagination.find('.magic-line-container');
        const $magicLine = $pagination.find('.magic-line');
        const $links = $pagination.find('.page-numbers, .page-numbers.current, .page-numbers:not(.dots)');
        let $currentLink = $pagination.find('.page-numbers.current');
        const $siteMain = $('#primary');

        // Initialize magic line position
        function initMagicLine() {
            // Re-select current link in case DOM changed
            $currentLink = $('.page-numbers.current');
            if ($currentLink.length) {
                // Use setTimeout to ensure layout is complete
                setTimeout(function () {
                    moveMagicLine($currentLink);
                }, 100);
            }
        }

        // Move magic line to active link
        function moveMagicLine($target) {
            if (!$target.length || !$magicLine.length) return;

            const targetOffset = $target.position().left;
            const targetWidth = $target.outerWidth();

            if (targetOffset >= 0 && targetWidth > 0) {
                $magicLine.css({
                    'left': targetOffset + 'px',
                    'width': targetWidth + 'px',
                    'opacity': '1'
                });
            } else {
                // Retry after a short delay if position not ready
                setTimeout(function () {
                    const retryOffset = $target.position().left;
                    const retryWidth = $target.outerWidth();
                    if (retryOffset >= 0 && retryWidth > 0) {
                        $magicLine.css({
                            'left': retryOffset + 'px',
                            'width': retryWidth + 'px',
                            'opacity': '1'
                        });
                    }
                }, 200);
            }
        }

        // Handle pagination click (delegated from the pagination container)
        $pagination.on('click', '.page-numbers:not(.current):not(.dots)', function (e) {
            e.preventDefault();

            const $link = $(this);
            const page = $link.data('page') || $link.attr('href');

            // Don't proceed if it's a regular link (fallback)
            if (typeof page === 'undefined' || page === null) {
                return;
            }

            // Get page number from data attribute or href
            let pageNum = $link.data('page');
            if (!pageNum && typeof page === 'string' && page.includes('paged=')) {
                const match = page.match(/paged[=\/](\d+)/);
                pageNum = match ? parseInt(match[1], 10) : 1;
            } else if (!pageNum) {
                pageNum = 1;
            }

            // Show loading state
            $siteMain.addClass('loading');
            $link.addClass('loading');

            // Determine query type and archive context. Prefer explicit data attributes on the main container.
            let queryType = 'default';
            let archiveType = '';
            let archiveId = 0;
            let year = '';
            let month = '';
            let authorId = 0;

            // Read archive context from data attributes on the main posts container if present
            const dataArchiveType = $siteMain.data('archive-type');
            const dataArchiveId = $siteMain.data('archive-id');
            const dataYear = $siteMain.data('year');
            const dataMonth = $siteMain.data('month');
            const dataAuthor = $siteMain.data('author-id');

            if (typeof dataArchiveType !== 'undefined' && dataArchiveType) {
                queryType = 'archive';
                archiveType = dataArchiveType;
                archiveId = dataArchiveId || 0;
                year = dataYear || '';
                month = dataMonth || '';
                authorId = dataAuthor || 0;
            } else {
                // Fallback to inferring from body classes (best-effort)
                if ($('body').hasClass('category')) {
                    queryType = 'archive';
                    archiveType = 'category';
                } else if ($('body').hasClass('tag')) {
                    queryType = 'archive';
                    archiveType = 'tag';
                } else if ($('body').hasClass('author')) {
                    queryType = 'archive';
                    archiveType = 'author';
                } else if ($('body').hasClass('date')) {
                    queryType = 'archive';
                    archiveType = 'date';
                }
            }

            // AJAX request
            $.ajax({
                url: elementicPagination.ajaxurl,
                type: 'POST',
                data: {
                    action: 'elementic_pagination',
                    nonce: elementicPagination.nonce,
                    page: pageNum,
                    query_type: queryType,
                    archive_type: archiveType,
                    archive_id: archiveId,
                    year: year,
                    month: month,
                    author_id: authorId
                },
                success: function (response) {
                    if (response.success) {
                        // Update content
                        const $postsContainer = $siteMain.find('.posts-container');
                        if ($postsContainer.length) {
                            $postsContainer.fadeOut(200, function () {
                                $(this).html(response.data.content).fadeIn(300);
                            });
                        } else {
                            // Find all posts and replace them
                            const $existingPosts = $siteMain.find('article.post, article.entry-item');
                            if ($existingPosts.length) {
                                const $parent = $existingPosts.first().parent();
                                $existingPosts.fadeOut(200, function () {
                                    const $newContent = $(response.data.content);
                                    $parent.html($newContent).hide().fadeIn(300);
                                });
                            } else {
                                // Insert before pagination
                                $pagination.before($(response.data.content).hide().fadeIn(300));
                            }
                        }

                        // Update pagination (replace the current pagination block)
                        const $newPagination = $(response.data.pagination);
                        $pagination.replaceWith($newPagination);

                        // Reinitialize magic line after a short delay
                        setTimeout(function () {
                            const $newCurrent = $newPagination.find('.page-numbers.current');
                            if ($newCurrent.length) {
                                moveMagicLine($newCurrent);
                            }
                        }, 100);

                        // Scroll to top of posts and set focus
                        $('html, body').animate({
                            scrollTop: $siteMain.offset().top - 100
                        }, 500, function () {
                            // Set focus to the main container for screen readers
                            $siteMain.attr('tabindex', '-1').focus();
                        });

                        // Update URL without reload
                        const newUrl = $link.attr('href') || window.location.href.split('?')[0] + '?paged=' + pageNum;
                        window.history.pushState({ page: pageNum }, '', newUrl);
                    }
                },
                error: function (xhr, status, error) {
                    // Fallback to regular link
                    window.location.href = $link.attr('href');
                },
                complete: function () {
                    $siteMain.removeClass('loading');
                    $link.removeClass('loading');
                }
            });
        });

        // Handle browser back/forward buttons
        $(window).on('popstate', function (e) {
            if (e.originalEvent.state && e.originalEvent.state.page) {
                const pageNum = e.originalEvent.state.page;
                const $link = $pagination.find('.page-numbers[data-page="' + pageNum + '"]');
                if ($link.length) {
                    $link.trigger('click');
                }
            }
        });

        // Initialize on page load - with multiple attempts
        initMagicLine();

        // Also try after images load
        $(window).on('load', function () {
            setTimeout(initMagicLine, 50);
        });

        // Update magic line on window resize
        let resizeTimer;
        $(window).on('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                $currentLink = $('.page-numbers.current');
                if ($currentLink.length) {
                    moveMagicLine($currentLink);
                }
            }, 250);
        });

        // Also initialize after a short delay to ensure everything is rendered
        setTimeout(initMagicLine, 300);
    });

})(jQuery);


(function($) {
    "use strict";

    // Open search overlay
    $('.search-toggle').on('click', function(e) {
        e.preventDefault();
        $('.elms-search-overlay').addClass('active');
        $('.elms-search-overlay .search-field').val('').focus();
        $('body').css('overflow', 'hidden');
    });

    // Close search overlay
    $('.search-close').on('click', function(e) {
        e.preventDefault();
        closeSearchOverlay();
    });

    // Close on overlay click (outside search form)
    $('.elms-search-overlay').on('click', function(e) {
        if ($(e.target).hasClass('elms-search-overlay')) {
            closeSearchOverlay();
        }
    });

    // Close on ESC key
    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            closeSearchOverlay();
        }
    });

    function closeSearchOverlay() {
        $('.elms-search-overlay').removeClass('active');
        $('body').css('overflow', '');
    }

    // ── Copy Link button ──────────────────────────────────────
    $(document).on('click', '.js-copy-link', function() {
        var $btn   = $(this);
        var url    = $btn.data('url');

        // Use Clipboard API if available, fall back to execCommand
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(function() {
                showCopied($btn);
            });
        } else {
            var $temp = $('<input>');
            $('body').append($temp);
            $temp.val(url).select();
            document.execCommand('copy');
            $temp.remove();
            showCopied($btn);
        }
    });

    function showCopied($btn) {
        var $iconCopy  = $btn.find('.icon-copy');
        var $iconCheck = $btn.find('.icon-check');
        var $label     = $btn.find('.copy-label');

        $btn.addClass('copied');
        $iconCopy.hide();
        $iconCheck.show();
        $label.text('Copied!');

        setTimeout(function() {
            $btn.removeClass('copied');
            $iconCopy.show();
            $iconCheck.hide();
            $label.text('Copy Link');
        }, 2200);
    }

    //Preloader settings
    $(window).on('load', function() {
        $("#loader").delay(1000).fadeOut(500);
    })

    // wow animation with animate css
    // new WOW().init();

    $(window).on("load scroll", function () {
        new WOW().init();
    });

})(jQuery);
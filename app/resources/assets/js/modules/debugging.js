/**
 * debugging.js
 *
 * A basic debugging helper.
 * - addes a small box to the bottom left corner with current breakpoint and screen width
 * - addes breakpoint class name to <body>
 *
 */

module.exports = function () {

    console.log('debugging.js');

    if($('#txtDebug').val() == 'true') {
        $('body', 'html').append('<div id="debug-message"></div>');
        $('#debug-message').append('<p class="small">small</p><p class="medium">medium</p><p class="large">large</p><p class="exlarge">extra large</p>');
        $(window).resize(function () {
            $('#debug-message').empty();
            $('#debug-message').append('<p class="small">small</p><p class="medium">medium</p><p class="large">large</p><p class="exlarge">extra large</p>');
            $('#debug-message').append('<p>width: ' + window.innerWidth + '</p>');
        });
    }

    if($('.small', '#debug-message').is(':visible')) {
        $('body').addClass('small');
    }
    if($('.medium', '#debug-message').is(':visible')) {
        $('body').addClass('medium');
    }
    if($('.large', '#debug-message').is(':visible')) {
        $('body').addClass('large');
    }
    if($('.exlarge', '#debug-message').is(':visible')) {
        $('body').addClass('exlarge');
    }

};

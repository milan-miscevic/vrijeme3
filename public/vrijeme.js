$(document).ready(function() {
    $('span[data-url]').each(function() {
        var $span = $(this);
        $.get($(this).data('url'), function(data) {
            $span.text(data);
        });
    });
});
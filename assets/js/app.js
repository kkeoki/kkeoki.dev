$(function () {
    $(window).scroll(function () {
        var $bio = $('.bio');
        var $scroller = $('.scroller');
        if ($bio.visible(true)) {
            $scroller.addClass('hidden');
        } else {
            $scroller.removeClass('hidden');
        }
        updateExpands();
    });

    $(window).on('resize', function () {
        updateExpands();
    });

    function updateExpands() {
        $(".expand").each(function (i, el) {
            el = $(el);
            if (el.visible(true)) {
                el.addClass("expand-in");
            }
        });
    }

    updateExpands();
});
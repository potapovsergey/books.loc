/**
 * Created by user on 10.05.2017.
 */
$('.carosel-control-right').click(function(e) {
    $(this).each(function () {
        e.preventDefault();
        $(this).blur();
        $(this).parent().find('.carosel-item').first().insertAfter($(this).parent().find('.carosel-item').last());
    });
});
$('.carosel-control-left').click(function(e) {
    $(this).each(function () {
        e.preventDefault();
        $(this).blur();
        $(this).parent().find('.carosel-item').last().insertBefore($(this).parent().find('.carosel-item').first());
    });
});
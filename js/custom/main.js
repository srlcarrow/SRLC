(function () {


    $(window).on('load resize', function () {
        var pageHeight = $(window)[0].innerHeight;
       // $('.full-height').css('height', pageHeight + 'px')
    });


})();

//Job Search
$(function () {

    var $isTitleHide = false,
        $jobInput = $('.job-input input[type="text"]');

    function changeTitle() {
        var $title = $('.main-title');
        var searchSection = $('.search-section');

        if ($isTitleHide) {
            $title.addClass('hide-title');
            searchSection.removeClass('full-height');
        } else {
            $title.removeClass('hide-title');
        }

    }

    //On input focus
    $jobInput.on('focus', function () {
        $isTitleHide = !$isTitleHide;
        $(this).select();
        changeTitle();
    });

    //On input blur
    $jobInput.on('blur', function () {
        $isTitleHide = !$isTitleHide;
    });

})();
var $isTitleHide = false;
//Job category Selection
var SelectedCategory = (function () {
    var _category = {
        categoryID: {
            main: [],
            sub: []
        }
    };

    $(document).on('click', '.category-list li a', function (evt) {
        evt.preventDefault();

        var $this = $(this),
            $parentUl = $this.parents('.category-list');

        //Main category
        if ($parentUl.hasClass('main')) {

            $('.category-list.main li a').removeClass('active');
            $this.addClass('active');
            _category.categoryID.main = [
                $parentUl.find('li a.active').attr('id'),
                $parentUl.find('li a.active').text()
            ];

            //If select main category All that popup will be hide
            if ($this.hasClass('all')) {
                loadJobsByCategory();
            }
        }

        //Sub category
        if ($parentUl.hasClass('sub')) {
            $('.category-list.sub li a').removeClass('active');
            $this.addClass('active');
            _category.categoryID.sub = [
                $parentUl.find('li a.active').attr('id'),
                $parentUl.find('li a.active').text()
            ];
            //Call after select
            loadJobsByCategory();
        }

    });

    return _category;

})();

// function hideTitle($isTitleHide) {
//     var $title = $('.main-title');
//     var searchSection = $('.search-section');
//
//     if ($isTitleHide) {
//         $title.addClass('hide-title');
//         $('.full-height').css('height', '');
//         searchSection.removeClass('full-height').addClass('is-search-fixed');
//         var $searchSectionHeight = searchSection.height();
//         $('#ajaxLoadAdvertisements').animate({'marginTop': '226px'}, 0);
//         $(window).scrollTop(0);
//     } else {
//         $title.removeClass('hide-title');
//     }
// }


//Job Search
var JobSearch = (function () {

    var search = {};

    var $jobInput = $('.job-input input[type="text"]');


    search.changeTitle = function () {
        var $title = $('.main-title');
        var searchSection = $('.search-section');

        hideTitle($isTitleHide);

    };

    //On input focus
    $jobInput.on('focus', function () {
        $isTitleHide = true;
        $(this).select();
        search.changeTitle();
    });

    //On input blur
    $jobInput.on('blur', function () {
        // $isTitleHide = !$isTitleHide;
    });

    //Show category Popup
    $('.show-category').on('click', function () {
        //Get layout
        //Call to server js and get layout
        CategoryPopup().html(function (html) {
            Popup.show(html);
        });
    });

    return search;
})();


function loadJobsByCategory() {
    var category = SelectedCategory.categoryID;

    // $('.job-input').find('input[type="text"]').val(category.sub[1]);
    $('.show-category').find('.selected-item span').text(category.main[1]);
    $('.job-input').find('input[type="text"]').focus();
    $('.subCategory').text(category.sub[1]);

    // if($isTitleHide)
    $isTitleHide = true;

    JobSearch.changeTitle();
    //Call to server
    loadJobData(category);
    // hide popup
    Popup.hide();
}


(function () {


    $(window).on('load resize', function () {
        var pageHeight = $(window)[0].innerHeight;
        $('.full-height').css('height', pageHeight + 'px')
    });

    $('.navbar').removeClass('light-blue').css('backgroundColor', 'transparent');
})();


(function () {

    var controller = new ScrollMagic.Controller({addIndicators: true});
    var progress = 1;
    var jobTitle = 'title';

    //Get job title position in the top.
    var $titleTopSpace = $('#searchWrapper').offset().top;

    var jobScene = new ScrollMagic.Scene({
        triggerElement: '.search-section',
        duration: '300%',
        triggerHook: 0,
        offset: 0,
    });

    // var searchScene = new ScrollMagic.Scene({
    //     triggerElement: '.search-section',
    //     duration: '300%',
    //     triggerHook: 0,
    //     offset: 0,
    // });

    jobScene.addTo(controller);
    // jobScene.setPin('.search-section', {pushFollowers: false})


    jobScene.on("progress", function (e) {
        console.log(e.scrollDirection)
        if (e.scrollDirection === "FORWARD") {
            if(progress > 0.0 ) {
                progress = Math.abs(progress - 0.0255);
                console.log(progress)
            }

        } else {
            //progress = progress + 0.008;
        }
        $('#title').css('opacity', progress)
    });
    jobScene.on("start", function (event) {
        console.log("Hit start point of scene.");
    });
    jobScene.on('enter', function () {

    });

    jobScene.on('leave', function () {

    });

})($);




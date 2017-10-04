var $isTitleHide = false;
var isScrollTop = false;
//Job category Selection

//Get job title position in the top.
var $titleTopSpace = ($('#searchWrapper').offset().top + 85);


function scrollToDown() {
    var _titleTopSpace = $titleTopSpace + 5;
    if (!$(window).scrollTop() > 0) {
        $("html, body").animate({scrollTop: _titleTopSpace}, 500);
    } else {
        $("html, body").scrollTop(_titleTopSpace);
    }

}

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
                scrollToDown();
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
            scrollToDown();
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

        //hideTitle($isTitleHide);

    };

    //On input focus
    $jobInput.on('focus', function () {
        // $isTitleHide = true;
        //$(this).select();
        // search.changeTitle();
    });

    //On input blur
    $jobInput.on('blur', function () {
        // $isTitleHide = !$isTitleHide;
    });

    //Show category Popup
    $('.show-category').on('click', function () {
        Popup.beforeShow();
        //Get layout
        //Call to server js and get layout
        CategoryPopup().html(function (html) {
            Popup.addClass('size-60');
            Popup.addClass('no-padding');
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
    //$isTitleHide = true;

    //JobSearch.changeTitle();
    //Call to server
    loadJobData(category);
    // hide popup
    Popup.hide();
}

function responsivePageHeight() {
    var pageHeight = $(window)[0].innerHeight;
    $('.full-height').css('height', pageHeight + 'px');
}

(function () {

    $(window).on('load resize', function () {
        responsivePageHeight();
    });

    $('.navbar').removeClass('light-blue').css('backgroundColor', 'transparent');
})();


(function () {

    var controller = new ScrollMagic.Controller(
        {
            addIndicators: false
        }
    );
    var progress = 1;
    var jobTitle = 'title';

    function preventDefault(e) {
        e = e || window.event;
        if (e.preventDefault)
            e.preventDefault();
        e.returnValue = false;
    }


    var jobScene = new ScrollMagic.Scene({
        triggerElement: '.search-section',
        duration: '300%',
        triggerHook: 0,
        offset: $titleTopSpace,
    });

    jobScene.addTo(controller);
    jobScene.setPin('.search-section', {pushFollowers: false});
    jobScene.on('start', function () {
        // window.onwheel = preventDefault;
        // window.ontouch = preventDefault;
        // setTimeout(function () {
        //     window.onwheel = null;
        // }, 1000)
    });

    //S 2
    var Scene = new ScrollMagic.Scene({
        triggerElement: '#title',
        duration: '30%',
        triggerHook: 0.3,
    });

    Scene.addTo(controller);
    Scene.on('progress', function (e) {
        var opt = 1 - (e.progress);
        $('#title').css({'opacity': opt});
        $('header').css({'opacity': opt, 'z-index': ''});

        $('.full-height').css('height', '');
    });

    Scene.on('start', function (e) {
        if (e.scrollDirection == "REVERSE") {
            $('.filters').css({'opacity': 0});
            responsivePageHeight();
        }
    });

    Scene.on('shift', function (e) {
        $('.filters').animate({'opacity': 1}, 10);
        $('header').css({'z-index': -1});
    });

    $('#searchText').on('focus click', function () {
        scrollToDown();
    });

})($);




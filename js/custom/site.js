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

function hideTitle($isTitleHide) {
    var $title = $('.main-title');
    var searchSection = $('.search-section');

    if ($isTitleHide) {
        $title.addClass('hide-title');
        $('.full-height').css('height', '');
        searchSection.removeClass('full-height');
        // searchSection.removeClass('full-height').addClass('is-search-fixed');
        var $searchSectionHeight = searchSection.height();
        // $('#ajaxLoadAdvertisements').animate({'marginTop': '226px'}, 0);
        //$(window).scrollTop(0);
    } else {
        $title.removeClass('hide-title');
    }
}


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

    var controller = new ScrollMagic.Controller();

    var jobTitle = 'title';


    var jobScene = new ScrollMagic.Scene({
        triggerElement: '#' + jobTitle,
        duration: '40%',
        offset: 50,
    });

    jobScene.setClassToggle('#' + jobTitle, 'active');
    jobScene.addTo(controller);
    jobScene.reverse(false);

    jobScene.on("progress", function (event) {
        console.log("Scene progress changed to " + event.progress , (1 - event.progress));
       $('.main-title').animate({'opacity': (1 - event.progress)},500);
    });
    jobScene.on('enter', function () {
        //controller.scrollTo(100);
        //$isTitleHide = true;
        //hideTitle($isTitleHide);
        //var mainTitle = $('.main-title').animate({'opacity': 0},500);
        // searchSection.addClass('is-search-fixed');
    });

    jobScene.on('leave', function () {

    });

})();




(function () {


    $(window).on('load resize', function () {
        var pageHeight = $(window)[0].innerHeight;
        $('.full-height').css('height', pageHeight + 'px')
    });


})();


//Selector
(function () {

    $('.selector').each(function () {
        var $this = $(this);

        var selectedOption = $this.find('.selected-option');
        var optionList = $this.find('.option-list');
        var htmlSelect = $this.find('select');

        var HTMLSelect = {
            selected: function (selectedDisabled) {

                var selected = htmlSelect.find('option:disabled');

                if (selectedDisabled) {
                    selected = htmlSelect.find('option:disabled');
                } else {
                    selected = htmlSelect.find('option:selected');
                }

                return [
                    selected,
                    selected.val(),
                    selected.html()
                ];
            },
            options: function () {
                var list = [];
                htmlSelect.find('option').each(function () {
                    var isSelected = false;
                    var isDisabled = false;

                    if ($(this).is(':selected')) {
                        isSelected = true;
                    }

                    if ($(this).prop('disabled')) {
                        isDisabled = true;
                    }

                    var opt = {
                        val: $(this).val(),
                        text: $(this).html(),
                        isSelected: isSelected,
                        isDisabled: isDisabled
                    };
                    list.push(opt);
                });
                return list;
            },
            getSelectVal: function () {
                return htmlSelect.val();
            },
            update: function (val) {
                htmlSelect.find('option[value="' + val + '"]').prop('selected', true);
            }

        };

        //Show Selected
        function setSelected(isSelectedVal) {
            selectedOption.find('span').html(HTMLSelect.selected(isSelectedVal)[2]);
        }

        //Set options to list
        function setOptions() {
            optionList.html('');

            HTMLSelect.options().map(function (option) {
                console.log(option)
                var li = $('<li>');

                if (option.isSelected) {
                    li.addClass('selected');
                }
                if (option.isDisabled) {
                    li.addClass('disabled');
                }

                li.html(option.text);
                li.attr('data-val', option.val);
                optionList.append(li);
            });

        }

        function updateList() {

        }

        setSelected(true);
        setOptions();

        selectedOption.on('click', function () {
            $('.option-list').css('display', 'none');
            optionList.css('display', 'block');
        });

        //option click
        optionList.find('li').on('click', function () {
            optionList.css('display', 'none');
            var $this = $(this);
            var val = $this.attr('data-val');

            HTMLSelect.update(val);
            setSelected(false);
        });


        $(document).on('click', function (evt) {
            var target = $(evt.target);

            if (!target.parents().hasClass('selector')) {
                optionList.css('display', 'none');
            }
        });

    })
})();

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
                $parentUl.find('li a.active').attr('href'),
                $parentUl.find('li a.active').text()
            ]
        }

        //Sub category
        if ($parentUl.hasClass('sub')) {
            $('.category-list.sub li a').removeClass('active');
            $this.addClass('active');
            _category.categoryID.sub = [
                $parentUl.find('li a.active').attr('href'),
                $parentUl.find('li a.active').text()
            ];
            //Call after select
            loadJobsByCategory();
        }

    });

    return _category;

})();


var $isTitleHide = false;
//Job Search
var JobSearch = (function () {

    var search = {};

    var $jobInput = $('.job-input input[type="text"]');


    search.changeTitle = function () {
        var $title = $('.main-title');
        var searchSection = $('.search-section');
        if ($isTitleHide) {

            $('body').scrollTop(0);

            $title.addClass('hide-title');
            $('.full-height').css('height', '');
            searchSection.removeClass('full-height');
        } else {
            $title.removeClass('hide-title');
        }

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

    $('.show-category').find('.selected-item span').text(category.main[1]);
    $('.job-input').find('input[type="text"]').val(category.sub[1]);

   // if($isTitleHide)
       $isTitleHide = true;

    JobSearch.changeTitle();
    //Call to server
    loadJobData(category);
    // hide popup
    Popup.hide();
}



function base_url(link) {
    return BASE_URL + link;
}

//Popup
var Popup = (function () {

    var _Popup = {};

    var popupContainer = $('.popup-container');

    _Popup.addClass = function (className) {
        popupContainer.addClass(className);
    };

    _Popup.removeClass = function (className) {
        popupContainer.removeClass(className);
    };

    function hide(callback) {
        document.querySelector('body').style.overflow = "";
        var allClass = popupContainer.attr('class').split(' ');

        allClass.map(function (className) {
            if (className !== 'popup-container') {
                popupContainer.removeClass(className);
            }
        });

        popupContainer.addClass('isHide');

        setTimeout(function () {
            if (typeof callback === "function" && callback !== undefined) {
                callback();
            }
        }, 100);

    }

    $('.popup .close').on('click', function () {
        hide();
    });

    $(document).on('keypress', function (e) {
        if (e.keyCode === 27) {
            //hide();
        }
    });

    //Public functions
    _Popup.show = function (ajaxLoad) {

        popupContainer.addClass('isShow');

        if (ajaxLoad !== undefined) {
            document.querySelector('body').style.overflow = "hidden";
            popupContainer.find('.content')
                .html('')
                .html(ajaxLoad);
        }

    };

    _Popup.loadNewLayout = function (html) {
        popupContainer.find('.content')
            .css('opacity', 0);
        if (popupContainer.hasClass('isShow')) {
            popupContainer.find('.content')
                .animate({'opacity': 1}, 800)
                .html('')
                .html(html);
        }
    };

    _Popup.hide = function (callback) {
        hide(callback);
    };

    return _Popup;
})();

var Input = (function () {

    var _selectors = 'input[type="text"],input[type="password"],input[type="number"],input[type="email"],textarea';
    var isBuild = false;

    function init() {
        var inputWrapper = $('.input-wrapper');

        inputWrapper.each(function (index) {

            var $this = $(this);

            // Setup layout
            var _inputBox = $('<div class="input-box">');
            var _inputLine = $('<div class="input-line">');
            var _animateLine = $('<div class="animate-line">');

            var _input = $this.find(_selectors);
            var _labelText = $this.find('.float-text');


            if ($this.children('.input-line').length > 0) {
                $this.find(_inputLine).remove();
                $this.find(_animateLine).remove();

            } else {
                $this
                    .append(_input)
                    .append(_labelText)
                    .append(_inputLine)
                    .append(_animateLine);
            }


            //On Input Focus
            $(document).on('focus', _selectors, function (evt) {
                var $this = $(this);

                var _parent = $this.parents('.input-wrapper');
                if (!_parent.hasClass('focus')) {

                    _parent.addClass('focus')
                        .addClass('text-top');
                }
            });

            //On Input Blur
            $(document).on('blur', _selectors, function () {
                var $this = $(this);
                var _parent = $this.parents('.input-wrapper');

                _parent.removeClass('focus')
                    .addClass('blur');

                if (_parent.hasClass('text-top') && $this.val().length === 0) {
                    _parent.removeClass('text-top');
                }

                setTimeout(function () {
                    _parent.removeClass('blur');
                }, 300);
            });

            if (index === (inputWrapper.length - 1)) {
                isBuild = true;
                updateInput();
            }
        });
    }

    function updateInput() {

        if (isBuild) {
            setTimeout(function () {
                $(document).find(_selectors).each(function () {
                    var $this = $(this);
                    var _parent = $this.parents('.input-wrapper');

                    if ($this.val().length > 0) {
                        _parent.addClass('text-top');
                    }

                });
            }, 100)
        }
    }

    $(document).ready(function () {
        updateInput();
    });

    init();

    return {
        isBuild: isBuild,
        init: init,
        updateInput: updateInput
    }

})();

//Selector
var Select = (function () {

    var select = {};

    select.init = function (ele) {
       var ele = (ele !== undefined && ele !== "") ? ele : '.selector';
console.log(ele)
        $(ele).each(function () {
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
                    htmlSelect.trigger('change');
                }

            };

            //Show Selected
            function setSelected(isSelectedVal) {
                selectedOption.find('span').html(HTMLSelect.selected(isSelectedVal)[2]);
            }

            //Set options to list
            function setOptions() {
                optionList.html('');
                var count = 0;
                var optionLength = HTMLSelect.options().length;

                if (optionLength > 9) {
                    optionList.addClass('is-scroll');
                }

                HTMLSelect.options().map(function (option) {

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
                    count++;
                });

            }


            setSelected(true);
            setOptions();

            selectedOption.on('click', function () {
                $('.option-list').css('display', 'none');
                optionList.css('display', 'block');
            });

            //option click
            optionList.on('click', 'li', function () {
                optionList.css('display', 'none');
                var $this = $(this);
                var val = $this.attr('data-val');

                HTMLSelect.update(val);
                setSelected(false);
                setOptions();
            });

            htmlSelect.on('domChanged', function () {

            });

            $(document).on('click', function (evt) {
                var target = $(evt.target);

                if (!target.parents().hasClass('selector')) {
                    optionList.css('display', 'none');
                }
            });


        })
    };


    select.init();

    return select;

})();

$.fn.SearchBox = function (opt) {
    return $(this).each(function () {

        var defOption = {
            itemClick: null,
            onEnter: null,
            onKeyUp: null
        };

        var option = $.extend(defOption, opt);

        var $this = $(this);
        var $input = $this.find('input');
        var $searchPanel = $this.find('.search-result');

        $this.addClass('input-search-box');


        $input.on('keyup', function () {
            if ($(this).val().length > 0) {
                $this.addClass('is-active');
                if (typeof option.onKeyUp === 'function') {
                    option.onKeyUp.call($this, $(this));
                }
            } else {
                $this.removeClass('is-active');
            }
        });

        $input.on('keypress', function (evt) {

            if (evt.keyCode == 13) {

                if (typeof option.onEnter === 'function') {
                    $this.removeClass('is-active');
                    option.onEnter.call($this, $(this));
                    $input.val('');
                    $input.focus();
                }
            }
        });

        $searchPanel.find('ul li').on('click', function () {
            if (typeof option.itemClick === 'function') {
                $this.removeClass('is-active');
                $input.val('');
                option.itemClick.call($this, $(this));
            }

        })

    })
};

function msg(_this, _msg, _typeClass, _opt) {
    var defOpt = {
        delay: 3000,
        stay: false
    };
    var opt = $.extend(defOpt, _opt);

    var $this = _this;

    $this
        .html(_msg)
        .addClass(_typeClass)
        .slideDown('slow', function () {
            if (!opt.stay) {
                setTimeout(function () {

                    $this.fadeOut(500, function () {
                        $this.html('')
                            .removeClass(_typeClass);
                    })

                }, opt.delay)
            }

        });
}

$.fn.Success = function (_msg, _opt) {

    return this.each(function () {
        msg($(this), _msg, 'success', _opt);
    });
};

$.fn.Error = function (_msg, _opt) {

    return this.each(function () {
        msg($(this), _msg, 'error', _opt);
    });
};

$.fn.Info = function (_msg, _opt) {

    return this.each(function () {
        msg($(this), _msg, 'error', _opt);
    });
};


var SearchBox = (function () {

    var search = {};

    $('.input-search-box').each(function () {


        return search;
    });

})();

var imageCropData = (function () {
    var cropDataName = null;
    return {
        set: function (_data) {
            cropDataName = _data;
        },
        get: function () {
            return cropDataName;
        },
        trigger: function (fn, data) {
            window[fn].call(this, data);
        }
    };
})();


//------------------------------------------------------------------------------------
//Registration
//------------------------------------------------------------------------------------
$('.btn-registration').on('click', function (evt) {
    evt.preventDefault();

    loadLayoutByAjax('/Site/RegistrationPopup', function (html) {
        Popup.addClass('registration-popup');
        Popup.show(html);
        Input.init();
    });
});

//------------------------------------------------------------------------------------
//Sign In
//------------------------------------------------------------------------------------
$('.btn-sign-in').on('click', function (evt) {

    evt.preventDefault();

    loadLayoutByAjax('/Site/SignInPopup', function (html) {
        Popup.addClass('sign-in-popup');
        Popup.addClass('small');
        Popup.show(html);
        Input.init();
    });

});

$('.popup-container').on('click', '.forget_password', function (evt) {
    evt.preventDefault();

    loadLayoutByAjax('/Site/PasswordResetFrom', function (html) {
        Popup.loadNewLayout(html);
        Input.init();
    })
});


(function () {
    var isShow = false;
    $('.profile-link').on('click', function (e) {
        var $this = $(this);

        if (!$this.hasClass('is-active')) {
            $this.addClass('is-active');
            $this.find('.drop-box').fadeIn('fast');

        }
    });

    $(document).on('click', function (e) {

        var $this = $(e.target);
        var $profileLink = $('.profile-link');

        if ($this.hasClass('is-active') ||
            $this.parents('.profile-link').hasClass('is-active')) return;

        $profileLink.find('.drop-box').fadeOut('fast');
        $profileLink.removeClass('is-active');
    });
})();

var Animation = (function () {
    var ele = null;
    return {
        load: function (_ele) {
            ele = _ele !== undefined ? _ele : '.popup';
            var html = '';
            html += '<div class="animation-outer">';
            html += '<img style="width: 80px" src="./images/system/loader/frontLoader.gif" alt="">';
            html += '<h6 class="text-black text-light-2 mt-15">Please wait...</h6>';
            html += '</div>';

            $('.popup').css('overflow', 'hidden');
            $(ele).append(html);
        },
        hide: function () {
            if (ele) {
                $('.popup').attr('style', '');
                $(ele).find('.animation-outer').remove();
            }
        }
    }
})();
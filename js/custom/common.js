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

    //Public functions
    _Popup.show = function (ajaxLoad) {

        popupContainer.addClass('isShow');

        if (ajaxLoad !== undefined) {

            popupContainer.find('.content')
                .html('')
                .html(ajaxLoad);
        }

    };

    _Popup.loadNewLayout = function (html) {
        if (popupContainer.hasClass('isShow')) {
            popupContainer.find('.content')
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

            $this
            // .append(_inputBox)
                .append(_input)
                .append(_labelText)
                .append(_inputLine)
                .append(_animateLine);

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
        init:init,
        updateInput: updateInput
    }

})();

//Registration
$('.btn-registration').on('click', function (evt) {

    evt.preventDefault();

    loadLayoutByAjax('/Site/RegistrationPopup', function (html) {
        Popup.addClass('registration-popup');
        Popup.show(html);
        Input.init();
    });
});


//Sign In
$('.btn-sign-in').on('click', function (evt) {

    evt.preventDefault();

    loadLayoutByAjax('/Site/SignInPopup', function (html) {
        Popup.addClass('sign-in-popup');
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

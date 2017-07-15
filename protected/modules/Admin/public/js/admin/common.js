
/*======================================
       Message
 =======================================*/

var Message = (function () {
    var _message = {};

    function removeClasses() {
        var classes = ['success','info','warning','danger'];
        classes.map(function (item) {
            $('.adm-alert').removeClass(item);
        });

    }

    function loadMessage(msg,type) {

        var msgTypes = {
            'success':'success',
            'info':'info',
            'warning':'warning',
            'danger':'danger'
        };

        removeClasses();

        $('.adm-alert')
            .html(msg)
            .addClass(msgTypes[type])
            .slideDown('slow', function () {
                var _this = $(this);
                setTimeout(function () {
                    _this.slideUp('fast');
                    removeClasses();
                }, 3000);
            });
    }

    _message.success = function (msg) {
        if (msg === '' || msg === undefined) {
            msg = 'Save Successfully!'
        }
        loadMessage(msg,'success');
    };

    _message.info = function (msg) {
        if (msg === '' || msg === undefined) {
            msg = 'Please wait...'
        }
        loadMessage(msg,'info');
    };

    _message.danger = function (msg) {
        if (msg === '' || msg === undefined) {
            msg = 'Oh snap!'
        }
        loadMessage(msg,'danger');
    };

    _message.warning = function (msg) {
        if (msg === '' || msg === undefined) {
            msg = 'Warning!'
        }
        loadMessage(msg,'warning');
    };

    return _message;

})();

/*=========================================
Search bar
=========================================*/

$(function () {
    $(document).find('.search-input-wrp input[type="text"].input-search').on('focus',function () {
        $(this).parents('.search-input-wrp').addClass('input-focus');
    });

    $(document).find('.search-input-wrp input[type="text"].input-search').on('blur',function () {
        $(this).parents('.search-input-wrp').removeClass('input-focus');
    });
});
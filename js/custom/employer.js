$(function () {

    var route = {
        tab1: {
            view: '/employer/Package',
            form: '/employer/PackageEdit'
        },
        tab2: {
            view: 't',
            form: 't'
        },
        tab3: {
            view: 't',
            form: 't'
        }
    };

    var $tabContainer = $('.tab-horizontal-content');

    function loadTab(tab, type, appendTo) {
        _ajax(
            {
                url: route[tab][type]
            },
            function (html) {
                appendTo.html(html);
            }
        );
    }

    function getCurrentActiveTab() {
        return $('.employer-tab li.active a').attr('href').split('#')[1];
    }

    // Event for tab
    $('.employer-tab li a').on('click', function (e) {
        e.preventDefault();

        var $this = $(this);
        var $tab = $this.attr('href').split('#')[1];

        $('.employer-tab li').removeClass('active');
        $this.parent().addClass('active');

        loadTab(
            $tab,
            'view',
            $tabContainer
        );

    });

    // Event for edit button
    $(document).on('click', '.btn-employer-edit', function () {
        var tab = getCurrentActiveTab();
        loadTab(
            tab,
            'form',
            $tabContainer
        );
    });

    //On load
    loadTab(
        'tab1',
        'view',
        $tabContainer
    );

    //Show popup
    $('.uploadImage').on('click', function () {
        _ajax(
            {
                url: '/employer/ImageCrop'
            },
            function (html) {
                Popup.addClass('small-size');
                Popup.show(html)
            }
        );

    });

})
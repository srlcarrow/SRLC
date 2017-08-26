window.MAIN_ID = '';
window.SUB_ID = '';

window.clearCategoryIds = function () {
    window.MAIN_ID = '';
    window.SUB_ID = '';
};

function loadJobData(category) {
    MAIN_ID = category.main[0];
    SUB_ID = category.sub[0];
}

//Category Popup
function CategoryPopup() {
    return {
        html: function (callback) {
            $.ajax({
                type: 'GET',
                url: base_url('/Site/CategoryPopup'),
                success: function (res) {
                    callback(res);
                }
            });
        }
    }
}
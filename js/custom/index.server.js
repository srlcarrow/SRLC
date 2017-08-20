
function loadJobData(category) {
    console.log(category);
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

//Registration Popup
function RegistrationPopup() {
    return {
        html: function (callback) {
            $.ajax({
                type: 'GET',
                url: base_url('/Site/RegistrationPopup'),
                success: function (res) {
                    callback(res);
                }
            });
        }
    }
}
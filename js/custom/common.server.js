function loadLayoutByAjax(url, callback) {
    $.ajax({
        type: 'GET',
        url: base_url(url),
        success: function (res) {
            callback(res);
        },
        error:function (error) {
            console.log(error);
            callback('<h3 style="color: red;">Ops..., Something was wrong!</h3>');
        }
    });
}

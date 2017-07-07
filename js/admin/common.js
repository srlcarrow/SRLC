(function () {
    var message = {
      success:function (msg) {

          $('.adm-alert')
              .html(msg)
              .slideDown('slow',function () {
              setTimeout(function () {
                  $(this).slideUp('fast');
              },3000);
          });
      }
    };
})();
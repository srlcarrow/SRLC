function base_url(n){return BASE_URL+n}function msg(n,t,e,i){var o={delay:3e3,stay:!1},a=$.extend(o,i),s=n;s.html(t).addClass("is-fixed").addClass(e).slideDown("slow",function(){a.stay||setTimeout(function(){s.fadeOut(500,function(){s.html("").removeClass(e)})},a.delay)})}var Popup=function(){function n(n){document.querySelector("body").style.overflow="",e.attr("class").split(" ").map(function(n){"popup-container"!==n&&e.removeClass(n)}),e.addClass("isHide"),setTimeout(function(){"function"==typeof n&&void 0!==n&&n()},100)}var t={},e=$(".popup-container");return t.addClass=function(n){e.addClass(n)},t.removeClass=function(n){e.removeClass(n)},$(".popup .close").on("click",function(){n()}),$(document).on("keypress",function(n){n.keyCode}),t.show=function(n){if(e.addClass("isShow"),Animation.load(),void 0!==n){document.querySelector("body").style.overflow="hidden";var t=e.find(".content");t.html(""),t.html(n),Animation.hide(),t.fadeTo("slow",1)}},t.beforeShow=function(n){e.addClass("isShow");var t=e.find(".content");t.html("").fadeTo("fast",0),Animation.load(),void 0!==n&&(document.querySelector("body").style.overflow="hidden",t.html("").html(n),Animation.hide())},t.loadNewLayout=function(n){e.find(".content").css("opacity",0),e.hasClass("isShow")&&(Animation.hide(),e.find(".content").animate({opacity:1},800).html("").html(n))},t.hide=function(t){n(t)},t}(),Input=function(){function n(){var n=$(".input-wrapper");n.each(function(o){var a=$(this),s=($('<div class="input-box">'),$('<div class="input-line">')),l=$('<div class="animate-line">'),c=a.find(e),d=a.find(".float-text");a.children(".input-line").length>0?(a.find(s).remove(),a.find(l).remove()):a.append(c).append(d).append(s).append(l),$(document).on("focus",e,function(n){var t=$(this).parents(".input-wrapper");t.hasClass("focus")||t.addClass("focus").addClass("text-top")}),$(document).on("blur",e,function(){var n=$(this),t=n.parents(".input-wrapper");t.removeClass("focus").addClass("blur"),t.hasClass("text-top")&&0===n.val().length&&t.removeClass("text-top"),setTimeout(function(){t.removeClass("blur")},300)}),o===n.length-1&&(i=!0,t())})}function t(){i&&setTimeout(function(){$(document).find(e).each(function(){var n=$(this),t=n.parents(".input-wrapper");n.val().length>0&&t.addClass("text-top")})},100)}var e='input[type="text"],input[type="password"],input[type="number"],input[type="email"],textarea',i=!1;return $(document).ready(function(){t()}),n(),{isBuild:i,init:n,updateInput:t}}(),Select=function(){var n={};return n.init=function(n){var n=void 0!==n&&""!==n?n:".selector";$(n).each(function(){function n(n){i.find("span").html(s.selected(n)[2])}function t(){o.html("");var n=0,t=s.options().length;t>9&&o.addClass("is-scroll"),1===t||0===t?(console.log("EEE ",s.getSelectVal()),""==s.getSelectVal()||0==s.getSelectVal()||null==s.getSelectVal()||void 0==s.getSelectVal()?e.addClass("is-disabled"):e.removeClass("is-disabled")):e.removeClass("is-disabled"),s.options().map(function(t){var e=$("<li>");t.isSelected&&e.addClass("selected"),t.isDisabled&&e.addClass("disabled"),e.html(t.text),e.attr("data-val",t.val),o.append(e),n++})}var e=$(this),i=e.find(".selected-option"),o=e.find(".option-list"),a=e.find("select"),s={isRequired:!1,selected:function(n){var t=this.getSelectVal();if("Select"==t||null==t||void 0==t||""==t)e=a.find("option:disabled");else var e=a.find("option:selected");return[e,e.val(),e.html()]},options:function(){var n=[];return a.find("option").each(function(){var t=!1,e=!1;$(this).is(":selected")&&(t=!0),$(this).prop("disabled")&&(e=!0);var i={val:$(this).val(),text:$(this).html(),isSelected:t,isDisabled:e};n.push(i)}),n},getSelectVal:function(){return a.val()},update:function(n){a.find('option[value="'+n+'"]').prop("selected",!0),a.trigger("change")}};n(!0),t(),i.on("click",function(){$(".option-list").css("display","none"),o.css("display","block")}),o.on("click","li",function(){o.css("display","none");var e=$(this).attr("data-val");s.update(e),n(!1),t()}),a.on("domChanged",function(){}),$(document).on("click",function(n){$(n.target).parents().hasClass("selector")||o.css("display","none")})})},n.init(),n}();$.fn.SearchBox=function(n){return $(this).each(function(){var t={itemClick:null,onEnter:null,onKeyUp:null},e=$.extend(t,n),i=$(this),o=i.find("input"),a=i.find(".search-result");i.addClass("input-search-box"),o.on("keyup",function(){$(this).val().length>0?(i.addClass("is-active"),"function"==typeof e.onKeyUp&&e.onKeyUp.call(i,$(this))):i.removeClass("is-active")}),o.on("keypress",function(n){13==n.keyCode&&"function"==typeof e.onEnter&&(i.removeClass("is-active"),e.onEnter.call(i,$(this)),o.val(""),o.focus())}),a.find("ul li").on("click",function(){"function"==typeof e.itemClick&&(i.removeClass("is-active"),o.val(""),e.itemClick.call(i,$(this)))})})},$.fn.Success=function(n,t){return this.each(function(){msg($(this),n,"success",t)})},$.fn.Error=function(n,t){return this.each(function(){msg($(this),n,"error",t)})},$.fn.Info=function(n,t){return this.each(function(){msg($(this),n,"error",t)})};var SearchBox=function(){var n={};$(".input-search-box").each(function(){return n})}(),imageCropData=function(){var n=null;return{set:function(t){n=t},get:function(){return n},trigger:function(n,t){window[n].call(this,t)}}}();$(".btn-registration").on("click",function(n){n.preventDefault(),Popup.beforeShow(),loadLayoutByAjax("/Site/RegistrationPopup",function(n){Popup.addClass("registration-popup"),Popup.show(n),Input.init()})}),$(".btn-sign-in").on("click",function(n){n.preventDefault(),Popup.beforeShow(),loadLayoutByAjax("/Site/SignInPopup",function(n){Popup.addClass("sign-in-popup"),Popup.addClass("small"),Popup.show(n),Input.init()})}),$(".popup-container").on("click",".forget_password",function(n){n.preventDefault(),Popup.beforeShow(),loadLayoutByAjax("/Site/PasswordResetFrom",function(n){Popup.loadNewLayout(n),Input.init()})}),$(".profile-link").on("click",function(n){var t=$(this);t.hasClass("is-active")||(t.addClass("is-active"),t.find(".drop-box").fadeIn("fast"))}),$(document).on("click",function(n){var t=$(n.target),e=$(".profile-link");t.hasClass("is-active")||t.parents(".profile-link").hasClass("is-active")||(e.find(".drop-box").fadeOut("fast"),e.removeClass("is-active"))});var Animation=function(){var n=null;return{load:function(t){var e=this;return n=void 0!==t?t:".popup",this.message=void 0!==this.message?this.message:"Please wait...",function(){console.log("Self",e);var t="";t+='<div class="animation-outer">',t+='<div class="animation">',t+='<img src="'+BASE_URL+'/images/system/loader/frontLoader.gif" alt="">',t+='<h5 class="text-orange">'+e.message+"</h5>",t+="</div>",t+="</div>",$(".popup").css("overflow","hidden"),$(n).append(t)}(),function(){var n=e.message;setInterval(function(){n!==e.message&&(n=e.message,$(".animation-outer").find(".text-orange").text(n))},100)}(),this},hide:function(){n&&($(".popup").attr("style",""),$(n).find(".animation-outer").remove())},loader:function(){var n="";return n+='<div class="animation-outer fixed">',n+='<div class="animation">',n+='<img src="'+BASE_URL+'/images/system/loader/frontLoader.gif" alt="">',n+="</div>",n+="</div>"}}}(),Button=function(n){var n=void 0!==n?n:".disabled";return{disabled:function(){$(document).find(n).prop("disabled",!0)},enabled:function(){$(document).find(n).prop("disabled",!1)}}};$.fn.Button=function(n){var t={disabled:!1,enabled:!1},e=$.extend(t,n);$(this).each(function(){var n=$(this);e.disabled?$(document).find(n).prop("disabled",!0):$(document).find(n).prop("disabled",!1)})};var fileUploader=function(){function n(){function n(n){var t=n.get(0);if(t.files[0]){var e=t.files[0].name,i=n.parent();if(i.hasClass("file-uploader")){var o=$('<span class="fileName"></span>');$('<span class="btn-close"></span>');o.attr("title",e),1===i.find(".fileName").length?(i.find(".fileName").remove(),i.append(o.text(e))):i.append(o.text(e))}}}var t=$('input[type="file"]');t.on("change",function(){n($(this))}),t.each(function(){n($(this))})}return n(),{load:n}}(),Toast=function(){var n=$('<div class="toast-outer"></div>'),t=$('<div class="toast"></div>');return{success:function(e){$("body").find(".toast-outer").remove(),$("body").append(n),t.addClass("success").text(e),n.addClass("is-show").append(t)}}}();$(".mobile-menu").on("click",function(){alert("as")});
function calSize(){return $(window)[0].innerWidth>425?$titleOffset+90:$titleOffset-80}function scrollToDown(){var e=$titleOffset+90;!$(window).scrollTop()>0?$("html, body").animate({scrollTop:e},500):$("html, body").scrollTop(e)}function loadJobsByCategory(){var e=SelectedCategory.categoryID;$(".show-category").find(".selected-item span").text(e.main[1]),$(".job-input").find('input[type="text"]').focus(),$(".subCategory").text(e.sub[1]),loadJobData(e),Popup.hide()}function responsivePageHeight(){var e=$(window)[0].innerWidth,t=$(window)[0].innerHeight;e>425?$(".full-height").css("height",t+"px"):$(".full-height").css("height","100%")}var $isTitleHide=!1,isScrollTop=!1,$titleOffset=$("#searchWrapper").offset().top,breakpoint=calSize(),SelectedCategory=function(){var e={categoryID:{main:[],sub:[]}};return $(document).on("click",".category-list li a",function(t){t.preventDefault();var o=$(this),n=o.parents(".category-list");n.hasClass("main")&&($(".category-list.main li a").removeClass("active"),o.addClass("active"),e.categoryID.main=[n.find("li a.active").attr("id"),n.find("li a.active").text()],o.hasClass("all")&&(loadJobsByCategory(),scrollToDown())),n.hasClass("sub")&&($(".category-list.sub li a").removeClass("active"),o.addClass("active"),e.categoryID.sub=[n.find("li a.active").attr("id"),n.find("li a.active").text()],loadJobsByCategory(),scrollToDown())}),e}(),JobSearch=function(){var e={},t=$('.job-input input[type="text"]');return e.changeTitle=function(){$(".main-title"),$(".search-section")},t.on("focus",function(){}),t.on("blur",function(){}),$(".show-category").on("click",function(){Popup.beforeShow(),CategoryPopup().html(function(e){Popup.addClass("size-60"),Popup.addClass("no-padding"),Popup.show(e)})}),e}();$(window).on("load resize",function(){responsivePageHeight(),breakpoint=calSize()}),$(".navbar").removeClass("light-blue").css("backgroundColor","transparent"),function(){var e=new ScrollMagic.Controller({addIndicators:!1}),t=new ScrollMagic.Scene({triggerElement:".search-section",duration:"300%",triggerHook:0,offset:breakpoint});t.addTo(e),t.setPin(".search-section",{pushFollowers:!1}),t.on("start",function(){});var o=new ScrollMagic.Scene({triggerElement:"#title",duration:"30%",triggerHook:.3});o.addTo(e),o.on("progress",function(e){var t=Math.max(0,Math.min(1,1-e.progress));$("#title").css({opacity:t}),$("header").css({"pointer-events":"none"}),$("header .navbar-nav").css({opacity:t,"pointer-events":"none"}),$(".filters").animate({opacity:e.progress},0),$(".full-height").css("height","")}),o.on("start",function(e){"REVERSE"==e.scrollDirection&&($(".filters").css({opacity:0}),responsivePageHeight())}),o.on("shift",function(e){$("header").css({"pointer-events":"none"}),$("header navbar-nav").css({"pointer-events":"none"})}),$("#searchText").on("focus click",function(){scrollToDown()})}($);
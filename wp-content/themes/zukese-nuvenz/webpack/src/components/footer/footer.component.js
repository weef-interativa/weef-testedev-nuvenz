//menu ancora ativo

var topMenu = $(".header");
var topMenuList = $(".header__nav--list");
var topMenuHeight = topMenu.outerHeight()+15;
var menuItems = topMenuList.find("a");
var scrollItems = menuItems.map(function(){
    var item = $($(this).attr("href"));
    if (item.length) { return item; }
});
$(window).scroll(function(){
    // Scroll atual
    var fromTop = $(this).scrollTop()+topMenuHeight;
    // Id do atual em scroll
    var cur = scrollItems.map(function(){
        if ($(this).offset().top - 80 < fromTop)
        return this;
    });
    // Id do atual
    cur = cur[cur.length-1];
    var id = cur && cur.length ? cur[0].id : "";
    menuItems.removeClass("active");
    menuItems.filter("[href='#"+id+"']").addClass("active");
});
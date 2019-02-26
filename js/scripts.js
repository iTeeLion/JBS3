function scrollPageTo(element){
    $('html, body').animate({
        scrollTop: ($(element).offset().top)
    },600);
}

function navbarFixedSpacer(){
    if($('[data-navbar-main-spacer]')){
        $navbarMain = $('[data-navbar-main]');
        $navbarMainSpacer = $('[data-navbar-main-spacer]');
        $navbarMainSpacer.height($navbarMain.height());
    }
}

jQuery(function() {

    navbarFixedSpacer();
    window.onresize = function() {
        navbarFixedSpacer();
    };

    $(document).on('click', '[data-scrollto]', function(){
        scrollPageTo($(this).data('scrollto'));
    })

});
(function($) {

    //scroll anchor links
    function anchorLink() {
        if (window.innerWidth >= 993) {
            $('.js-link').on('click', function (e) {
                e.preventDefault();

                let scroll_el = $(this).attr('href');
                if ($(scroll_el).length !== 0) {
                    $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 400);
                }
            });
        }

        if (window.innerWidth <= 992) {
            $('.js-link').on('click', function (e) {
                e.preventDefault();

                $('.main-nav__container').fadeOut(400);
                $('body').removeClass('disabled-scroll');
                $('.menu-action').removeClass('menu-action_init');

                let scroll_el = $(this).attr('href');
                if ($(scroll_el).length !== 0) {
                    $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 400);
                }
            });
        }
    }


    //init menu
    let menu = {
        nav: $('.main-nav__container'),
        openMenuBtn: $('.menu-action'),
        flag: true,

        menuAction: function () {
            this.openMenuBtn.on('click', function () {
                if(menu.flag) {
                    menu.flag = false;

                    menu.nav.slideToggle(200);
                    menu.openMenuBtn.toggleClass('menu-action_init');
                    $('body').toggleClass('disabled-scroll');

                    setTimeout(function () {
                        menu.flag = true;
                    }, 300);
                }
            });
        },
        init: function () {
            this.menuAction();
        },
        destroy: function () {
            this.nav.removeAttr('style');
            $('body').removeClass('disabled-scroll');
            this.openMenuBtn.removeClass('menu-action_init');
        }
    };

    $('.news-wrapper').first().attr('href', 'https://gchangersmag.com/editions/issue-21/');

    //init on load
    menu.init();
    anchorLink();

    //on resize
    $(window).resize(function () {
        anchorLink();

        if (window.innerWidth >= 993) {
            menu.destroy();
        }
    });

})(jQuery);
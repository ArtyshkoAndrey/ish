$(document)
    .ready(function () {

        //Для фикс или желаемого размещения меню


        $('.navbar').sticky({
            topSpacing: 0,
            zIndex: 1000
        });
        $('body').scrollspy({
            target: '.navbar-custom',
            offset: 70
        })  

        $(".screen-height").height($(window).height());

        $(window).resize(function () {
            $(".screen-height").height($(window).height());
        });;


        //Плавный скол при клике в меню и активатор скрола в вниз
        $('a[href*=\\#]:not([href=\\#])')
            .bind("click", function (e) {
                var anchor = $(this);
                $('html, body')
                    .stop()
                    .animate({
                        scrollTop: $(anchor.attr('href'))
                            .offset()
                            .top
                    }, 1000);
                e.preventDefault();
            });

        //Активация кнопки скрол в верх при прокрутки
        $(window)
            .scroll(function () {
                if ($(this)
                    .scrollTop() > 100) {
                    $('.scroll-up')
                        .fadeIn();
                } else {
                    $('.scroll-up')
                        .fadeOut();
                }
            });

        //Для меню доб класс Актив
        var url = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
        $('.navbar-nav a')
            .each(function () {
                if ($(this)
                    .attr('href') === url || $(this)
                        .attr('href') === '') {
                    $(this)
                        .parent('li')
                        .addClass('active');
                }
            });

        //Для галереи
        $('.slider-for')
            .slick({
                slidesToShow: 1
                , slidesToScroll: 1
                , arrows: false
                , adaptiveHeight: true
                , fade: true
                , speed: 600
                , asNavFor: '.slider-nav'
            });
        $('a[data-slide]')
            .click(function (e) {
                e.preventDefault();
                var slideno = $(this)
                    .data('slide');
                $('.slider-nav')
                    .slick('slickGoTo', slideno - 1);
            });

        //Проверка на телефон или пк
        if (navigator.userAgent.match(/Mobile|Windows Phone|Lumia|Android|webOS|iPhone|iPod|Blackberry|PlayBook|BB10|Opera Mini|\bCrMo\/|Opera Mobi/i)) {
            // Телефон

            //Для галереи
            $('.slider-nav')
                .slick({
                    slidesToShow: 2
                    , slidesToScroll: 1
                    , asNavFor: '.slider-for'
                    , dots: true
                    , arrows: false
                    , speed: 300
                    , focusOnSelect: true
                });

        } else {
            // Пк

            //Для галереи
            $('.slider-nav')
                .slick({
                    slidesToShow: 4
                    , slidesToScroll: 1
                    , asNavFor: '.slider-for'
                    , dots: true
                    , speed: 300
                    , focusOnSelect: true
                });
        }


    });

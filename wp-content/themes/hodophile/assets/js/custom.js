jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader                  = $('#loader');
    var loader_container        = $('#preloader');
    var scroll                  = $(window).scrollTop();  
    var scrollup                = $('.backtotop');
    var dropdown_toggle         = $('.main-navigation button.dropdown-toggle');
    var menu_toggle             = $('#masthead .menu-toggle');
    var primary_menu            = $('#masthead ul.nav-menu');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"100px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

/*------------------------------------------------
            NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function() {
        primary_menu.slideToggle();
        $(this).toggleClass('active');
        $('#masthead .main-navigation').toggleClass('menu-open');
        $('.menu-overlay').toggleClass('active');
       
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $('.main-navigation ul li.search-menu a').click(function(e) {
        e.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/

    $('.testimonial-slider').slick({
        responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                arrows: false
            }
        },
        {
            breakpoint: 667,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
        ]
    });

    $('.blog-slider').slick();

    $('.our-partner-slider').slick({
        responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        },
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: false
            }
        },
        {
            breakpoint: 567,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            }
        }
        ]
    });



/*------------------------------------------------
                PACKERY
------------------------------------------------*/
    $('.grid').imagesLoaded( function() {
        $('.grid').packery({
            itemSelector: '.grid-item'
        });
    });

/*------------------------------------------------
    PRODUCTS FILTERING
------------------------------------------------*/

if($('ul.product-nav li a').attr('data-tab')=='all'){
    $('#hodophile_medical_product .product-wrapper').prepend('<div id="all" class="tab-content active clear"><ul class="all products col-4 container"></ul></div>');
    $('#hodophile_medical_product li.product-item').clone().slice(0,8).each(function(key, value){
        $('#hodophile_medical_product .all').append(value);
    })
}

$('ul.product-nav li a').click(function(event) {
    event.preventDefault();

    var tab_id = $(this).attr('data-tab');

    $('ul.product-nav li').removeClass('active');
    $('ul.product-nav li a').removeClass('active');
    $(this).addClass('active');

    $('.tab-content').removeClass('active');
    $('.tab-content').hide();

    $("#"+tab_id).show();

});

/*------------------------------------------------
            Sticky Sidebar
------------------------------------------------*/

// $('#secondary, #right-sidebar , #left-sidebar').theiaStickySidebar({
//     additionalMarginTop: 30
// });

/*------------------------------------------------
            Sticky Sidebar
------------------------------------------------*/

if ($(window).width() > 766 ) {
  //   setTimeout(() => {
  //     document.location.reload();
  // }, 30);

    $('#gallery-1').removeClass('clear');

    $('#gallery-2').removeClass('clear');
} 
else {
    $('#gallery-1').addClass('clear');

    $('#gallery-2').addClass('clear');
}



function makeTimer() {
    var endTime = document.getElementById('timer').dataset.date;
    var endTime = document.getElementById('timer').dataset.date;
    var timeLeft = endTime - Math.floor((Date.now())/1000);
    if(timeLeft >= 0 ){
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");
    }else{
        $("#timer").html("<span>Expired</span>");
    }
}
var count_down = document.getElementById('timer');
if (count_down !== null)
    setInterval(function() { makeTimer(); }, 1000);

/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#search').find("button").unbind('keydown');

}
else {
    $('#primary-menu').find("li").unbind('keydown');

    $('#search').find("button").bind( 'keydown', function(e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;

        if( tabKey ) {
            e.preventDefault();
            $('#search').hide();
            $('.search-menu > a').removeClass('search-active').focus();
        }

        if( shiftKey && tabKey ) {
            e.preventDefault();
            $('#search').show();
            $('.main-navigation .search-field').focus();
            $('.search-menu > a').addClass('search-active');
        }
    });

    $('.search-menu > a').on('keydown', function (e) {
        var tabKey              = e.keyCode === 9;
        var shiftKey            = e.shiftKey;
        
        if( $('.search-menu > a').hasClass('search-active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                $('#search').hide();
                $('.search-menu > a').removeClass('search-active').focus();
            }
        }
    });
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#search').find("button").unbind('keydown');

    }
    else {
        $('#primary-menu').find("li").unbind('keydown');

        $('#search').find("button").bind( 'keydown', function(e) {
            var tabKey              = e.keyCode === 9;
            var shiftKey            = e.shiftKey;

            if( tabKey ) {
                e.preventDefault();
                $('#search').hide();
                $('.search-menu > a').removeClass('search-active').focus();
            }

            if( shiftKey && tabKey ) {
                e.preventDefault();
                $('#search').show();
                $('.main-navigation .search-field').focus();
                $('.search-menu > a').addClass('search-active');
            }
        });

        $('.search-menu > a').on('keydown', function (e) {
            var tabKey              = e.keyCode === 9;
            var shiftKey            = e.shiftKey;
            
            if( $('.search-menu > a').hasClass('search-active') ) {
                if ( shiftKey && tabKey ) {
                    e.preventDefault();
                    $('#search').hide();
                    $('.search-menu > a').removeClass('search-active').focus();
                }
            }
        });
    }
});

menu_toggle.on('keydown', function (e) {
    var tabKey    = e.keyCode === 9;
    var shiftKey  = e.shiftKey;

    if( menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            primary_menu.slideUp();
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            menu_toggle.removeClass('active');
        };
    }
});


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});
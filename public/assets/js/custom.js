"use strict";
$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();
    $('#menu').userMenu();
    User.navBar();
    User.userAnimatePanel();

// ================== Fixed menu =======================
    function window_scroll() {
        $(window).on("scroll", function () {
            fixed_menu();
            if ($(this).scrollTop() > 50) {
                $('.fixed_menu #left').addClass('rightsidebar-without-nav');
            } else {
                $('.fixed_menu #left').removeClass('rightsidebar-without-nav');
            }

            if ($(this).scrollTop() > 50 && $(this).scrollTop() < 100) {
                $('.fixed_menu #left').addClass('rightsidebar-without-nav-small');
            } else {
                $('.fixed_menu #left').removeClass('rightsidebar-without-nav-small');
            }

        });
    }
    if($(window).width()>767){
        fixed_menu();
        window_scroll();
        $(window).on("resize",function () {
            fixed_menu();
        });
    }else{
        $(".left_scrolled").removeClass("menu_scroll");
        $(".fixed_menu .menu_scroll").slimScroll({
            destroy: true,
            height: '100%'
        });
        $("#top,#left").removeClass("fixed");
        $("body").removeClass("fixed_menu");
        $(".menu_section").removeClass("menu_scroll");
    }
    function fixed_menu() {
        if($("#left").hasClass("rightsidebar-without-nav")){
            $(".fixed_menu  .menu_scroll").slimscroll({
                height: $(window).height(),
                size: '5px',
                opacity: 0.2
            });
        }else{
            $(".fixed_menu .menu_scroll").slimscroll({
                height: $(window).height()-$("#top").height(),
                size: '5px',
                opacity: 0.2
            });
        }
    }
    $(window).on("resize",function () {
        right_content();
        window_scroll();
    });

// ==================== HEADER==================
    function headerResize() {
        if($(window).width()>767){
            var fixedHeaderTop=$("#top").height();
            $(".fixed_header .wrapper").css("margin-top",fixedHeaderTop);
        }else{
            $("#top").removeClass("fixed-top");
            $(".fixed_header .wrapper").css("margin-top",0);
        }
    }
    headerResize();
    $(window).on("resize",function () {
        headerResize();
    });

});

(function($, window, document, undefined) {

    var pluginName = "userMenu",
        defaults = {
            toggle: true,
        };
    function Plugin(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }
    Plugin.prototype = {
        init: function() {
            var $this = $(this.element),
                $toggle = this.settings.toggle,
                obj = this
            if (this.isIE() <= 9) {
                $this.find("li.active").has("ul").children("ul").collapse("show");
                $this.find("li").not(".active").has("ul").children("ul").collapse("hide");
            } else {
                $this.find("li.active").has("ul").children("ul").addClass("collapse show");
                $this.find("li").not(".active").has("ul").children("ul").addClass("collapse");
            }

            $this.find("li").has("ul").children("a").on("click", function(e) {
                e.preventDefault();

                $(this).parent("li").toggleClass("active").children("ul").collapse({
                    toggle: true,
                    animate: false
                });
                $this.find("li.active").has("ul").children("ul").addClass("collapse show");

                if ($toggle) {
                    $(this).parent("li").siblings().removeClass("active").children("ul.show").collapse("hide");
                    $this.find("li.active").has("ul").children("ul").addClass("collapse show");
                    $this.find("li").not(".active").has("ul").children("ul").removeClass("show");
                }
            });
        },
        isIE: function() {
            var undef,
                v = 3,
                div = document.createElement("div"),
                all = div.getElementsByTagName("i");
            while (
                div.innerHTML = "<!--[if gt IE " + (++v) + "]><i></i><![endif]-->",
                    all[0]
                ) {
                return v > 4 ? v : undef;
            }
        },
    };
    $.fn[pluginName] = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
        return this;
    };

})(jQuery, window, document);


// ==============TOUCH===============
(function(window) {
    var

        Modernizr = typeof Modernizr !== "undefined" ? Modernizr : false,

        isTouchDevice = Modernizr ? Modernizr.touch : !!('ontouch' in window || 'onmsgesturechange' in window),

        buttonPressedEvent = (isTouchDevice) ? 'touch' : 'click',
        User = function() {
            this.init();
        };

    User.prototype.init = function() {
        this.isTouchDevice = isTouchDevice;
        this.buttonPressedEvent = buttonPressedEvent;
    };
    User.prototype.getViewportHeight = function() {
        var docElement = document.documentElement,
            client = docElement.clientHeight,
            inner = window.innerHeight;
        if (client < inner)
            return inner;
        else
            return client;
    };

    window.User = new User();
})(this);

// ==============NAVBAR===============
(function($) {
    var $navBar = $('nav.navbar'),
        $body = $('body'),
        $menu = $('#menu');

    function init() {
        var isFixedNav = $navBar.hasClass('navbar-fixed-top');
        var bodyPadTop = isFixedNav ? $navBar.outerHeight(true) : 0;
        $body.css('padding-top', bodyPadTop);
        if ($body.hasClass('menu-affix')) {
            $menu
                .css({
                    height: function() {
                        return $(window).height();
                    },
                    top: bodyPadTop - 1,
                    bottom: 0
                });
        }
    }
    User.navBar = function() {
        var resizeTimer;
        init();
        $(window).resize(function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(init(), 250);
        });
    };
    return User;
})(jQuery);
(function($, User) {
    var $body = $('body'),
        $leftToggle = $('.toggle-left'),
        $rightToggle = $('.toggle-right');
    var leftopened = 0;
    User.userAnimatePanel = function() {
        if ($('#left').length) {
            $leftToggle.on(User.buttonPressedEvent, function(e) {
                if ($(window).width() < 768) {
                    $body.toggleClass('sidebar-left-opened');
                    $body.removeClass("sidebar-right-opened");
                    $('.left_content').slimscroll({
                        height: 'auto',
                        size: '5px',
                        opacity: 0.2
                    });
                } else {
                    $body.toggleClass("sidebar-left-hidden");
                    $body.removeClass("sidebar-right-opened");
                }
            });
        } else {
            $leftToggle.addClass('hidden');
        }
        if ($('#right').length) {
            $rightToggle.on(User.buttonPressedEvent, function(e) {

                if ($body.hasClass("sidebar-right-opened")) {
                    $body.removeClass("sidebar-right-opened");
                    if (leftopened == 1) {
                        if ($(window).width() < 768) {
                            $body.addClass('sidebar-left-opened');
                        } else {
                            $body.removeClass('sidebar-left-hidden');
                        }
                    }
                } else {
                    $body.addClass("sidebar-right-opened");
                    if ($(window).width() < 768) {
                        if ($body.hasClass("sidebar-left-opened")) {
                            leftopened = 1;
                        } else {
                            leftopened = 0;
                        }
                        $body.removeClass("sidebar-left-opened");
                    } else {
                        if ($body.hasClass("sidebar-left-hidden")) {
                            leftopened = 0;
                        } else {
                            leftopened = 1;
                        }
                        $body.addClass("sidebar-left-hidden");
                    }
                }
            });
        } else {
            $rightToggle.addClass('hidden');
        }
    };
    return User;
})(jQuery, User || {});

function loadjscssfile(filename, filetype) {
    if (filetype == "css") {
        var fileref = document.createElement("link");
        fileref.rel = "stylesheet";
        fileref.type = "text/css";
        fileref.href = 'assets/css/skins/' + filename;
        $("#skin_change").attr("href", "assets/css/skins/"+filename+"")
    }
}

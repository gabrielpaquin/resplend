/**
 *
 *    @author: Gabriel Paquin
 *    Date de création: 13 mars 2018
 *    Dernière modification: 13 mars 2018
 *
 */


/**
 * Déclaration des variables globales
 */
var winScrollTop = $(window).scrollTop(),
    winHeight = $(window).height(),
    winWidth = $(window).width(),
    winScrollBottom = $(window).scrollTop() + $(window).height();


/**
 * Fonction lorsque la page est redimensionnée
 */
$(window).resize(function () {

    update_windowVar();
});


/**
 * Fonction lorsque qu'il y a un scroll dans la page
 */
$(window).scroll(function (e) {

    update_windowVar();
    update_parallax();
    trigger_onScreenEl();
});


/**
 * Fonction document.ready qui se charge d'appeler la fonction d'initialisation
 */
$(function configurer() {

    init();
});


/**
 * Fonction qui initialise la page dans laquelle on se trouve
 * @func init
 */
function init() {

    var page = $('main').attr('id');

    switch (page) {
        case 'home':
            init_home();
            break;
        default:
            init_header();
            break;
    }
}


/**
 * Fonction d'initialisation du header
 * @func init_header
 */
function init_header() {

    var btn = $('#btn_hamburger'),
        menu = $('header nav .nav-list');

    btn.click(function (e) {

        e.preventDefault();

        menu.toggleClass('active');
        btn.toggleClass('active');
    });

    init_overlayElements();
}


/**
 * Fonction d'initialisation de la page d'accueil
 * @func init_home
 */
function init_home() {

    init_header();
    init_slideShow();
    trigger_onScreenEl();
}


/**
 * Fonction d'initialisation des éléments overlay
 * @func init_overlayElements
 */
function init_overlayElements() {

    var all_btnTrigger = $('[data-trigger]'),
        overlay_wrapper = $('.overlay_elements'),
        overlay_bg = $('.overlay_bg');

    overlay_bg.click(function () {
        overlay_wrapper.toggleClass('trigger');
    });

    all_btnTrigger.each(function () {
        var btn_trigger = $(this),
            el_toTrigger = btn_trigger.data('trigger');

        btn_trigger.click(function (e) {

            e.preventDefault();

            overlay_wrapper.toggleClass('trigger');
            $('.' + el_toTrigger).toggleClass('trigger');
        });
    });
}


/**
 * Fonction d'initialisation des slide show
 * @func init_slideShow
 */
function init_slideShow() {

    var all_slideShow = $('.slideshow');

    all_slideShow.each(function () {
        var slideshow = $(this),
            animation = slideshow.data('animation');

        slideshow.flexslider({
            animation: animation,
            slideshow: true,
            slideshowSpeed: 5000,
            animationDuration: 5000,
            directionNav: false
        });
    });
}


/**
 * Fonction qui ajoute la class .come-in au élément .screen_trigger lorsque ceux-ci sont visibles
 * @func trigger_onScreenEl
 */
function trigger_onScreenEl() {

    var allMods = $('.slide-in--element');

    allMods.each(function (i, el) {
        var el = $(el);
        if (el.is_on_screen(true)) {
            el.addClass('come-in');
        }
    });
}


/**
 * Fonction qui met à jour les variables globales relatifs au viewport
 * @func update_windowVar
 */
function update_windowVar() {

    winScrollTop = $(window).scrollTop();
    winHeight = $(window).height();
    winWidth = $(window).width();
    winScrollBottom = $(window).scrollTop() + $(window).height();
}


/**
 * Fonction qui met à jour les éléments de parallax
 * @func update_parallax
 */
function update_parallax() {

    var all_paroller = $('.paroller');

    all_paroller.each(function () {

        var paroller = $(this),
            parent = paroller.parent('.wrapper'),
            is_onScreen = parent.is_on_screen(),
            offSet = parent.offset().top,
            int = winScrollBottom - offSet,
            data = paroller.data(),
            direction = data['parollerdirection'],
            speed = data['parollerspeed'],
            increment = (int * speed) * direction,
            axis = data['parolleraxis'];

        if (is_onScreen && winWidth > 769) {
            paroller.css("transform", "translate" + axis + "(" + increment + "px)");
        }
    });
}
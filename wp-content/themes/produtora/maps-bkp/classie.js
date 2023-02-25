$(function() {
    $('#contact-form .input:eq(0) .input__field').focus(function() {
        $('#contact-form .input:eq(0) .input__label--nao').css({
            color: '#333',
            transform: 'translate3d(0, -1.25em, 0) scale3d(0.75, 0.75, 1)'
        })
        $('#contact-form .input:eq(0) .graphic--nao').css({
            stroke: '#333',
            transform: 'translate3d(-66.6%, 0, 0)'
        })
    })
    $('#contact-form .input:eq(1) .input__field').focus(function() {
        $('#contact-form .input:eq(1) .input__label--nao').css({
            color: '#333',
            transform: 'translate3d(0, -1.25em, 0) scale3d(0.75, 0.75, 1)'
        })
        $('#contact-form .input:eq(1) .graphic--nao').css({
            stroke: '#333',
            transform: 'translate3d(-66.6%, 0, 0)'
        })
    })
    $('#contact-form .input:eq(2) .input__field').focus(function() {
        $('#contact-form .input:eq(2) .input__label--nao').css({
            color: '#333',
            transform: 'translate3d(0, -1.25em, 0) scale3d(0.75, 0.75, 1)'
        })
        $('#contact-form .input:eq(2) .graphic--nao').css({
            stroke: '#333',
            transform: 'translate3d(-66.6%, 0, 0)'
        })
    })
});
(function(window) {
    'use strict';

    function classReg(className) {
        return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    }
    var hasClass, addClass, removeClass;
    if ('classList' in document.documentElement) {
        hasClass = function(elem, c) {
            return elem.classList.contains(c);
        };
        addClass = function(elem, c) {
            elem.classList.add(c);
        };
        removeClass = function(elem, c) {
            elem.classList.remove(c);
        };
    } else {
        hasClass = function(elem, c) {
            return classReg(c).test(elem.className);
        };
        addClass = function(elem, c) {
            if (!hasClass(elem, c)) {
                elem.className = elem.className + ' ' + c;
            }
        };
        removeClass = function(elem, c) {
            elem.className = elem.className.replace(classReg(c), ' ');
        };
    }

    function toggleClass(elem, c) {
        var fn = hasClass(elem, c) ? removeClass : addClass;
        fn(elem, c);
    }
    var classie = {
        hasClass: hasClass,
        addClass: addClass,
        removeClass: removeClass,
        toggleClass: toggleClass,
        has: hasClass,
        add: addClass,
        remove: removeClass,
        toggle: toggleClass
    };
    if (typeof define === 'function' && define.amd) {
        define(classie);
    } else {
        window.classie = classie;
    }
})(window);
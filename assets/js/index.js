/**
 * Настройки AJAX
 *
 * @version 05.08.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var ajax = (function() {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 04.08.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function() {
        // Настройки AJAX
        $.ajaxSetup({
            timeout : 20000,
            type    : 'POST',
            dataType: 'json',
            cache   : false,
            beforeSend: function (xhr, settings) {
                if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                    xhr.setRequestHeader("X-CSRFToken", $('meta[name="_token"]').attr('content'));
                }
            },
        });
    };

    /**
     * Показать ошибку выполнения AJAX
     *
     * @param string status Код ошибки
     * @param string text   Текст ошибки сервера
     *
     * @return null
     *
     * @version 04.08.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function error(status, text) {
        switch (status) {
            case 'timeout'    : alert('Время ожидания истекло'); break;
            case 'parsererror': alert('Ошибка парсера'); break;
            case 'abort'      : alert('Запрос был отменён'); break;
            case 'error'      : alert('Произошла ошибка сервера: ' + text); break;
            default           : alert('Неизвестная ошибка'); break;
        }
    }

    /**
     * Показать \ Скрыть окно ожидания ответа AJAX
     *
     * @param string action Действие (show|hide)
     *
     * @return null
     *
     * @version 04.08.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function waiter(action) {
        if (action === 'show') {
            $('#js-ajaxwaiter-overlay, #js-ajaxwaiter-preloader').show();
        } else if (action === 'hide') {
            $('#js-ajaxwaiter-overlay, #js-ajaxwaiter-preloader').hide();
        }
    }

    // Запрос на изменение пароля
    $('#js-profile-change-password').on('click', function() {
        waiter('show');

        var form = '#js-profile-form-change-password';

        $.ajax({
            url: pathRoot + 'user/change-password',
            data: {
                'new_password': $(form + ' input[name="new_password"]').val(),
                'old_password': $(form + ' input[name="old_password"]').val(),
            },
            success: function(result, textStatus, jqXHR) {
                if (result.error === false) {
                    $(form + ' input[name="new_password"]').val('');
                    $(form + ' input[name="old_password"]').val('');
                }

                alert(result.message);
            },
            complete: function() {
                waiter('hide');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                error(textStatus, errorThrown);
            }
        });
    });

    // Запрос на изменение электронной почты
    $('#js-profile-change-email').on('click', function() {
        waiter('show');

        var form     = '#js-profile-form-change-email';
        var newEmail = $(form + ' input[name="new_email"]').val();

        $.ajax({
            url: pathRoot + 'user/change-email',
            data: {
                'new_email': newEmail,
                'password' : $(form + ' input[name="password"]').val(),
            },
            success: function(result, textStatus, jqXHR) {
                if (result.error === false) {
                    $('#js-profile-email').text(newEmail);

                    $(form + ' input[name="new_email"]').val('');
                    $(form + ' input[name="password"]').val('');
                }

                alert(result.message);
            },
            complete: function() {
                waiter('hide');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                error(textStatus, errorThrown);
            }
        });
    });

    return {
        init  : init,
        waiter: waiter,
        error : error,
    };
})();

ajax.init();
/**
 * Основной файл приложения
 *
 * @version 28.07.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var app = (function() {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 28.07.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function() {

    };

    return {
        init: init,
    };
})();

app.init();
/**
 * Основные настройки
 *
 * @version 29.07.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var settings = (function() {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 29.07.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function() {
        //
        //
        //       .g8"""bgd   .g8""8q. `7MN.   `7MF'`7MM"""YMM `7MMF' .g8"""bgd
        //     .dP'     `M .dP'    `YM. MMN.    M    MM    `7   MM .dP'     `M
        //     dM'       ` dM'      `MM M YMb   M    MM   d     MM dM'       `
        //     MM          MM        MM M  `MN. M    MM""MM     MM MM
        //     MM.         MM.      ,MP M   `MM.M    MM   Y     MM MM.    `7MMF'
        //     `Mb.     ,' `Mb.    ,dP' M     YMM    MM         MM `Mb.     MM
        //       `"bmmmd'    `"bmmd"' .JML.    YM  .JMML.     .JMML. `"bmmmdPY
        //
        //

        var config = window.config = {};

        // Настройка валидатора форм
        config.validations = {
            debug       : true,
            errorClass  : 'has-error',
            validClass  : 'success',
            errorElement: 'span',
            highlight: function(element, errorClass, validClass) {
                $(element).parents('div.form-group')
                    .addClass(errorClass)
                    .removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.has-error')
                    .removeClass(errorClass)
                    .addClass(validClass);
            },
            invalidHandler: function() {
                animate({
                    name    : 'shake',
                    selector: '.auth-container > .card',
                });
            },
            submitHandler: function(form) {
                form.submit();
            },
        }

        // Настройки анимации
        function animate(options) {
            var animationName = 'animated ' + options.name;
            var animationEnd  = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

            $(options.selector)
                .addClass(animationName)
                .one(animationEnd,
                    function(){
                        $(this).removeClass(animationName);
                    }
                );
        }

        //
        //
        //     `7MM"""YMM   .g8""8q. `7MM"""Mq.  `7MMM.     ,MMF'    `7MMF'   `7MF' db      `7MMF'      `7MMF'`7MM"""Yb.      db   MMP""MM""YMM `7MMF' .g8""8q. `7MN.   `7MF'
        //       MM    `7 .dP'    `YM. MM   `MM.   MMMb    dPMM        `MA     ,V  ;MM:       MM          MM    MM    `Yb.   ;MM:  P'   MM   `7   MM .dP'    `YM. MMN.    M
        //       MM   d   dM'      `MM MM   ,M9    M YM   ,M MM         VM:   ,V  ,V^MM.      MM          MM    MM     `Mb  ,V^MM.      MM        MM dM'      `MM M YMb   M
        //       MM""MM   MM        MM MMmmdM9     M  Mb  M' MM          MM.  M' ,M  `MM      MM          MM    MM      MM ,M  `MM      MM        MM MM        MM M  `MN. M
        //       MM   Y   MM.      ,MP MM  YM.     M  YM.P'  MM          `MM A'  AbmmmqMA     MM      ,   MM    MM     ,MP AbmmmqMA     MM        MM MM.      ,MP M   `MM.M
        //       MM       `Mb.    ,dP' MM   `Mb.   M  `YM'   MM           :MM;  A'     VML    MM     ,M   MM    MM    ,dP'A'     VML    MM        MM `Mb.    ,dP' M     YMM
        //     .JMML.       `"bmmd"' .JMML. .JMM..JML. `'  .JMML.          VF .AMA.   .AMMA..JMMmmmmMMM .JMML..JMMmmmdP'.AMA.   .AMMA..JMML.    .JMML. `"bmmd"' .JML.    YM
        //
        //

        // Валидация формы входа
        $(function() {
            if (!$('#login-form').length) {
                return false;
            } else {
                $('#login-form').validate(config.validations);
            }
        })

        // Валидация формы напоминания пароля
        $(function() {
            if (!$('#lost-form').length) {
                return false;
            } else {
                $('#lost-form').validate(config.validations);
            }
        })

        // Валидация формы регистрации
        $(function() {
            if (!$('#signup-form').length) {
                return false;
            } else {
                $('#signup-form').validate(config.validations);
            }
        });

        // Валидация формы применения нового пароля
        $(function() {
            if (!$('#reset-form').length) {
                return false;
            } else {
                $('#reset-form').validate(config.validations);
            }
        })

        //
        //
        //           db      `7MN.   `7MF'`7MMF'`7MMM.     ,MMF'      db   MMP""MM""YMM `7MM"""YMM
        //          ;MM:       MMN.    M    MM    MMMb    dPMM       ;MM:  P'   MM   `7   MM    `7
        //         ,V^MM.      M YMb   M    MM    M YM   ,M MM      ,V^MM.      MM        MM   d
        //        ,M  `MM      M  `MN. M    MM    M  Mb  M' MM     ,M  `MM      MM        MMmmMM
        //        AbmmmqMA     M   `MM.M    MM    M  YM.P'  MM     AbmmmqMA     MM        MM   Y  ,
        //       A'     VML    M     YMM    MM    M  `YM'   MM    A'     VML    MM        MM     ,M
        //     .AMA.   .AMMA..JML.    YM  .JMML..JML. `'  .JMML..AMA.   .AMMA..JMML.    .JMMmmmmMMM
        //
        //

        // Анимация заголовка на странице ошибок
        $(function() {
            animate({
                name    : 'flipInY',
                selector: '.error-card > .error-title-block',
            });

            setTimeout(function(){
                var $el = $('.error-card > .error-container');

                animate({
                    name    : 'fadeInUp',
                    selector: $el,
                });

                $el.addClass('visible');
            }, 1000);
        })

        // Анимация выпадающего меню пользователя
        $(function() {
            $('.nav-profile > li > a').on('click', function() {
                var $el = $(this).next();

                animate({
                    name: 'flipInX',
                    selector: $el
                });
            });
        })

        // Анимация фокуса полей ввода
        $(function() {
            if (!$('.form-control').length) {
                return false;
            }

            $('.form-control').focus(function() {
                $(this).siblings('.input-group-addon').addClass('focus');
            });

            $('.form-control').blur(function() {
                $(this).siblings('.input-group-addon').removeClass('focus');
            });
        });

        //
        //
        //      .M"""bgd `7MMF'`7MM"""Yb. `7MM"""YMM  `7MM"""Yp,      db      `7MM"""Mq.      `7MMM.     ,MMF'`7MM"""YMM  `7MN.   `7MF'`7MMF'   `7MF'
        //     ,MI    "Y   MM    MM    `Yb. MM    `7    MM    Yb     ;MM:       MM   `MM.       MMMb    dPMM    MM    `7    MMN.    M    MM       M
        //     `MMb.       MM    MM     `Mb MM   d      MM    dP    ,V^MM.      MM   ,M9        M YM   ,M MM    MM   d      M YMb   M    MM       M
        //       `YMMNq.   MM    MM      MM MMmmMM      MM"""bg.   ,M  `MM      MMmmdM9         M  Mb  M' MM    MMmmMM      M  `MN. M    MM       M
        //     .     `MM   MM    MM     ,MP MM   Y  ,   MM    `Y   AbmmmqMA     MM  YM.         M  YM.P'  MM    MM   Y  ,   M   `MM.M    MM       M
        //     Mb     dM   MM    MM    ,dP' MM     ,M   MM    ,9  A'     VML    MM   `Mb.       M  `YM'   MM    MM     ,M   M     YMM    YM.     ,M
        //     P"Ybmmd"  .JMML..JMMmmmdP' .JMMmmmmMMM .JMMmmmd9 .AMA.   .AMMA..JMML. .JMM.    .JML. `'  .JMML..JMMmmmmMMM .JML.    YM     `bmmmmd"'
        //
        //

        // Боковое меню
        $(function () {
            $('#sidebar-menu').metisMenu({
                activeClass: 'open'
            });

            $('#sidebar-collapse-btn').on('click', function(event){
                event.preventDefault();

                $('#app').toggleClass('sidebar-open');
            });

            $('#sidebar-overlay').on('click', function() {
                $('#app').removeClass('sidebar-open');
            });
        });

        // Покажем что документ загружен
        $(function() {
            $("body").addClass("loaded");
        });
    };

    return {
        init: init,
    };
})();

settings.init();
/**
 * Настройки AJAX
 *
 * @version 29.07.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var ajax = (function() {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 27.07.2016
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
     * @version 27.07.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function ajaxError(status, text) {
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
     * @version 27.07.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function ajaxWaiter(action) {
        if (action === 'show') {
            $('#js-ajaxwaiter-overlay, #js-ajaxwaiter-preloader').show();
        } else if (action === 'hide') {
            $('#js-ajaxwaiter-overlay, #js-ajaxwaiter-preloader').hide();
        }
    }

    // Запрос на изменение пароля
    $('#js-profile-change-password').on('click', function() {
        ajaxWaiter('show');

        var form = '#js-profile-form-change-password';

        $.ajax({
            url: pathRoot + '/user/change-password',
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
                ajaxWaiter('hide');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                ajaxError(textStatus, errorThrown);
            }
        });
    });

    // Запрос на изменение электронной почты
    $('#js-profile-change-email').on('click', function() {
        ajaxWaiter('show');

        var form     = '#js-profile-form-change-email';
        var newEmail = $(form + ' input[name="new_email"]').val();

        $.ajax({
            url: pathRoot + '/user/change-email',
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
                ajaxWaiter('hide');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                ajaxError(textStatus, errorThrown);
            }
        });
    });

    return {
        init: init,
    };
})();

ajax.init();
/**
 * Основной файл приложения
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var app = (function() {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version ===
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
     * Показать \ Скрыть окно ожидания ответа AJAX
     *
     * @param string action Действие (show|hide)
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function ajaxWaiter(action) {
        if (action === 'show') {
            $('#js-ajaxwaiter-overlay, #js-ajaxwaiter-preloader').removeClass('hidden');
        } else if (action === 'hide') {
            $('#js-ajaxwaiter-overlay, #js-ajaxwaiter-preloader').addClass('hidden');
        }
    }

    // Скрываем форму входа и показываем форму напоминания пароля
    $('#js-lost-show').on('click', function() {
        $('#js-user-login').addClass('hidden');
        $('#js-user-lost').removeClass('hidden');
    });

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

app.init();
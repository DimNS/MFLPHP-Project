/**
 * Настройки AJAX
 *
 * @version 24.04.2017
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var ajax = (function () {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 04.08.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function () {
        // Настройки AJAX
        $.ajaxSetup({
            timeout   : 20000,
            type      : 'POST',
            dataType  : 'json',
            cache     : false,
            beforeSend: function (xhr, settings) {
                if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                    xhr.setRequestHeader("X-CSRFToken", $('meta[name="_token"]').attr('content'));
                }
            }
        });
    };

    /**
     * Показать ошибку выполнения AJAX
     *
     * @param status Код ошибки (string)
     * @param text   Текст ошибки сервера (string)
     *
     * @return null
     *
     * @version 24.04.2017
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function error(status, text) {
        ajax.waiter('hide');

        switch (status) {
            case 'timeout'    :
                app.messageModal('Произошла ошибка', 'Время ожидания истекло', 'error');
                break;
            case 'parsererror':
                app.messageModal('Произошла ошибка', 'Ошибка парсера', 'error');
                break;
            case 'abort'      :
                app.messageModal('Произошла ошибка', 'Запрос был отменён', 'error');
                break;
            case 'error'      :
                app.messageModal('Произошла ошибка', 'Произошла ошибка сервера: ' + text, 'error');
                break;
            default           :
                app.messageModal('Произошла ошибка', 'Неизвестная ошибка', 'error');
                break;
        }
    }

    /**
     * Показать \ Скрыть окно ожидания ответа AJAX
     *
     * @param action Действие (string:show|hide)
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

    /**
     * Вызов кроссдоменный AJAX используя JSONP
     *
     * @param url      Путь запроса (string)
     * @param data     Объект с данными (object)
     * @param callback Название вызываемой функции (string)
     *
     * @return null
     *
     * @version 27.12.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function jsonp(url, data, callback) {
        $.ajax({
            url     : url + '?callback=?',
            type    : 'GET',
            dataType: 'jsonp',
            data    : data,
            success : callback,
            error   : function (jqXHR, textStatus, errorThrown) {
                ajax.error(textStatus, errorThrown);
            }
        });
    }

    return {
        init  : init,
        waiter: waiter,
        error : error,
        jsonp : jsonp
    };
})();
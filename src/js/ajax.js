/**
 * Настройки AJAX
 *
 * @version 06.09.2016
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

    return {
        init  : init,
        waiter: waiter,
        error : error,
    };
})();
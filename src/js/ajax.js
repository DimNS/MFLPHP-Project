/**
 * Настройки AJAX
 *
 * @version 27.12.2016
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
     * @version 27.12.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    function error(status, text) {
        ajax.waiter('hide');

        switch (status) {
            case 'timeout'    :
                swal('Произошла ошибка', 'Время ожидания истекло', 'error');
                break;
            case 'parsererror':
                swal('Произошла ошибка', 'Ошибка парсера', 'error');
                break;
            case 'abort'      :
                swal('Произошла ошибка', 'Запрос был отменён', 'error');
                break;
            case 'error'      :
                swal('Произошла ошибка', 'Произошла ошибка сервера: ' + text, 'error');
                break;
            default           :
                swal('Произошла ошибка', 'Неизвестная ошибка', 'error');
                break;
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
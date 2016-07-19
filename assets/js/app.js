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

    return {
        init: init,
    };
})();

app.init();
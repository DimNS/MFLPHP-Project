/**
 * Основной файл приложения
 *
 * @version 12.08.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var app = (function() {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 12.08.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function() {
        ajax.init();
        settings.init();
    };

    return {
        init: init,
    };
})();
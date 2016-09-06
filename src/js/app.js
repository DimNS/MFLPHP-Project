/**
 * Основной файл приложения
 *
 * @version 06.09.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var app = (function() {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 06.09.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function() {
        ajax.init();
        settings.init();

        if ($('#js-page-profile').length) {
            profile.init();
        }
    };

    return {
        init: init,
    };
})();
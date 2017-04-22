/**
 * Основной файл приложения
 *
 * @version 22.04.2017
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var app = (function () {
    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 22.04.2017
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function () {
        ajax.init();

        if ($('#js-page-profile').length) {
            profile.init();
        }
    };

    return {
        init: init
    };
})();
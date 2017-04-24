/**
 * Основной файл приложения
 *
 * @version 24.04.2017
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

    /**
     * Инициализация приложения
     *
     * @param title string Заголовок
     * @param message string Текст сообщения
     * @param code string Код
     *
     * @return null
     *
     * @version 24.04.2017
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var messageModal = function (title, message, code) {
        alert(title + ' (' + code + '): ' + message);
    };

    return {
        init: init,
        messageModal: messageModal
    };
})();
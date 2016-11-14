/**
 * Работа с профилем
 *
 * @version 14.11.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

var profile = (function() {
    //
    //       ,,                ,,
    //       db                db   mm
    //                              MM
    //     `7MM  `7MMpMMMb.  `7MM mmMMmm
    //       MM    MM    MM    MM   MM
    //       MM    MM    MM    MM   MM
    //       MM    MM    MM    MM   MM
    //     .JMML..JMML  JMML..JMML. `Mbmo
    //
    //

    /**
     * Инициализация приложения
     *
     * @return null
     *
     * @version 06.09.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var init = function() {
        _bindChangePassword();
        _bindChangeEmail();
    };

    //
    //          ,,        ,,                    ,,               ,,                                                                                                                        ,,
    //         *MM        db                  `7MM   .g8"""bgd `7MM                                             `7MM"""Mq.                                                               `7MM
    //          MM                              MM .dP'     `M   MM                                               MM   `MM.                                                                MM
    //          MM,dMMb.`7MM  `7MMpMMMb.   ,M""bMM dM'       `   MMpMMMb.   ,6"Yb.  `7MMpMMMb.  .P"Ybmmm .gP"Ya   MM   ,M9 ,6"Yb.  ,pP"Ybd ,pP"Ybd `7M'    ,A    `MF',pW"Wq.`7Mb,od8  ,M""bMM
    //          MM    `Mb MM    MM    MM ,AP    MM MM            MM    MM  8)   MM    MM    MM :MI  I8  ,M'   Yb  MMmmdM9 8)   MM  8I   `" 8I   `"   VA   ,VAA   ,V 6W'   `Wb MM' "',AP    MM
    //          MM     M8 MM    MM    MM 8MI    MM MM.           MM    MM   ,pm9MM    MM    MM  WmmmP"  8M""""""  MM       ,pm9MM  `YMMMa. `YMMMa.    VA ,V  VA ,V  8M     M8 MM    8MI    MM
    //          MM.   ,M9 MM    MM    MM `Mb    MM `Mb.     ,'   MM    MM  8M   MM    MM    MM 8M       YM.    ,  MM      8M   MM  L.   I8 L.   I8     VVV    VVV   YA.   ,A9 MM    `Mb    MM
    //          P^YbmdP'.JMML..JMML  JMML.`Wbmd"MML. `"bmmmd'  .JMML  JMML.`Moo9^Yo..JMML  JMML.YMMMMMb  `Mbmmd'.JMML.    `Moo9^Yo.M9mmmP' M9mmmP'      W      W     `Ybmd9'.JMML.   `Wbmd"MML.
    //                                                                                         6'     dP
    //     mmmmmmm                                                                             Ybmmmd'

    /**
     * Запрос на изменение пароля
     *
     * @return null
     *
     * @version 14.11.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var _bindChangePassword = function() {
        $('#js-profile-change-password').on('click', function() {
            ajax.waiter('show');

            var form = '#js-profile-form-change-password';

            $.ajax({
                url: pathRoot + 'user/change-password',
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
                    ajax.waiter('hide');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    ajax.error(textStatus, errorThrown);
                }
            });
        });
    };

    //
    //          ,,        ,,                    ,,               ,,                                                                                      ,,    ,,
    //         *MM        db                  `7MM   .g8"""bgd `7MM                                             `7MM"""YMM                               db  `7MM
    //          MM                              MM .dP'     `M   MM                                               MM    `7                                     MM
    //          MM,dMMb.`7MM  `7MMpMMMb.   ,M""bMM dM'       `   MMpMMMb.   ,6"Yb.  `7MMpMMMb.  .P"Ybmmm .gP"Ya   MM   d    `7MMpMMMb.pMMMb.   ,6"Yb.  `7MM    MM
    //          MM    `Mb MM    MM    MM ,AP    MM MM            MM    MM  8)   MM    MM    MM :MI  I8  ,M'   Yb  MMmmMM      MM    MM    MM  8)   MM    MM    MM
    //          MM     M8 MM    MM    MM 8MI    MM MM.           MM    MM   ,pm9MM    MM    MM  WmmmP"  8M""""""  MM   Y  ,   MM    MM    MM   ,pm9MM    MM    MM
    //          MM.   ,M9 MM    MM    MM `Mb    MM `Mb.     ,'   MM    MM  8M   MM    MM    MM 8M       YM.    ,  MM     ,M   MM    MM    MM  8M   MM    MM    MM
    //          P^YbmdP'.JMML..JMML  JMML.`Wbmd"MML. `"bmmmd'  .JMML  JMML.`Moo9^Yo..JMML  JMML.YMMMMMb  `Mbmmd'.JMMmmmmMMM .JMML  JMML  JMML.`Moo9^Yo..JMML..JMML.
    //                                                                                         6'     dP
    //     mmmmmmm                                                                             Ybmmmd'

    /**
     * Запрос на изменение электронной почты
     *
     * @return null
     *
     * @version 14.11.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    var _bindChangeEmail = function() {
        $('#js-profile-change-email').on('click', function() {
            ajax.waiter('show');

            var form     = '#js-profile-form-change-email';
            var newEmail = $(form + ' input[name="new_email"]').val();

            $.ajax({
                url: pathRoot + 'user/change-email',
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
                    ajax.waiter('hide');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    ajax.error(textStatus, errorThrown);
                }
            });
        });
    };

    return {
        init: init,
    };
})();
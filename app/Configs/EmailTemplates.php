<?php
/**
 * Шаблоны электронных писем
 *
 * @version 13.09.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MFLPHP\Configs;

class EmailTemplates
{
    //
    //
    //     `7MMF'  `7MMF'`7MM"""YMM        db      `7MM"""Yb. `7MM"""YMM  `7MM"""Mq.
    //       MM      MM    MM    `7       ;MM:       MM    `Yb. MM    `7    MM   `MM.
    //       MM      MM    MM   d        ,V^MM.      MM     `Mb MM   d      MM   ,M9
    //       MMmmmmmmMM    MMmmMM       ,M  `MM      MM      MM MMmmMM      MMmmdM9
    //       MM      MM    MM   Y  ,    AbmmmqMA     MM     ,MP MM   Y  ,   MM  YM.
    //       MM      MM    MM     ,M   A'     VML    MM    ,dP' MM     ,M   MM   `Mb.
    //     .JMML.  .JMML..JMMmmmmMMM .AMA.   .AMMA..JMMmmmdP' .JMMmmmmMMM .JMML. .JMM.
    //
    //

    // Шапка для каждого письма
    const HEADER = <<<TPL
<table border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#eee;">
    <tr>
        <td style="padding:20px;">
            <table border="0" cellpadding="10" cellspacing="0" align="center" style="width:600px;color:#444444;font-size:14px;font-family:arial,helvetica,sans-serif;line-height:1.5;border:5px #aed0ea solid;background:#fff;">
                <tbody>
                    <tr>
                        <td align="center"><img src="cid:logotype" style="max-height:60px;"></td>
                    </tr>
TPL;

    //
    //
    //     `7MM"""YMM   .g8""8q.     .g8""8q.  MMP""MM""YMM `7MM"""YMM  `7MM"""Mq.
    //       MM    `7 .dP'    `YM. .dP'    `YM.P'   MM   `7   MM    `7    MM   `MM.
    //       MM   d   dM'      `MM dM'      `MM     MM        MM   d      MM   ,M9
    //       MM""MM   MM        MM MM        MM     MM        MMmmMM      MMmmdM9
    //       MM   Y   MM.      ,MP MM.      ,MP     MM        MM   Y  ,   MM  YM.
    //       MM       `Mb.    ,dP' `Mb.    ,dP'     MM        MM     ,M   MM   `Mb.
    //     .JMML.       `"bmmd"'     `"bmmd"'     .JMML.    .JMMmmmmMMM .JMML. .JMM.
    //
    //

    // Подвал для каждого письма
    const FOOTER = <<<TPL
                    <tr>
                        <td>
                            <strong>С уважением,</strong><br>
                            ваш персональный менеджер<br>
                            Дмитрий Щербаков<br>
                            <a href="mailto:info@bestion.ru" style="color:#3baae3;">info@bestion.ru</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
TPL;

    //
    //
    //     `7MMF'   `7MF'.M"""bgd `7MM"""YMM  `7MM"""Mq.      `7MM"""Mq.  `7MM"""YMM    .g8"""bgd `7MMF' .M"""bgd MMP""MM""YMM `7MM"""YMM  `7MM"""Mq.
    //       MM       M ,MI    "Y   MM    `7    MM   `MM.       MM   `MM.   MM    `7  .dP'     `M   MM  ,MI    "Y P'   MM   `7   MM    `7    MM   `MM.
    //       MM       M `MMb.       MM   d      MM   ,M9        MM   ,M9    MM   d    dM'       `   MM  `MMb.          MM        MM   d      MM   ,M9
    //       MM       M   `YMMNq.   MMmmMM      MMmmdM9         MMmmdM9     MMmmMM    MM            MM    `YMMNq.      MM        MMmmMM      MMmmdM9
    //       MM       M .     `MM   MM   Y  ,   MM  YM.         MM  YM.     MM   Y  , MM.    `7MMF' MM  .     `MM      MM        MM   Y  ,   MM  YM.
    //       YM.     ,M Mb     dM   MM     ,M   MM   `Mb.       MM   `Mb.   MM     ,M `Mb.     MM   MM  Mb     dM      MM        MM     ,M   MM   `Mb.
    //        `bmmmmd"' P"Ybmmd"  .JMMmmmmMMM .JMML. .JMM.    .JMML. .JMM..JMMmmmmMMM   `"bmmmdPY .JMML.P"Ybmmd"     .JMML.    .JMMmmmmMMM .JMML. .JMM.
    //
    //

    // Центральная часть письма успешной регистрации пользователя
    const USER_REGISTER = <<<TPL
<tr>
    <td>Добро пожаловать!</td>
</tr>
<tr>
    <td>Вы <strong>успешно зарегистрировались</strong> на сайте "[[SITE_NAME]]".</td>
</tr>
<tr>
    <td style="text-align:center;">
        <table border="0" cellpadding="20" cellspacing="0" align="center" style="background:#d7ebf9;line-height:2;">
            <tr>
                <td style="text-align:left;">
                    Данные для входа:<br>
                    Почта: <strong>[[USER_EMAIL]]</strong><br>
                    Пароль: <strong>[[USER_PASSWORD]]</strong>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>Для начала работы, пройдите по этой ссылке:</td>
</tr>
<tr>
    <td align="center">
        <a href="[[SITE_URL]]" style="background:#3baae3;color:#ffffff;font-size:24px;padding:10px 40px;text-decoration:none;">Начать работу</a>
    </td>
</tr>
TPL;

    //
    //
    //     `7MMF'   `7MF'.M"""bgd `7MM"""YMM  `7MM"""Mq.      `7MMF'        .g8""8q.    .M"""bgd MMP""MM""YMM
    //       MM       M ,MI    "Y   MM    `7    MM   `MM.       MM        .dP'    `YM. ,MI    "Y P'   MM   `7
    //       MM       M `MMb.       MM   d      MM   ,M9        MM        dM'      `MM `MMb.          MM
    //       MM       M   `YMMNq.   MMmmMM      MMmmdM9         MM        MM        MM   `YMMNq.      MM
    //       MM       M .     `MM   MM   Y  ,   MM  YM.         MM      , MM.      ,MP .     `MM      MM
    //       YM.     ,M Mb     dM   MM     ,M   MM   `Mb.       MM     ,M `Mb.    ,dP' Mb     dM      MM
    //        `bmmmmd"' P"Ybmmd"  .JMMmmmmMMM .JMML. .JMM.    .JMMmmmmMMM   `"bmmd"'   P"Ybmmd"     .JMML.
    //
    //

    // Центральная часть письма запроса сброса пароля пользователя
    const USER_LOST = <<<TPL
<tr>
    <td>Мы получили запрос на <strong>восстановление пароля</strong> к вашему аккаунту <strong>[[USER_EMAIL]]</strong> на сайте "[[SITE_NAME]]".</td>
</tr>
<tr>
    <td>В целях безопасности мы не храним оригинальный пароль, а только можем сменить его на новый.</td>
</tr>
<tr>
    <td>Пожалуйста, перейдите по ссылке, чтобы установить новый пароль:</td>
</tr>
<tr>
    <td align="center">
        <a href="[[SITE_URL]]/user/reset/[[KEY]]" style="background:#3baae3;color:#ffffff;font-size:24px;padding:10px 40px;text-decoration:none;">Получить новый пароль</a>
    </td>
</tr>
<tr>
    <td>Если вы не запрашивали сброс пароля на сайте "[[SITE_NAME]]", значит это сообщение вы получили по ошибке. Пожалуйста, проигнорируйте его.</td>
</tr>
TPL;
}

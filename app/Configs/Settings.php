<?php
/**
 * Параметры
 *
 * @version 22.04.2017
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MFLPHP\Configs;

class Settings
{
    // Это боевой сервер если стоит значение TRUE
    // Необходим для подставления .min в подключении скриптов и пропуска отправки почты на локальном компьютере
    const PRODUCTION = false;

    // Отображать TRUE или нет FALSE подробную информацию об ошибке
    // Используется библиотека Whoops
    const DEBUG = true;

    // Путь до корня, с начальной "/", но без конечной "/"
    // Пример: "/" - если приложение находится в корне домена
    // Пример: "/proj_sub_folder" - если приложение находится в каталоге
    const PATH_SHORT_ROOT = '/';

    // База данных
    const DB_HOST = 'localhost';
    const DB_PORT = 3306;
    const DB_DATABASE = 'mflphp';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    // Временная зона сервера для инициализации библиотеки Carbon
    // http://carbon.nesbot.com/docs/#api-instantiation
    const TIMEZONE = 'UTC';

    // Где будут хранится php сессии:
    // FILE - В файлах
    // DB   - В таблице базы данных (используется библиотека stefangabos/zebra_session),
    // ВНИМАНИЕ!!! DB ПОКА НЕ ПОДДЕРЖИВАЕТ PHP7
    //        CREATE TABLE `session_data` (
    //          `session_id` varchar(32) NOT NULL default '',
    //          `hash` varchar(32) NOT NULL default '',
    //          `session_data` blob NOT NULL,
    //          `session_expire` int(11) NOT NULL default '0',
    //          PRIMARY KEY  (`session_id`)
    //        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    const PHP_SESSION = 'FILE';
}

<?php
/**
 * Запуск приложения
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

header("Content-type: text/html; charset=UTF-8");

require 'vendor/autoload.php';

// Путь до файла .env
$path_to_env = __DIR__;

$app = new MFLPHP\Init($path_to_env);
$app->start();

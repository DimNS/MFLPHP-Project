<?php
/**
 * Запуск приложения
 *
 * @version 30.08.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

header("Content-type: text/html; charset=UTF-8");

require 'vendor/autoload.php';

$app = new MFLPHP\Init();
$app->start();

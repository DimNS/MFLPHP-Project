<?php
/**
 * Маршруты приложения
 *
 * @version 09.09.2016
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MyApp;

use MFLPHP\Pages\Index;
use MFLPHP\Pages\User;

//
//           AW
//          ,M'
//          MV
//         AW
//        ,M'
//        MV
//       AW
//      ,M'
//      MV
//     AW
$klein->respond('GET', '/', [new Index\ControllerIndex(), 'start']);

//
//           AW
//          ,M'
//          MV
//         AW`7MM  `7MM  ,pP"Ybd  .gP"Ya `7Mb,od8
//        ,M'  MM    MM  8I   `" ,M'   Yb  MM' "'
//        MV   MM    MM  `YMMMa. 8M""""""  MM
//       AW    MM    MM  L.   I8 YM.    ,  MM
//      ,M'    `Mbod"YML.M9mmmP'  `Mbmmd'.JMML.
//      MV
//     AW
$klein->with('/user', function () use ($klein) {
    $klein->respond('GET'          , ''                , [new User\ControllerIndex(), 'start']);
    $klein->respond('POST'         , '/change-password', [new User\ControllerChangePassword(), 'start']);
    $klein->respond('POST'         , '/change-email'   , [new User\ControllerChangeEmail(), 'start']);
    $klein->respond('POST'         , '/login'          , [new User\ControllerLogin(), 'start']);
    $klein->respond('GET'          , '/logout'         , [new User\ControllerLogout(), 'start']);
    $klein->respond(['GET', 'POST'], '/lost'           , [new User\ControllerLost(), 'start']);
    $klein->respond(['GET', 'POST'], '/register'       , [new User\ControllerRegister(), 'start']);
    $klein->respond(['GET', 'POST'], '/reset/[:key]?'  , [new User\ControllerReset(), 'start']);
});

//
//
//                         `7MMF'  `7MMF' mm     mm            `7MM"""YMM
//                           MM      MM   MM     MM              MM    `7
//      ,pW"Wq.`7MMpMMMb.    MM      MM mmMMmm mmMMmm `7MMpdMAo. MM   d    `7Mb,od8 `7Mb,od8 ,pW"Wq.`7Mb,od8
//     6W'   `Wb MM    MM    MMmmmmmmMM   MM     MM     MM   `Wb MMmmMM      MM' "'   MM' "'6W'   `Wb MM' "'
//     8M     M8 MM    MM    MM      MM   MM     MM     MM    M8 MM   Y  ,   MM       MM    8M     M8 MM
//     YA.   ,A9 MM    MM    MM      MM   MM     MM     MM   ,AP MM     ,M   MM       MM    YA.   ,A9 MM
//      `Ybmd9'.JMML  JMML..JMML.  .JMML. `Mbmo  `Mbmo  MMbmmd'.JMMmmmmMMM .JMML.   .JMML.   `Ybmd9'.JMML.
//                                                      MM
//                                                    .JMML.
$klein->onHttpError(function ($code, $router) {
    $router->service()->uri = $router->request()->uri();
    $router->service()->external_page = true;

    switch ($code) {
        case 404:
            $template_file = '404';
            $router->service()->title = 'Страница не найдена';
            break;

        default:
            $template_file = 'error';
            $router->service()->title = 'Произошла ошибка';
            break;
    }

    $router->service()->render(__DIR__ . '/Views/' . $template_file . '.php');
});

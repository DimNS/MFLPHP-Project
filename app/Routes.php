<?php
/**
 * Маршруты приложения
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MyApp;

$klein->respond('GET', '/', function ($request, $response, $service, $di) {
    $page = new Pages\Main\Init($request, $response, $service, $di);
    $page->start();
});

$klein->with('/user', function () use ($klein) {
    $klein->respond('GET', '/', function ($request, $response, $service, $di) {
        echo 'show profile';
    });

    $klein->respond('GET', '/activate', function ($request, $response, $service, $di) {
        echo 'user_activate';
    });

    $klein->respond('GET', '/reset', function ($request, $response, $service, $di) {
        echo 'user_reset';
    });

    $klein->respond('POST', '/login', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);
        $page->login();
    });

    $klein->respond('GET', '/logout', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);
        $page->logout();
    });
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
    $router->service()->uri  = $router->request()->uri();

    switch ($code) {
        case 404:
            $template_file = '404';
            $router->service()->title = 'Страница не найдена - ' . getenv('PROJECT_NAME');
            break;

        default:
            $template_file = 'error';
            $router->service()->title = 'Произошла ошибка - ' . getenv('PROJECT_NAME');
            break;
    }

    $router->service()->render(__DIR__ . '/Views/' . $template_file . '.php');
});

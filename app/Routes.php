<?php
/**
 * Маршруты приложения
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MyApp;

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
$klein->respond('GET', '/', function ($request, $response, $service, $di) {
    $page = new Pages\Main\Init($request, $response, $service, $di);
    $page->start();
});

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
    $klein->respond('GET', '', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);
        $page->getProfile();
    });

    $klein->respond('POST', '/change-password', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);

        if ($di->csrf->validateToken($request->server()->get('HTTP_X_CSRFTOKEN', ''))) {
            $page->changePassword();
        } else {
            \MFLPHP\Helpers\InvalidToken::getResponse($request, $response);
        }
    });

    $klein->respond('POST', '/change-email', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);

        if ($di->csrf->validateToken($request->servers()->get('HTTP_X_CSRFTOKEN', ''))) {
            $page->changeEmail();
        } else {
            \MFLPHP\Helpers\InvalidToken::getResponse($request, $response);
        }
    });

    $klein->respond('POST', '/login', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);

        if ($di->csrf->validateToken($request->param('_token'))) {
            $page->login();
        } else {
            \MFLPHP\Helpers\InvalidToken::getResponse($request, $response);
        }
    });

    $klein->respond('GET', '/logout', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);
        $page->logout();
    });

    $klein->respond('POST', '/lost', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);

        if ($di->csrf->validateToken($request->param('_token'))) {
            $page->lost();
        } else {
            \MFLPHP\Helpers\InvalidToken::getResponse($request, $response);
        }
    });

    $klein->respond('POST', '/register', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);

        if ($di->csrf->validateToken($request->param('_token'))) {
            $page->register();
        } else {
            \MFLPHP\Helpers\InvalidToken::getResponse($request, $response);
        }
    });

    $klein->respond('GET', '/reset/[:key]', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);
        $page->reset();
    });

    $klein->respond('POST', '/reset', function ($request, $response, $service, $di) {
        $page = new Pages\User\Init($request, $response, $service, $di);

        if ($di->csrf->validateToken($request->param('_token'))) {
            $page->reset();
        } else {
            \MFLPHP\Helpers\InvalidToken::getResponse($request, $response);
        }
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
$klein->onHttpError(function ($code, $router) use ($di) {
    $router->service()->uri  = $router->request()->uri();

    switch ($code) {
        case 404:
            $template_file = '404';
            $router->service()->title = 'Страница не найдена | ' . $di->auth->config->site_name;
            break;

        default:
            $template_file = 'error';
            $router->service()->title = 'Произошла ошибка | ' . $di->auth->config->site_name;
            break;
    }

    $router->service()->render(__DIR__ . '/Views/' . $template_file . '.php');
});

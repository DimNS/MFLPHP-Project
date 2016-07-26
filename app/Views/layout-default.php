<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="_token" content="<?=$this->csrf_token?>">

    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400|Roboto:400,700&subset=cyrillic-ext" rel="stylesheet">

    <!-- modular-admin-html -->
    <link href="<?=$this->path?>/assets/modular-admin-v101/css/vendor.css" rel="stylesheet" type="text/css">
    <link href="<?=$this->path?>/assets/modular-admin-v101/css/app-blue.css" rel="stylesheet" type="text/css">

    <link href="<?=$this->path?>/assets/css/style.css?v=<?=md5_file(__DIR__ . '/../../assets/css/style.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=$this->path?>/assets/css/override.css?v=<?=md5_file(__DIR__ . '/../../assets/css/override.css')?>" rel="stylesheet" type="text/css">

    <title><?=$this->title?></title>
</head>
<body>
    <?=$this->yieldView()?>

    <div id="js-ajaxwaiter-overlay" class="ajaxwaiter-overlay"></div>
    <div id="js-ajaxwaiter-preloader" class="ajaxwaiter-preloader">
        <img src="<?=$this->path?>/assets/img/preloader.gif" title="Идёт загрузка...">
    </div>

    <script type="text/javascript">
        var pathRoot = '<?=$this->path?>';
    </script>

    <!-- modular-admin-html -->
    <script src="<?=$this->path?>/assets/modular-admin-v101/js/vendor.js" type="text/javascript"></script>
    <script src="<?=$this->path?>/assets/modular-admin-v101/js/app.js" type="text/javascript"></script>

    <script src="<?=$this->path?>/assets/js/app<?php print('1' === getenv('PRODUCTION') ? '.min' : ''); ?>.js?v=<?=md5_file(__DIR__ . '/../../assets/js/app' . ('1' === getenv('PRODUCTION') ? '.min' : '') . '.js')?>" type="text/javascript"></script>
</body>
</html>
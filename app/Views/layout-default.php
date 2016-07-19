<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="_token" content="<?=$this->csrf_token?>">

    <link href="<?=$this->path?>/assets/css/normalize.css?v=<?=md5_file(__DIR__ . '/../../assets/css/normalize.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=$this->path?>/assets/css/style.css?v=<?=md5_file(__DIR__ . '/../../assets/css/style.css')?>" rel="stylesheet" type="text/css">

    <title><?=$this->title?></title>
</head>
<body>
    <div class="content">
        <?=$this->yieldView()?>
    </div>

    <script src="<?=$this->path?>/assets/js/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script src="<?=$this->path?>/assets/js/app<?php print('1' === getenv('PRODUCTION') ? '.min' : ''); ?>.js?v=<?=md5_file(__DIR__ . '/../../assets/js/app.min.js')?>" type="text/javascript"></script>
</body>
</html>
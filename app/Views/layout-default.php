<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="_token" content="<?=$this->csrf_token?>">

    <!-- App -->
    <link href="<?=$this->path?>assets/css/index.css?v=<?=md5_file(__DIR__ . '/../../assets/css/index.css')?>" rel="stylesheet" type="text/css">

    <title><?=$this->title?></title>
</head>
<body>
    <?php
    if (isset($this->external_page)) {
        echo $this->partial($this->app_root_path . '/Views/external-page-header.php');
        echo $this->yieldView();
    } else {
        ?>
        <p>
            <a href="<?=$this->path?>"><img src="<?=$this->path?>assets/img/logo.png"></a>
        </p>
        <p>
            Вы вошли как: <strong><?=$this->userinfo->name?></strong>
        </p>
        <p>
            <a href="<?=$this->path?>">Главная</a>
            &nbsp;|&nbsp;
            <a href="<?=$this->path?>user">Профиль</a>
            &nbsp;|&nbsp;
            <a href="<?=$this->path?>user/logout">Выход</a>
        </p>

        <?=$this->yieldView()?>

        <?php
        $begin_year = 2016;
        $copy_date = (date('Y') == $begin_year ? $begin_year : $begin_year . '-' . date('Y'));
        ?>
        <?=$copy_date?> &copy; <a href="https://github.com/dimns">DimNS</a>
        <?php
    }
    ?>

    <div id="js-ajaxwaiter-overlay" class="ajaxwaiter__overlay"></div>
    <div id="js-ajaxwaiter-preloader" class="ajaxwaiter__preloader">
        <img src="<?=$this->path?>assets/img/preloader.gif" title="Идёт загрузка...">
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- App -->
    <script src="<?=$this->path?>assets/js/index.js?v=<?=md5_file(__DIR__ . '/../../assets/js/index.js')?>" type="text/javascript"></script>

    <script type="text/javascript">
        var pathRoot = '<?=$this->path?>';

        app.init();
    </script>
</body>
</html>
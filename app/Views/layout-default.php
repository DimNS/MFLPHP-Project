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
    <link href="<?=$this->path?>assets/modular-admin-v101/css/vendor.css?v=<?=md5_file(__DIR__ . '/../../assets/modular-admin-v101/css/vendor.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=$this->path?>assets/modular-admin-v101/css/app-blue.css?v=<?=md5_file(__DIR__ . '/../../assets/modular-admin-v101/css/app-blue.css')?>" rel="stylesheet" type="text/css">

    <!-- sweetalert -->
    <link href="<?=$this->path?>assets/js/sweetalert/sweetalert2.css?v=<?=md5_file(__DIR__ . '/../../assets/js/sweetalert/sweetalert2.css')?>" rel="stylesheet" type="text/css">

    <link href="<?=$this->path?>assets/css/index.css?v=<?=md5_file(__DIR__ . '/../../assets/css/index.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=$this->path?>assets/css/override.css?v=<?=md5_file(__DIR__ . '/../../assets/css/override.css')?>" rel="stylesheet" type="text/css">

    <title><?=$this->title?></title>
</head>
<body>
    <?php
    if (isset($this->external_page)) {
        echo $this->yieldView();
    } else {
        ?>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up">
                        <button class="collapse-btn" id="sidebar-collapse-btn"><i class="fa fa-bars"></i></button>
                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="name"><?=$this->userinfo->name?></span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="<?=$this->path?>user"><i class="fa fa-user icon"></i> Профиль</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?=$this->path?>user/logout"><i class="fa fa-power-off icon"></i> Выход</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>

                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <a href="<?=$this->path?>"><img src="<?=$this->path?>assets/img/logo-white.png"></a>
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                <li<?=($this->uri == '/' ? ' class="active"' : '')?>>
                                    <a href="<?=$this->path?>"><i class="fa fa-fw fa-home"></i> Главная</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </aside>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>

                <article class="content">
                    <?=$this->yieldView()?>
                </article>

                <footer class="footer">
                    <div class="footer-block buttons">
                        <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=dimns&repo=mflphp-project&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe>
                    </div>
                    <div class="footer-block author">
                        <?php
                        $begin_year = 2016;
                        $copy_date = (date('Y') == $begin_year ? $begin_year : $begin_year . '-' . date('Y'));
                        ?>
                        <ul>
                            <li><?=$copy_date?> &copy; <a href="https://github.com/dimns">DimNS</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        <?php
    }
    ?>

    <div id="js-ajaxwaiter-overlay" class="ajaxwaiter-overlay"></div>
    <div id="js-ajaxwaiter-preloader" class="ajaxwaiter-preloader">
        <img src="<?=$this->path?>assets/img/preloader.gif" title="Идёт загрузка...">
    </div>

    <!-- modular-admin-html -->
    <script src="<?=$this->path?>assets/modular-admin-v101/js/vendor.js?v=<?=md5_file(__DIR__ . '/../../assets/modular-admin-v101/js/vendor.js')?>" type="text/javascript"></script>

    <!-- sweetalert -->
    <script src="<?=$this->path?>assets/js/sweetalert/sweetalert2.min.js?v=<?=md5_file(__DIR__ . '/../../assets/js/sweetalert/sweetalert2.min.js')?>" type="text/javascript"></script>

    <script src="<?=$this->path?>assets/js/index.js?v=<?=md5_file(__DIR__ . '/../../assets/js/index.js')?>" type="text/javascript"></script>

    <script type="text/javascript">
        var pathRoot = '<?=$this->path?>';

        app.init();
    </script>
</body>
</html>
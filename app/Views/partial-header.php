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
                            <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"></div>
                            <span class="name"><?=$this->userinfo->name?></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="<?=$this->path?>/user"><i class="fa fa-user icon"></i> Профиль</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=$this->path?>/user/logout"><i class="fa fa-power-off icon"></i> Выход</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <a href="<?=$this->path?>/"><img src="<?=$this->path?>/assets/img/logo.png"></a>
                    </div>
                </div>
                <nav class="menu">
                    <ul class="nav metismenu" id="sidebar-menu">
                        <li<?=($this->uri == '/' ? ' class="active"' : '')?>>
                            <a href="<?=$this->path?>/"><i class="fa fa-home"></i> Главная</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="sidebar-overlay" id="sidebar-overlay"></div>

        <article class="content dashboard-page">
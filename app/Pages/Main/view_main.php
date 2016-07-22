<p><a href="<?=$this->path?>/">Главная</a> | <a href="<?=$this->path?>/user">Мой профиль</a> | <a href="<?=$this->path?>/user/logout">Выход</a></p>
<p>dashboard</p>
<p>Вы вошли как: <?=$this->userinfo->name?> <small>(#<?=$this->userinfo->uid?>, <?=$this->userinfo->access?>)</small></p>
<p>url: "<?=$this->uri?>"</p>
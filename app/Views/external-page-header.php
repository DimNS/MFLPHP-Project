<div>
    <img src="<?=$this->path?>assets/img/logo.png">
</div>
<?php
if ($this->message_text !== '') {
    ?>
    <div class="<?=$this->message_code?>">
        <?=$this->message_text?>
    </div>
    <?php
}
?>
<p>
    <img src="<?=$this->path?>assets/img/logo.png">
</p>
<?php
if ($this->message_text !== '') {
    ?>
    <p class="<?=$this->message_code?>">
        <?=$this->message_text?>
    </p>
    <?php
}
?>
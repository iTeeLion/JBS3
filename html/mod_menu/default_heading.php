<?php
defined('_JEXEC') or die;

if ((!$item->menu_image) && ($item->note)) {
    ?><span class="nav-header <?php echo $item->note ?>">&nbsp;<?php echo $item->title; ?></span>
<?php } else { ?>
    <span class="nav-header"><?php echo $item->title; ?></span>
<?php } ?>
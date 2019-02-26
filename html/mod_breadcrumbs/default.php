<?php
defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
?>
<ul class="breadcrumb<?php echo $moduleclass_sfx; ?>">
    <?php
    if ($params->get('showHere', 1)) {
        echo '<li class="active">' . JText::_('MOD_BREADCRUMBS_HERE') . '&#160;</li>';
    } else {
        echo '<li class="active"><span class="divider location-arrow"></span></li>';
    }

    for ($i = 0; $i < $count; $i++) {
        if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link) {
            unset($list[$i]);
        }
    }

    end($list);
    $last_item_key = key($list);
    prev($list);
    $penult_item_key = key($list);
    $show_last = $params->get('showLast', 1);

    foreach ($list as $key => $item) :
        if ($key != $last_item_key) {
            echo '<li>';
            if (!empty($item->link)) {
                echo '<a href="' . $item->link . '" class="pathway">' . $item->name . '</a>';
            } else {
                echo '<span>' . $item->name . '</span>';
            }

            if (($key != $penult_item_key) || $show_last) {
                echo '<span class="divider">' . $separator . '</span>';
            }
            echo '</li>';
        } elseif ($show_last) {
            echo '<li class="active">';
            echo '<span>' . $item->name . '</span>';
            echo '</li>';
        }
    endforeach;
    ?>
</ul>

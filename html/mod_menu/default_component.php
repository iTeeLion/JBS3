<?php
defined('_JEXEC') or die;

$itemAttributes = array();
$itemAttributes['class'] = $item->anchor_css ? $item->anchor_css : null;
$itemAttributes['title'] = $item->anchor_title ? $item->anchor_title : null;

if ($item->isParentAnchor) {
    $itemAttributes['data-toggle'] = 'dropdown';
    $itemAttributes['class'] .= ' dropdown-toggle';
}

$attributes = '';

if (!empty($itemAttributes)) {
    foreach ($itemAttributes as $attribute => $value) {
        if (null !== $value) {
            $attributes .= ' ' . $attribute . '="' . trim((string)$value) . '"';
        }
    }
}

if ($item->menu_image) {
    $item->params->get('menu_text', 1) ?
        $linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
        $linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
} else {
    $linktype = $item->title;

    if ($item->isParentAnchor) {
        $linktype .= ' <span class="caret"></span>';
    }
}

if ((!$item->menu_image) && ($item->note)) {
    $linktype = '<i class="' . $item->note . '">&nbsp;</i>' . $linktype;

}

switch ($item->browserNav) :
    default:
    case 0:
        ?><a <?php echo $attributes; ?>href="<?php echo $item->flink; ?>" ><?php echo $linktype; ?></a><?php
        break;
    case 1:
        ?><a <?php echo $attributes; ?>href="<?php echo $item->flink; ?>"
        target="_blank" ><?php echo $linktype; ?></a><?php
        break;
    case 2:
        ?><a <?php echo $attributes; ?>href="<?php echo $item->flink; ?>"
        onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" ><?php echo $linktype; ?></a>
        <?php
        break;
endswitch;

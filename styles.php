<?
$NL = PHP_EOL;
$TB = "\t";
$arStylesTypes = [
    'section_styles' => '',
    'container_styles' => ' .container',
    'row_styles' => ' .row',
    'cols_styles' => ' .col',
    'cells_styles' => ' .cell',
];
$arPositions = [
    'error' => 'body.error',
    'header' => '.section_header',
    'main' => '.section_main',
    'footer' => '.section_footer',
    'top' => '.section_top',
    'bottom' => '.section_bottom',
];
?>

<?
foreach($arPositions as $name => $classPos):
    if(!empty($tplParams[$name . '_styles'])):
        $i = 1;
        $arBlock = [];
        $listBlocks = $tplParams[$name . '_styles'];
        if(!empty($listBlocks->{$name . '_styles0'})){
            $arBlock = (array) $listBlocks;
            $classWithNum = true;
        }else{
            $arBlock[] = $listBlocks;
            $classWithNum = false;
        }
        foreach($arBlock as $block):
            if($classWithNum) {
                $classBlock = $classPos . $i;
            }else{
                $classBlock = $classPos;
            }
            foreach($arStylesTypes as $styleType => $styleSubClass):
                if(!empty($block->$styleType)):
                    $class = $classBlock . $styleSubClass;
                    $styles = $block->$styleType;
?>
<?=$class?> {
<?
echo (!empty($styles->display))?$TB."display: ".$styles->display.";".$NL:"";
echo (!empty($styles->margin))?$TB."margin: ".$styles->margin.";".$NL:"";
echo (!empty($styles->height))?$TB."height: ".$styles->height.";".$NL:"";
echo (!empty($styles->padding))?$TB."padding: ".$styles->padding.";".$NL:"";
echo (!empty($styles->border_radius))?$TB."border-radius: ".$styles->border_radius.";".$NL:"";
echo (!empty($styles->font_family))?$TB."font-family: ".$styles->font_family.";".$NL:"";
echo (!empty($styles->color))?$TB."color: ".$styles->color.";".$NL:"";
echo (!empty($styles->background_color))?$TB."background-color: ".$styles->background_color.";".$NL:"";
echo (!empty($styles->background_image))?$TB."background-image: ".$styles->background_image.";".$NL:"";
echo (!empty($styles->background_position))?$TB."background-position: ".$styles->background_position.";".$NL:"";
echo (!empty($styles->background_repeat))?$TB."background-repeat: ".$styles->background_repeat.";".$NL:"";
echo (!empty($styles->background_size))?$TB."background-size: ".$styles->background_size.";".$NL:"";
?>
}
<?=$class?> a {
<?
echo (!empty($styles->a_color))?$TB."color: ".$styles->a_color.";".$NL:"";
?>
}
<?=$class?> a:hover,
<?=$class?> a:focus {
<?
echo (!empty($styles->a_hover_color))?$TB."color: ".$styles->a_hover_color.";".$NL:"";
?>
}
<?
                endif;
            endforeach;
            $i++;
        endforeach;
    endif;
endforeach;
?>

/* BODY */
<? $styles = $tplParams['body_styles']; ?>
body {
<?
echo (!empty($styles->font_family))?$TB."font-family: ".$styles->font_family.";".$NL:"";
echo (!empty($styles->color))?$TB."color: ".$styles->color.";".$NL:"";
echo (!empty($styles->background_color))?$TB."background-color: ".$styles->background_color.";".$NL:"";
echo (!empty($styles->background_image))?$TB."background-image: ".$styles->background_image.";".$NL:"";
echo (!empty($styles->background_position))?$TB."background-position: ".$styles->background_position.";".$NL:"";
echo (!empty($styles->background_repeat))?$TB."background-repeat: ".$styles->background_repeat.";".$NL:"";
echo (!empty($styles->background_size))?$TB."background-size: ".$styles->background_size.";".$NL:"";
?>
}

/* NAVBAR */
<? $styles = $tplParams['navbar_styles']; ?>
.navbar-main {
<?
echo (!empty($styles->font_family))?$TB."font-family: ".$styles->font_family.";".$NL:"";
echo (!empty($styles->background_color))?$TB."background-color: ".$styles->background_color.";".$NL:"";
echo (!empty($styles->color))?$TB."color: ".$styles->color.";".$NL:"";
echo (!empty($styles->border_bottom_color))?$TB."border-bottom-color: ".$styles->border_bottom_color.";".$NL:"";
?>
}
.navbar-main a {
<?
echo (!empty($styles->a_color))?$TB."color: ".$styles->a_color.";".$NL:"";
?>
}
.navbar-main a:hover,
.navbar-main a:focus {
<?
echo (!empty($styles->a_hover_color))?$TB."color: ".$styles->a_hover_color.";".$NL:"";
?>
}
.navbar-main .navbar-nav>li>a {
<?
echo (!empty($styles->nav_hover_color))?$TB."color: ".$styles->nav_hover_color.";".$NL:"";
echo (!empty($styles->navbtn_color))?$TB."background-color: ".$styles->navbtn_color.";".$NL:"";
?>
}
.navbar-main .navbar-nav>li>a:hover {
<?
echo (!empty($styles->nav_hover_color))?$TB."color: ".$styles->nav_hover_color.";".$NL:"";
echo (!empty($styles->navbtn_hover_color))?$TB."background-color: ".$styles->navbtn_hover_color.";".$NL:"";
?>
}
.navbar-main .navbar-nav>li.active>a {
<?
echo (!empty($styles->nav_selected_color))?$TB."color: ".$styles->nav_selected_color.";".PHP_EOL:"";
echo (!empty($styles->navbtn_selected_color))?$TB."background-color: ".$styles->navbtn_selected_color.";".PHP_EOL:"";
?>
}
.navbar-main .icon-bar{
<?
echo (!empty($styles->color))?$TB."background-color: ".$styles->color.";".PHP_EOL:"";
?>
}

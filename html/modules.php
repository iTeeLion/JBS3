<?php

defined('_JEXEC') or die;

function modChrome_col($module, &$params, &$attribs) {
	if ($module->content) {
		echo "<div class=\"module col col-xs-12 col-sm-".$params['bootstrap_size']." ".htmlspecialchars($params['moduleclass_sfx'])."\">";
			echo "<div class=\"cell module_container\">";
				if ($module->showtitle) {
					echo "<div class=\"module_title\"><".$params['header_tag']." class=\"".$params['header_class']."\">".$module->title."</".$params['header_tag']."></div>";
				}
				echo "<div class=\"module_content\">".$module->content."</div>";
			echo "</div>";
		echo "</div>";
	}
}

function modChrome_div($module, &$params, &$attribs) {
	if ($module->content) {
		echo "<div class=\"module_container\">";
		echo "<".$params['header_tag'].">".$module->title."</".$params['header_tag'].">";
		echo $module->content;
		echo "</div>";
	}
}

function modChrome_plain($module, &$params, &$attribs) {
	if ($module->content) {
		echo $module->content;
	}
}

?>

<?php

defined('_JEXEC') or die;

// Initialization
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$config = JFactory::getConfig();
$tplParams = $app->getTemplate(true)->params;

// Prepare values
$path = [
    'template' => '/templates/' . $app->getTemplate(),
];

if($tplParams['logo']){
    $logotype = '<img src="' . $tplParams['logo'] . '" class="nav-logo">';
}elseif($tplParams['title']){
    $logotype = $tplParams['title'];
}else {
    $logotype = $config->get('sitename');
}

// Calc asides
$section_main_bscol_middle = 12;
if($this->countModules('aside_left')){
    $section_main_bscol_left = ($tplParams['aside_lift_size']) ? $tplParams['aside_lift_size'] : 0;
    $section_main_bscol_middle -= $section_main_bscol_left;
}
if($this->countModules('aside_right')){
    $section_main_bscol_right = ($tplParams['aside_right_size']) ? $tplParams['aside_right_size'] : 0;
    $section_main_bscol_middle -= $section_main_bscol_right;
}
if($section_main_bscol_middle < 1){
    $section_main_bscol_middle = 12;
}

// Config Joomla assets
if(!$tplParams['joomla_jquery']) {
    unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery.min.js']);
    unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery-noconflict.js']);
    unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery-migrate.min.js']);
    unset($doc->_scripts[JURI::root(true) . '/media/system/js/caption.js']);
    $doc->_script = [];
}
if(!$tplParams['joomla_bootstrap']) {
    unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
}

// Add template assets
$doc->addStyleSheet($path['template'] . '/css/bootstrap.min.css');
$doc->addStyleSheet($path['template'] . '/css/fonts.css');
$doc->addStyleSheet($path['template'] . '/css/template.css');

// Template styles
ob_start();
include_once('styles.php');
$obStyles = ob_get_clean();
$doc->addStyleDeclaration($obStyles);

// Scripts
$doc->addScript($path['template'] . '/js/jquery.min.js');
$doc->addScript($path['template'] . '/js/bootstrap.min.js');
$doc->addScript($path['template'] . '/js/scripts.js');

// Add custom assets
if (is_file('assets/init.php')) {
    include_once('assets/init.php');
}
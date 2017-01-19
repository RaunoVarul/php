<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/12/2017
 * Time: 13:17
 */
//import configuration
require_once 'conf.php';
// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');
// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');

// create and output menu
// import menu file
require_once 'menu.php'; // in this file is menu creation
$tmpl->set('menu', $menu->parse());

$tmpl->set('nav_bar', 'minu navigatsioon');
$tmpl->set('lang_bar', 'minu keeleriba');
$tmpl->set('content', 'minu sisu');
// output template content set up with real values
echo $tmpl->parse();
// control actions
// import act file
require_once 'act.php';
//control database object
//create connection to database
$sql = 'SELECT NOW();';
$res = $db->query($sql);
echo '<pre>';
print_r($res);
echo '</pre>';

?>
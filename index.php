<?php
/**
 * Created by PhpStorm.
 * User: RaunoV
 * Date: 1/12/2017
 * Time: 13:17
 */
//import configuration
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
require_once CLASSES_DIR.'template.php';
// and use it
// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');

//require language control //
require_once(BASE_DIR.'lang.php');
// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');
// import http class
require_once CLASSES_DIR.'http.php';
// import linkobject class
require_once CLASSES_DIR.'linkobject.php';
// create and output http object from linkobject class
$http = new linkobject();
// create and output menu
// import menu file
require_once 'menu.php'; // in this file is menu creation
$tmpl->set('menu', $menu->parse());
// import act file
require_once 'act.php';

$tmpl->set('nav_bar', $sess->user_data['username']);
/*
$tmpl->set('nav_bar', 'minu navigatsioon');
$tmpl->set('lang_bar', LANG_ID);
$tmpl->set('content', 'minu sisu');
*/
/*
// control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
*/
// output template content set up with real values
echo $tmpl->parse();
// control http object output
/*echo '<pre>';
print_r($http);
echo '</pre>';*/
// control http constants
echo REMOTE_ADDR.'<br />';
echo PHP_SELF.'<br />';
echo SCRIPT_NAME.'<br />';
echo HTTP_HOST.'<br />';
echo '<hr />';
// create http data pairs and set up into $http->vars array
$http->set('kasutaja', 'Rauno');
$http->set('tund', 'php programmeerimisvahendid');
// control $http->vars object output
/*echo '<pre>';
print_r($http->vars);
echo '</pre>';*/
// control link creation
$link = $http->getLink(array('kasutaja'=>'rauno', 'parool'=>'qwerty'));
//echo $link.'<br />';
// control http output
echo '<pre>';
print_r($http);
echo '</pre>';
?>
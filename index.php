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
//$tmpl->set('content', 'minu sisu');
// allow to use default act
$tmpl->set('content', $http->get('content'));
// output template content set up with real values
echo $tmpl->parse();
// control actions
// import act file
require_once 'act.php';
//control database object
//create connection to database
$page_id = $http->get('page_id');
$sql = 'select * from content where' .
    'content_id="'.$page_id.'"';
$res = $db->getArray($sql);
// if query is with result
if($res !== false){
    $page = $res[0];
    $http->set('content', $page['content_id']);
    $tmpl->set('content', $page['content']);
}


echo '<pre>';
print_r($db_history);
echo '<pre>';

$db->showHistory();

echo '<pre>';
print_r($sess);
echo '<pre>';

?>